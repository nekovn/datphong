<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Session;
use App\Nhanvien;
use App\Http\Controllers\Controller;
use App\khachhang;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Carbon\Carbon;
use Mail;
use App\Mail\RegisterMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/'; // Sau khi đăng ký xong sẽ tự động đăng nhập và chuyển về trang /admin

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\khachhang
     */
    protected function register(Request $request)
    {

         $validation = $request->validate([
        'email' => 'required|string|max:50|unique:khachhang',
        'password' => 'required|string|min:3',
        'kh_hoTen' => 'required|string|max:50',
        'kh_gioiTinh' => 'required',
        'kh_email' => 'required|string|email|max:100',
        'kh_diaChi' => 'required',
        'kh_dienThoai' => 'required|numeric'

    ],[
        'kh_taiKhoan.unique'=> 'Tài Khoảng đã tồn tại',
        'kh_matKhau.confirmed' => 'Mật khẩu không chính xác '


    ]);

        $kh = khachhang::create([
            'email' => $request['email'],
            'password' => bcrypt($request['password']), //123456
            'kh_hoTen' => $request['kh_hoTen'],
            'kh_gioiTinh' => $request['kh_gioiTinh'],
            'kh_email' => $request['kh_email'],
            'kh_diaChi' => $request['kh_diaChi'],
            'kh_dienThoai' =>$request['kh_dienThoai'],
            'kh_taoMoi' => Carbon::now(), // Lấy ngày giờ hiện tại (sử dụng Carbon)
            'kh_capNhat' => Carbon::now(), // Lấy ngày giờ hiện tại (sử dụng Carbon)
            'kh_trangThai' => 1, // Mặc định là 2-Khả dụng

        ]);
            Auth::login($kh);

        Session::flash('alert-info', 'Thêm mới thành công ^^~!!!');
        return view('user.index');
    }
}
