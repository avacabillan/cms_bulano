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
          
          <div class="admin_dashboard_container">
            @foreach ($associates as $associate )
            <div class="admin_dashboard_card ms-3 bg-light">
              <div class="admin_user_info">
                <input type="hidden" value ="{{$associate->id}}" name="assoc_id">
                <small class="associate_name" >{{$associate->name}}</small>
              </div>
            
            <?php
            foreach($associates as $assoc){
              $countClient = DB::table('clients')
              ->join('associates', 'clients.assoc_id', '=' , 'associates.id')
              ->where('clients.assoc_id', $assoc->id)
              ->count();
              echo "<h2 >$countClient</h2>";
            }
            ?>
            
              
              <div class="admin_total">
                
                <small class="admin_total_text">CLIENTS</small>
              </div>
              <p class="small-box-footer text-white"><b>{{$assocs_3->name}}</b></p>
            </div>
            
            @endforeach
           
            
          </div>
        </div>
        <!----- END OF ROW form-group col-md-12 ----->
        <!-- <div class="grid">
          <div class="main bg-light">
            <h5>Associates Perforamance Quarterly</h5>
            <hr>
            <div class="associate_name">Bianca Cortez</div>
              <div class="assocs_field">
                <div class="assoc_percent_1" id="percentage">90%</div>
              </div>

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
