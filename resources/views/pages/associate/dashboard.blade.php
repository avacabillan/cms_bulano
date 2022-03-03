
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
      <!-- @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif -->
        
    </div>

          <div class="form-group col-md-12">
            <div class="alert alert-success ms-3 me-3" id="assoc_dash_heading" role="alert">
              <h4 class="alert-heading" id="heading_text">Welcome to Dashboard, {{Auth::user()->associates->name}} 
              
              </h4>
              <input type="hidden" value="{{Auth::user()->associates->id}}" name="assoc_id">
          </div>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div><!-- /.content-header -->
  <div class="card" style="width: 30rem; margin-left:20px;">
    <div class="card-header">
      <h6 class="text-danger">Clients with Deadlines Now</h6>
    </div>
    <ul class="list-group list-group-flush">
      @foreach($clientDeadlines as $client)
      <li class="list-group-item">{{$client->company_name}}<br> {{\Carbon\Carbon::parse($client->start_date)->format('F d, Y')}}</li>
     @endforeach
    </ul>
  </div>
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
                    <th>Deadlines</th>
                    
                    <!-- <th>QR</th> -->
                  
                  </tr>
                </thead>
                <tbody>
                  @foreach($clients as $client)
                  <tr>
                    <td>{{$client->company_name}}</td>
                    <td>{{$client->email_address}}</td>
                    <td>{{$client->contact_number}}</td>
                    <td>{{$client->ocn}}</td> 
                    <td><a href="{{route('clientProfile', $client->id)}}" class="btn btn-success btn-sm">View</a></td>
                    <td><a href="{{ route('deadlines',$client->id) }}" class="btn btn-info btn-sm"> View Deadlines</a></td> 
                    
                     
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>    <!-- /.card -->
    </div>
        
            
  </div>
 

@include('sweetalert::alert')
  <script type="text/javascript">
        setTimeout(function () {
  
            // Closing the alert
            $('#assoc_dash_heading').alert('close');
        }, 5000 );
    </script>
@stop


