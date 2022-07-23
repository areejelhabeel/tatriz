@extends('admin.parent')

@section('title','Create Order')

@section('style')
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/select2.min.css')}}">
@endsection
@section('page-title',' Create Order')
@section('page-breadcrumb','Orders')
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

                    @if (session()->has('alert_type'))
                    <div class="alert {{session()->get('alert_type')}} alert-dismissible fade show" role="alert">
                        {{session()->get('message')}}
                       <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div> 
                    @endif

                    <form action="{{route('orders.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label">Design Names</label>
                                <select class="form-control"name="design_id" >
                                    <option>-- Select --</option>
                                    @foreach ($designs as $design)
                                    <option value="{{$design->id}}">{{$design->name}}</option>
                                    @endforeach
                                </select>
                
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Image</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="image_design" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Description</label>
                            <input name="description" value="{{ old('description') }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Size</label>
                            <input name="size" value="{{ old('size') }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Color</label>
                            <input name="color" value="{{ old('color') }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Mobile</label>
                            <input name="mobile" value="{{ old('mobile') }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Time</label>
                            <input name="time" value="{{ old('time') }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Date</label>
                            <input name="date" value="{{ old('date') }}" type="date" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Designers FirstNames</label>
                                <select class="form-control"name="designer_id" >
                                    <option>-- Select --</option>
                                    @foreach ($designers as $designer)
                                    <option value="{{$designer->id}}">{{$designer->first_name}}</option>
                                    @endforeach
                                </select>
                
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Designers LastNames</label>
                                <select class="form-control"name="designer_id" >
                                    <option>-- Select --</option>
                                    @foreach ($designers as $designer)
                                    <option value="{{$designer->id}}">{{$designer->last_name}}</option>
                                    @endforeach
                                </select>
                
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Design Names</label>
                                <select class="form-control"name="design_id" >
                                    <option>-- Select --</option>
                                    @foreach ($designs as $design)
                                    <option value="{{$design->id}}">{{$design->name}}</option>
                                    @endforeach
                                </select>
                
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Customers FirstNames</label>
                                <select class="form-control"name="customer_id" >
                                    <option>-- Select --</option>
                                    @foreach ($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->first_name}}</option>
                                    @endforeach
                                </select>
                
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Customers LastNames</label>
                                <select class="form-control"name="customer_id" >
                                    <option>-- Select --</option>
                                    @foreach ($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->last_name}}</option>
                                    @endforeach
                                </select>
                
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    
@endsection

@section('scripts')
    <script src="{{asset('tatriz/admin/assets/js/select2.min.js')}}"></script>
@endsection
