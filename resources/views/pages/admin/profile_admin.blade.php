<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>

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
                    <h5><a href="{{route('admin_list')}}"><b>Admin List</b></a></h5>               
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
                            <h2 class="profile-username text-center">{{$admin->myuser->name}}</h2>
                            <h5 class="text-primary text-center">{{$admin->email_address}}</h5>
                            <ul class="list-group list-group-unbordered mb-3">
                            
                                <li class="list-group-item">
                                    <b>Department</b> <a class="float-right text-dark ">{{$admin->department->department_name}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Hired date</b> <a class="float-right text-dark ">{{$admin->hired_date}}</a>
                                </li>

                            </ul>
                           
                        </div>

                    </div>
                </div>


                <div class="col-md-8">
                    <div class="card bg-white">
                       
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
                                                {{$admin->phone_no}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0 text-dark"><b>BirthDate</b></h6>
                                                </div>
                                                <div class="col-sm-9 text-dark">
                                                {{$admin->birth_date}}
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0 text-dark"><b>Address</b></h6>
                                                </div>
                                                <div class="col-sm-9 text-dark">
                                                {{$admin->complete_address}}
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


    

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('dist/js/adminlte.min.js?v=3.2.0')}}"></script>
<script src="{{asset('dist/js/demo.js')}}"></script>

</html>