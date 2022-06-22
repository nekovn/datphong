@extends('admin.homeMG')
@section('title')
    Danh Sách Loại Phòng
@endsection
@section('content')
    <h2>Danh Sách Loại Phòng </h2>
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('manager.rooms.create') }}">
                Thêm Phòng Mới
            </a>
        </div>
    </div>


    <div class="card">
        <div class="card-header">
            {{ trans('cruds.room.title_singular') }} {{ trans('global.list') }}
        </div>

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
                                Loại Phòng
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        @foreach ($rooms as $key => $room)
                            <tr data-entry-id="{{ $room->p_ma }}">
                                <td>

                                </td>
                                <td>
                                    {{ $loop->index + 1 }}
                                </td>
                                <td>
                                    {{ $room->p_ten ?? '' }}
                                </td>
                                <td style="text-align: center;">
                                    {{ $room->p_danhGia ?? '' }}
                                </td>
                                <td>
                                    {{ $room->lp_ten ?? '' }}
                                </td>
                                <td>

                                    <a class="btn btn-xs btn-primary"
                                        href="{{ route('manager.rooms.show', $room->p_ma) }}">
                                        {{ trans('global.view') }}
                                    </a>



                                    <a class="btn btn-xs btn-info" href="{{ route('manager.rooms.edit', $room->p_ma) }}">
                                        {{ trans('global.edit') }}
                                    </a>



                                    <form action="{{ route('manager.rooms.destroy', $room->p_ma) }}" method="POST"
                                        onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                        style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"
                                            value="{{ trans('global.delete') }}">
                                    </form>


                                </td>
                            </tr>

                            <?php $stt++; ?>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        window.onload = myFunction1()

        function myFunction1() {
            var element, name, arr;
            element = document.getElementById("id4");
            name = "active";
            arr = element.className.split(" ");
            if (arr.indexOf(name) == -1) {
                element.className += " " + name;
            }
        }

    </script>
    <script>


    </script>
@endsection
