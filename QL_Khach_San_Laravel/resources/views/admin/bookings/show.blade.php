@extends('admin.layouts.partials.CSSKid')
@section('title')
Chi Tiết Đặt Phòng
@endsection
@section('content')
@foreach($bookings as  $bookings)
<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.booking.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('manager.bookings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.booking.fields.id') }}<?php //dd($bookings->p_ten );?>
                        </th>
                        <td>
                            {{ $bookings->bk_ma}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Họ Tên Khách Hàng
                        </th>
                        <td>
                            {{ $bookings->kh_hoTen }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.booking.fields.room') }}
                        </th>
                        <td>
                            {{ $bookings->p_ten }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Bắt Đầu Từ Ngày
                        </th>
                        <td>
                            {{date('d-m',strtotime($bookings->bk_thoiGianBatDau))}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Kết Thúc Vào Ngày
                        </th>
                        <td>
                            {{date('d-m',strtotime($bookings->bk_thoiGianKetThuc))}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Số tiền thanh toán
                        </th>
                        <td>
                            {{ $bookings->bk_gia*1000 }} VNĐ
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Trạng Thái
                        </th>
                        <td>
                            @if ($bookings->bk_trangThai == 1) <a type="button" style="color: #a51b1b" class="btn btn-light">Đang đợi xử lý</a>
                            @elseif ($bookings->bk_trangThai == 2)   <a style="color: rgba(255, 255, 255, 255)" class="btn btn-xs btn-primary" >  Đẵ xác nhận</a>
                            @elseif ($bookings->bk_trangThai == 3) <a style="color: rgba(255, 255, 255, 255)" class="btn btn-warning">Đang sử dụng</a>
                            @elseif ($bookings->bk_trangThai == 4)  <a style="color: rgba(255, 255, 255, 255)" class="btn btn-info">Đã hoàn thành</a>
                            @elseif ($bookings->bk_trangThai == 5) <a style="" class="btn btn-secondary"> Khách Đã hủy đặt phòng</a>
                            @else  <a style="color: rgba(255, 255, 255, 255)" class="btn btn-xs btn-danger">Đặt Phòng Không Thành Công</a>

                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Nhân Viên Sử Lý
                        </th>
                        <td>
                            {{ $bookings->nv_hoTen }}

                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('manager.bookings.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>


@endforeach
@endsection
