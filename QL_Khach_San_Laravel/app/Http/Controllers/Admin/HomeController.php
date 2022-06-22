<?php

namespace App\Http\Controllers\Admin;

use Carbon\CarbonPeriod;
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

class HomeController extends Controller
{


        public function index()
    {   if (Auth::user()->nv_trangThai==1){return  redirect()->route('admin.dashboard');}
    if (Auth::user()->q_ma==1){return  redirect()->route('admin.dashboard');}
        $doanhthu = DB::table('booking')->whereRaw('DAY(bk_thoiGianKetThuc)= DAY(CURRENT_TIMESTAMP) ')->where('bk_trangThai', 4)->sum('bk_gia');
        $hoadon = DB::table('booking')->whereRaw('DAY(bk_taoMoi)= DAY(CURRENT_TIMESTAMP) ')->count();
        $kholn = DB::table('khachhang')->whereRaw('DAY(kh_taoMoi)= DAY(CURRENT_TIMESTAMP) ')->where('kh_trangThai', '1')->count();
        $khoff = DB::table('khachhang')->whereRaw('DAY(kh_taoMoi)= DAY(CURRENT_TIMESTAMP) ')->where('kh_trangThai', '0')->count();
        $day1 = DB::select('SELECT p.p_ten AS label, SUM(bk_gia) AS y  FROM booking AS bk
		                INNER JOIN phong as p on bk.p_ma= p.p_ma
                        INNER JOIN loai_phong as l on l.lp_ma=bk.bk_maLoaiPhong
                        WHERE bk_thoiGianKetThuc >= DATE_SUB(NOW(), INTERVAL 1 day)
                        GROUP BY p.p_ten
                        ORDER BY SUM(bk_gia) DESC;');

        $week = DB::select('SELECT p.p_ten AS label, SUM(bk_gia) AS y  FROM booking AS bk
                        INNER JOIN phong as p on bk.p_ma= p.p_ma
                        INNER JOIN loai_phong as l on l.lp_ma=bk.bk_maLoaiPhong
                        WHERE bk_thoiGianKetThuc >= DATE_SUB(NOW(), INTERVAL 1 week)
                        GROUP BY p.p_ten
                        ORDER BY SUM(bk_gia) DESC;');
            $hoadonweek= DB::table('booking')->whereRaw('DAY(bk_taoMoi) <= DATE_SUB(NOW(), INTERVAL 1 week) ')->sum('bk_gia');
        $thang = DB::select('SELECT p.p_ten AS label, SUM(bk_gia) AS y  FROM booking AS bk
                        INNER JOIN phong as p on bk.p_ma= p.p_ma
                        INNER JOIN loai_phong as l on l.lp_ma=bk.bk_maLoaiPhong
                        WHERE bk_thoiGianKetThuc >= DATE_SUB(NOW(), INTERVAL 1 month )
                        GROUP BY p.p_ten
                        ORDER BY SUM(bk_gia) DESC;');
        $hoadonthang = DB::table('booking')->whereRaw('DAY(bk_taoMoi) <= DATE_SUB(NOW(), INTERVAL 1 month) ')->sum('bk_gia');

        $sohoadonthang = DB::table('booking')->whereRaw('DAY(bk_taoMoi) <= DATE_SUB(NOW(), INTERVAL 1 month)  ')->count();
        $kholnthang = DB::table('khachhang')->whereRaw('DAY(kh_taoMoi) <= DATE_SUB(NOW(), INTERVAL 1 month)  ')->where('kh_trangThai', '1')->count();
        $khoffthang = DB::table('khachhang')->whereRaw('DAY(kh_taoMoi) <= DATE_SUB(NOW(), INTERVAL 1 month)  ')->where('kh_trangThai', '0')->count();

        // dd( $Khachhang);
        return view('admin.Dashboard')->with('hoadon', $hoadon)->with('doanhthu', $doanhthu)->with('sohoadonthang', $sohoadonthang)->with('kholnthang', $kholnthang)->with('khoffthang', $khoffthang)
        ->with('kholn', $kholn)->with('day1', $day1)->with('thang',$thang)->with('week', $week)->with('hoadonthang', $hoadonthang )->with('hoadonweek', $hoadonweek)->with('thang', $thang  )->with('khoff', $khoff);
    }
}
