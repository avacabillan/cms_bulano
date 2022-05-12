
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
    @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
      </ul>
    </div><br />
    @endif
    <div class="card card-dark card-outline card-default">
      <div>    <a href="{{url()->previous()}}" class="btn btn-primary btn-sm">Back to requestees</a><br>
      </div>
      <div class="card-header">
        
        <h3 class="card-title">Input Client's Data</h3>
    </div>
   
    <div class="card-body">
    <a  class="btn btn-success fixed-top text-end" id="corImage" href="{{asset('public/files/'.$requestee->cor)}}" data-lightbox="$requestee->cor" style="width: 30%; float: right;">View COR</a>
      <div class="row">

       <form action="{{route('insertClient',$requestee->id)}}" class="row need-validation"  id="addClientForm" name="addClientForm" novalidate>

        <h4 class="text-center mb-3"><b>Personal Information</b></h4>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group" >
              <label for="validationCustom01" class="form-label">OCN</label>
              <input type="text" class="form-control" value="{{old('ocn')}}" name="ocn" style="width: 100%;" required>
              <div class="invalid-feedback"></div>
            </div>
          </div>
        </div>

        <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="validationCustom02" class="form-label">Name</label>
            <input type="text" class="form-control"  value="{{$requestee->name}}"  name="client_name" style="width: 100%;" required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="form-group">
            <label for="validationCustom03" class="form-label">Email</label>
            <input type="text" class="form-control" value="{{$requestee->email}}" name="email" style="width: 100%;" required>
            <div class="invalid-feedback"></div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="validationCustom04" class="form-label">TIN</label>
            <input type="text" class="form-control" value="{{old('tin')}}" name="tin" style="width: 100%;" required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="form-group">
            <label for="validationCustom05" class="form-label">Contact No.</label>
            <input type="text" class="form-control" value="{{$requestee->phone}}" name="client_contact" style="width: 100%;" required>
            <div class="invalid-feedback"></div>
             
          </div>
        </div>
        </div>
        
        <div class="row">
        <h4 class="text-center mb-5"><b>Business Information</b></h4>
        <div class="col-md-6">
          <div class="form-group">
            <label for="validationCustom06" class="form-label">Registration Date</label>
            <input type="date" class="form-control"  value="{{old('reg_date')}}" name="reg_date" style="width: 100%;" required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="form-group">
            <label for="validationCustom07" class="form-label">Associate</label>
            <select  name="assoc" class="form-control" style="width: 100%;" required>
              <option selected disabled value="">--Select Associate--</option>
                @foreach($assocs as $assoc)
                <?php
                  $countClient = DB::table('clients')
                  ->join('associates', 'clients.assoc_id', '=' , 'associates.id')
                  ->where('clients.assoc_id', $assoc->id)
                  ->count();
                ?>
                <option value="{{$assoc->id}}">{{$assoc->name}} <?php echo " ($countClient clients)";?></option> 
                @endforeach
                <div class="invalid-feedback"></div>
            </select>
           
          </div>

          @livewireStyles
              <div class="row mt-2">
                <div class="col ">
                  <div class="form-group">
                    <div name="corporate" required>
                      <b style="width: 100%;"><livewire:dropdown /></b>
                    </div>
                  </div> 
                </div> 
              </div>
            @livewireScripts 
        </div>
        
        <div class="col-md-6">
          <div class="form-group">
            <label for="validationCustom08" class="form-label">Trade Name</label>
            <input type="text" class="form-control"  value="{{old('trade_name')}}"  name="trade_name" style="width: 100%;" required>
            <div class="invalid-feedback"></div>
          </div>
          <div class="form-group">
            <label for="validationCustoms" class="form-label">Mode of Filing</label>
            <select name="mode" class="form-control" style="width: 100%;" required>
              <option value="">--Select Mode of Filing--</option>
              @foreach($modes as $mode)
                <option value="{{$mode['id']}}"  {{ $requestee->modeofpayment->id == $mode['id'] ? 'selected="selected"' : '' }}>{{$mode->mode_name}}</option>
              @endforeach
            </select>
            <div class="invalid-feedback"></div>
          </div>
        </div>
        </div>
        
        <h4 class="text-center mb-5"><b>Address Information</b></h4>
        <div class="row"> 
          <div class="col-md-6">
            <div class="form-group">
              <label for="validationCustom10" class="form-label">Unit house no.</label>
              <input type="text" value="{{old('unit_house_no')}}" class="form-control" name="unit_house_no" style="width: 100%;" required>
              <div class="invalid-feedback"></div>
            </div>
            <div class="form-group">
              <label for="validationCustom11" class="form-label">Street</label>
              <input type="text" value="{{old('street')}}" class="form-control" name="street" style="width: 100%;" required>
              
                <div class="invalid-feedback"></div>
            
          </div>
        

        <div class="col-md-6">
          <div class="form-group">
            <label for="validationprov" class="form-label">Province</label>
              <input type="text" value="{{old('client_province')}}" class="form-control" name="client_province" style="width: 100%;" required>
              <div class="invalid-feedback"></div>
          </div>
          <div class="form-group">
            <label for="validationCustom13" class="form-label">City/Municipality</label>
            <input type="text" class="form-control"  value="{{old('client_city')}}"  name="client_city" style="width: 100%;" required>
            <div class="invalid-feedback"></div>
          </div>
        </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group" >
              <label for="validationCustom14" class="form-label">Postal Code</label>
              <input type="text" class="form-control"  value="{{old('client_postal')}}"  name="client_postal" style="width: 100%;" required>
              <div class="invalid-feedback"></div>
          </div>
        </div>
        

        
          <div class="col-md-12 .offset-md-3">
            <Label>Tax Types</Label>
            <ul class="checkbox-grid">
              @foreach($taxForms as $taxForm)
                <li style="display: block; float: left; width: 25%;">
                  <input  type="checkbox"  value="{{$taxForm->id}}" name="taxesChecked[]" required>
                  <span class="ml-3 text-sm"><h6>{{ $taxForm->tax_form_no }}</h6></span>
                </li>
              @endforeach
            </ul>
            <div class="invalid-feedback"></div>
          </div> 
       <div class="row pt-4">
          <div class="col-md-6">
            <div class="form-group" >
                <label for="validationCustom16" class="form-label"><b>Username</b></label>
                <input type="text" class="form-control" value="{{$requestee->email}}" name="username" placeholder="email@bulano.com" required>
                <div class="invalid-feedback"></div>
              </div>
              </div>
          
          </div>
         
        
          
              <fieldset disabled>
                <div class="col-md-6">
                  <div for="disabledTextInput" class="form-label" >
                    <label for="" class="form-label"><b>Password</b></label>
                    <input type="password" id="disabledTextInput" class="form-control" placeholder="Default password is same with username">    
                   
                  </div>
                  </div>      
                </div>
              </fieldset>
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