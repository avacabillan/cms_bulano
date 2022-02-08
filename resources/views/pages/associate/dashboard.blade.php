
@extends('layout.master')
@section('title')
    Associate Dash
@endsection 
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard for Associaate') }}
        </h2>
    </x-slot>
    <div class="card-body">
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif
        {{ __('You are logged in as Associate!') }}
    </div>

        <div class="form-group col-md-12">
          <div class="alert alert-success ms-3 me-3" id="admin_dash_heading" role="alert">
            <h4 class="alert-heading" id="heading_text">Welcome to Dashboard, {{Auth::user()->associates->name}}</h4>
            <input type="hidden" value="{{Auth::user()->associates->id}}" name="assoc_id">
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content-header -->

<!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
          <div class="col-12">
            <div class="card card-dark card-outline">
              <div class="card-header">
                <h3 class="card-title">Client List</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <!-- <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div> -->
                  </div>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed">
                  <thead>
                    <tr>
                      <th>Client Name</th>
                      <th>Email Address</th>
                      <th>Contact Number</th>
                      <th>OCN</th>
                      <th>Action</th>
                     
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($clients as $client)
                    <tr>
                      <td>{{$client->company_name}}</td>
                      <td>{{$client->email_address}}</td>
                      <td>{{$client->contact_number}}</td>
                      <td>{{$client->ocn}}</td> 
                      <td><button href="{{route('clientProfile',$client->id)}}" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#viewProfile">View</button></td>
                    </tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
    </div> 
  </div>  
</div>

<!--Profile Modal -->
<div class="modal" id="viewProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" >
    <div class="modal-content" style="  width: 1000px; min-height: 450px;">
      <div class="modal-header">
     
        <h5 class="modal-title" id="headingsModal"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        
   
        <div class="modal-body">
       
           
        @include('pages.associate.clients.client_profiles')    
       
        
        </div>  
      </div>
    </div>
  </div>
</div>
<!--Upload File Modal -->
<div class="modal" id="uploadFiles" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" >
    <div class="modal-content" style="  width: 1000px; min-height: 450px;">
      <div class="modal-header">
        <h5 class="modal-title" id="headingsModal"></h5>
        <a class="btn btn-primary" data-bs-toggle="modal" href="#viewProfile" role="button">back</a>
        <!-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> -->
     
      
        <div class="modal-body">
       
           
        @include('pages.associate.clients.add_file')    
                        
        
        </div>  
      </div>
    </div>
  </div>
</div>
@endsection 


