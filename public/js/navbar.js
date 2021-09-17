// $(document).ready(function() {
//     $(".button-collapse").sideNav({
//       breakpoint: 1200
//     });
//       // SideNav Scrollbar Initialization
//     //   var sideNavScrollbar = document.querySelector('.custom-scrollbar');
//     //   var ps = new PerfectScrollbar(sideNavScrollbar);
//   });


  // $(document.body).on('click', 'button', function() {
  //   $(".nav-main").toggleClass('is-shift-content');
  //   $(".siderbar_main").toggleClass('is-shift-sidebar');
  // });

  $("#show-sidebar").click(function(e) {
    e.preventDefault();
    $(".siderbar_main").toggleClass("toggled");
});