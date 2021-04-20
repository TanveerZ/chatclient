 <?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();

if(isset($_POST['id']))
{
	$id=$_POST['id'];
	$query=$user->delete_row('tbl_userevents','event_id = '.$id);
	 $_SESSION['event_msg']=3;
     $_SESSION['success_event'] = "You have successfully delete event.";
     
  	exit();

  	

}
?>