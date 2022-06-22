@extends('admin.homeMG')
@section('title')
Danh Sách Nhân Viên
@endsection


@section('content')



<h2   >Danh sách nhân viên </h2>
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('manager.users.create') }}">
                Thêm nhân viên mới
            </a>
        </div>
    </div>
<div class="card">
    <div class="card-header">
    </div>
    {{-- <a href="{{ route('phong.create') }}" class="btn btn-primary">Thêm mới phòng</a>
    <input class="Search" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for " title="Type in a name"> --}}
    <div class="card-body" >
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th width="50">
                            ID
                        </th>
                        <th>
                            Họ Tên Nhân Viên
                        </th>
                        <th>
                            Email nhân viên
                        </th>
                        <th>
                            Số Điện Thoại
                        </th>
                        <th>
                            Địa Chỉ
                        </th>
                        <th>
                           Trạng Thái
                        </th>
                        <th>

                        </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 1;
                    ?>
                    @foreach($users as $key => $user)
                        <tr data-entry-id="{{ $user->id }}">
                            <td>

                            </td>
                            <td width="10">
                                {{ $loop->index + 1 }}
                            </td>
                            <td>
                                {{ $user->nv_hoTen ?? '' }}
                            </td>
                            <td>
                                {{ $user->nv_email ?? '' }}
                            </td>
                            <td>
                                {{ $user->nv_dienThoai ?? '' }}
                            </td>
                            <td>
                                {{ $user->nv_diaChi ?? '' }}
                            </td>
                            <td>

                                <span class="label label-info">
                                    @if( $user->nv_trangThai ==1) Khóa
                                    @else Khả Dụng
                                    @endif
                                </span>
                            </td>
                            <td>

                                    <a class="btn btn-xs btn-primary" href="{{ route('manager.users.show', $user->id) }}">
                                       Show
                                    </a>
                                    <a class="btn btn-xs btn-info" href="{{ route('manager.users.edit', [ $user->id]) }}">
                                        Edit
                                    </a>
                                    <form action="{{ route('manager.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
          element = document.getElementById("id2");
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
@can('user_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('manager.users.massDestroy') }}",
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
  $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>


@endsection



