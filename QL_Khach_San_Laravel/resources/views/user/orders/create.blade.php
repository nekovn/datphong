@extends('user.orders.app')

@section('title')
    BOOKING ROOM
@stop

@section('content')
    <!-- =========== PAGE TITLE ========== -->
    @foreach ($lp as $lp)
        {{-- @php
        dd($lp);
    @endphp --}}
        <div class="page_title gradient_overlay" style="background: url({{ asset('app/images/page_title_bg.jpg') }});">
            <div class="container">
                <div class="inner">
                    <h1>Books {{ $lp->lp_ten }}</h1>
                    <ol class="breadcrumb">
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('orders') }}">List Room Type</a></li>
                        <li>Booking Room</li>
                    </ol>
                </div>
                <div class="price">
                    <div class="inner" style="width: 150px;">
                        {{ $lp->lp_giaBan }}.000 VNĐ <span>per night</span>
                    </div>
                </div>
            </div>
        </div>
        <!-- =========== MAIN ========== -->
        <main id="room_page">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="sidebar">
                            <aside class="widget">
                                <!-- ========== BOOKING FORM ========== -->

                                <div class="vbf">
                                    <h2 class="form_title"><i class="fa fa-calendar"></i> BOOK ONLINE</h2>
                                    <form class="inner" action="{{ route('orders.store') }}" method="POST">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="lp_ma" value="{{ $lp->lp_ma }}">
                                        <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                                        <div class="form-group">
                                            <label for="p_ma">Phòng</label>

                                            <select name="p_ma" id="myInput1" onchange="myFunction2()" class="form-control">

                                                @foreach ($phong as $phong)
                                                    <option  value="{{ $phong->p_ma }}" selected>{{ $phong->p_ten }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="phong">Room Info {{ $lp->lp_thongTin }}</label>
                                            <p>No:{{ old('p_ma') }} <br>
                                                {{ $lp->lp_giaBan }}000 VNĐ
                                                <span>/ night</span>
                                            </p>
                                        </div>
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <input class="form-control" name="name" placeholder="Enter Your Name"
                                                type="text" value="{{ old('name', Auth::user()->kh_hoTen) }}">
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                            <input class="form-control" name="phone"
                                                value="{{ old('phone', Auth::user()->kh_dienThoai) }}" type="text">
                                            @if ($errors->has('phone'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class=" col-md-6 col-sm-6 col-xs-12 nopadding">
                                            <div class="input-group"><span class="">
                                                <strong>Time Check In</strong>
                                            </span>
                                                <div class="form_date">
                                                    <input type="date" class="form-control"
                                                        value="{{ old('bk_thoiGianBatDau') }}" name="bk_thoiGianBatDau"
                                                        placeholder="Arrival Date">
                                                    @if ($errors->has('bk_thoiGianBatDau'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('bk_thoiGianBatDau') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group{{ $errors->has('bk_thoiGianKetThuc') ? ' has-error' : '' }} col-md-6 col-sm-6 col-xs-12 nopadding">
                                            <div class="input-group"><span class="">
                                                <strong>Time Check Out</strong>
                                            </span>
                                                <div class="form_date">
                                                    <input type="date" class=" form-control" name="bk_thoiGianKetThuc"
                                                        value="{{ old('bk_thoiGianKetThuc') }}"
                                                        placeholder="Departure Date">
                                                    @if ($errors->has('bk_thoiGianKetThuc'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('bk_thoiGianKetThuc') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <button class="button btn_lg btn_blue btn_full" type="submit">BOOK A ROOM NOW
                                        </button>
                                    </form>
                                </div>
                            </aside>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="table-responsive">
                            <!-- Tạo table hiển thị danh sách các sản phẩm -->
                            <table autofocus id="myTable" style="text-align: center;" class="table table-bordered">
                                <div class="flash-message">
                                    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                                        @if (Session::has('alert-' . $msg))
                                            <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a
                                                    href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                                                   <?php
                                                   $title=$msg;
                                                   $text= Session::get('alert-' . $msg);
                                    echo "<script type='text/javascript'>alert('$text');</script>";
                                                       ?>

                                        @endif
                                    @endforeach
                                </div>
                                <caption id="myDIV" style="text-align: center">
                                    <h1 id="demo"> List Current Reservation Room </h1>
                                </caption>
                                <thead >
                                    <tr style="text-align: center">
                                        <th autofocus style="text-align: center">     Order ID</th>
                                        <th style="text-align: center">    Room ID</th>
                                        <th style="text-align: center">    Check In Date</th>
                                        <th style="text-align: center">    Check Out Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $a = $lp->lp_ma;
                                    // $phong = DB::select('select * from booking where bk_trangThai = 1 and bk_maLoaiPhong=' .
                                    // $a); 

                                    $b = DB::select(
                                    ' SELECT * FROM booking as bk
                                    INNER JOIN loai_phong as l on l.lp_ma=bk.bk_maLoaiPhong
                                    INNER JOIN phong as p on p.p_ma=bk.p_ma
                                    WHERE bk_trangThai=2 AND day(bk_thoiGianBatDau) >=day(CURRENT_TIMESTAMP)  and bk_maLoaiPhong='.$a

                                    );
                                    ?>
                                    <?php $stt = 1; ?>
                                    @foreach ($b as $bk)
                                        <tr>
                                            <td >{{ $loop->index + 1 }}</td>
                                            <td style="display: none">{{ $bk->p_ma }}</td>
                                            <td >{{ $bk->p_ten }}</td>
                                            <td>{{date('d-m',strtotime($bk->bk_thoiGianBatDau))}}</td>
                                            <td>{{date('d-m',strtotime($bk->bk_thoiGianKetThuc)) }}</td>
                                        </tr>
                                        <?php $stt++; ?>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                  <footer class="footer">
            <div class="container-fluid">
              <div class="copyright float-right" style="text-align: right;">
                &copy;
                <script>
                  document.write(new Date().getFullYear())
                </script>, Pham Tuan Hotel <i class="material-icons">favorite</i>
                your favorite.
              </div>
            </div>
          </footer>
            </div>
        </main>
    @endforeach

@stop
@section('custom-scripts')
    <script>
        function myFunction2() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput1");
            var x = document.getElementById("myInput1").value;
            document.getElementById("demo").innerHTML = " Current Reservation " ;
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

    </script>
@endsection
