<?php

namespace App\Http\Controllers;
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
use App\NhanVien;
use Illuminate\Contracts\Validation\Rule;

class ExampleController extends Controller
{




    public function index()

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
    public function __construct()
    {
        $this->middleware('auth:web');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {


        $kh = khachhang::all();

        $bk= DB::select('
        SELECT * FROM  	booking
       WHERE bk_maLoaiPhong=?',[$id]
        );//dd($bk);
        $lp = DB::select('
        SELECT * FROM  	loai_phong
       WHERE lp_ma=?',[$id]
        );//dd($lp);
        $phong = DB::select('
        SELECT * FROM  	phong
       WHERE lp_ma=?',[$id]
        );//dd($lp);
        return view('user.orders.create')->with('lp',$lp)->with('phong',$phong)->with('bk',$bk)->with('kh',$kh);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   //dd($request);
        $this->validate($request, [
        'phone' => 'required|min:10|max:11',
        'name' => 'required|min:5|max:30',
        'bk_thoiGianBatDau' => 'required|date|after:today',
        'bk_thoiGianKetThuc' => 'required|date|after:bk_thoiGianBatDau',

    ], [
        'bk_thoiGianBatDau.after'=> 'Check In Time After Today',
        'bk_thoiGianKetThuc.after' => 'Check Out Time After Check In Time ',
        'name.required'=>'Họ và tên không hợp lệ'
    ]);


    $i=$request->bk_thoiGianBatDau;
    $o=$request->bk_thoiGianKetThuc;
    //dd($o);


   //$diff = abs(strtotime($i) - strtotime($o));
    //    $days = ROUND(($diff)/ (60*60*24));
        $date1=date_create($i);
        $date2=date_create($o);
        $diff=date_diff($date1,$date2);
    //dd($diff->days);
        if ($diff->days >15)
        {Session::flash('alert-danger', 'Không được đặt phòng quá 15 ngày @@@!!!');
            return  back()->withInput();}
    $no =$request->p_ma;
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
{Session::flash('alert-danger', 'Xung đột thời gian với vui lòng chọn ngày khác @@@!!!');
    return  back()->withInput();}

//dd($diff);dd
$Nhanvien= DB::table('nhanvien')->select('id')->first();
    //         // Tạo mới object SanPham
            $bk = new booking();
            $bk->bk_thoiGianBatDau = $request->bk_thoiGianBatDau;
            $bk->bk_thoiGianKetThuc = $request->bk_thoiGianKetThuc;
            $bk->bk_maLoaiPhong = $request->lp_ma;
            $bk->p_ma = $request->p_ma;
            $bk->bk_trangThai = 1;
            $bk->kh_ma =$request->id;
            $bk->nv_ma = $Nhanvien->id;
            Session::flash('alert-success', ' Your work has been saved ^^~!!!');

//dd($bk);
         $bk->save();
            return redirect()->route('orders');
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
        $bk = booking::where("bk_ma",$id)->first();//dd($kh);
        $bk->bk_trangThai=5;
        $bk->bk_capNhat =Carbon::now();
        //
        $bk->update();


       Session::flash('alert-success', ' Hủy đơn đặt phòng thành công ^^~!!!');

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
