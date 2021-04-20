<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();
  $uid=$_SESSION['user_id'];
  $page=$_POST['id'];
  $url=$_POST['url'];
  $pageurl=$url.'#'.$page;

 date_default_timezone_set('Asia/Calcutta'); 
		$add_date=date('Y-m-d');
		$add_time=date('h:i',time());	 	
	 		$visituser=$user->insert_records('visit_pages',array('user_id' =>$uid,'page_name'=>$pageurl,'add_date'=>$add_date,'add_time'=>$add_time ));


?>