$('#addAssoc').on('shown.bs.modal', function() {
  $('#saveBtn').val("createAssoc");
  $('#assoc_id').val('');
  $('#addAssocForm').trigger('reset');
  $('#headingsModal').html('Add New Associate');
  $('#addAssoc').modal('show');


})

$(document).ready(function(){
  $("#btn-addAssoc").click(function(){
      $(".addAssoc_form").fadeIn(500);
  });
  $("#close_AssocProfile").click(function(){
      $(".addAssoc_form").fadeOut(500);
  });

});