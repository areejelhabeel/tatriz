@extends('admin.parent')

@section('title','Edit Fashion Show')
@section('page-title','Edit Fashion Show')

@section('style')
    <link rel="stylesheet" href="{{asset('doccure/admin/assets/css/select2.min.css')}}">
@endsection
@section('page-title',' Edit Shop')
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

                    <form action="{{route('shows.update',[$show->id])}}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label> Name Of Fashion Show</label>
                            <input name="name" value="{{$show->name}}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Address</label>
                            <input name="address" value="{{ $show->address}}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Amount Of Money Required To Subscribe</label>
                            <input name="amount_required" value="{{$show->amount_required}}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Time</label>
                            <input name="time" value="{{ $show->time }}" type="time" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Date</label>
                            <input name="date" value="{{ $show->date }}" type="date" class="form-control">
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
