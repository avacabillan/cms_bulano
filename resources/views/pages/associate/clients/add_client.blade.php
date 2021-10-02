@livewireStyles
<div class="addClient_form">
  <div class="col-md-8 offset-md-2 bg-light mt-3 pt-3 mb-3">
    <div class="card-body">
      <div class="form-goup">
        <div class="row ">
          <div class="col-9 col-sm-4 ms-3">
            <form action="{{route('insertClient')}}" class="row">
            @csrf   
            <h4 class="addClient_header_text mt-3">PERSONAL INFORMATION</h4>        
          </div>

          <div class="col-md-3 ml-md-auto form-group mt-5 pb-2">
            <label class="form-label" style="float: left;"><b>OCN</b></label>
            <input type="text" class="form-control" value="" name="ocn">
          </div><br>
          <div class="row">
            <div class="col">
              <div class="form-group">
                <label class="form-label ms-3" style="float: left;"><b>Name</b></label>
                <input type="text" class="form-control" value="" name="client_name">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label class="form-label" style="float: left;"><b>Email</b></label>
                <input type="text" class="form-control" value="" name="email">
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label class="form-label" style="float: left;"><b>TIN</b></label>
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
          <h4 class="addClient_header_text mt-3" style="float: left;">BUSINESS INFORMATION</h4>
          </div>
          <div class="row mt-3">
            <div class="col">
              <div class="form-group">
                <label class="form-label"><b>Registration Date</b></label>
                <input type="date" class="form-control" name="reg_date">
              </div>
            </div>
            
            <div class="col">
              <div class="form-group ms-3">
                <label class="form-label" style="float: left;"><b>Trade Name</b></label>
                <input type="text" class="form-control" name="trade_name">
              </div>
            </div><br><br>
            <div class="col">
            <div class="form-group">
                <label class="form-label"><b>Mode of filing</b></label>
                <select name="mode" class="form-control">
                    @foreach($modes as $mode)
                      <option value="{{$mode->id}}">{{$mode->mode_name}}</option>
                    @endforeach
                </select>
              </div>

          </div><br>

          <div class="row mt-2" style="float: left;" >
            <div class="col " >
              <div class="form-group" >
                <div name="corporate">
                  <b><livewire:dropdown /></b>
                </div>
              </div> 
            </div> 
          </div>
              
          
          <div class="col-9 col-sm-4 ms-3">
          <h4 class="addClient_header_text mt-3" style="float: left;">ADDRESS</h4>
          </div>    
          <div class="row mt-3">
            <div class="col-md-6" style="float: left;">
              <label class="form-label" style="float: left;"><b>Unit/House No.</b></label>
              <input type="text" value="" class="form-control" id="inputEmail4" name="unit_house_no">
            </div>
            <div class="col-md-6 mt-4">
              <label class="form-label" style="float: left;"><b>Street</b></label>
              <input type="text" value="" class="form-control" id="inputPassword4" name="street">
            </div>
            <div class="col-12">
              <label class="form-label" style="float: left;"><b>City/Municipality</b></label>
              <input type="text" class="form-control" id="inputAddress" name="client_city">
            </div>
            <div class="col-md-6">
              <label class="form-label" style="float: left;"><b>Province</b></label>
              <input type="text" class="form-control" id="inputAddress2" name="client_province">
            </div>
            <div class="col-md-6">
              <label class="form-label" style="float: left;"><b>Postal Code</b></label>
              <input type="text" class="form-control" id="inputCity" name="client_postal"><br>
            </div>
          </div>
          <h4 class="form-label text-dark">Tax Types</h4>
          <ul class="checkbox-grid">
          @foreach($taxForms as $taxForm)
              <li style="display: block; float: left; width: 25%;">
                <input type="checkbox"  value="{{$taxForm->id}}" name="taxesChecked[]"  >
                <span class="ml-3 text-sm">{{ $taxForm->tax_form_no }}</span>
              </li>
          @endforeach


          </ul>

            
          
          <div class="AddClient_btn mt-5">
            <button class="btn btn-primary" type="submit" value="add">Submit</button>
            <button class="btn btn-primary" id="close_ClientProfile" type="button">Cancel</button>
            <!-- <button  class="btn btn-primary pt-3 mt-5 mb-3 pb-2" id="close_ClientProfile" style="float:right;">Cancel</button> -->
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

    
 @livewireScripts

<!-- 
<div class="siderbar_main toggled">
<main class="page-content">
<table class="table data">
  <thead>
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Number</th>
      <th>Actions <button class="add">Add new</button></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td class="data">John Doe</td>
      <td class="data">johndoe@john.com</td>
      <td class="data">666-666-666</td>
      <td>
        <button class="save">Save</button>
        <button class="edit">Edit</button>
        <button class="delete">Delete</button>
      </td>
    </tr>
    <tr>
      <td class="data">John Doe</td>
      <td class="data">johndoe@john.com</td>
      <td class="data">666-666-666</td>
      <td>
        <button class="save">Save</button>
        <button class="edit">Edit</button>
        <button class="delete">Delete</button>
      </td>
    </tr>
  </tbody>
</table>
</div>
</div> -->




