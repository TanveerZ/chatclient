<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");

$user = new User();

$uid=$_SESSION['user_id'];

if(isset($_POST['bio']))
{
	$bio=$_POST['bio'];
	$current_date=date('Y-m-d');
	$fields=array('bio','update_section','add_date');
	$values=array($bio,'Profile About Information', $current_date);	
	$data=$user->Update_Dynamic_Query('tbl_singup', $values, $fields,'id',$uid);
	
	//echo $data; 

	$where = "id=".$uid;
	$fields="*";
	$table="tbl_singup";
	$data=$user->select_records($table,$fields,$where);

	foreach ($data as $rows) {

	}
}
?>
	<strong>About me</strong>
	<p>
		<?php echo $rows['bio'];?>				
	</p>