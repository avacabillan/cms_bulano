<div class="container">
    <div class="col-md-8 offset-md-2">
      <!-- <h4>Edit Associate</h4> -->

      <form action="{{route('update')}}" id="editAssocForm" name="editAssocForm" >
      @csrf
        <div class="form-group">
          <input type="hidden" name="assoc_id" id="assoc_id">

          
          Name<input type="text" value="{{$associate->name}}" class="form-control" name="assoc_name" required>
          Email<input type="text" value="{{$associate->email}}" class="form-control" name="assoc_email" required>
          Contact Number<input type="number" value="{{$associate->contact_number}}" class="form-control" name="assoc_contact" required>
          Birthdate<input type="date" value="{{$associate->birth_date}}" class="form-control" name="assoc_birthdate" required>
          Address<input type="text" value="{{$associate->address}}" class="form-control" name="assoc_address" required>
          SSS Number<input type="number" value="{{$associate->sss_no}}" class="form-control" name="assoc_sss" required>
          <label class="form-label"><b>Department</b></label>
                  <select name="department" class="form-control">
                  <option value="">--Select Department--</option>
                      @foreach($department as $dept)
                        <option value="{{$dept->id}}">{{$dept->department_name}}</option>
                      @endforeach
                  </select>
       
                  <label class="form-label"><b>Position</b></label>
                  <select name="position" class="form-control">
                  <option value="">--Select Position--</option>
                      @foreach($position as $postn)
                        <option value="{{$postn->id}}">{{$postn->position_name}}</option>
                      @endforeach
                  </select>
          <input type="submit" value="Update" class=" mt-2 btn btn-success">
        </div>
        
      </form>
    </div>
  </div>