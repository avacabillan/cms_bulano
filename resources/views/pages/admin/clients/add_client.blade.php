@extends('layout.master')

@section('title')
    Add Client
@endsection

@section('content')


<div class="content-header">
  <div class="container-fluid">
  <div class="row mb-2">
<div class="col-sm-6">
<h1>ADD Client</h1>
</div>
    <div class="col-md-10 offset-md-1 bg-info mt-3 pt-3">
      <div class="card-body">
     
      <a  class="btn btn-success" id="corImage" href="{{asset('public/files/'.$requestee->cor)}}" data-lightbox="$requestee->cor">View COR</a>
  
      <div class="row ">

          <form action="{{route('insertClient', $requestee->id)}}" class="row"  id="addClientForm" name="addClientForm">

            <div class="col-9 col-sm-4 ms-3">
              <h5 class="addClient_header_text text-white mt-3" style="float: left;">PERSONAL INFORMATION</h5>        
            </div>
            <input type="hidden" name="client_id" id="client_id">
            <div class="col-md-4 ms-auto form-group mt-5 pb-2">
              <label class="form-label"><b>OCN</b></label>
              <input type="text" class="form-control" value="" name="ocn" style="width: 80%">
            </div>

            <div class="row ms-5">
              <div class="col">
                <label class="form-label"><b>Name</b></label>
                <input type="text" class="form-control" value="{{$requestee->name}}" name="client_name">
              </div>
              <div class="col">
                <div class="form-group">
                  <label class="form-label"><b>Email</b></label>
                  <input type="text" class="form-control" value="{{$requestee->email}}" name="email">
                </div>
              </div>
            </div>

            <div class="row ms-5">
              <div class="col">
                <div class="form-group">
                  <label class="form-label"><b>TIN</b></label>
                  <input type="text" class="form-control" value="" name="tin">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label class="form-label"><b>Contact No.</b></label>
                  <input type="text" class="form-control" value="" name="client_contact">
                </div>
              </div>
            </div>

            <div class="col-9 col-sm-4 ms-3">
              <h5 class="addClient_header_text text-white mt-3" style="float: left;">BUSINESS INFORMATION</h5>
            </div>

            <div class="row ms-5 mt-3">
              <div class="col">
                <div class="form-group">
                  <label class="form-label"><b>Registration Date</b></label>
                  <input type="date" class="form-control" name="reg_date">
                </div>
              </div> 
              <div class="col">
                <div class="form-group ms-3">
                  <label class="form-label"><b>Trade Name</b></label>
                  <input type="text" class="form-control" name="trade_name">
                </div>
              </div><br><br>
            </div>

            <div class="row ms-5">
              <div class="col">
                <div class="form-group">
                  <label class="form-label"><b>Mode of filing</b></label>
                  <select name="mode" class="form-control">
                    <option value="">--Select Mode of Filing--</option>
                    @foreach($modes as $mode)
                      <option value="{{$mode->id}}">{{$mode->mode_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label class="form-label"><b>Associate</b></label>
                  <select name="assoc" class="form-control">
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
              </div>
            </div>

            @livewireStyles
              <div class="row mt-2">
                <div class="col " >
                  <div class="form-group" >
                    <div name="corporate">
                      <b><livewire:dropdown /></b>
                    </div>
                  </div> 
                </div> 
              </div>
            @livewireScripts   
            <div class="col-9 col-sm-4 ms-3">
              <h5 class="addClient_header_text text-white mt-3" style="float: left;">ADDRESS</h5>
            </div>    

            <div class="row ms-5">
              <div class="col-md-6 mt-4">
                <label class="form-label"><b>Unit/House No.</b></label>
                <input type="text" value="" class="form-control" id="inputEmail4" name="unit_house_no">
              </div>
              <div class="col-md-6 mt-4">
                <label class="form-label"><b>Street</b></label>
                <input type="text" value="" class="form-control" id="inputPassword4" name="street">
              </div>
            </div>

            <div class="row ms-5">
              <div class="col-md-6">
                <label class="form-label"><b>City/Municipality</b></label>
                <input type="text" class="form-control" id="inputAddress" name="client_city">
              </div>
              <div class="col-md-6">
                <label class="form-label"><b>Province</b></label>
                <input type="text" class="form-control" id="inputAddress2" name="client_province">
              </div>
            </div>

            <div class="row ms-5">
              <div class="col-md-6">
                <label class="form-label"><b>Postal Code</b></label>
                <input type="text" class="form-control" id="inputCity" name="client_postal"><br>
              </div>
            <div>
               
            <div class="col-9 col-sm-4 ms-3 mb-3">
              <h5 class="addClient_header_text text-white mt-3" style="float: left;"><b>Tax Types</b></h5>
            </div>

            <ul class="checkbox-grid pt-5">
              @foreach($taxForms as $taxForm)
                <li style="display: block; float: left; width: 25%;">
                  <input type="checkbox"  value="{{$taxForm->id}}" name="taxesChecked[]"  >
                  <span class="ml-3 text-sm">{{ $taxForm->tax_form_no }}</span>
                </li>
              @endforeach
            </ul>
              <div class="row pt-3" style="float: left;">
                <div class="col">
                  <label class="form-label"><b>Username</b></label>
                  <input type="text" class="form-control" value="" name="username">
                </div>
                <div class="col">
                  <input type="hidden" class="form-control" value="" name="password">    
                </div>      
              </div>
          
            <div class="AddClient_btn mt-5">
              <button class="btn btn-primary" type="submit" name="saveBtn" id="saveBtn" value="createClient">Submit</button>
              <button class="btn btn-primary" id="close_ClientProfile" type="button">Cancel</button>
            </div>

          </form>

        </div>

      </div>
    </div>
  </div>
</div>


@endsection