@extends('layouts.master')
@section('title')
Thêm Mới Loại Phòng
@endsection
@section('title')
Cập nhật Loại phòng
@endsection

@section('feature-title')
Cập nhật Loại phòng
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

<form method="post" action="{{ route('admin.update') }}" enctype="multipart/form-data">
    <input type="hidden"id="p_ma" name="_method" value="" />
    {{ csrf_field() }}

    <input type="hidden"id="p_ma" name="p_ma" value="{{$id}}">
    <div class="form-group">
      <label for="kh_ten">Họ Tên Khách Hàng</label>
      <input type="text" class="form-control" id="kh_ten" name="kh_ten" value="{{ old('p_ten', $db->p_ten) }}">
    </div>
    <div class="form-group">
      <label for="kh_diaChi">Địa Chỉ Khách Hàng</label>
      <input type="text" class="form-control" id="kh_diaChi" name="kh_diaChi" value="{{ old('kh_diaChi') }}">
    </div>
    <div class="form-group">
      <label for="kh_dienThoai">Số Điện Thoại</label>
      <input type="text" class="form-control" id="kh_dienThoai" name="kh_dienThoai" value="{{ old('kh_dienThoai') }}">
    </div>

    <div class="form-group">
      <label for="kh_gioiTinh">Giới Tính</label>
      <select name="kh_gioiTinh" class="form-control">
           <option value="1" {{ old('kh_gioiTinh') == 1 ? "selected" : "" }}>Nam</option>
          <option value="0" {{ old('kh_gioiTinh') == 0 ?  : "" }}>Nữ</option>

      </select>
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

<script>
  $(document).ready(function() {
    $("#lp_hinh").fileinput({
      theme: 'fas',
      showUpload: false,
      showCaption: false,
      browseClass: "btn btn-primary btn-lg",
      fileType: "any",
      previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
    });
  });
</script>

<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('vendor/input-mask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('vendor/input-mask/bindings/inputmask.binding.js') }}"></script>

<script>
  $(document).ready(function() {

    $('#lp_giaBan').inputmask({
      alias: 'currency',
      positionCaretOnClick: "radixFocus",
      radixPoint: ".",
      _radixDance: true,
      numericInput: true,
      groupSeparator: ",",
      suffix: ' vnđ',
      min: 0,         // 0 ngàn
      max: 100000000, // 1 trăm triệu
      autoUnmask: true,
      removeMaskOnSubmit: true,
      unmaskAsNumber: true,
      inputtype: 'text',
      placeholder: "0",
      definitions: {
        "0": {
          validator: "[0-9\uFF11-\uFF19]"
        }
      }
    });

    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Ngày tạo mới


    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Ngày cập nhật
  });
</script>

@endsection
