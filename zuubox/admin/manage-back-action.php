<?php
require_once("classes/cls-back.php");
$obj_back = new Back();

if (isset($_POST['submit']))
{
	if (count($_FILES['logo']['name']) >0) {
		$Kv = 0;
		$obj_back->deleteBack("1",0);
		foreach($_FILES['logo']['name'] as $filenameee) {
			//if(isset($_FILES['logo']['name']) && $_FILES['logo']['size'] > 0)
			//{
				$uploaddir = '../uploads/';

				$ext            = end(explode(".", basename($filenameee)));
				$filename       = time() . mt_rand().".".$ext;
				$uploadfile     = $uploaddir . $filename;
				  
				if(move_uploaded_file($_FILES['logo']['tmp_name'][$Kv], $uploadfile))
				{ 
					// $back_path = SITEROOT."uploads/".$filename;
					$back_path = "uploads/".$filename;
					$Kv++;
			        $obj_back->insertBack(array("back_path"=>$back_path,"added_dt"=>date("Y-m-d H:i:s")), 0);
			        // $obj_back->updateBack(array("back_path"=>$back_path,"added_dt"=>date("Y-m-d H:i:s")), "1",0);
			        
			        $_SESSION['success'] = "Site Background changed successfully.";
		   			$_SESSION['error'] = "";
				}
				else
				{
					$_SESSION['error'] = "Sorry, Problem in uploading back.";
					$_SESSION['success'] = "";
				    // header("location:manage-back.php");
				    // exit();
				}
				
			//}
		}
		header("location:manage-back.php");
		exit();
	}
}
?>