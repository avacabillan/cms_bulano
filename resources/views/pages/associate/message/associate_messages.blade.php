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


        <div class="col-md-9">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Inbox</h3>
                    <div class="card-tools">
                        <div class="input-group input-group-sm">
                            <input type="text" class="form-control" placeholder="Search Mail">
                            <div class="input-group-append">
                                <div class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="mailbox-controls">
                        <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="far fa-square"></i> Select All</button>
                        <div class="float-right">1-50/200<div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                            <button type="button" class="btn btn-default btn-sm">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="table-responsive mailbox-messages">
                    <table class="table table-hover table-striped">
                        <tbody>
                            <tr>
                                <td>
                                    <div class="icheck-primary">
                                        <input type="checkbox" value="" id="check15">
                                        <label for="check15"></label>
                                    </div>
                                </td>
                                <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                                <td class="mailbox-subject"><b>AdminLTE 3.0 Issue</b>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
  $(function () {
    //Enable check and uncheck all functionality
    $('.checkbox-toggle').click(function () {
      var clicks = $(this).data('clicks')
      if (clicks) {
        //Uncheck all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', false)
        $('.checkbox-toggle .far.fa-check-square').removeClass('fa-check-square').addClass('fa-square')
      } else {
        //Check all checkboxes
        $('.mailbox-messages input[type=\'checkbox\']').prop('checked', true)
        $('.checkbox-toggle .far.fa-square').removeClass('fa-square').addClass('fa-check-square')
      }
      $(this).data('clicks', !clicks)
    })

    //Handle starring for font awesome
    $('.mailbox-star').click(function (e) {
      e.preventDefault()
      //detect type
      var $this = $(this).find('a > i')
      var fa    = $this.hasClass('fa')

      //Switch states
      if (fa) {
        $this.toggleClass('fa-star')
        $this.toggleClass('fa-star-o')
      }
    })
  })
</script>
<script>
  $(document).ready(function(){
      $(".hamburger").click(function(){
          $(".wrapper").toggleClass("active")
      });
  });
</script>
@stop