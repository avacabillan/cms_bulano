@livewireStyles

  <div class="col-md-10 offset-md-1 bg-light mt-3 pt-3 mb-3">
    <div class="card-body" >
      <div class="form-goup" >
        <div class="row ">
          <div class="col-9 col-sm-4 ms-3">
<<<<<<< HEAD
            <form action="{{route('updateClient')}}" method="POST" class="updateClientForm"  id="updateClientForm" name="updateClientForm">
            {{ csrf_field() }}
            {{ method_field('PUT') }} 
=======
            <form  method="post" action="{{route('updateClient', $client->id) }}" class="updateClientForm"  id="updateClientForm" name="updateClientForm">
            <input type="hidden" name="_method" value="PUT">
            @csrf
            @method('POST')
>>>>>>> trial-v2
            <h5 class="addClient_header_text mt-3" style="float: left;">PERSONAL INFORMATION</h5>        
          </div>
          <input type="hidden" name="client_id" id="client_id">

<<<<<<< HEAD
          <div class="col-md-3 ml-md-auto form-group mt-5 pb-2">
            <label class="form-label" style="float: left;"><b>OCN</b></label>
            <input type="text" class="form-control" value="ocn" name="ocn" id="ocn">
          </div><br>
=======
       
>>>>>>> trial-v2
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-label ms-3" style="float: left;"><b>Name</b></label>
<<<<<<< HEAD
                <input type="text" class="form-control" value="client_name" id="client_name" name="client_name">
=======
                <input type="text" class="form-control" value="{{$client->client_name}}" name="client_name">
>>>>>>> trial-v2
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label class="form-label" style="float: left;"><b>Email</b></label>
<<<<<<< HEAD
                <input type="text" class="form-control" value="email" id="email" name="email">
=======
                <input type="text" class="form-control" value="{{$client->email}}" name="email">
>>>>>>> trial-v2
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label class="form-label" style="float: left;"><b>TIN</b></label>
<<<<<<< HEAD
                <input type="text" class="form-control"  value="tin"  id="tin" name="tin">
=======
                <input type="text" class="form-control" value="{{$tins->first()->tin_no}}" name="tin">
>>>>>>> trial-v2
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label class="form-label"><b>Contact No.</b></label>
<<<<<<< HEAD
                <input type="text" class="form-control" value="client_contact" id="client_contact"  name="client_contact">
=======
                <input type="text" class="form-control" value="{{$client->contact_number}}" name="client_contact">
>>>>>>> trial-v2
              </div>
            </div>
            
          </div>
<<<<<<< HEAD
          <div class="col-9 col-sm-4 ms-3">
=======
          <!-- <div class="col-9 col-sm-4 ms-3">
>>>>>>> trial-v2
            <h5 class="addClient_header_text mt-3" style="float: left;">BUSINESS INFORMATION</h5>
            </div>
            <div class="row mt-3">
              <div class="col">
                <div class="form-group">
                  <label class="form-label"><b>Registration Date</b></label>
<<<<<<< HEAD
                  <input type="date" class="form-control" value="reg_date" id="reg_date" name="reg_date">
=======
                  <input type="date" class="form-control"  value="{{$businesses->first()->registration_date}}" name="reg_date">
>>>>>>> trial-v2
                </div>
              </div>
              
              <div class="col">
                <div class="form-group ms-3">
                  <label class="form-label" style="float: left;"><b>Trade Name</b></label>
<<<<<<< HEAD
                  <input type="text" class="form-control" value="trade_name" id="trade_name" name="trade_name">
                </div>
              </div><br><br>
              <div class="col">
              <div class="form-group">
                  <label class="form-label"><b>Mode of filing</b></label>
                  <select value="mode" id="mode" name="mode" class="form-control">
                  <option value="">--Select Mode of Filing--</option>
=======
                  <input type="text" class="form-control" value="{{$businesses->first()->trade_name}}" name="trade_name">
                </div>
              </div><br><br>
            <div class="col">
              <div class="form-group">
                  <label class="form-label"><b>Mode of filing</b></label>
                  <select value="{{$client->mode_of_payment_id}}" id="mode" name="mode" class="form-control">
