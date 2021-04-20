<?php

if(isset($_SESSION['user_id']))
{
    
}
else
{
    session_start();
}
require_once "include/config.php";
require_once "include/functions.php";
$user = new User();

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
	// $query = "SELECT * FROM tbl_singup WHERE id != '".$_SESSION['user_id']."' ORDER BY id DESC";

	$aUserData = array();

	$query = "select A.id, B.* from tbl_bookmark A LEFT JOIN tbl_singup B on B.id = A.f_id where A.u_id = '".$_SESSION['user_id']."'";

	$result = mysqli_query($con, $query);
	$iNumRows = mysqli_num_rows($result);
	if ($iNumRows > 0) {
		while ($data = mysqli_fetch_assoc($result)) {
			 //echo "<pre>";print_r($data); //die;
			// echo "hiii"."<br>";
			$aUserData[] = $data;
		}
	} else {
		$_SESSION['sessionMsg'] = "No Data Found";
	}

} catch (Exception $e) {
	echo "Error" . $e->getMessage();
}
$condition = "`id`=" . $_SESSION['user_id'];
$getcell = $user->select_records('tbl_singup', '*', $condition);

//echo "<pre>"; 
 //print_r($aUserData);
foreach ($getcell as $row) {
 	$cellno = $row['cell_id'];
}

?>

