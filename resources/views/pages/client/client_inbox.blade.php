@extends('layout.master')
@section('title')
@stop

@section('content')

<div class="message-patient">
    <!-- <div class="patient-msg mt-5"> -->
        <div class="card" style="margin-left:10rem; height: auto; width: 70%;">
            <div class="card-header patientmsg-cardheader">
               <strong><h6>{{Auth::user()->clients->associates->name}}</h6>
                <h6>{{Auth::user()->clients->associates->departments->department_name}}</h6></strong> 
                <a href="#" id="btn-compose-cancel" style="float:right; color: red;"><i class="fas fa-times-circle"></i></a>
            </div>
            <div class="card-body patientmsg_card_body">
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
            <div class="card-footer">
                <form action="{{route('client_composemsg')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="input-group patient-compose">
                        <div class="input-group-append file-ups">
                           
                            
                        </div>
                        
                        <div class="input-group-append">
                            <textarea name="message" class="form-control type_msg" id="message" class="form-control type_msg" placeholder="Type your message..."  style="width: 30rem;"></textarea>
                            <button type="submit" class="btn" id="btn-compose-msg"><i class="fas fa-location-arrow"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    <!-- </div> -->
</div>
@endsection