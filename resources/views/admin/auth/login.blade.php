<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>TATRIZ - Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('tatriz/admin/assets/img/favicon.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/font-awesome.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/style.css')}}">

<!--[if lt IE 9]>
			<script src="{{asset('tatriz/admin/assets/js/html5shiv.min.js')}}"></script>
			<script src="{{asset('tatriz/admin/assets/js/respond.min.js')}}"></script>
		<![endif]-->
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <div class="loginbox">
                <div class="login-left">
                    <img class="img-fluid" src="{{asset('tatriz/admin/assets/img/logo.jpg')}}" alt="Logo">
                </div>
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>Login</h1>
                        <p class="account-subtitle">Access to Dashboard</p>

                        <!-- Form -->
                        <form action="{{route('admin.login')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input name="email"  class="form-control"  placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input name="password" type="password" class="form-control"  placeholder="Password">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-danger btn-block" type="submit">Login</button>
                            </div>
                        </form>
                        <!-- /Form -->

                        <div class="text-center forgotpass"><a href="{{route('admin.forgot-password')}}">Forgot Password?</a></div>
                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>

                        <!-- Social Login -->
                        <div class="social-login">
                            <span>Login with</span>
                            <a href="https://www.facebook.com/login/" class="facebook"><i class="fa fa-facebook"></i></a><a href="https://www.google.com/" class="google"><i
                                    class="fa fa-google"></i></a>
                        </div>
                        <!-- /Social Login -->

                        <div class="text-center dont-have">Don’t have an account? <a href="{{route('admin.register1')}}">Register As Designer </a>
                        <div class="text-center dont-have">Don’t have an account? <a href="{{route('admin.register3')}}">Register As Customer</a>
                            <div class="text-center dont-have">Don’t have an account? <a href="{{route('designer_assistants.create2')}}">Register As Designer Assistant</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{asset('tatriz/admin/assets/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('tatriz/admin/assets/js/popper.min.js')}}"></script>
<script src="{{asset('tatriz/admin/assets/js/bootstrap.min.js')}}"></script>

<!-- Custom JS -->
<script src="{{asset('tatriz/admin/assets/js/script.js')}}"></script>

</body>
</html>