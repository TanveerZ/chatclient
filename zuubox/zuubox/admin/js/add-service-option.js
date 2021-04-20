$(function() {
    $('body').confirmation({
        selector: '[data-toggle="confirmation"]'
    });

});
function changeServiceOptionStatus(option_id, status)  {
    /* changing the user status*/
    var obj_params = new Object();
    obj_params.option_id = option_id;
    obj_params.status = status;
    jQuery.post("change-service-option-status.php", obj_params, function (msg) {
        if (msg.error == "1")   {
            alert(msg.error_message);
        } else {
            /* toogling the bloked and active div of user*/
            if (status == "Inactive") {
                $("#pending" + option_id).css('display', 'none');
                $("#blocked" + option_id).css('display', 'inline-block');
                $("#unblocked" + option_id).css('display', 'none');
            }
            if (status == "Active") {
                $("#pending" + option_id).css('display', 'none');
                $("#unblocked" + option_id).css('display', 'inline-block');
                $("#blocked" + option_id).css('display', 'none');
            }
        }
    }, "json");

}
$(document).ready(function () {
    // validate signup form on keyup and submit
    $("#add-form").validate({
        rules: {
            name: {
                required: true
            },
            price :{
                required: true,
                number:  true
            },
            status :{
                required: true
            }

        },
        messages: {
            name: {
                required: "Please enter the Service Name"
            },
            price :{
                required: "Please enter the Price",
                number: "Please enter the valid Price"
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

	