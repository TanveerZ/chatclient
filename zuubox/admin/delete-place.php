<?php
require_once("classes/cls-place.php");
if (isset($_GET['place_id'])) {
    $delete_ids = base64_decode($_GET['place_id']);
}
$obj_place = new Place();
$condition = "`id` in(" . $delete_ids . ")";
$all_owner = $obj_place->deleteplace($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> Place information has been deleted successfully.";
header("location:manage-place.php");
?>