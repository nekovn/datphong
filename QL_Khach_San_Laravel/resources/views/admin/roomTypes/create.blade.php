@extends('admin.layouts.partials.CSSKid')
@section('title')
Thêm Mới Loại Phòng
@endsection
@section('styles')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
@endsection
@section('content')
<div class="form-group">
    <a class="btn btn-default" href="{{ route('manager.room-types.index') }}">
        {{ trans('global.back_to_list') }}
    </a>
</div>
<div class="card"> 
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.roomType.title_singular') }}
    </div>

    <div class="card-body">
            <form method="post" action="{{ route("manager.room-types.store") }}" enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="form-group">
                  <label for="lp_ten">Tên Loại Phòng</label>
                  <input type="text" class="form-control" id="lp_ten" name="lp_ten" value="{{ old('lp_ten') }}">
                </div>
                <div class="form-group">
                  <label for="lp_giaGoc">Giá bán</label>
                  <input type="text" class="form-control" id="lp_giaBan" name="lp_giaBan" value="{{ old('lp_giaBan') }}">
                </div>
                <div class="form-group">
                  <div class="file-loading">
                    <label>Hình đại diện</label>
                    <input id="lp_hinh" type="file" name="lp_hinh">
                  </div>
                </div>
                <div class="form-group">
                  <label for="lp_thongTin">Thông tin</label>
                  <input type="text" class="form-control" id="lp_thongTin" name="lp_thongTin" value="{{ old('lp_thongTin') }}">
                </div>

                <div class="form-group">
                  <label for="lp_trangThai">Trạng thái</label>
                  <select name="lp_trangThai" class="form-control">
                       <option value="2" {{ old('lp_trangThai') == 2 ? "selected" : "" }}>Khả dụng</option>
                    <option value="1" {{ old('lp_trangThai') == 1 ? "selected" : "" }}>Khóa</option>

                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
              </form>
    </div>
</div>



@endsection
@section('scripts')
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
      overwriteInitial: false
    });
  });
</script>

<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('vendor/input-mask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('vendor/input-mask/bindings/inputmask.binding.js') }}"></script>

<script>
  $(document).ready(function() {
    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Giá gốc


    // Gắn mặt nạ nhập liệu cho các ô nhập liệu Giá bán
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
