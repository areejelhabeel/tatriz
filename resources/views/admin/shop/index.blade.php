@extends('admin.parent')

@section('title','Shops')

@section('style')

@endsection

@section('page-title','Shops')
@section('page-breadcrumb','Shops')

@section('action')
    <div class="col-sm-5 col">
        <a href="{{route('shops.create')}}"  class="btn btn-danger float-right mt-2">Add</a>
    </div>
@endsection

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
                                <th>Name</th>
                                <th>Description</th>
                                <th>Location</th>
                                <th>Mobile</th>
                                <th>Designer First Name</th>
                                <th>Designer Last Name</th>
                                <th>Designer Assistant First Name</th>
                                <th>Designer Assistant Last Name</th>
                                <th>Settings</th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($shops as $shop)
                                <tr>
                        
                                    <td>{{$shop->id}}</td>
                                    <td>{{$shop->name}} </td>
                                    <td>{{$shop->description}} </td>
                                    <td>{{$shop->location}} </td>
                                    <td>{{$shop->mobile}} </td>
                                    <td>{{$shop->designers->first_name}} </td>
                                    <td>{{$shop->designers->last_name}} </td>
                                    <td>{{$shop->designer_assistants->first_name}} </td>
                                    <td>{{$shop->designer_assistants->last_name}} </td>
                                    <td>
                                      <a href="{{route('shops.edit',[$shop->id])}}"type="button" class="btn btn-primary btn-sm active">Edit</a>     
                                      <a href="#" onclick="confirmDelete(this,'{{$shop->id}}')" type="button" class="btn btn-danger btn-sm">Delete</a>

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
    deleteShop(app,id)
  }
})
    }

    function deleteShop(app,id){

        
       axios.delete('/admin/shops/'+id)
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
