<?php
session_start();
require_once "include/config.php";
require_once "include/functions.php";
try {
	$query = "SELECT * FROM tbl_singup ORDER BY id DESC";
	$result = mysql_query($query);
	$iNumRows = mysql_num_rows($result);
	if ($iNumRows > 0) {
		while ($data = mysql_fetch_assoc($result)) {
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
	    	<h3>User</h3>
	    	<a href="#">Add </a> <a href="#">Edit</a>
	    </div>
		<div class="post-scroll">
		   <div class="post-viwe">

		   <?php for ($i = 1; $i <= 1; $i++) {
	foreach ($aUserData as $val) {
		?>
			     <div class="user-box">
			       <div class="col-left user-img">
			      	<?php if ($val['avitor_image'] != '') {

			?>
			      		<a href="" class="frdprofile" id="<?php echo $val['id']; ?>"><img src="<?php echo $val['avitor_image'] ?>" class="img-responsive"></a>

			        <?php
} else {?>

			    		<a href="" class="frdprofile" id="<?php echo $val['id']; ?>"><img src='img/user.png' class='img-responsive'></a>
			    	<?php
}
		?>

			       </div>
			       <div class="col-left user-info">
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
						<label class="col-xs-6">City <span>
							<?php echo $val['city']; ?></span>
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
							<div style="font-size: 10px;">

							<input type="checkbox" name="lastloging" id='lastloging' class="chk"> Last logged in </div>
							<div>
							<input type="checkbox" name="cellintrest" id="cellintrest" class="chk" > Interest </div>
							<div>
							<input type="checkbox" name="searchmale" id='searchmale' value="male" class="chk"> Male </div>
							<div>
							<input type="checkbox" name="searchfemale" id='searchfemale' value="female" class="chk"> Female </div>
							<div>
							<input type="checkbox" name="searchage" id='searchage' value="age" class="chk"> Age </div>
							<div style="width: 200px;">
							<input type="checkbox" name="searchcoworker" id='searchcoworker' value="coworker" class="chk"> Coworker/Classmate </div>
							<div>
							<input type="checkbox" name="searchreligion" id='searchreligion' value="religion" class="chk"> Religion </div>
							<div>
							<input type="checkbox" name="searchlocation" id='searchlocation' value="location" class="chk"> Location </div>
							<div>
							<input type="checkbox" name="searchlastlogin" id='searchlastlogin' value="lastlogin" class="chk"> Last login  </div>

				        </div>
					</div>
					<div class="col-xs-4">
				        <div class="percentagelist" >
				        	<div>
				        		<label>Cell Percent</label>
				        		<select name="percetage" id="percetage">
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
				</div>

		        <div class="bar">

		        </div>
		        <div class="input-group">
                   <input type="text" name="search" id="search" class="form-control">
                   <div class="input-group-btn">
                     <input type="button" name=""  class="btn" value="Search">
                   </div>
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
						<label class="col-xs-6">City <span>
							<?php echo $val['city']; ?></span>
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
				$('.frdprofile').click(function(){
					var uid = $(this).attr('id');
						$.ajax({
			         		type:"POST",
			        		url:"frdsprofile.php",
			        		data:{id:uid},
			        			success:function(result){
			            		$('.frdsprofile').html(result);
								$('.frdsprofile .frdsprofile').show();
			            		$('.post .profile').hide();
			        		}
			       		 });
						return false;
				});
			</script>


<!--///////////////////////////////////////////////////-->
<script type="text/javascript">
	$('.percentagelist').hide();
	$('input[type="checkbox"]').click(function(){

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

				 $.ajax({
	         				type:"POST",
	        				url:"post_searchajax.php",
	        				data:{lastlog:lastlog,searchmale:searchmale,searchfemale:searchfemale},
	        				success:function(result){
	        					//alert(result);
	        					//console.log(result);
		        				$("#usersearch").html(result);
	        				}
	       				 });

		}
		else

		{

			$('.percentagelist').show();

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

				    $("#percetage").change(function(){

				       	var percentage = $("#percetage option:selected").val();
		        		var cells = '<?php echo $cellno; ?>';
	                        $.ajax({
				         			type:"POST",
				        			url:"post_searchajaxinterst.php",
				        			data:{percentage:percentage,cells:cells,searchfemale:searchfemale,searchmale:searchmale},
				        			success:function(result){
				        			//	alert(result);
				        			$("#usersearch").html(result);
				        			}
				       			 });
	                        return false;

				    });

				  	var percentage = $("#percetage option:selected").val();

				  	var cells = '<?php echo $cellno; ?>';
	                        $.ajax({
				         			type:"POST",
				        			url:"post_searchajaxinterst.php",
				        			data:{percentage:percentage,cells:cells,searchfemale:searchfemale,searchmale:searchmale},
				        			success:function(result){
				        			//	alert(result);
				        			$("#usersearch").html(result);
				        			}
				       			 });

		}


		});

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

        	</script>


