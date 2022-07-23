@extends('admin.parent')

@section('title','Edit Order')
@section('page-title','Edit Order')

@section('style')
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/select2.min.css')}}">
@endsection
@section('page-title',' Edit Order')
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

                    <form action="{{route('orders.update',[$order->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-form-label">Design Names</label>
                                <select class="form-control"name="design_id" >
                                    <option>-- Select --</option>
                                    @foreach ($designs as $design)
                                    <option value="{{$design->id}}"@if ($order->design_id==$design->id)selected @endif>{{$design->name}}</option>
                                    @endforeach
                                </select>
                
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Image</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Description</label>
                            <input name="description" value="{{$order->description}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Size</label>
                            <input name="size" value="{{$order->size}}" type="text" class="form-control">
                        </div>
                        
                        
                        <div class="form-group">
                            <label> Color</label>
                            <input name="color" value="{{$order->color}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Mobile</label>
                            <input name="mobile" value="{{$order->mobile}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Time</label>
                            <input name="time" value="{{$order->time}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Date</label>
                            <input name="date" value="{{$order->date}}" type="date" class="form-control">
                        </div>
                       
                        <div class="form-group">
                            <label class="col-form-label">Designers FirstNames</label>
                                <select class="form-control"name="designer_id" >
                                    <option>-- Select --</option>
                                    @foreach ($designers as $designer)
                                    <option value="{{$designer->id}}"@if ($order->designer_id==$designer->id)selected @endif>{{$designer->first_name}}</option>
                                    @endforeach
                                </select>
                
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Designers LastNames</label>
                                <select class="form-control"name="designer_id" >
                                    <option>-- Select --</option>
                                    @foreach ($designers as $designer)
                                    <option value="{{$designer->id}}"@if ($order->designer_id==$designer->id)selected @endif>{{$designer->last_name}}</option>
                                    @endforeach
                                </select>
                
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Customers FirstNames</label>
                                <select class="form-control"name="customer_id" >
                                    <option>-- Select --</option>
                                    @foreach ($customers as $customer)
                                    <option value="{{$customer->id}}"@if ($order->customer_id==$customer->id)selected @endif>{{$customer->first_name}}</option>
                                    @endforeach
                                </select>
                
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Customers LastNames</label>
                                <select class="form-control"name="customer_id" >
                                    <option>-- Select --</option>
                                    @foreach ($customers as $customer)
                                    <option value="{{$customer->id}}"@if ($order->customer_id==$customer->id)selected @endif>{{$customer->last_name}}</option>
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
