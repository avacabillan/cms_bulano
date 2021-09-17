
<!-- The Modal -->
<div id="myModal" class="modal msg_compose" >
  <!-- Modal content -->
  <div class="col-md-8 offset-md-4">
    
    <div class="form_compose">
      <button type="button" class="btn btn-primary btn-sm" id="upload_btn">Upload</button>
      <h3 class="composehead mt-3 pt-3">Create Message</h3>
      <hr>
        <!-- <label for="recipient-name" class="col-form-label"><strong>Recipient:</strong></label>
        <select class="form-select form-select-sm mb-3 bg-white"  >
          <option>Select Recipient</option>
          <option value="Associate">Associate name</option>
          <option value="Admin">Admin name</option> 
        </select> -->
        
        <p class="label"><strong>To:</strong><br><input type="email" class="textfield" placeholder="example@gmail.com"></p>
        <label for="message-text" class="col-form-label"><strong>Message:</strong></label>
        <textarea class="form-control" id="message-text"></textarea><br>
              
        <button type="button" class="btn btn-primary" data-dismiss="modal" style="float: right;">Cancel</button>
        <button type="button" class="btn btn-primary me-2" style="float: right;">Send message</button>

    </div>
         
  </div> 
</div>


