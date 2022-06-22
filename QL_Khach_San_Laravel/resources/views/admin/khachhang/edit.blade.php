@extends('admin.layouts.partials.CSSKid')
@section('title')
Edit Khách hàng
@endsection
@section('content')
<a class="btn btn-default" href="{{ route('manager.khachhang.index') }}">
    {{ trans('global.back_to_list') }}
</a>

<div class="card">
    <div class="card-header">

    </div>

    <div class="card-body">
        <form method="post" action="{{ route('manager.khachhang.update', ['khachhang' =>$KhachHang->id]) }}" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT" />
            {{ csrf_field() }}
            <div class="form-group">
                <label class="required" for="name">Họ Và Tên</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name',$KhachHang->kh_hoTen) }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="kh_email">Email</label>
                <input class="form-control {{ $errors->has('kh_email') ? 'is-invalid' : '' }}" type="text" name="kh_email" id="kh_email" value="{{ old('kh_email') ,$KhachHang->kh_email}}" required>
                @if($errors->has('kh_email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kh_email') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sdt">Số Điên Thoại</label>
                <input class="form-control {{ $errors->has('sdt') ? 'is-invalid' : '' }}" type="number" name="sdt" id="sdt" value="{{$KhachHang->kh_dienThoai}}" required>
                @if($errors->has('sdt'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sdt') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="kh_diaChi">Địa Chỉ</label>
                <input class="form-control {{ $errors->has('kh_diaChi') ? 'is-invalid' : '' }}" type="text" name="kh_diaChi" id="kh_diaChi" value="{{ old('kh_diaChi',$KhachHang->kh_diaChi) }}" required>
                @if($errors->has('kh_diaChi'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kh_diaChi') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="kh_gioiTinh">Giới tính</label>
                <select name="kh_gioiTinh" class="form-control">
                    <option value="1" {{ old('kh_gioiTinh',$KhachHang->kh_gioiTinh) == 1 ? "selected" : "" }}>Nam</option>
                   <option value="0" {{ old('kh_gioiTinh',$KhachHang->kh_gioiTinh) == 0 ?  : "" }}>Nữ</option>

               </select>
                @if($errors->has('kh_gioiTinh'))
                    <div class="invalid-feedback">
                        {{ $errors->first('kh_gioiTinh') }}
                    </div>
                @endif
                <span class="help-block"></span>
            </div>
            <div class="form-group">
                <label class="required" for="email">Tên đăng nhâp</label>
                <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="text" name="email" id="email" value="{{ old('email',$KhachHang->email) }}" required>
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
                <label for="kh_trangThai">Trạng thái</label>
                <select name="kh_trangThai" class="form-control">
                   <option value="2" {{ old('kh_trangThai',$KhachHang->kh_trangThai) == 2 ? "selected" : "" }}>Khả dụng</option>
                    <option value="1" {{ old('kh_trangThai',$KhachHang->kh_trangThai) == 1 ? "selected" : "" }}>Khóa</option>

                </select>
              </div>
                   <button type="submit" class="btn btn-primary">Lưu</button>
        </form>

    </div>
</div>



@endsection
