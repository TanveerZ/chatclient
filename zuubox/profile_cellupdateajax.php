<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");

$user = new User();

$uid=$_SESSION['user_id'];

if(isset($_POST['cellid']))
{

	$current_date=date('Y-m-d');
	$cellid=$_POST['cellid'];
	 
	$fields=array('cell_id','update_section','add_date');
	$values=array($cellid,'Profile Cell Information',$current_date);		
	$data=$user->Update_Dynamic_Query('tbl_singup',$values,$fields,'id',$uid);

$where = "id=".$uid;
$fields="*";
$table="tbl_singup";
$data=$user->select_records($table,$fields,$where);

foreach ($data as $rows) {
}

$cell_id = $rows['cell_id'];
$where="cell_id in(".$cell_id.")";

	$fields="*";
	$table="tbl_cell";
	/*-- select registraion time cell --*/
	$datacell=$user->select_records($table,$fields,$where);
}

?>


	
		<?php 
			$n=count($datacell);
			foreach($datacell as $row)
			{
				$id=$row['id'];
				 for($i=1; $i <= 1; $i++){?>
					<label class="interest" style="display: block;">
					
					<?php
						echo '-'.' '.$row['cell_name'];
						echo "</label>";
					?>  
					<?php  if(($n % $i) == 0) {
			  
				} ?>
				 <?php }
			}
		 ?> 

