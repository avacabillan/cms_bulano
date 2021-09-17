@extends('layout.master')
@section('title')
  List of Associates
@stop

@section('content')
@include('shared.navbar')
@include('shared.sidebar')

<div class="siderbar_main toggled">

  <div class="page-content">

    <div class="assoc_list">
      <div class="d-grid gap-2 d-md-block me-5 mt-5 pt-5 mb-3" style="float: right;">
        <button class="btn btn-primary" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
        <button class="btn btn-danger" type="button"><i class="fas fa-minus-circle"></i> Delete</button>
      </div>

      <table class="table_guest">
        <thead>
          <tr>
            <th>
            <span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
            </th>
            <th>Name</th>
            <th>Email</th>
            <th>Contact Number</th>
            <th><center>Actions</center></th>      
          </tr>                                                                                                                        
        </thead>
        <tbody>
          <tr>
            <td>
            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
            </td>
            <td>Bianca Mae Cortez</td>
            <td>biancacortz123@gmail.com</td>
            <td>0932732648643</td>
            <td><center><i class="fas fa-eye"></i></center></td>
          </tr>
          <tr>
            <td>
            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox2" name="options[]" value="1">
								<label for="checkbox2"></label>
							</span>
            </td>
            <td>Jean Jati</td>
            <td>biancacortz123@gmail.com</td>
            <td>0932732648643</td>
            <td><center><i class="fas fa-eye"></i></center></td>
          </tr>
          <tr> 
            <td>
            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox2" name="options[]" value="1">
								<label for="checkbox2"></label>
							</span>
            </td>
            <td>Jean Jati</td>
            <td>biancacortz123@gmail.com</td>
            <td>0932732648643</td>
            <td><center><i class="fas fa-eye"></i></center></td>
          </tr>
          <tr>
            <td>
            <span class="custom-checkbox">
								<input type="checkbox" id="checkbox2" name="options[]" value="1">
								<label for="checkbox2"></label>
							</span>

            </td>
            <td>Jean Jati</td>
            <td>biancacortz123@gmail.com</td>
            <td>0932732648643</td>
            <td><center><i class="fas fa-eye"></i></center></td>
          </tr>
          
        </tbody> 
      </table>
      @include('pages.admin.associates.assoc_profile')
    </div>
    
  </div>

</div>

@stop 

@section('scripts')
    <script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

@stop 