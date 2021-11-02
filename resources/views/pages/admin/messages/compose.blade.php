
<div class="modal fade" id="compose_msg" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label"><b>Recipient</b></label>
            <input type="text" class="form-control" name="recipient" placeholder="example@gmail.com" required>
          </div>
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label"><b>Subject</b></label>
            <input type="text" class="form-control" name="subject" placeholder="example" required>
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label"><b>Message</b></label>
            <textarea class="form-control" name="message-text" placeholder="message here..." required></textarea>
          </div>
          <div class="mb-3">
            <label for="formFile" class="form-label"><b>Upload file</b></label>
            <input class="form-control" type="file" id="formFile">
          </div>
        </form>
      </div>
      
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Send message</button>
      </div>

    </div>
  </div>
</div>

