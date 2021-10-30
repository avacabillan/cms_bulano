<div class="container">
    <div class="col-md-8 offset-md-2">
      <!-- <h4>Edit Associate</h4> -->

      <form action="{{route('associate.update')}}" id="editAssocForm" name="editAssocForm" >
      @csrf
        <div class="form-group">
          <input type="hidden" name="assoc_id" id="assoc_id">

          
          Name<input type="text" value="{{$associate->name}}" class="form-control" name="assoc_name" required>
          Email<input type="text" value="{{$associate->email}}" class="form-control" name="assoc_email" required>
          Contact Number<input type="number" value="{{$associate->contact_number}}" class="form-control" name="assoc_contact" required>
          Birthdate<input type="date" value="{{$associate->birth_date}}" class="form-control" name="assoc_birthdate" required>
          Address<input type="text" value="{{$associate->address}}" class="form-control" name="assoc_address" required>
          SSS Number<input type="number" value="{{$associate->sss_no}}" class="form-control" name="assoc_sss" required>
          Department<input type="text" value="{{$associate->department_id}}" class="form-control" name="department" required>
          Position<input type="text" value="{{$associate->position_id}}" class="form-control" name="position" required>

          <input type="submit" value="Update" class=" mt-2 btn btn-success">
        </div>
        
      </form>
    </div>
  </div>