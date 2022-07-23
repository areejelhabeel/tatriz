@extends('admin.parent')

@section('title','Customers')

@section('style')

@endsection

@section('page-title','Customers')
@section('page-breadcrumb','Customers')

@section('action')
    <div class="col-sm-5 col">
        <a href="{{route('customers.create')}}" class="btn btn-danger float-right mt-2">Add</a>
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
                              
                                <th>Firt Name</th>
                                <th>last Name</th>
                                <th>Email</th>
                                <th>User Name</th>
                                <th>Mobile</th>
                                <th>Password</th>
                                <th>Facebook Link</th>
                                <th>Instagram Link</th>
                                <th>Settings</th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as $customer)
                                <tr>
                                    <td>{{$customer->id}}</td>
                                    
                                    <td>{{$customer->first_name}} </td>
                                    <td>{{$customer->last_name}} </td>
                                    <td>{{$customer->email}} </td>
                                    <td>{{$customer->user_name}} </td>
                                    <td>{{$customer->mobile}}</td>
                                    <td>{{$customer->password}} </td>
                                    <td>{{$customer->facebook_link}} </td>
                                    <td>{{$customer->instagram_link}} </td>
                                                  
                                   
                                
                                    <td>
                                        <a href="{{route('customers.edit',[$customer->id])}}"type="button" class="btn btn-primary btn-sm active">Edit</a> 
                                        <a href="#" onclick="confirmDelete(this,'{{$customer->id}}')" type="button" class="btn btn-danger btn-sm">Delete</a>


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
    deleteCustomer(app,id)
  }
})
    }

    function deleteCustomer(app,id){

        
       axios.delete('/admin/customers/'+id)
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


