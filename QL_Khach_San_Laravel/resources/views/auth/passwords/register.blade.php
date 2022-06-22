@extends('layouts.app')
@section('custom-css')
<!-- Các style dành cho thư viện Daterangepicker -->
<link href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}" type="text/css" rel="stylesheet" />
@endsection
@section('content')

<div class="auth-wrapper">
        <div class="auth-container" style="max-height: 800px">
            <div class="auth-action-left">
                <div class="auth-form-outer">
                    <h2 class="auth-form-title">
                        Create Account
                    </h2>
                    <div class="auth-external-container">
                        <div class="auth-external-list">
                            <ul>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <p class="auth-sgt">or use your email for registration:</p>
                    </div>
                     <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <!-- Tên tài khoản -->
                        <div class="form-group{{ $errors->has('nv_taiKhoan') ? ' has-error' : '' }}">
                            <label for="nv_taiKhoan" class="col-md-4 control-label">Tên tài khoản</label>

                            <div class="col-md-6">
                                <input id="nv_taiKhoan" type="text" class="form-control" name="nv_taiKhoan" value="{{ old('nv_taiKhoan') }}" required autofocus>

                                @if ($errors->has('nv_taiKhoan'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nv_taiKhoan') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>                        <!-- Mật khẩu -->
                        <div class="form-group{{ $errors->has('nv_matKhau') ? ' has-error' : '' }}">
                            <label for="nv_matKhau" class="col-md-4 control-label">Mật khẩu</label>
                            <div class="col-md-6">
                                <input id="nv_matKhau" type="password" class="form-control" name="nv_matKhau" required>
                                @if ($errors->has('nv_matKhau'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nv_matKhau') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- Xác nhận mật khẩu -->
                        <div class="form-group">
                            <label for="nv_matKhau-confirm" class="col-md-4 control-label">Xác nhận mật khẩu</label>
                            <div class="col-md-6">
                                <input id="nv_matKhau-confirm" type="password" class="form-control" name="nv_matKhau_confirmation" required>
                            </div>
                        </div>
                        <!-- Họ tên -->
                        <div class="form-group{{ $errors->has('nv_hoTen') ? ' has-error' : '' }}">
                            <label for="nv_hoTen" class="col-md-4 control-label">Họ tên</label>

                            <div class="col-md-6">
                                <input id="nv_hoTen" type="text" class="form-control" name="nv_hoTen" value="{{ old('nv_hoTen') }}" required autofocus>

                                @if ($errors->has('nv_hoTen'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nv_hoTen') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- Giới tính -->
                        <div class="form-group{{ $errors->has('nv_gioiTinh') ? ' has-error' : '' }}">
                            <label for="nv_gioiTinh" class="col-md-4 control-label">Giới tính</label>
                            <div class="col-md-6">
                                <select class="form-control" name="nv_gioiTinh">
                                    <option value="1" {{ old('nv_hoTen') == '1' ? 'checked' : '' }}>Nam</option>
                                    <option value="0" {{ old('nv_hoTen') == '0' ? 'checked' : '' }}>Nữ</option>
                                    <option value="2" {{ old('nv_hoTen') == '2' ? 'checked' : '' }}>Khác</option>
                                </select>
                                @if ($errors->has('nv_gioiTinh'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nv_gioiTinh') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="form-group{{ $errors->has('nv_email') ? ' has-error' : '' }}">
                            <label for="nv_email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="nv_email" type="email" class="form-control" name="nv_email" value="{{ old('nv_email') }}" required autofocus>

                                @if ($errors->has('nv_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nv_email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>     
                        <!-- Địa chỉ -->
                        <div class="form-group{{ $errors->has('nv_diaChi') ? ' has-error' : '' }}">
                            <label for="nv_diaChi" class="col-md-4 control-label">Địa chỉ</label>

                            <div class="col-md-6">
                                <input id="nv_diaChi" type="text" class="form-control" name="nv_diaChi" value="{{ old('nv_diaChi') }}" required autofocus>

                                @if ($errors->has('nv_diaChi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nv_diaChi') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- Điện thoại -->
                        <div class="form-group{{ $errors->has('nv_dienThoai') ? ' has-error' : '' }}">
                            <label for="nv_dienThoai" class="col-md-4 control-label">Điện thoại</label>

                            <div class="col-md-6">
                                <input id="nv_dienThoai" type="text" class="form-control" name="nv_dienThoai" value="{{ old('nv_dienThoai') }}" required autofocus>

                                @if ($errors->has('nv_dienThoai'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('nv_dienThoai') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Đăng ký
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="auth-action-right">
                <div class="auth-image">
                    <img src="../img/log.jpg" alt="login">
                </div>
            </div>
        </div>
    </div>
    <!-- Các script dành cho thư viện Daterangepicker -->

@endsection



<script type="text/javascript" src="{{ asset('vendor/momentjs/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/daterangepicker/daterangepicker.min.js') }}"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    @section('custom-scripts')
@endsection
















