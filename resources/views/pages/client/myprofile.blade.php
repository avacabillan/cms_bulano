
@extends('layout.master')
@section('title')
    Client Dash
@endsection 
@section('content')


<div class="siderbar_main toggled">
    <div class="page-content">

        <div class="container">
            <div class="main-body  pt-5 mt-5">

                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="images/bulano.png"  class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h4>{{$client->company_name}}</h4>
                                            <p class="text-secondary mb-1">{{$client->email_address}}</p>
                                            @foreach ($client->registeredAddress as $regadd)
                                            <p class="text-muted font-size-sm">{{$regadd->city_name}},{{$regadd->postal_no}}</p>
                                            @endforeach
	
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
                                        @foreach ($client->business as $busi)
                                        <div class="col-sm-9 text-secondary">
                                        {{$busi->trade_name}}
                                        </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                   
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">TIN</h6>
                                        </div>
                                        @foreach ($client->tin as $tin)
                                        <div class="col-sm-9 text-secondary">
                                            {{$tin->tin_no}}
                                        </div>
                                        @endforeach
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
                                        @foreach ($client->business as $busi)
                                        <div class="col-sm-9 text-secondary">
                                            {{$busi->registration_date}}
                                        </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
@stop