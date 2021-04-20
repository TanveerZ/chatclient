<?php
require_once("classes/cls-menu.php");
if (isset($_GET['menu_id'])) {
    $delete_ids = base64_decode($_GET['menu_id']);
}
$obj_menu = new Menu();
$condition = "`menu_id` in(" . $delete_ids . ")";
$all_owner = $obj_menu->deletemenu($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> menu information has been deleted successfully.";
header("location:manage-menu.php");
?>