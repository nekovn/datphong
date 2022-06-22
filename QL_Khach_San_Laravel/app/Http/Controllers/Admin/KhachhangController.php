<?php

namespace App\Http\Controllers\Admin;

use App\NhanVien;
use App\Quyen;
use App\booking;
use Carbon\Carbon;
use App\Http\Controllers\Controller;
use App\loaiphong;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\phong;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\khachhang;
use Symfony\Component\HttpFoundation\Response;

class KhachHangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $KhachHang= DB::table('khachhang')->get();
        $dangthue=DB::select('
        SELECT DISTINCT * FROM booking as bk
        INNER JOIN khachhang as kh on kh.id = bk.kh_ma
        INNER JOIN phong as p on p.p_ma=bk.p_ma
        where  bk_trangThai =3;


       ');
        return view('admin.khachhang.index')->with('KhachHang',$KhachHang)->with('dangthue',$dangthue);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $KhachHang= DB::table('khachhang')->where("id",$id)->first();
        //dd($KhachHang);
        return view('admin.khachhang.show')->with('KhachHang',$KhachHang);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $KhachHang= DB::table('khachhang')->where("id",$id)->first();
        //dd($user);
        return view('admin.khachhang.edit')->with('KhachHang',$KhachHang);
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
        dd('sdsadas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bk = booking::where("kh_ma",$id)->first();
    if($bk==null){
        $KhachHang= DB::table('khachhang')->where("id",$id)->first();
        Session::flash('alert-info', 'Xóa thành công ^^~!!!');
            $KhachHang->delete();

            return back();
    }

    else{

        $dele = booking::select('bk_ma')->where("kh_ma",$id)->get();
            foreach($dele as $xoabk)
            {
                $booking = booking::where("bk_ma", $xoabk->bk_ma)->first();
        $booking->delete();

            }



            $KhachHang = khachhang::where("id", $id)->first();
        
            $KhachHang ->delete();
            Session::flash('alert-info', 'Đã xóa khách hàng và các hóa đơn  liên quan  ^^~!!!');return back();
     return back();
    }

    }
}
