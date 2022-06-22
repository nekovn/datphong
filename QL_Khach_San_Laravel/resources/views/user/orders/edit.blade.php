<?php
    $bookings= DB::select('SELECT DISTINCT  *,bk.bk_ma FROM booking  as bk
       INNER JOIN khachhang as kh on kh.kh_ma = bk.kh_ma
       INNER JOIN nhanvien as nv on nv.nv_ma = bk.nv_ma
      INNER JOIN phong as p on p.p_ma=bk.p_ma
      where bk.bk_ma='.$b);

?>
 @foreach($bookings as  $bookings)
       <table class="table table-bordered table-striped">
        <tbody>
            <tr>
                <th>
                    {{ trans('cruds.booking.fields.id') }}<?php //dd($bookings->p_ten );?>
                </th>
                <td>
                    {{ $bookings->bk_ma}}
                </td>
            </tr>
            <tr>
                <th>
                    Họ Tên Khách Hàng
                </th>
                <td>
                    {{ $bookings->kh_hoTen }}
                </td>
            </tr>
            <tr>
                <th>
                    {{ trans('cruds.booking.fields.room') }}
                </th>
                <td>
                    {{ $bookings->p_ten }}
                </td>
            </tr>
            <tr>
                <th>
                   Bắt Đầu Từ Ngày
                </th>
                <td>
                    {{date('d-m',strtotime($bookings->bk_thoiGianBatDau))}}
                </td>
            </tr>
            <tr>
                <th>
                   Kết Thúc Vào Ngày
                </th>
                <td>
                    {{date('d-m',strtotime($bookings->bk_thoiGianKetThuc))}}
                </td>
            </tr>
            <tr>
                <th>
                   Trạng Thái
                </th>
                <td>
                    @if ($bookings->bk_trangThai == 1) Đang sử lý
                    @elseif ($bookings->bk_trangThai == 2) Đẵ xác nhận
                    @elseif ($bookings->bk_trangThai == 3) Đẵ hoàn thành
                    @elseif ($bookings->bk_trangThai == 4) Đã từ chối or hủy
                    @else Khách Hàng đã hủy
                    @endif
                </td>
            </tr>
            <tr>
                <th>
                   Nhân Viên Sử Lý
                </th>
                <td>
                    {{ $bookings->nv_hoTen }}

                </td>
            </tr>
        </tbody>
    </table>














    <div class="card-body">
        <form class="form-horizontal" method="POST" action="{{ route('orders.update',[$bookings->bk_ma ] ) }}">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="PUT" />



            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-primary">
                       Save
                    </button>
                </div>
            </div>
        </form>

    </div>
    @endforeach


