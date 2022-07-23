@extends('admin.parent')

@section('title','Dashboard')

@section('style')
    
@endsection


@section('page-title','Fashion Shows')
@section('page-breadcrumb','Note :"To Subscribe In The Fashion Show You Should 
Put The Required Amount Of Money In  This account  Areej Elhabeel In Palestine Bank" ')

@section('action')
    <div class="col-sm-5 col">
        <a href="{{route('shows.create')}}" class="btn btn-danger float-right mt-2">Add</a>
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
                            <th>Number Of Fashion Show</th>
                          
                            <th>Name Of Fashion Show</th>
                            <th>Address</th>
                            <th>Amount Of Money Required To Subscribe </th>
                            <th>Time</th>
                            <th>Date</th>
                            <th>Settings</th>

                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($shows as $show)
                            <tr>
                                <td>{{$show->id}}</td>
                                
                                <td>{{$show->name}} </td>
                                <td>{{$show->address}} </td>
                                <td>{{$show->amount_required}} </td>
                                <td>{{$show->time}} </td>
                                <td>{{$show->date}} </td>
                                
                            
                                <td>
                                    <a href="{{route('shows.edit',[$show->id])}}"type="button" class="btn btn-primary btn-sm active">Edit</a> 
                                    <a href="#" onclick="confirmDelete(this,'{{$show->id}}')" type="button" class="btn btn-danger btn-sm">Delete</a>


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
    deleteFashionShow(app,id)
  }
})
    }

    function deleteFashionShow(app,id){

        
       axios.delete('/admin/shows/'+id)
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

