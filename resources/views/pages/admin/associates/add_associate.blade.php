<div class="col-md-10 offset-md-1 bg-light mt-3 pt-3 mb-3">
    <div class="card-body" >
      <div class="form-goup" >
        <div class="row ">
          <div class="col-9 col-sm-4 ms-3">
            <form action="{{route('add_associate')}}" class="row"  id="addAssocForm" name="addAssocForm">
              
           
            <h5 class="addAssoc_header_text mt-3" style="float: left;">PERSONAL INFORMATION</h5><br>        
          </div> 
          <input type="hidden" name="assoc_id" id="assoc_id">

          <label class="form-label">Name</label> 
                <input type="text" class="form-control" value=""   name="assoc_name"  >
                <label class="form-label">Email</label>
                <input type="text" class="form-control" value="" name="assoc_email">         
                <label class="form-label">Contact Number</label>
                <input type="text" class="form-control" value="" name="assoc_contact" > <br>
                <label class="form-label">SSS Number/Government ID no.</label>
                <input type="text" class="form-control" value="" name="assoc_sss"> <br>
                <label class="form-label">Birth Date</label>
                <input type="date" class="form-control" value="" name="assoc_birthdate"> <br>

                                   
            <h5 class="addAssoc_header_text mt-3" style="float: left;">ADDRESS</h5><br>     
                <div>
                    <label for="inputEmail4" class="form-label">Complete Address</label>
                    <input type="text" value="" class="form-control" id="inputEmail4" name="assoc_address">

 
            <h5 class="addAssoc_header_text mt-3" style="float: left;">JOB INFORMATION</h5><br><br> 
                <div class="form-group">
                  <label class="form-label"><b>Department</b></label>
                  <select name="department" class="form-control">
                  <option value="">--Select Department--</option>
                      @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->department_name}}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label class="form-label"><b>Position</b></label>
                  <select name="position" class="form-control">
                  <option value="">--Select Position--</option>
                      @foreach($positions as $position)
                        <option value="{{$position->id}}">{{$position->position_name}}</option>
                      @endforeach
                  </select>
              </div>                                              
                    
                    <button class="btn btn-success mt-4 me-2" type="submit" value="add" style="float: right">Submit</button>
                </form>
        </div>
      </div>
    </div>
  </div>