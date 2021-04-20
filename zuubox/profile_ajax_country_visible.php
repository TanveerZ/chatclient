<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();

$uid=$_SESSION['user_id'];


if(isset($_POST['flage']))
{
	//echo "<pre>"; print_r($_POST['flage']); 
	$flage=$_POST['flage'];

	$fields=array('is_country_visible');
	$values=array($flage);
	$data=$user->Update_Dynamic_Query('tbl_singup',$values,$fields,'id',$uid);		
	
	//echo 'success';
}
?>