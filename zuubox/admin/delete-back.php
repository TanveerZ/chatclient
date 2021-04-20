<?php
require_once("classes/cls-back.php");
if (isset($_GET['idimg'])) {
   $delete_ids = base64_decode($_GET['idimg']);
}
 
$obj_slider = new Back();
$condition = "`bid` in(" . $delete_ids . ")";
$all_slider = $obj_slider->deleteBack($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> Image has been deleted successfully.";
header("location:manage-back.php");
?>