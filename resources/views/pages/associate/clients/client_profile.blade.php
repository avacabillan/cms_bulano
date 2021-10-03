@extends('layout.master')
@section('title')
@stop

@section('content')

<div class="row container d-flex justify-content-center">
    <div class="col-xl-6 col-md-12 mt-3 pt-4 pb-3">
      
      <div class="row m-l-0 m-r-0" id="prof_border">

          <div class="col-sm-4 user-profile">

            <div class="card-block text-center text-white">
              <div class="m-b-25"> <img src="images/bulano.png" class="img-radius" alt="User-Profile-Image"></div><br>
                <h6 class="f-w-600"><strong>{{client_name}}</strong></h6>
                <p>Coke Inc.</p>
              
            </div>

          </div>

          <div class="col-sm-8">

            <div class="card-block">
              <!-- <i class="fas fa-edit" id="assoc_edit_profile"></i> -->
              <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Personal Information</h6>
              <div class="row">
                <div class="col-sm-6">
                  <p class="m-b-10 f-w-600">Cell Phone No.</p>
                  <h6 class="text-muted f-w-400">{{$client_name->contact_no}}</h6>
                </div>
                <div class="col-sm-6">
                  <p class="m-b-10 f-w-600">Registration Date</p>
                  <h6 class="text-muted f-w-400">{{$client->}}</h6>
                </div>
                <div class="col-sm-6">
                  <p class="m-b-10 f-w-600">Email</p>
                  <h6 class="text-muted f-w-400">09862575369</h6>
                </div>
                <div class="col-sm-6">
                  <p class="m-b-10 f-w-600">Line of Business</p>
                  <h6 class="text-muted f-w-400">Coke Incorporated</h6>
                </div>
                <div class="col-sm-6">
                  <p class="m-b-10 f-w-600">Trade Name</p>
                  <h6 class="text-muted f-w-400">Coke Incorporated</h6>
                </div>
                <div class="col-sm-6">
                  <p class="m-b-10 f-w-600">Complete Address</p>
                  <h6 class="text-muted f-w-400">Coke Incorporated</h6>
                </div>
                <div class="col-sm-6">
                  <p class="m-b-10 f-w-600">Province</p>
                  <h6 class="text-muted f-w-400">Coke Incorporated</h6>
                </div>
            </div><br>
            <!-- <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add_tax">New Folder</button> -->
            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Type of Taxes</h6>
          
              <div class="row">
                <div class="col-sm-6">
                <p class="m-b-10 f-w-600"><a href="{{route('viewfiles')}}"><i class="fa fa-folder me-2" aria-hidden="true"></i>VAT</a></p>
                  <h6 class="text-muted f-w-400"></h6>
                </div>                                              
                <div class="col-sm-6">
                  <p class="m-b-10 f-w-600"><a href="{{route('viewfiles')}}"><i class="fa fa-folder me-2" aria-hidden="true"></i>ITR</a></p>
                  <h6 class="text-muted f-w-400"></h6>
                </div>
                <div class="col-sm-6">
                  <p class="m-b-10 f-w-600"><a href="{{route('viewfiles')}}"><i class="fa fa-folder me-2" aria-hidden="true">Rgistration Fee</i></a></p>
                  <h6 class="text-muted f-w-400"></h6>
                </div>
                <div class="col-sm-6">
                  <p class="m-b-10 f-w-600"></p>
                  <h6 class="text-muted f-w-400"></h6>
                </div>  
              </div>
            </div> 

          </div>

      </div>
   
    </div>
  </div>



 
@stop