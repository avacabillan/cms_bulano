<div class="addAssoc_form">
  <div class="col-md-8 offset-md-2 bg-light mt-3 pt-3 mb-3">
    <div class="card-body">
      <div class="form-goup">
        <div class="row "> 
          <div class="col-9 col-sm-4 ms-3">
            <form action="{{route('insertassociate')}}" class="row">
            @csrf 
                        
            <h5 class="addAssoc_header_text mt-3" style="float: left;">PERSONAL INFORMATION</h5><br>
  
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
                    <label for="inputEmail4" class="form-label">Unit/House No. & Street</label>
                    <input type="text" value="" class="form-control" id="inputEmail4" name="assoc_address">
                </div>
                <div >
                    <label for="inputAddress" class="form-label">City/Municipality</label>
                    <input type="text" class="form-control" id="inputAddress" value="" name="assoc_city">
                </div>
                <div >
                    <label for="inputAddress2" class="form-label">Province</label>
                <input type="text" class="form-control" id="inputAddress2" value="" name="assoc_province">
                    </div>
                <div >
                    <label for="inputCity" class="form-label">Postal Code</label>
                    <input type="text" class="form-control" id="inputCity" value="" name="assoc_postal"><br>
                </div>
 
            <h5 class="addAssoc_header_text mt-3" style="float: left;">JOB INFORMATION</h5><br> 
                <label class="form-label">Department</label>
                    <div class="form-group">
                        <select name="assoc_department" class="form-control">
                        @foreach($departments as $department)
                        <option value="{{$department->id}}">{{$department->department_name}}</option>
                        @endforeach
                        </select><br>
                        <label class="form-label">Position</label>
                        <div class="form-group">
                        <select name="assoc_position" class="form-control">
                        @foreach($positions as $position)
                        <option value="{{$position->id}}">{{$position->position_name}}</option>
                        @endforeach
                        </select><br>
                    </div>
                <label class="form-label">Start Date</label>
                    <input type="date" class="form-control" value="" name="assoc_start_date" ><br>
                                    

            <h5 class="addAssoc_header_text mt-3" style="float: left;">EMERGENCY CONTACT PERSON</h5><br> 
                 <div class="col">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control me-1" value="" name="guardian_name"><br>
                    <label class="form-label">Complete Address</label> 
                    <input type="text" class="form-control" value="" name="guardian_address"><br>
                    <label class="form-label">Phone Number</label> 
                    <input type="text" class="form-control" value="" name="guardian_contact_no"><br>
                    <label class="form-label">Relationship</label> 
                    <input type="text" class="form-control" value="" name="guardian_relationship"><br>
                    
                    <button class="btn btn-success mt-4 me-2" type="submit" value="add" style="float: right">Submit</button>
                </form>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>  


