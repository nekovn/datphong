<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRoomTypeRequest;
use App\Http\Requests\StoreRoomTypeRequest;
use App\Http\Requests\UpdateRoomTypeRequest;
use App\RoomType;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\loaiphong;
use App\booking;
use Illuminate\Support\Facades\Session;
use Validator;
use Illuminate\Support\Facades\Storage;
use App\phong;
use Illuminate\Support\Facades\DB;
Use PDF;
use Carbon\Carbon;
class RoomTypesController extends Controller
{
    public function index()
    {
        $roomTypes=loaiphong::all();

        return view('admin.roomTypes.index', compact('roomTypes'));
    }

    public function create()
    {


        return view('admin.roomTypes.create');
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'lp_hinh' => 'required|file|image|mimes:jpeg,png,gif,webp|max:204|unique:loai_phong',
            'lp_ten'=>'required|max:30|min:3|unique:loai_phong,lp_ten',
            'lp_giaBan'=>'required',
            'lp_thongTin'=>'required|max:255',
        ]);

        $p = new loaiphong();
        $p->lp_ten = $request->lp_ten;
        $p->lp_giaBan = $request->lp_giaBan;
        $p->lp_thongTin = $request->lp_thongTin;
        $p->lp_taoMoi = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->lp_capNhat = Carbon::now('Asia/Ho_Chi_Minh') ;
        $p->lp_trangThai = $request->lp_trangThai;

        // Kiểm tra xem người dùng có upload hình ảnh
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
        $request->session()->flash('alert-info', 'Thêm mới thành công ^^~!!!');


        return redirect()->route('manager.room-types.index');
    }

    public function edit( $roomType)
    {
        $loaiphong = loaiphong::find($roomType);
       // dd($loaiphong);
        return view('admin.roomTypes.edit')->with('loaiphong',$loaiphong);
    }

    public function update(Request $request, $id)
    {
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

        // Kiểm tra xem người dùng có upload hình
        if ($request->hasFile('lp_hinh')) {

        Storage::delete('public/photos/' . $p->lp_hinh);

            // Upload hình mới

            $file = $request->lp_hinh;

            $p->lp_hinh = $file->getClientOriginalName();

            // Chép file vào thư mục "storate/public/photos"
            $fileSaved = $file->storeAs('public/photos', $p->lp_hinh);
        }
        $p->update();

        // Hiển thị câu thông báo 1 lần (Flash session)
        Session::flash('alert-info', 'Cập nhật thành công  ^^~!!!');

        return redirect()->route('manager.room-types.index');
    }

    public function show($roomType)
    {//dd($roomType);
        $roomType= DB::select('select * from loai_phong where lp_ma = ?', [$roomType]);

        return view('admin.roomTypes.show')->with('roomType',$roomType);
    }

    public function destroy( $roomType)
    {
        $bk = phong::where("lp_ma",$roomType)->first();
        if($bk==null){
            $roomType = loaiphong::where("lp_ma", $roomType)->first();
            Session::flash('alert-info', 'Xóa thành công ^^~!!!');
            $roomType ->delete();
                return back();}
        else{


            $dsphong = phong::select('p_ma')->where("lp_ma",$roomType)->get();

            foreach($dsphong as $xoap)
            { $b=$xoap->p_ma;
                 $dsbk = booking::select('bk_ma')->where("p_ma",$b)->get();
                $a = DB::select('select bk_ma from booking where p_ma='.$b);
                  if($dsbk!= null){
                            foreach( $dsbk as $xoabk)
                            {

                                $booking = booking::where("bk_ma", $xoabk->bk_ma)->first();
                                $booking->delete();

                            }
                      }
                  // echo $xoap->p_ma ;
                $room = phong::where("p_ma", $xoap->p_ma)->first();
                $room ->delete();
            }

            $roomType = loaiphong::where("lp_ma", $roomType)->first();
            Session::flash('alert-info', 'Xóa thành công dữ liệu Loại phòng và các phòng , hóa đơn liên quan ^^~!!!');
            $roomType ->delete();
                return back();;

        }
    }

    public function massDestroy($request)
    {
        loaiphong::whereIn('lp_ma', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
