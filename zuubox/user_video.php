<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();
      //$uid=$_SESSION['user_id'];

$datavideo=$user->select_row('tbl_adminvideo','*');
$vpath=$datavideo['video_path'];
?>

<link rel="stylesheet" href="css/user_video.css">
<form class="user_video" method="post" enctype="multipart/form-data">
<div class="recent-box-sc">  
    	<button class="close-btn pull-right" style="    top: -2px;
    right: -1px;">x</button>
	    <div class="user-head">	    	
	    	<h4>Video</h4>
	    </div>
	   <video width='100%' height='90%' controls>
                <source src=<?php echo $vpath?>></video>

            
	</div>
	 

</form>


<script type="text/javascript">
	$('.user_video').hide(); 
</script>
