<?php

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\phong;
use App\loaiphong;
use App\booking;
use App\hoadon;
use Carbon\Carbon;
use App\khachhang;
use app\NhanVien;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        return view('user.khachhang.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $this->validate($request, [
        'no' => 'required|exists:rooms,no',
        'phone' => 'required|phone',
        'name' => 'required',
        'bk_thoiGianBatDau' => 'required|date|after:today',
        'bk_thoiGianKetThuc' => 'required|date|after:bk_thoiGianBatDau|live_half_month_and_not_conflict'
    ], [], [
        'phone' => 'phone',
        'name' => 'name',
        'check_in_at' => 'arrival date',
        'check_out_at' => 'departure date'
    ]);

         $validation = $request->validate([

        'bk_thoiGianBatDau'=>'required|after:tomorrow',
        'bk_thoiGianKetThuc'=>'required|after_or_equal:bk_thoiGianBatDau',
    ]);
            // Tạo mới object SanPham
            $bk = new booking();
            $bk->bk_thoiGianBatDau = $request->bk_thoiGianBatDau;
            $bk->bk_thoiGianKetThuc = $request->bk_thoiGianKetThuc;
            $bk->bk_maLoaiPhong = $request->bk_maLoaiPhong;
            $bk->bk_trangThai = 3;
            // $bk->kh_ma =  Auth::user()->nv_ma ;
            // $bk->kh_ma =  Auth::user()->nv_ma ;
            $bk->kh_ma = Auth::user()->id ;
            $bk->nv_ma =  2;
            Session::flash('alert-success', 'Your work has been saved ^^~!!!');

//dd($bk);
         //  $bk->save();
            return redirect()->route('home');
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
        //
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
        $validation = $request->validate([
            'kh_hoTen'=>'required|max:30|min:5',
            'kh_diaChi'=>'required|max:30|min:5',
            'kh_dienThoai'=>'required|min:8|numeric',
            'kh_email'=>'required|max:50',
            'kh_gioiTinh'=>'required',
            'email'=>'required|max:30|min:5',
            'password'=>'required|string|min:3',



        ]);

           // dd($request);


        $kh = khachhang::where("id",$id)->first();//dd($kh);
          $kh->email = $request['email'];
          $kh->password=   bcrypt($request['password']); //123456
          $kh->kh_hoTen =  $request['kh_hoTen'];
          $kh->kh_gioiTinh =  $request['kh_gioiTinh'];
          $kh->kh_email=  $request['kh_email'];
          $kh->kh_diaChi=  $request['kh_diaChi'];
          $kh->kh_dienThoai=  $request['kh_dienThoai'];
          $kh->kh_capNhat =  Carbon::now();// Lấy ngày giờ hiện tại (sử dụng Carbon)

          
          $kh->update();


        Session::flash('alert-success', 'Your work has been saved ^^~!!!');
        return back();




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
