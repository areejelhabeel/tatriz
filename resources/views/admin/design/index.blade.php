@extends('admin.parent')

@section('title','Designs')

@section('style')

@endsection

@section('page-title','Designs')
@section('page-breadcrumb','Designs')

@section('action')
    <div class="col-sm-5 col">
        <a href="{{route('designs.create')}}"  class="btn btn-danger float-right mt-2">Add</a>
    </div>
@endsection

@section('page-wrapper')

    <div class="row">
    
        <form class="form-inline my-2 my-lg-0" action="{{url('search')}}" method="POST">
          {{csrf_field()}}
            <input  class="form-control mr-sm-2"type="text"  placeholder="Search here" name="search">
            <button  class="btn btn-danger my2 my-sm-0"   type="submit">Search</button>
        </form>
    
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
                                <th>Settings</th>

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
                                    <td>
                                      <a href="{{route('designs.edit',[$design->id])}}"type="button" class="btn btn-primary btn-sm active">Edit</a>     
                                      <a href="#" onclick="confirmDelete(this,'{{$design->id}}')" type="button" class="btn btn-danger btn-sm">Delete</a>

                                    </td>

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

@section('scripts')
<script src="{{asset('tatriz/js/axios.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script >
    function confirmDelete(app,id){

        Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {
  if (result.value) {
    deleteDesign(app,id)
  }
})
    }

    function deleteDesign(app,id){

        
       axios.delete('/admin/designs/'+id)
  .then(function (response) {
    // handle success
    console.log(response);
    app.closest('tr').remove();
    showMessage(response.data)
  })
  .catch(function (error) {
    // handle error
    showMessage(error.response.data)


  })
 .then(function () {
    // always executed
  });
    }

    function showMessage(data){
        Swal.fire({
  title: data.title,
  text:data.text,
  icon:data.icon,
  showConfirmButton:false,
  timer:2000,
  timer: 2000,
 
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
  }
})
    }
</script>

@endsection
