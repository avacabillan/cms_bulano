@extends('layout.master')

@section('title')
    Admin Dashboard
@stop
 
@section('content')
@include('shared.navbar')
@include('shared.sidebar')

<div class="siderbar_main toggled">
  <div class="page-content">
    <!----- ROW form-group col-md-12 ----->
    <div class="row">

        <div class="form-group col-md-12">
          <div class="alert alert-success ms-3 me-3" id="admin_dash_heading" role="alert">
              <h4 class="alert-heading" id="heading_text">Welcome to Dashboard</h4>
              <p id="heading_text">Hello! I am Irish.</p>
            </div>
          </div>
          <div class="admin_dashboard_container">
            <div class="admin_dashboard_card ms-3 bg-light">
              <div class="admin_user_info">
                <small class="associate_name">Bianca Cortez</small>
              </div>
              <div class="admin_total">
                <h2 class="admin_total_counts">58</h2>
                <small class="admin_total_text">CLIENTS</small>
              </div>
            </div>
            <div class="admin_dashboard_card ms-2 bg-light">
              <div class="admin_user_info">
                <small class="associate_name">Jean Jati</small>
              </div>
              <div class="admin_total">
                <h2 class="admin_total_counts">38</h2>
                <small class="admin_total_text">CLIENTS</small>
              </div>
            </div>
            <div class="admin_dashboard_card me-3 bg-light">
              <div class="admin_user_info">
                <small class="associate_name">Ava Cabillan</small>
              </div>
              <div class="admin_total">
                <h2 class="admin_total_counts">28</h2>
                <small class="admin_total_text">CLIENTS</small>
              </div>
            </div>
          </div>
        </div>
        <!----- END OF ROW form-group col-md-12 ----->
        <div class="grid">
          <div class="main bg-light">
            <h5>Associates Perforamance Quarterly</h5>
            <hr>
            <div class="associate_name">Bianca Cortez</div>
              <div class="assocs_field">
                <div class="assoc_percent_1" id="percentage">90%</div>
              </div>

            <div class="aassociate_name">Jean Jati</div>
              <div class="assocs_field">
                <div class="assoc_percent_2" id="percentage">80%</div>
              </div>

            <div class="associate_name">Ava Cabillan</div>
              <div class="assocs_field">
                <div class="assoc_percent_3" id="percentage">65%</div>
              </div>

            <div class="associate_name">Mitz Castillo</div>
              <div class="assocs_field">
                <div class="assoc_percent_4" id="percentage">60%</div>
              </div>
          </div>
          <section class="side bg-light">  
          <h5 class="chartTitle">Client's Tax Pending </h5>
            <div class="pie-chart">
              <caption>
                <div class="admin_piechart"><span style="color:#05263b"></span>VAT</div>
                <div class="admin_piechart"><span style="color:#0f6da8"></span>ITR</div>
                <div class="admin_piechart"><span style="color:#5fb9f1"></span>WH TAX</div>
                <div class="admin_piechart"><span style="color:#76b7b2"></span>Registration Fee</div>
              </caption>
            </div>
          </section>
        </div>
    </div>
    <!----- END OF ROW ----->
        @include('pages.admin.messages.compose')
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

