@extends('admin.parent')

@section('title','DesignerAssistants')

@section('style')

@endsection

@section('page-title','DesignerAssistants')
@section('page-breadcrumb','DesignerAssistants')

@section('action')
    <div class="col-sm-5 col">
        <a href="{{route('designer_assistants.create')}}" class="btn btn-danger float-right mt-2">Add</a>
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
                                <th>Designer First Name</th>
                                <th>Designer Last Name</th>
                                <th>Password</th>
                                <th>Facebook Link</th>
                                <th>Instagram Link</th>
                                <th>Settings</th>

                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($designer_assistants as $designer_assistant)
                                <tr>
                                    <td>{{$designer_assistant->id}}</td>
                                    
                                    <td>{{$designer_assistant->first_name}} </td>
                                    <td>{{$designer_assistant->last_name}} </td>
                                    <td>{{$designer_assistant->email}} </td>
                                    <td>{{$designer_assistant->user_name}} </td>
                                    <td>{{$designer_assistant->mobile}}</td>
                                    <td>{{$designer_assistant->designers->first_name}} </td>
                                    <td>{{$designer_assistant->designers->last_name}} </td> 
                                    <td>{{$designer_assistant->password}} </td>
                                    <td>{{$designer_assistant->facebook_link}} </td>
                                    <td>{{$designer_assistant->instagram_link}} </td>
                                             
                                   
                                
                                    <td>
                                        <a href="{{route('designer_assistants.edit',[$designer_assistant->id])}}"type="button" class="btn btn-primary btn-sm active">Edit</a> 
                                        <a href="#" onclick="confirmDelete(this,'{{$designer_assistant->id}}')" type="button" class="btn btn-danger btn-sm">Delete</a>


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
    deleteDesignerAssistant(app,id)
  }
})
    }

    function deleteDesignerAssistant(app,id){

        
       axios.delete('/admin/designer_assistants/'+id)
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


