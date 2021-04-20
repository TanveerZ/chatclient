<?php
require_once("classes/cls-avitor.php");
if (isset($_GET['id'])) {
    $delete_ids = base64_decode($_GET['id']);
}
$obj_avitor = new Avitor();
$condition = "`id` in(" . $delete_ids . ")";
$all_owner = $obj_avitor->deleteavitor($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> Event has been deleted successfully.";
header("location:view_avitor.php");
?>