@extends('admin.parent')

@section('title','Edit DesignerAssistant')

@section('style')
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/select2.min.css')}}">
@endsection
@section('page-title','Edit DesignerAssistant')
@section('page-breadcrumb','DesignerAssistants')
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
                    <form action="{{route('designer_assistants.update',[$designer_assistant->id])}}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>First Name</label>
                            <input name="first_name" value="{{$designer_assistant->first_name}}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input name="last_name" value="{{$designer_assistant->last_name }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Email</label>
                            <input name="email" value="{{$designer_assistant->email }}" type="text" class="form-control">
                        </div>
                        <div class="form-group ">
                            <label>User Name</label>
                                <input name="user_name" value="{{ $designer_assistant->user_name }}" type="text" class="form-control">
                            </div>
                        <div class="form-group">
                            <label> Mobile</label>
                            <input name="mobile" value="{{ $designer_assistant->mobile }}" type="text" class="form-control">
                        </div>

                        <div class="form-group ">
                            <label>Password</label>
                                <input name="password" value="{{ $designer_assistant->password }}" type="password" class="form-control">
                            </div>

                            <div class="form-group ">
                                <label>Facebook Link</label>
                                    <input name="facebook_link" value="{{ $designer_assistant->facebook_link }}" type="text" class="form-control">
                                </div>
                       
                            <div class="form-group ">
                                <label>Instagram Link</label>
                                    <input name="instagram_link" value="{{ $designer_assistant->instagram_link }}" type="text" class="form-control">
                                </div>
        
                                <div class="form-group">
                                    <label class="col-form-label">Designers FirstNames</label>
                                        <select class="form-control"name="designer_id" >
                                            <option>-- Select --</option>
                                            @foreach ($designers as $designer)
                                            <option value="{{$designer->id}}"@if ($designer_assistant->designer_id==$designer->id)selected @endif>{{$designer->first_name}}</option>
                                            @endforeach
                                        </select>
                        
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Designers LastNames</label>
                                        <select class="form-control"name="designer_id" >
                                            <option>-- Select --</option>
                                            @foreach ($designers as $designer)
                                            <option value="{{$designer->id}}"@if ($designer_assistant->designer_id==$designer->id)selected @endif>{{$designer->last_name}}</option>
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
