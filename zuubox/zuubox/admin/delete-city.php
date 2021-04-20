<?php
require_once("classes/cls-city.php");
if (isset($_GET['id'])) {
   
    $country_id = base64_decode($_GET['countryid']);
    $delete_ids = base64_decode($_GET['id']);
}
$obj_city = new City();
$condition = "`city_id` in(" . $delete_ids . ")";
$all_city = $obj_city->deletecity($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> City has been deleted successfully.";
 header("location:view-citylist.php?id=".base64_encode($country_id));
?>