<?php
session_start();

if (isset($_POST['activity_id'])) {
	$_SESSION['activity_id'] = $_POST['activity_id'];
	echo $_SESSION['activity_id'];
}