<link rel="stylesheet" href="css/post.css">
<form class="profile" method="post" enctype="multipart/form-data">
    <div class="post-left">
	    <div class="user-head">
	    	<h3>User</h3>
	    	<a href="#">Add </a> <a href="#">Edit</a>
	    </div>
		<div class="post-scroll">
		   <div class="post-viwe">

		   <?php for($i=1; $i<=10; $i++ ){?>
		     <div class="user-box">
		       <div class="col-left user-img">
		       <img src="img/user.png" class="img-responsive">
		        <div class="profile_uplo">
				   Upload	
				   <input type="file" name="profile_pic" accept="image/*">
				</div>
		       </div>
		       <div class="col-left user-info">
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
		       <div class="col-left aviator">
		       <h4>Avitor</h4>
		       <a href="#">Add </a> <a href="#">Edit</a>
		       </div>
		     </div>
		     <?php }?> 
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
			   <div class="check">
					<div>
					<input type="checkbox" name=""> Last logged in </div>
					<div>
					<input type="checkbox" name=""> Interest </div>
					<div>
					<input type="checkbox" name=""> Male </div>
					<div>
					<input type="checkbox" name=""> Female </div>
		        </div>
		        <div class="bar">

		        </div>	 
			</div> 
        </div> 			
	</div>

</form>
 