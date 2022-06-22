<div class="card">
    <div class="card-header">
        {{ trans('cruds.booking.title_singular') }} {{ trans('global.list') }} <span>Room {{$room}}</span>
    </div>
    <?php $bookings=DB::select('SELECT DISTINCT * FROM booking as bk
    INNER JOIN khachhang as kh on kh.id= bk.kh_ma
    INNER JOIN nhanvien as nv on nv.id = bk.nv_ma
    INNER JOIN phong as p on p.p_ma=bk.p_ma

   WHERE  bk.p_ma  ='.$room);//dd($bookings);

    ?>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Booking">
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
                                {{date('d-m',strtotime($booking->bk_thoiGianBatDau))}}
                            </td>
                            <td>
                                {{date('d-m',strtotime($booking->bk_thoiGianKetThuc))}}
                            </td>
                            <td>
                                @if ($booking->bk_trangThai == 1) <a type="button" style="color: #a51b1b" class="btn btn-light">Đang xử lý</a>
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
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('booking_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.bookings.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('.datatable-Booking:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
