
<!DOCTYPE html>
<html lang="en">
    <title>
        My Profile
    </title>
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>


    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- ADMIN -->
    <link rel="stylesheet" href="{{asset('css/client_profile.css')}}">

   
</head>
<body>



        <div class="container">
        <a href="{{url()->previous()}}" class="btn btn-secondary ms-2" style="float: left;">Back</a>

            <div class="main-body pt-5 mt-5">

                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card bg-info">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="/images/bulano.png"  class="user_profile">
                                        <div class="mt-3">
                                            <h4>{{$client->company_name}}</h4>
                                            <p class="text-white mb-1">{{$client->email_address}}</p>
                                            @foreach ($client->registeredAddress as $regadd)
                                            <p class="text-white font-size-sm">{{$regadd->city_name}},{{$regadd->postal_no}}</p>
                                            @endforeach
	
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8 pt-3">
                            <div class="card  bg-light mb-3">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Trade Name</h6>
                                        </div>
                                        @foreach ($client->business as $busi)
                                        <div class="col-sm-9 text-secondary">
                                        {{$busi->trade_name}}
                                        </div>
                                        @endforeach
                                    </div>
                                    <hr>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">TIN</h6>
                                        </div>
                                        @foreach ($client->tin as $tin)
                                        <div class="col-sm-9 text-secondary">
                                            {{$tin->tin_no}}
                                        </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Mode of Filling</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                        {{$client->modeofpayment->mode_name}}
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <h6 class="mb-0">Registration Date</h6>
                                        </div>
                                        @foreach ($client->business as $busi)
                                        <div class="col-sm-9 text-secondary">
                                            {{$busi->registration_date}}
                                        </div>
                                        @endforeach
                                    </div>
                                    <hr>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

            </div>
        </div>


</body>
</html>