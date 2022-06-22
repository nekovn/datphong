{{-- View này sẽ kế thừa giao diện từ `backend.layouts.index` --}}
@extends('admin.layouts.master')

{{-- Thay thế nội dung vào Placeholder `title` của view `backend.layouts.index` --}}
@section('title')
Admin
@endsection

@section('custom-css')
    <link rel="stylesheet" href="{{ asset('css\admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css\w3.css') }}">



@endsection

</div>
@section('content')
<div class="contianer" style>

    @foreach($db as $item)
        <div   class="flip-box">
            <div class="productShow">
                <div  class="flip-box-front" >
                    <?php
                    $checkExist=DB::table('booking')->whereRaw(' DAY(bk_thoiGianBatDau) = DAY(CURRENT_TIMESTAMP) and bk_trangThai = 2 and p_ma = ?  ',[$item->p_ma])->first();
                ?>
                    @if($item->p_trangThai==1)
                        <h1 class="room" style="background-color: rgb(255, 55, 55); border-radius: 15px;" class="button button3" id="r1" ><strong>ROOM {{$item->p_ten}}  </strong> </h1>

                        @else   @if ($checkExist)
                        <h1 class="room" style="background-color: rgb(231, 235, 42);  border-radius: 15px;" class="button button3" id="r1" ><strong>ROOM {{$item->p_ten}}  </strong> </h1>
                        @else
                        <h1 class="room" style="background-color: rgb(61, 129, 255);  border-radius: 15px;" class="button button3" id="r1" ><strong>ROOM {{$item->p_ten}}  </strong> </h1>
                        @endif
                    @endif


                    <img src="{{ asset('/storage/photos/' . $item->lp_hinh) }}" class="img-list" >

                </div>

                <div  class="overlay" style="font-family: 'Nunito', sans-serif;">

                    @if($item->p_trangThai==2)

                            @if($checkExist)
                            {{-- <h1>{{$checkExist->bk_ma}}</h1> --}}
                           <?php  $hoten=DB::table('khachhang')->where('id',$checkExist->kh_ma)->first()?>

                            <p> <h3 style="background-color: rgb(61, 129, 255);  border-radius: 15px;" class="button button3 " >{{$hoten->kh_hoTen}} </h3> </p>
                            <p> <h3 style="background-color: rgb(61, 129, 255);  border-radius: 15px;" class="button button3 " >{{$hoten->kh_dienThoai}} </h3> </p>
                            <p> <a href="{{route('backend.booking.checkin',[$checkExist->bk_ma])}}"> <button title="Thủ tục nhận phòng cho khách đặt phòng" class="checkinout" onclick="return confirm('Bạn xác nhận CHECK IN cho khách hàng đặt phòng ');" style="display: inline-block;">Thêm Khách Đặt Phòng</button></a></p>


                            <form method="post" action="{{route('backend.booking.edit')}}" enctype="multipart/form-data" onsubmit="return confirm('Bạn có xác nhận của khách không nhận phòng ');" style="display: inline-block;">
                                {{ csrf_field() }}
                                <input type="hidden"id="bk_ma" name="bk_ma" value="{{$checkExist->bk_ma}}">
                                <p> <a href=""> <button type="submit" style="margin-left: 100px" class="xoa" title="Xóa niếu khách không nhận phòng">Xóa</button></a></p>
                            </form>



                            @else
                            {{-- checking new kh --}}
                                <p> <a href="{{route('admin.create',[$item->p_ma])}}"> <button class="checkinout" title="Thủ tục nhận phòng cho khách chưa đặt phòng " onclick="return confirm('Bạn xác nhận CHECK IN cho khách hàng MỚi ');" style="display: inline-block;">Check in</button></a></p>
                            @endif
                        {{-- @foreach($booking as $bookingItem)
                            @if($bookingItem->p_ma == $item->p_ma)
                                <p>ádasd</p>
                            @else
                                <p> <a href="{{route('admin.create',[$item->p_ma])}}"> <button class="checkinout">Check in</button></a></p>
                            @endif
                        @endforeach --}}
                   @endif
                   @if($item->p_trangThai==1)
                    <p> <a href="{{route('admin.update',[$item->p_ma])}}"><button  class="checkinout" title="Thủ tục trả phòng" onclick="return confirm('Bạn xác nhận cập nhật lại ngày trả phòng cho hóa đơn ');" style="display: inline-block;">Check out</button></a></p>
                    <a href="{{route('admin.show',[$item->p_ma])}}"><button title="Thủ tục thanh toán" style="margin-left: 100px"class="pay" >Pay</button></a>
                    {{-- <a href="{{route('admin.destroy',[$item->p_ma])}}"> <button  class="xoa" >xoa</button></a> --}}
                    @endif
                </div>
                </div>
            </div>

@endforeach
</div>

@endsection
