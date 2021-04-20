<?php
//session_start();
require_once("include/config.php");
require_once("include/functions.php");

$users = new User();
$cells = $users->select_allrecords('tbl_cell','*');
$allcountry=$users->select_allrecords('tbl_country','*');

?>
<style type="text/css">
	.box-weight [class*="col-xs-"]:not(.col-xs-12){
      padding: 0px;
	}
</style>
<!-- <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
<script src="https://cdn.jsdelivr.net/npm/moment@2.20.1/moment.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

<form class="profile" action="signup-action.php" method="post" id='signupform'enctype="multipart/form-data" <?php //if($_SESSION['sblock']==1){?> style="display:none" <?php //}?>>
<div class="signup-inner1">
	<div class="window-btn">
    	<button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
        <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
    </div>
			<div class='title'>USER PROFILE REGISTRATION</div>
			<?php 
		    	
		    if(isset($_SESSION['error_msg'])){
					if($_SESSION['error_msg']!="")
					{
						echo "<div class='error_msg'>";
						echo $_SESSION['error_msg'];	
						echo "</div>";						
					}
				}
				
				?>

				<?php if(isset($_SESSION['success_msg'])){
					if($_SESSION['success_msg']!="")
					{
						echo "<div class='success text-center'>";
						echo $_SESSION['success_msg'];
						echo "</div>";						
					}
				}?>
		

		
	<div class="upper">
	<div class="photo profile_pic" id='blah'>
	<div class="button_container">
	<input type="hidden" name="profile_pic_saved" value="">
	<div class="edit profile_pic">
	Upload <input type="file" name="profile_pic" accept="image/*" onchange="readURL(this);">
	</div>
	</div>
	</div>
	<div class="basic_info">
	<div class="sect_title">
	Please Fill In All Blanks
	<div class="small">for Minimal Registration</div>
	</div>

<script type="text/javascript">
	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')                        
                        .css('background-image', 'url(' + e.target.result + ')');
                };

                reader.readAsDataURL(input.files[0]);
            };
        };
