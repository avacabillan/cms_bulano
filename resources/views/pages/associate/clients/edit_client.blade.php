@livewireStyles

  <div class="col-md-10 offset-md-1 bg-light mt-3 pt-3 mb-3">
    <div class="card-body" >
      <div class="form-goup" >
        <div class="row ">
          <div class="col-9 col-sm-4 ms-3">
            
            
            
            <h5 class="addClient_header_text mt-3" style="float: left;">PERSONAL INFORMATION</h5>        
          </div>
          <form  method="post" action="{{route('updateClient', $client->id) }}" >
            @csrf
            @method('PUT')
            
            

        
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="form-label ms-3" style="float: left;"><b>Name</b></label>
                  <input type="text" class="form-control" value="{{$client->client_name}}" name="client_name">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label class="form-label" style="float: left;"><b>Email</b></label>
                  <input type="text" class="form-control" value="{{$client->email}}" name="email">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label class="form-label" style="float: left;"><b>TIN</b></label>
                  <input type="text" class="form-control" value="{{$tins->first()->tin_no}}" name="tin">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label class="form-label"><b>Contact No.</b></label>
                  <input type="text" class="form-control" value="{{$client->contact_number}}" name="client_contact">
                </div>
              </div>
              
            </div>
            <!-- <div class="col-9 col-sm-4 ms-3">
              <h5 class="addClient_header_text mt-3" style="float: left;">BUSINESS INFORMATION</h5>
              </div>
              <div class="row mt-3">
                <div class="col">
                  <div class="form-group">
                    <label class="form-label"><b>Registration Date</b></label>
                    <input type="date" class="form-control"  value="{{$businesses->first()->registration_date}}" name="reg_date">
                  </div>
                </div>
                
                <div class="col">
                  <div class="form-group ms-3">
                    <label class="form-label" style="float: left;"><b>Trade Name</b></label>
                    <input type="text" class="form-control" value="{{$businesses->first()->trade_name}}" name="trade_name">
                  </div>
                </div><br><br>
              <div class="col">
                <div class="form-group">
                    <label class="form-label"><b>Mode of filing</b></label>
                    <select value="{{$client->mode_of_payment_id}}" id="mode" name="mode" class="form-control">
                        @foreach($modes as $mode)
                          <option value="{{$mode->id}}">{{$mode->mode_name}}</option>
                        @endforeach
                    </select>
                </div>
              
            </div><br>
            </div><br>
            <div class="col-9 col-sm-4 ms-3">
            <h5 class="addClient_header_text mt-3 br" style="float: left;">ADDRESS</h5>
            </div>    
            <div class="row">
              <div class="col-md-6 mt-4" style="float: left;">
                <label class="form-label" style="float: left;"><b>Unit/House No.</b></label>
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
            </div> -->
          
              
            
              <div class="AddClient_btn mt-5">
                <button class="btn btn-primary" type="submit" >Update</button>
                <button class="btn btn-primary" id="close_ClientProfile" type="button" data-dismiss="modal" aria-label="Close">Cancel</button>
              
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    
 @livewireScripts

