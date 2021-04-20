<?php	
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();
$current_date=date('Y-m-d');

?>
<style type="text/css">
  .allmessage{
    border: 1px solid #000;
    margin: 25px auto;
    padding: 0px;
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

  .allmessage{
    margin-top: 20px;
  }

   .user-links { display: block; }
  ..user-links a { color:#000; border-radius: 5px; border:1px solid #000; background: #fff; padding:5px 10px; margin-right: 5px; margin-left:0;}
  ..user-links a:hover { color:#555; }
  ..user-links a:last-child { border:1px solid #000; }
</style>

<?php 
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
    
$query = "select A.id,A.u_id,A.u_id, B.* from tbl_friend A LEFT JOIN tbl_singup B on B.id = A.u_id where A.flage = 0 AND A.f_id = '".$_SESSION['user_id']."'";

  $result = mysqli_query($con, $query);
  $iNumRows = mysqli_num_rows($result);
  if ($iNumRows > 0) {
      while ($data = mysqli_fetch_assoc($result)) {
        $aUserData2[] = $data;
      }
    } else {
      $_SESSION['sessionMsg'] = "No Data Found";
    }
#echo "<pre>"; print_r($aUserData2);
?>

<link rel="stylesheet" href="css/settings.css">
<form class="allmessage" method="post" enctype="multipart/form-data">
<div class="recent-box-sc">
  <div class="month_title">
      <!-- <img src="img/setting_header.PNG" class="img-responsive"> -->
      <div class="window-btn window-btn2">
    	  <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window-msg-pkg"></button>
       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window-msg" ></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true" id="restore-window-maximize"  style="display: none;"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window-msg-pkg"></button>
    </div>
    </div>
   
  <!-- 	<a class="close-btn pull-right" style="top: -2px;
    right: -1px;">x</a> -->
	


<div class="col-xs-12" >
	<div class="row">

    	<div class="col-xs-12 p-add1">
            <div class="bhoechie-tab">
                <div class="bhoechie-tab-content active">

                      <h2>Friend Request</h2>
                      <?php
                       //  $where="id='".$uid."'";
                       //  $gen_acc=$user->select_records('tbl_singup','*',$where);
                       // foreach ($aUserData as $val) {
                       //  }
                      ?>

                        <div class="panel-group msgpopup" id="accordion123">
                            <div class="panel panel-default">
                                  <?php 
                                  if (!empty($aUserData2)) {
                                    # code...
                                  
                                    foreach ($aUserData2 as $val) { 
                                    // echo "<pre>"; 
                                    // print_r($val); 
                                      #echo $val['f_id'] .'<>'. $_SESSION['user_id']; 
                                  ?>
                                	 <div class="row" style="margin-top: 10px!important;">
                                    <div class="col-xs-4">
                                      <a href="" class="frdprofile" id="<?php echo $val['id']; ?>"><img height="50" width="" src="<?php echo $val['profile_path'] ?>"></a>
                                    </div>
                                    <div class="col-xs-4"><?php echo $val['first_name'].' '.$val['first_name']; ?></div>     
                                    <div class="col-xs-4 user-links">
                                      <a id="confirm_id" href="#" onclick = "confirmRequest('<?php echo $val['id']; ?>')" class="edit-btn btn btn-success" style="color: #337ab7">Confirm 
                                    </a>
                                    <a style="display: none;" href="javascript:voide(0);" id="confirm_friend_id" class="edit-btn btn btn-success" style="color: #337ab7">Friend
                                    </a>
                                    <a href="#" id="delete_friend_id" onclick = "deleteRequest('<?php echo $val['id']; ?>')" class="edit-btn btn btn-danger" style="color: #337ab7">Delete 
                                    </a>
                                    <a style="display: none;" href="javascript:voide(0);" id="request_removed_id" class="edit-btn btn btn-danger" style="color: #337ab7">Request Removed 
                                    </a>
                                  </div>
                                    </div>

                                   <?php } } else { echo 'There is no friend request.'; } ?>

                               
                              </div>
                            </div>
                          </div>  

              </div>
            </div>
          </div>
          </div>
        </div>

</form>
<script type="text/javascript">
function confirmRequest(fid) {  
  alert(fid);
    $.ajax({
      type:"POST",
      url:"friend_confirm.php",
      data:{'action':'confirm','friendId':fid},
      success:function(result){
        $('#confirm_id').hide();
        $('#delete_friend_id').hide();
        $('#confirm_friend_id').show();
      }
    });
}

function deleteRequest(fid) {  
    $.ajax({
      type:"POST",
      url:"friend_confirm.php",
      data:{'action':'delete','friendId':fid},
      success:function(result){  
        $('#confirm_id').hide();      
        $('#delete_friend_id').hide();
        $('#request_removed_id').show();
      }
    });
}


$('#close-window-msg-pkg, #minimize-window-msg-pkg').click( function(){
  $('.messagesd .allmessage').hide();
});

$('#restore-window-msg').click(function(){
    $('#restore-window-msg').hide();
    $('#restore-window-maximize').show();
    $('.messagesd .allmessage').css("max-width","900px"); 
    $('.messagesd .allmessage').height('100%');
});
$('#restore-window-maximize').click(function(){
    $('#restore-window-maximize').hide();
    $('#restore-window-msg').show();
    $('.messagesd .allmessage').css("max-width","30%"); 
    $('.messagesd .allmessage').height('80%');
});

</script>

<script type="text/javascript">
function googleTranslateElementInit() {
   new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'en,es,ja,de,ru,zh-CN,pt,it,fr',
        
        autoDisplay: false,
        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
    }, 'google_translate_element');
}
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>