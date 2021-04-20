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

if($_REQUEST['action'] == 'delete'){
    $delete = "DELETE FROM tbl_friend WHERE f_id = '".$_SESSION['user_id']."' AND u_id = '".$_REQUEST['friendId']."'";   
    mysqli_query($con, $delete);
}

if($_REQUEST['action'] == 'confirm'){
    $update = "UPDATE tbl_friend SET flage = '1' WHERE f_id = '".$_SESSION['user_id']."' AND u_id = '".$_REQUEST['friendId']."'";
    mysqli_query($con, $update);

   $sql = "INSERT INTO tbl_friend SET f_id = '".$_REQUEST['friendId']."', u_id = '".$_SESSION['user_id']."', date = '".date("Y-m-d")."', time='".date("H:i:s")."', flage = '1'";
     mysqli_query($con, $sql);
}

?>