<?php

namespace App\Http\Controllers\Backend;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\loaiphong;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\phong;
use Validator;
use Illuminate\Support\Facades\DB;
Use Barryvdh\DomPDF\PDF;
class PhongController extends Controller
{
    /**
     * Display a listing of the resource.
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
        return view('backend.phong.index')->with('phong', $phong)->with('danhsachphong', $ds_loaiphong)->with('db', $db);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {$db = DB::select('
            SELECT * from phong as p
            INNER JOIN loai_phong as lp  ON p.lp_ma=lp.lp_ma;
            ');

        $phong = phong::all();
        $ds_loaiphong = loaiphong::all();
        return view('backend.phong.create')->with('phong', $phong)->with('danhsachphong', $ds_loaiphong)->with('db', $db);
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
        'p_ten'=>'required|max:30|min:3|unique:phong',
        'p_danhGia'=>'required',

    ]);

    // Tạo mới object SanPham
    $p = new phong();
    $p->p_ten = $request->p_ten;
    $p->p_danhGia = $request->p_danhGia;
    $p->p_taoMoi = Carbon::now('Asia/Ho_Chi_Minh') ;
    $p->p_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
    $p->p_trangThai = $request->p_trangThai;
    $p->lp_ma = $request->lp_ma;

    // Kiểm tra xem người dùng có upload hình ảnh Đại diện hay không?

    $p->save();

    // Hiển thị câu thông báo 1 lần (Flash session)
    Session::flash('alert-info', 'Them moi thanh cong ^^~!!!');

    // Điều hướng về route index
    return redirect()->route('phong.index');

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
        // Sử dụng Eloquent Model để truy vấn dữ liệu
    $phong = phong::where("p_ma", $id)->first();
    $danhsachphong = Loaiphong::all();

    // Đường dẫn đến view được quy định như sau: <FolderName>.<ViewName>
    // Mặc định đường dẫn gốc của method view() là thư mục `resources/views`
    // Hiển thị view `backend.sanpham.edit`
    return view('backend.phong.edit')
        // với dữ liệu truyền từ Controller qua View, được đặt tên là `sp` và `danhsachloai`
        ->with('phong', $phong)
        ->with('danhsachphong', $danhsachphong);
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
        'p_ten'=>'required|max:30|min:3',
        'p_danhGia'=>'required',

    ]);

    // Tìm object Sản phẩm theo khóa chính
    $p = phong::where("p_ma",  $id)->first();
    $p->p_ten = $request->p_ten;
    $p->p_danhGia = $request->p_danhGia;
    $p->p_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
    $p->p_trangThai = $request->p_trangThai;
    $p->lp_ma = $request->lp_ma;
    $p->update();

    // Hiển thị câu thông báo 1 lần (Flash session)
    Session::flash('alert-info', 'Cập nhật thành công ^^~!!!');

    // Điều hướng về trang index
    return redirect()->route('phong.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          // Tìm object Sản phẩm theo khóa chính
    $p = phong::where("p_ma",  $id)->first();

    // Nếu tìm thấy được sản phẩm thì tiến hành thao tác DELETE
    if(empty($p) == false)
    {
        // Xóa hình cũ để tránh rác
        Storage::delete('public/photos/' . $p->p_hinh);
    }
    $p->delete();

    // Hiển thị câu thông báo 1 lần (Flash session)
    Session::flash('alert-info', 'Xóa sản phẩm thành công ^^~!!!');

    // Điều hướng về trang index
    return redirect()->route('phong.index');
    }
    public function print()
    {$db = DB::select('
            SELECT * from phong as p
            INNER JOIN loai_phong as lp  ON p.lp_ma=lp.lp_ma;
            ');
        return view('backend.phong.print')->with('db', $db);
    }
      public function pdf()
    {
        $ds_sanpham = phong::all();
        $ds_loai    = loaiphong::all();
        $data = [
            'danhsachsanpham' => $ds_sanpham,
            'danhsachloai'    => $ds_loai,
        ];

        /* Code dành cho việc debug
        - Khi debug cần hiển thị view để xem trước khi Export PDF
        */
        // return view('backend.sanpham.pdf')
        //     ->with('danhsachsanpham', $ds_sanpham)
        //     ->with('danhsachloai', $ds_loai);

        $pdf = PDF::loadView('backend.phong.pdf', $data);
        return $pdf->download('DanhMucSanPham.pdf');

    }

}
