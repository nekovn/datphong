<!DOCTYPE html>
<html>
<head>
  <title>Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('/css/pay.css') }}">
  <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

  <main class="page payment-page">
    <section class="payment-form dark">
      <div class="container">
        <div class="block-heading">
          <h2>Payment</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc quam urna, dignissim nec auctor in, mattis vitae leo.</p>
        </div>

        @foreach ($db as $user)

        <form method="post" action="{{route('admin.pay')}}" enctype="multipart/form-data"> {{ csrf_field() }}
            <input type="hidden"id="p_ma" name="p_ma" value="{{$user->p_ma}}">

          <div class="products">
            <h3 class="title center">Payment</h3>
            <div class="item">
                <span class="price">{{$user->kh_hoTen}}</span>
                <p class="item-name"  >Họ và tên khách hàng</p>
                <p class="item-description"></p>
              </div>
              <div class="item">
                <span class="price">{{$user->kh_dienThoai}}</span>
                <p class="item-name">Số điện thoại </p>
              </div>
              <div class="item">
                <span class="price">{{$user->p_ten}}</span>
                <p class="item-name">Tên phòng </p>
              </div>
            <div class="item">
              <span class="price">{{$user->hd_taoMoi}}</span>
              <p class="item-name">Thời Gian ở từ ngày </p>

            </div>
            <div class="item">
              <span class="price">{{$user->hd_capNhat}}</span>
              <p class="item-name">Thời Gian ở đến ngày</p>
            </div>
            <div class="item">
                <span class="price">{{$user->lp_giaBan}}.000 VND</span>
                <p class="item-name">Giá phòng</p>
              </div>
            <div class="item">
                <span class="price">{{$days}}</span>
                <p class="item-name">Tổng số ngày </p>
              </div>

            <div class="total">Total<span class="price">{{$giatien}}.000 VND</span></div>
          </div>
          <div class="card-details">
            {{-- <h3 class="title">Credit Card Details</h3>
            <div class="row">
              <div class="form-group col-sm-7">
                <label for="card-holder">Card Holder</label>
                <input id="card-holder" type="text" class="form-control" placeholder="Card Holder" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-5">
                <label for="">Expiration Date</label>
                <div class="input-group expiration-date">
                  <input type="text" class="form-control" placeholder="MM" aria-label="MM" aria-describedby="basic-addon1">
                  <span class="date-separator">/</span>
                  <input type="text" class="form-control" placeholder="YY" aria-label="YY" aria-describedby="basic-addon1">
                </div>
              </div>
              <div class="form-group col-sm-8">
                <label for="card-number">Card Number</label>
                <input id="card-number" type="text" class="form-control" placeholder="Card Number" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div>
              <div class="form-group col-sm-4">
                <label for="cvc">CVC</label>
                <input id="cvc" type="text" class="form-control" placeholder="CVC" aria-label="Card Holder" aria-describedby="basic-addon1">
              </div> --}}
              <div class="form-group col-sm-12">
                <button type="submit" class="btn btn-primary btn-block">Proceed</button>
              </div>
            </div>
          </div>
        </form>
        @endforeach
      </div>
    </section>
  </main>
</body>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
