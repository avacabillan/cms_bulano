
@extends('layout.master')
@section('title')
@stop
@section('content')

@include('shared.navbar')
@include('pages.admin.sidebar')
<div class="d-flex p-4 mt-5" style="margin-left: 20rem;">
  <div class="col-sm-4 user-profile"> 
    <input class="form-control" type="hidden" value="{{$client->id}}" name="client_id">
    <div class="card-block text-center text-white">
      <div class="text-center">
        <img src="images/bianca.jpg" class="rounded" alt="User-Profile-Image">
      </div>
      <br> 
        <h4 class="f-w-600">{{$client->client_name}}</h4>
        <p id="name" value="name">{{$client->email}}</p>         
      </div>
    </div>

    <div class="col-sm-8">
      <div class="card-block bg-light"> 
        
        
        <h6 class="m-b-20 p-b-5b-b-default f-w-600">Personal Information</h6>
        <hr>

        <div class="row mt-5">
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

          <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Type of Taxes</h6>

          <div class="row">
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600"><a href="{{route('client-showVat', $client->id)}}" class="text-dark"><i class="fa fa-folder me-2 " aria-hidden="true"></i>VAT</a></p>
              <h6 class="text-muted f-w-400"></h6>
            </div>                                              
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600"><a href="{{route('client-showTaxItr',$client->id)}}" class="text-dark"><i class="fa fa-folder me-2" aria-hidden="true"></i>ITR</a></p>
              <h6 class="text-muted f-w-400"></h6>
            </div>
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600"><a href="{{route('client-showTaxPay',$client->id)}}" class="text-dark"><i class="fa fa-folder me-2" aria-hidden="true"></i>Registration Fee</a></p>
              <h6 class="text-muted f-w-400"></h6>
            </div>

        </div>
      
      </div> 
    </div>

  </div>
</div>


@stop