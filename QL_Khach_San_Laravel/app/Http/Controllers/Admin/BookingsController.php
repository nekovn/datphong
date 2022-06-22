<?php

namespace App\Http\Controllers\Admin;

use App\Booking;
use App\Http\Controllers\Controller;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\phong;
use App\loaiphong;
use App\hoadon;
use Carbon\Carbon;
use App\khachhang;
use app\NhanVien;
class BookingsController extends Controller
{
    public function index()
    {
        $bookings=DB::select('
        SELECT DISTINCT * FROM booking as bk
        INNER JOIN khachhang as kh on kh.id = bk.kh_ma
        INNER JOIN nhanvien as nv on nv.id = bk.nv_ma
        INNER JOIN phong as p on p.p_ma=bk.p_ma


       ');

        return view('admin.bookings.index')->with('bookings',$bookings);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
       //

        return redirect()->route('admin.bookings.index');
    }

    public function edit($booking)
    {



        return view('admin.bookings.edit', compact('rooms', 'booking'));
    }

    public function update(Request $request, $booking)
    {


        return redirect()->route('manager.bookings.index');
    }

    public function show($booking)
    {
        $bookings=DB::select('SELECT DISTINCT * FROM booking as bk
        INNER JOIN khachhang as kh on kh.id = bk.kh_ma
        INNER JOIN nhanvien as nv on nv.id= bk.nv_ma
        INNER JOIN phong as p on p.p_ma=bk.p_ma

       WHERE  bk_ma ='.$booking);
//dd($bookings);
        return view('admin.bookings.show')->with('bookings',$bookings);
    }

    public function destroy(Booking $booking)
    {
        $booking = booking::where("bk_ma", $booking->bk_ma)->first();

        Session::flash('alert-info', 'Xóa thành công ^^~!!!');
        $booking->delete();
            return back();




}
}
