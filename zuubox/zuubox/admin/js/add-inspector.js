$(document).ready(function () {
    // validate signup form on keyup and submit
    $("#add-form").validate({
        rules: {
            fname: {
                required: true
            },
            lname: {
                required: true
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "check-inspector-info.php",
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
            fname: {
                required: "First Name is required"
            },
            lname: {
                required: "Last Name is required"
            },
            email: {
                required: "Email Id is required",
                email: "Please enter the valid email id",
                remote: "Email id already exists"
            },
            password: {required: "Password is required"},
            cpassword: {
                required: "Confirm Password is required",
                equalTo: "Please enter correct Confirm Password"
            },
            status: {
                required: "Please select the status"
            }
        },
        errorElement: "span",
        errorPlacement: function(error, element) { 
            if (element.attr('name') == 'status') {
                error.insertAfter('#status-div');
            } else {
                error.insertAfter(element);
            }
        }
    });
});

	