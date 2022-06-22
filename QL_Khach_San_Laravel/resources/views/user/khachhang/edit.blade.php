

    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('user.update',[ Auth::user()->kh_ma] ) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT" />

            <!-- Tên tài khoản -->
            <div class="form-group{{ $errors->has('kh_taiKhoan') ? ' has-error' : '' }}">
                <label for="kh_taiKhoan" class="col-md-4 control-label">Tên tài khoản</label>

                <div class="col-md-6">
                    <input id="kh_taiKhoan" type="text" class="form-control" name="kh_taiKhoan" value="{{ old('kh_taiKhoan',Auth::user()->kh_taiKhoan) }}" required autofocus>

                    @if ($errors->has('kh_taiKhoan'))
                    <span class="help-block">
                        <strong>{{ $errors->first('kh_taiKhoan') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <!-- Mật khẩu -->
            <div class="form-group{{ $errors->has('kh_matKhau') ? ' has-error' : '' }}">
                <label for="kh_matKhau" class="col-md-4 control-label">Mật khẩu</label>

                <div class="col-md-6">
                    <input id="kh_matKhau" type="password" class="form-control" name="kh_matKhau" required>

                    @if ($errors->has('kh_matKhau'))
                    <span class="help-block">
                        <strong>{{ $errors->first('kh_matKhau') }}</strong>
                    </span>
                    @endif
                </div>
            </div>

            <!-- Xác nhận mật khẩu -->
            <div class="form-group">
                <label for="kh_matKhau-confirm" class="col-md-4 control-label">Xác nhận mật khẩu</label>

                <div class="col-md-6">
                    <input id="kh_matKhau-confirm" type="password" class="form-control" name="kh_matKhau_confirmation" required>
                </div>
            </div>

            <!-- Họ tên -->
            <div class="form-group{{ $errors->has('kh_hoTen') ? ' has-error' : '' }}">
                <label for="kh_hoTen" class="col-md-4 control-label">Họ tên</label>

                <div class="col-md-6">
                    <input id="kh_hoTen" type="text" class="form-control" name="kh_hoTen" value="{{ old('kh_hoTen',Auth::user()->kh_hoTen) }}" required autofocus>

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
                    <input id="kh_email" type="email" class="form-control" name="kh_email" value="{{ old('kh_email',Auth::user()->kh_email) }}" required >

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
                    <input id="kh_diaChi" type="text" class="form-control" name="kh_diaChi" value="{{ old('kh_diaChi',Auth::user()->kh_diaChi) }}" required autofocus>

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
                    <input id="kh_dienThoai" type="text" class="form-control" name="kh_dienThoai" value="{{ old('kh_dienThoai',Auth::user()->kh_dienThoai) }}" required autofocus>

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
                       Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>


