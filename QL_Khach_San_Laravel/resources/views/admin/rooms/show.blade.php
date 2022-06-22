@extends('admin.layouts.partials.CSSKid')
@section('title')
Chi Tiết Phòng
@endsection
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.room.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('manager.rooms.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            @foreach ($room as $room)
            <table id="myTable" class="table table-bordered table-striped">
                <tbody>
                    <?php $stt = 1; ?>

                    <tr>
                        <th>
                            Mã  Phòng
                        </th>
                        <td>
                            {{ $room->p_ma }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Tên  Phòng
                        </th>
                        <td>{{ $room->p_ten }}</td>
                    </tr>
                    <tr>
                        <th>
                            Tên Loại Phòng
                        </th>
                        <td>{{ $room->lp_ten }}</td>
                    </tr>
                    <tr>
                        <th>
                            Hình Phòng
                        </th>
                        <td> <img src="{{ asset('/storage/photos/' . $room->lp_hinh) }}" class="img-list"
                                height="100" width="100" /></td>
                    </tr>
                    <tr>
                        <th>
                            Giá Loại Phòng
                        </th>
                        <td>{{ $room->lp_giaBan }}.000 VNĐ</td>
                    </tr>
                    <tr>
                        <th>
                            Thông tin Loại Phòng
                        </th>
                        <td>{{ $room->lp_thongTin }}</td>
                    </tr>
                    <tr>
                        <th>
                            Trạng thái Phòng
                        </th>
                        <td>
                            @if ($room->p_trangThai == 1) Khóa
                            @else Khả Dụng
                            @endif
                        </td>
                    </tr>

                    <?php $stt++; ?>
        @endforeach
        </tbody>
        </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('manager.rooms.index') }}">
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
            <a class="nav-link" href="#room_bookings" role="tab" data-toggle="tab">
                {{ trans('cruds.booking.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="room_bookings">
            @includeIf('admin.rooms.relationships.roomBookings', ['room' => $room->p_ma])
    </div>
</div>

@endsection
