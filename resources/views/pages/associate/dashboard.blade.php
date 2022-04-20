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
       {{-- @if(auth()->user())
       @forelse(auth()->user()->notifications->whereNull('read_at') as $notification)
          <div class="alert alert-success" role="alert">
              [{{ $notification->created_at }}] User {{ $notification->data['name'] }} ({{ $notification->data['email'] }}) has was assigned to you.
              <a href="{{route('assoc.markNotification')}}" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                  Mark as read
              </a>
          </div>
  
          @if($loop->last)
              <a href="#" id="mark-all">
                  Mark all as read
              </a>
          @endif
          @empty
              There are no new notifications
          @endforelse
      @endif --}}
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

  <div class="card" style="width: 30rem; margin-left:20px; margin-top: -3%;">
    
    <div class="card-header">
      <h6 class="text-danger">Clients with Upcoming Deadlines </h6>
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
      <div class="col-12" style="margin-top: -3%;">
        <div class="card card-dark card-outline">

          <div class="card-header">
            <h3 class="card-title"><strong>Client List</strong></h3>
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
          </div>
          </div>
          </div>
  </div>
 

@include('sweetalert::alert')
<script type="text/javascript">
    setTimeout(function () {

        // Closing the alert
        $('#assoc_dash_heading').alert('close');
    }, 5000 );
</script>
@if(auth()->user())
<script>
document.addEventListener('DOMContentLoaded', function() {       
    $.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
    });
  function sendMarkRequest(id = null) {
      return $.ajax("{{ route('assoc.markNotification') }}", {
          method: 'GET',
          data: {
            "_token": "{{ csrf_token() }}",
            "id": id,
          }
      });
  }
  $(function() {
      $('.mark-as-read').click(function() {
          let request = sendMarkRequest($(this).data('id'));
          request.done(() => {
              $(this).parents('div.alert').remove();
          });
      });
      $('#mark-all').click(function() {
          let request = sendMarkRequest();
          request.done(() => {
              $('div.alert').remove();
          })
      });
  });
});
</script>
@endif

@stop


