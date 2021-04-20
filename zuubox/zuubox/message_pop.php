<?php 
if(isset($_SESSION['user_id']))
{
    
}
else
{
    session_start();
}

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

  $query = "SELECT tm.id as id, tm.u_id as u_id, tm.f_id as f_id, tm.title as title,
            tm.description as description, ts.first_name as first_name, ts.last_name as last_name FROM tbl_message  tm LEFT JOIN tbl_singup ts on tm.f_id = ts.id
            WHERE ( u_id = '".$_SESSION['user_id']."' OR f_id = '".$_SESSION['user_id']."') ORDER BY tm.id desc";
//echo print_r($query); die();
  $result = mysqli_query($con, $query);
  $iNumRows = mysqli_num_rows($result);
  if ($iNumRows > 0) {
      while ($data = mysqli_fetch_assoc($result)) {
        $aUserData2[] = $data;
      }
    } else {
      $_SESSION['sessionMsg'] = "No Data Found";
      $aUserData2[] = 'no data';
    }

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

                      <h2>Messages</h2>
                      <?php
                       //  $where="id='".$uid."'";
                       //  $gen_acc=$user->select_records('tbl_singup','*',$where);
                       // foreach ($aUserData as $val) {
                       //  }
                      ?>

                        <div class="panel-group msgpopup" id="accordion123">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                              
                                <div class="row" >
                                <div class="col-xs-6">Message title
                                </div>
                                <div class="col-xs-4">Recipient Name
                                </div>
                                <div class="col-xs-2"><a href="#" class="edit-btn"># 
                                </a></div>
                                </div>
                              </div>

                                  <?php 
                                  if ($iNumRows > 0) {
                                    foreach ($aUserData2 as $val) { 
                                    // echo "<pre>"; 
                                    // print_r($val); 
                                  ?>
                                	 <div class="row" style="margin-top: 10px!important;">
                                    <div class="col-xs-6"><?php echo $val['title']; ?>
                                    </div>
                                    <div class="col-xs-4"><?php echo $val['first_name']." " .$val['last_name']; ?>
                                    </div>
                                    <div class="col-xs-2"><a href="#" onclick = "msgDetail('<?php echo $val['id']; ?>')" class="edit-btn" style="color: #337ab7">Read More 
                                    </a></div>
                                    </div>
                                   <?php } }?>

                               
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
    
    function msgDetail( msgid) {

    // alert( msgid );

    $.ajax({
      type:"POST",
      url:"message_thread.php",
      data:{msgid:msgid},
      success:function(result){                     
        
        // alert( result );
       $('.message_thread').html( result );
        $('.messagesd .allmessage').hide();
        $('.mm').html(result);
        $('.message_thread').show(); 
        $('.msgthreaduser').show(); 
        $                   
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