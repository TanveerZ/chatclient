<?php

//error_reporting(0);
if ($_SERVER['HTTP_HOST'] == "localhost") {
	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', 'codesevenstudio');
	//define('SITEPATH', 'http://zuubox.local/');
	define('SITEPATH', 'http://localhost/zubox/');
} else {

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'zuuboxco_eli');
	define('DB_PASSWORD', 'Qawsed@123');
	define('DB_DATABASE', 'zuuboxco_DB');
	define('SITEPATH', 'https://zuubox.com/');
}

class DB_Class {

	function __construct() {
		$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die('Oops connection error -> ' . mysqli_error($connection));
		//print_r($connection); die();
		//mysqli_select_db($connection, DB_DATABASE) or die('Database error -> ' . mysqli_error());

		//return $connection;
	}
	public function db_connection() {
		$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die('Oops connection error -> ' . mysqli_error($connection));

		return $connection;
	}

}

date_default_timezone_set('Asia/Kolkata');
?>
