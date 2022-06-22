@extends('admin.homeMG')
@section('title')
Dashboard
@endsection
@section('content')

<div id="carouselExampleIndicators" class="carousel slide" data-slick="autoplay :true, autoplaySpeed:5" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
          <h2> Thống kê theo ngày</h2>
        <div class="row" id="day">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">contact_mail</i>
                  </div>
                  <p class="card-category"> Khách online</p>
                  <h3 class="card-title">+{{$kholn}}

                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i>
                   <samp>Thêm Mới Hôm Nay</samp>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">hail</i>
                    </div>
                    <p class="card-category">Khách offline</p>
                    <h3 class="card-title">+{{$khoff}}</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> <samp>Thêm Mới Hôm Nay</samp>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">price_check</i>
                  </div>
                  <p class="card-category">Doanh Thu: <small>VNĐ</small>    </p>
                  <h3 class="card-title">+{{$doanhthu*1000}} </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i>   <samp>Ngày Hôm Nay</samp>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">receipt_long</i>
                  </div>
                  <p class="card-category">Hóa đơn</p>
                  <h3 class="card-title">+{{$hoadon}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i>   <samp>Thêm Mới Hôm Nay</samp>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="carousel-item">
        <h2> Thống kê theo Tháng</h2>
        <div class="row "  id="mont">
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-warning card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">contact_mail</i>
                  </div>
                  <p class="card-category"> Khách online</p>
                  <h3 class="card-title">+{{$kholnthang}}

                  </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">update</i>
                   <samp>Thêm Mới Hôm Nay</samp>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                  <div class="card-header card-header-info card-header-icon">
                    <div class="card-icon">
                      <i class="material-icons">hail</i>
                    </div>
                    <p class="card-category">Khách offline</p>
                    <h3 class="card-title">+{{$khoffthang}}</h3>
                  </div>
                  <div class="card-footer">
                    <div class="stats">
                      <i class="material-icons">update</i> <samp>Thêm Mới Hôm Nay</samp>
                    </div>
                  </div>
                </div>
              </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-success card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">price_check</i>
                  </div>
                  <p class="card-category">Doanh Thu: <small>VNĐ</small>    </p>
                  <h3 class="card-title">+{{$hoadonthang*1000}} </h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">date_range</i>   <samp>Ngày Hôm Nay</samp>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="card card-stats">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">receipt_long</i>
                  </div>
                  <p class="card-category">Hóa đơn</p>
                  <h3 class="card-title">+{{$sohoadonthang}}</h3>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <i class="material-icons">local_offer</i>   <samp>Thêm Mới Hôm Nay</samp>
                  </div>
                </div>
              </div>
            </div>
          </div>


      </div>

    </div>
    <a style="color: red " class=" carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class=" carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


      {{-- <div class="row" id="day">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">contact_mail</i>
              </div>
              <p class="card-category"> Khách online</p>
              <h3 class="card-title">+{{$kholn}}

              </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">update</i>
               <samp>Thêm Mới Hôm Nay</samp>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-header card-header-info card-header-icon">
                <div class="card-icon">
                  <i class="material-icons">hail</i>
                </div>
                <p class="card-category">Khách offline</p>
                <h3 class="card-title">+{{$khoff}}</h3>
              </div>
              <div class="card-footer">
                <div class="stats">
                  <i class="material-icons">update</i> <samp>Thêm Mới Hôm Nay</samp>
                </div>
              </div>
            </div>
          </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">price_check</i>
              </div>
              <p class="card-category">Doanh Thu: <small>VNĐ</small>    </p>
              <h3 class="card-title">+{{$doanhthu*1000}} </h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i>   <samp>Ngày Hôm Nay</samp>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                <i class="material-icons">receipt_long</i>
              </div>
              <p class="card-category">Hóa đơn</p>
              <h3 class="card-title">+{{$hoadon}}</h3>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">local_offer</i>   <samp>Thêm Mới Hôm Nay</samp>
              </div>
            </div>
          </div>
        </div>
      </div> --}}



{{--  --}}




      {{-- chart --}}

      <div class="row">
        <div class="col-md-12">
          <div class="card card-chart">
            <div class="card-header card-header-success">
             {{--  --}}
             <div id="chartContainer" style="height: 250px; width: 100%;"></div>

             {{--  --}}
            </div>
            <div class="card-body">
              <h4 class="card-title">Tổng Doanh Thu Ngày:<i class="fa fa-long-arrow-up"></i>  <span class="text-success">{{$doanhthu}}.000 VNĐ </span> </h4>

              <p class="card-category">
                <span class="text-success"> </span> </p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated 4 minutes ago
              </div>
            </div>
          </div>
        </div>


        <div class="col-md-12">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
                <div id="chartContainer1" style="height: 250px; width: 100%;"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Tổng Doanh Thu Tuần:<span class="text-success"> {{$hoadonweek}}.000 VNĐ</span> </h4>

            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-12">
            <div class="card card-chart">
              <div class="card-header card-header-info">
                  <div id="chartContainer2" style="height: 250px; width: 100%;"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Tổng Doanh Thu Tháng : <span class="text-success">{{$hoadonthang}}.000 VNĐ</span>  </h4>

            </div>
            <div class="card-footer">
              <div class="stats">

              </div>
            </div>
          </div>
        </div>
      </div>


<script>
window.onload = function () {

    var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Doanh Thu Ngày"
	},
	axisY: {
		title: "Nghìn VNĐ"
	},
	data: [{
		type: "column",
        yValueFormatString: "#,##0.## Nghìn VNĐ",
		dataPoints: <?php echo json_encode($day1, JSON_NUMERIC_CHECK); ?>
	}]
    });
var chart1 = new CanvasJS.Chart("chartContainer1", {
        title: {
            text: "Doanh Thu Tuần "
        },
        axisY: {
            title: "Nghìn VNĐ"
        },
        data: [{
            type: "column",
            yValueFormatString: "#,##0.## Nghìn VNĐ",
            dataPoints: <?php echo json_encode($week, JSON_NUMERIC_CHECK); ?>
        }]
    });
    var chart2 = new CanvasJS.Chart("chartContainer2", {
        title: {
            text: "Doanh Thu Tháng "
        },
        axisY: {
            title: "Nghìn VNĐ"
        },
        data: [{
            type: "column",
            yValueFormatString: "#,##0.## Nghìn VNĐ",
            dataPoints: <?php echo json_encode($thang, JSON_NUMERIC_CHECK); ?>
        }]
    });


chart.render();
chart1.render();
chart2.render();

}
</script>
<script><script>
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

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   </script>


<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>



      @endsection