<link rel="stylesheet" href="css/bookmark.css">
<form class="bookmarkf" method="post" enctype="multipart/form-data">
	<div class="window-btn window-btn2">
	    <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window-t"></button>
	       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window-t" ></button>
	        <button type="button" class="fa fa-window-maximize" aria-hidden="true" id="restore-window-maximize-t" style="display: none"></button>
	        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-bookmark-t"></button>
	</div>
	<!-- <button class="close-btn pull-right" style="    top: -2px;
    right: -1px;">x</button> -->
    <div class="post-left">
	    <div class="user-head">
	    	<div id="frend_message" style="display: none;"></div>
	    	<h3>Bookmarked Users</h3>
	    	<a href="#">Add </a> <a href="#">Edit</a>
	    </div>
		<div class="post-scroll">
		   <div class="post-viwe">

		   <?php // for ($i = 1; $i <= 1; $i++) {
		   // 	echo "<pre>";
		   // 	print_r($aUserData); 
			foreach ($aUserData as $val) {

			$query = "SELECT f_id FROM tbl_friend WHERE f_id = '".$val['id']."'";
		    $result = mysqli_query($con, $query);
		    $getUser = mysqli_fetch_assoc($result);	

		    $qry = "SELECT f_id FROM tbl_bookmark WHERE f_id = '".$val['id']."'";
		    $resultBook = mysqli_query($con, $qry);
		    $getBookMark = mysqli_fetch_assoc($resultBook);    
		?>
		
		<div class="user-box mainbookmark">
	 	<div style="width: 115px;margin: 5px; display: inline-block; float: left; vertical-align: top;">
		    <div class="col-left user-img" style="margin:0 0 5px 0;">
		  	<?php if ($val['profile_path'] != '') {?>
			<a href="javascript:void(0)" class="frdprofile" id="<?php echo $val['id']; ?>"><img src="<?php echo $val['profile_path'] ?>" class="img-responsive"></a>
			<?php } else {?>
	    		<a href="javascript:void(0)" class="frdprofile" id="<?php echo $val['id']; ?>"><img src='img/user.png' class='img-responsive'></a>
	    	<?php }	?>
			</div>
			<?php 
			// if(!empty($getUser['f_id'])){ ?>				
				<!-- <div class="col-left user-img" style="width: 100%; margin:0 0 5px 0;">Friend</div> -->
			<?php // }else{?>
				<!-- <div id="<?php echo "K_". $val['id']; ?>" class="col-left user-img addfriend" style="width: 100%; margin:0 0 5px 0;">Add to friend`s gallery</div> -->

			<?php // } ?>
			
		</div>

			       <div class="col-left user-info" style="position: relative;">
			       	<div style=" position: absolute; right:0; top:0; width: 70px;">
			   <!-- <a  href="#" style="font-size:11px; border:1px solid #000; display: block; margin-bottom: 5px; color:green; padding:5px;">Message Me </a> -->

			   <div>&nbsp;</div>
				<?php 
				// if(!empty($getBookMark['f_id'])){?>
			     <!-- <a href="#" style="font-size:11px; border:1px solid #000; display: block; margin-bottom:5px; color:red; padding:5px;"> Bookmarked </a> -->
				<?php // }else{?>
				<!-- <a id="<?php // echo "MK_". $val['id']; ?>" class="bookmark" href="#" style="font-size:11px; border:1px solid #000; display: block; margin-bottom:5px; color:red; padding:5px;"> Bookmark </a> -->
				<?php  // }?>

			   </div>
			       	<a href="" class="frdprofile" id="<?php echo $val['id']; ?>">
						<h3><?php echo $val['username']; ?></h3>
						<label class="col-xs-6"> Name <span>
								<?php echo $val['first_name']; ?></span>
							</a>

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
						<label class="col-xs-6">State <span>
							<?php echo $val['city']; ?></span>
						</label>
						<label class="col-xs-6">City <span>
							<?php echo $val['other_city'];?></span>
						</label>
						<label class="col-xs-6">Country  <span>
							<?php echo $val['country']; ?></span>
						</label>

			       </div>

			     </div>


		    <?php
}
// }
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

			<div class="filter-box">
				
				<div class="row">
					<div class="col-xs-8">
					   <div class="check">							
							<div>
							<input type="checkbox" name="cellintrest" id="cellintrest2" class="chk" onclick="checkintrest2(this.value);" > Interest </div>
							<div>
							<input type="checkbox" name="searchmale" id='searchmale2' value="male" class="chk" onclick="checkmale2(this.value);"> Male </div>
							<div>
							<input type="checkbox" name="searchfemale" id='searchfemale2' value="female" class="chk" onclick="checkfemale2(this.value);"> Female </div>
							<div style="width: 200px;">							
							<input name="searchage" id='searChageBook' type="checkbox" class="chk" onclick="checkAgeBook(this.value);"> Age</div>
							
							<div style="width: 200px;">
							<input type="checkbox" name="cellcoworker" id='cellcoworker2' class="chk" onclick="checkcoworker2(this.value);"> Coworker/Classmate</div>

							<div style="width: 200px;">							
							<input name="cellreligion" id='cellreligion2' type="checkbox" class="chk" onclick="checkreligion2(this.value);"> Religion</div>
							
							<div style="width: 200px;">
							<input type="checkbox" name="lastloging" id='lastloging2' class="chk" onclick="checklastloging2(this.value);"> Last logged in </div>

				        </div>
					</div>
					<div class="col-xs-4 drop-padding">
				        <div class="percentagelist2" >
				        	<div>
				        		<label class="drop-list">Cell Percent</label>
				        		<select name="percetage" id="percetage2" class="form-control less-padding-drop">
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
				        <div class="religionlist2" >
				        	<div>
				        		<label class="drop-list">Religion</label>				        		
									<select name="religion" id="religion2" class="form-control less-padding-drop" >
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
				        <div class="coworkerlist2" >
				        	<div>
				        		<label class="drop-list" style="">Coworker / Classmate</label>
				        		<select name="coworker" id="coworker2" class="form-control less-padding-drop">
									<option>select</option>
									<option value="coworker">Coworker</option>
									<option value="classmate">Classmate</option>
								</select>	
				        	</div>
				        </div>
				    </div>
				    <div class="col-xs-4 drop-padding">
				        <div class="agelistbook" style="display: none;">
				        	<div>
				        		<label class="drop-list" style="">Age</label>
				        		<select name="age_limit" id="age_limit_book" class="form-control less-padding-drop">
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
                   <input type="text" name="search" id="search2" class="form-control">
                   <!-- <div class="input-group-btn">
                     <input type="button" name=""  class="btn" value="Search">
                   </div> -->
		        </div>
			</div>
        </div>

        <div class="search-result">

           <h3>Search Result</h3>

           <div class="post-scroll">

           	<div id='busersearch'>

		   <div class="post-viwe">

		   <?php for ($i = 1; $i <= 1; $i++) {
			foreach ($aUserData as $val) {
			?>
			     <div class="user-box">
			       <div class="col-left user-img">
			      	<?php if ($val['avitor_image'] != '') {

			?>
			       		<a href="javascript:void(0)" class="frdprofile" id="<?php echo $val['id']; ?>">
			      		<img src="<?php echo $val['avitor_image'] ?>" class="img-responsive">
			      	</a>

			        <?php
} else {?>
			    		<a href="javascript:void(0)" class="frdprofile" id="<?php echo $val['id']; ?>">
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
						<label class="col-xs-6">State <span>
							<?php echo $val['city']; ?></span>
						</label>
						<label class="col-xs-6">City <span>
							<?php echo $val['other_city']; ?></span>
						</label>
						<label class="col-xs-6">Country  <span>
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
	$('.mainbookmark .frdprofile').click(function(){
		var uid = $(this).attr('id');
			$.ajax({
         		type:"POST",
        		url:"profile.php",
        		data:{id:uid},
        			success:function(result){
            		$('.frdsprofile').html(result);
            		$('.bookmarkf .bookmarkf').hide();
					$('.frdsprofile .frdsprofile').show();
            		$('.friend .profile').hide();
            		$('.frdsprofile').css('display','block');
        		}
       		 });
			return false;
	});
</script>


<!--///////////////////////////////////////////////////-->
<script type="text/javascript">
	$('.percentagelist2').hide();
	$('.coworkerlist2').hide();
	$('.religionlist2').hide();
	$('.agelistbook').hide();
	$('input[type="checkbox"]').click(function(){ //  alert('ok');
		if ($('#cellintrest2').prop("checked") == false)
		{			
			console.log("false");
			// $('.percentagelist').hide();
			if ($('#lastloging2').prop("checked") == true){
				var lastlog = 'lastlogin';
			}
			else
			{
				var lastlog ='';
			}

			if($('#searchfemale2').prop("checked") == true){
				var searchfemale = 'female';
			}
			else
			{
				var searchfemale = '';
			}

			if($('#searchmale2').prop("checked") == true){
				var searchmale = 'male';
			}
			else
			{
				var searchmale = '';
			}

			
			if($('#cellreligion2').prop("checked") == true){
				var searchreligion = $('#religion2').val();
			}else{
				var searchreligion = '';
			}
			
			if($('#cellcoworker2').prop("checked") == true){
				var searchcoworker = $('#coworker2').val();
			}else{
				var searchcoworker = '';
			}

			 $.ajax({
         				type:"POST",
        				url:"bookmark_searchajax.php",
        				data:{lastlog:lastlog,searchmale:searchmale,searchfemale:searchfemale,searchreligion:searchreligion,searchcoworker:searchcoworker},
        					success:function(result){
        					// alert(result);
        					// console.log(result);
	        				$("#busersearch").html(result);
        				}
       				 });

		}
		else
		{			
			//$('.percentagelist').show();
			console.log("true");
			if($('#searchfemale2').is(":checked")){

				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale2').is(":checked")){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}

				    $("#percetage2").change(function(){

				       	var percentage = $("#percetage2 option:selected").val();
		        		var cells = '<?php echo $cellno; ?>';
	                        $.ajax({
				         			type:"POST",
				        			url:"bookmark_searchajax.php",
				        			data:{percentage:percentage,cells:cells,searchfemale:searchfemale,searchmale:searchmale},
				        			success:function(result){
				        			//	alert(result);
				        			$("#busersearch").html(result);
				        			}
				       			 });
	                        return false;

				    });

				  		var percentage = $("#percetage2 option:selected").val();

		 				var cells = '<?php echo $cellno; ?>';
	                        $.ajax({
				         			type:"POST",
				        			url:"bookmark_searchajax.php",
				        			data:{percentage:percentage,cells:cells,searchfemale:searchfemale,searchmale:searchmale},
				        			success:function(result){
				        			//	alert(result);
				        			$("#busersearch").html(result);
				        			}
				       			 });

				       			 

		}

////////////////////////////////////////////////////////////////////////////////////


			if ($('#cellreligion2').prop("checked") == false)
			{
			 $('.religionlist2').hide();				
			
			if ($('#lastloging2').prop("checked") == true){
				var lastlog = 'lastlogin';
				}
				else
				{
					var lastlog ='';
				}

				if($('#searchfemale2').prop("checked") == true){
				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale2').prop("checked") == true){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}

				
				if($('#cellreligion2').prop("checked") == true){
					var searchreligion = $('#religion2').val();
				}else{
					var searchreligion = '';
				}
				
				if($('#cellcoworker2').prop("checked") == true){
					var searchcoworker = $('#coworker2').val();
				}else{
					var searchcoworker = '';
				}

				 $.ajax({
	         				type:"POST",
	        				url:"bookmark_searchajax.php",
	        				data:{lastlog:lastlog,searchmale:searchmale,searchfemale:searchfemale,religion:searchreligion,coworker:searchcoworker},
	        					success:function(result){
	        					//alert(result);
	        					//console.log(result);
		        				$("#busersearch").html(result);
	        				}
	       				 });

		}
		else
		{
			//$('.religionlist').show();
			if($('#searchfemale2').is(":checked")){

				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale2').is(":checked")){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}

				    $("#religion").change(function(){

				       	var religion = $("#religion option:selected").val();
		        		var cells = '<?php echo $cellno; ?>';
	                        $.ajax({
				         			type:"POST",
				        			url:"bookmark_searchajax.php",
				        			data:{religion:religion,cells:cells,searchfemale:searchfemale,searchmale:searchmale},
				        			success:function(result){
				        			//	alert(result);
				        			$("#busersearch").html(result);
				        			}
				       			 });
	                        return false;

				    });

				    var religion = $("#religion option:selected").val();

		 				var cells = '<?php echo $cellno; ?>';
	                        $.ajax({
				         			type:"POST",
				        			url:"bookmark_searchajax.php",
				        			data:{religion:religion,cells:cells,searchfemale:searchfemale,searchmale:searchmale},
				        			success:function(result){
				        			//	alert(result);
				        			$("#busersearch").html(result);
				        			}
				       			 });
				  

		}

////////////////////////////////////////////////////////////////////////////////////


		if ($('#cellcoworker2').prop("checked") == true)
		{		
			//$('.coworkerlist').show();
			
			


			if($('#searchfemale2').is(":checked")){

				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale2').is(":checked")){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}

				    $("#coworker2").change(function(){

				       	var coworker = $("#coworker2 option:selected").val();
		        		var cells = '<?php echo $cellno; ?>';
	                        $.ajax({
				         			type:"POST",
				        			url:"bookmark_searchajax.php",
				        			data:{coworker:coworker,cells:cells,searchfemale:searchfemale,searchmale:searchmale},
				        			success:function(result){
				        			//	alert(result);
				        			$("#busersearch").html(result);
				        			}
				       			 });
	                        return false;

				    });		

				    var coworker = $("#coworker2 option:selected").val();

		 				var cells = '<?php echo $cellno; ?>';
	                        $.ajax({
				         			type:"POST",
				        			url:"bookmark_searchajax.php",
				        			data:{coworker:coworker,cells:cells,searchfemale:searchfemale,searchmale:searchmale},
				        			success:function(result){
				        			//	alert(result);
				        			$("#busersearch").html(result);
				        			}
				       			 });	

		}
		else
		{
			$('.coworkerlist2').hide();

			if ($('#lastloging2').prop("checked") == true){
				var lastlog = 'lastlogin';
				}
				else
				{
					var lastlog ='';
				}

				if($('#searchfemale2').prop("checked") == true){
				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale2').prop("checked") == true){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}

				
				if($('#cellreligion2').prop("checked") == true){
					var searchreligion = $('#religion2').val();
				}else{
					var searchreligion = '';
				}
				
				if($('#cellcoworker2').prop("checked") == true){
					var searchcoworker = $('#coworker2').val();
				}else{
					var searchcoworker = '';
				}

				$.ajax({
     				type:"POST",
    				url:"bookmark_searchajax.php",
    				data:{lastlog:lastlog,searchmale:searchmale,searchfemale:searchfemale,religion:searchreligion,coworker:searchcoworker},
    				success:function(result){
    					//alert(result);
    					//console.log(result);
        				$("#busersearch").html(result);
    				}
   				});
		}

////////////////////////////////////// Age //////////////////////////////////////////


		if ($('#searChageBook').prop("checked") == true)
		{

			if($('#searchfemale1').is(":checked")){
				var searchfemale = 'female';
			}else{
				var searchfemale = '';
			}

			if($('#searchmale1').is(":checked")){
				var searchmale = 'male';
			}else{
				var searchmale = '';
			}

		    $("#age_limit_book").change(function(){
		       	var age_limit = $("#age_limit_book option:selected").val();
        		var cells = '<?php echo $cellno; ?>';
                    $.ajax({
		         			type:"POST",
		        			url:"bookmark_searchajax.php",
		        			data:{age_limit:age_limit,cells:cells,searchfemale:searchfemale,searchmale:searchmale},
		        			success:function(result){    			
		        			$("#busersearch").html(result);
		        			}
		       			 });
                    return false;
		    });		

				    var age_limit = $("#age_limit_book option:selected").val();

		 				var cells = '<?php echo $cellno; ?>';
	                        $.ajax({
				         			type:"POST",
				        			url:"bookmark_searchajax.php",
				        			data:{age_limit:age_limit,cells:cells,searchfemale:searchfemale,searchmale:searchmale},
				        			success:function(result){
				        			//	alert(result);
				        			$("#busersearch").html(result);
				        			}
				       			 });	

		}
		else
		{
			$('.agelistbook').hide();

			if ($('#lastloging2').prop("checked") == true){
				var lastlog = 'lastlogin';
				}
				else
				{
					var lastlog ='';
				}

				if($('#searchfemale1').prop("checked") == true){
				var searchfemale = 'female';
				}
				else
				{
					var searchfemale = '';
				}

				if($('#searchmale1').prop("checked") == true){
					var searchmale = 'male';
				}
				else
				{
					var searchmale = '';
				}			
				
				
				if($('#age_limit_book').prop("checked") == false){
					var age_limit = $('#age_limit_book').val();
				}else{
					var age_limit = '';
				}
				
				 $.ajax({
	         				type:"POST",
	        				url:"bookmark_searchajax.php",
	        				data:{lastlog:lastlog,searchmale:searchmale,searchfemale:searchfemale,religion:searchreligion,age_limit:age_limit},
	        				success:function(result){	        					
		        				$("#fusersearch").html(result);
	        				}
	       				});



		}


		});



function checkintrest2(value){
	if($('#cellintrest2').prop("checked") == true){
		$('.percentagelist2').show();
		$('.coworkerlist2').hide();
		$('.religionlist2').hide();
		$('.agelistbook').hide();
		$('input:checkbox[name=cellcoworker]').attr('checked',false);
		$('input:checkbox[name=cellreligion]').attr('checked',false);
		$('input:checkbox[name=searchmale]').attr('checked',false);
		$('input:checkbox[name=searchfemale]').attr('checked',false);
		$('input:checkbox[name=searchage]').attr('checked',false);
		$('input:checkbox[name=lastloging]').attr('checked',false);
	}
}

function checkmale2(value){
	if($('#searchmale2').prop("checked") == true){
		$('.percentagelist2').hide();
		$('.coworkerlist2').hide();
		$('.religionlist2').hide();
		$('.agelistbook').hide();
		$('input:checkbox[name=cellcoworker]').attr('checked',false);
		$('input:checkbox[name=cellreligion]').attr('checked',false);
		$('input:checkbox[name=cellintrest]').attr('checked',false);
		$('input:checkbox[name=searchfemale]').attr('checked',false);
		$('input:checkbox[name=searchage]').attr('checked',false);
		$('input:checkbox[name=lastloging]').attr('checked',false);
	}
}

function checklastloging2(value){
	if($('#lastloging2').prop("checked") == true){
		$('.percentagelist2').hide();
		$('.coworkerlist2').hide();
		$('.religionlist2').hide();
		$('.agelistbook').hide();
		$('input:checkbox[name=cellcoworker]').attr('checked',false);
		$('input:checkbox[name=cellreligion]').attr('checked',false);
		$('input:checkbox[name=cellintrest]').attr('checked',false);
		$('input:checkbox[name=searchfemale]').attr('checked',false);
		$('input:checkbox[name=searchage]').attr('checked',false);
		$('input:checkbox[name=searchmale]').attr('checked',false);
	}
}

function checkfemale2(value){
	if($('#searchfemale2').prop("checked") == true){
		$('.percentagelist2').hide();
		$('.coworkerlist2').hide();
		$('.religionlist2').hide();
		$('.agelistbook').hide();
		$('input:checkbox[name=cellcoworker]').attr('checked',false);
		$('input:checkbox[name=cellreligion]').attr('checked',false);
		$('input:checkbox[name=cellintrest]').attr('checked',false);
		$('input:checkbox[name=searchmale]').attr('checked',false);
		$('input:checkbox[name=searchage]').attr('checked',false);
		$('input:checkbox[name=lastloging]').attr('checked',false);
	}
}


function checkreligion2(value){
	if($('#cellreligion2').prop("checked") == true){
		$('.percentagelist2').hide();
		$('.coworkerlist2').hide();
		$('.religionlist2').show();
		$('.agelistbook').hide();
		$('input:checkbox[name=cellintrest]').attr('checked',false);
		$('input:checkbox[name=cellcoworker]').attr('checked',false);
		$('input:checkbox[name=searchmale]').attr('checked',false);
		$('input:checkbox[name=searchfemale]').attr('checked',false);
		$('input:checkbox[name=searchage]').attr('checked',false);
		$('input:checkbox[name=lastloging]').attr('checked',false);
	}
}
function checkcoworker2(value){
	if($('#cellcoworker2').prop("checked") == true){
		$('.percentagelist2').hide();
		$('.coworkerlist2').show();
		$('.religionlist2').hide();
		$('.agelistbook').hide();
		$('input:checkbox[name=cellintrest]').attr('checked',false);
		$('input:checkbox[name=cellreligion]').attr('checked',false);
		$('input:checkbox[name=searchmale]').attr('checked',false);
		$('input:checkbox[name=searchfemale]').attr('checked',false);
		$('input:checkbox[name=searchage]').attr('checked',false);
		$('input:checkbox[name=lastloging]').attr('checked',false);
	}
}
function checkAgeBook(value){
	if($('#searChageBook').prop("checked") == true){
		$('.agelistbook').show();
		$('.percentagelist2').hide();
		$('.coworkerlist2').hide();
		$('.religionlist2').hide();
		$('input:checkbox[name=cellreligion]').attr('checked',false);
		$('input:checkbox[name=cellintrest]').attr('checked',false);
		$('input:checkbox[name=searchmale]').attr('checked',false);
		$('input:checkbox[name=searchfemale]').attr('checked',false);
		$('input:checkbox[name=cellcoworker]').attr('checked',false);
		$('input:checkbox[name=lastloging]').attr('checked',false);
	}
}


</script>

<script type="text/javascript">

	//$(document).ready( function(){
		$('#close-window2').click(function(){
			// alert('dfgdfg');
        	$('.bookmarkf').hide();
      	});
	//})
	function window_minimize(){
		$('.bookmarkf').hide();
	}

	$('#search2').keyup(function(){
		var search = document.getElementById('search2').value;
		console.log(search);
		 $.ajax({
			type:"POST",
			url:"bookmark_searchajax.php",
			data:{search:search},
			success:function(result){

				//alert(result);
				$("#busersearch").html(result);
			}
			 });

	});

$(".addfriend").click(function(){
	var cur_id =  $(this).attr('id');	
	var u_id = '<?php echo $_SESSION['user_id'];?>';	
	var f_id =  $(this).attr('id').replace('K_','');
	
	$.ajax({
			type:"POST",
			url:"add_friend.php",
			data:{u_id:u_id,f_id:f_id},
			success:function(result){		
				$("#frend_message").html(result);
				$("#frend_message").show();
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
				$("#"+cur_id).html("bookmarked").removeClass('bookmark');
			}
		 });
	return false;
});
$('.fa-window-minimize').click( function(){	
	$('.bookmarkf').hide();
});	
$(document).on("click", "#close-bookmark-t", function(){
	$('.bookmarkf').hide();
	$('.bookmarkf').css('display', 'none');
});	
$(document).on("click", "#minimize-window-t", function(){
	$('.bookmarkf').hide();
	$('.bookmarkf').css('display', 'none');
});


</script>
<script type="text/javascript">
	$('.fa-window-maximize').hide();
	$('.fa-window-restore').click(function(){
		$('.fa-window-restore').hide();
		$('.fa-window-maximize').show();
		$('.bookmarkf').height('100%');
    	$('.bookmarkf').height('100%');
    	$('.bookmarkf').css("max-width","900px"); 
    	$('.bookmarkf .recent-box-sc').height('100%');
	});

	$('.fa-window-maximize').click(function(){
		$('.fa-window-restore').show();
		$('.fa-window-maximize').hide();
		$('.bookmarkf').height('500px');
		$('.bookmarkf').css("max-width","741px"); 
		$('.bookmarkf').height('auto');
	});
</script>





