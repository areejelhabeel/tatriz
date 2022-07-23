@extends('admin.parent')

@section('title','Edit Design')
@section('page-title','Edit Design')

@section('style')
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/select2.min.css')}}">
@endsection
@section('page-title',' Edit Design')
@section('page-breadcrumb','Designs')
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

                    <form action="{{route('designs.update',[$design->id])}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label> Name</label>
                            <input name="name" value="{{$design->name}}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Description</label>
                            <input name="description" value="{{$design->description}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Size</label>
                            <input name="size" value="{{$design->size}}" type="text" class="form-control">
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label col-md-2">Image</label>
                            <div class="col-md-10">
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label> Color</label>
                            <input name="color" value="{{$design->color}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Designers FirstNames</label>
                                <select class="form-control"name="designer_id" >
                                    <option>-- Select --</option>
                                    @foreach ($designers as $designer)
                                    <option value="{{$designer->id}}"@if ($design->designer_id==$designer->id)selected @endif>{{$designer->first_name}}</option>
                                    @endforeach
                                </select>
                
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Designers LastNames</label>
                                <select class="form-control"name="designer_id" >
                                    <option>-- Select --</option>
                                    @foreach ($designers as $designer)
                                    <option value="{{$designer->id}}"@if ($design->designer_id==$designer->id)selected @endif>{{$designer->last_name}}</option>
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
