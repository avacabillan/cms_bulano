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
    <div class="card-body">
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
          </div>
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
     
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
  
          <div class="col-lg-4 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h4 class="pt-3">Registered Guest</h4>
              </div>
              <div class="icon pb-2">
                 <i class="fa fa-user"></i>
              </div>
                 <a href="{{route('requestee')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h4 class="pt-3">Reminder Calendar</h4>
              </div>
              <div class="icon pb-2">
                 <i class="fas fa-sticky-note"></i>
              </div>
                 <a href="{{route('display-calendar')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-4 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h4 class="pt-3">BIR Calendar</h4>
              </div>
              <div class="icon pb-2">
                 <i class="far fa-calendar-alt"></i>
              </div>
                 <a href="{{route('bir-calendar')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="col-sm-6 mb-2 ms-2">
<h3>Associates</h3>
</div>
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
