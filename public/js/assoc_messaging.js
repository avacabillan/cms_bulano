$(document).ready(function(){
    $(".message-patient-btn").click(function(){
        $(".message-patient").fadeIn(500);
    });
    $("#btn-compose-cancel").click(function(){
        $(".message-patient").fadeOut(500);
    });
});