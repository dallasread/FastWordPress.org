var fwpPlans = function() {
	var frequency = $("#frequency_toggle input:checked:first").val()
	var plan = $(".plan.selected").data("plan")
	$("#os0").val(frequency + plan)
}

var fwploader = function() {
  $('.input-daterange').datepicker({
  	autoclose: true,
  	orientation: 'right top',
  	endDate: new Date()
  });

	$(".error-notification").bind("click", function (e) {
		var error = $(this).attr("data-error");

		Messenger({
			extraClasses: 'messenger-fixed messenger-on-right messenger-on-bottom messenger-theme-flat'
		}).post({
		  	message: error,
		  	type: 'error',
		  	showCloseButton: true
		});
		
		return false;
	});

	var $plans = $(".plans .plan");
	$plans.click(function () {
		$plans.removeClass("selected");
		$(this).addClass("selected");
		fwpPlans()
	});
	
	$("#frequency_toggle .btn").click(function() {
		setTimeout(function(){
			fwpPlans()
		}, 100)
	})
	
	Sidebar.initialize();

	// tooltips
	$("[data-toggle='tooltip']").tooltip();

	// build custom selects
	UI.smart_selects();

	// retina display
	if(window.devicePixelRatio >= 1.2){
	    $("[data-2x]").each(function(){
	        if(this.tagName == "IMG"){
	            $(this).attr("src",$(this).attr("data-2x"));
	        } else {
	            $(this).css({"background-image":"url("+$(this).attr("data-2x")+")"});
	        }
	    });
	}
}

$(document).ready(fwploader)