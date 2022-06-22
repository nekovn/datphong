<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Hotel | @yield('title')</title>
    @yield('custom-css')
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
  </head>
  <body>
    <!-- Navbar -->

    <!-- End Navbar -->
     @include('admin.layouts.partials.header')
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
    <!-- Main content -->
    <div class="container-fluid">
        <div class="row" >
            <!-- Content -->
            <main role="main" class="  px-4">

                @yield('content')

            </main>
            <!-- End content -->
        </div>
    </div>
    <!-- End main content -->

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!-- Thư viện Jquery validation -->
    <script src="{{ asset('vendor/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-validation/localization/messages_vi.min.js') }}"></script>
    <!-- Các custom script dành riêng cho từng view -->
    @yield('custom-scripts')

  </body>
</html>
