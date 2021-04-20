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

if($_REQUEST['action'] == 'userEmail'){
	$email=$_REQUEST['email'];
	$whereemail="email='".$email."'";
	$query = "select email from tbl_singup where $whereemail ";	
	$result = mysqli_query($con, $query);
	$data = mysqli_fetch_assoc($result);	

	if(!empty($data)){
		echo "1";		
	}
	die;
}

if($_REQUEST['action'] == 'user'){
	$username = $_REQUEST['username'];
	$whereUsername="username='".$username."'";
	$query = "select username from tbl_singup  where $whereUsername ";	
	$result = mysqli_query($con, $query);
	$data = mysqli_fetch_assoc($result);	

	if(!empty($data)){
		echo "1";		
	}
	die;
}


// $countrynm=$_REQUEST['countrynm'];
// /*get country id*/
// $where="country_name='".$countrynm."'";
// $getcountryid=$user->select_records('tbl_country','*',$where);
// $counrey_id=0;
// foreach ($getcountryid as $row) {
// 	# code...
// 	$counrey_id=$row['country_id'];	
// }
//$counrey_id=$row['country_id'];	
/*get city list*/
$wherecity=" 1=1";
$citylist=$user->select_records('states','*',$wherecity);
?>
<select name="city">
	<?php
		foreach ($citylist as $row) {		
			echo "<option value='".$row['name']."'>".$row['name']."";			
		}
		echo "<option value='other'>Other</option>";
		
	?>
</select>
