$(document).ready(function () {
    // validate signup form on keyup and submit
    $("#signupform").validate({
        rules: {
            profile_pic:{
                required:true,
            },
            last_name: {
                required: true,
                
            },
            first_name: {
                required: true,                
            },
            username:{
                required:true,
            },
            dob:{
                required:true,
            },
            gender:{
                required:true,
            },
            height:{
                required:true,
            },
            weight:{
                required:true,
            },
            profession:{
                required:true,
            },
            city:{
                required:true,
            },
            country:{
                    required:true,
            },
            phoneno:{
                required:true,
            },
            password:{
                required:true,minlength: 8
            },
            pw_confirm:
            {
                required:true
            },
            email:{
                required:true,email:true,
            },
            email_confirm:{
                required:true
            },
            age:{
                required:true,
            },
            religion:{
                required:true,
            },
            location:{
                required:true,
            },
            coworker:{
                required:true,
            },
           cell_name:
            {
                required: function(elem)
                {
                 return $("input.select:checked").length > 0;
                }
             }




        },
        messages: {
            profile_pic:
            {
                required:"required",
            },
            last_name: {
                required: "required",
                
            },
            first_name: {
                required: "required",
                
            },
            username:{
                required:"required",
            },
            dob:{
                required:"required",
            },
            gender:
            {
                required:"required",
            },

            height:
            {
                required:"required",
            },

            weight:
            {
                required:"required",
            },

            profession:
            {
                required:"required",
            },
            city:
            {
                required:"required",
            },
            country:
            {
                required:"required",
            },
            phoneno:
            {
                required:"required",
            },
            password:
            {
                required:"required",minlength:"minimum 8 character ",
            },
            pw_confirm:
            {
                required:"required",
            },
            email:
            {
                required:"required",email:"Not Valid",
            },
            email_confirm:
            {
                required:"required",
            },
            age:
            {
                required:"required",
            },
            religion:
            {
                required:"required",
            },
            location:
            {
                required:"required",
            },
            coworker:
            {
                required:"required",
            },
            cell_name:
            {
              required:"required",  
            }



        },
        errorElement: "span",
    });
});
