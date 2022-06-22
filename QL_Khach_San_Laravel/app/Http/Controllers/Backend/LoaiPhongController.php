<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\loaiphong;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\phong;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class LoaiPhongController extends Controller
{
    /**
     * Dilplay a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $db = DB::select('
            SELECT * from phong as p
            INNER JOIN loai_phong as lp  ON p.lp_ma=lp.lp_ma;
            ');

        $phong = phong::all();
        $ds_loaiphong = loaiphong::all();
        return view('backend.loaiphong.index')->with('phong', $phong)->with('danhsachphong', $ds_loaiphong)->with('db', $db)->with('loaiphong', $ds_loaiphong);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.loaiphong.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

// Bổ sung ràng buộc Validate
    $validation = $request->validate([
        'lp_hinh' => 'required|file|image|mimes:jpeg,png,gif,webp|max:204|unique:loai_phong',
        'lp_ten'=>'required|max:30|min:3',
        'lp_giaBan'=>'required',
        'lp_thongTin'=>'required|max:255',
    ]);

    // Tạo mới object SanPham
    $p = new loaiphong();
    $p->lp_ten = $request->lp_ten;
    $p->lp_giaBan = $request->lp_giaBan;
    $p->lp_thongTin = $request->lp_thongTin;
    $p->lp_taoMoi = Carbon::now('Asia/Ho_Chi_Minh') ;
    $p->lp_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
    $p->lp_trangThai = $request->lp_trangThai;

    // Kiểm tra xem người dùng có upload hình ảnh Đại diện hay không?
    if ($request->hasFile('lp_hinh')) {
        $file = $request->lp_hinh;

        // Lưu tên hình vào column sp_hinh
        $p->lp_hinh = $file->getClientOriginalName();

        // Chép file vào thư mục "storate/public/photos"
        $fileSaved = $file->storeAs('public/photos', $p->lp_hinh);
    }
    $p->save();

    // Hiển thị câu thông báo 1 lần (Flash session)
    //
    $request->session()->flash('alert-info', 'Them moi thanh cong ^^~!!!');

    // Điều hướng về route index
    return redirect()->route('loaiphong.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loaiphong = loaiphong::find($id);

        return view('backend.loaiphong.edit')
            ->with('loaiphong', $loaiphong);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Bổ sung ràng buộc Validate
    $validation = $request->validate([
        'lp_ten'=>'required|max:30|min:3',
        'lp_giaBan'=>'required',
        'lp_thongTin'=>'required|max:255',
    ]);


    $p = loaiphong::where("lp_ma",$id)->first();
    $p->lp_ten = $request->lp_ten;
    $p->lp_giaBan = $request->lp_giaBan;
    $p->lp_thongTin = $request->lp_thongTin;
    $p->lp_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
    $p->lp_trangThai = $request->lp_trangThai;

    // Kiểm tra xem người dùng có upload hình ảnh Đại diện hay không?
    if ($request->hasFile('lp_hinh')) {

    Storage::delete('public/photos/' . $p->lp_hinh);

        // Upload hình mới
        // Lưu tên hình vào column sp_hinh
        $file = $request->lp_hinh;
        // Lưu tên hình vào column sp_hinh
        $p->lp_hinh = $file->getClientOriginalName();

        // Chép file vào thư mục "storate/public/photos"
        $fileSaved = $file->storeAs('public/photos', $p->lp_hinh);
    }
    $p->update();

    // Hiển thị câu thông báo 1 lần (Flash session)
    Session::flash('alert-info', 'cap nhat thanh cong ^^~!!!');

    // Điều hướng về route index
    return redirect()->route('loaiphong.index');
    }

    /**
     * Remove the lpecified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Relponse
     */
    public function destroy($id, Request $request)
    {
        $loaiphong = loaiphong::find($id);
        $loaiphong->delete();
        Session::flash('alert-success', 'Xoa thanh cong ^^~!!!');
        $request->session()->flash('alert-success', 'Xoa thành công ^^~!!!');
        return redirect()->route('loaiphong.index');

    }
}
