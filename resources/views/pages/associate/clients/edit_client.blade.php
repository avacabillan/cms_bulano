@livewireStyles

  <div class="col-md-10 offset-md-1 bg-light mt-3 pt-3 mb-3">
    <div class="card-body" >
      <div class="form-goup" >
        <div class="row ">
          <div class="col-9 col-sm-4 ms-3">
            <form action="{{route('updateClient')}}" method="POST" class="updateClientForm"  id="updateClientForm" name="updateClientForm">
            {{ csrf_field() }}
            {{ method_field('PUT') }} 
            <h5 class="addClient_header_text mt-3" style="float: left;">PERSONAL INFORMATION</h5>        
          </div>
          <input type="hidden" name="client_id" id="client_id">

          <!-- <div class="col-md-3 ml-md-auto form-group mt-5 pb-2">
            <label class="form-label" style="float: left;"><b>OCN</b></label>
            <input type="text" class="form-control" value="ocn" name="ocn" id="ocn">
          </div><br> -->
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-label ms-3" style="float: left;"><b>Name</b></label>
                <input type="text" class="form-control" value="{{$client->client_name}}" id="client_name" name="client_name">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label class="form-label" style="float: left;"><b>Email</b></label>
                <input type="text" class="form-control"  value="{{$client->email}}" id="email" name="email">
              </div>
            </div>
            <!-- <div class="col">
              <div class="form-group">
                <label class="form-label" style="float: left;"><b>TIN</b></label>
                <input type="text" class="form-control"  value="tin"  id="tin" name="tin">
              </div>
            </div> -->
            <div class="col">
              <div class="form-group">
                <label class="form-label"><b>Contact No.</b></label>
                <input type="text" class="form-control"  value="{{$client->contact_number}}" id="client_contact"  name="client_contact">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                  <label class="form-label"><b>Mode of filing</b></label>
                  <select value="{{$client->mode_of_payment_id}}" id="mode" name="mode" class="form-control">
                      @foreach($modes as $mode)
                        <option value="{{$mode->id}}">{{$mode->mode_name}}</option>
                      @endforeach
                  </select>
              </div>
            
          </div>
         
            
          
          <div class="AddClient_btn mt-5">
            <button class="btn btn-primary" type="submit" name="updateBtn" id="updateBtn" value="updateClient">Update</button>
            <button class="btn btn-primary" id="close_ClientProfile" type="button">Cancel</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    
 @livewireScripts

