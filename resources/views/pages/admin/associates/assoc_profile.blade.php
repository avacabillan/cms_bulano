Bianca Medez Cortez
@extends('layout.master')

@section('title')
    Associates Profile
@endsection

@section('content')

<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center"> <button class="btn btn-secondary"> <img src="https://i.imgur.com/wvxPV9S.png" height="100" width="100" /></button> <span class="name mt-3">{{$associate->name}}</span> <span class="idd">{{$associate->email}}</span><br><br>
            
            
            <a class="btn btn-success btn-sm editbtn" data-toggle="modal" data-target="#editAssoc" href="#"><i class="fas fa-edit"></a></i>
            <div class="text mt-3"> <span>Personal Information </span> </div>
            <div class="text mt-3"> <span>Contact Number : {{$associate->contact_number}} </span> </div>-date
            <div class="text mt-3"> <span>Contact Number : {{$associate->birth}} </span> </div>
            <div class="text mt-3"> <span>Address : {{$associate->address}}</span> </div>
            <div class="text mt-3"> <span>SSS Number : {{$associate->sss_no}} </span> </div><br>

            <div class="text mt-3"> <span>Department</span> </div>

            <div class="text mt-3"> <span>Department : {{$associate->department_id}} </span> </div>
            <div class="text mt-3"> <span>Position : {{$associate->position_id}} </span> </div>

            
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