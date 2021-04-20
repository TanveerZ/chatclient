<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$users = new User();

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


$where = "";

	//echo "<pre>"; print_r($_REQUEST);die;
if(isset($_REQUEST['percentage']) || isset($_REQUEST['religion']) || isset($_REQUEST['searchcoworker']) || isset($_REQUEST['age_limit']))

//if(isset($_REQUEST['percentage']) || isset($_REQUEST['age_limit']))
{
  	if(isset($_REQUEST['percentage']))
  	{
	  	$percentage = $_REQUEST['percentage'];
  	}
  	else
  	{
  		$percentage = '0';
  	}

	$usercells = $_REQUEST['cells'];
#echo $usercells."<br/>";
	$usercells = explode(',', $usercells);
//echo "<pre>";print_r($usercells);
//echo "<pre>";
	$usercellcount = count($usercells);

	$all = $users->select_allrecords('tbl_singup','*');

#echo "<pre>";print_r($all);die;
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



	if(isset($_REQUEST['searchfemale']) && !empty($_REQUEST['searchfemale']))
	{
		$searchfemale=$_REQUEST['searchfemale'];
		$where .=" AND (gender='".$searchfemale."')";
		// $usersdetails=$users->select_records('tbl_singup','*',$where);
		
	}
	 if(isset($_REQUEST['searchmale']) && !empty($_REQUEST['searchmale']))
	{
		$searchmale=$_REQUEST['searchmale'];
		$where .=" AND (gender='".$searchmale."')";
		// $usersdetails=$users->select_records('tbl_singup','*',$where);	 	
	}

	 if(isset($_REQUEST['religion']) && !empty($_REQUEST['religion'])){
		$where .=" AND (religion='".$_REQUEST['religion']."')";
		// $usersdetails=$users->select_records('tbl_singup','*',$where);
	}
	 if(isset($_REQUEST['searchcoworker']) && !empty($_REQUEST['searchcoworker'])){
		$where .=" AND (coworker='".$_REQUEST['searchcoworker']."')";
		// $usersdetails=$users->select_records('tbl_singup','*',$where);
	}
	 if( $_REQUEST['age_limit'] == '1' && isset($_REQUEST['age_limit']) )
	{
		$where .=" AND (age between 18 AND 23 AND is_age_visible = 1)";
		// $usersdetails=$users->select_records('tbl_singup','*',$where);
	}
	 if($_REQUEST['age_limit'] == '2' && isset($_REQUEST['age_limit'])){
		$where .=" AND (age between 21 AND 35 AND is_age_visible = 1)";
		// $usersdetails=$users->select_records('tbl_singup','*',$where);
	}
	if($_REQUEST['age_limit'] == '3' && isset($_REQUEST['age_limit'])){
		$where .=" AND (age between 35 AND 45 AND is_age_visible = 1)";
		// $usersdetails=$users->select_records('tbl_singup','*',$where);
	}
	if($_REQUEST['age_limit'] == '4' && isset($_REQUEST['age_limit'])){
		$where .=" AND (age between 45 AND 125 AND is_age_visible = 1)";
		// $usersdetails=$users->select_records('tbl_singup','*',$where);
	}
	//else
	//{
		 $where1 = " id IN (".implode(',', $id).") ".$where;
		 // echo $where1;die;
		 // $usersdetails=$users->select_records('tbl_singup','*',$where1);

	//}

	$userIds = array();
	$friendIds = array();
	$bookmarkIds = array();
	$messageIds = array();
	$mainIds = array();
	$user_id = $_SESSION['user_id'];

	$query = "select * from tbl_singup where ".$where1;
	// echo $query." ";

	$result = mysqli_query($con, $query);
	if(isset($result) && $result != null ){
		$iNumRows = mysqli_num_rows($result);
		while ($data = mysqli_fetch_assoc($result)) {
				$usersdetails[] = $data;
				$userIds[] = $data['id'];
		}
		$mainIds = $userIds;
	}

	if(isset($_REQUEST['myfriend']) && !empty($_REQUEST['myfriend']))
	{
		$query1 = "select A.id, A.u_id, A.f_id, B.*
		from tbl_friend A 
		LEFT JOIN tbl_singup B on B.id = A.f_id 
		where  A.u_id = '".$user_id."' AND A.flage = 1 AND ".$where."
		UNION ALL
		select A.id, A.u_id, A.f_id, B.*
		from tbl_friend A 
		LEFT JOIN tbl_singup B on B.id = A.u_id 
		where  A.f_id = '".$user_id."' AND A.flage = 1  AND ".$where." ";

		// echo $query1." ";
		
		$result = array();
		$result = mysqli_query($con, $query1);
		if(isset($result) && $result != null ){
			$iNumRows = mysqli_num_rows($result);
			while ($data = mysqli_fetch_assoc($result)) {
				// $friendsdetails[] = $data;
				$friendIds[] = $data['id'];
			}
		}
		$mainIds = array_intersect($mainIds,$friendIds);
	}

	if(isset($_REQUEST['mybookmark']) && !empty($_REQUEST['mybookmark']))
	{
		$query = "select A.id, B.* from tbl_bookmark A LEFT JOIN tbl_singup B on B.id = A.f_id where A.u_id = '".$_SESSION['user_id']."' AND ". $where."";

		// echo $query." "; 

		$result = mysqli_query($con, $query);
		$iNumRows = mysqli_num_rows($result);
		if ($iNumRows > 0) {
			while ($data = mysqli_fetch_assoc($result)) {
				// $bookmarkdetails[] = $data;
				$bookmarkIds[] = $data['id'];
			}
		}
		$mainIds = array_intersect($mainIds,$bookmarkIds);
	}

	if(isset($_REQUEST['mymsg']) && !empty($_REQUEST['mymsg']))
	{
		$query = "select A.id, B.* from tbl_message A LEFT JOIN tbl_singup B on B.id = A.f_id where A.u_id = '".$_SESSION['user_id']."' AND ". $where."";

		// echo $query." "; 

		$result = mysqli_query($con, $query);
		$iNumRows = mysqli_num_rows($result);
		if ($iNumRows > 0) {
			while ($data = mysqli_fetch_assoc($result)) {
				// $bookmarkdetails[] = $data;
				$messageIds[] = $data['id'];
			}
		}
		$mainIds = array_intersect($mainIds,$messageIds);
	}

	$query = "select * from tbl_singup where id IN (" . implode(',', $mainIds) . ")";

	$result = mysqli_query($con, $query);
	if(isset($result) && $result != null ){
		$iNumRows = mysqli_num_rows($result);
		while ($data = mysqli_fetch_assoc($result)) {
				$maindetails[] = $data;
		}
	}
}	

?>

<div class="post-viwe">

		   <?php //echo "<pre>"; print_r($where); echo "<pre>";
		   		
if(!empty($maindetails))
{
		   		foreach($maindetails as $val){

		   ?>
			     <div class="user-box">
			       <div class="col-left user-img">
			      	<?php if(!empty($val['avitor_image']))
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