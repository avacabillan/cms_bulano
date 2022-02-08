@extends('layout.master')
@section('title')
    Client Message
@stop
@section('content')

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-3 pt-5 mt-2">
        <button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#compose_msg" style="width:100%">Create New Message</button>
      </div><!-- /.col -->
      <div class="col-md-9">
        <div class="card card-dark card-outline">
          <div class="card-header">
            <h3 class="card-title">Inbox</h3>
          </div><!-- /.card-header -->
          <div class="card-body p-0">
            <div class="table-responsive mailbox-messages">
              <table class=" table">
                <tbody>
                  <tr style="float: left;">
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    </td>
                  </tr>
                </tbody>
              </table><!-- /.table -->
            </div><!-- /.mail-box-messages -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </section><!-- /.content -->

<div class="modal" id="recipient" tabindex="-2" aria-hidden="true" style="display:none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="staticBackdropLabel">Sender name</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="clientmsg_card_body">
        <div>
        @foreach($messages as $message)
            @if(Auth::user()->id == $message->sender)
              <div class="d-flex justify-content-end">
                <div class="outbox">
                  <p>{{$message->message}}</p>
                </div>
              </div><br>
                @elseif(Auth::user()->id == $message->receiver)
                  <div class="d-flex justify-content-start">
                    <div class="inbox">
                      <p>{{$message->message}}</p>
                    </div>
                  </div><br>  
                @endif
          @endforeach
        </div>    
      </div><!-- /.associatemsg_card_body -->

      <div class="modal-body" class="message_box">
        <form id="Form" action="#" method="post">
          @csrf
          @method('post')
          <div class="input-group doctor-compose">
            <input type="text" name="receiver_id" id="receiver_id" style="display:none">
            <textarea name="message" class="form-control type_msg" id="message" class="form-control type_msg" placeholder="Type your message..."></textarea>
            <div class="input-group-append">
              <button type="submit" class="btn" id="btn-compose-msg"><i class="fas fa-location-arrow"></i></button>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>
</div><!-- /.modal-->

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  $('.user').click(function(){  
    $('#recipient').fadeIn();  
  });
</script>

@include('pages.client.client_composemsg')
@stop


