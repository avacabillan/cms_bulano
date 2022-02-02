
@extends('layout.master')
@section('title')
    Associate Dash
@endsection 
@section('content')
@include('shared.navbar')
@include('pages.associate.sidebar')
<div class="siderbar_main toggled">
  <div class="page-content">
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
              <h4 class="alert-heading" id="heading_text">Welcome to Dashboard, {{Auth::user()->name}}</h4>
              <input type="hidden" value="{{Auth::user()->id}}" name="id">
            </div>
          </div>
       
          
</div>

</div>
</div>
@stop



