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
class BookingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        $bookings = DB::select('
        SELECT DISTINCT *,bk.bk_ma FROM booking as bk
INNER JOIN khachhang as kh on kh.id = bk.kh_ma
INNER JOIN phong as p on p.p_ma=bk.p_ma
where bk.bk_trangThai=1 AND bk_thoiGianBatDau> CURRENT_TIMESTAMP;'
        );
         $bk = hoadon::where('bk_trangThai',1);
        return view('admin.bookings.check')->with('bk',$bk)->with('bookings',$bookings);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lp = loaiphong::all();
        $phong=phong::all();
       $db = DB::select('
       SELECT * FROM  	loai_phong
      WHERE lp_trangThai=2;'
       );
        $bk = hoadon::where('bk_trangThai',1);
       return view('user.orders.list')->with('bk',$bk)->with('db',$db)->with('phong',$phong)->with('lp',$lp);
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
            Session::flash('alert-success', 'Cập nhật thành công ^^~!!!');

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
    public function edit(Request $request)
    {//hủy đơn đặt phòng

        $bookings = booking::where("bk_ma", $request->bk_ma)->first();

        $bookings->bk_trangThai = 6;
        $bookings->update();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-success', 'Cập nhật thành công ^^~!!!');


        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
     {//xác nhân đơn đặt phòng

        $bookings = booking::where("bk_ma", $request->bk_ma)->first();

      /////

      $i=$bookings->bk_thoiGianBatDau;
      $o=$bookings->bk_thoiGianKetThuc;
      //dd($o);


     //$diff = abs(strtotime($i) - strtotime($o));
      //    $days = ROUND(($diff)/ (60*60*24));
          $date1=date_create($i);
          $date2=date_create($o);
          $diff=date_diff($date1,$date2);

      $no =$bookings->p_ma;
      $currOrders = booking::where('p_ma', $no)
      ->where('bk_thoiGianKetThuc', '>=' ,Carbon::today())
      ->where('bk_TrangThai','=',2)
      ->select('bk_thoiGianBatDau', 'bk_thoiGianKetThuc')
      ->get();//dd($currOrders);
  $conflict = count($currOrders) != 0;
  foreach ($currOrders as $books) {
      if (($i >= $books->bk_thoiGianKetThuc) ||( $o <= $books->bk_thoiGianBatDau)) {
          $conflict = 0;
      } else {
          $conflict = 1;
          break;
      }
  }//dd($conflict);

  if ($conflict == 1 )
  {Session::flash('alert-danger', 'Phòng đẵ được đặt vui lòng thông báo khách hàng @@@!!!');
      return  back()->withInput();}
/////

        //dd($bookings);
        $bookings->bk_trangThai = 2;
        $bookings->update();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-success', 'Duyệt đơn đặt phòng thành công ^^~!!!');


        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function checkin($id)
    {    $bookings = booking::where("bk_ma", $id)->first();

//dd($bookings);
$bookings->bk_trangThai = 3;
$bookings->bk_thoiGianBatDau= Carbon::now('Asia/Ho_Chi_Minh') ;
$bookings->bk_capNhat= Carbon::now('Asia/Ho_Chi_Minh') ;

$bookings->update();

$a = phong::where("p_ma", $bookings->p_ma)->first();
$a->p_trangThai = 1;
$a->update();
Session::flash('alert-success', 'Check in khách hàng booking thành công ^^~!!!');
return back();
    }
}
