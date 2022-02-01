@extends('layout.master')

@section('title')
    Admin Dashboard
@stop
 
@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <x-slot name="header">
            <h2 class="font-semibold text-xl leading-tight">
              {{ __('Dashboard for Client') }}
            </h2>
          </x-slot>
          <div class="card-body text-dark-800 text-center bg-light">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
              {{ __('You are logged in as Client!') }}

            <div class="form-group col-md-12">
              <div class="alert alert-success ms-3 me-3" id="admin_dash_heading" role="alert">
                <h4 class="alert-heading" id="heading_text">Welcome to Dashboard, {{Auth::user()->name}}</h4>
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$assocClient1}}</h3>

                <p>Clients</p>
              </div>
              <div class="icon">
                <i class="fad fa-users"></i>
              </div>
              <p class="small-box-footer text-white"><b>{{$assocs_1->name}}</b></p>
            </div>
          </div><!-- ./col -->
          
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$assocClient2}}</h3>

                <p>Clients</p>
              </div>
              <div class="icon">
                <i class="fad fa-users"></i>
              </div>
              <p class="small-box-footer text-white"><b>{{$assocs_2->name}}</b></p>
            </div>
          </div><!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$assocClient3}}</h3>

                <p>Clients</p>
              </div>
              <div class="icon">
                <i class="fad fa-users"></i>
              </div>
              <p class="small-box-footer text-white"><b>{{$assocs_3->name}}</b></p>
            </div>
          </div><!-- ./col -->

          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>#</h3>

                <p>Clients</p>
              </div>
              <div class="icon">
                <i class="fad fa-users"></i>
              </div>
              <p class="small-box-footer text-white"><b>Associate's Name</b></p>
            </div>
          </div><!-- ./col -->
         
        </div>
      </div>
    </div>


@stop
