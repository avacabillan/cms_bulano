
@extends('layout.master')
@section('title')
    Associate Dash
@endsection 
@section('content')

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row">
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

  <!-- Main content -->
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card card-dark card-outline">

          <div class="card-header">
            <h3 class="card-title">Client List</h3>
          </div><!-- /.card-header -->

          <table class="table table-bordered yajra-datatable">
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
      </div>
    </div><!-- /.card -->
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


