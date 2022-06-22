@extends('admin.homeMG')
@section('title')
    Danh Sách Đặt phòng / Hóa đơn
@endsection
@section('content')
    <h2>Danh Sách Đặt phòng</h2>
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">

        </div>
    </div>


    <div class="card">
        <div class="card-header">
            {{ trans('cruds.booking.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Room">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th width="50">
                                {{ trans('cruds.booking.fields.id') }}
                            </th>
                            <th>
                                Họ Và Tên Khách
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
                                    {{ $booking->p_ten }}
                                </td>
                                <td>
                                    {{date('d-m',strtotime($booking->bk_thoiGianBatDau))}}
                                </td>
                                <td>
                                    {{date('d-m',strtotime($booking->bk_thoiGianKetThuc))}}
                                </td>
                                <td>
                                    @if ($booking->bk_trangThai == 1) <a type="button" style="color: #a51b1b" class="btn btn-light">Đang đợi xử lý</a>
                                    @elseif ($booking->bk_trangThai == 2)   <a style="color: rgba(255, 255, 255, 255)" class="btn btn-xs btn-primary" >  Đẵ xác nhận</a>
                                    @elseif ($booking->bk_trangThai == 3) <a style="color: rgba(255, 255, 255, 255)" class="btn btn-warning">Đang sử dụng</a>
                                    @elseif ($booking->bk_trangThai == 4)  <a style="color: rgba(255, 255, 255, 255)" class="btn btn-info">Đã hoàn thành</a>
                                    @elseif ($booking->bk_trangThai == 5) <a style="" class="btn btn-secondary"> Khách Đã hủy đặt phòng</a>
                                    @else  <a style="color: rgba(255, 255, 255, 255)" class="btn btn-xs btn-danger">Đặt Phòng Không Thành Công</a>

                                    @endif
                                    </td>
                                <td>

                                        <a class="btn btn-xs btn-primary" href="{{ route('manager.bookings.show', $booking->bk_ma) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                        <form action="{{ route('manager.bookings.destroy', $booking->bk_ma) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
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
<script>window.onload = myFunction1()
    function myFunction1() {
          var element, name, arr;
          element = document.getElementById("id6");
          name = "active";
          arr = element.className.split(" ");
          if (arr.indexOf(name) == -1) {
            element.className += " " + name;
          }
        }
    </script>
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
