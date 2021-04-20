<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$users = new User();
	
if(isset($_REQUEST['percentage']))
{
  $percentage=$_REQUEST['percentage'];
	
	$usercells=$_REQUEST['cells'];

	$usercells=explode(',', $usercells);

	$usercellcount=count($usercells);

	$all=$users->select_allrecords('tbl_singup','*');


	foreach ($all as $value) {
		
		$cell_id=$value['cell_id'];

		$cell=explode(',', $cell_id);

		//$searchcellcount=count($cell);

		$result = array_intersect($usercells, $cell);

		$countresult=count($result);
		

		$per=($countresult/$usercellcount)*100;

			
		if($percentage<=$per)
		{
			 $id[]=$value['id'];
		}	
	}



	if($_REQUEST['searchfemale']!='')
	{
		$searchfemale=$_REQUEST['searchfemale'];
		$where="id IN (".implode(',', $id).") AND gender='".$searchfemale."'";
		$usersdetails=$users->select_records('tbl_singup','*',$where);
		

	}
	else if($_REQUEST['searchmale']!='')
	{
		$searchmale=$_REQUEST['searchmale'];
		$where="id IN (".implode(',', $id).") AND gender='".$searchmale."'";
		 $usersdetails=$users->select_records('tbl_singup','*',$where);
		 	
	}

	else if($_REQUEST['searchmale']!='' && $_REQUEST['searchfemale']!='')
	{
		 $where="id IN (".implode(',', $id).")";
		 $usersdetails=$users->select_records('tbl_singup','*',$where);
	}


	else
	{
		 $where="id IN (".implode(',', $id).")";
		 $usersdetails=$users->select_records('tbl_singup','*',$where);
	}
}	

?>

<div class="post-viwe">

		   <?php 
		   		foreach($usersdetails as $val){


		   ?>
			     <div class="user-box">
			       <div class="col-left user-img">
			      	<?php if($val['avitor_image']!='')
			       	{
			       	?>
			       		<a href="" class="frdprofile" id="<?php echo $val['id'];?>">
			      		<img src="<?php echo $val['avitor_image']?>" class="img-responsive">
			        	</a>
			        <?php
			    	}
			    	else
			    	{?>
			    		<a href="" class="frdprofile" id="<?php echo $val['id'];?>">
			    		<img src='img/user.png' class='img-responsive'>
			    	</a>
			    	<?php
			    	}
			        ?>
			        
			       </div>	

			       <div class="col-left user-info">
			       	<a href="" class="frdprofile" id="<?php echo $val['id'];?>">
						<h3><?php echo $val['username'];?></h3>
					</a>
						<label class="col-xs-6"> Name <span>
							<?php echo $val['first_name'];?></span>
						</label>  
						<label class="col-xs-6"> Sure name - Given name <span>
							<?php echo $val['last_name'];?></span>
						</label>

						<label class="col-xs-3">Gender  <span>
							<?php echo $val['gender'];?></span> 
						</label>
						<label class="col-xs-3">height  <span>
							<?php echo $val['height'];?></span>
						</label>
						<label class="col-xs-3">weight <span>
							<?php echo $val['weight'];?></span> 
						</label> 

						<label class="col-xs-12">Profession <span>
							<?php echo $val['profession'];?></span>
						</label>
						<label class="col-xs-6">City <span>
							<?php echo $val['city'];?></span> 
						</label>
						<label class="col-xs-6">Country  <span>
							<?php echo $val['country'];?></span>
						</label>
					
			       </div>
			       
			     </div>
		     <?php 
		     	}
		 		
		 	?> 
		   </div>
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