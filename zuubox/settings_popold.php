<?php	
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();
$current_date=date('Y-m-d');

?>
<link rel="stylesheet" href="css/settings.css">
<form class="settings" method="post" enctype="multipart/form-data" <?php if($_SESSION['history']==1){?> style="display:block" <?php }?>>
<div class="recent-box-sc">
  <div class="month_title">
      <img src="img/setting_header.PNG" class="img-responsive">
      <div class="window-btn window-btn2">
    	  <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
    </div>
    </div>
   
  <!-- 	<a class="close-btn pull-right" style="top: -2px;
    right: -1px;">x</a> -->
	
<div class="col-xs-12">
<div class="row">
<?php
    echo "<div class='col-lg-1 col-xs-1'></div>";
    echo "<div class='col-lg-11 col-xs-11'>";
     echo "<div style='float:left;'><strong>Change Language :</strong> </div>";
    echo "<span id='google_translate_element' style='float:left;margin-left: 5px;
    margin-top: -4px;'></span>";
    echo "</div>";

    
?>

    <div class="col-lg-3 col-xs-3">
        <ul class="nav nav-tabs scroll-rtl text-center">
            <li id="genralacc" class="sub-setting">General Account Settings</li>
            <li id="manageacc" class="sub-setting">Manage Account</li>
            <li id="menusetting" class="sub-setting">Menu settings</li>
            <li id="menuitem" class="sub-setting">Set up menu items</li>
            <li id="profilesetting" class="sub-setting">Profile settings</li>
            <li id="giftsection" class="sub-setting">Hide gifts section</li>
            <!-- <li id="langtransleter" class="sub-setting">Language Transleter</li> -->
            
        </ul>
    </div>

    <div class="col-xs-9">
        <div class="mainsetting">

        </div>
    </div>


</div>
</div>



 


<!-- <div id="google_translate_element"></div> -->


</form>

<script type="text/javascript">
    
    $('ul li').click(function() {    
    var id = $(this).attr('id');
   

       $.ajax({
         type:"POST",
        url:"setting_popajax.php",
        data:{id:id},
        success:function(result){
            
$(".mainsetting").html(result);
                
        }
        });
            $('ul li').removeClass('active');
            $(this).addClass('active');
            
});
    function currendata(){
        var id='genralacc';
        $.ajax({
         type:"POST",
        url:"setting_popajax.php",
        data:{id:id},
        success:function(result){
            $(".mainsetting").html(result);

        }
        });
    }
    currendata();
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