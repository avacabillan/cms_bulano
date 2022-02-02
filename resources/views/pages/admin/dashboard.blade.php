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
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
              {{ __('Dashboard for Admin') }}
            </h2>
          </x-slot>
          <div class="card-body text-center">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
              {{ __('You are logged in as Admin!') }}
          </div>
          <div class="form-group col-md-12">
            <div class="alert alert-success ms-3 me-3" id="admin_dash_heading" role="alert">
              <h4 class="alert-heading" id="heading_text">Welcome to Dashboard, {{Auth::user()->name}}</h4>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        @foreach ($associates as $associate )
          <div class="col-lg-3 col-6">
            
            <div class="small-box bg-info"><!-- small box -->
            
              <div class="inner">
                <?php
                    $countClient = DB::table('clients')
                    ->join('associates', 'clients.assoc_id', '=' , 'associates.id')
                    ->where('clients.assoc_id', $associate->id)
                    ->count();
                    echo "<h3 >$countClient</h3>";
                ?>
                <p>Clients</p>
              </div>
              <div class="icon">
                <i class="fa fa-users"></i>
              </div>
              <p class="small-box-footer"><strong>{{$associate->name}}</strong></p>
            </div>
          </div><!-- ./col -->
          @endforeach        
        </div><!-- /.row -->
      </div>
    </section>

@stop
