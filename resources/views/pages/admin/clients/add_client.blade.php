
@extends('layout.master')
@section('title')
    Add Client
@endsection
@section('content')

<div class="content-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6">
     
      </div>
    </div>

    <div class="card card-dark card-outline card-default">
      <div class="card-header">
        <h3 class="card-title">Input Client's Data</h3>
    </div>

    <div class="card-body">
    <a  class="btn btn-success fixed-top text-end" id="corImage" href="{{asset('public/files/'.$requestee->cor)}}" data-lightbox="$requestee->cor" style="width: 30%; float: right;">View COR</a>
      <div class="row">

       <form action="{{route('insertClient',$requestee->id)}}" class="row"  id="addClientForm" name="addClientForm">

        <h4 class="text-center mb-3"><b>Personal Information</b></h4>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group" >
              <label>OCN</label>
              <input type="text" class="form-control" value="" name="ocn" style="width: 100%;">
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control"  value="{{$requestee->name}}"  name="client_name" style="width: 100%;">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="text" class="form-control" value="{{$requestee->email}}" name="email" style="width: 100%;">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>TIN</label>
            <input type="text" class="form-control" value="" name="tin" style="width: 100%;">
          </div>
          <div class="form-group">
            <label>Contact No.</label>
            <input type="text" class="form-control" value="" name="client_contact" style="width: 100%;">
          </div>
        </div>
        </div>
        
        <div class="row"></div>
        <h4 class="text-center mb-5"><b>Business Information</b></h4>
        <div class="col-md-6">
          <div class="form-group">
            <label>Registration Date</label>
            <input type="date" class="form-control" name="reg_date" style="width: 100%;">
          </div>
          <div class="form-group">
            <label>Associate</label>
            <select name="assoc" class="form-control" style="width: 100%;">
              <option value="">--Select Associate--</option>
                @foreach($assocs as $assoc)
                <?php
                  $countClient = DB::table('clients')
                  ->join('associates', 'clients.assoc_id', '=' , 'associates.id')
                  ->where('clients.assoc_id', $assoc->id)
                  ->count();
                ?>
                <option value="{{$assoc->id}}">{{$assoc->name}} <?php echo " ($countClient clients)";?></option> 
                @endforeach
            </select>
          </div>

          @livewireStyles
              <div class="row mt-2">
                <div class="col ">
                  <div class="form-group">
                    <div name="corporate" >
                      <b style="width: 100%;"><livewire:dropdown /></b>
                    </div>
                  </div> 
                </div> 
              </div>
            @livewireScripts 
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Trade Name</label>
            <input type="text" class="form-control" name="trade_name" style="width: 100%;">
          </div>
          <div class="form-group">
            <label>Mode of Filing</label>
            <select name="mode" class="form-control" style="width: 100%;">
              <option value="">--Select Mode of Filing--</option>
              @foreach($modes as $mode)
                <option value="{{$mode->id}}">{{$mode->mode_name}}</option>
              @endforeach
            </select>
          </div>
        </div>
        </div>
        
        <h4 class="text-center mb-5"><b>Address Information</b></h4>
        <div class="col-md-6">
          <div class="form-group">
            <label>Unit House No.</label>
            <input type="text" value="" class="form-control" id="inputEmail4" name="unit_house_no" style="width: 100%;">
          </div>
          <div class="form-group">
            <label>Street</label>
            <input type="text" value="" class="form-control" id="inputPassword4" name="street" style="width: 100%;">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label>Province</label>
            <input type="text" class="form-control" id="inputAddress2" name="client_province" style="width: 100%;">
          </div>
          <div class="form-group">
            <label>City/Municipality</label>
            <input type="text" class="form-control" id="inputAddress" name="client_city" style="width: 100%;">
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group" >
              <label>Postal Code</label>
              <input type="text" class="form-control" id="inputCity" name="client_postal" style="width: 100%;">
            </div>
          </div>
        </div>

        <h4 class="text-center mb-4"><b>Type of Taxes</b></h4>
          <div class="col-md-12 .offset-md-3">
            <ul class="checkbox-grid">
              @foreach($taxForms as $taxForm)
                <li style="display: block; float: left; width: 25%;">
                  <input type="checkbox"  value="{{$taxForm->id}}" name="taxesChecked[]"  >
                  <span class="ml-3 text-sm"><h6>{{ $taxForm->tax_form_no }}</h6></span>
                </li>
              @endforeach
            </ul>
          </div> 
       <div class="row pt-4">
          <div class="col-md-6">
            <div class="form-group" >
                <label class="form-label"><b>Username</b></label>
                <input type="text" class="form-control" value="" name="username">
            </div>
          </div>
              <div class="col-md-6">
                <div class="form-group" >
                  <input type="hidden" class="form-control" value="" name="password">    
                </div>      
              </div>
        </div>
        <div class="AddClient_btn" sytle="float: right;">
              <button class="btn btn-primary" type="submit" name="saveBtn" id="saveBtn" value="createClient">Submit</button>
              <button class="btn btn-primary" id="close_ClientProfile" type="button">Cancel</button>
            </div>
        
       </form>
      </div>
    </div>
  </div>
</div>
@stop