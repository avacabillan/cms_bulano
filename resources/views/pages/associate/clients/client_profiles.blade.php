
@extends('layout.master')
@section('title')
  Client Profile
@stop
@section('content')


  <div class="d-flex p-4 mt-3" >
    <div class="col-sm-4 user-profile"> 
      <input class="form-control" type="hidden" value="{{$client->id}}" name="client_id">
      <div class="card-block text-center text-white">
        <div class="text-center">
          <img src="/images/Logo.png" class="user_profile" >
        </div>
        <br> 
          <h4 class="f-w-600">{{$client->company_name}}</h4>
          <p id="name" value="name">{{$client->email_address}}</p>         
        </div>
      </div>

      <div class="col-sm-8">
        <div class="card-block bg-light"> 
          <!-- <a class="btn btn-success btn-sm editbtn" data-toggle="modal" data-target="#updateClientModal" href="{{route('editClient',$client)}}" style="float: right;"><i class="fas fa-edit">Edit</a></i> -->
          <!-- <button type="button" class="btn btn-primary btn-sm me-2" data-bs-toggle="modal" data-bs-target="#exampleModal" style="float: right;"> Upload</button> -->
          <h6 class="m-b-20 p-b-5b-b-default f-w-600">Personal Information</h6>
          <hr>

          <div class="row mt-5">
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600">Associate</p>
              <h6 class="text-muted ms-2 f-w-400">{{$client->associates->name}}</h6>
            </div>
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600">Cell Phone No.</p>
              <h6 class="text-muted ms-2 f-w-400">{{$client->contact_number}}</h6>
            </div>
            @foreach ($client->tin as $tin)
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600">TIN</p>
              <h6 class="text-muted ms-2 f-w-400">{{$tin->tin_no}}</h6>
            </div>
            @endforeach
            
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600">Mode of Filing</p>
              <h6 class="text-muted ms-2 f-w-400">{{$client->modeofpayment->mode_name}}</h6>
            </div>
            @foreach ($client->business as $busi)
              <div class="col-sm-6">
                <p class="m-b-10 f-w-600">Registration Date</p>
                <h6 class="text-muted ms-2 f-w-400">{{$busi->registration_date}} </h6>
              </div>
              <div class="col-sm-6">
                <p class="m-b-10 f-w-600">Trade Name</p>
                <h6 class="text-muted ms-2 f-w-400">{{$busi->trade_name}}</h6>
              </div>
            @endforeach
            @foreach ($client->registeredAddress as $regadd)
              <div class="col-sm-6">
                <p class="m-b-10 f-w-600">Registered Address</p>
                <h6 class="text-muted ms-2 f-w-400">
                  {{$regadd->unit_house_no}} {{$regadd->street}}
                  {{$regadd->city_name}} {{$regadd->province_name}}
                  {{$regadd->postal_no}}</h6>
              </div>
            @endforeach
            <br> 

            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Type of Taxes</h6>
            
            <div class="row">
            @foreach($client->clientTaxes  as $taxType)
              <div class="col-sm-6">
                <p class="m-b-10 f-w-600"><a href="{{route('show-forms', $client->id)}}" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Tax Form's 2551Q, 2550M, 2550Q" data-bs-toggle="modal" data-bs-target="#vatModal"><i class="fa fa-folder me-2 " aria-hidden="true"></i>{{$taxType->taxForms->tax_form_no}}</a></p>
                <h6 class="text-muted f-w-400"></h6>
              </div> 
            @endforeach                                    
          
            </div>
            

          </div>
        </div> 
      </div> 
    </div>

  </div>


       

@endsection