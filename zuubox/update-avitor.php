<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();

$uid=$_SESSION['user_id'];
if(isset($_POST['avitorimg']))
{
	$avitorimg=$_POST['avitorimg'];
	$update_date=date('Y-m-d');
	$fields=array('avitor_image','update_section','add_date');
	$values=array($avitorimg,'Avitor Image Update',$update_date);
	$data=$user->Update_Dynamic_Query('tbl_singup',$values,$fields,'id',$uid);		

}

?>