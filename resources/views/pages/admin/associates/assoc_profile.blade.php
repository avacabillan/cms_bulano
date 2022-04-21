<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associate Profile</title>

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
                    <h5><a href="{{route('assoc_table')}}"><b>Associate List</b></a></h5>               
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
                            <h2 class="profile-username text-center">{{$associate->name}}</h2>
                            <h5 class="text-primary text-center">{{$associate->email}}</h5>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Position</b> <a class="float-right text-dark">{{$associate->positions->position_name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Department</b> <a class="float-right text-dark ">{{$associate->departments->department_name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Hired date</b> <a class="float-right text-dark ">{{$associate->hired_date}}</a>
                                </li>

                            </ul>
                             <a href="#" class="btn btn-primary btn-block"><b>Message</b></a>
                        </div>

                    </div>
                </div>


                <div class="col-md-8">
                    <div class="card bg-white">
                        <div class="card-header bg-info p-2">
                           <a type="button" class="btn btn-primary" href="{{route('edit',$associate->id)}}" style="float: right;"><i class="fas fa-edit">Edit</i></a>
                            <h5 class="header-title mt-2">Personal Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="activity">

                                    <div class="post">

                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0 text-dark"><b>Cell Phone No.</b></h6>
                                                </div>
                                                <div class="col-sm-9 text-dark">
                                                {{$associate->contact_number}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0 text-dark"><b>BirthDate</b></h6>
                                                </div>
                                                <div class="col-sm-9 text-dark">
                                                {{$associate->birth_date}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0 text-dark"><b>Address</b></h6>
                                                </div>
                                                <div class="col-sm-9 text-dark">
                                                {{$associate->address}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0 text-dark"><b>SSS Number</b></h6>
                                                </div>
                                                <div class="col-sm-9 text-dark">
                                                {{$associate->sss_no}}
                                                </div>
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
    </section>
    @endsection  

</body>


    

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
<script src="{{asset('dist/js/demo.js')}}"></script>

</html>