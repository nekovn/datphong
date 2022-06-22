@extends('user.khachhang.app')

@section('title')
    User |{{ Auth::user()->kh_hoTen }}
@stop
@section('custom-style')
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />

    <link rel="stylesheet" href="sweetalert2.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
    <style>
        html,
        body,
        label,
        text,
        table,
        form {
            background-color: #fff;
            color: #636b6f;
            font-family: horizontal-tb !important;
            font-weight: 200;
            margin: 0;
            font-size: 14px;


        }

        .links>a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        body {
            font-size: 17px;
            margin-top: 0px;
            color: #1a202c;
            text-align: left;

        }

        .main-body {
            padding: 15px;
        }

        .card {
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0, 0, 0, .125);
            border-radius: 3.25rem;

        }

        .main-breadcrumb {
            margin-top: 80px;
            height: 200;
        }

        .btn {
            padding: 0.375rem 1.75rem;
            border-radius: 1rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .row {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            margin-right: -12px;
            margin-left: -2px;
        }


        .bg-gray-300 {
            background-color: #e2e8f0;
        }

        .h-100 {
            height: 100% !important;
        }

        .shadow-none {
            box-shadow: none !important;
        }

    </style>

@endsection

@section('content')
<div  style="background-color: #eee;">
    <div class="page_title gradient_overlay" style="background: url({{ asset('app/images/page_title_bg.jpg') }});">
        <div class="container" style="">
            <div class="inner">
                <h1></h1>
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a  href="#">User Profile</a></li>
                </ol>
            </div>

        </div>
    </div>
    <div class="container"  data-color="azure">
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
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                                             <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                @if (Auth::user()->kh_gioiTinh == 1)<img
                                        src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin"
                                        class="rounded-circle" width="150">
                                @else<img src="https://bootdey.com/img/Content/avatar/avatar8.png" alt="Admin"
                                        class="rounded-circle" width="150">
                                @endif

                                <div class="mt-6">
                                    <h4 style="margin-top: 20px">{{ Auth::user()->kh_hoTen }}</h4>
                                    <h5 class="text-secondary mb-1">{{ Auth::user()->kh_dienThoai }}</h5>
                                    <h5 class="text-muted font-size-sm">{{ Auth::user()->kh_diaChi }}</h5>





                                    <div class="tab">



                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>

                </div>


                <div class="col-md-8">
                    <div class="card mb-3">
                      <div class="card-header card-header-primary">
                        <h4 class="card-title">Edit Profile</h4>
                        <p class="card-category">Complete your profile</p>
                      </div>
                      <div class="card-body">
                        <form class="form-horizontal" method="POST" action="{{ route('user.update',[ Auth::user()->id] ) }}">
                            {{ csrf_field() }}
                            <input type="hidden" name="_method" value="PUT" />
                          <div class="row">

                            <div class="col-md-5">
                              <div class="form-group">
                                <label class="bmd-label-floating">Username</label>
                                <input id="email" type="text" class="form-control" name="email" value="{{ old('email',Auth::user()->email) }}" required autofocus>

                                @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="bmd-label-floating">Password</label>
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                              </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label class="bmd-label-floating"> ReEnterPassword</label>
                                  <input id="password" type="password" class="form-control" name="password" required>

                                  @if ($errors->has('password'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('password') }}</strong>
                                  </span>
                                  @endif
                                </div>
                              </div>
                          </div>
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="bmd-label-floating">Full Name</label>
                                <input id="kh_hoTen" type="text" class="form-control" name="kh_hoTen" value="{{ old('kh_hoTen',Auth::user()->kh_hoTen) }}" required autofocus>

                                @if ($errors->has('kh_hoTen'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kh_hoTen') }}</strong>
                                </span>
                                @endif
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="bmd-label-floating">Male or Female</label>
                                <select class=" selectpicker" name="kh_gioiTinh">
                                    <option value="1" {{ old('kh_hoTen') == '1' ? 'checked' : '' }}>Male </option>
                                    <option value="0" {{ old('kh_hoTen') == '0' ? 'checked' : '' }}>Female</option>
                                    <option value="2" {{ old('kh_hoTen') == '2' ? 'checked' : '' }}>Other</option>
                                </select>

                                @if ($errors->has('kh_gioiTinh'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kh_gioiTinh') }}</strong>
                                </span>
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-md-5">
                              <div class="form-group">
                                <label class="bmd-label-floating">Email</label>
                                <input id="kh_email" type="email" class="form-control" name="kh_email" value="{{ old('kh_email',Auth::user()->kh_email) }}" required >

                                @if ($errors->has('kh_email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kh_email') }}</strong>
                                </span>
                                @endif
                              </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Adress</label>
                                  <input id="kh_diaChi" type="text" class="form-control" name="kh_diaChi" value="{{ old('kh_diaChi',Auth::user()->kh_diaChi) }}" required autofocus>

                                  @if ($errors->has('kh_diaChi'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('kh_diaChi') }}</strong>
                                  </span>
                                  @endif
                                </div>
                              </div>
                                 <div class="col-md-3">
                              <div class="form-group">
                                <label class="bmd-label-floating">Phone</label>
                                <input id="kh_dienThoai" type="text" class="form-control" name="kh_dienThoai" value="{{ old('kh_dienThoai',Auth::user()->kh_dienThoai) }}" required autofocus>

                                @if ($errors->has('kh_dienThoai'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('kh_dienThoai') }}</strong>
                                </span>
                                @endif
                              </div>
                            </div>
                          </div>
                          <div class="row">



                          </div>
                          <button type="submit" style="font-size: 13px" class="btn btn-primary pull-right">Update Profile</button>
                          <div class="clearfix"></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                <div  class="tabcontent">
                    <div class="card mt-10">
                        <div class="tab-content">
                            @include('user.khachhang.show' )
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container-fluid">
              <nav class="float-left">

              </nav>
              <div class="copyright float-right">
                &copy;
                <script>
                  document.write(new Date().getFullYear())
                </script>, Pham Tuan Hotel <i class="material-icons">favorite</i>
                your favorite.
              </div>
            </div>
          </footer>
</div>

        @endsection




        @section('custom-scripts')
        <script  language="javascript">
            function myFunction6() {
                Swal.fire({

                        icon: 'sad',
                        title: 'asd',
                        showConfirmButton: true ,
                        timer: 1500
                        })
            }
          window.onload = myFunction6()

        </script>
    <script>
        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }

    </script>
 <script src="../assets/js/plugins/sweetalert2.js"></script>
@endsection
