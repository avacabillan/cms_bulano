
@extends('layout.master')
@section('title')
@stop
@section('content')
<div class="row m-l-0 mt-5 m-r-0" id="prof_border">
  <div class="col-sm-4 user-profile"> 
  <a class="btn btn-success btn-sm editbtn" data-toggle="modal" data-target="#updateClientModal"   href="{{route('editClient',$client->id)}}"><i class="fas fa-edit"></a></i>
  
    <div class="card-block text-center text-white">
      <div class="m-b-25"><img src="images/bulano.png" class="img-radius" alt="User-Profile-Image"></div><br> 
      
        <h4 class="f-w-600">{{$client->client_name}}</h4>
        <p id="name" value="name">{{$client->email}}</p>         
      </div>
    </div>

    <div class="col-sm-8">
      <div class="card-block"> 

        <!-- <i class="fas fa-edit" id="assoc_edit_profile"></i> -->
        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Personal Information</h6>
        <div class="row">
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Cell Phone No.</p>
            <h6 class="text-muted ms-2 f-w-400">{{$client->contact_number}}</h6>
          </div>
                 
          
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">TIN</p>
            <h6 class="text-muted ms-2 f-w-400">{{$client->tin->first()->tin_no}}</h6>
          </div>

          
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Mode of Filing</p>
            <h6 class="text-muted ms-2 f-w-400">{{$client->modeofpayment->mode_name}}</h6>
          </div>
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Registration Date</p>
            <h6 class="text-muted ms-2 f-w-400">{{$client->business->first()->registration_date}} </h6>
          </div>

         
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600">Trade Name</p>
              <h6 class="text-muted ms-2 f-w-400">{{$client->business->first()->trade_name}}</h6>
            </div>
            
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600">Registered Address</p>
              <h6 class="text-muted ms-2 f-w-400">
                {{$client->registeredAddress->first()->unit_house_no}} {{$client->registeredAddress->first()->street}}
                {{$client->registeredAddress->first()->city_name}} {{$client->registeredAddress->first()->province_name}}
                {{$client->registeredAddress->first()->postal_no}}</h6>
            </div>
          <br> 
          <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add_tax" style="float: right;">
            <i class="fas fa-plus-circle"></i> New Folder
          </button>
          <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Type of Taxes</h6>

          
          <div class="row">
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600"><a href="{{route('showVat')}}" class="text-dark"><i class="fa fa-folder me-2 " aria-hidden="true"></i>VAT</a></p>
              <h6 class="text-muted f-w-400"></h6>
            </div>                                              
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600"><a href="{{route('showTaxItr')}}" class="text-dark"><i class="fa fa-folder me-2" aria-hidden="true"></i>ITR</a></p>
              <h6 class="text-muted f-w-400"></h6>
            </div>
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600"><a href="{{route('showTaxPay')}}" class="text-dark"><i class="fa fa-folder me-2" aria-hidden="true">Registration Fee</i></a></p>
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

<!--Update Client Modal -->
<div class="modal fade editModal" id="updateClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg" >
    <div class="modal-content" style="  width: 1000px; min-height: 450px;">
      <div class="modal-header">
        <h5 class="modal-title" id="headingsModal"></h5>
        
        
        </div>
      
        <div class="modal-body">
        @livewireStyles
           
        @include('pages.associate.clients.edit_client')    
                        
        @livewireScripts
        </div>  
      </div>
    </div>
  </div>
</div>
 

@stop