<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();

if(isset($_POST['id']))
{
	$id=$_POST['id'];

	$where = 'id = '.$id;

	$audiorows = $user->select_row('tbl_profile_audio','*',$where);
	
	$path = $audiorows['audio_path'];
	$audionm=explode('Audio/', $path);
	$audioname=$audionm[1];
			

}
?>

 
	<audio controls="controls">
	 <source src="<?php echo $path; ?>" type="audio/mp3">						 
	</audio> 
	<br>
	<center><?php echo $audioname;?></center>