
@extends('layout.master')
@section('title')
    Edit Associate
@endsection
@section('content')

@livewireStyles

<div class="content-header">
  <div class="container-fluid">

    <div class="card card-dark card-outline card-default">
      <div class="card-header">
        <h3 class="card-title">Edit Client's Data</h3>
    </div>

    <div class="card-body">
      <div class="row">

        <form action="" class="row"  id="addClientForm" name="addClientForm">

          <h4 class="text-center mb-3"><b>Personal Information</b></h4>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control"  value="{{$client->company_name}}"  name="client_name" style="width: 100%;">
              </div>
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" value="{{$client->email_address}}" name="email" style="width: 100%;">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>TIN</label>
                @foreach ($client->tin as $tin)
                  <input type="text" class="form-control" value="{{$tin->tin_no}}" name="tin">
                  @endforeach              </div>
              <div class="form-group">
                <label>Contact No.</label>
                <input type="text" class="form-control" value="{{$client->contact_number}}" name="client_contact" style="width: 100%;">
              </div>
            </div>
          </div>
        
          <div class="row">
            <h4 class="text-center mb-5"><b>Business Information</b></h4>
            <div class="col-md-6">
              <div class="form-group">
                <label>Registration Date</label>
                @foreach ($client->business as $busi)
                    <input type="date" class="form-control"  value="{{$busi->registration_date}}" name="reg_date">
                    @endforeach              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Trade Name</label>
                @foreach ($client->business as $busi)
                    <input type="text" class="form-control" value="{{$busi->trade_name}}" name="trade_name">
                    @endforeach              </div>
            </div>
          </div>
          @foreach ($client->registeredAddress as $regadd)   
          <h4 class="text-center mb-5"><b>Address Information</b></h4>
          <div class="row"> 
            <div class="col-md-6">
              <div class="form-group">
                <label>Unit House No.</label>
                <input type="text" value="{{$regadd->unit_house_no}}"  class="form-control" id="inputEmail4" name="unit_house_no" style="width: 100%;">
              </div>
              <div class="form-group">
                <label>Street</label>
                <input type="text" value="{{$regadd->street}}" class="form-control" id="inputPassword4" name="street" style="width: 100%;">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Province</label>
                <input type="text" class="form-control" id="inputAddress2" value="{{$regadd->province_name}}" name="client_province" style="width: 100%;">
              </div>
              <div class="form-group">
                <label>City/Municipality</label>
                <input type="text" class="form-control" id="inputAddress" value=" {{$regadd->street}}" name="client_city" style="width: 100%;">
              </div>
            </div>
          </div>
          @endforeach
          <div class="row">
            <div class="col-md-6">
              <div class="form-group" >
                <label>Postal Code</label>
                <input type="text" class="form-control" id="inputCity" value="{{$regadd->postal_no}}" name="client_postal" style="width: 100%;">
              </div>
            </div>
          </div>
          <h4 class="text-center mb-4"><b>Type of Taxes</b></h4>
          <div class="col-md-12 .offset-md-3">
            <ul class="checkbox-grid">
              @foreach($taxForms as $taxForm)
                <li style="display: block; float: left; width: 25%;">
                  <input type="checkbox"  value="{{$taxForm->id}}" name="taxesChecked[]"  {{  ($taxForm->id == $client->clientTaxes ? ' checked' : '') }} required>
                  <span class="ml-3 text-sm"><h6>{{ $taxForm->tax_form_no }}</h6></span>
                </li>
              @endforeach
            </ul>
            
          </div> 
    
            <button type="submit" class="btn btn-primary" id="btnUpdateSubmit">Update</button>
        
        </form>

      </div>
    </div>
    
  </div>
</div>
 @livewireScripts
@stop