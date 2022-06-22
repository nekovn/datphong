<?php
    $a= DB::select('SELECT DISTINCT  *,bk.bk_ma FROM booking  as bk
       INNER JOIN khachhang as kh on kh.id   = bk.kh_ma
       INNER JOIN nhanvien as nv on nv.id = bk.nv_ma
      INNER JOIN phong as p on p.p_ma=bk.p_ma
      where bk.kh_ma='.Auth::user()->id.' ORDER BY bk_ma DESC');



?>
     <div class="card-header card-header-primary">
        <h4 class="card-title"></h4>
        <p class="card-category"> Your Reckoning</p>
      </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Room">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.booking.fields.id') }}
                        </th>
                        <th>
                            Họ Và Tên Khách
                        </th>
                        <th>
                            Phòng
                        </th>
                        <th>
                            Bắt Đầu Từ Ngày
                        </th>
                        <th>
                          Kết Thúc ngày Từ Ngày
                        </th>
                        <th>
                            Giá Tiền
                          </th>
                        <th>
                            Trạng Thái
                          </th>
                          <th>
                           Hủy Đơn Đặt Phòng
                          </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $stt = 1;
                    ?>
                    @foreach($a as  $booking)
                        <tr data-entry-id="{{ $booking->bk_ma }}">
                            <td>


                            </td>
                            <td>
                                {{ $loop->index + 1 }}
                            </td>
                            <td>
                                {{ $booking->kh_hoTen  }}
                            </td>
                            <td>
                                {{ $booking->p_ten }}
                            </td>
                            <td>
                                {{date('d-m-y',strtotime($booking->bk_thoiGianBatDau))}}
                            </td>
                            <td>
                                {{date('d-m-y',strtotime($booking->bk_thoiGianKetThuc))}}
                            </td>
                            <td>
                                {{ $booking->bk_gia*1000 }}
                            </td>
                            <td>
                            @if ($booking->bk_trangThai == 1) <a type="button"  style="color: rgba(255, 255, 255, 255)" class="btn btn-light">Đang đợi xử lý</a>
                            @elseif ($booking->bk_trangThai == 2)   <a style="color: rgba(255, 255, 255, 255)" class="btn btn-xs btn-primary" >  Đẵ xác nhận</a>
                            @elseif ($booking->bk_trangThai == 3) <a style="color: rgba(255, 255, 255, 255)" class="btn btn-warning">Đang sử dụng</a>
                            @elseif ($booking->bk_trangThai == 4)  <a style="color: rgba(255, 255, 255, 255)" class="btn btn-info">Đã hoàn thành</a>
                            @elseif ($booking->bk_trangThai == 5) <a style="color: rgba(255, 255, 255, 255)" class="btn btn-secondary"> Khách Đã hủy đặt phòng</a>
                            @else  <a style="color: rgba(255, 255, 255, 255)" class="btn btn-xs btn-danger">Đặt Phòng Không Thành Công</a>


                                    @endif
                                </td>


                                <td>
                                    @if ($booking->bk_trangThai == 1 ||  $booking->bk_trangThai == 2)
                                    <form action="{{ route('orders.update',[$booking->bk_ma] ) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger"  value="{{ trans('global.delete') }}" >
                                    </form>
                                    @endif
                                </td>



                        </tr>
                        <?php
                        $stt++;
                        ?>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


