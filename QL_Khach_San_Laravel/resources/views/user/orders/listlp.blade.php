@extends('orders.app')

@section('title')
HOTEL| List Room
@stop
@section('custom-css')
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

@endsection
@section('content')
    <!-- ========== REVOLUTION SLIDER ========== -->
    <!-- =========== PAGE TITLE ========== -->

    <!-- =========== MAIN ========== -->
    <main id="rooms_list">
    <div class="container">
       


    @foreach ($db as $room)

        @php
        $a=DB::select('select count(p_ma) as p from phong where lp_ma =? and p_trangThai= 2 ',[$room->lp_ma]);

        @endphp
            <article class="room_list">
                <div class="row row-flex">
                    <div class="col-lg-4 col-md-5 col-sm-12">
                        <figure>
                            <a href="{{ route('orders.create', ['id' => $room->lp_ma]) }}"
                               class="hover_effect h_link h_blue">

                                <img src="{{ asset('/storage/photos/' . $room->lp_hinh) }}" class="img-list"/>
                            </a>
                        </figure>
                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12">
                        <div class="room_details row-flex">
                            <div class="col-md-9 col-sm-9 col-xs-12 room_desc">
                                <h3>
                                    <a href=""> {{ $room->lp_ten }} </a>
                                </h3>
                                <p> {{ $room->lp_thongTin }} </p>
                                <div class="room_services">
                                    <i class="fa fa-coffee" data-toggle="popover" data-placement="top"
                                       data-trigger="hover" data-content="Breakfast Included"
                                       data-original-title="Breakfast"></i>
                                    <i class="fa fa-cutlery" data-toggle="popover" data-placement="top"
                                       data-trigger="hover" data-content="Restaurant"
                                       data-original-title="Restaurant"></i>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-12 room_price">
                                <div class="room_price_inner">
                                        <span class="room_price_number">  {{ $room->lp_giaBan  }}.000 VNĐ

                                        </span>
                                    <small class="upper"> per night</small>
                                    <a href="{{ route('orders.create', ['id' => $room->lp_ma]) }}"
                                       class="button  btn_blue btn_full upper">Book Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        @endforeach

    </div>
</main>

@endsection




