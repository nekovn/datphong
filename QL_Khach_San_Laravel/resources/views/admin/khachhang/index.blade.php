@extends('admin.homeMG')
@section('title')
    Danh Sách Khách Hàng
@endsection


@section('content')
    <h2>Danh sách Khách Hàng </h2>
    <div style="margin-bottom: 10px;" class="row">
    </div>
    <div class="card">
        <div class="card-header">
        </div>
        {{-- <a href="{{ route('phong.create') }}" class="btn btn-primary">Thêm mới phòng</a>
    <input class="Search" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for " title="Type in a name"> --}}
        <div class="card-body">
            <div class="table-responsive">
                <div class="card-body">
                    <div class="table-responsive">
                        <h2> Khách hàng hiện tại </h2>
                        <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th width="50">
                                        ID
                                    </th>
                                    <th>
                                        Phòng
                                    </th>
                                    <th>
                                        Họ Tên Khách Hàng
                                    </th>
                                    <th>
                                        Thời gian bắt đầu
                                    </th>
                                    <th>
                                        Thời gian Kết thúc
                                    </th>
                                    <th>
                                        Số Điện Thoại
                                    </th>

                                    <th>

                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $stt = 1; ?>
                                @foreach ($dangthue as $key => $user)
                                    <tr data-entry-id="{{ $user->id }}">
                                        <td>

                                        </td>
                                        <td width="10">
                                            {{ $loop->index + 1 }}
                                        </td>
                                        <td>
                                            {{ $user->p_ten ?? '' }}
                                        </td>
                                        <td>
                                            {{ $user->kh_hoTen ?? '' }}
                                        </td>
                                        <td>
                                            {{date('d-m',strtotime($user->bk_thoiGianBatDau))}}
                                        </td>
                                        <td>
                                            {{date('d-m',strtotime($user->bk_thoiGianKetThuc))}}
                                        </td>
                                        <td>
                                            {{ $user->kh_dienThoai ?? '' }}
                                        </td>

                                        <td>

                                            <a class="btn btn-xs btn-primary"
                                                href="{{ route('manager.khachhang.show', $user->id) }}">
                                                Show
                                            </a>
                                            <a class="btn btn-xs btn-info"
                                                href="{{ route('manager.khachhang.edit', [$user->id]) }}">
                                                Edit
                                            </a>





                                        </td>

                                    </tr>
                                    <?php $stt++; ?>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <h2>Danh sách khách hàng</h2>
                <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th width="50">
                                ID
                            </th>
                            <th>
                                Họ Tên Khách Hàng
                            </th>
                            <th>
                                Email Khách Hàng
                            </th>
                            <th>
                                Số Điện Thoại
                            </th>
                            <th>
                                Địa Chỉ
                            </th>
                            <th>

                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($KhachHang as $key => $user)
                            <tr data-entry-id="{{ $user->id }}">
                                <td>

                                </td>
                                <td width="10">
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    {{ $user->kh_hoTen ?? '' }}
                                </td>
                                <td>
                                    {{ $user->kh_email ?? '' }}
                                </td>
                                <td>
                                    {{ $user->kh_dienThoai ?? '' }}
                                </td>
                                <td>
                                    {{ $user->kh_diaChi ?? '' }}
                                </td>
                                <td>

                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('manager.khachhang.show', $user->id) }}">
                                        Show
                                    </a>
                                    <a class="btn btn-xs btn-info"
                                        href="{{ route('manager.khachhang.edit', [$user->id]) }}">
                                        Edit
                                    </a>

                                    <form action="{{ route('manager.khachhang.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>



                                </td>

                            </tr>
                            <?php $stt++; ?>
                        @endforeach
                    </tbody>
                </table>
                {{-- dang thuye --}}

            </div>
        </div>
    </div>




@endsection
@section('scripts')
    <script>
        window.onload = myFunction1()

        function myFunction1() {
            var element, name, arr;
            element = document.getElementById("id5");
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
            @can('khachhang_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('manager.khachhang.massDestroy') }}",
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
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            $('.datatable-User:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });
        })

    </script>


@endsection
