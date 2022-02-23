@extends('layout.master')
@section('title')
    Client Dash
@endsection 
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
            <!-- @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif -->

            <div class="form-group col-md-12">
              <div class="alert alert-success ms-3 me-3" id="client_dash_heading" role="alert">
                <h4 class="alert-heading" id="heading_text">Welcome to Dashboard, {{Auth::user()->clients->company_name}}

                </h4>
              
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- Main content -->
    {{-- <div class="content">
    <h5 class="pb-2 ms-3">Forms</h5>
      <div class="container-fluid">
        <div class="row">

          @foreach($reminders as $deadline)
          <div class="col-md-3 col-sm-6 col-12">
            <div class="info-box shadow">
              <span class="info-box-icon bg-warning"><i class="fas fa-folder-open"></i></span>
              <div class="info-box-content">
                <h4 class="info-box-text"><b>{{$deadline->title}}</b></h4>
              </div>
            </div>
          </div>
          @endforeach

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content --> --}}

    <table  class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Title</th>
          <th>Tax Form No</th>
          <th>Deadline</th>
          <th>Computation</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        @foreach($reminders as $deadline)
        <tr>
          <td>{{$deadline->title}}</td>
          <td>{{$deadline->tax_form_no}}</td>
          <td>{{$deadline->start_date}}</td>
          <td><button class="btn btn-info btn-sm">View</button></td>
          @if($deadline->status == 0)
          <td><button class="btn btn-danger btn-sm" disabled="disabled">Pending</button> </td>
        @else 
        <td><button class="btn btn-success btn-sm" disabled="disabled">Processed</button> </td>
        @endif
        </tr>
        @endforeach
      </tbody>
    </table>
  @include('sweetalert::alert')
<script type="text/javascript">
    setTimeout(function () {

        // Closing the alert
        $('#client_dash_heading').alert('close');
    }, 5000 );
</script>

@stop