<!DOCTYPE html>
<html lang="en">
    <title>
        My Profile
    </title>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- ADMIN -->
    <!-- <link rel="stylesheet" href="{{asset('css/client_profile.css')}}"> -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">
   
</head>
<body>
@extends('layout.master')
@section('content')
<a href="{{url()->previous()}}" class="btn btn-secondary ms-2 mt-3" style="float: left;">Back</a><br>

    <section class="content">
      <div class="container-fluid">
        <div class="row mt-5">

          <div class="col-md-4">
            <div class="card bg-white">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../../dist/img/bulano.png" alt="User profile picture">
                </div>
                <h2 class="profile-username text-dark text-center"><b>{{$client->company_name}}</b></h2>
                <h5 class="text-primary text-center">{{$client->email_address}}</h5>
                @foreach ($client->registeredAddress as $regadd)
                <p class="text-dark text-center">{{$regadd->city_name}},{{$regadd->postal_no}}</p>
                                            @endforeach
                
              </div>
              <hr>
                <h6>TYPE OF TAXES</h6>
                        <div class="row mt-2">
                          @foreach($client->clientTaxes  as $taxType)
                            <div class="col-sm-6">
                              <h5 class="m-b-10 f-w-600"><a href="{{route('show-forms', ['id'=>$taxType->tax_form_id,'client'=>$client->id] )}}" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Tax Form's 2551Q, 2550M, 2550Q" data-bs-toggle="modal" data-bs-target="#vatModal"><i class="fa fa-folder me-2 " aria-hidden="true" style='color: #f3da35'></i><b>{{$taxType->taxForms->tax_form_no}}</b></a></h5>
                              <h6 class="text-white f-w-400"></h6>
                            </div> 
                          @endforeach                                    
                        </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="card bg-white">

              <div class="card-header bg-info p-2">
                <h5 class="header-title  mt-2">Personal Information</h5>
              </div>

              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <div class="post">
                      <div class="card-body">

                        <div class="row">
                          @foreach ($client->tin as $tin)
                            <div class="col-sm-3">
                              <h6 class="mb-0 text-dark"><b>TIN</b></h6>
                            </div>
                            <div class="col-sm-9 text-dark">
                              {{$tin->tin_no}}
                            </div>
                          @endforeach
                        </div>
                        <hr>

                        @foreach ($client->business as $busi)
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0 text-dark"><b>Registration Date</b></h6>
                            </div>
                            <div class="col-sm-9 text-dark">
                              {{ \Carbon\Carbon::parse($busi->registration_date)->format('F d, Y')}}
                            </div>
                          </div>
                          <hr>
                          <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0 text-dark"><b>Trade Name</b></h6>
                            </div>
                            <div class="col-sm-9 text-dark">
                              {{$busi->trade_name}}
                            </div>
                          </div>
                        @endforeach

                        <hr>
                        <div class="row">
                          @foreach ($client->registeredAddress as $regadd)
                            <div class="col-sm-3">
                              <h6 class="mb-0 text-dark"><b>Registered Address</b></h6>
                            </div>
                            <div class="col-sm-9 text-dark">
                              {{$regadd->unit_house_no}} {{$regadd->street}}
                              {{$regadd->city_name}} {{$regadd->province_name}}
                              {{$regadd->postal_no}}
                            </div>
                          @endforeach
                        </div>

                        <hr>
                        <div class="row">
                          <div class="col-sm-3">
                            <h6 class="mb-0 text-dark"><b>Mode of Filing</b></h6>
                          </div>
                          <div class="col-sm-9 text-dark">
                            {{$client->modeofpayment->mode_name}}
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>
    </section>
    @endsection
</body>
</html>