<?php

namespace App\Http\Controllers\Admin;

use App\booking;
use App\Hotel;
use App\Http\Controllers\Controller;
use App\phong;
use App\loaiphong;
use Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;
class RoomsController extends Controller
{
    public function index(Request $request)
    {
        $db = DB::select('
            SELECT * from phong as p
            INNER JOIN loai_phong as lp  ON p.lp_ma=lp.lp_ma;
            ');
            $phong = phong::all();
            $ds_loaiphong = loaiphong::all();
        return view('admin.rooms.index')->with('phong', $phong)->with('danhsachphong', $ds_loaiphong)->with('rooms', $db);;
    }

    public function create()
    {

        $db = DB::select('
            SELECT * from phong as p
            INNER JOIN loai_phong as lp  ON p.lp_ma=lp.lp_ma;
            ');

        $phong = phong::all();
        $ds_loaiphong = loaiphong::all();

        return view('admin.rooms.create')->with('phong', $phong)->with('danhsachphong', $ds_loaiphong)->with('db', $db);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'p_ten'=>'required|max:30|min:3|unique:phong',
            'p_danhGia'=>'required',

        ]);

        $p = new phong();
        $p->p_ten = $request->p_ten;
        $p->p_danhGia = $request->p_danhGia;
        $p->p_taoMoi = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->p_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->p_trangThai = $request->p_trangThai;
        $p->lp_ma = $request->lp_ma;



        $p->save();


        Session::flash('alert-info', 'Thêm Mới Thành Công ^^~!!!');

        return redirect()->route('manager.rooms.index');
    }

    public function edit( $id)
    {
        $phong = phong::where("p_ma", $id)->first();
        $danhsachphong = Loaiphong::all();

        return view('admin.rooms.edit')
            ->with('phong', $phong)
            ->with('danhsachphong', $danhsachphong);

    }

    public function update(Request $request,$id)
    {
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


        return redirect()->route('manager.rooms.index');
    }

    public function show($room)
    {
        $room= DB::select('
        SELECT * from phong as p
        INNER JOIN loai_phong as lp  ON p.lp_ma=lp.lp_ma
        where p_ma = '.$room);

        return view('admin.rooms.show')->with('room',$room);


    }

    public function destroy( $room)
    {
        $bk = booking::where("p_ma",$room)->first();
        if($bk==null){
            $room = phong::where("p_ma", $room)->first();
            Session::flash('alert-info', 'Xóa thành công ^^~!!!');
            $room ->delete();
                return back();}
        else{
            $dele = booking::select('bk_ma')->where("p_ma",$room)->get();
            foreach($dele as $xoabk)
            {
                $booking = booking::where("bk_ma", $xoabk->bk_ma)->first();
        $booking->delete();

            }



            $room = phong::where("p_ma", $room)->first();
            $room->p_trangThai = 2; // Mặc định là 2-Khả dụng
            $room ->delete();
            Session::flash('alert-info', 'Đã xóa phòng và các hóa đơn  liên quan  ^^~!!!');return back();
        }



    }

    public function massDestroy( $request)
    {
        phong::whereIn('p_ma', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
