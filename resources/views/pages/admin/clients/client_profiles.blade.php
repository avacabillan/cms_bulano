


<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- ADMIN -->
    <link rel="stylesheet" href="{{asset('css/client_profile.css')}}">

</head>
<body>
<div class="d-flex p-4 mt-3" >

    <div class="col-sm-4 user-profile"> 

      <input class="form-control" type="hidden" value="{{$client->id}}" name="client_id">
      <a href="{{url()->previous()}}" class="btn btn-info ms-2" style="float: left;">Back</a>

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

          <div class="row mt-2">
          
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600"><b>Associate</b></p>
              <h6 class="text-muted ms-2 f-w-400">{{$client->associates->name}}</h6>
            </div>
          
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600"><b>Cell Phone No.</b></p>
              <h6 class="text-muted ms-2 f-w-400">{{$client->contact_number}}</h6>
            </div>
            @foreach ($client->tin as $tin)
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600"><b>TIN</b></p>
              <h6 class="text-muted ms-2 f-w-400">{{$tin->tin_no}}</h6>
            </div>
            @endforeach
            
            <div class="col-sm-6">
              <p class="m-b-10 f-w-600"><b>Mode of Filing</b></p>
              <h6 class="text-muted ms-2 f-w-400">{{$client->modeofpayment->mode_name}}</h6>
            </div>
            @foreach ($client->business as $busi)
              <div class="col-sm-6">
                <p class="m-b-10 f-w-600"><b>Registration Date</b></p>
                <h6 class="text-muted ms-2 f-w-400">{{$busi->registration_date}} </h6>
              </div>
              <div class="col-sm-6">
                <p class="m-b-10 f-w-600"><b>Trade Name</b></p>
                <h6 class="text-muted ms-2 f-w-400">{{$busi->trade_name}}</h6>
              </div>
            @endforeach
            @foreach ($client->registeredAddress as $regadd)
              <div class="col-sm-6">
                <p class="m-b-10 f-w-600"><b>Registered Address</b></p>
                <h6 class="text-muted ms-2 f-w-400">
                  {{$regadd->unit_house_no}} {{$regadd->street}}
                  {{$regadd->city_name}} {{$regadd->province_name}}
                  {{$regadd->postal_no}}</h6>
              </div>
            @endforeach
            <br> 
<hr>
            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Type of Taxes</h6>
            
            <div class="row mt-2">
            @foreach($client->clientTaxes  as $taxType)
              <div class="col-sm-6">
                <p class="m-b-10 f-w-600"><a href="{{route('show-forms', $client->id)}}" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Tax Form's 2551Q, 2550M, 2550Q" data-bs-toggle="modal" data-bs-target="#vatModal"><i class="fa fa-folder me-2 " aria-hidden="true"></i>{{$taxType->taxForms->tax_form_no}}</a></p>
                <h6 class="text-muted f-w-400"></h6>
              </div> 
            @endforeach                                    
              <!-- <div class="col-sm-6">
                <p class="m-b-10 f-w-600"><a href="{{route('client-showTaxItr',$client->id)}}" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Tax Form's 1701, 1701Q, 1702ITR, 1702Q"><i class="fa fa-folder me-2" aria-hidden="true"></i>ITR</a></p>
                <h6 class="text-muted f-w-400"></h6>
              </div>
              <div class="col-sm-6">
                <p class="m-b-10 f-w-600"><a href="{{route('client-showTaxPay',$client->id)}}" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Tax Form's 0605, 0619E, 0601EQ, 0601C"><i class="fa fa-folder me-2" aria-hidden="true"></i>Registration Fee</a></p>
                <h6 class="text-muted f-w-400"></h6>
              </div> -->
            </div>
            

          </div>
        </div> 
      </div> 
    </div>

  </div>


       
     
<script>
  document.addEventListener('DOMContentLoaded', function() {       
    var myModal = new bootstrap.Modal(document.getElementById('vatModal'), options)

      $('#staticBackdrop').modal('show');
  });
</script>

</body>
</html>



