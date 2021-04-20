<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();
	
   		if ($_SERVER['HTTP_HOST'] == "localhost") {

	$SERVER = 'localhost';
	$USERNAME = 'root';
	$PASSWORD = '';
	$DATABASE = 'codesevenstudio';
} else {
	$SERVER = 'localhost';
	$USERNAME = 'zuuboxco_eli';
	$PASSWORD = 'Qawsed@123';
	$DATABASE = 'zuuboxco_DB';
}

$con = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE) or die('Oops connection error -> ' . mysqli_error($con));
		
if($_POST['action'] == 'bookmark'){

	if(isset($_POST['u_id']) && ($_POST['f_id'] !='')){
		$query = "SELECT * FROM tbl_bookmark WHERE u_id = '".$_POST['u_id']."' AND f_id = '".$_POST['f_id']."'";
		$result = mysqli_query($con, $query);
		$getUser = mysqli_fetch_assoc($result);
		if(empty($getUser)){
			$insert_id = $user->insert_records('tbl_bookmark',array("u_id"=>$_POST['u_id'],"f_id"=>$_POST['f_id'],));
			$message = "Successfully added your bookmark list.";
			echo $message;
		}	
	}else{
		$message = "Error add bookmark list.";
		echo $message;
	}

}elseif ($_POST['action'] == 'remove_friend'){
 
 //A.f_id = '".$fid."' || A.u_id = '".$fid."' 

	if(isset($_POST['user_id'])){
		$query = "DELETE FROM tbl_friend WHERE (u_id = '".$_POST['user_id']."' && f_id = '".$_POST['friend_id']."') || (f_id = '".$_POST['user_id']."' && u_id = '".$_POST['friend_id']."')";
		mysqli_query($con, $query);
		$message = $query;
		echo $message;
	}else{
		$message = "Error delete friend.";
		echo $message;
	}

}else{

	if(isset($_POST['u_id']) && (!empty($_POST['f_id'])) ){
		$query = "SELECT * FROM tbl_friend WHERE u_id = '".$_POST['u_id']."' AND f_id = '".$_POST['f_id']."'";
		$result = mysqli_query($con, $query);
		$getUser = mysqli_fetch_assoc($result);
		if(empty($getUser)){
			$insert_id = $user->insert_records('tbl_friend',array("u_id"=>$_POST['u_id'],"f_id"=>$_POST['f_id'],"date"=>date("Y-m-d"),"time"=>date("H:i:s")));
			$message = "Successfully added your friend list.";
			echo $message;
		}	
	}else{
		$message = "Error add friend list.";
		echo $message;
	}

}


