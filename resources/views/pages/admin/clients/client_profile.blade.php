
@extends('layout.master')
@section('title')
@stop
@section('content')

<div class="d-flex p-4 mt-5" style="margin-left: 20rem;">
  <div class="col-sm-4 user-profile"> 

<div class="d-flex p-4 mt-3" >
  <div class="col-sm-4 user-profile"> a
    <a href="{{url()->previous()}}" class="btn btn-info">Back</a>
    <input class="form-control" type="hidden" value="{{$client->id}}" name="client_id">
    <div class="card-block text-center text-white">
      <div class="text-center">


    <div class="col-sm-8">
      <div class="card-block bg-light"> 
        
        
        <a class="btn btn-success btn-sm editbtn" data-toggle="modal" data-target="#updateClientModal" href="{{route('editClient',$client->id)}}" style="float: right;"><i class="fas fa-edit">Edit</a></i>
        <button type="button" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;"> Upload</button>
        <h6 class="m-b-20 p-b-5b-b-default f-w-600">Personal Information</h6>
        <hr>


          
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">TIN</p>
            <h6 class="text-muted ms-2 f-w-400">{{$client->tin->tin_no}}</h6>
            <!-- <h6 class="text-muted ms-2 f-w-400">{{$client->tin}}</h6> -->
          </div>

          

          </div>
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Registration Date</p>
            <h6 class="text-muted ms-2 f-w-400">{{$client->business->registration_date}} </h6>
            <h6 class="text-muted ms-2 f-w-400">{{$client->business->registration_date}} </h6>
          </div>

         
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600">Trade Name</p>
              <h6 class="text-muted ms-2 f-w-400">{{$client->business->trade_name}}</h6>
              <h6 class="text-muted ms-2 f-w-400">{{$client->business->trade_name}}</h6>
            </div>
            
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600">Registered Address</p>
              <h6 class="text-muted ms-2 f-w-400">
                {{$client->registeredAddress->unit_house_no}} {{$client->registeredAddress->street}}
                {{$client->registeredAddress->city_name}} {{$client->registeredAddress->province_name}}
                {{$client->registeredAddress->postal_no}}</h6>
                {{$client->registeredAddress->unit_house_no}} {{$client->registeredAddress->street}}
                {{$client->registeredAddress->city_name}} {{$client->registeredAddress->province_name}}
                {{$client->registeredAddress->postal_no}}</h6>
            </div>
          <br> 



          <div class="row">
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600"><a href="{{route('client-showVat', $client->id)}}" class="text-dark"><i class="fa fa-folder me-2 " aria-hidden="true"></i>VAT</a></p>
              <p class="m-b-10 f-w-600"><a href="{{route('showVat', $client->id)}}" class="text-dark"><i class="fa fa-folder me-2 " aria-hidden="true"></i>VAT</a></p>
              <h6 class="text-muted f-w-400"></h6>
            </div>                                              
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600"><a href="{{route('client-showTaxItr',$client->id)}}" class="text-dark"><i class="fa fa-folder me-2" aria-hidden="true"></i>ITR</a></p>
              <p class="m-b-10 f-w-600"><a href="{{route('showTaxItr',$client->id)}}" class="text-dark"><i class="fa fa-folder me-2" aria-hidden="true"></i>ITR</a></p>
              <h6 class="text-muted f-w-400"></h6>
            </div>
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600"><a href="{{route('client-showTaxPay',$client->id)}}" class="text-dark"><i class="fa fa-folder me-2" aria-hidden="true"></i>Registration Fee</a></p>
              <p class="m-b-10 f-w-600"><a href="{{route('showTaxPay',$client->id)}}" class="text-dark"><i class="fa fa-folder me-2" aria-hidden="true"></i>Registration Fee</a></p>
              <h6 class="text-muted f-w-400"></h6>
            </div>



  </div>
</div>
<!--add file Client Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add file</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      @include('pages.associate.clients.add_file')    
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

<!--Upload File Modal -->
<div class="modal fade addFile" id="uploadFile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content" style="  width: 1000px; min-height: 450px;">
      <div class="modal-header">
        <h5 class="modal-title" id="headingsModal"></h5>
        
        
        </div>
      
        <div class="modal-body">
       
           
        @include('pages.associate.clients.add_file')    
                        
        
        </div>  
      </div>
    </div>
  </div>
</div>
 

@stop