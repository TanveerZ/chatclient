$(function () {
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
            }
        },
        messages: {
            name: {
                required: "Project Name is required"
            }
        },
        errorElement: "span"
    });
});

	