<?php
require_once("classes/cls-country.php");
if (isset($_GET['id'])) {
    $delete_ids = base64_decode($_GET['id']);
}
$obj_country = new Country();
$condition = "`country_id` in(" . $delete_ids . ")";
$all_country = $obj_country->deletecountry($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> Country has been deleted successfully.";
header("location:view-countrylist.php");
?>