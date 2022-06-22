
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("manager.rooms.create") }}">
                {{ trans('global.add') }} {{ trans('cruds.room.title_singular') }}
            </a>
        </div>
    </div>


<div class="card">
    <div class="card-header">
        {{ trans('cruds.room.title_singular') }} {{ trans('global.list') }}
    </div>
    <?php $rooms=DB::select('select * from phong where lp_ma='.$rooms);

    ?>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Room">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            ID Phòng
                        </th>
                        <th>
                            Tên Phòng
                        </th>
                        <th style="text-align: center;">
                           Đánh Giá Phòng
                        </th>

                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody >
                    <?php
                    $stt = 1;
                    ?>
                     @foreach($rooms as $key => $room)
                     <tr data-entry-id="{{ $room->p_ma }}">
                        <td>

                        </td>
                        <td>
                            {{ $loop->index + 1 }}
                        </td>
                        <td>
                            {{ $room->p_ten ?? '' }}
                        </td>
                        <td style="text-align: center;" >
                            {{ $room->p_danhGia ?? '' }}
                        </td>

                        <td>
                                <a class="btn btn-xs btn-primary" href="{{ route('manager.rooms.show', $room->p_ma) }}">
                                    {{ trans('global.view') }}
                                </a>
                                <a class="btn btn-xs btn-info" href="{{ route('manager.rooms.edit', $room->p_ma) }}">
                                    {{ trans('global.edit') }}
                                </a>
                                <form action="{{ route('manager.rooms.destroy', $room->p_ma) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                </form>

                        </td>

                    </tr>
                        </tr>
                        <?php
                        $stt++;
                        ?>
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
@can('room_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('manager.rooms.massDestroy') }}",
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
  $('.datatable-Room:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
