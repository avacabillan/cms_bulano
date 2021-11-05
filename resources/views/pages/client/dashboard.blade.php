
@extends('layout.master')
@section('title')
    Client Dash
@endsection 
@section('content')

@include('shared.navbar')
@include('pages.client.sidebar')

<div class="siderbar_main toggled">
  <div class="page-content">
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Dashboard for Client') }}
      </h2>
    </x-slot>
    <div class="card-body">
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif
        {{ __('You are logged in as Client!') }}
    </div>

    <div class="form-group col-md-12">
      <div class="alert alert-success ms-3 me-3" id="admin_dash_heading" role="alert">
        <h4 class="alert-heading" id="heading_text">Welcome to Dashboard</h4>
        <p id="heading_text">Hello! I am Terisy.</p>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-6">
        <h3 class="table_heading text-dark mb-3">Type of Taxes</h3>
        <table id="example" class="table table-striped" style="width:100%">
          <thead class="text-dark">
            <tr>
            <th class="text-dark">VAT</th>
            <th class="text-dark">ITR</th>
            <th class="text-dark">Reg. Fee</th>
            <th class="text-dark">WHCompensation</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Alfonso Escobar</td>
              <td>Michael Talavera</td>
              <td>Cristina Baltazar</td>
              <td>Michael Talavera</td>
            </tr>
            <tr>
              <td>Bianca Mae</td>
              <td>Genelyn Cata</td>
              <td>Mitz Mia</td>
              <td>Ava</td>
            </tr>
            <tr>
              <td>Ambayan</td>
              <td>Marc</td>
              <td>Gab</td>
              <td>Lorenz</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="col-md-6">
        
      </div>
    </div>

  </div>
</div>

@section('scripts')
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
@endsection
@stop