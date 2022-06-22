<!DOCTYPE html>
<html>
 <title>Quoc Tuan Hotel | Home1</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="\css\w3.css">
<link rel="stylesheet" href="\css\login.css">
<link rel="stylesheet" href="\css\loginstyle.css">
<script src="js\w3.js"></script>
<script src="js\login.js"></script>
<link rel="stylesheet" href="\css\fonts.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"  />
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<body>
<!-- Navbar (Sits on top) -->
<div class="w3-top w3-hide-small">
  <div class="w3-bar w3-xlarge w3-black w3-opacity w3-hover-opacity-off" id="myNavbar">
    <a href="/" class="w3-bar-item w3-button">HOME</a>
    <a href="{{route('Admin.index')}}" class="w3-bar-item w3-button">MENU</a>
    <a href="#about" class="w3-bar-item w3-button">ABOUT</a>
    <a href="#myMap" class="w3-bar-item w3-button">CONTACT</a>

  </div>
</div>
  
<!-- Header image -->
<div style="height:900px;background-image:url('img/a3.jpg');background-size:cover"
class="w3-display-container w3-grayscale-min">
<div class="w3-display-bottomleft">
  <span class="w3-tag w3-xlarge">Open 24/24</span>
</div>
<div class="w3-display-middle w3-center">
  <span class="w3-text-white" style="font-size:150px">Weclome to Hotel</span>
  <p></p>
  <button onclick="document.getElementById('id01').style.display='block'"class="w3-button w3-xxlarge w3-black" >Sign In</button>
  <button onclick="document.getElementById('id02').style.display='block'"class="w3-button w3-xxlarge w3-black" >Sign up</button>
</div>
</div>
<!-- dang nhap -->
<div id="id01" class="modal" style="font-family:verdana">
  
  <div class="auth-wrapper">
        <div class="auth-container">
            <div class="auth-action-left">
                <div class="auth-form-outer">
                    <h2 class="auth-form-title">
                        Sign In
                    </h2>
                    <div class="auth-external-container">
                        <div class="auth-external-list">
                            <ul>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <p class="auth-sgt">or sign in with:</p>
                    </div>
                    <form action='{{route('backend.user.store')}}'method='post'>
                      @method('put')
                      @csrf
                      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                        <input type="text"name="admin_email" class="auth-form-input" placeholder="Username">
                        <div class="input-icon">
                            <input type="password" name="admin_password" class="auth-form-input" placeholder="Password">
                            <i class="fa fa-eye show-password"></i>
                        </div>
                        <label class="btn active">
                            <input type="checkbox" name='checked' checked>
                            <i class="fa fa-square-o"></i><i class="fa fa-check-square-o"></i> 
                            <span> Remember password.</span>
                        </label>
                        <div class="footer-action">
                            <input  type="submit" value="Sign In" class="auth-submit">
                            <a href="signup" class="auth-btn-direct">Sign Up</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="auth-action-right">
                <div class="auth-image">
                    <img src="img/log.jpg" alt="login">
                </div>
            </div>
        </div>
    </div>
  <!-- Sign In -->
  </div>
  <div id="id02" class="modal2" style="font-family:verdana">
    <div class="auth-wrapper">
        <div class="auth-container">
            <div class="auth-action-left">
                <div class="auth-form-outer">
                    <h2 class="auth-form-title">
                        Create Account
                    </h2>
                    <div class="auth-external-container">
                        <div class="auth-external-list">
                            <ul>
                                <li><a href="#"><i class="fa fa-google"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <p class="auth-sgt">or use your email for registration:</p>
                    </div>
                    <form action='{{route('backend.user.create')}}'method='post'  class="login-form">
                        @method('put')
                        @csrf
                        <input type="text"name="admin_name" class="auth-form-input" placeholder="Name">
                        <input type="text"name="admin_phone" class="auth-form-input" placeholder="Phone">
                        <input type="text" name="admin_email"class="auth-form-input" placeholder="Email">
                        <div class="input-icon">
                            <input type="password" name="admin_password" class="auth-form-input" placeholder="Password">
                            <i class="fa fa-eye show-password"></i>
                        </div>
                        <!-- <input type="password" class="auth-form-input" placeholder="Confirm Password"> -->
                        <div class="footer-action">
                            <input type="submit" value="Sign Up" class="auth-submit">
                            <a href="/login" class="auth-btn-direct">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="auth-action-right">
                <div class="auth-image">
                    <img src="img/log.jpg" alt="login">
                </div>
            </div>
        </div>
    </div>

  </div>
<footer class="w3-center w3-black w3-padding-16">
  <span>Địa chỉ : Đường 3/2 quận Ninh Kiều TP Cần Thơ</span><br>
  <span>Liên hệ :0921277127</span><br>
  <span>Powered by <a href="#" title="W3.CSS" target="_blank" class="w3-hover-text-green">QuocTuanHoTel</a></span>
</footer>

</div>

<script>
// Get the modal
var modal = document.getElementById('id01');
var modal2 = document.getElementById('id02');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal2) {
        modal.style.display = "none";
    }
}
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>
    @if(Session::has('message'))
        var type="{{Session::get('alert-type','info')}}"

        switch(type){
            case 'success':
                toastr.success("{{ Session::get('message') }}");
                break;
            case 'error':
                toastr.error("{{ Session::get('message') }}");
                break;
        }
    @endif
</script>

<!-- End Content -->

</body>
</html>
