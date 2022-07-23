<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Tatriz - Register</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('tatriz/admin/assets/img/logo_small.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/font-awesome.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/style.css')}}">

    <script src="{{asset('tatriz/admin/assets/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('tatriz/admin/assets/js/respond.min.js')}}"></script>

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
                        <h1>Register</h1>
                        <p class="account-subtitle">Access to our dashboard</p>

                        <form  action="{{route('customers.store2')}}" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                              
                                <input name="first_name" value="{{ old('first_name') }}" type="text" class="form-control"placeholder="First Name">
                            </div>
    
                            <div class="form-group">
                               
                                <input name="last_name" value="{{ old('last_name') }}" type="text" class="form-control"placeholder="Last Name">
                            </div>
                            <div class="form-group">
                            
                                <input name="email" value="{{ old('email') }}" type="text" class="form-control"placeholder="Email">
                            </div>
                            <div class="form-group">
                               
                                <input name="mobile" value="{{ old('mobile') }}" type="text" class="form-control"placeholder="Mobile">
                            </div>
                            <div class="form-group ">
                            
                                    <input name="facebook_link" value="{{ old('facebook_link') }}" type="text" class="form-control"placeholder="Facebook Link">
                                </div>
                       
                            <div class="form-group ">
                           
                                    <input name="instagram_link" value="{{ old('instagram_link') }}" type="text" class="form-control"placeholder="Instagram Link">
                                </div>
                           
                            <div class="form-group ">
                               
                                    <input name="user_name" value="{{ old('user_name') }}" type="text" class="form-control"placeholder="User Name">
                                </div>
                            <div class="form-group">
                                <input class="form-control" type="text" value="{{ old('password') }}"placeholder="Password">
                            </div>
                           
                            <div class="form-group mb-0">
                                <button class="btn btn-danger btn-block" type="submit">Register</button>
                            </div>
                        </form>
                        <!-- /Form -->

                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>

                        <!-- Social Login -->
                        <div class="social-login">
                            <span>Register with</span>
                            <a href="https://www.facebook.com/login/" class="facebook"><i class="fa fa-facebook"></i></a><a href="https://www.google.com/" class="google"><i
                                    class="fa fa-google"></i></a>
                        </div>
                        <!-- /Social Login -->

                        <div class="text-center dont-have">Already have an account? <a href="{{route('admin.login')}}">Login</a></div>
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
