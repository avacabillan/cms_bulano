
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Profile</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css?v=3.2.0">

</head>
<body>
@extends('layout.master')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                  
                    {{-- <h5><a href="{{route('admin-clients-list')}}"><b>Client List</b></a></h5>                --}}
                </div>
            </div>
        </div>
    </section> 

    <section class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-md-4">
            <div class="card bg-white">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle" src="../../dist/img/bulano.png" alt="User profile picture">
                </div>
                <h2 class="profile-username text-center">{{$client->company_name}}</h2>
                <h5 class="text-primary text-center">{{$client->email_address}}</h5>
                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Associate</b> <p class="float-right">{{$client->associates->name}}</p>
                  </li>
                  <li class="list-group-item">
                    <b>Cell Phone No.</b> <p class="float-right">{{$client->contact_number}}</p>
                  </li>
                </ul>
                        <h6>Type of Taxes</h6>
                        <div class="row mt-2">
                          @foreach($client->clientTaxes  as $taxType)
                            <div class="col-sm-6">
                              <h5 class="m-b-10 f-w-600"><a href="{{route('preview-forms', ['id'=>$taxType->tax_form_id,'client'=>$client->id] )}}" class="text-dark" data-bs-toggle="tooltip" data-bs-placement="top" title="Tax Form's 2551Q, 2550M, 2550Q" data-bs-toggle="modal" data-bs-target="#vatModal"><i class="fa fa-folder me-2 " aria-hidden="true" style='color: #f3da35'></i><b>{{$taxType->taxForms->tax_form_no}}</b></a></h5>
                              <h6 class="text-dark f-w-400"></h6>
                            </div> 
                          @endforeach                                    
                        </div>
              </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="card bg-white">

              <div class="card-header bg-white p-2">
                <a type="button" class="btn btn-primary text-white btn-sm" href="{{route('editClient', $client->id)}}" style="float: right;"><i class="fas fa-edit">Edit</i></a>
                <button type="button" class="btn btn-success btn-sm me-2" data-bs-toggle="modal" data-bs-target="#uploadFiles" style="float: right;"> Upload</button>
                <h5 class="header-title mt-2">Personal Information</h5>
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

          <div class="modal" id="uploadFiles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" >
        <div class="modal-content" style="  width: 100%;">
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
      </div>
    </section>
    @endsection  
@include('sweetalert::alert')
</body>

<script>
    
<script src="../../plugins/jquery/jquery.min.js"></script>

<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="../../dist/js/adminlte.min.js?v=3.2.0"></script>

<script src="../../dist/js/demo.js"></script>
</script>
</html>