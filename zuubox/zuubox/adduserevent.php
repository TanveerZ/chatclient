<?php
session_start();  
  require_once("include/config.php");
  require_once("include/functions.php");
  $user = new User();   
$userid=$_SESSION['user_id'];

        $event_id = $_SESSION['activity_id'];
        $city_id = $_POST['city_id'];
        $eventDisc = $_POST['eventDisc'];        
        $dtime = explode(' ', $_POST['datetime']);
     	$edate=$dtime[0];
        $etime=$dtime[1];
        $query=$user->insert_records('tbl_event_category_master',array("user_id"=>$userid,"event_category_id"=>$event_id,"content"=>$eventDisc,"date"=>$edate,"time"=>$etime,"add_date"=>date("Y-m-d"),"city_id"=>$city_id));
        $result = 1;
 
?>