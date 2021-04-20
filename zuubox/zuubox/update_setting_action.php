<?php	
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();
$updated_date=date('Y-m-d');
$uid = $_SESSION['user_id'];

/*-- update name & surname --*/
if(isset($_POST['name']) && trim($_POST['name'])!='')
{
	if(isset($_POST['surname']) && trim($_POST['surname'])!='')
	{
		$name = $_POST['name'];
		$surname = $_POST['surname'];
		$values=array($name,$surname,$updated_date);
		$fields=array('first_name','last_name','updated_date'); 	
		$update = $user->Update_Dynamic_Query('tbl_singup',$values,$fields,'id',$uid);
	}
}

/*-- update username --*/
if(isset($_POST['username']) && trim($_POST['username'])!='')
{
    $uname = $_POST['username'];

	$values=array($uname,$updated_date);
	$fields=array('username','updated_date'); 	
	$update = $user->Update_Dynamic_Query('tbl_singup',$values,$fields,'id',$uid);

}

/*-- update contact --*/
if(isset($_POST['contact']) && trim($_POST['contact'])!='')
{
    $contact = $_POST['contact'];

	$values=array($contact,$updated_date);
	$fields=array('phoneno','updated_date'); 	
	$update = $user->Update_Dynamic_Query('tbl_singup',$values,$fields,'id',$uid);

}

/*-- update contact --*/

if(isset($_POST['email']) && trim($_POST['email'])!='')
{
    $email = $_POST['email'];

	$values=array($email,$updated_date);
	$fields=array('email','updated_date'); 	
	$update = $user->Update_Dynamic_Query('tbl_singup',$values,$fields,'id',$uid);

}

/*-- update password --*/
if(isset($_POST['password']) && trim($_POST['password'])!='')
{
    if(isset($_POST['repassword']) && trim($_POST['repassword'])!='')
	{
    $password =base64_encode($_POST['password']);
    $repassword =base64_encode($_POST['repassword']);

	$values=array($password,$repassword,$updated_date);
	$fields=array('password','pw_confirm','updated_date'); 	
	$update = $user->Update_Dynamic_Query('tbl_singup',$values,$fields,'id',$uid);
	}
}

?>