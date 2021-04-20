<?php
require_once("classes/cls-usercell.php");

if (isset($_GET['id'])) {
    $delete_ids = base64_decode($_GET['id']);

$obj_section = new Usercell();
$condition = "`id` = " . base64_decode($_GET['id']) ;
$update_data['status'] = 1;


$all_owner = $obj_section->updatecellsection($update_data, $condition, 0);

$_SESSION['success'] = "<strong>Congratulations</strong> User cell section has been approved successfully.";


header("location:view_usercell.php");
exit();
}

?>