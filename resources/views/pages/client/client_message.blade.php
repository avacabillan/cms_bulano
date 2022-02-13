@extends('layout.master')
@section('title')
    Client Message
@stop
@section('content')

  <!-- Main content -->
<section class="content">
  <div class="container-fluid">
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
              <table class="table inbox_table">
              @foreach($recipients as $recipient)
                <tbody>
                    @if($recipient->id == Auth::id())
                    @else                     
                      <tr style="float: left;">
                        <td class="recipient-name" name='{{$recipient->id}}' style="cursor: pointer;">{{$recipient->name}}</td>
                        <td>
                          <input type="hidden" id="recipient_id" value='{{$recipient->id}}'>
                        </td>
                      </tr>
                    @endif
                </tbody>   
                @endforeach
              </table><!-- /.table -->
            </div><!-- /.mail-box-messages -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container -->
</section><!-- /.content -->

<div class="modal" id="recipient" tabindex="-5" aria-hidden="true" style="display:none; overflow: scroll;">
  <div class="modal-dialog">
    <div class="modal-content bg-white">
      <div class="modal-header bg-muted">
        <div class="avatar">
					<img src="https://picsum.photos/g/40/40" style="margin-right: 8px; border-radius: 50%;" />
				</div>
        <h6 class="modal-title pt-2" id="staticBackdropLabel"><b>{{$recipient->name}}</b></h6>
        <button type="button" class="btn-close pt-3" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="clientmsg_card_body me-4 ms-4 mt-2">
          @foreach($messages as $message)
            @if(Auth::user()->id == $message->sender)
              <div class="d-flex justify-content-end">
                <div class="outbox bg-primary" style="color: white; padding: 5px; border-radius: 10px;">
                  <p class="text_msg pt-2">{{$message->message}}</p>
                </div>
              </div><br>
                @elseif(Auth::user()->id == $message->receiver)
                  <div class="d-flex justify-content-start">
                    <div class="inbox bg-secondary" style="color: white; padding: 5px; border-radius: 10px;">
                      <p class="text_msg pt-2">{{$message->message}}</p>
                    </div>
                  </div><br>  
                @endif
          @endforeach
      </div><!-- /.clientmsg_card_body -->
      <div id="reply_msg" >
        <form id="Form" action="{{route('client_composemsg')}}" method="post">
          @csrf
          @method('post')
          <div class="input-group client-compose me-2 ms-2">
            <input type="hidden" name="receiver" id="receiver">
            <input type="hidden" name="receiver" id="receiver">
            <i class="fas fa-paperclip pt-3"></i><textarea name="message" class="form-control type_msg mb-2" id="message" class="form-control type_msg" placeholder="Type your message..."></textarea>
            <div class="input-group-append">
              <button type="submit" class="btn me-2"><i class="fa fa-paper-plane"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div><!-- /.modal-->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $('.user').click(function(){  
      $('#recipient').fadeIn();  
    });
    
    $('.btn-close').click(function(){  
      $('#recipient').fadeOut();  
    });

    $('.recipient-name').click(function(){
      var id = $(this).attr('name');
      $("#receiver").val(id);
      $('#recipient').fadeIn();
    });
  });
</script>

@include('pages.client.client_composemsg')
@stop


