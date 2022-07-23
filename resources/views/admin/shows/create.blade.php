@extends('admin.parent')

@section('title','Create Fashion  Show')

@section('style')
    <link rel="stylesheet" href="{{asset('tatriz/admin/assets/css/select2.min.css')}}">
@endsection
@section('page-title',' Create Fashion Show')
@section('page-breadcrumb','Shows')
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

                    <form action="{{route('shows.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label> Name Of Fashion Show</label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Address</label>
                            <input name="address" value="{{ old('address') }}" type="text" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Amount Of Money Required To Subscribe</label>
                            <input name="amount_required" value="{{ old('amount_required') }}" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Time</label>
                            <input name="time" value="{{ old('time') }}" type="time" class="form-control">
                        </div>
                        <div class="form-group">
                            <label> Date</label>
                            <input name="date" value="{{ old('date') }}" type="date" class="form-control">
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
