@extends('layout.master')
@section('title')
    Client Message
@stop
@section('content')

  <!-- Main content -->
  <div class="message-patient">
    <!-- <div class="patient-msg mt-5"> -->
        <div class="card">
            <div class="card-header patientmsg-cardheader">
                <div class="row">
                    <div class="col"><h6>CLINIC PERSONEL</h6></div>
                    <div class="col-md-1"><a href="#" id="btn-compose-cancel" style="float:right; color: red;"><i class="fas fa-times-circle"></i></a></div>
                </div>
            </div>
            <div class="card-body patientmsg_card_body">
                @foreach($messages as $message)
                    @if(Auth::user()->id == $message->sender)
                        @if($message->img_file)
                        <div class="d-flex justify-content-end">
                            <div class="img-msg">
                                    <img src="{{asset('imgfileMessages')}}/{{$message->img_file}}" id="image-msg" alt="image msg" style="max-width:150px;">
                            </div>
                        </div><br>
                        @else
                        <div class="d-flex justify-content-end">
                            <div class="outbox bg-primary">
                                <p>{{$message->message}}</p>
                            </div>
                        </div><br>
                        @endif
                    @elseif(Auth::user()->id == $message->receiver)
                       
                        <div class="d-flex justify-content-start">
                            <div class="inbox bg-info">
                                <p>{{$message->message}}</p>
                            </div>
                        </div><br>  
                        @endif
                    @endif
                @endforeach
            </div>
            <div class="card-footer">
                <form action="{{route('client_composemsg')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="input-group patient-compose">
                        <div class="input-group-append file-ups">
                            <label for="fileups">
                                <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                            </label>
                            
                        </div>
                        <textarea name="message" class="form-control type_msg" id="message" class="form-control type_msg" placeholder="Type your message..."></textarea>
                        <div class="input-group-append">
                            <button type="submit" class="btn" id="btn-compose-msg"><i class="fas fa-location-arrow"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <!-- </div> -->
</div>
@stop


