<?php
session_start();
require_once("include/config.php");

require_once("include/functions.php");
$user = new User();
$uid=$_SESSION['user_id'];

if(isset($_REQUEST['imgid']))

{
	$imgid = $_REQUEST['imgid'];

	 $where = "id=".$imgid;

  	$data=$user->select_records('tbl_photo_gallary','*',$where);

  	foreach ($data as $row) {

  		$imgpath=$row['photo_path'];

  		$add_date=$row['add_date'];

  		$photo_info=$row['photo_info'];
  	}

  	echo "<img src='".$imgpath."'> </div>";

  	echo '<i class="fa fa-times-circle" id="closezoompopup" aria-hidden="true"></i>';
}
?>
<script type="text/javascript">
	$('#closezoompopup').click(function(){
			$('#imgpop1').css('display', 'none');
		});
</script>