>>>>>>> trial-v2
                      @foreach($modes as $mode)
                        <option value="{{$mode->id}}">{{$mode->mode_name}}</option>
                      @endforeach
                  </select>
              </div>
<<<<<<< HEAD
          </div>
           
          <div class="row mt-2" style="float: left;" >
            <div class="col " >
              <div class="form-group" >
                <div value="corporate" id="corporate" name="corporate">
                  <b><livewire:dropdown /></b>
                </div>
              </div> 
            </div> 
          </div><br>
          </div><br>
              
          
          <div class="col-9 col-sm-4 ms-3">
          <h5 class="addClient_header_text mt-3" style="float: left;">ADDRESS</h5>
=======
            
          </div><br>
          </div><br>
          <div class="col-9 col-sm-4 ms-3">
          <h5 class="addClient_header_text mt-3 br" style="float: left;">ADDRESS</h5>
>>>>>>> trial-v2
          </div>    
          <div class="row">
            <div class="col-md-6 mt-4" style="float: left;">
              <label class="form-label" style="float: left;"><b>Unit/House No.</b></label>
<<<<<<< HEAD
              <input type="text"  class="form-control" value="unit_house_no" id="unit_house_no" name="unit_house_no">
            </div>
            <div class="col-md-6 mt-4">
              <label class="form-label" style="float: left;"><b>Street</b></label>
              <input type="text"  class="form-control" value="street" id="street" name="street">
            </div>
            <div class="col-12">
              <label class="form-label" style="float: left;"><b>City/Municipality</b></label>
              <input type="text" class="form-control" value="client_city" id="client_city" name="client_city">
            </div>
            <div class="col-md-6">
              <label class="form-label" style="float: left;"><b>Province</b></label>
              <input type="text" class="form-control" value="client_province" id="client_province" name="client_province">
            </div>
            <div class="col-md-6">
              <label class="form-label" style="float: left;"><b>Postal Code</b></label>
              <input type="text" class="form-control" value="client_postal" id="client_postal" name="client_postal"><br>
            </div>
          </div>
          <h4 class="form-label text-dark">Tax Types</h4>
          <ul class="checkbox-grid">
          @foreach($taxForms as $taxForm)
              <li style="display: block; float: left; width: 25%;">
                <input type="checkbox" id="taxesChecked"  value="{{$taxForm->id}}" name="taxesChecked[]"  >
                <span class="ml-3 text-sm">{{ $taxForm->tax_form_no }}</span>
              </li>
          @endforeach


          </ul>

            
          
          <div class="AddClient_btn mt-5">
            <button class="btn btn-primary" type="submit" name="updateBtn" id="updateBtn" value="updateClient">Update</button>
            <button class="btn btn-primary" id="close_ClientProfile" type="button">Cancel</button>
=======
              <input type="text" value="{{$registered_address->first()->unit_house_no}}" class="form-control" id="inputEmail4" name="unit_house_no">
            </div>
            <div class="col-md-6 mt-4">
              <label class="form-label" style="float: left;"><b>Street</b></label>
              <input type="text" value=" {{$registered_address->first()->street}}" class="form-control" id="inputPassword4" name="street">
            </div>
            <div class="col-12">
              <label class="form-label" style="float: left;"><b>City/Municipality</b></label>
              <input type="text" class="form-control" value=" {{$registered_address->first()->city_name}}" id="inputAddress" name="client_city">
            </div>
            <div class="col-md-6">
              <label class="form-label" style="float: left;"><b>Province</b></label>
              <input type="text" class="form-control"value="{{$registered_address->first()->province_name}}" id="inputAddress2" name="client_province">
            </div>
            <div class="col-md-6">
              <label class="form-label" style="float: left;"><b>Postal Code</b></label>
              <input type="text" class="form-control" value="{{$registered_address->first()->postal_no}}" id="inputCity" name="client_postal"><br>
            </div>
          </div>
         
             -->
          
          <div class="AddClient_btn mt-5">
            <button class="btn btn-primary" type="submit" >Update</button>
            <button class="btn btn-primary" id="close_ClientProfile" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
          
>>>>>>> trial-v2
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<<<<<<< HEAD

    
 @livewireScripts





=======

    
 @livewireScripts

>>>>>>> trial-v2
