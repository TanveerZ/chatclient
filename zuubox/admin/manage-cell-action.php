<?php
require_once("classes/cls-cell.php");
$obj_cell = new cell();
if ($_POST['update_type'] == "add") 
{
if (isset($_POST['submit']))
{
	 $cell=$_POST['cell'];
//echo $cell; die();
	 $obj_cell->insertCell(array("cell_name"=>$cell,"add_date"=>date("Y-m-d H:i:s")));

	 	   $_SESSION['success'] = "Add cell successfully.";
	        header("location:manage-cell.php");
	        exit();
}
}
else
{
			$condition = "`cell_id` = '" . base64_decode($_POST['cell_id']) . "'";
			$update_data['cell_name']=$_POST['cell'];
	 		$update_data['add_date'] = date('Y-m-d H:i:s'); 
	 		$obj_cell->updatecell($update_data, $condition, 0);

	 		$_SESSION['success'] = "Update cell successfully.";
	        header("location:manage-cell.php");
	        exit();
}





?>