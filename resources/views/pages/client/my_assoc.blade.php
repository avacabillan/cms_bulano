@extends('layout.master')
@section('title')
    My associate
@endsection 
@section('content')


<section class="content">
  <div class="container-fluid">
    <div class="row">

      <div class="col-md-4">
        <div class="card">

          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src="../../dist/img/user4-128x128.jpg" alt="User profile picture">
            </div>
            <h3 class="profile-username text-center">{{$client->associates->name}}</h3>
            <p class="text-muted text-center">{{$client->associates->email}}</p>           
              <a href="#" class="btn btn-primary btn-block"><b>Message</b></a>
            </div>
            </div>
          </div>

          <div class="col-md-8">
            <div class="card">

              <div class="card-header p-2">
                <h5 class="header-title mt-2">Personal Information</h5>
              </div>

              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <div class="post">
                      <div class="card-body">

                        <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0 text-dark">Cell Phone No.</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            {{$client->associates->contact_number}}
                            </div>
                        </div>
                        <hr>   

                        <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0 text-dark">BirthDate</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            {{$client->associates->birth_date}}
                            </div>
                        </div>
                        <hr>   
                        <div class="row">
                            <div class="col-sm-3">
                              <h6 class="mb-0 text-dark">Address</h6>
                            </div>
                            <div class="col-sm-9 text-secondary">
                            {{$client->associates->address}}
                            </div>
                        </div>
                        <hr>   

                      </div>
                    </div>
                  </div>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div>

    </div>
  </div>
</section>
         

<!-- <div class="d-flex p-4 " style="margin-left: 5rem;" id="assocprofile" >
  <div class="col-sm-4 user-profile  pt-2"> 
    
    
    <div class="card-block text-center text-white">
      <div class="text-center">
        <img src="/images/Logo.png" class="user_profile" >
      </div>
      <br> 
        <h2 class="f-w-600">{{$client->associates->name}}</h2>
        <p id="name" value="name">{{$client->associates->email}}</p>         
      </div>
    </div>

    <div class="col-sm-8">
      <div class="card-block bg-light"> 
      <span style="font-size: 30px;">
        <a href="{{route('client_message')}}" style="float:right;" ><i class="fas fa-envelope-square"></i></a>
      </span>
        <h6 class="m-b-20 p-b-5b-b-default f-w-600">Personal Information</h6>
       
        <hr>

        <div class="row mt-5">
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Cell Phone No.</p>
            <h6 class="text-muted ms-2 f-w-400">{{$client->associates->contact_number}}</h6>
          </div>

          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">BirthDate</p>
            <h6 class="text-muted ms-2 f-w-400 text-dark">{{$client->associates->birth_date}}</h6>
          </div>
          
          <div class="col-sm-6">
            <p class="m-b-10 f-w-600">Address</p>
            <h6 class="text-muted ms-2 f-w-400">{{$client->associates->address}}</h6>
          </div>
          

          
      </div> 
    </div>

  </div>
</div> -->


@stop