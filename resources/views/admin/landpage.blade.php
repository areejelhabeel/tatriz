<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tatriz-LandPage Web</title>

  <!-- Custom fonts for this theme -->
  <link href="{{asset('tatriz/admin/assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="{{asset('tatriz/admin/assets/css/freelancer.min.css')}}" rel="stylesheet">
  
</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg" style="background-color: #e77052;"  text-uppercase fixed-top id="mainNav">
    <img src="{{asset('tatriz/admin/assets/img/logo.jpg')}}" alt="Logo" width="80" height="60">
    <div class="container">
      
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{route('admins.login')}}">Home</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{route('designGuests.index')}}">Guest</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{route('admins.login')}}">Login</a>
          </li>

          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{route('admin.register1')}}">Sign Up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  

           
   
        
   

      <img   src="{{asset('tatriz/admin/assets/img/gg.jpg')}}" alt="">

     

     

      
  
     

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('tatriz/admin/assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('tatriz/admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Plugin JavaScript -->
  <script src="{{asset('tatriz/admin/assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Contact Form JavaScript -->
  <script src="{{asset('tatriz/admin/assets/js/jqBootstrapValidation.js')}}"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="{{asset('tatriz/admin/assets/js/freelancer.min.js')}}"></script>

</body>

</html>
