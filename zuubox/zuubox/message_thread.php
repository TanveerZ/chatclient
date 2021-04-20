<?php

//session_start();
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

if(!empty($_REQUEST['msgid']))
{
    $query = "SELECT tm.u_id as u_id, tm.f_id as f_id from tbl_message as tm
                WHERE id = '".$_REQUEST['msgid']."'";

    $result = mysqli_query($con, $query);
}

    $data = mysqli_fetch_assoc($result);
    
if(!empty($data)){
	$user_id = $data['u_id'];
	$friend_id = $data['f_id'];

		$queryThread = "SELECT tm.id as id, tm.u_id as u_id, tm.f_id as f_id, tm.title as title,
		tm.description as description, ts.first_name as first_name, ts.last_name as last_name FROM tbl_message  tm LEFT JOIN tbl_singup ts on tm.f_id = ts.id
		WHERE (u_id = '".$user_id."' AND f_id = '".$friend_id."') OR (f_id = '".$user_id."' AND u_id = '".$friend_id."') ORDER BY tm.id desc";
		$result1 = mysqli_query($con, $queryThread);

		$iNumRows1 = mysqli_num_rows($result1);
		if ($iNumRows1 > 0) {
		while ($data1 = mysqli_fetch_assoc($result1)) {
			$aThreadData[] = $data1;
		}
		} else {
			$_SESSION['sessionMsg'] = "No Data Found";
		}    	

}
?>
<style type="text/css">
	.msgthreaduser {
    border: 1px solid #000;
    margin: 25px auto;
    padding: 0px;
    padding-right: 0px;
    padding-right: 0px;
    padding-right: 0px;
    background-color: #fff;
    min-width: 870px;
    max-width: 741px;
    text-align: left;
    z-index: 999;
    position: absolute;
    top: 11px;
    height: 500px;
    margin: auto;
    left: 0px;
    right: 0%;
    animation: animateright 0.5s;
    display: none;
}

.msgthreaduser{
    margin-top: 20px;
}

</style>
<link rel="stylesheet" href="css/settings.css">
<div class="mm">
<div class="message_thread">
	<form class="msgthreaduser" method="post" enctype="multipart/form-data" style="display: none;">
		<div class="recent-box-sc">
  <div class="month_title">
      <!-- <img src="img/setting_header.PNG" class="img-responsive"> -->
      <div class="window-btn window-btn2">
    	  <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window-msg-t"></button>
       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window-t"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true" id="restore-window-maximize-t" style="display: none"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window-msg-t"></button>
    </div>
    </div>

    <div class="col-xs-12">
	<div class="row">

    	<div class="col-xs-12 p-add1">
            <div class="bhoechie-tab">
                <div class="bhoechie-tab-content active">
                <h2>Messages</h2>
<?php
   if(!empty($aThreadData)) { 
	foreach ($aThreadData as $val) { ?>
	
			<?php 
			$query2 = "SELECT first_name, last_name from tbl_singup
            WHERE id = '".$val['u_id']."'";

			$result2 = mysqli_query($con, $query2);
			$data2 = mysqli_fetch_assoc($result2);
			// print_r($data2);
			?>

			<div class="row" style="margin-top: 10px!important;">
			<div class="col-xs-12"><?php 
				echo $val['description']; 
				echo "&nbsp;&nbsp;<b> ( By: ".$data2['first_name']." ".$data2['last_name']." )</b>";
			?>
			</div>
		
			</div>
<?php 
	}
}
?>
     </div>  

              </div>
            </div>
          </div>
          </div>
        </div>
</form>
</div>
</div>
<script type="text/javascript">

$('#close-window-msg-t, #minimize-window-msg-t').click( function(){
	//alert("dsfsdf");
	$('.msgthreaduser').hide();
});	


$('#restore-window-t').click(function(){
    $('#restore-window-t').hide();
    $('#restore-window-maximize-t').show();
    $('.msgthreaduser').css("max-width","900px"); 
    $('.msgthreaduser').height('100%');
});
$('#restore-window-maximize-t').click(function(){
    $('#restore-window-maximize-t').hide();
    $('#restore-window-t').show();
    $('.msgthreaduser').css("max-width","30%"); 
    $('.msgthreaduser').height('80%');
});
</script>