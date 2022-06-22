  @extends('layouts.master')

@section('title')
Thêm Mới Phòng
@endsection

@section('feature-title')
Thêm mới Phòng    
@endsection

@section('feature-description')
Thêm Mới Phòng. Vui lòng nhập thông tin và bấm Lưu.
@endsection

@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
@endsection

@section('content')
@if ($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif

<form method="post" action="{{ route('phong.store') }}" enctype="multipart/form-data">
  {{ csrf_field() }}
  <div class="form-group">
    <label for="lp_ma">Loại Phòng</label>
     <select name="lp_ma" class="form-control">
      @foreach($danhsachphong as $loai)
      @if(old('lp_ma') == $loai->lp_ma)
      <option value="{{ $loai->lp_ma }}" selected>{{ $loai->lp_ten }}</option>
      @else
      <option value="{{ $loai->lp_ma }}"selected>{{ $loai->lp_ten }}</option>
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
    <input type="text" class="form-control" id="p_danhGia" name="p_danhGia" value="{{ old('p_danhGia') }}">
  </div>
  <div class="form-group">
    <label for="p_trangThai">Trạng thái</label>
    <select name="p_trangThai" class="form-control">
      <option value="2" {{ old('p_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
      <option value="1" {{ old('p_trangThai') == 1 ? "selected" : "" }}>Khóa</option>
    
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<!-- Các script dành cho thư viện bootstrap-fileinput -->
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>



<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('vendor/input-mask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('vendor/input-mask/bindings/inputmask.binding.js') }}"></script>

@endsection