{{-- View này sẽ kế thừa giao diện từ `layouts.index` --}}
@extends('backend.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Danh sách Phòng
@endsection

@section('custom-css')
<style>

</style>
@endsection
@section('content')

<!-- Tạo nút Thêm mới sản phẩm
- Theo quy ước, các route đã được đăng ký trong file `web.php` đều phải được đặt tên để dễ dàng bảo trì code sau này.
- Đường dẫn URL là đường dẫn được tạo ra bằng route có tên `danhsachsanpham.create`
- Sẽ có dạng http://tenmiencuaban.com/admin/danhsachsanpham/create
-->
<a href="{{ route('phong.create') }}" class="btn btn-primary">Thêm mới phòng</a>
<a href="{{ route('phong.print') }}" class="btn btn-success">In danh sách phòng</a>
<!-- <a href="{{ route('phong.pdf') }}" class="btn btn-danger">Xuất PDF phòng</a> -->
<!-- Tạo table hiển thị danh sách các sản phẩm -->
<input class="Search" type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for " title="Type in a name">
<table id="myTable" class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Mã sản phẩm</th>
            <th>Hình</th>
            <th>Loại phòng</th>
            <th>Giá Bán</th>
            <th>Trạng thái</th>
            <th>Sửa-Xóa</th>
        </tr>
    </thead>
    <tbody>
         <?php
        $stt = 1;
        ?>
        @foreach($db as $phong)
    <tr>
      <td>{{ $loop->index + 1 }}</td>
      <td>{{ $phong->p_ten }}</td>
      <td>
        <img src="{{ asset('/storage/photos/' . $phong->lp_hinh) }}" class="img-list" />
      </td>
         <td>{{ $phong->lp_ten }}</td>
      <td>{{ $phong->lp_giaBan }}</td>
      <td>@if($phong->p_trangThai==1) Khóa
          @else Khả Dụng
          @endif
        </td>
      <td>
                <a href="{{ route('phong.edit', ['phong' => $phong->p_ma]) }}" class="btn btn-success">Sửa</a>
                <form class="d-inline" method="post" action="{{ route('phong.destroy', ['phong' => $phong->p_ma]) }}">

                    <input type="hidden" name="_method" value="DELETE" />
                    {{ csrf_field() }}
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
