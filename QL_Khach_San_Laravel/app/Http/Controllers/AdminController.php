<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\loaiphong;
use App\phong;

class AdminController extends Controller
{
      /**
     * Create a new controller instance.
     *
     * @return void
     */
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
         $db = DB::select('
            SELECT * from phong as p
            INNER JOIN loai_phong as lp  ON p.lp_ma=lp.lp_ma
            ');
        $booking = DB::select('
        SELECT * FROM booking WHERE bk_trangThai = 2
        ');
        $temp = DB::select('SELECT * FROM phong ');


         $temp1 = DB::select('
            SELECT * FROM phong where lp_ma = 2 order by lp_ma  ;
            ');
          // $temp2 = DB::select('
          //   SELECT * FROM hoadon where maphong =  order by maloai DESC limit 4;
          //   ');
        $ds_loaiphong = loaiphong::all();
        return view('admin.index')->with('temp', $temp)->with('temp1', $temp1)->with('db', $db)->with('booking', $booking);
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
        //
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
