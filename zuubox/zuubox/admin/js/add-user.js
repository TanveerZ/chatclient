$(function () {
    $('body').confirmation({
        selector: '[data-toggle="confirmation"]'
    });

});
function changeUserStatus(user_id, status) {
    /* changing the user status*/
    var obj_params = new Object();
    obj_params.user_id = user_id;
    obj_params.status = status;
    jQuery.post("change-user-status.php", obj_params, function (msg) {
        if (msg.error == "1") {
            alert(msg.error_message);
        } else {
            /* toogling the bloked and active div of user*/
            if (status == "Inactive") {
                $("#pending" + user_id).css('display', 'none');
                $("#blocked" + user_id).css('display', 'inline-block');
                $("#unblocked" + user_id).css('display', 'none');
            }
            if (status == "Active") {
                $("#pending" + user_id).css('display', 'none');
                $("#unblocked" + user_id).css('display', 'inline-block');
                $("#blocked" + user_id).css('display', 'none');
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
            mobile: {
                required: true,
                number: true
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "check-user-info.php",
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
            address: {required: true},
            password: {required: true},
            cpassword: {
                required: true,
                equalTo: "#password"
            },
            status: {
                required: true
            }

        },
        messages: {
            name: {
                required: "Full Name is required"
            },
            mobile: {
                required: "Mobile number is required",
                number: "Mobile number is invalid"
            },
            email: {
                required: "Email Id is required",
                email: "Please enter the valid email id",
                remote: "Email id already exists"
            },
            address: {required: "Address is required"},
            password: {required: "Password is required"},
            cpassword: {
                required: "Confirm Password is required",
                equalTo: "Please enter correct Confirm Password"
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

	