</script>
    <div class="box-weight">
	<div class="row"> 
	<div class="col-xs-12">

    <div class="col-xs-5">
	  <div class="input-group">
	    <span class="input-group-addon">Surname/Family Name</span>
	    <input type="text" value="<?php //echo $_POST['last_name'];?>" name="last_name" id="last_name" class="form-control">
	  </div>
	</div> 
	<div class="col-xs-7">
	<div class="col-xs-6">
	  <div class="input-group">    
		<span class="input-group-addon">Given Name</span>
		<input type="text" value="<?php //echo $_POST['first_name'];?>" name="first_name" id="first_name" class="form-control">
 	  </div>
	</div> 
	<div class="col-xs-6">
	  <div class="input-group"> 
		<span class="input-group-addon">User Name</span>
		<input type="text" value="" onfocusout="check_unique_user(this.value);" name="username" id="username" class="form-control" autocomplete="off">
	  </div>
	</div>
	</div>
	</div>
	</div>


	<div class="row"> 
	<div class="col-xs-12"> 
	<div class="col-xs-3">
	  <div class="input-group"> 	   
		<span class="input-group-addon">Gender</span>
		<select name="gender" class="form-control">
		<option value=""> </option>
		<option  value="Male">Male</option>
		<option  value="Female">Female</option>
		</select>
      </div>
	</div>  
	<div class="col-xs-3">
	  <div class="input-group">  
	    <span class="input-group-addon">Date Of Brith</span>
	    <input type="text" value="" name="dob" id="datetime" class="form-control">
      </div>
	</div> 
	
	<div class="col-xs-3">
	  <div class="input-group"> 
		<span class="input-group-addon">Height</span>
		<select name="height" class="form-control">
		<option value=""> </option>  >
		<option value="95">7' 11"</option>
		<option value="94">7' 10"(239cm)</option>
		<option value="93">7' 9"</option>
		<option value="92">7' 8"(234cm)</option>
		<option value="91">7' 7"</option>
		<option value="90">7' 6"(229cm)</option>
		<option value="89">7' 5"</option>
		<option value="88">7' 4"(224cm)</option>
		<option value="87">7' 3"</option>
		<option value="86">7' 2"(218cm)</option>
		<option value="85">7' 1"</option>
		<option value="84">7'(213cm)</option>
		<option value="83">6' 11"</option>
		<option value="82">6' 10"(208cm)</option>
		<option value="81">6' 9"</option>
		<option value="80">6' 8"(203cm)</option>
		<option value="79">6' 7"</option>
		<option value="78">6' 6"(198cm)</option>
		<option value="77">6' 5"</option>
		<option value="76">6' 4"(193cm)</option>
		<option value="75">6' 3"</option>
		<option value="74">6' 2"(188cm)</option>
		<option value="73">6' 1"</option>
		<option value="72">6'(183cm)</option>
		<option value="71">5' 11"</option>
		<option selected="selected" value="70">5' 10"(178cm)</option>
		<option value="69">5' 9"</option>
		<option value="68">5' 8"(173cm)</option>
		<option value="67">5' 7"</option>
		<option value="66">5' 6"(168cm)</option>
		<option value="65">5' 5"</option>
		<option value="64">5' 4"(163cm)</option>
		<option value="63">5' 3"</option>
		<option value="62">5' 2"(157cm)</option>
		<option value="61">5' 1"</option>
		<option value="60">5'(152cm)</option>
		<option value="59">4' 11"</option>
		<option value="58">4' 10"(147cm)</option>
		<option value="57">4' 9"</option>
		<option value="56">4' 8"(142cm)</option>
		<option value="55">4' 7"</option>
		<option value="54">4' 6"(137cm)</option>
		<option value="53">4' 5"</option>
		<option value="52">4' 4"(132cm)</option>
		<option value="51">4' 3"</option>
		<option value="50">4' 2"(127cm)</option>
		<option value="49">4' 1"</option>
		<option value="48">4'(122cm)</option>
		</select>
      </div>
	</div> 
	<div class="col-xs-3">
	  <div class="input-group">
		<span class="input-group-addon">Weight</span>
		<select name="weight" class="form-control">
		<option value=""> </option>
		 <?php for($i=300; $i>=40; $i-- ){?>
		    <option <?php if($i/2 == 50){ echo "selected=selected";}?> value="<?php echo $i; ?>">
		    <?php echo $i; ?>lb (<?php echo $i/2; ?>kilo)</option>
		 <?php } ?>			 
		</select>
	  </div>
	</div>
	</div>
	</div>

	<div class="row"> 
	<div class="col-xs-12"> 
	<div class="col-xs-3">
	  <div class="input-group">
	    <span class="input-group-addon">Profession</span>
	    <input type="text" value="" name="profession" class="form-control">
      </div>
	</div> 
	<div class="col-xs-3">
	  <div class="input-group">
	    <span class="input-group-addon">Country</span>
	    <select name="country" id="country" class="form-control">
	    	<option value="">select</option>
	    	<?php
	    		foreach ($allcountry as $row) {
	    			echo "<option value='".$row['country_name']."'>".$row['country_name']."";
	    		}
	    	?>
	    </select>
	    <!-- <input type="text" value="" name="country" class="form-control"> -->
	   
		
      </div>
	</div> 

	<div class="col-xs-3">
	  <div class="input-group">
	    <span class="input-group-addon">State</span>

			<select name="city" id="city" class="form-control">
				<option>select</option>
			</select>

	    <!-- <input type="text" value="" name="city" class="form-control"> -->
      </div>
	</div>

	<div class="col-xs-3" id="city_label" style="display: none;">
	  <div class="input-group">
	    <span class="input-group-addon">City</span>
	     <input type="text" value="" name="other_city" id="other_city" class="form-control">
      </div>
	</div> 
	<div id="city_space" style="display: none;">&nbsp;</div>
	<div class="col-xs-3">
	  <div class="input-group">
		<span class="input-group-addon">Phone No.</span>
		<input type="text" value="" name="phoneno" class="form-control">
	  </div>
	</div>
	</div>
	</div>

	<div class="row"> 
	<div class="col-xs-12"> 
	<div class="col-xs-3">
	  <div class="input-group"> 
	    <span class="input-group-addon">Password</span>
	    <input type="password" value="" name="password" id="password" class="form-control">
      </div>
	</div> 
	<div class="col-xs-3">
	  <div class="input-group">
		<span class="input-group-addon">Confirm</span>
		<input type="password" onblur="check_unique_password(this.value);" value="" name="pw_confirm" id="pw_confirm" class="form-control">
       </div>
	</div> 
	<div class="col-xs-3">
	  <div class="input-group">
		<span class="input-group-addon">Email</span>
		<input type="email" id="email" onblur="check_unique_user_email(this.value);" value="" name="email" class="form-control">
      </div>
	</div> 
	<div class="col-xs-3">
	  <div class="input-group">
		<span class="input-group-addon">Confirm</span>
		<input type="email" value="" onblur="unique_email_confirm(this.value);" name="email_confirm" id="email_confirm" class="form-control">
	  </div>
	</div>
	</div>
    </div>
	<div class="row">
	<div class="col-xs-3">
	  <div class="input-group">
	    <span class="input-group-addon">Religion</span>
			<select name="religion" id="religion" class="form-control">
				<option>select</option>
				<option value="christianity">Christianity</option>
				<option value="islam">Islam</option>
				<option value="nonreligious">Nonreligious</option>
				<option value="hinduism">Hinduism</option>
				<option value="chinese">Chinese</option>
				<option value="buddhism">Buddhism</option>
				<option value="sikhism">Sikhism</option>
				<option value="judaism">Judaism</option>
				<option value="zoroastrianism">Zoroastrianism</option>
				<option value="primal_indigenous">Primal-indigenous</option>
			</select>	    
      </div>
	</div>
	
	<div class="col-xs-3">
		<div class="input-group">
		<span class="input-group-addon">Coworker</span>
			<select name="coworker" id="coworker" class="form-control">
				<option>select</option>
				<option value="coworker">Coworker</option>
				<option value="classmate">Classmate</option>					
			</select>	    
		</div>
	</div>
	</div>



    </div>
    <div class="click-box">
      <p>Click on the bottons to add details</p>
     	
     <!-- <button class="btn-box" id="edu-btn1">Education</button>-->
      <a href="#" class="btn-box" id="edu-btn1">Education</a>
      <!--<input type="hidden" id="education" name="education">-->
      <a href="#" class="btn-box"  id="work-btn1">Work history</a>
      <input type="hidden" id="workhistory" name="workhistory">
    </div> 
	</div>
	</div>




	<div class="info">
	<div class="sect soi">
	<div class="sect_title">
	Please check the boxes that you find interesting
	<div class="small">for better Results</div>
	</div> 



	<div class="col">
	<?php 
		$n = sizeof($cells);
		foreach($cells as $rows)
		{
			$id=$rows['id'];
			 for($i=1; $i <= 1; $i++){?>
				<label class="interest" style="display: block;">
				<input type="checkbox" name="cell_name[]" value="<?php echo $rows['cell_id']?>" >
				<?php
					echo $rows['cell_name'];
					echo "</label>";
				?>  
				<?php  if(($n % $i) == 0) {
		   echo "</div>
		   		<div class='col'>";
			} ?>
			 <?php }
		}
	 ?> 
	</div> 



	</div>

	<div class="sect about">
	<div class="sect_title">About</div>
	<textarea class="text" name="bio"></textarea>
	</div>
	<div class="buttons">
	<input type="submit" name="submit" id ='submit' value="Register" class="save">
	</div>
	</div>
