<?php
require_once("classes/cls-slidervideo.php");
if (isset($_GET['slider_id'])) {
   $delete_ids = base64_decode($_GET['slider_id']);
}

$obj_slider = new Slidervideo();
$condition = "`slide_id` in(" . $delete_ids . ")";
$all_slider = $obj_slider->deleteslidervideo($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> Video has been deleted successfully.";
header("location:view_slidervideo.php");
?>