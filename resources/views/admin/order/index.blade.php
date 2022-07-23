@extends('admin.parent')

@section('title','Orders')

@section('style')

@endsection

@section('page-title','Orders')
@section('page-breadcrumb','Orders')

@section('action')
    <div class="col-sm-5 col">
        <a href="{{route('orders.create')}}"  class="btn btn-danger float-right mt-2">Add</a>
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
                                <th>Image</th>
                                <th>Designer First Name</th>
                                <th>Designer Last Name</th>
                                <th>Customer First Name</th>
                                <th>Customer Last Name</th>
                                <th>Design Name</th>
                                <th>Description</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Mobile</th>
                                <th>Time</th>
                                <th>Date</th>
                                <th>Settings</th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                <tr>
                        
                                    <td>{{$order->id}}</td>
                                    <td><div class="avatar avatar-xxl">
                                      <img class="avatar-img rounded-rectangle" alt="User Image" src="{{url('images/orders/'.$order->image)}}">
                                  </div>
                                </td>
                                <td>{{$order->designers->first_name}} </td>
                                <td>{{$order->designers->last_name}} </td>
                                <td>{{$order->customers->first_name}} </td>
                                <td>{{$order->customers->last_name}} </td>
                                    <td>{{$order->designs->name}} </td>
                                    <td>{{$order->description}} </td>
                                    <td>{{$order->size}} </td>
                                    <td>{{$order->color}} </td>
                                    <td>{{$order->mobile}} </td>
                                    <td>{{$order->time}} </td>
                                    <td>{{$order->date}} </td>
                                    <td>
                                      <a href="{{route('orders.edit',[$order->id])}}"type="button" class="btn btn-primary btn-sm active">Edit</a>     
                                      <a href="#" onclick="confirmDelete(this,'{{$order->id}}')" type="button" class="btn btn-danger btn-sm">Delete</a>

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
    deleteOrder(app,id)
  }
})
    }

    function deleteOrder(app,id){

        
       axios.delete('/admin/orders/'+id)
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
