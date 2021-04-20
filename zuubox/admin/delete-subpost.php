<?php
require_once("classes/cls-subscribepost.php");
if (isset($_GET['id'])) {
    $delete_ids = base64_decode($_GET['id']);
}
$obj_subpost = new Subscribepost();
$condition = "`id` in(" . $delete_ids . ")";
$all_owner = $obj_subpost->deletesubpost($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> Subscriber post has been deleted successfully.";
header("location:view_subscribepost.php");
?>