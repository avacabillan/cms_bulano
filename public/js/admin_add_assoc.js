   
$(document).ready(function(){
  $("#btn-newAssoc").click(function(){
      $(".add_associate_form").fadeIn(500);
  });
  $("#close_assocprofile").click(function(){
      $(".add_associate_form").fadeOut(500);
  });

  $("#assocname").click(function(){
      $(".assoc_profile_card").fadeIn(500);
  });
  $("#close_assocprofile").click(function(){
      $(".assoc_profile_card").fadeOut(500);
  });

}); 