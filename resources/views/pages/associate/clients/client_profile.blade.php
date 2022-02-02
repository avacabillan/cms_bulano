
@extends('layout.master')
@section('title')
@stop
@section('content')



        <div class="container">
            <div class="main-body  pt-5 mt-5">

                <div class="row gutters-sm">
                <input class="form-control" type="hidden" value="{{$client->id}}" name="client_id">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body pt-5">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="/images/Logo.png" alt="Admin" class="user_profile" width="150">
                                        <div class="mt-3">
                                            <h4>{{$client->client_name}}</h4>
                                            <p class="text-secondary mb-1">{{$client->email}}</p>
                                            <p class="text-muted font-size-sm">Philippines, 8000</p>
                                            <a class="btn btn-success btn-sm editbtn" data-toggle="modal" data-target="#updateClientModal" href="{{route('editClient',$client->id)}}" style="float: right;"><i class="fas fa-edit">Edit</a></i>
                                            <button type="button" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;"> Upload</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Trade Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{$client->business->first()->trade_name}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Mobile</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{$client->contact_number}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">TIN</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{$client->tin->first()->tin_no}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Mode of Filling</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{$client->modeofpayment->mode_name}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Registration Date</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{$client->business->first()->registration_date}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Registered Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{$client->registeredAddress->first()->unit_house_no}} {{$client->registeredAddress->first()->street}}
                {{$client->registeredAddress->first()->city_name}} {{$client->registeredAddress->first()->province_name}}
                {{$client->registeredAddress->first()->postal_no}}
                                        </div>
                                    </div>
                                    <hr>
                                    
          <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Type of Taxes</h6>

<div class="row">
  <div class="col-sm-6">
    <p class="m-b-10 f-w-600"><a href="{{route('showVat', $client->id)}}" class="text-dark"><i class="fa fa-folder me-2 " aria-hidden="true"></i>VAT</a></p>
    <h6 class="text-muted f-w-400"></h6>
  </div>                                              
  <div class="col-sm-6">
    <p class="m-b-10 f-w-600"><a href="{{route('showTaxItr',$client->id)}}" class="text-dark"><i class="fa fa-folder me-2" aria-hidden="true"></i>ITR</a></p>
    <h6 class="text-muted f-w-400"></h6>
  </div>
  <div class="col-sm-6">
    <p class="m-b-10 f-w-600"><a href="{{route('showTaxPay',$client->id)}}" class="text-dark"><i class="fa fa-folder me-2" aria-hidden="true"></i>Registration Fee</a></p>
    <h6 class="text-muted f-w-400"></h6>
  </div>

</div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
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