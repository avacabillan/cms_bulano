<div class="modal" id="compose_msg" tabindex="-2" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Create New Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body" id="message_box">
        <form action="{{route('admin_composemsg')}}" id="form" method="post">
          @csrf
          @method('post')
            <div class="mb-3">
            <label for="recipient_name" class="col-form-label">Recipient:</label>               
                <select name="name" class="form-control">
                    <option value="">Select Recepient</option>
                        @foreach($recipients as $recipient) 
                            <option value="{{$recipient->id}}">{{$recipient->name}}</option>
                        @endforeach
                </select>
            </div>
            <div class="mb-3">
               <label for="message-text" class="col-form-label">Message:</label>
              <textarea class="form-control" name="message" id="message" style="width:100%" required></textarea>
            </div>
            <div class="mb-3">
              <input class="form-control" name="formFile" type="file" id="formFile">
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary" id="btn_compose_msg">Send Message</button>
            </div>
        </form>
      </div>

    </div>

  </div>
</div>
@include('sweetalert::alert')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function(){
        $("#sender_message").hide();
        $('.user').click(function(){
            $("#sender_message").show();
            $("#unselect_msg").hide();

            $("#message_box").html('');
            value=$(this).attr('name');
            $(".receiver_name").html($(this).html());
            $('#receiver_id').attr('value',value);
            var id=$('#receiver_id').val();
            window.history.pushState('', 'New Page Title', '/admin_message');
            $.ajax({    
                type: 'get',
                url: "admin_showmsg/"+id,
                data:{ id: id},
            })
            .done(function(data){  
                $.each(data, function(index, value) {
                if(value.receiver == {{Auth::user()->id}}){
                    $("#message_box").append(
                        "<div class='d-flex justify-content-start'><div class='outbox'>"+value.message+"</div></div><br>"
                    )
                }else if(value.sender == {{Auth::user()->id}}){
                    $("#message_box").append(
                        "<div class='d-flex justify-content-end'><div class='outbox bg-primary text-light'>"+value.message+"</div></div><br>"
                    )
                }
                });
                window.history.pushState('', 'New Page Title', '/admin_message/'+id);
            });
        })
    })
    $("#form").on('btn_compose_msg',function(e) {
        e.preventDefault(); // avoid to execute the actual submit of the form.
        let formFile = $('#formFile').val();
        var recipient_id = $("#recipient_id").val();
        var message = $("#message").val();
        var actionUrl = form.attr('action');
        $.ajax({
            type: "post",
            url: actionUrl,
            data:{
              formFile:formFile,
              recipient_id:recipient_id,
              message:message,
            },
            success: function(data)
            {
                $("#message").val('');
                $("#associate_inbox").append(
                    "<div class='d-flex justify-content-end'><div class='outbox'>"+message+"</div></div><br>"
                )
                
            }
        });
    });
    
</script>

