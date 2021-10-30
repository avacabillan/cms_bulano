$('#editAssoc').on('shown.bs.modal', function() {
    $('#saveBtn').val("editAssoc");
    $('#assoc_id').val('');
    $('#editAssocForm').trigger('reset');
    $('#headingsModal').html('Edit Associate');
    $('#editAssoc').modal('show');


})

$(document).ready(function(){
    $("#btn-editAssoc").click(function(){
        $(".editAssoc_form").fadeIn(500);
    });
    $("#close_editAssoc").click(function(){
        $(".editAssoc_form").fadeOut(500);
    });
  
});