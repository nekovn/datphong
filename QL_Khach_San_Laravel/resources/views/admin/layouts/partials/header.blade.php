<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PhamTuanHotel') }}</title>


    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="\css\loginstyle.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <style>

    </style>

</head>
<body>
    <div id="app"   >
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div style="margin-left: 0" class="container" >


                   <a class="navbar-brand" style="color: #f9ad19" href="{{ url('/') }}">
                    <i class="material-icons">hotel_class</i>  <samp>PhamTuanHotel</samp>
                </a>



                <a class="nav-link" href="{{ url('/admin') }}" >
                    <i class="material-icons">store</i>
                    <p class="d-lg-none d-md-block">
                    </p>
                </a>
                <a class="navbar-brand" href="{{ url('/admin') }}">
                    <samp>Admin</samp>
                </a>




                <?php $count=DB::table('booking')->select(  'bk_ma' )->where ('bk_trangThai',1 )->count();  ?>

                      <a class="nav-link" href="{{ route("backend.booking.index") }}" id="bk">
                        <i  class="material-icons">notifications</i>
                        <span style="color: red" class="notification">{{$count}}</span>
                        <p class="d-lg-none d-md-block">

                        </p>
                      </a>



                  <a class="navbar-brand"  href="{{ route("backend.booking.index") }}">
                  <samp>Duyệt books</samp>
                </a>



                <a class="nav-link" href="{{ url('/manager') }}" >
                    <i class="material-icons">dashboard</i>
                    <p class="d-lg-none d-md-block">
                    </p>
                </a>
                <a class="navbar-brand  " href="{{ url('/manager') }}">
                     <samp>Quản lý</samp>

                </a>
                <a class="nav-link" href="https://cit111.freshchat.com/a/493108077264171/inbox/2/0/conversation/493109144774269" >
                    <i class="material-icons">sms</i>
                    <p class="d-lg-none d-md-block">
                    </p>
                </a>
                <a class="navbar-brand  " href="https://cit111.freshchat.com/a/493108077264171/inbox/2/0/conversation/493109144774269">
                     <samp>Tin Nhấn</samp>

                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div   class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto ">
                        <!-- Authentication Links -->


                            <li  class="nav-item dropdown">




                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="material-icons">perm_identity</i> <samp></samp>{{ Auth::user()->nv_hoTen }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>

                    </ul>
                </div>
            </div>
        </nav>


    </div>
</body>
</html>
