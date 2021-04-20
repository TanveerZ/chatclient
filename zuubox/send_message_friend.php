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

#echo "<pre>";print_r($_REQUEST);die;
//$f_id = $_REQUEST['f_id'];

if($_REQUEST['user_id']){

	foreach ($_REQUEST['user_id'] as $friendValue) {
			
		$where = "id = ".$friendValue;
		$fields="email";
		$table="tbl_singup";

		$data = $user->select_records($table,$fields,$where);

		if(isset($_POST['title']))
		{
			
			$title 	   = mysqli_real_escape_string($con, $_POST['title']);
			$recipient = mysqli_real_escape_string($con, $_POST['recipient']);
			$message   = mysqli_real_escape_string($con, $_POST['description']);

			$sql = "insert into tbl_message set u_id = '".$_SESSION['user_id']."',
				 							    f_id  = '".$friendValue."',
				 							    title = '".$_POST['title']."',
				 							    description = '".$_POST['description']."',
				 							   	date = '".date('Y-m-d')."',
				 							   	time = '".date('H:i:s')."'";
			$query = mysqli_query($con, $sql );
			if (!$query) {
			    die('Invalid query: ' . mysqli_error($con));
			} else {
				$to = $data[0]['email'];
				//$to = "mohd.kadir@dotsquares.com";
				echo $subject = "New message";

				$headers = "MIME-Version: 1.0\n";
				$headers .= "Content-type: text/html; charset=iso-8859-1\n";
				$headers .= "From: Our Weekly Sale <info@ourweeklysale.com>\n";
				$headers .= "X-Mailer: PHP's mail() Function\n";
				$mail_sent = mail($to, $subject, $message, $headers);
				if($mail_sent){
					//die('mail sent');
				}
			}
		}
	}
}
?>