<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Tatriz Guest </title>

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

    <div class="row">
        <form class="form-inline my-2 my-lg-0" action="{{url('search')}}" method="POST">
            {{csrf_field()}}
              <input  class="form-control mr-sm-2"type="text"  placeholder="Search here" name="search">
              <button  class="btn btn-danger my2 my-sm-0"   type="submit">Search</button>
          </form>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-hover table-center mb-0">
                            <thead>
                            <tr>
                  
                                
                                <th>Image</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Designer First Name</th>
                                <th>Designer Last Name</th>
                             

                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($designs as $design)
                                <tr>
                        
                                   
                                    <td><div class="avatar avatar-xxl">
                                      <img class="avatar-img rounded-rectangle" alt="User Image" src="{{url('images/designs/'.$design->image)}}">
                                  </div>
                                </td>
                                    <td>{{$design->name}} </td>
                                    <td>{{$design->description}} </td>
                                    <td>{{$design->size}} </td>
                                    <td>{{$design->color}} </td>
                                    <td>{{$design->designers->first_name}} </td>
                                    <td>{{$design->designers->last_name}} </td>
                                   

                                </tr>
                                @endforeach
                               
                            
                            </tbody>
                        </table>
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

<!-- Slimscroll JS -->
<script src="{{asset('tatriz/admin/assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>



<!-- Custom JS -->
<script src="{{asset('tatriz/admin/assets/js/script.js')}}"></script>

</body>
</html>


