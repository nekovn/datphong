@extends('admin.homeMG')
@section('title')
Danh Sách Loại Phòng
@endsection
@section('content')
<h2   >Danh Sách Loại Phòng </h2>
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("manager.room-types.create") }}">
                Thêm loại phòng
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        {{ trans('cruds.roomType.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-RoomType">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.roomType.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.roomType.fields.name') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 1;
                    ?>
                    @foreach($roomTypes as $key => $roomType)
                        <tr data-entry-id="{{ $roomType->lp_ma }}">
                            <td>

                            </td>
                            <td>
                                {{ $loop->index + 1 }}
                            </td>
                            <td>
                                {{ $roomType->lp_ten ?? '' }}
                            </td>
                            <td>

                                    <a class="btn btn-xs btn-primary" href="{{ route('manager.room-types.show', $roomType->lp_ma ) }}">
                                        Show
                                    </a>
                                    <a class="btn btn-xs btn-info" href="{{ route('manager.room-types.edit', $roomType->lp_ma ) }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('manager.room-types.destroy', $roomType->lp_ma ) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>


                            </td>

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



@endsection
@section('scripts')
<script>window.onload = myFunction1()
    function myFunction1() {
          var element, name, arr;
          element = document.getElementById("id3");
          name = "active";
          arr = element.className.split(" ");
          if (arr.indexOf(name) == -1) {
            element.className += " " + name;
          }
        }
    </script>
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('room_type_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('manager.room-types.massDestroy') }}",
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
  $('.datatable-RoomType:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection
