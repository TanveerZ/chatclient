<?php
require_once("classes/cls-country.php");

$obj_country = new Country();

	 $id = $_REQUEST['id'];

 $condition="country_name = '".$id."'";
$data=$obj_country->getcountry('*', $condition, '', '', 0);

if($data)
{
	echo "Country allready Exits";
}
 
?>