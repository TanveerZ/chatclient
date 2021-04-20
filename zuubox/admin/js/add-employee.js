$(function () {
    $('body').confirmation({
        selector: '[data-toggle="confirmation"]'
    });

});
function changeEmployeeStatus(emp_id, status) {
    /* changing the employee status*/
    var obj_params = new Object();
    obj_params.emp_id = emp_id;
    obj_params.status = status;
    jQuery.post("change-employee-status.php", obj_params, function (msg) {
        if (msg.error == "1") {
            alert(msg.error_message);
        } else {
            /* toogling the bloked and active div of employee*/
            if (status == "Inactive") {
                $("#pending" + emp_id).css('display', 'none');
                $("#blocked" + emp_id).css('display', 'inline-block');
                $("#unblocked" + emp_id).css('display', 'none');
            }
            if (status == "Active") {
                $("#pending" + emp_id).css('display', 'none');
                $("#unblocked" + emp_id).css('display', 'inline-block');
                $("#blocked" + emp_id).css('display', 'none');
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
			monthly_salary: {
                required: true
            },
            email: {
                required: true,
                email: true,
                remote: {
                    url: "check-employee-info.php",
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
            desig:{
                required: true
            },
            password:{
                required: true,
                minlength:7
            },
            status: {
                required: true
            }

        },
        messages: {
            name: {
                required: "Full Name is required"
            },
			monthly_salary: {
                required: "Month Salary is required"
            },
            email: {
                required: "Email Id is required",
                email: "Please enter the valid email id",
                remote: "Email id already exists"
            },
            desig:{
                required: "Designation is required"
            },
            password:{
                required: "Password is required",
                minlength : "Password should contain minimum 7 Characters"
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

	