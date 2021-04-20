<?php
//session_start();
require_once "include/config.php";
require_once "include/functions.php";
//echo $_SERVER['HTTP_HOST'];
	if ($_SERVER['HTTP_HOST'] == "localhost") {

	$SERVER = 'localhost';
	$USERNAME = 'root';
	$PASSWORD = '';
	$DATABASE = 'codesevenstudio';
} else {
	$SERVER = 'localhost';
	$USERNAME = 'zuuboxco_eli';
	$PASSWORD = 'Qawsed@123';
	$DATABASE = 'zuuboxco_DB';
}

	$con = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE) or die('Oops connection error -> ' . mysqli_error($con));
		
try {
	$query = "SELECT * FROM tbl_singup WHERE id != '".$_SESSION['user_id']."' ORDER BY id DESC";
	$result = mysqli_query($con, $query);
	$iNumRows = mysqli_num_rows($result);
	if ($iNumRows > 0) {
		while ($data = mysqli_fetch_assoc($result)) {
			$aUserData[] = $data;
		}
	} else {
		$_SESSION['sessionMsg'] = "No Data Found";
	}

} catch (Exception $e) {
	echo "Error" . $e->getMessage();
}
$condition = "`id`=" . $uid;
$getcell = $user->select_records('tbl_singup', '*', $condition);

foreach ($getcell as $row) {
	$cellno = $row['cell_id'];
}

?>

