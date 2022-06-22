@extends('admin.hoadon.app')
@section('title')
    Danh Sách Đặt Phòng Đợi Duyệt
@endsection
@section('content')
    {{-- <a style="font-size: 25px">Danh Sách Đặt Phòng Đợi Duyệt</a> --}}
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">

        </div>
    </div>


    <div class="card">
        <div class="card-header" style="font-size: 16px">
            Danh Sách Đặt Phòng Đợi Duyệt
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Room">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.booking.fields.id') }}
                            </th>
                            <th>
                                Họ Và Tên Khách
                            </th>
                            <th>
                                Số điện thoại
                            </th>
                            <th>
                                Thời gian đặt
                             </th>
                            <th>
                               Phòng
                            </th>
                            <th>
                                Bắt Đầu Từ Ngày
                            </th>
                            <th>
                              Kết Thúc ngày Từ Ngày
                            </th>
                            <th>
                                Trạng Thái
                              </th>

                            <th>

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $key => $booking)
                            <tr data-entry-id="{{ $booking->bk_ma }}">
                                <td>

                                </td>
                                <td>
                                    {{ $booking->bk_ma  }}
                                </td>
                                <td>
                                    {{ $booking->kh_hoTen  }}
                                </td>
                                <td>
                                    {{ $booking->kh_dienThoai }}
                                </td>
                                <td>
                                    {{date('d-m / H:i',strtotime($booking->bk_capNhat))}}

                                </td>
                                <td>
                                    {{ $booking->p_ten  }}
                                </td>
                                <td>
                                    {{date('d-m',strtotime($booking->bk_thoiGianBatDau))}}
                                </td>
                                <td>
                                    {{date('d-m',strtotime($booking->bk_thoiGianKetThuc))}}
                                </td>
                                <td>
                                @if ($booking->bk_trangThai == 1) Đang xử lý
                                        @elseif ($booking->bk_trangThai == 2) Đẵ xác nhận
                                        @elseif ($booking->bk_trangThai == 3) Đẵ hoàn thành
                                        @elseif ($booking->bk_trangThai == 4) Đã từ chối or hủy
                                        @else Khách Hàng đã hủy
                                        @endif
                                    </td>
                                <td>
                                    <form method="post" action="{{route('backend.booking.update')}}" enctype="multipart/form-data" onsubmit="return confirm('Bạn có xác nhận duyệt đặt phòng');" style="display: inline-block;">
                                        {{ csrf_field() }}
                                        <input type="hidden"id="bk_ma" name="bk_ma" value="{{$booking->bk_ma}}">
                                        <input type="submit" class="btn btn-xs btn-success" value="Duyệt">
                                    </form>
                                    <form method="post" action="{{route('backend.booking.edit')}}" enctype="multipart/form-data" onsubmit="return confirm('Bạn có xác nhận hủy đặt phòng');" style="display: inline-block;">
                                        {{ csrf_field() }}
                                        <input type="hidden"id="bk_ma" name="bk_ma" value="{{$booking->bk_ma}}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="Hủy">
                                    </form>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)




            $.extend(true, $.fn.dataTable.defaults, {
                order: [
                    [1, 'desc']
                ],
                pageLength: 50,
            });
            $('.datatable-Room:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>
@endsection
