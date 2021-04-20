<?php

require_once("classes/cls-city.php");



$obj_city = new City();



	 $id = $_REQUEST['id'];



 $condition="city_name = '".$id."'";

$data=$obj_city->getcity('*', $condition, '', '', 0);



if($data)

{

	echo "City already exists";

}

 

?>