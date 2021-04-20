<?php

session_start();

require_once("include/config.php");

require_once("include/functions.php");

$user = new User();

$avitorid=$_REQUEST['avitorid'];

	$where = "id=".$avitorid;

  	$data=$user->select_records('tbl_avitor','*',$where);


  	foreach ($data as $value) {

  		
  		$imgpath=$value['avitor_image'];

  		$avitornm=$value['avitor_name'];

  		$avitor_info=$value['avitor_info'];

  		$add_date=$value['add_date'];

  	}

  	echo "<div class='img-box'><img src='".$imgpath."' class='img-responsive' ></div>";
    
  	echo "<h4>Avitor Details</h4>";

  	echo "Image Name: ".$avitornm."";

  	echo "<br>";

  	echo "Add Date : ".$add_date."";

  	echo "<br>";

  	echo "<h4>Info :</h4><p> ".$avitor_info."</p>";

?>