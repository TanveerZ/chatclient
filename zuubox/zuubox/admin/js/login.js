$(document).ready(function () {
    // validate signup form on keyup and submit
    $("#signinForm").validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true,
                minlength: 7
            }

        },
        messages: {
            email: {
                required: "Email is required",
                email : "Enter valid Email"
            },
            password: {
                required: "Password is required",
                minlength: "Password should contain minimum 7 characters"
            }
        },
        errorElement: "span",
    });
});