<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");

$user = new User();

 $uid=$_SESSION['user_id'];

	//echo $lname=$_FILES['profile_pic']['name'];die;

if(isset($_REQUEST['updateinfo']))

{

		//if(!empty($_FILES['profile_pic']['name']))
		//{
			
		///}
		//$profile_pic=$_FILES['profile_pic']['name'];
		$lname=$_REQUEST['last_name'];
		$fname=$_REQUEST['first_name'];
		$uname=$_REQUEST['username'];
		$dob=$_REQUEST['datetime'];
		
		$gender=$_REQUEST['gender'];
		$height=$_REQUEST['height'];
		$weight=$_REQUEST['weight'];
		$profession=$_REQUEST['profession'];

		$city=$_REQUEST['city'];
		$country=$_REQUEST['country'];
		$phoneno=$_REQUEST['phoneno'];
		$email=$_REQUEST['email'];
		$email_confirm=$_REQUEST['email_confirm'];

		$current_date=date('Y-m-d');

		if(!empty($_FILES['profile_pic']['name']))
		{
			$profile_pic=$_FILES['profile_pic']['name'];
		/*-------------------------------*/
			$uploaddir = 'uploads/Profile/';
			$up_pic = explode(".", basename($_FILES['profile_pic']['name']));
			$ext = end($up_pic);
			$filename       = time() . mt_rand().".".$ext;
			$uploadfile     = $uploaddir . $filename;	  
			$tempfile=$_FILES['profile_pic']['tmp_name'];
			/*-----------*/
			if(move_uploaded_file($tempfile, $uploadfile))
			{ 
				$profile_pic = "uploads/Profile/".$filename;

				$fields=array('profile_path','last_name','first_name','username','dob','gender','height','weight','profession','city','country','phoneno','email','update_section','add_date');
				$values=array($profile_pic,$lname,$fname,$uname,$dob,$gender,$height,$weight,$profession,$city,$country,$phoneno,$email,'Profile Information',$current_date);		
				$data=$user->Update_Dynamic_Query('tbl_singup',$values,$fields,'id',$uid);

				$where = "id=".$uid;				
				$result=$user->select_records("tbl_singup",'*',$where);



			}
		}	
		else
		{
			
			$fields=array('last_name','first_name','username','dob','gender','height','weight','profession','city','country','phoneno','email','update_section','add_date');
			$values=array($lname,$fname,$uname,$dob,$gender,$height,$weight,$profession,$city,$country,$phoneno,$email,'Profile Information',$current_date);		
			$data=$user->Update_Dynamic_Query('tbl_singup', $values, $fields, 'id', $uid);

			$where = "id=".$uid;				
			$result=$user->select_records("tbl_singup",'*',$where);
		}
				
}
foreach ($result as $rows) {
}

?>


<div class="col-xs-3 ">
	          <div class="border">
	            
	          	<img src="<?php echo $rows['profile_path'];?>" class="img-responsive">
		       
			  </div>	
	        </div>
	        <div class="col-xs-7">
		        <div class="row user-info border">
					<h3><h3><?php echo $rows['username'];?></h3></h3>
					<label class="col-xs-6"> Name <span><?php echo $rows['first_name']?></span></label>  
					<label class="col-xs-6"> Sure name - Given name <span><?php echo $rows['last_name']?></span></label>

					<label class="col-xs-3">age  <span>
						<?php
							 $dob=$rows['dob'];
							 
						
							$today = date("Y-m-d");
							$diff = date_diff(date_create($dob), date_create($today));
							echo $diff->format('%y');

						?>



					 </span> </label>
					<label class="col-xs-3">Gender  <span><?php echo $rows['gender']?> </span> </label>
					<label class="col-xs-3">height  <span><?php echo $rows['height']?> </span> </label>
					<label class="col-xs-3">weight <span><?php echo $rows['weight'].'lb'?></span> </label> 

					<label class="col-xs-12">Profession <span><?php echo $rows['profession']?></span></label>
					<label class="col-xs-6">City <span><?php echo $rows['city']?></span> </label>
					<label class="col-xs-6">Country  <span><?php echo $rows['country']?></span> </label>
				</div>
	        </div>