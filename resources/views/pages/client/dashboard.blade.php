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

  <div class="row">
    <div class="col-12">
      <div class="card card-dark card-outline me-2 ms-2">
        <div class="card-header">
          <h3 class="card-title">Deadlines</h3><br>
          <hr>
          <table class="table table-bordered yajra-datatable" >
            <thead >
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
          <td>{{ \Carbon\Carbon::parse($deadline->start_date)->format('F d, Y')}}</td>  
          
          <td><a  href="{{route('viewdeclaration', $deadline->id)}}" class="btn btn-info btn-sm" value="">View</a></td>
          <td>
            <a class="btn btn-info btn-sm" href="{{route('view-declaration',['id'=>$deadline->id])}}">
              View
           </a>
            {{-- <a  href="{{route('view-declaration',['id'=>$deadline->id])}}" class="btn btn-info btn-sm" value="">View</a></td> --}}
          @if($deadline->status == 0)
          <td><button class="btn btn-danger btn-sm" disabled="disabled">Pending</button> </td>
        @else 
        <td><button class="btn btn-success btn-sm" disabled="disabled">Processed</button> </td>
        @endif
        </tr>
        @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  @include('sweetalert::alert')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.js"></script>
<script type="text/javascript">
    setTimeout(function () {

        // Closing the alert
        $('#client_dash_heading').alert('close');
    }, 5000 );
</script>


@stop