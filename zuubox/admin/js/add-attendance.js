$(function () {
    $('body').confirmation({
        selector: '[data-toggle="confirmation"]'
    });

});
function changeAttendanceStatus(attendance_id, status) {
    /* changing the attendance status*/
    var obj_params = new Object();
    obj_params.attendance_id = attendance_id;
    obj_params.status = status;
    jQuery.post("change-attendance-status.php", obj_params, function (msg) {
        if (msg.error == "1") {
            alert(msg.error_message);
        } else {
            /* toogling the bloked and active div of attendance*/
            if (status == "Inactive") {
                $("#pending" + attendance_id).css('display', 'none');
                $("#blocked" + attendance_id).css('display', 'inline-block');
                $("#unblocked" + attendance_id).css('display', 'none');
            }
            if (status == "Active") {
                $("#pending" + attendance_id).css('display', 'none');
                $("#unblocked" + attendance_id).css('display', 'inline-block');
                $("#blocked" + attendance_id).css('display', 'none');
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
            email: {
                required: true,
                email: true,
                remote: {
                    url: "check-attendance-info.php",
                    type: "post",
                    data: {
                        'email': function () {
                            return $("#email").val();
                        },
                        'old_email': function () {
                            return $("#old_email").val()
                        }
                    }
                }
            },
            status: {
                required: true
            }

        },
        messages: {
            name: {
                required: "Full Name is required"
            },
            email: {
                required: "Email Id is required",
                email: "Please enter the valid email id",
                remote: "Email id already exists"
            },
            status: {
                required: "Please select the Status"
            }
        },
        errorElement: "span",
        errorPlacement: function (error, element) {
            if (element.attr('name') == 'status') {
                error.insertAfter('#status-div');
            } else {
                error.insertAfter(element);
            }
        }
    });
});

	