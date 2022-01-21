<div class="container">
    <div class="col-md-8 offset-md-2">
      <!-- <h4>Edit Associate</h4> -->
    
      <form action="{{route('update', $associate->id)}}" id="editAssocForm" name="editAssocForm" method="post">
      @csrf
      @method('PUT')
        <div class="form-group">
          <input type="hidden" value="{{$associate->id}}" >

          
          Name<input type="text" value="{{$associate->name}}" class="form-control" style="width: 35rem;" name="assoc_name" >
          Email<input type="text" value="{{$associate->email}}" class="form-control" style="width: 35rem;" name="assoc_email" >
          Contact Number<input type="number" value="{{$associate->contact_number}}" class="form-control" style="width: 35rem;" name="assoc_contact" >
          Birthdate<input type="date" value="{{$associate->birth_date}}" class="form-control" style="width: 35rem;" name="assoc_birthdate" >
          Address<input type="text" value="{{$associate->address}}" class="form-control"  style="width: 35rem;"name="assoc_address">
          SSS Number<input type="text" value="{{$associate->sss_no}}" class="form-control" style="width: 35rem;" name="assoc_sss" >
          Department<input type="text" value="{{$associate->department->department_name}}" style="width: 35rem;" class="form-control" name="department" >

          Position<input type="text" value="{{$associate->position->position_name}}" class="form-control" style="width: 35rem;" name="position" >
          
          <input type="submit" value="Update" class=" mt-2 btn btn-success">
        </div>
        
      </form>
    </div>
  </div>