{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('backend.master')


@section('title')
Danh sách Loại Phòng
@endsection


@section('custom-css')
<style>
 
</style>
@endsection
@section('feature-description')
Danh sách các Loại Phòng có trong Hệ thống. Bạn có thể CRUD!
@endsection

<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
@section('content')
<!-- Tạo nút Thêm mới sản phẩm 
- Theo quy ước, các route đã được đăng ký trong file `web.php` đều phải được đặt tên để dễ dàng bảo trì code sau này.
- Đường dẫn URL là đường dẫn được tạo ra bằng route có tên `danhsachsanpham.create`
- Sẽ có dạng http://tenmiencuaban.com/admin/danhsachsanpham/create
-->
<a href="{{ route('loaiphong.create') }}" class="btn btn-primary">Thêm mới loại phòng</a>
<input class="Search" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for " title="Type in a name">
<!-- Tạo table hiển thị danh sách các sản phẩm -->
<table id="myTable" class="table table-bordered">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Hình</th>
            <th>Giá Bán</th>
            <th>Thông tin</th>
            <th>Sửa-Xóa</th>
        </tr>
    </thead>
    <tbody>
       <?php
        $stt = 1;
        ?>
        @foreach($loaiphong as $loaiphong)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $loaiphong->lp_ten }}</td>
                <td>
        <img src="{{ asset('/storage/photos/' . $loaiphong->lp_hinh) }}" class="img-list" height="100" width="100" />
                </td>
                <td>{{ $loaiphong->lp_giaBan }}</td>
               <td>{{ $loaiphong->lp_thongTin }}</td>
                <td>
                  
                    <a href="{{ route('loaiphong.edit', ['loaiphong' => $loaiphong->lp_ma]) }}" class="btn btn-primary pull-left">Sửa</a>

                    <form class="d-inline" method="post" action="{{ route('loaiphong.destroy', ['loaiphong' => $loaiphong->lp_ma]) }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="DELETE" />
                    <button class="btn btn-danger">Xóa</button>
                </form>
                </td>
            </tr>
            <?php
        $stt++;
        ?>
        @endforeach
    </tbody>
</table>
@endsection

@section('custom-scripts')

@endsection