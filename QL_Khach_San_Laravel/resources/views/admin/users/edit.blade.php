@extends('admin.layouts.partials.CSSKid')
@section('title')
Edit Nhân Viên
@endsection
@section('content')
@foreach($user as $user)
<div class="card">
    <div class="form-group">
        <a class="btn btn-default" href="{{ route('manager.users.index') }}">
            {{ trans('global.back_to_list') }}
        </a>
    </div>
    <div class="card-header">
        Sửa Thông Tin Nhân Viên
    </div>

    <div class="card-body">
        <form method="post" action="{{ route('manager.users.update', ['user' => $user->id]) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT" />
            {{ csrf_field() }}
            <div class="form-group">
                <label class="required" for="name">Họ Và Tên</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $user->nv_hoTen) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nv_email">Email</label>
                <input class="form-control {{ $errors->has('nv_email') ? 'is-invalid' : '' }}" type="email" name="nv_email" id="nv_email" value="{{ old('name', $user->nv_email) }}" required>
                @if($errors->has('nv_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nv_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sdt">Số Điên Thoại</label>
                <input class="form-control {{ $errors->has('sdt') ? 'is-invalid' : '' }}" type="number" name="sdt" id="sdt" value="{{ $user->nv_dienThoai}}" required>
                @if($errors->has('sdt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sdt') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="nv_diaChi">Địa Chỉ</label>
                <input class="form-control {{ $errors->has('nv_diaChi') ? 'is-invalid' : '' }}" type="text" name="nv_diaChi" id="nv_diaChi" value="{{ old('nv_diaChi',$user->nv_diaChi) }}" required>
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
                    <option value="1" {{ old('kh_gioiTinh',$user->nv_gioiTinh) == 1 ? "selected" : "" }}>Nam</option>
                   <option value="0" {{ old('kh_gioiTinh',$user->nv_gioiTinh) == 0 ?  : "" }}>Nữ</option>

               </select>
                @if($errors->has('nv_gioiTinh'))
                    <div class="invalid-feedback">
                        {{ $errors->first('nv_gioiTinh') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="email">Tên đăng nhâp</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email',$user->email) }}" required>
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="password">Mật Khẩu</label>
                <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" value="{{ old('password') }}"required>
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{ $errors->first('password') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="nv_trangThai">Trạng thái</label>
                <select name="nv_trangThai" class="form-control">
                   <option value="2" {{ old('nv_trangThai', $user->nv_trangThai) == 2 ? "selected" : "" }}>Khả dụng</option>
                    <option value="1" {{ old('nv_trangThai', $user->nv_trangThai) == 1 ? "selected" : "" }}>Khóa</option>

                </select>
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
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>

    </div>
</div>

@endforeach

@endsection
