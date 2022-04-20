@extends('layout.master')

@section('title')
    Associate Message
@stop

@section('content')

                @foreach($users as $user)
                    @foreach($clients as $client)

                        @if($user->first()->id == Auth::id())
                        @else
                            @if($user->first()->name == $client->company_name)
                            <tr>
                                <td style="display:none;">{{$user->first()->id}}</td>
                                <?php 
                                    $fullname = $client->company_name;
                                ?>
                                <td>
                                    <a href="{{route('associate_showmsg_create', $user->first()->id)}}"><img src="{{ Avatar::create($fullname)->toBase64()}}" class="patient-avatar" alt="patient-avatar"> {{$client->company_name}} </a>
                                    <hr>
                                </td>
                                
                            </tr>
                            @endif
                        @endif
                    @endforeach
                @endforeach

                </tbody>
            </table>
        </div>
        <div class="card user-receiver" style="display:none;">
            <div class="card-body" style="padding: 0px;">
                <table class="" style="width:100%" id="msg">
                    <thead>
                        <tr>
                            <th style="display:none">ID</th>
                            <th style="display:none">User Name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientUsers as $clientUser)
                            @foreach($clients as $client)
                                @if($clientUser->name == $client->company_name)
                                    @if($clientUser->role == 'client')
                                    <tr class="theData">
                                        <td style="display: none">{{$clientUser->id}}</td>
                                        <?php 
                                            $fullname = $client->company_name;
                                        ?>
                                        <td style="background-color: #0087ff;">
                                            <a href="{{route('associate_showmsg_create', $clientUser->id)}}" class="text-white"><img src="{{ Avatar::create($fullname)->toBase64()}}" class="patient-avatar" alt="patient-avatar"> {{$client->company_name}}</a>
                                            <hr>
                                        </td>
                                    </tr>
                                    @endif
                                @endif
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
      <div class="hamburger">
        <div class="inner_hamburger">
            <span class="arrow">
                <i class="fas fa-long-arrow-alt-left"></i>
                <i class="fas fa-long-arrow-alt-right"></i>
            </span>
        </div>
      </div>
    
        <div class="main-container">
          <div class="doctor-inbox" id="doctor-inbox">
              <div class="row">
                  <div class="col-md-12 message-doctor">
                      <div class="doctor-msg">
                          <div class="card" id="unselect-msg" >
                              <div class="card-body doctormsg_card_body">
                                  <div class="col-md-8 offset-md-2 no-msg">
                                      <h1>You don't have a message selected</h1>
                                      <p>Choose one from your existing messages, or start a new one.</p>
                                      <a href="#" class="btn btn-primary mt-3">New Message</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </div> <!-- closing div connect from admin-sidenav -->
</div> <!-- closing div connect from admin-header -->

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
      $(".hamburger").click(function(){
          $(".wrapper").toggleClass("active")
      });
  });
</script>
@stop