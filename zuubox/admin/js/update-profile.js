$(document).ready(function () {
    // validate signup form on keyup and submit
    $("#add-form").validate({
        rules: {
            name: {
                required: true
            },
            phone: {
                required: true,
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
            password: {required: true, minlength: 7},
            cpassword: {
                required: true,
                equalTo: "#password"
            }

        },
        messages: {
            name: {
                required: "Full Name is required"
            },
            phone: {
                required: "Phone is required",
            },
            email: {
                required: "Email Id is required",
                email: "Please enter the valid email id",
                remote: "Email id already Registered"
            },
            password: {required: "Password is required",minlength:"Password should contain minimum 7 characters."},
            cpassword: {
                required: "Confirm Password is required",
                equalTo: "Please enter correct Confirm Password"
            }
        },
        errorElement: "span",
    });
});

	