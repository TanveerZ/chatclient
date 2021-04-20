<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
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

	/*---search on txt box value fname--*/
// echo "<pre>";print_r($_REQUEST);die;
$where = '';
if(isset($_REQUEST['search']) && !empty($_REQUEST['search']))
{
	$search=$_REQUEST['search'];
	$where .=" AND (first_name Like '".$search."%' OR religion Like '".$search."%' OR coworker Like '".$search."%')";
}
	/*----------- serach on check box --------------*/	

// if($_REQUEST['searchmale']!='' && $_REQUEST['searchfemale']!='')
// {
// 	$where .= " AND 1 ORDER BY last_login DESC LIMIT 1";
// }



if((isset($_REQUEST['searchfemale']) && !empty($_REQUEST['searchfemale'])) && (isset($_REQUEST['searchmale']) && !empty($_REQUEST['searchmale'])) )
{
	$where .=" AND ( gender = 'female' OR gender = 'male') ";	
}
else if((isset($_REQUEST['searchfemale']) && !empty($_REQUEST['searchfemale'])))
{
	$where .=" AND gender = 'female'";
}

else if((isset($_REQUEST['searchmale']) && !empty($_REQUEST['searchmale'])))
{
	$where .=" AND gender = 'male'";
}

if(isset($_REQUEST['religion']) && !empty($_REQUEST['religion'])){
	$where .=" religion = '".$_REQUEST['searchreligion']."'";
}

if (isset($_REQUEST['searchcoworker']) && !empty($_REQUEST['searchcoworker'])){
	$where .=" coworker = '".$_REQUEST['searchcoworker']."'";
}

if(isset($_REQUEST['age_limit']) && !empty($_REQUEST['age_limit']) && $_REQUEST['age_limit'] == '1')
{
	$where .=" AND age between 18 AND 23 ";
}
else if(isset($_REQUEST['age_limit']) && !empty($_REQUEST['age_limit']) && $_REQUEST['age_limit'] == '2')
{
	$where .=" AND age between 21 AND 35 ";
}
else if(isset($_REQUEST['age_limit']) && !empty($_REQUEST['age_limit']) && $_REQUEST['age_limit'] == '3')
{
	$where .=" AND age between 35 AND 45 ";
}
else if(isset($_REQUEST['age_limit']) && !empty($_REQUEST['age_limit']) && $_REQUEST['age_limit'] == '4')
{
	$where .=" AND age between 45 AND 125 ";
}

if(isset($_REQUEST['intrestcell']) && !empty($_REQUEST['intrestcell']))
{
	$where .=" AND cell_id LIKE'".$_REQUEST['intrestcell']."%'";
}

if(isset($_REQUEST['religion']) && !empty($_REQUEST['religion']))
{
	$where .=" AND religion LIKE'".$_REQUEST['religion']."%'";
}
if(isset($_REQUEST['coworker']) && !empty($_REQUEST['coworker']))
{
	$where .=" AND coworker LIKE'".$_REQUEST['coworker']."%'";
}

if(isset($_REQUEST['lastlog']) && !empty($_REQUEST['lastlog']))
{
	$where .=" ORDER BY last_login DESC LIMIT 1";
}


// echo $where; die;

// echo "ffffff". print_r($_REQUEST) ; die;

// $usersdetails=$user->select_records('tbl_singup','*',$where);
	$usersdetails = array();
	$query = "select A.id, B.* from tbl_bookmark A LEFT JOIN tbl_singup B on B.id = A.f_id where A.u_id = '".$_SESSION['user_id']."' ".$where." ";
	//die;
	// echo $query;die;
	$result = mysqli_query($con, $query);
	$iNumRows = mysqli_num_rows($result);

	while ($data = mysqli_fetch_assoc($result)) {
			// echo "hiii"."<br>";
			$usersdetails[] = $data;
		}
		// echo "<pre>";
		// print_r($usersdetails);
		// die;
?>
	<div class="post-viwe">

		<?php 
	
	//	echo "<pre>"; print_r($query); "<pre>"; die();

	if(!empty($usersdetails))
	{
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
			    {
			?>
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