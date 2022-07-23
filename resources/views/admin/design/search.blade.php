@extends('admin.parent')

@section('title','Designs')

@section('style')

@endsection

@section('page-title','Designs')
@section('page-breadcrumb','Designs')

@section('page-wrapper')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-hover table-center mb-0">
                            <thead>
                            <tr>
                  
                                <th>Id</th>
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
                        
                                    <td>{{$design->id}}</td>
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
@endsection

