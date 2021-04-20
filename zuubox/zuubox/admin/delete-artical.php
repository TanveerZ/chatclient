<?php
require_once("classes/cls-artical.php");
if (isset($_GET['id'])) {
    $delete_ids = base64_decode($_GET['id']);
}
$obj_artical = new Artical();
$condition = "`id` in(" . $delete_ids . ")";
$all_owner = $obj_artical->deleteartical($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> Artical information has been deleted successfully.";
header("location:view_artical.php");
?>