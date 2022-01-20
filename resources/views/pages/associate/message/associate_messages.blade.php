@extends('layout.master')
@section('title')
    Associate Message
@endsection 
@section('content')
@include('shared.navbar')
@include('pages.admin.sidebar')

<div class="siderbar_main toggled">
  <div class="page-content"><br><br><br>

    <div class="row bg-light">
      <div class="col-md-4 pt-2">
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#compose_msg" style="width:100%">Create New Message</button>
      </div>
      <div class="col-md-8">
        <div class="alert alert-success text-mb-2 mt-3 me-3" role="alert">Message sent Successfully !</div>
          <h4 class="associate_inbox" id="associate_inbox">Inbox</h4>
            @foreach($users as $user)
                @if($user->first()->id == Auth::id())

                @else
                <div class="form-group">
                    <a class="user"  name='{{$user->first()->id}}'>{{$user->first()->name}}</a>
                </div>
                @endif
            @endforeach
        </div>
    </div>

  </div>
</div>

<div class="modal" id="recipient" tabindex="-2" aria-hidden="true" style="display:none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="staticBackdropLabel">Sender name</h6>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="associatemsg_card_body">
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
                
      </div>

      <div class="modal-body" class="message_box">
        <form id="Form" action="{{route('admin_showmsg')}}" method="post">
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
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
  $('.user').click(function(){  
    $('#recipient').fadeIn();  
  });
</script>

@include('pages.associate.message.associate_composemsg')
@stop


