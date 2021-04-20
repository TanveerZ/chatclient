<?php
require_once("classes/cls-logo.php");
$obj_logo = new Logo();

if (isset($_POST['submit']))
{
	if(isset($_FILES['logo']['name']) && $_FILES['logo']['size'] > 0)
	{
		$uploaddir = '../uploads/Logo/';

		$ext            = end(explode(".", basename($_FILES['logo']['name']) ));
		$filename       = time() . mt_rand().".".$ext;
		$uploadfile     = $uploaddir . $filename;
		  
		if(move_uploaded_file($_FILES['logo']['tmp_name'], $uploadfile))
		{ 
			// $logo_path = SITEROOT."uploads/Logo/".$filename;
			$logo_path = "uploads/Logo/".$filename;

	        $obj_logo->updateLogo(array("logo_path"=>$logo_path,"added_dt"=>date("Y-m-d H:i:s")), "`id` = '1'", 0);
	        
	        $_SESSION['success'] = "Site Logo changed successfully.";
	        header("location:manage-logo.php");
	        exit();
		   
		}
		else
		{
			$_SESSION['error'] = "Sorry, Problem in uploading Logo.";
		    header("location:manage-logo.php");
		    exit();
		}
		
	}
}

?>