<link rel="stylesheet" href="css/post.css">
<style type="text/css">
	.post .user-head .user-links { display: block; }
	.post .user-head .user-links a { color:#000; border-radius: 5px; border:1px solid #000; background: #fff; padding:5px 10px; margin-right: 5px; margin-left:0;}
	.post .user-head .user-links a:hover { color:#555; }
	.post .user-head .user-links a:last-child { border:1px solid #000; }
	.cmn{padding:5px 6px !important;}

</style>
<form class="profile" method="post" enctype="multipart/form-data">
<div class="window-btn window-btn2">
    <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
</div>
	<!-- <button class="close-btn pull-right" style="    top: -2px;
    right: -1px;">x</button> -->
    <div class="post-left">
	    <div class="user-head">
	    	
    	<div style="float: left;">
    	<h3>User</h3>
    	<div class="user-links">
	    	<a href="#" class="cmn">Add </a> <a  class="cmn" href="#">Edit</a>
	    	<a  class="cmn" id="myFrdnew2">My Friends </a> 
	    	<a id="friend_request"  class="cmn">Friend Request </a> 
			<a id="bookmarkedId2"  class="cmn" style="line-height: 1.5;">Bookmark Users </a> 
			<a id="messagesdId2"  class="cmn">Messages </a> 
		</div>
		</div>
					   
		

	    </div>

		  <div style="clear: both"></div>  	
		 
		<div class="post-scroll">
		   <div class="post-viwe">

		   <?php for ($i = 1; $i <= 1; $i++) {
			foreach ($aUserData as $val) {
			$query = "SELECT f_id FROM tbl_friend WHERE f_id = '".$val['id']."' and u_id = '".$_SESSION['user_id']."' ";
		    $result = mysqli_query($con, $query);
		    $getUser = mysqli_fetch_assoc($result);	

		    $qry = "SELECT f_id FROM tbl_bookmark WHERE f_id = '".$val['id']."' and u_id = '".$_SESSION['user_id']."'";
		    $resultBook = mysqli_query($con, $qry);
		    $getBookMark = mysqli_fetch_assoc($resultBook);    
		?>
		
		<div class="user-box">
	 	<div style="width: 115px;margin: 5px; display: inline-block; float: left; vertical-align: top;">
		    <div class="col-left user-img" style="margin:0 0 5px 0;">
		  	<?php if ($val['profile_path'] != '') {?>
			<a href="" class="frdprofile" id="<?php echo $val['id']; ?>"><img src="<?php echo $val['profile_path'] ?>" class="img-responsive"></a>
			<?php } else {?>
	    		<a href="" class="frdprofile" id="<?php echo $val['id']; ?>"><img src='img/user.png' class='img-responsive'></a>
	    	<?php }	?>
			</div>
			<?php 
			if(!empty($getUser['f_id'])){ ?>				
				<div class="col-left user-img" style="width: 100%; margin:0 0 5px 0; color: green"><b>Friend</b></div>
			<?php }else{?>
				<div id="<?php echo "K_". $val['id']; ?>" class="col-left user-img addfriend" style="width: 100%; margin:0 0 5px 0; cursor: pointer;">Add to friend`s gallery</div>

			<?php }?>
			
		</div>

			       <div class="col-left user-info" style="position: relative;">
			       	<div style=" position: absolute; right:0; top:0; width: 75px;">
			   		<a href="#" id="<?php  echo "MSG_". $val['id']; ?>" style="font-size:11px; border:1px solid #000; display: block; margin-bottom: 5px; color:green; padding:5px;" class="msgtofriend" >Message Me </a>

			   <div>&nbsp;</div>
				<?php 
				if(!empty($getBookMark['f_id'])){?>
			     <a href="#" style="font-size:11px; border:1px solid #000; display: block; margin-bottom:5px; color:red; padding:1px; color: green; cursor: text;"><b>Bookmarked</b></a>
				<?php }else{?>
				<a id="<?php  echo "MK_". $val['id']; ?>" class="bookmark" href="#" style="font-size:11px; border:1px solid #000; display: block; margin-bottom:5px; color:red; padding:5px;"> Bookmark </a>
				<?php }?>

			   </div>
			       	<a href="" class="frdprofile" id="<?php echo $val['id']; ?>">
						<h3><?php echo $val['username']; ?></h3>
						<label class="col-xs-6"> Name <span>
								<?php echo ($val['is_firstname_visible'] == 1)?$val['first_name']:"-";?></span>
							</a>

						</label>
						<label class="col-xs-6"> Sure name - Given name <span>
							<?php echo ($val['is_lastname_visible'] == 1)?$val['last_name']:"-";?></span>
						</label>

						<label class="col-xs-3">Gender  <span>
							<?php echo ($val['is_gender_visible'] == 1)?$val['gender']:"-";?>
						</label>
						<label class="col-xs-3">height  <span>
							<?php echo ($val['is_height_visible'] == 1)?$val['height']:"-";?></span>
						</label>
						<label class="col-xs-3">weight <span>
							<?php echo ($val['is_weight_visible'] == 1)?$val['weight']:"-";?></span>
						</label>

						<label class="col-xs-12">Profession <span>
							<?php echo ($val['is_profession_visible'] == 1)?$val['profession']:"-";?></span>
						</label>
						<label class="col-xs-3">State <span>
							<?php echo ($val['is_city_visible'] == 1)?$val['city']:"-";?></span>
						</label>
						<label class="col-xs-3">City <span>
							<?php echo ($val['is_othercity_visible'] == 1)?$val['other_city']:"-";?></span>
						</label>
						<label class="col-xs-3">Country  <span>
							<?php echo ($val['is_country_visible'] == 1)?$val['country']:"-";?></span>
						</label>

			       </div>

			     </div>


		    <?php
}
}
?>
		   </div>
		</div>
	</div>
	<div class="post-right">
	    <div class="user-filter">
		    <div class="filter-top">
		    	<h4> User </h4>
		    	<p>Please click all that apply</p>
		    </div>

			<div class="filter-box user-filter-box">
				
				<div class="row">
					<div class="col-xs-8">
						<div>
							<input type="checkbox" name="myfriend" id="myfriend" class="chk"  > My Friends
						</div>
						<div>
							<input type="checkbox" name="mybookmarkfrnd" id="mybookmarkfrnd" class="chk"  > Bookmark Users
						</div>
						<div>
							<input type="checkbox" name="mymsg" id="mymsg" class="chk" > Messages
						</div>	
					   <div class="check">
							<input type="checkbox" name="cellintrest" id="cellintrest" class="chk" onclick="checkintrest(this.value);" > Interest 
						</div>
						<div>
							<input type="checkbox" name="searchmale" id='searchmale' value="male" class="chk" onclick="checkmale(this.value);"> Male
						</div>
							<div>
							<input type="checkbox" name="searchfemale" id='searchfemale' value="female" class="chk" onclick="checkfemale(this.value);"> Female </div>	
							<div style="width: 200px;">							
							<input name="searchageuser" id='searchageuser' type="checkbox" class="chk" onclick="checkAge(this.value);"> Age</div>
							
							<div style="width: 200px;">
							<input type="checkbox" name="cellcoworker" id='cellcoworker' class="chk" onclick="checkcoworker(this.value);"> Coworker/Classmate</div>

							<div style="width: 200px;">							
							<input name="cellreligion" id='cellreligion' type="checkbox" class="chk" onclick="checkreligion(this.value);"> Religion</div>
							
							<div>
							<input type="checkbox" name="lastloging" id='lastloging' class="chk" onclick="checklastloging(this.value);"> Last logged in </div>
							<div>

				        </div>
					</div>
					<div class="col-xs-4 drop-padding">
				        <div class="percentagelist" >
				        	<div>
				        		<label class="drop-list">Cell Percent</label>
				        		<select name="percetage" id="percetage" class="form-control less-padding-drop">
				        			<option value="100">100</option>
				        			<option value="90">90</option>
				        			<option value="80">80</option>
				        			<option value="70">70</option>
				        			<option value="60">60</option>
				        			<option value="50">50</option>
				        			<option value="40">40</option>
				        			<option value="30">30</option>
				        			<option value="20">20</option>
				        			<option value="10">10</option>
				        		</select>
				        	</div>
				        </div>
				    </div>
				     
				    <div class="col-xs-4 drop-padding">
				        <div class="religionlist" >
				        	<div>
				        		<label class="drop-list">Religion</label>				        		
									<select name="religion" id="religion" class="form-control less-padding-drop" >
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
				    </div>
				    <div class="col-xs-4 drop-padding">
				        <div class="coworkerlist" >
				        	<div>
				        		<label class="drop-list" style="">Coworker / Classmate</label>
				        		<select name="coworker" id="coworker" class="form-control less-padding-drop">
									<option>select</option>
									<option value="coworker">Coworker</option>
									<option value="classmate">Classmate</option>					
								</select>	
				        	</div>
				        </div>
				    </div>

				    <div class="col-xs-4 drop-padding">
				        <div class="agelist" >
				        	<div>
				        		<label class="drop-list" style="">Age</label>
				        		<select name="age_limit_post" id="age_limit_post" class="form-control less-padding-drop">
									<option>select</option>
									<option value="1">18 to 23</option>
									<option value="2">21 to 35</option>
									<option value="3">35 to 45</option>
									<option value="4">45 to 70</option>
									<option value="5">70 to 90</option>
									<option value="6">90 to 125</option>				
								</select>	
				        	</div>
				        </div>
				    </div>
				</div>
				
		        <div class="bar">

		        </div>
		        <div class="input-group">
                   <input type="text" name="search" id="search" class="form-control">
                   <!--<div class="input-group-btn">
                     <input type="button" name=""  class="btn" value="Search">
                   </div>-->
		        </div>
			</div>
        </div>

        <div class="search-result">

           <h3>Search Result</h3>

           <div class="post-scroll">

           	<div id='usersearch'>

		   <div class="post-viwe">

		   <?php for ($i = 1; $i <= 1; $i++) {
				foreach ($aUserData as $val) {
		?>
			     <div class="user-box">
			       <div class="col-left user-img">
			      	<?php if ($val['avitor_image'] != '') {

			?>
			       		<a href="" class="frdprofile" id="<?php echo $val['id']; ?>">
			      		<img src="<?php echo $val['avitor_image'] ?>" class="img-responsive">
			      	</a>

			        <?php
} else {?>
			    		<a href="" class="frdprofile" id="<?php echo $val['id']; ?>">
			    		<img src='img/user.png' class='img-responsive'>
			    	</a>
			    	<?php
}
		?>

			       </div>


			       <div class="col-left user-info">
			       	<a href="" class="frdprofile" id="<?php echo $val['id']; ?>">
						<h3><?php echo $val['username']; ?></h3>
					</a>
						<label class="col-xs-6"> Name <span>

							<?php echo $val['first_name']; ?></span>
						</label>
						<label class="col-xs-6"> Sure name - Given name <span>
							<?php echo $val['last_name']; ?></span>
						</label>

						<label class="col-xs-3">Gender  <span>
							<?php echo $val['gender']; ?></span>
						</label>
						<label class="col-xs-3">height  <span>
							<?php echo $val['height']; ?></span>
						</label>
						<label class="col-xs-3">weight <span>
							<?php echo $val['weight']; ?></span>
						</label>

						<label class="col-xs-12">Profession <span>
							<?php echo $val['profession']; ?></span>
						</label>
						<label class="col-xs-3">City <span>
							<?php echo $val['city']; ?></span>
						</label>
						<label class="col-xs-3">City <span>
							<?php echo $val['other_city']; ?></span>
						</label>
						<label class="col-xs-3">Country  <span>
							<?php echo $val['country']; ?></span>
						</label>

			       </div>

			     </div>

		     <?php
}
}
?>
		   </div>
		   </div>
		</div>

	 </div>
        </div>
	</div>

</form>
<script type="text/javascript">
	
	/*
$('.user-filter-box input[type="checkbox"]').click(function(){
	console.log("fdhdfhfh");
	var cells = '<?php //echo $cellno; ?>';

	if ($('#cellintrest').prop("checked") == true){
		$("#percetage").change(function(){
	       	var percentage = $("#percetage option:selected").val();
	    });
	}else{
		var percentage = "";
	}

	if ($('#searchmale').prop("checked") == true){
		var searchmale = 'male';
	}
	else
	{
		var searchmale ='';
	}

	if ($('#searchfemale').prop("checked") == true){
		var searchfemale = 'female';
	}
	else
	{
		var searchfemale ='';
	}

	if ($('#searchageuser').prop("checked") == true){
		$("#age_limit_post").change(function(){
	       	var age_limit = $("#age_limit_post option:selected").val();
	    });
	}else{
		var age_limit = "";
	}

	if ($('#cellcoworker').prop("checked") == true){
		$("#coworker").change(function(){
	       	var searchcoworker = $("#coworker option:selected").val();
	    });
	}else{
		var searchcoworker = "";
	}

	if ($('#cellreligion').prop("checked") == true){
		$("#religion").change(function(){
	       	var religion = $("#religion option:selected").val();
	    });
	}else{
		var religion = "";
	}

	$.ajax({
 			type:"POST",
			url:"post_searchajaxinterst.php",
			data:{age_limit:age_limit,percentage:percentage,cells:cells,searchfemale:searchfemale,searchmale:searchmale,searchcoworker:searchcoworker,religion:religion},
			success:function(result){
			//	alert(result);
			//alert('post_searchajaxinterst/cell Interest clicked');
			$("#usersearch").html(result);
			}
	});
    return false;
});
*/				// $('.frdprofile').click(function(){
				// 	var uid = $(this).attr('id');
				// 		$.ajax({
			 //         		type:"POST",
			 //        		url:"frdsprofile.php",
			 //        		data:{id:uid},
			 //        			success:function(result){
			 //            		$('.frdsprofile').html(result);
				// 				$('.frdsprofile .frdsprofile').show();
			 //            		$('.post .profile').hide();
			 //        		}
			 //       		 });
				// 		return false;
				// });


					$('.frdprofile').click(function(){
					var uid = $(this).attr('id');
						$.ajax({
			         		type:"POST",
			        		url:"profile.php",
			        		data:{id:uid},
			        			success:function(result){
			            		$('.frdsprofile').html(result);
			            		$('.friend .profile').hide();
			            		$('.post .profile').hide();
								$('.frdsprofile .frdsprofile').show();
			            		
			            		$('.frdsprofile').css('display','block');

			        		}
			       		 });
						return false;
					});
			</script>


<!--///////////////////////////////////////////////////-->
<script type="text/javascript">
	$('.percentagelist').hide();
	$('.coworkerlist').hide();
	$('.religionlist').hide();
	$('.agelist').hide();
	$('input[type="checkbox"]').click(function(){

		if ($('#myfriend').prop("checked") == true){
			var myfriend = 'myfriend';
		}
		else
		{
			var myfriend ='';
		}

		if ($('#mybookmarkfrnd').prop("checked") == true){
			var mybookmark = 'mybookmark';
		}
		else
		{
			var mybookmark ='';
		}

		if ($('#mymsg').prop("checked") == true){
			var mymsg = 'mymsg';
		}
		else
		{
			var mymsg ='';
		}
	
		if ($('#cellintrest').prop("checked") == false)
		{			
			$('.percentagelist').hide();
			if ($('#lastloging').prop("checked") == true){
				var lastlog = 'lastlogin';
			}
			else
			{
				var lastlog ='';
			}

			if($('#searchfemale').prop("checked") == true){
				var searchfemale = 'female';
			}
			else
			{
				var searchfemale = '';
			}

			if($('#searchmale').prop("checked") == true){
				var searchmale = 'male';
			}
			else
			{
				var searchmale = '';
			}

			
			if($('#cellreligion').prop("checked") == true){
				var searchreligion = $('#religion').val();

			}else{
				var searchreligion = '';
			}
				
			if($('#cellcoworker').prop("checked") == true){
				var searchcoworker = $('#coworker').val();
			}else{
				var searchcoworker = '';
			}

			

 			//var cells = '<?php echo $cellno; ?>';

			 $.ajax({
         				type:"POST",
        				url:"post_searchajax.php",
        				data:{myfriend:myfriend, mybookmark:mybookmark, mymsg:mymsg, lastlog:lastlog,searchmale:searchmale,searchfemale:searchfemale,searchreligion:searchreligion,searchcoworker:searchcoworker},
        				success:function(result){
        					//alert('post_searchajax/cell Interest not clicked');
        					//console.log(result);
	        				$("#usersearch").html(result);
        				}
       				 });

		}
		else
		{			
			//$('.percentagelist').show();

			if($('#searchfemale').is(":checked")){

			var searchfemale = 'female';
			}
			else
			{
				var searchfemale = '';
			}

			if($('#searchmale').is(":checked")){
				var searchmale = 'male';
			}
			else
			{
				var searchmale = '';
			}
			
			if($('#cellreligion').prop("checked") == true){
				var religion = $('#religion').val();
			}else{
				var religion = '';
			}
				
			if($('#searchageuser').prop("checked") == true){
				var age_limit = $('#age_limit_post').val();
			}
			else{
				var age_limit = '';
			}



			    $("#percetage").change(function(){

			       	var percentage = $("#percetage option:selected").val();
	        		var cells = '<?php echo $cellno; ?>';
	        		//var age_limit = $("#age_limit_post option:selected").val();
			       	
                        $.ajax({
			         			type:"POST",
			        			url:"post_searchajaxinterst.php",
			        			data:{myfriend:myfriend, mybookmark:mybookmark, mymsg:mymsg,age_limit:age_limit,percentage:percentage,cells:cells,searchfemale:searchfemale,searchmale:searchmale,searchcoworker:searchcoworker,religion:religion},
			        			success:function(result){
			        			//	alert(result);
    							//alert('post_searchajaxinterst/cell Interest clicked');
			        			$("#usersearch").html(result);
			        			}
			       			 });
                        return false;

			    });

			  		var percentage = $("#percetage option:selected").val();
					//var age_limit = $("#age_limit_post option:selected").val();
			       	
	        		var cells = '<?php echo $cellno; ?>';
                        $.ajax({
			         			type:"POST",
			        			url:"post_searchajaxinterst.php",
			        			data:{myfriend:myfriend, mybookmark:mybookmark, mymsg:mymsg,age_limit:age_limit,percentage:percentage,cells:cells,searchfemale:searchfemale,searchmale:searchmale,searchcoworker:searchcoworker,religion:religion},
			        			success:function(result){
			        				//alert(result);
			        				$("#usersearch").html(result);
			        			}
			       			 });

				       			 

		}

////////////////////////////////////////////////////////////////////////////////////


		if ($('#cellreligion').prop("checked") == false)
		{
			$('.religionlist').hide();				
			
			if ($('#lastloging').prop("checked") == true){
					var lastlog = 'lastlogin';
				}
				else
				{
					var lastlog ='';
				}

				if($('#searchfemale').prop("checked") == true){
				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale').prop("checked") == true){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}

				
				if($('#cellreligion').prop("checked") == true){
					var searchreligion = $('#religion').val();
				}else{
					var searchreligion = '';
				}
				
				if($('#cellcoworker').prop("checked") == true){
					var searchcoworker = $('#coworker').val();
				}else{
					var searchcoworker = '';
				}

				if ($('#myfriend').prop("checked") == true){
					var myfriend = 'myfriend';
				}
				else
				{
					var myfriend ='';
				}

				if ($('#mybookmarkfrnd').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}

	 			var cells = '<?php echo $cellno; ?>';

				 $.ajax({
	         				type:"POST",
	        				url:"post_searchajax.php",
	        				data:{myfriend:myfriend, mybookmark:mybookmark, mymsg:mymsg, lastlog:lastlog,cells:cells,searchmale:searchmale,searchfemale:searchfemale,searchreligion :searchreligion,searchcoworker :searchcoworker},
	        				success:function(result){
        						//alert('post_searchajax/religion not clicked');
	        					//console.log(result);
		        				$("#usersearch").html(result);
	        				}
	       				 });

		}
		else
		{

			$('.religionlist').show();
			if($('#searchfemale').is(":checked")){

			var searchfemale = 'female';
			}
			else
			{
				var searchfemale = '';
			}

			if($('#searchmale').is(":checked")){
				var searchmale = 'male';
			}
			else
			{
				var searchmale = '';
			}

			/*if($('#cellreligion').prop("checked") == true){
				var religion = $('#religion').val();
			}else{
				var religion = '';
			}*/

			if($('#searchageuser').prop("checked") == true){
				var age_limit = $('#age_limit_post').val();
			}else{
				var age_limit = '';
			}

			if ($('#myfriend').prop("checked") == true){
				var myfriend = 'myfriend';
			}
			else
			{
				var myfriend ='';
			}

			if ($('#mybookmarkfrnd').prop("checked") == true){
				var mybookmark = 'mybookmark';
			}
			else
			{
				var mybookmark ='';
			}

			if ($('#mymsg').prop("checked") == true){
				var mymsg = 'mymsg';
			}
			else
			{
				var mymsg ='';
			}

				    $("#religion").change(function(){

				       	var coworker = $("#coworker option:selected").val();
				       	//var age_limit = $("#age_limit_post option:selected").val();
				       	
				       	var religion = $('#religion').val();

				       	var cells = '<?php echo $cellno; ?>';

		        		$.ajax({
		         			type:"POST",
		        			url:"post_searchajaxinterst.php",
		        			data:{myfriend:myfriend, mybookmark:mybookmark, mymsg:mymsg,age_limit:age_limit,religion:religion,cells:cells,searchfemale:searchfemale,searchmale:searchmale,searchcoworker:searchcoworker},
		        			success:function(result){
	        					//alert('post_searchajaxinterst/religion clicked');
		        			//	alert(result);
		        			$("#usersearch").html(result);
		        			}
		       			 });
	                        return false;

				    });		

				var coworker = $("#coworker option:selected").val();
				//var age_limit = $("#age_limit_post option:selected").val();
		       	var religion = '';
				var cells = '<?php echo $cellno; ?>';
                $.ajax({
	         			type:"POST",
	        			url:"post_searchajaxinterst.php",
	        			data:{myfriend:myfriend, mybookmark:mybookmark, mymsg:mymsg, age_limit:age_limit,religion:religion,cells:cells,searchfemale:searchfemale,searchmale:searchmale,searchcoworker:searchcoworker},
	        			success:function(result){
        					//alert('post_searchajaxinterst/religionclicked but');
	        			//	alert(result);
	        			$("#usersearch").html(result);
	        			}
	       			 });

		}

////////////////////////////////////////////////////////////////////////////////////


		if ($('#cellcoworker').prop("checked") == true)
		{		
			//$('.coworkerlist').show();

			if($('#searchfemale').is(":checked")){

				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale').is(":checked")){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}
				if($('#cellreligion').prop("checked") == true){
					var religion = $('#religion').val();
				}else{
					var religion = '';
				}

				if($('#searchageuser').prop("checked") == true){
					var age_limit = $('#age_limit_post').val();
				}else{
					var age_limit = '';
				}

				if ($('#myfriend').prop("checked") == true){
					var myfriend = 'myfriend';
				}
				else
				{
					var myfriend ='';
				}

				if ($('#mybookmarkfrnd').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}
				    $("#coworker").change(function(){

				       	var coworker = $("#coworker option:selected").val();
				       	//var age_limit = $("#age_limit_post option:selected").val();
				       	
		        		var cells = '<?php echo $cellno; ?>';
	                        $.ajax({
				         			type:"POST",
				        			url:"post_searchajaxinterst.php",
				        			data:{age_limit:age_limit,searchcoworker:coworker,cells:cells,searchfemale:searchfemale,searchmale:searchmale,religion:religion},
				        			success:function(result){
        					//alert('post_searchajaxinterst/coworker clicked');
				        			//	alert(result);
				        			$("#usersearch").html(result);
				        			}
				       			 });
	                        return false;

				    });		

				    var coworker = $("#coworker option:selected").val();
					//var age_limit = $("#age_limit_post option:selected").val();
				       	
	 				var cells = '<?php echo $cellno; ?>';
                        $.ajax({
			         			type:"POST",
			        			url:"post_searchajaxinterst.php",
			        			data:{myfriend:myfriend, mybookmark:mybookmark, mymsg:mymsg,age_limit:age_limit,searchcoworker:coworker,cells:cells,searchfemale:searchfemale,searchmale:searchmale,religion:religion},
			        			success:function(result){
        					//alert('post_searchajaxinterst/coworker not clicked');
			        			//	alert(result);
			        			$("#usersearch").html(result);
			        			}
			       			 });	

		}
		else
		{
			$('.coworkerlist').hide();

			if ($('#lastloging').prop("checked") == true){
				var lastlog = 'lastlogin';
				}
				else
				{
					var lastlog ='';
				}

				if($('#searchfemale').prop("checked") == true){
				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale').prop("checked") == true){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}

				
				if($('#cellreligion').prop("checked") == true){
					var searchreligion = $('#religion').val();
				}else{
					var searchreligion = '';
				}
				
				if($('#cellcoworker').prop("checked") == true){
					var searchcoworker = $('#coworker').val();
				}else{
					var searchcoworker = '';
				}

				if ($('#myfriend').prop("checked") == true){
					var myfriend = 'myfriend';
				}
				else
				{
					var myfriend ='';
				}

				if ($('#mybookmarkfrnd').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}

	 			//var cells = '<?php echo $cellno; ?>';

				 $.ajax({
	         				type:"POST",
	        				url:"post_searchajax.php",
	        				data:{myfriend:myfriend, mybookmark:mybookmark, mymsg:mymsg, lastlog:lastlog,searchmale:searchmale,searchfemale:searchfemale,searchreligion :searchreligion,searchcoworker :searchcoworker},
	        				success:function(result){
        					//alert('post_searchajax/coworker not clicked/selected');
	        					//alert(result);
	        					//console.log(result);
		        				$("#usersearch").html(result);
	        				}
	       				 });



		}
		/////////////////////////////////////// Age /////////////////////////////////////////////////
if ($('#searchageuser').prop("checked") == true)
		{
			
			if($('#searchfemale').is(":checked")){

				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale').is(":checked")){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}
			
				if($('#cellreligion').prop("checked") == true){
					var religion = $('#religion').val();
				}else{
					var religion = '';
				}

				if ($('#myfriend').prop("checked") == true){
					var myfriend = 'myfriend';
				}
				else
				{
					var myfriend ='';
				}

				if ($('#mybookmarkfrnd').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}
				    $("#age_limit_post").change(function(){

				       	var age_limit = $("#age_limit_post option:selected").val();
				       	
		        		var cells = '<?php echo $cellno; ?>';
						//alert(age_limit);
	                        $.ajax({
				         			type:"POST",
				        			url:"post_searchajaxinterst.php",
				        			data:{myfriend:myfriend, mybookmark:mybookmark, mymsg:mymsg, age_limit:age_limit,cells:cells,searchfemale:searchfemale,searchmale:searchmale,religion:religion},
				        			success:function(result){
				        				//alert(result);
				        			$("#usersearch").html(result);
				        			}
				       			 });
	                        return false;

				    });		


				if($('#searchageuser').prop("checked") == true){
					var age_limit = $('#age_limit_post').val();
				}else{
					var age_limit = '';
				}

				if ($('#myfriend').prop("checked") == true){
					var myfriend = 'myfriend';
				}
				else
				{
					var myfriend ='';
				}

				if ($('#mybookmarkfrnd').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}
				    //var age_limit = $("#age_limit_post option:selected").val();

		 				var cells = '<?php echo $cellno; ?>';
	                        $.ajax({
				         			type:"POST",
				        			url:"post_searchajaxinterst.php",
				        			data:{myfriend:myfriend, mybookmark:mybookmark, mymsg:mymsg,age_limit:age_limit,cells:cells,searchfemale:searchfemale,searchmale:searchmale,religion:religion},
				        			success:function(result){
				        				//alert(result);
				        			$("#usersearch").html(result);
				        			}
				       			 });	

		}
		else
		{
			$('.agelist').hide();

			if ($('#lastloging').prop("checked") == true){
				var lastlog = 'lastlogin';
				}
				else
				{
					var lastlog ='';
				}

				if($('#searchfemale').prop("checked") == true){
				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale').prop("checked") == true){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}

				
				if($('#cellreligion').prop("checked") == true){
					var searchreligion = $('#religion').val();
				}else{
					var searchreligion = '';
				}
				
				if($('#searchageuser').prop("checked") == true){
					var age_limit = $('#age_limit_post').val();
				}else{
					var age_limit = '';
				}

				if ($('#myfriend').prop("checked") == true){
					var myfriend = 'myfriend';
				}
				else
				{
					var myfriend ='';
				}

				if ($('#mybookmarkfrnd').prop("checked") == true){
					var mybookmark = 'mybookmark';
				}
				else
				{
					var mybookmark ='';
				}

				if ($('#mymsg').prop("checked") == true){
					var mymsg = 'mymsg';
				}
				else
				{
					var mymsg ='';
				}

	 				//var cells = '<?php echo $cellno; ?>';

				 $.ajax({
	         				type:"POST",
	        				url:"post_searchajax.php",
	        				data:{myfriend:myfriend, mybookmark:mybookmark, mymsg:mymsg,lastlog:lastlog,searchmale:searchmale,searchfemale:searchfemale,searchreligion :searchreligion,age_limit:age_limit,searchcoworker:searchcoworker},
	        				success:function(result){
	        					//alert(result);
	        					//console.log(result);
		        				$("#usersearch").html(result);
	        				}
	       				 });
		}

		});




function checkintrest(value){
	if($('#cellintrest').prop("checked") == true){
		$('.percentagelist').show();
		// $('.coworkerlist').hide();
		// $('.religionlist').hide();
		// $('.agelist').hide();
		// $('input:checkbox[name=cellcoworker]').attr('checked',false);
		// $('input:checkbox[name=cellreligion]').attr('checked',false);
		// $('input:checkbox[name=searchmale]').attr('checked',false);
		// $('input:checkbox[name=searchfemale]').attr('checked',false);
		// $('input:checkbox[name=searchageuser]').attr('checked',false);
		// $('input:checkbox[name=lastloging]').attr('checked',false);
	}
}

function checkmale(value){
	// if($('#searchmale').prop("checked") == true){
	// 	$('.percentagelist').hide();
	// 	$('.coworkerlist').hide();
	// 	$('.religionlist').hide();
	// 	$('.agelist').hide();
	// 	$('input:checkbox[name=cellcoworker]').attr('checked',false);
	// 	$('input:checkbox[name=cellreligion]').attr('checked',false);
	// 	$('input:checkbox[name=cellintrest]').attr('checked',false);
	// 	$('input:checkbox[name=searchfemale]').attr('checked',false);
	// 	$('input:checkbox[name=searchageuser]').attr('checked',false);
	// 	$('input:checkbox[name=lastloging]').attr('checked',false);
	// }
}

function checklastloging(value){
	// if($('#lastloging').prop("checked") == true){
	// 	$('.percentagelist').hide();
	// 	$('.coworkerlist').hide();
	// 	$('.religionlist').hide();
	// 	$('.agelist').hide();
	// 	$('input:checkbox[name=cellcoworker]').attr('checked',false);
	// 	$('input:checkbox[name=cellreligion]').attr('checked',false);
	// 	$('input:checkbox[name=cellintrest]').attr('checked',false);
	// 	$('input:checkbox[name=searchfemale]').attr('checked',false);
	// 	$('input:checkbox[name=searchageuser]').attr('checked',false);
	// 	$('input:checkbox[name=searchmale]').attr('checked',false);
	// }
}

function checkfemale(value){
	// if($('#searchfemale').prop("checked") == true){
	// 	$('.percentagelist').hide();
	// 	$('.coworkerlist').hide();
	// 	$('.religionlist').hide();
	// 	$('.agelist').hide();
	// 	$('input:checkbox[name=cellcoworker]').attr('checked',false);
	// 	$('input:checkbox[name=cellreligion]').attr('checked',false);
	// 	$('input:checkbox[name=cellintrest]').attr('checked',false);
	// 	$('input:checkbox[name=searchmale]').attr('checked',false);
	// 	$('input:checkbox[name=searchageuser]').attr('checked',false);
	// 	$('input:checkbox[name=lastloging]').attr('checked',false);
	// }
}


function checkreligion(value){
	if($('#cellreligion').prop("checked") == true){
		// $('.percentagelist').hide();
		// $('.coworkerlist').hide();
		$('.religionlist').show();
		// $('.agelist').hide();
		// $('input:checkbox[name=cellintrest]').attr('checked',false);
		// $('input:checkbox[name=cellcoworker]').attr('checked',false);
		// $('input:checkbox[name=searchmale]').attr('checked',false);
		// $('input:checkbox[name=searchfemale]').attr('checked',false);
		// $('input:checkbox[name=searchageuser]').attr('checked',false);
		// $('input:checkbox[name=lastloging]').attr('checked',false);
	}
}
function checkcoworker(value){
	if($('#cellcoworker').prop("checked") == true){
		// $('.percentagelist').hide();
		$('.coworkerlist').show();
		// $('.religionlist').hide();
		// $('.agelist').hide();
		// $('input:checkbox[name=cellintrest]').attr('checked',false);
		// $('input:checkbox[name=cellreligion]').attr('checked',false);
		// $('input:checkbox[name=searchmale]').attr('checked',false);
		// $('input:checkbox[name=searchfemale]').attr('checked',false);
		// $('input:checkbox[name=searchageuser]').attr('checked',false);
		// $('input:checkbox[name=lastloging]').attr('checked',false);
	}
}
function checkAge(value){
	if($('#searchageuser').prop("checked") == true){
		$('.agelist').show();
		// $('.percentagelist').hide();
		// $('.coworkerlist').hide();
		// $('.religionlist').hide();
		// $('input:checkbox[name=cellreligion]').attr('checked',false);
		// $('input:checkbox[name=cellintrest]').attr('checked',false);
		// $('input:checkbox[name=searchmale]').attr('checked',false);
		// $('input:checkbox[name=searchfemale]').attr('checked',false);
		// $('input:checkbox[name=cellcoworker]').attr('checked',false);
		// $('input:checkbox[name=lastloging]').attr('checked',false);
	}
}

</script>

<script type="text/javascript">
	$('#search').keyup(function(){
		var search = document.getElementById('search').value;
		
		 $.ajax({
				type:"POST",
			url:"post_searchajax.php",
			data:{search:search},
			success:function(result){

				//alert(result);
				$("#usersearch").html(result);
			}
			 });

	});

$(".addfriend").click(function(){
	var cur_id =  $(this).attr('id');	
	var u_id = '<?php echo $_SESSION['user_id'];?>';	
	var f_id =  $(this).attr('id').replace('K_','');
	//alert(cur_id);
	$.ajax({
			type:"POST",
			url:"add_friend.php",
			data:{u_id:u_id,f_id:f_id},
			success:function(result){		
				$("#frend_message").html(result);
				$("#frend_message").show();
				alert('User successfully added to your friend list.');
				$("#"+cur_id).html("Friend").removeClass('addfriend');
			}
		 });
	return false;

});

$('.allFriend').click(function(){
	var u_id = '<?php echo $_SESSION['user_id'];?>';
		$.ajax({
     		type:"POST",
    		url:"my_friends.php",
    		data:{id:u_id},
    			success:function(result){
        		$('.frdsprofile').html(result);
				$('.frdsprofile .frdsprofile').show();
        		$('.post .profile').hide();
    		}
   		 });
		return false;
});


$(".bookmark").click(function(){
	var cur_id =  $(this).attr('id');	
	var u_id = '<?php echo $_SESSION['user_id'];?>';	
	var f_id =  $(this).attr('id').replace('MK_','');

	$.ajax({
			type:"POST",
			url:"add_friend.php",
			data:{action:'bookmark',u_id:u_id,f_id:f_id},
			success:function(result){		
				$("#frend_message").html(result);
				$("#frend_message").show();
				$("#"+cur_id).html("Bookmarked").css('color','green').removeClass('bookmark');
				//alert("User is successfully added to your bookmarked list.");
				// location.reload();
			}
		 });
	return false;
});



$('#messagesdId2').click(function(){
	//alert("dsfsdfsdfds");	
	$.ajax({
    	type:"POST",
    	url:"message_pop.php",    	
    		success:function(result){
       		$('.messagesd').html(result); 
       		$('.allmessage').css('display','block');
       		$('.profilepop1 .profile .sendmsgpop .frdsprofile').hide();
                $('.sendmsgpop').css('display','none'); 
                
    	}
   	});
	return false;
});

$('#friend_request').click(function(){
	//alert("dsfsdfsdfds");	
	$.ajax({
    	type:"POST",
    	url:"friend_request.php",    	
    		success:function(result){
       		$('.messagesd').html(result); 
       		$('.allmessage').css('display','block');
       		$('.profilepop1 .profile .sendmsgpop .frdsprofile').hide();
                $('.sendmsgpop').css('display','none'); 
                
    	}
   	});
	return false;
});

$('#bookmarkedId2').click(function(){	
	$.ajax({
    	type:"POST",
    	dataType: 'html',
    	url:"bookmark.php",    	
    		success:function(result){
       		$('.bookmarkf').html(result); 
       		$('.bookmarkf').css('display','block');	
       		$('.percentagelist2').hide();
       		$('.frdsprofile').hide();
			$('.religionlist2').hide();
			$('.coworkerlist2').hide();				                
    	}
   	});
	return false;
});

$('#myFrdnew2').click(function(){	
   var id = '';  
    $.ajax({
        type:"POST",
        url:"myfriend.php",
        data:{friend_gallery_id:id},
        success:function(result){
            $('.frdsprofile').hide();
            $('.bookmarkf').hide();            
            $('.allmessage').hide();
            $('.friend').html(result);
            $('.friend').show();
            $('.friend .profile').css('display','block');
        }
    });
});

</script>




