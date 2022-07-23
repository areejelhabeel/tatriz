@extends('admin.parent')

@section('title','Create Customer')

@section('style')
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/select2.min.css')}}">
@endsection
@section('page-title','Create Customer')
@section('page-breadcrumb','Customers')

@section('page-wrapper')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Basic Form</h4>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$error}}
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>  
                    @endforeach
                   
                    @endif
                    <form action="{{route('customers.store')}}" method="POST"
                    enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>First Name</label>
                            <input name="first_name" value="{{ old('first_name') }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input name="last_name" value="{{ old('last_name') }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Email</label>
                            <input name="email" value="{{ old('email') }}" type="text" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label>User Name</label>
                                <input name="user_name" value="{{ old('user_name') }}" type="text" class="form-control">
                            </div>
                        <div class="form-group">
                            <label> Mobile</label>
                            <input name="mobile" value="{{ old('mobile') }}" type="text" class="form-control">
                        </div>

                        <div class="form-group ">
                            <label>Password</label>
                                <input name="password" value="{{ old('password') }}" type="password" class="form-control">
                            </div>

                            <div class="form-group ">
                                <label>Facebook Link</label>
                                    <input name="facebook_link" value="{{ old('facebook_link') }}" type="text" class="form-control">
                                </div>
                       
                            <div class="form-group ">
                                <label>Instagram Link</label>
                                    <input name="instagram_link" value="{{ old('instagram_link') }}" type="text" class="form-control">
                                </div>
                            

                                 
                    
                        

                           


                    
                    </div>
                         
                        <div class="text-right">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    
@endsection



