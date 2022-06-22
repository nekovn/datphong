@extends('layouts.admin')
@section('title')
Tạo nhân viên
@endsection
@section('content')

<div class="card">
    <div class="card-header">
      Tạo Nhân Viên Mới
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("manager.users.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">Họ Và Tên</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="email">Email</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email') }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sdt">Số Điên Thoại</label>
                <input class="form-control {{ $errors->has('sdt') ? 'is-invalid' : '' }}" type="number" name="sdt" id="sdt" value="{{ old('sdt') }}" required>
                @if($errors->has('sdt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sdt') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="nv_diaChi">Địa Chỉ</label>
                <input class="form-control {{ $errors->has('nv_diaChi') ? 'is-invalid' : '' }}" type="text" name="nv_diaChi" id="nv_diaChi" value="{{ old('nv_diaChi') }}" required>
                @if($errors->has('nv_diaChi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nv_diaChi') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="nv_gioiTinh">Giới tính</label>
                <select name="nv_gioiTinh" class="form-control">
                    <option value="1" {{ old('kh_gioiTinh') == 1 ? "selected" : "" }}>Nam</option>
                   <option value="0" {{ old('kh_gioiTinh') == 0 ?  : "" }}>Nữ</option>

               </select>
                @if($errors->has('nv_gioiTinh'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nv_gioiTinh') }}
                    </div>
                @endif
                <span class="help-block">Giới tính</span>
            </div>
            <div class="form-group">
                <label class="required" for="nv_taiKhoan">Tên đăng nhâp</label>
                <input class="form-control {{ $errors->has('nv_taiKhoan') ? 'is-invalid' : '' }}" type="text" name="nv_taiKhoan" id="nv_taiKhoan" value="{{ old('nv_taiKhoan') }}" required>
                @if($errors->has('nv_taiKhoan'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nv_taiKhoan') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="password">Mật Khẩu</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="roles">{{ trans('cruds.user.fields.roles') }}</label>

                <select name="q_ma" class="form-control">
                    @foreach($roles as $roles)
                    @if(old('q_ma') == $roles->q_ma)
                    <option value="{{ $roles->q_ma }}" selected>{{ $roles->q_ten }}</option>
                    @else
                    <option value="{{ $roles->q_ma }}"selected>{{ $roles->q_ten }}</option>
                    @endif
                    @endforeach
                  </select>
                @if($errors->has('roles'))
                    <div class="invalid-feedback">
                        {{ $errors->first('roles') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.roles_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection
