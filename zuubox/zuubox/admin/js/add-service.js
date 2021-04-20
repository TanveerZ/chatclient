$(function() {
    $('body').confirmation({
        selector: '[data-toggle="confirmation"]'
    });

});
function changeServiceStatus(service_id, status)  {
    /* changing the user status*/
    var obj_params = new Object();
    obj_params.service_id = service_id;
    obj_params.status = status;
    jQuery.post("change-service-status.php", obj_params, function (msg) {
        if (msg.error == "1")   {
            alert(msg.error_message);
        } else {
            /* toogling the bloked and active div of user*/
            if (status == "Inactive") {
                $("#pending" + service_id).css('display', 'none');
                $("#blocked" + service_id).css('display', 'inline-block');
                $("#unblocked" + service_id).css('display', 'none');
            }
            if (status == "Active") {
                $("#pending" + service_id).css('display', 'none');
                $("#unblocked" + service_id).css('display', 'inline-block');
                $("#blocked" + service_id).css('display', 'none');
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

	