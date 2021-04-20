<?php 
if(session_id() == ''){
	session_start();
}
require_once("include/config.php");
require_once("include/functions.php");

$user = new User();

$user_id = $_SESSION['user_id'];

$cell_id = $_REQUEST['cell_id'];
$section_id = $_REQUEST['section_id'];

$data = [
		'user_id' 	=> $user_id,
		'cell_id' 	=> $cell_id,
		'section_id'=> $section_id,
		'text'      => $_REQUEST['sectionDisc'],
		'status'   	=> 0
	];

$values = [
	$_REQUEST['sectionDisc'],0
];

$fields = [
	'text','status'
];

if (isset($_FILES['sectionImg']['name']) && $_FILES['sectionImg']['size'] > 0) {
	
	//foreach($_FILES['sectionImg']['name'] as $filenameee) {
		//if(isset($_FILES['sectionImg']['name']) && $_FILES['sectionImg']['size'] > 0)
		//{
			$uploaddir = 'uploads/user-cell/';

			$name           = $_FILES['sectionImg']['name'];
			$nameArr        = explode(".", basename($name));
			$ext            = end($nameArr);
			$filename       = time() . mt_rand().".".$ext;
			$uploadfile     = $uploaddir . $filename;
			  
			if(move_uploaded_file($_FILES['sectionImg']['tmp_name'], $uploadfile))
			{ 
				// $back_path = SITEROOT."uploads/".$filename;
				$img_path = "uploads/user-cell/".$filename;
				$data['image-path'] = $img_path;
				array_push($values,$img_path);
				array_push($fields,'image-path');
			}
			else
			{
				$response['msg'] = "Image not uploaded.";
				echo json_encode($response);
				exit();
			}
			
		//}
	//}
}

$where = "cell_id=".$cell_id." AND user_id=".$user_id." AND section_id=".$section_id;
$userCellData=$user->select_records('tbl_user_cell','*', $where);

if($userCellData == null ){
	//insert
	$insertedId = $user->insert_records('tbl_user_cell',$data);
	if($insertedId){
		$response['msg'] = "Section details added successfully.";
	}
}else{
	//update
	$id = $userCellData[0]['id'];

	$data=$user->Update_Dynamic_Query('tbl_user_cell',$values,$fields,'id',$id);		
	$response['msg'] = "Section details updated successfully.";
}
echo json_encode($response);
exit();
?>