<?php
require_once("classes/cls-adminvideo.php");
if (isset($_GET['adve_id'])) {
   $delete_ids = base64_decode($_GET['adve_id']);
}

$obj_adve = new Adminvideo();
$condition = "`adve_id` in(" . $delete_ids . ")";
$all_adve = $obj_adve->deleteadminvideo($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> Video has been deleted successfully.";
header("location:view_videolist.php");
?>