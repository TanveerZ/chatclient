$(function() {
    $('body').confirmation({
        selector: '[data-toggle="confirmation"]'
    });

});
$(document).ready(function () {
    // validate signup form on keyup and submit
    $("#add-form").validate({
        rules: {
            name: {
                required: true
            },
            status :{
                required: true
            }

        },
        messages: {
            name: {
                required: "Please enter the Service Name"
            },
            status :{
                required: "Please select the Status"
            }
        },
        errorElement: "span",
        errorPlacement : function(error, element) { 
            if (element.attr('name') == 'status') {
                error.insertAfter('#status-div');
            } else {
                error.insertAfter(element);
            }
        }
    });
});

	