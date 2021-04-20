	$(document).ready(function() {
		// validate signup form on keyup and submit
		$("#add-form").validate({
			rules: {
				uid: {
					required:true
				},
				deal_type: {
					required:true
				},
				offering: {
					required:true
				},
				seeking: {
					required:true
				}
				
			},
			messages: {
				uid: {
					required:"Please select User"
				},
				deal_type: {
					required:"Please select Deal Type"
				},
				offering: {
					required:"Please select Offering"
				},
				seeking: {
					required:"Please select Seeking"
				}
			},
			errorElement: "span",
		});
	});
	
	