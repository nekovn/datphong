<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Hotel | @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">

    <!-- Custom CSS -->
    <!-- <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}"> -->
    <!-- Các custom style dành riêng cho từng view -->
<style> .img-list {
    width: 100px;
    height: 100px;
  }
  #myInput ,#myInput1,#myInput2,#myInput3,#myInput4  {
    width: 50%;
    font-size: 16px;
    padding: 12px 20px 12px 20px;
    border: 1px solid #ddd;
    margin-bottom: 12px;
}
.Search{

  margin: 50px ;
}</style>
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css" />
    @yield('custom-css')

  </head>
  <body>
    <!-- Navbar -->
    @include('layouts.partials.navbar')
    <!-- End Navbar -->

    <!-- Main content -->
    <div class="container-fluid">
        <div class="row" style="margin-top: 70px;">
            <!-- Sidebar -->
            @include('layouts.partials.sidebar')
            <!-- End sidebar -->

            <!-- Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">@yield('feature-title')</h1>
                    <small>@yield('feature-description')</small>
                </div>
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
    <script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
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
}</script>
    <!-- Các custom script dành riêng cho từng view -->
    @yield('custom-scripts')

  </body>
</html>