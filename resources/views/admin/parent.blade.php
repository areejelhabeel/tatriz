<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Tatriz Admin - @yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('tatriz/admin/assets/img/logo_small.png')}}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/font-awesome.min.css')}}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/feathericon.min.css')}}">

@yield('style')

<!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/style.css')}}">

<!--[if lt IE 9]>
			<script src="{{asset('tatriz/admin/assets/js/html5shiv.min.js')}}"></script>
			<script src="{{asset('tatriz/admin/assets/js/respond.min.js')}}"></script>
		<![endif]-->
</head>
<body>

<!-- Main Wrapper -->
<div class="main-wrapper">

    <!-- Header -->
    <div class="header">

        <!-- Logo -->
        <div class="header-left">
           
            <a href="{{route('admin.dashboard')}}" class="logo logo-small">
                <img src="{{asset('tatriz/admin/assets/img/logo_small.png')}}" alt="Logo" width="30" height="30">
            </a>
        </div>
        <!-- /Logo -->

        <a href="javascript:void(0);" id="toggle_btn">
            <i class="fe fe-text-align-left"></i>
        </a>

      
        <!-- Mobile Menu Toggle -->
        <a class="mobile_btn" id="mobile_btn">
            <i class="fa fa-bars"></i>
        </a>
        <!-- /Mobile Menu Toggle -->

        <!-- Header Right Menu -->
        <ul class="nav user-menu">
            <!-- Notifications -->
            <li class="nav-item dropdown noti-dropdown">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                    <i class="fe fe-bell"></i> <span class="badge badge-pill">3</span>
                </a>
                <div class="dropdown-menu notifications">
                    <div class="topnav-dropdown-header">
                        <span class="notification-title">Notifications</span>
                        <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                    </div>
                    <div class="noti-content">
                        <ul class="notification-list">
                   
                            
                        </ul>
                    </div>
                    <div class="topnav-dropdown-footer">
                        <a href="#">View all Notifications</a>
                    </div>
                </div>
            </li>
            <!-- /Notifications -->

            <li class="nav-item dropdown has-arrow">
                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                 
                </a>
                <div class="dropdown-menu">
                    <div class="user-header">
                       
                        <div class="user-text">
                            <h6>{{Auth()->user()->first_name.' '.Auth()->user()->last_name}}</h6>
                            <p class="text-muted mb-0">Administrator</p>
                        </div>
                    </div>
                    <a class="dropdown-item" href="{{route('admins.index')}}">My Profile</a>
                
                    <a class="dropdown-item" href="{{route('admin.logout')}}">Logout</a>
                </div>
            </li>
            <!-- /User Menu -->

        </ul>
        <!-- /Header Right Menu -->

    </div>
    <!-- /Header -->

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-inner slimscroll">
            <div id="sidebar-menu" class="sidebar-menu">
                <ul>
                    <li class="menu-title">
                        <span>Main</span>
                    </li>
                    <li >
                        <a href="{{route('admin.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
                    </li>
                   
                    <li >
                        <a href="{{route('admins.index')}}"><i class="fe fe-user"></i> <span>Admin</span></a>
                    </li>
                    <li >
                        <a href="{{route('shows.index')}}"><i class="fe fe-bell"></i> <span>Fashion Show</span></a>
                    </li>
                    <li >
                        <a href="{{route('designers.index')}}"><i class="fe fe-user"></i> <span>Designer</span></a>
                    </li>
                    <li >
                        <a href="{{route('designs.index')}}"><i class="fe fe-picture"></i> <span>Design</span></a>
                    </li>
                    <li >
                        <a href="{{route('customers.index')}}"><i class="fe fe-users"></i> <span>Customer</span></a>
                    </li>
                    <li >
                        <a href="{{route('designer_assistants.index')}}"><i class="fe fe-user"></i> <span>Designer Assistant</span></a>
                    </li>
                    <li >
                        <a href="{{route('shops.index')}}"><i class="fe fe-cart"></i> <span>Shop</span></a>
                    </li>
                    <li >
                        <a href="{{route('orders.index')}}"><i class="fe fe-shopping-bag"></i> <span>Order</span></a>
                    </li>
                    <li >
                        <a href="{{route('piggybanks.index')}}"><i class="fe fe-money"></i> <span>Piggy Bank</span></a>
                    </li>
            
                    
                    
                   
                   
                </ul>
            </div>
        </div>
    </div>
    <!-- /Sidebar -->

    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-7 col-auto">
                        <h3 class="page-title">@yield('page-title')</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item active"> @yield('page-breadcrumb')</li>
                        </ul>
                    </div>
                    @yield('action')
                </div>
            </div>

            @yield('page-wrapper')
        </div>
    </div>
</div>
<!-- /Main Wrapper -->

<!-- jQuery -->
<script src="{{asset('tatriz/admin/assets/js/jquery-3.2.1.min.js')}}"></script>

<!-- Bootstrap Core JS -->
<script src="{{asset('tatriz/admin/assets/js/popper.min.js')}}"></script>
<script src="{{asset('tatriz/admin/assets/js/bootstrap.min.js')}}"></script>

<!-- Slimscroll JS -->
<script src="{{asset('tatriz/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

@yield('scripts')

<!-- Custom JS -->
<script src="{{asset('tatriz/admin/assets/js/script.js')}}"></script>

</body>
</html>
