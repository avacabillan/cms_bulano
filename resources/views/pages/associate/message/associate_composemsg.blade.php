<div class="modal" id="compose_msg" tabindex="-2" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create New Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body" id="message_box">
        <form action="{{route('associate_composemsg')}}" id="form" method="post">
          @csrf
          @method('post')
            <div class="mb-3">
              <label for="recipient_name" class="col-form-label">Recipient:</label>               
                <select name="name" class="form-control">
                    <option value="">Select Recepient</option>
                        @foreach($recipients as $recipient) 
                            <option value="{{$recipient->id}}">{{$recipient->email}}</option>
                        @endforeach
                </select>
            </div>
            <div class="mb-3">
               <label for="message-text" class="col-form-label">Message:</label>
               </i><textarea class="form-control" name="message" id="message" style="width:100%" required></textarea>
            </div>
            <div class="col-sm-6 mb-3">
              <div for="formFileMultiple" class="btn btn-default btn-file">
                <i class="fas fa-paperclip"></i> Attachment
                <input class="form-control" type="file" name="file" id="formFileMultiple" multiple>
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btn_compose_msg">Send Message</button>
            </div>
        </form>
      </div>

    </div>

  </div>
</div>