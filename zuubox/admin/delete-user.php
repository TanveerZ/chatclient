<?php
require_once("classes/cls-user.php");
if (isset($_GET['user_id'])) {
    $delete_ids = base64_decode($_GET['user_id']);
}

$obj_user = new User();
$condition = "id in(" . $delete_ids . ")";
$all_owner = $obj_user->deleteuser($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> User information has been deleted successfully.";
header("location:manage-user.php");

?>