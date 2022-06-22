<?php

namespace App\Http\Controllers\Admin;

use App\booking;
use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\NhanVien;
use App\Quyen;

use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class UsersController extends Controller
{
    public function index()
    {


        $users = NhanVien::all();

        return view('admin.users.index', compact('users'));
    }

    public function create()
    { $roles = Quyen::all();


        return view('admin.users.create')->with('roles',$roles);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name'=>'required|max:30|min:5',
            'nv_diaChi'=>'required|max:30|min:5',
            'sdt'=>'required|min:8|numeric',
            'nv_email'=>'required|email|max:50',
            'nv_gioiTinh'=>'required',
            'email'=>'required|max:30|min:5|unique:nhanvien',
            'password'=>'required|string|min:3',
            'q_ma'=>'required',


        ]);

        $nv = nhanvien::create([
            'email' => $request['email'],
             'password' => bcrypt($request['password']), //123456
            'nv_hoTen' => $request['name'],
            'nv_gioiTinh' => $request['nv_gioiTinh'],
            'nv_email' => $request['nv_email'],
            'nv_diaChi' => $request['nv_diaChi'],
            'nv_dienThoai' => $request['sdt'],
            'nv_taoMoi' => Carbon::now(), // Lấy ngày giờ hiện tại (sử dụng Carbon)
            'nv_capNhat' => Carbon::now(), // Lấy ngày giờ hiện tại (sử dụng Carbon)
            'nv_trangThai' => 2, // Mặc định là 2-Khả dụng
            'q_ma' => $request['q_ma'], // Mặc định là 2-Quản trị

        ]);

        Session::flash('alert-info', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('manager.users.index');
    }

    public function edit($user)
    {
        $roles = Quyen::all();

        $user = DB::select('
        SELECT * FROM nhanvien as nv
	INNER JOIN quyen AS q ON q.q_ma=nv.q_ma
        WHERE nv.id= '.$user
        );
        //dd($user);
        return view('admin.users.edit')->with('user',$user)->with('roles',$roles);
    }


    public function update(Request $request, $id)
    { //dd($id);
        //dd($request);
        $validation = $request->validate([
            'name'=>'required|max:30|min:5',
            'nv_diaChi'=>'required|max:30|min:5',
            'sdt'=>'required|min:8|numeric',
            'nv_email'=>'required|max:50',
            'nv_gioiTinh'=>'required',
            'email'=>'required|max:30|min:5',
            'password'=>'required|string|min:3',
            'q_ma'=>'required',


        ]);




        $nv = NhanVien::where("id",$id)->first();//dd($nv);
          $nv->email = $request['email'];
          $nv->password =   bcrypt($request['password']); //123456
          $nv->nv_hoTen =  $request['name'];
          $nv->nv_gioiTinh =  $request['nv_gioiTinh'];
          $nv->nv_email=  $request['nv_email'];
          $nv->nv_diaChi=  $request['nv_diaChi'];
          $nv->nv_dienThoai=  $request['sdt'];
          $nv->nv_capNhat =  Carbon::now();// Lấy ngày giờ hiện tại (sử dụng Carbon)
          $nv->nv_trangThai =   $request['nv_trangThai']; // Mặc định là 2-Khả dụng
          $nv->q_ma=  $request['q_ma']; // Mặc định là 2-Quản trị
          $nv->update();


        Session::flash('alert-info', 'Thêm mới thành công ^^~!!!');
        return redirect()->route('manager.users.index');
    }

    public function show($user)
    {

        $roles = Quyen::all();

        $user = DB::select('
        SELECT * FROM nhanvien as nv
	INNER JOIN quyen AS q ON q.q_ma=nv.q_ma
        WHERE nv.id= '.$user
        );
        //dd($user);
        return view('admin.users.show')->with('user',$user)->with('roles',$roles);

    }

    public function destroy($user)
    {
    //dd($user);
    $bk = booking::where("nv_ma",$user)->first();
    if($bk==null){
        $nv = NhanVien::where("id",$user)->first();
        Session::flash('alert-info', 'Xóa thành công ^^~!!!');
            $nv->delete();

            return back();
    }

    else{

        $nv = NhanVien::where("id",$user)->first();
        $nv->nv_trangThai = 1; // Mặc định là 2-Khả dụng

        $nv->update();
        Session::flash('alert-info', 'Nhân viên đã tham gia vào duyệt hóa đơn Nên đã chuyển trạng thái  nhân viên về Khóa   ^^~!!!');return back();}

    }

    public function massDestroy( $request)
    {
        NhanVien::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
