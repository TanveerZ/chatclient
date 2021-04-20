<?php	
//session_start();
require_once("include/config.php");
require_once("include/functions.php");

$user = new User();

$cells = $user->select_allrecords('tbl_cell','*');

$avitors = $user->select_allrecords('tbl_avitor','*');
if(isset($_REQUEST['id']))
{
	$uid = $_REQUEST['id'];
}

/*--- total cell --*/
$cells = $user->select_allrecords('tbl_cell','*');
$where = "id=".$uid;
$fields="*";
$table="tbl_singup";
$data=$user->select_records($table,$fields,$where);

foreach ($data as $rows) {
}

$cell_id = $rows['cell_id'];
$where="cell_id in(".$cell_id.")";

	$fields="*";
	$table="tbl_cell";
	/*-- select registraion time cell --*/
	$datacell=$user->select_records($table,$fields,$where);

?>
<link rel="stylesheet" href="css/frdsprofile.css">
 
<form class="frdsprofile c frpro" method="post" enctype="multipart/form-data" > 

	<div class="window-btn window-btn2">
    	
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window" onclick="closebtn();"></button>
    </div>

    <div class="user-head">
    	


    	
    <h3>Friends Profile</h3> 
    </div>
	<div class="post-viwe"> 
		<div class="row user-box">
	        <div class="col-xs-3 ">
	          <div class="border">
	          <?php if($rows['profile_path']!='')
	          	{
	          	?>	            
	          	<img src="<?php echo $rows['profile_path'];?>" class="img-responsive">	 
	          	<?php
	          	}
	          	else
	          	{
	          		echo "<img src='img/user.png' class='img-responsive'>";
	          	}

	          	?>
			  </div>	
	        </div>
	        <div class="col-xs-7">
		        <div class="row user-info border">
					<h3>Eagleon</h3>
					<label class="col-xs-6"> Name <span><?php echo $rows['first_name'];?></span></label>  
					<label class="col-xs-6"> Sure name - Given name <span><?php echo $rows['last_name'];?></span></label>

					<label class="col-xs-3">age  <span>27 </span> </label>
					<label class="col-xs-3">Gender  <span><?php echo $rows['gender'];?> </span> </label>
					<label class="col-xs-3">height  <span><?php echo $rows['height'];?> </span> </label>
					<label class="col-xs-3">weight <span><?php echo $rows['weight'].'lb'?></span> </label> 
					<label class="col-xs-3">Profession <span><?php echo $rows['profession'];?></span></label>
					<label class="col-xs-3">Religion <span><?php echo $rows['religion'];?></span></label>
					<label class="col-xs-3">Coworker/Classmate <span><?php echo $rows['coworker'];?></span></label>
					<label class="col-xs-6">City <span><?php echo $rows['city'];?></span> </label>
					<label class="col-xs-6">Country  <span><?php echo $rows['country'];?></span> </label>
				</div>		
			</div>
			<div class="col-xs-2">
				<h4>Avitor</h4>
				<?php if($rows['avitor_image']!='') {?>
				<img src="<?php echo $rows['avitor_image']?>" class="img-responsive">
				<?php
					}
					else
					{
							echo "<img src='img/user.png' class='img-responsive'>";
					}
				?>
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
		</div>	
		<div class="row">
			<div class="col">
				<?php 
					$n=count($datacell);
					foreach($datacell as $row)
					{
						$id=$row['id'];
						 for($i=1; $i <= 1; $i++){?>
							<label class="interest" style="display: block;">
							
							<?php
								echo '-'.' '.$row['cell_name'];
								echo "</label>";
							?>  
							<?php  if(($n % $i) == 0) {
					  
						} ?>
						 <?php }
					}
				 ?> 
			</div> 
		</div>
	</div>
	
	
<!-- ########## - - About Edit ###### --> 
	<div class="sect">
		
		<div class="about">
		    <strong>About me</strong>
			<p>
				<?php echo $rows['bio']; ?>
				
			</p>
		</div>
	</div>
</div>
</form>

