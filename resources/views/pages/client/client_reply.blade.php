
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
        <form id="Form" action="{{route('client_reply')}}" method="post">
          @csrf
          @method('post')
          <div class="input-group client-compose me-2 ms-2">
            <input type="hidden" name="receiver" id="receiver">
            <!-- <div for="formFileMultiple" class="btn btn-default btn-file">
                <i class="fas fa-paperclip pt-3"></i>
                <input class="form-control" type="file" name="file" id="formFileMultiple" multiple>
            </div> -->
            <textarea name="message" class="form-control type_msg mb-2" id="message" class="form-control type_msg" placeholder="Type your message..."></textarea>
            <div class="input-group-append">
              <button type="submit" class="btn me-2"><i class="fa fa-paper-plane"></i></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div><!-- /.modal-->