

<nav class="nav-main">
  <ul>
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
      <i class="fas fa-bars"></i>
    </a>
    <h2 class="nav_title  mt-2">Bulano Accounting & Auditing Firm</h2>
    
    <i class="fa fa-bell pt-4" type="button" id="myBtn" data-toggle="modal" data-target="#form">
      <span class="badge_number"></span>
    </i> 

    @include('pages.admin.messages.inbox')
  </ul>
</nav> 

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