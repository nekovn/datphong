@extends('admin.layouts.partials.CSSKid')
@section('title')
Chỉnh Sửa Thông Tin Phòng
@endsection
@section('content')
<a class="btn btn-default" href="{{ route('manager.rooms.index') }}">
    {{ trans('global.back_to_list') }}
</a>
<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.room.title_singular') }}
    </div>

    <div class="card-body">
            <form method="post" action="{{ route('manager.rooms.update', [ $phong->p_ma]) }}" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT" />
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="lp_ma">Loại sản phẩm</label>
                    <select name="lp_ma" class="form-control">
                        @foreach($danhsachphong as $loai)
                            @if($loai->lp_ma == $phong->lp_ma)
                            <option value="{{ $loai->lp_ma }}" selected>{{ $loai->lp_ten }}</option>
                            @else
                            <option value="{{ $loai->lp_ma }}">{{ $loai->lp_ten }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="p_ten">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="p_ten" name="p_ten" value="{{ old('phong_ten', $phong->p_ten) }}">
                </div>


                <div class="form-group">
                    <label for="p_danhGia">Đánh giá</label>
                    <input type="text" class="form-control" id="p_danhGia" name="p_danhGia" value="{{ old('p_danhGia', $phong->p_danhGia) }}">
                </div>

                <div class="form-group">
                  <label for="p_trangThai">Trạng thái</label>
                  <select name="p_trangThai" class="form-control">
                     <option value="2" {{ old('p_trangThai', $phong->sp_trangThai) == 2 ? "selected" : "" }}>Khả dụng</option>
                      <option value="1" {{ old('p_trangThai', $phong->sp_trangThai) == 1 ? "selected" : "" }}>Khóa</option>

                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
    </div>
</div>



@endsection
