@extends('layouts.app')

@section('custom-css')


<link href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}" type="text/css" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}
                        <!-- Tên tài khoản -->
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Tên tài khoản</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Mật khẩu -->
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Mật khẩu</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Xác nhận mật khẩu -->
                        {{-- <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Xác nhận mật khẩu</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div> --}}

                        <!-- Họ tên -->
                        <div class="form-group{{ $errors->has('kh_hoTen') ? ' has-error' : '' }}">
                            <label for="kh_hoTen" class="col-md-4 control-label">Họ tên</label>

                            <div class="col-md-6">
                                <input id="kh_hoTen" type="text" class="form-control" name="kh_hoTen" value="{{ old('kh_hoTen') }}" required autofocus>

                                @if ($errors->has('kh_hoTen'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kh_hoTen') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- Giới tính -->
                        <div class="form-group{{ $errors->has('kh_gioiTinh') ? ' has-error' : '' }}">
                            <label for="kh_gioiTinh" class="col-md-4 control-label">Giới tính</label>

                            <div class="col-md-6">
                                <select class="form-control" name="kh_gioiTinh">
                                    <option value="1" {{ old('kh_hoTen') == '1' ? 'checked' : '' }}>Nam</option>
                                    <option value="0" {{ old('kh_hoTen') == '0' ? 'checked' : '' }}>Nữ</option>
                                    <option value="2" {{ old('kh_hoTen') == '2' ? 'checked' : '' }}>Khác</option>
                                </select>

                                @if ($errors->has('kh_gioiTinh'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kh_gioiTinh') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- Email -->
                        <div class="form-group{{ $errors->has('kh_email') ? ' has-error' : '' }}">
                            <label for="kh_email" class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input id="kh_email" type="email" class="form-control" name="kh_email" value="{{ old('kh_email') }}" required >

                                @if ($errors->has('kh_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kh_email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <!-- Địa chỉ -->
                        <div class="form-group{{ $errors->has('kh_diaChi') ? ' has-error' : '' }}">
                            <label for="kh_diaChi" class="col-md-4 control-label">Địa chỉ</label>

                            <div class="col-md-6">
                                <input id="kh_diaChi" type="text" class="form-control" name="kh_diaChi" value="{{ old('kh_diaChi') }}" required autofocus>

                                @if ($errors->has('kh_diaChi'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kh_diaChi') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- Điện thoại -->
                        <div class="form-group{{ $errors->has('kh_dienThoai') ? ' has-error' : '' }}">
                            <label for="kh_dienThoai" class="col-md-4 control-label">Điện thoại</label>

                            <div class="col-md-6">
                                <input id="kh_dienThoai" type="text" class="form-control" name="kh_dienThoai" value="{{ old('kh_dienThoai') }}" required autofocus>

                                @if ($errors->has('kh_dienThoai'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kh_dienThoai') }}</strong>
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
        </div>
    </div>
</div>
@endsection

@section('custom-scripts')
<!-- Các script dành cho thư viện Daterangepicker -->
<script type="text/javascript" src="{{ asset('vendor/momentjs/moment.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/daterangepicker/daterangepicker.min.js') }}"></script>

@endsection
