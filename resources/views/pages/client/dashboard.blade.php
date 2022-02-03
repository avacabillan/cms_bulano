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
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif
              {{ __('You are logged in as Client!') }}

            <div class="form-group col-md-12">
              <div class="alert alert-success ms-3 me-3" id="admin_dash_heading" role="alert">
                <h4 class="alert-heading" id="heading_text">Welcome to Dashboard, {{Auth::user()->clients->company_name}}</h4>
              
            </div>
          </div>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

          

          <!-- /.col-md-6 -->
          @foreach($clients->clientTaxes as $clientTax)
          <div class="col-lg-6">
          <span style="font-size: 48px; color: Black;">
              <i class="fas fa-folder-open me-2 " aria-hidden="true">{{$clientTax->taxForms->tax_form_no}}</i>
          </span>
          </div><!-- /.col-md-6 -->
          @endforeach
          <!-- /.col-md-6 -->
         

          

        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content -->
    
  
  

@stop