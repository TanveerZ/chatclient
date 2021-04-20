<?php
require_once("classes/cls-cell.php");
if (isset($_GET['cell_id'])) {
    $delete_ids = base64_decode($_GET['cell_id']);
}
$obj_cell = new Cell();
$condition = "`cell_id` in(" . $delete_ids . ")";
$all_owner = $obj_cell->deletecell($condition, 0);
$_SESSION['success'] = "<strong>Congratulations</strong> Employee information has been deleted successfully.";
header("location:manage-cell.php");
?>