

@extends('layout.master')
@section('title')
    My Profile
@endsection 
@section('content')
@include('shared.navbar')
@include('pages.client.sidebar')


<div class="siderbar_main toggled">
    <div class="page-content">

        <div class="container">
            <div class="main-body  pt-5 mt-5">

                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="images/bulano.png" alt="Admin" class="rounded-circle" width="150">
                                        <div class="mt-3">
                                            <h4>Client Name</h4>
                                            <p class="text-secondary mb-1">client@gmail.com</p>
                                            <p class="text-muted font-size-sm">Philippines, 8000</p>
                                            <button class="btn btn-outline-primary">Edit Profile</button>
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
                                            Kenneth Valdez
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Mobile</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            Kenneth Valdez
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">TIN</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            Kenneth Valdez
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Mode of Filling</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            Kenneth Valdez
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Registration Date</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            Kenneth Valdez
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
    @stop