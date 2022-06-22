@extends('admin.layouts.partials.CSSKid')
@section('title')
Chi Tiết Khách Hàng
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.user.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('manager.khachhang.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.id') }}
                        </th>
                        <td>
                            {{ $KhachHang->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>
                        <td>
                            {{ $KhachHang->kh_hoTen }}
                        </td>
                    </tr>

                    <tr>
                        <th>
                            Giới tính
                        </th>
                        <td>
                             @if ( $KhachHang->kh_gioiTinh= 1) Nữ
                            @else Nam
                             @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <td>
                            {{ $KhachHang->kh_email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tài Khoản đăng nhập 
                        </th>
                        <td>
                            {{ $KhachHang->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Số điện Thoại
                        </th>
                        <td>

                                <span class="label label-info">{{ $KhachHang->kh_dienThoai }}</span>

                        </td>
                    </tr>
                    <tr>
                        <th>
                          Địa Chỉ
                        </th>
                        <td>

                            <span class="label label-info">
                                {{ $KhachHang->kh_diaChi }}

                            </span>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('manager.khachhang.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#bookings" role="tab" data-toggle="tab">
                {{ trans('cruds.booking.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="bookings">
            @includeIf('admin.khachhang.relationships.Bookings', ['kh' => $KhachHang->id])
    </div>
</div>


@endsection
