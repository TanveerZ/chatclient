<?php
require_once("classes/cls-place.php");
$obj_place = new Place();
if ($_POST['update_type'] == "add") 
{
	if (isset($_POST['submit']))
	{
		 $place=$_POST['place_name'];
		 $lat=$_POST['lat'];
		 $lng=$_POST['lng'];

	//echo $place; die();
		 $obj_place->insertplace(array("place_name"=>$place, 'lat' => $lat, 'lng' => $lng));

		 	   $_SESSION['success'] = "Add place successfully.";
		        header("location:manage-place.php");
		        exit();
	}
}
else
{
		$condition = "`id` = '" . base64_decode($_POST['place_id']) . "'";
		$update_data['place_name']=$_POST['place_name'];
		$update_data['lat']=$_POST['lat'];
		$update_data['lng']=$_POST['lng'];
 		 
 		$obj_place->updateplace($update_data, $condition, 0);

 		$_SESSION['success'] = "Update place successfully.";
        header("location:manage-place.php");
        exit();
}





?>