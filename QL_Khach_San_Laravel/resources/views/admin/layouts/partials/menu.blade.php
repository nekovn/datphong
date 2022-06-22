<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">  <a style="color: #f9ad19" href="#" class="simple-text logo-normal">
        <i class="material-icons">hotel_class</i>
      <samp> PhamTuan Hotel</samp>
      </a></div>

    <div class="sidebar-wrapper" style="background-image: ../assets/img/sidebar-1.jpg" >



      <ul class="nav">
        <li id="id1" class="nav-item   ">
          <a class="nav-link" href="{{ url("manager") }}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li  class="nav-item   ">
            <a class="nav-link" href="{{ url("admin") }}">
              <i class="material-icons">store</i>
              <p>Admin</p>
            </a>
          </li>
        <li  id="id2"class="nav-item ">
          <a class="nav-link" href="{{ route("manager.users.index") }}">
            <i class="material-icons">person</i>
            <p>Nhân Viên</p>
          </a>
        </li>
        <li id="id3" class="nav-item ">
          <a class="nav-link" href="{{ route("manager.room-types.index") }}">
            <i class="material-icons">content_paste</i>
            <p>  Loại Phòng</p>
          </a>
        </li>
        <li id="id4" class="nav-item ">
          <a class="nav-link" href="{{ route("manager.rooms.index") }}">
            <i class="material-icons">bedroom_child</i>
            <p>  Phòng</p>
          </a>
        </li>
        <li id="id5" class="nav-item ">
          <a class="nav-link" href="{{ route("manager.khachhang.index") }}">
            <i class="material-icons">transfer_within_a_station</i>
            <p> Khách Hàng</p>
          </a>
        </li>
        <li  id="id6" class="nav-item ">
          <a class="nav-link" href="{{ route("manager.bookings.index") }}">
            <i class="material-icons">pending_actions</i>
            <p>  Đặt Phòng/Hóa đơn</p>
          </a>
        </li>
        <li class="nav-item ">
            <a href="#" class="nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
            <i class="material-icons">logout</i>
            <p>{{ trans('global.logout') }}</p>

            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
          </a>
        </li>


      </ul>
    </div>
  </div>
