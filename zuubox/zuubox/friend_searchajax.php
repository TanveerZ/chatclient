<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();

  $SERVER = 'localhost';
  $USERNAME = 'root';
  $PASSWORD = '';
  $DATABASE = 'codesevenstudio';

  $con = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE) or die('Oops connection error -> ' . mysqli_error($con));

	/*---search on txt box value fname--*/
//echo "<pre>";print_r($_POST);die;
$where = '';
if(isset($_REQUEST['search']) && !empty($_REQUEST['search']))
{
	$search=$_REQUEST['search'];
	$where .=" AND (first_name Like '".$search."%' OR religion Like '".$search."%' OR coworker Like '".$search."%')";
}
	/*----------- serach on check box --------------*/	

// if($_REQUEST['searchmale']) && $_REQUEST['searchfemale']))
// {
// 	$where .= " AND 1 ORDER BY last_login DESC LIMIT 1";
// }


if((isset($_REQUEST['searchfemale']) && !empty($_REQUEST['searchfemale'])) && (isset($_REQUEST['searchmale']) && !empty($_REQUEST['searchmale'])) )
{
//if($_REQUEST['searchfemale']) && $_REQUEST['searchmale'])){
	$where .=" AND (gender = 'female' OR gender = 'male') ";	
}
else if((isset($_REQUEST['searchfemale']) && !empty($_REQUEST['searchfemale'])))
{
	$where .=" AND gender = 'female'";
}

else if((isset($_REQUEST['searchmale']) && !empty($_REQUEST['searchmale'])))
{
	$where .=" AND gender = 'male'";
}

else if(isset($_REQUEST['searchreligion']) && !empty($_REQUEST['searchreligion'])){
	$where .=" religion = '".$_REQUEST['searchreligion']."'";
}

else if (isset($_REQUEST['religion']) && !empty($_REQUEST['religion'])){
	$where .=" AND religion = '".$_REQUEST['religion']."'";
}

else if(isset($_REQUEST['coworker']) && !empty($_REQUEST['coworker']))
{
	$where .=" AND coworker LIKE'".$_REQUEST['coworker']."%'";
}

else if(isset($_REQUEST['age_limit']) && !empty($_REQUEST['age_limit']) && $_REQUEST['age_limit'] == '1')
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


else if(isset($_POST['percentage'])){

	if(empty($_POST['percentage']))
	{
		$percentage = '0';
	}
	else
	{	
		$percentage=$_POST['percentage'];
	}
	
	$usercells=$_POST['cells'];
//echo $usercells."<br/>";die;
	$usercells=explode(',', $usercells);
	#echo "<pre>";print_r($usercells);
	#echo "<pre>";
	$usercellcount=count($usercells);

	//$all=$users->select_allrecords('tbl_singup','*');


	$query = "SELECT * FROM tbl_singup ";

	//die;
	$all = mysqli_query($con, $query);
	
	while ($value = mysqli_fetch_assoc($all)) {
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
}


else if(isset($_REQUEST['intrestcell']))
{
	$where .=" AND B.id IN (".implode(',', $id).") AND B.cell_id LIKE'".$_REQUEST['intrestcell']."%'";
}

else if(isset($_REQUEST['searchreligion']))
{
	$where .=" AND B.id IN (".implode(',', $id).") AND B.religion LIKE'".$_REQUEST['searchreligion']."%'";
}
else if(isset($_REQUEST['searchcoworker']))
{
	$where .=" AND B.id IN (".implode(',', $id).") AND B.coworker LIKE'".$_REQUEST['searchcoworker']."%'";
}

else if(isset($_REQUEST['lastlog']) && !empty($_REQUEST['lastlog']))
{
	$where .=" ORDER BY B.last_login DESC LIMIT 1";
}


// echo $where; die;

if(!empty($_SESSION['user_id'])){
		$fid = $_SESSION['user_id'];
	}else{
		$fid = '';
	}
	
	

// $usersdetails=$user->select_records('tbl_singup','*',$where);
	$usersdetails = array();
	$query = "select A.id, A.u_id, A.f_id, B.*
		from tbl_friend A 
		LEFT JOIN tbl_singup B on B.id = A.f_id 
		where  A.u_id = '".$fid."' AND A.flage = 1 ".$where."
		UNION ALL
		select A.id, A.u_id, A.f_id, B.*
		from tbl_friend A 
		LEFT JOIN tbl_singup B on B.id = A.u_id 
		where  A.f_id = '".$fid."' AND A.flage = 1 ".$where." ";
		
	$result = array();
	$result = mysqli_query($con, $query);
	if(isset($result) && $result != null ){
		$iNumRows = mysqli_num_rows($result);
		while ($data = mysqli_fetch_assoc($result)) {
			$usersdetails[] = $data;
		}
	}
	

?>
	<div class="post-viwe">

		<?php 
			
			//echo "<pre>"; print_r($query); "<pre>"; die();

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
			<label class="col-xs-3">State <span>
				<?php echo $val['city'];?></span> 
			</label>
			<label class="col-xs-3">City <span>
				<?php echo $val['other_city'];?></span> 
			</label>
			<label class="col-xs-3">Country  <span>
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