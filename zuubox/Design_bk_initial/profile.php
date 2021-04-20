<link rel="stylesheet" href="css/profile.css">
<form class="profile edit" method="post" enctype="multipart/form-data">
    <div class="post-left">
		    <div class="user-head">
		    	<h3>USER PROFLIE</h3> 
		    </div>
		<div class="post-viwe"> 
		     <div class="row user-box">
		       <div class="col-xs-3 ">
		          <div class="border">
		            <img src="img/user.png" class="img-responsive">
			        <div class="profile_uplo">
					   Upload	
					   <input type="file" name="profile_pic" accept="image/*">
					</div>
				  </div>	
		       </div>
		       <div class="col-xs-6">
		         <div class="row user-info border">
					<h3>Eagleon</h3>
					<label class="col-xs-6"> Name <span>St Clair</span></label>  
					<label class="col-xs-6"> Sure name - Given name <span>Eli</span></label>

					<label class="col-xs-3">age  <span>27 </span> </label>
					<label class="col-xs-3">Gender  <span>Male </span> </label>
					<label class="col-xs-3">hieght  <span>5’9 </span> </label>
					<label class="col-xs-3">weight <span>149lb</span> </label> 

					<label class="col-xs-12">Profession <span>Designer</span></label>
					<label class="col-xs-6">City <span>Miami</span> </label>
					<label class="col-xs-6">Country  <span>US</span> </label>
				   </div>
		       </div>
		       <div class="col-xs-3">
			       <div class="border aviator">
			          <h4>Avitor</h4>
			          <a href="#">Add </a> / <a href="#">Edit</a>
			       </div>
			       <div class="border aviator">
			          <h4>Photo gallary</h4>
			          <a href="#">Add </a> / <a href="#">Edit</a>
			       </div>
			       <div class="border aviator inline"> 
			          <a href="#">Add </a> / <a href="#">Edit</a>
			       </div>
		       </div>
		     </div> 

		   </div> 
	</div>
	 

<div class="info">
	<div class="sect soi">
	<div class="row">
		<div class="col-xs-9 ">
			<div class="sect_title">
			   Subjects of interest
			</div> 
		</div>
		<div class="col-xs-3 pull-right">
			<div class="border aviator pull-right"> 
			  <a href="#">Add </a> / <a href="#">Edit</a>
			</div>
		</div>
	</div>	
	<div class="col">
	<?php  for($i=01; $i <= 20; $i++){?>
		<label class="interest" style="display: block;">
		<input type="checkbox" name="sois[]" value="15" >
		CELL<?php echo $i; ?>  </label>
		<?php  if(($i % 5) == 0) {
		   echo "</div><div class='col'>";
		} ?>
	 <?php }?> 
	</div> 
	</div>

	<div class="sect ">
	<div class="buttons">
	<div class="border aviator pull-right"> 
			  <a href="#">Add </a> / <a href="#">Edit</a>
	</div>
	</div>
	<div class="about">
	    <strong>About me</strong>
		<p>Information will be here.Information will be here.Information will be here.Information will be here.Information will be here.Information will be here.Information will be here.</p>
	</div>
	</div>
</form>


