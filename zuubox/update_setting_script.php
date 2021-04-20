<script type="text/javascript">
	$('#cancel').click(function(){
		 $('#collapse1').removeClass('in');
		 
	});
	$('#cancel1').click(function(){
		$('#collapse2').removeClass('in');
	});

	$('#cancel2').click(function(){
		$('#collapse3').removeClass('in');
	});

	$('#cancel3').click(function(){
 		$('#collapse4').removeClass('in');
	});

	$('#cancelpass').click(function(){
 		$('#collapse9').removeClass('in');
	});
</script>


<!-- update name and surname -->
<script type="text/javascript">
	$('#changename').click(function(){
		var name = $("#name").val(); 
		var surname = $("#surname").val();             
            if(name !='' && surname !='')
            {
				$.ajax({
		         type:"POST",
		        url:"update_setting_action.php",
		        data:{name:name,surname:surname},
		        success:function(result){           
		           $('#showchangename').html(name +" "+ surname );
		           $('#collapse1').removeClass('in');
		        }
		        });
			}
			else
			{
				alert ('Both field is required');
			}

	});
</script>

<!-- update username -->
<script type="text/javascript">
	$('#chnageusername').click(function(){
		var username = $("#username1").val(); 	

		if(username!='')
		{
			$.ajax({
		         type:"POST",
		        url:"update_setting_action.php",
		        data:{username:username},
     	        success:function(result){    
	              $('#showchangeusername').html(username);
  		          $('#collapse2').removeClass('in');
		        }
		        });
		}
		else
		{
			alert("User name is  required");
		}

	});
</script>

<!-- update contact -->

<script type="text/javascript">
	$('#changecontact').click(function(){

		var contact = $("#contact").val(); 	

		if(contact!='')
		{
			$.ajax({
		         type:"POST",
		        url:"update_setting_action.php",
		        data:{contact:contact},
     	        success:function(result){    
	              $('#showcontact').html(contact);
  		          $('#collapse3').removeClass('in');
		        }
		        });
		}
		else
		{
			alert("Contact is  required");
		}
	});
</script>


<!-- update email -->

<script type="text/javascript">
	$('#changeemail').click(function(){
		var email = $("#emailid").val(); 	
		if(email!='')
		{
			$.ajax({
		         type:"POST",
		        url:"update_setting_action.php",
		        data:{email:email},
     	        success:function(result){    
	              $('#showemail').html(email);
  		          $('#collapse4').removeClass('in');
		        }
		        });
		}
		else
		{
			alert("Email is  required");
		}
	});
</script>


<!-- update password -->
<script type="text/javascript">
	$('#changepassword').click(function(){
		var password = $("#password").val(); 	
		var repassword = $("#repassword").val(); 

		if(password!='' && repassword!='')
		{
			if(password === repassword)
			{
				$.ajax({
			         type:"POST",
			        url:"update_setting_action.php",
			        data:{password:password,repassword:repassword},
	     	        success:function(result){    
		             
	  		          $('#collapse9').removeClass('in');
			        }
			        });
			}
			else
			{
				alert("Password & Retype password not match");
			}
		}
		else
		{
			alert ('Both field is required');
		}
	});
</script>