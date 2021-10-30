$('#addFile').on('shown.bs.modal', function() {
    $('#saveBtn').val("uploadFile");
    $('#client_id').val('');
    $('#uploadFile').trigger('reset');
    $('#headingsModal').html('Upload File');
    $('#addFile').modal('show');


})

$(document).ready(function(){
    $("#btn-addFile").click(function(){
        $(".addFile_form").fadeIn(500);
    });
    $("#close_uploadFile").click(function(){
        $(".addFile_form").fadeOut(500);
    });
  
}); 