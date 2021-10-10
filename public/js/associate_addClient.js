$('#addClient').on('shown.bs.modal', function() {
    $('#saveBtn').val("createClient");
    $('#client_id').val('');
    $('#addClientForm').trigger('reset');
    $('#headingsModal').html('Add New Client');
    $('#addClient').modal('show');


})

$(document).ready(function(){
    $("#btn-addClient").click(function(){
        $(".addClient_form").fadeIn(500);
    });
    $("#close_ClientProfile").click(function(){
        $(".addClient_form").fadeOut(500);
    });
  
}); 