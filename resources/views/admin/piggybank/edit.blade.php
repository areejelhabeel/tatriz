@extends('admin.parent')

@section('title','Edit PiggyBank')

@section('style')
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/select2.min.css')}}">
@endsection
@section('page-title','Edit PiggyBank')
@section('page-breadcrumb','PiggyBanks')
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
                    <form action="{{route('piggybanks.update',[$piggybank->id])}}" method="POST">
                        @csrf
                        @method('PUT')



                        <div class="form-group ">
                            <label>Date</label>
                                <input name="date" value="{{ $piggybank->date }}" type="date" class="form-control">
                            </div>

                            <div class="form-group ">
                                <label>Time</label>
                                    <input name="Time" value="{{ $piggybank->Time }}" type="text" class="form-control">
                                </div>
                       
                            <div class="form-group ">
                                <label>Amount Of Money</label>
                                    <input name="amount_of_time" value="{{ $piggybank->amount_of_time }}" type="text" class="form-control">
                                </div>
        
                                <div class="form-group">
                                    <label class="col-form-label">Designers FirstNames</label>
                                        <select class="form-control"name="designer_id" >
                                            <option>-- Select --</option>
                                            @foreach ($designers as $designer)
                                            <option value="{{$designer->id}}"@if ($piggybank->designer_id==$designer->id)selected @endif>{{$designer->first_name}}</option>
                                            @endforeach
                                        </select>
                        
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Designers LastNames</label>
                                        <select class="form-control"name="designer_id" >
                                            <option>-- Select --</option>
                                            @foreach ($designers as $designer)
                                            <option value="{{$designer->id}}"@if ($piggybank->designer_id==$designer->id)selected @endif>{{$designer->last_name}}</option>
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


