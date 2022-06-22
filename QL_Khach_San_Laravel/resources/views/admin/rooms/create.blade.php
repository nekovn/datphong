@extends('admin.layouts.partials.CSSKid')
@section('title')
Danh Sách Loại Phòng
@endsection
@section('content')
<a class="btn btn-default" href="{{ route('manager.rooms.index') }}">
    {{ trans('global.back_to_list') }}
</a>


    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.room.title_singular') }}
        </div>

        <div class="card-body">
            <form method="post" action="{{ route('manager.rooms.store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="lp_ma">Loại Phòng</label>
                    <select name="lp_ma" class="form-control">
                        @foreach ($danhsachphong as $loai)
                            @if (old('lp_ma') == $loai->lp_ma)
                                <option value="{{ $loai->lp_ma }}" selected>{{ $loai->lp_ten }}</option>
                            @else
                                <option value="{{ $loai->lp_ma }}" selected>{{ $loai->lp_ten }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="p_ten">Tên Phòng</label>
                    <input type="text" class="form-control" id="p_ten" name="p_ten" value="{{ old('p_ten') }}">
                </div>

                <div class="form-group">
                    <label for="sp_danhGia">Đánh giá</label>
                    <input type="text" class="form-control" id="p_danhGia" name="p_danhGia"
                        value="{{ old('p_danhGia') }}">
                </div>
                <div class="form-group">
                    <label for="p_trangThai">Trạng thái</label>
                    <select name="p_trangThai" class="form-control">
                        <option value="2" {{ old('p_trangThai') == 2 ? 'selected' : '' }}>Khả dụng</option>
                        <option value="1" {{ old('p_trangThai') == 1 ? 'selected' : '' }}>Khóa</option>

                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>



@endsection
