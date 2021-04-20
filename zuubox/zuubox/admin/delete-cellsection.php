<?php
require_once("classes/cls-cellsection.php");

if (isset($_GET['id'])) {
    $delete_ids = base64_decode($_GET['id']);

$obj_section = new Cellsection();
$condition = "`id` in(" . $delete_ids . ")";
$all_owner = $obj_section->deletecellsection($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> Artical information has been deleted successfully.";
header("location:view_section1.php");
}

if (isset($_GET['id2'])) {
    $delete_ids = base64_decode($_GET['id2']);

$obj_section = new Cellsection();
$condition = "`id` in(" . $delete_ids . ")";
$all_owner = $obj_section->deletecellsection($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> Artical information has been deleted successfully.";
header("location:view_section2.php");
}

if (isset($_GET['id3'])) {
    $delete_ids = base64_decode($_GET['id3']);

$obj_section = new Cellsection();
$condition = "`id` in(" . $delete_ids . ")";
$all_owner = $obj_section->deletecellsection($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> Artical information has been deleted successfully.";
header("location:view_section3.php");
}




if (isset($_GET['idimg'])) {
    $delete_ids = base64_decode($_GET['idimg']);

$obj_section = new Cellsection();
$condition = "`id` in(" . $delete_ids . ")";
$all_owner = $obj_section->deletecellsection($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> Artical information has been deleted successfully.";
header("location:view_cellslider.php");
}

?>