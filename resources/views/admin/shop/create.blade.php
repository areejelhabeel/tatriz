@extends('admin.parent')

@section('title','Create Shop')

@section('style')
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/select2.min.css')}}">
@endsection
@section('page-title',' Create Shop')
@section('page-breadcrumb','Shops')
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

                    <form action="{{route('shops.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label> Name</label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Description</label>
                            <input name="description" value="{{ old('description') }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Location</label>
                            <input name="location" value="{{ old('location') }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Mobile</label>
                            <input name="mobile" value="{{ old('mobile') }}" type="text" class="form-control">
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
                            <label class="col-form-label">Designers Assistant FirstNames</label>
                                <select class="form-control"name="designer_assistant_id" >
                                    <option>-- Select --</option>
                                    @foreach ($designer_assistants as $designer_assistant)
                                    <option value="{{$designer_assistant->id}}">{{$designer_assistant->first_name}}</option>
                                    @endforeach
                                </select>
                
                        </div>
                        <div class="form-group">
                            <label class="col-form-label">Designers Assistant LastNames</label>
                                <select class="form-control"name="designer_assistant_id" >
                                    <option>-- Select --</option>
                                    @foreach ($designer_assistants as $designer_assistant)
                                    <option value="{{$designer_assistant->id}}">{{$designer_assistant->last_name}}</option>
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
