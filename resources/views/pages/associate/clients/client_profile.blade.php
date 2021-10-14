<div class="row m-l-0 m-r-0" id="prof_border">
  <div class="col-sm-4 user-profile">
    <div class="card-block text-center text-white">
      <div class="m-b-25"><img src="images/bulano.png" class="img-radius" alt="User-Profile-Image"></div><br>
      
<<<<<<< HEAD
        <h4 class="f-w-600">Client Name</h4>
        <p>@clientname</p>         
=======
        <h4 class="f-w-600">{{$client->client_name}}</h4>
        <p id="name" value="name">{{$client->email}}</p>         
>>>>>>> trial-v2
      </div>
    </div>

    <div class="col-sm-8">
      <div class="card-block"> 

        <!-- <i class="fas fa-edit" id="assoc_edit_profile"></i> -->
        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Personal Information</h6>
        <div class="row">
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Cell Phone No.</p>
            <h6 class="text-muted ms-2 f-w-400">{{$client->contact_number}}</h6>
          </div>
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">TIN</p>
            <h6 class="text-muted ms-2 f-w-400">{{$tins->first()->tin_no}}</h6>
          </div>
         
          
         
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Mode of Filing</p>
            <h6 class="text-muted ms-2 f-w-400">{{$client->modeofpayment->mode_name}}</h6>
          </div>
         
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Registration Date</p>
            <h6 class="text-muted ms-2 f-w-400">{{$businesses->first()->registration_date}} </h6>
          </div>

         
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Trade Name</p>
            <h6 class="text-muted ms-2 f-w-400">{{$businesses->first()->trade_name}}</h6>
          </div>
          
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Registered Address</p>
            <h6 class="text-muted ms-2 f-w-400">
              {{$registered_address->first()->unit_house_no}} {{$registered_address->first()->street}}
              {{$registered_address->first()->city_name}} {{$registered_address->first()->province_name}}
              {{$registered_address->first()->postal_no}}</h6>
          </div>
        <br> 
        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add_tax" style="float: right;">
          <i class="fas fa-plus-circle"></i> New Folder
        </button>
        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Type of Taxes</h6>
    
        <div class="row">
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600"><a href="" class="text-dark"><i class="fa fa-folder me-2 " aria-hidden="true"></i>VAT</a></p>
            <h6 class="text-muted f-w-400"></h6>
          </div>                                              
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600"><a href="" class="text-dark"><i class="fa fa-folder me-2" aria-hidden="true"></i>ITR</a></p>
            <h6 class="text-muted f-w-400"></h6>
          </div>
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600"><a href="" class="text-dark"><i class="fa fa-folder me-2" aria-hidden="true">Registration Fee</i></a></p>
            <h6 class="text-muted f-w-400"></h6>
          </div>
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600"></p>
            <h6 class="text-muted f-w-400"></h6>
          </div>  
        </div>
<<<<<<< HEAD

=======
>>>>>>> trial-v2
      
      </div> 
    </div>

  </div>
</div>
 
