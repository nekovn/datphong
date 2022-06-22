

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="\css\loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
</head>
<body>
    <!-- Form without bootstrap -->
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
                    <form action='{{route('login')}}'method='POST'>
                      @method('put')
                      @csrf

                        <input type="text"name="admin_email" class="auth-form-input" placeholder="Username">
                        <div class="input-icon">
                            <input type="password" name="admin_password" class="auth-form-input" placeholder="Password">
                        </div>
                      
                        <div class="footer-action">
                            <input  type="submit" value="Sign In" class="auth-submit">
                            <a href="/signup" class="auth-btn-direct">Sign Up</a>
                        </div>
                    </form>

                </div>
            </div>
            <div class="auth-action-right">
                <div class="auth-image">
                    <img src="../img/log.jpg" alt="login">
                </div>
            </div>
        </div>
    </div>
    <script src="js/common.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
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
</body>
</html>
