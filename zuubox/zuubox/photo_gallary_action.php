<?php
session_start();
require_once("include/config.php");

require_once("include/functions.php");
$user = new User();
$uid=$_SESSION['user_id'];

if(isset($_FILES['file']['name']))

{

	$photoinfo=$_REQUEST['photoinfo'];

	$src = $_FILES['file']['tmp_name'];

	$targ = "uploads/Photo-Gallary".$_FILES['file']['name'];

	if(isset($_FILES['file']['name']) && $_FILES['file']['size'] > 0)
        {
        	$uploaddir  = 'uploads/Photo-Gallary/';
        	$exp = explode(".", basename($_FILES['file']['name']));
        	$ext      = end($exp);
            $filename   = time() . mt_rand().".".$ext;
            $uploadfile = $uploaddir . $filename;
            $file_type = $_FILES['file']['type'];      
	        if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
                {                                         	
					$user->insert_records('tbl_photo_gallary',array('user_id'=>$uid,'photo_path'=>$uploadfile,'photo_info'=>$photoinfo,'add_date'=>date('Y-m-d')));
                }             

                $photogallary = $user->select_allrecords('tbl_photo_gallary','*');
	    }
}


?>
	<div class="col-xs-2">
		<?php
		if(!empty($photogallary))
		{
			$photo_count=count($photogallary);					
			foreach($photogallary as $photogallary)
					{
						 for($i=1; $i <= 1; $i++){	

						echo "<label> <img src='".$photogallary['photo_path']."' id='".$photogallary['id']."' class='imggallary img-responsive'> </label>";	

					if(($photo_count % $i) == 0) {	
					
						echo "</div><div class='col-xs-2'>";
						}
					}
				}
				}?>
	</div>

<?php

if(isset($_REQUEST['imgid']))
{
	$imgid = $_REQUEST['imgid'];

	 $where = "id=".$imgid;

  	$data=$user->select_records('tbl_photo_gallary','*',$where);
	
	if(!empty($data)){
		
		foreach ($data as $row) {

			$imgpath=$row['photo_path'];

			$add_date=$row['add_date'];

			$photo_info=$row['photo_info'];
		}

		echo "<div class='img-box'> <img src='".$imgpath."' class='img-responsive' > </div>";

		echo "<h4>Photo Gallary</h4>";

		$imgname=explode('/', $imgpath);

		echo "Image Name: ".$imgname[2]."";

		echo "<br>";

		echo "Add Date : ".$add_date."";

		echo "<br>";

		echo "<h4>Info :</h4><p> ".$photo_info."</p>";
	}
}
?>

<script type="text/javascript">
	$('.imggallary').click(function(){

		var imgid=$(this).attr('id'); 
		$.ajax({
	         type:"POST",
	        url:"photo_gallary_action.php",
	        data:{imgid:imgid},
	        success:function(result){
	        	
	       	$(".photoshow").html(result); 
	        
	        }
	        });

	});
</script>