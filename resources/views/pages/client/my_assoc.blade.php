@extends('layout.master')
@section('title')
    My associate
@endsection 
@section('content')

         

<div class="d-flex p-4 " style="margin-left: 5rem;" id="assocprofile" >
  <div class="col-sm-4 user-profile  pt-2"> 
    
    
    <div class="card-block text-center text-white">
      <div class="text-center">
        <img src="/images/Logo.png" class="user_profile" >
      </div>
      <br> 
        <h2 class="f-w-600">{{$client->associates->name}}</h2>
        <p id="name" value="name">{{$client->associates->email}}</p>         
      </div>
    </div>

    <div class="col-sm-8">
      <div class="card-block bg-light"> 
      <span style="font-size: 30px;">
        <a href="{{route('client_message')}}" style="float:right;" ><i class="fas fa-envelope-square"></i></a>
      </span>
        <h6 class="m-b-20 p-b-5b-b-default f-w-600">Personal Information</h6>
       
        <hr>

        <div class="row mt-5">
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Cell Phone No.</p>
            <h6 class="text-muted ms-2 f-w-400">{{$client->associates->contact_number}}</h6>
          </div>

          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">BirthDate</p>
            <h6 class="text-muted ms-2 f-w-400 text-dark">{{$client->associates->birth_date}}</h6>
          </div>
          
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Address</p>
            <h6 class="text-muted ms-2 f-w-400">{{$client->associates->address}}</h6>
          </div>
          

          
      </div> 
    </div>

  </div>
</div>


@stop