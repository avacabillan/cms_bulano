@extends('layout.master')

@section('title')
    Associate Message
@stop

@section('content')



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
                 @foreach($users as $user)
                  @foreach($clients as $client)
                    <table class="table table-hover table-striped">
                     @if($user->first()->id == Auth::id())
                      @else
                        <tbody>
                         @if($user->first()->name == $client->company_name)
                            <tr>
                                <td>
                                    <div class="icheck-primary">
                                        <input type="checkbox" value="" id="check15">
                                        <label for="check15"></label>
                                    </div>
                                </td>                         
                                <td class="mailbox-star"><a href="#"></a>{{$user->first()->id}}</td>
                                <?php 
                                    $fullname = $client->company_name;
                                ?>
                                <td class="mailbox-name"><a href="{{route('associate_showmsg_create', $user->first()->id)}}">{{$client->company_name}}</a>
                                </td>
                                <td class="mailbox-subject"><b>{{$client->company_name}}</b>
                            </tr>
                         @endif
                        </tbody>
                        @endif
                    </table>
                  @endforeach
                 @endforeach
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