$(function() {
    $('body').confirmation({
        selector: '[data-toggle="confirmation"]'
    });

});
function changeAdminStatus(admin_id, status) {
/* changing the user status*/
    var obj_params = new Object();
    obj_params.admin_id = admin_id;
    obj_params.status = status;
    jQuery.post("change-admin-status.php", obj_params, function (msg) {
        if (msg.error == "1") {
            alert(msg.error_message);
        } else {
            /* toogling the bloked and active div of user*/
            if (status == "Inactive") {
                $("#blocked" + admin_id).css('display', 'inline-block');
                $("#unblocked" + admin_id).css('display', 'none');
            } else {
                $("#unblocked" + admin_id).css('display', 'inline-block');
                $("#blocked" + admin_id).css('display', 'none');
            }
        }
    }, "json");

}
$(document).ready(function () {
    
    //form validation rules
    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-zA-Z ]+$/.test(value);
    });

    // validate signup form on keyup and submit

    $("#add-form").validate({
        rules: {
            fname: {
                required: true,
                lettersonly: true
            },
            lname: {
                required: true,
                lettersonly: true
            },
            role: {
                required: true
            },
            uname: {
                required: true,
                remote: {
                    url: "check-admin-info.php",
                    type: "post",
                    data: {
                        'uname': function () {
                            return $("#uname").val();
                        },
                        'old_uname': function () {
                            return $("#old_uname").val()
                        }
                    }
                }
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "check-admin-info.php",
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
            phone: {
                required: true,
                number: true
            },
            status: {
                required: true
            },
            password: {required: true, minlength: 6},
            cpassword: {
                required: true,
                minlength: 6,
                equalTo: "#password"
            }

        },
        messages: {
            fname: {
                required: "First Name is required",
                lettersonly: "Please enter Valid First Name"
            },
            lname: {
                required: "Last Name is required",
                lettersonly: "Please enter Valid Last Name"
            },
            role: {
                required: "Please select the Admin Role"
            },
            uname: {
                required: "Please enter the Username",
                remote: "Username is already Registered"
            },
            email: {
                required: "Email Id is required",
                email: "Please enter the valid email id",
                remote: "Email id already Registered"
            },
            phone: {
                required: "Phone number is required",
                number: "Please enter the valid Phone number"
            },
            status: {
                required: "Please select the Status"
            },
            password: {required: "Password is required", minlength: "Please enter atleast 6 Characters"},
            cpassword: {
                required: "Confirm Password is required",
                minlength: "Please enter atleast 6 Characters",
                equalTo: "Please enter correct Confirm Password"
            }
        },
        errorElement: "span",
        errorPlacement : function(error, element) { 
            if (element.attr('name') == 'status') {
                error.insertAfter('#status-div');
            } else {
                error.insertAfter(element);
            }
            if (element.attr('name') == 'role') {
                error.insertAfter('#role-div');
            }
        }
    });
});

	