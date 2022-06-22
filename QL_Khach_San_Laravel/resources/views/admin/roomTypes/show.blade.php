@extends('admin.layouts.partials.CSSKid')
@section('title')
Chi tiết Loại Phòng
@endsection
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.roomType.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('manager.room-types.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                @foreach ($roomType as $roomType)
                    <table id="myTable" class="table table-bordered table-striped">
                        <tbody>
                            <?php $stt = 1; ?>

                            <tr>
                                <th>
                                    Mã Loại Phòng
                                </th>
                                <td>
                                    {{ $roomType->lp_ma }}
                                </td>
                            </tr>
                            <tr>
                                <th>
                                    Tên Loại Phòng
                                </th>
                                <td>{{ $roomType->lp_ten }}</td>
                            </tr>
                            <tr>
                                <th>
                                    Hình Loại Phòng
                                </th>
                                <td> <img src="{{ asset('/storage/photos/' . $roomType->lp_hinh) }}" class="img-list"
                                        height="100" width="100" /></td>
                            </tr>
                            <tr>
                                <th>
                                    Giá Loại Phòng
                                </th>
                                <td>{{ $roomType->lp_giaBan }}.000 VNĐ</td>
                            </tr>
                            <tr>
                                <th>
                                    Thông tin Loại Phòng
                                </th>
                                <td>{{ $roomType->lp_thongTin }}</td>
                            </tr>
                            <tr>
                                <th>
                                    Trạng thái Loại Phòng
                                </th>
                                <td>
                                    @if ($roomType->lp_trangThai == 1) Khóa
                                    @else Khả Dụng
                                    @endif
                                </td>
                            </tr>

                            <?php $stt++; ?>
                @endforeach
                </tbody>
                </table>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('manager.room-types.index') }}">
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
                <a class="nav-link" href="#room_type_rooms" role="tab" data-toggle="tab">
                    {{ trans('cruds.room.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane" role="tabpanel" id="room_type_rooms">
                @includeIf('admin.roomTypes.relationships.roomTypeRooms', ['rooms' => $roomType->lp_ma,'roomType',$roomType])
            </div>
        </div>
    </div>

@endsection
