@extends('layout.master')

@section('title')
     Message
@stop

@section('content')

<div class="content">
  <div class="container-fluid">
      
   <div class="col-sm-6 mx-auto">
    <div class="card card-primary card-outline direct-chat direct-chat-primary">
        <div class="card-header">
            <h3 class="card-title">Associate</h3>
            <div class="card-tools">
                <!-- <span title="3 New Messages" class="badge bg-primary">3</span> -->
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>

        <div class="card-body" style="overflow: scroll;">
            <div class="direct-chat-messages">
                @foreach($messages as $message)
                    @if($message->receiver == $id || $message->sender == $id)

                        <div class="direct-chat-msg">
                            <div class="direct-chat-infos clearfix">
                                @if($message->receiver == Auth::user()->id )
                                    @if(!$message->img_file)
                                        <span class="direct-chat-name float-left">Client Name</span>
                            </div>
                                        <img class="direct-chat-img" src="../dist/img/user1-128x128.jpg" alt="Message User Image">
                                        <div class="direct-chat-text">{{$message->message}}</div>
                                    @else
                                        <div class='d-flex justify-content-start'><div class='img-msg'><img src="{{asset('imgfileMessages')}}/{{$message->img_file}}" id='image-msg' alt='image msg' style='max-width:150px;'></div></div><br>
                                    @endif
                                    
                        </div>
                                @elseif($message->sender == Auth::user()->id )

                        <div class="direct-chat-msg right">
                            <div class="direct-chat-infos clearfix">
                                    @if($message->message)
                                        <span class="direct-chat-name float-right">{{Auth::user()->associates->name}}</span>
                            </div>
                                        <img class="direct-chat-img" src="../dist/img/user3-128x128.jpg" alt="Message User Image">
                                        <div class="direct-chat-text">{{$message->message}} </div>
                                    @elseif($message->img_file !== null)
                                        <div class='d-flex justify-content-end'><div class='img-msg'><a  id="corImage" href="{{asset('imgfileMessages/'.$message->img_file)}}" data-lightbox="$requestee->cor"> <img src="{{asset('public/imgfileMessages/'.$message->img_file)}}" alt="" width="70px" height="50px"></a></div><br>
                                    @endif
                                @endif
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="card-footer">
            <form id="Form" action="{{route('insert_associate_composemsg', $id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('post')
                <div class="input-group">
                    <div class="input-group-append file-ups">
                                        <label for="fileups">
                                            <span class="input-group-text attach_btn"><i class="fas fa-paperclip"></i></span>
                                        </label>
                                        <input type="file" class="input-file" id="fileups" name="file">
                                    </div>
                    <input type="text" name="message" id="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </span>
                </div>
            </form>
        </div>
    </div>
</div>

</div>

</div>

<script>
var clinicstaffmsg_card_body = document.querySelector('.clinicstaffmsg_card_body');
clinicstaffmsg_card_body.scrollTop = clinicstaffmsg_card_body.scrollHeight - clinicstaffmsg_card_body.clientHeight;
</script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
$(document).ready(function(){
$(".hamburger").click(function(){
    $(".wrapper").toggleClass("active");
});
$("#search-sender").click(function(){
    $(".user-receiver").show();
    $(".patient-msgs").hide();
    $("#search-sender").hide();
})

});
</script>
@stop