</div>
	</form>

<script type="text/javascript">
	$('document').ready(function(){
		$('#country').change(function(){
			var countrynm=$('#country').val();
			$.ajax({
	         	type:"POST",
	        	url:"get-cityajax.php",
	        	data:{countrynm:countrynm},
	        	success:function(result){
	        		//alert(result);
					$("#city").html(result);
	        	}
        	});
		});	

		$("#datetime").datetimepicker({
			format: 'Y/MM/DD',
    		maxDate: moment().add(-18, 'years')
		});

		
		$( "#city" ).change(function() {
			var cityVal = $('#city').val();
		  	
			if(cityVal == 'other'){				
				$('#city_label').show();
				$('#city_space').show();
			}else{
				$('#city_label').hide();
				$('#city_space').hide();
			}
		});
		
	});

	function check_unique_user_email(emailVal){
		$.ajax({
	         	type:"POST",
	        	url:"get-cityajax.php",	        	
	        	data: {'action': 'userEmail','email':emailVal},
	        	success:function(result){	        		
	        		if(result == 1){	  
	        			alert('Email already exists.') 
	        			$('#email').val('');     			
	        			$('#email').focus();
	        			return false;
	        		}					
	        	}
        	});
	}

	function check_unique_user(userVal){
		$.ajax({
	         	type:"POST",
	        	url:"get-cityajax.php",	        	
	        	data: {'action': 'user','username':userVal},
	        	success:function(result){	        		
	        		if(result == 1){	  
	        			alert('Username already exists.') 
	        			$('#username').val('');     			
	        			$('#username').focus();
	        			return false;
	        		}					
	        	}
        	});
	}

	function unique_email_confirm(confirmEmail){
		var email = $('#email').val();		
		if(email != confirmEmail){
			alert('Emailid do not match.');
			$('#email_confirm').val('');     			
	        $('#email_confirm').focus();
	        return false;
		}
	}

	function check_unique_password(confirmPassword){
		var password = $('#password').val();			
		if(password != confirmPassword){
			alert('Confirm password do not match.');
			$('#pw_confirm').val('');
	        $('#pw_confirm').focus();
	        return false;
		}
	}
	
</script>



<?php
	unset($_SESSION['sblock']);
	unset($_SESSION['error_msg']);
	unset($_SESSION['success_msg']);

?>


<script type="text/javascript">
    //$("#datetime").datetimepicker({format: 'Y/MM/DD'});
</script>


	<script src="admin/bower_components/jquery-validation/jquery.validate.js"></script>
	<script src="js/add-singup.js"></script> 

	<script>
		$(document).ready(function () {
			//alert();
			$("#submit").click(function(){
			    if($('#signupform').find('input[type=checkbox]:checked').length == 0)
			    {
			        alert('Please select atleast one checkbox');
			        return false;
			    }
			});
		});
	</script>
<script>
function myFunction() {
    var txt;
    var person = prompt("Please enter education:");
    if (person == null || person == "") {
        txt = "";
    } else {
        txt =person ;
    }
    document.getElementById("education").value = txt;
}
</script>
<script>
function myFunction1() {
    var txt;
    var person = prompt("Please enter workhistory:");
    if (person == null || person == "") {
        txt = "";
    } else {
        txt =person ;
    }
    document.getElementById("workhistory").value = txt;
}
</script>
