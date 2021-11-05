
@extends('layout.master')
@section('title')
@stop
@section('content')


<div class="d-flex p-4 mt-3" >
  <div class="col-sm-4 user-profile"> 
    <input class="form-control" type="hidden" value="{{$associate->id}}" name="associate_id">
    <div class="card-block text-center text-white">
      <div class="text-center">
        <img src="images/bianca.jpg" class="rounded" alt="User-Profile-Image">
      </div>
      <br> 
        <h4 class="f-w-600">{{$associate->associate_name}}</h4>
        <p id="name" value="name">{{$associate->email}}</p>         
      </div>
    </div>

    <div class="col-sm-8">
      <div class="card-block bg-light"> 
      <a class="btn btn-success btn-sm editbtn" data-toggle="modal" data-target="#editAssoc" href="#"><i class="fas fa-edit"></a></i>
        
        <h6 class="m-b-20 p-b-5b-b-default f-w-600">Personal Information</h6>
        <hr>

        <div class="row mt-5">
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Cell Phone No.</p>
            <h6 class="text-muted ms-2 f-w-400">{{$associate->contact_number}}</h6>
          </div>

          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Cell Phone No.</p>
            <h6 class="text-muted ms-2 f-w-400">{{$associate->contact_number}}</h6>
          </div>

          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">BirthDate</p>
            <h6 class="text-muted ms-2 f-w-400 text-dark">{{$associate->birth_date}}</h6>
          </div>

          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Cell Phone No.</p>
            <h6 class="text-muted ms-2 f-w-400">{{$associate->contact_number}}</h6>
          </div>
          
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Address</p>
            <h6 class="text-muted ms-2 f-w-400">{{$associate->address}}</h6>
          </div>

          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">SSS Number</p>
            <h6 class="text-muted ms-2 f-w-400">{{$associate->sss_no}}</h6>
          </div>

          
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Department</p>
            <h6 class="text-muted ms-2 f-w-400">{{$associate->department->department_name}}</h6>
          </div>

          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Position</p>
            <h6 class="text-muted ms-2 f-w-400">{{$associate->position->position_name}}</h6>
          </div>
                
      
      </div> 
    </div>

  </div>
</div>

<!--Update Assoc Modal -->
<div class="modal fade editAssoc" id="editAssoc" tabindex="-1" role="dialog" aria-labelledby="headingsModal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="width: 120%;">
      <div class="modal-header" id="headingsModal" name="headingsModal">
        <h5 class="modal-title" ></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
        
          @include('pages.admin.associates.edit_associate')
        </div>  
      </div>
    </div>
  </div>
</div>
<!-- END OF Edit ASSOC MODAL -->
@endsection