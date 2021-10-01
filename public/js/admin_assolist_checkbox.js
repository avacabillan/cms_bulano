$(document).ready(function(){
	// Activate tooltip
	$('[data-toggle="tooltip"]').tooltip();
	
	// Select/Deselect checkboxes
	var checkbox = $('table tbody input[type="checkbox"]');
	$("#selectAll").click(function(){
		if(this.checked){
			checkbox.each(function(){
				this.checked = true;                        
			});
		} else{
			checkbox.each(function(){
				this.checked = false;                        
			});
		} 
	});
	checkbox.click(function(){
		if(!this.checked){
			$("#selectAll").prop("checked", false);
		}
	});


});
/* -- END OF CHECKBOX -- */

$("#assoclist-deletebtn").on("click", function() {
	$('input:checked').not('.all').parents("tr").remove();
   });
   
   $('.all').on('click',function(){
	 var $inputs = $('table').find('input');
	 $inputs.prop('checked', 'checked');
   });


// $(document).ready(function () {
//     $("#Search").click(function (any) {
// 		$("tbody").empty();
//         var searchIds = new Set($('#searchBox').val().split(/[ ,\r\n]+/).map(s => s.trim()));
//         searchIds.forEach(CODE =>
			
//             $("tbody").append('<tr>' + `<td class="theader1" id="theader1">${CODE}</td>` + `<td class="theader2" id="theader2">${datab[CODE]}</td>` + `<td class="theader3" id="theader3">${datac[CODE]}</td>` + `<td class="theader4" id="theader4">${datad[CODE]}</td>` + '</tr>'));
//     });
// });



/* -- MODAL ASSOCLIST NAME -- */

// $(document).ready(function() {
// 	"use strict";
	
	// OPEN MODAL ON TRIGGER CLICK
	// $(".assocname_listed").on('click', function () {
	// 	var $quickview = $(this).next(".modal_assoc_profile");
	// 	$quickview.dequeue().stop().slideToggle(500, "easeInOutQuart");
	// 	$(".quickViewContainer").not($quickview).slideUp(200, "easeInOutQuart");
	// });
	
	// CLOSE MODAL WITH MODAL CLOSE BUTTON
// 	$(".close").click(function() {
// 		$(".modal_assoc_profile").fadeOut("slow");
// 	});
	
// });

/* -- END OF MODAL ASSOCLIST NAME -- */