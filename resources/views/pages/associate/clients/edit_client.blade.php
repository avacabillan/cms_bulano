@livewireStyles

<div class="col-md-10 offset-md-1 bg-light mt-3 pt-3 mb-3">
  <div class="card-body" >
    <div class="form-goup" >
      <div class="row ">
          <div class="col-9 col-sm-4 ms-3">
            <h5 class="addClient_header_text mt-3" style="float: left;">PERSONAL INFORMATION</h5>        
          </div>
          <form  method="post" action="{{route('updateClient', $client->id)}}" >
         
            @csrf
            @method('PUT')

            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label class="form-label ms-3" style="float: left;"><b>Name</b></label>
                  <input type="text" class="form-control" value="{{$client->company_name}}" name="client_name">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label class="form-label" style="float: left;"><b>Email</b></label>
                  <input type="text" class="form-control" value="{{$client->email_address}}" name="email">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label class="form-label" style="float: left;"><b>TIN</b></label>
                  @foreach ($client->tin as $tin)
                  <input type="text" class="form-control" value="{{$tin->tin_no}}" name="tin">
                  @endforeach
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label class="form-label"><b>Contact No.</b></label>
                  <input type="text" class="form-control" value="{{$client->contact_number}}" name="client_contact">
                </div>
              </div>
              
             </div>
            <div class="col-9 col-sm-4 ms-3">
             <h5 class="addClient_header_text mt-3" style="float: left;">BUSINESS INFORMATION</h5>
              <div class="row mt-3">
                <div class="col">
                  <div class="form-group">
                    <label class="form-label"><b>Registration Date</b></label>
                    @foreach ($client->business as $busi)
                    <input type="date" class="form-control"  value="{{$busi->registration_date}}" name="reg_date">
                    @endforeach
                  </div>
                </div>
                
                <div class="col">
                  <div class="form-group ms-3">
                    <label class="form-label" style="float: left;"><b>Trade Name</b></label>
                    @foreach ($client->business as $busi)
                    <input type="text" class="form-control" value="{{$busi->trade_name}}" name="trade_name">
                    @endforeach
                  </div>
                </div><br><br>
            
              </div><br>
            </div><br>
            <div class="col-9 col-sm-4 ms-3">
              <h5 class="addClient_header_text mt-3 br" style="float: left;">ADDRESS</h5>
            </div> 
            @foreach ($client->registeredAddress as $regadd)   
              <div class="row">
                <div class="col-md-6 mt-4" style="float: left;">
                  <label class="form-label" style="float: left;"><b>Unit/House No.</b></label>
                  <input type="text" value="{{$regadd->unit_house_no}}" class="form-control" id="inputEmail4" name="unit_house_no">
                </div>
                <div class="col-md-6 mt-4">
                  <label class="form-label" style="float: left;"><b>Street</b></label>
                  <input type="text" value=" {{$regadd->street}}" class="form-control"  name="street">
                </div>
                <div class="col-12">
                  <label class="form-label" style="float: left;"><b>City/Municipality</b></label>
                  <input type="text" class="form-control" value=" {{$regadd->street}}"  name="client_city">
                </div>
                <div class="col-md-6">
                  <label class="form-label" style="float: left;"><b>Province</b></label>
                  <input type="text" class="form-control"value="{{$regadd->province_name}}" name="client_province">
                </div>
                <div class="col-md-6">
                  <label class="form-label" style="float: left;"><b>Postal Code</b></label>
                  <input type="text" class="form-control" value="{{$regadd->postal_no}}"  name="client_postal"><br>
                </div>
              </div>  
              @endforeach

                <button type="submit" class="btn btn-primary" id="btnUpdateSubmit">Update</button>
        </form>
      </div>
    </div>
  </div>
</div>

    
 @livewireScripts

