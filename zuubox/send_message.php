<?php
error_reporting(E_ALL);
session_start();
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
		
$query = "select B.id,B.username from tbl_friend A LEFT JOIN tbl_singup B on B.id = A.f_id where A.u_id = '".$_SESSION['user_id']."'";
$result = mysqli_query($con, $query);
$iNumRows = mysqli_num_rows($result);
if ($iNumRows > 0) {
	$aUserData = array('');
	while ($dataFriend = mysqli_fetch_assoc($result)) {			
		$aUserData[] = $dataFriend;
	}
	//return $aUserData;
}

if(isset($_REQUEST['f_id']))
{
	$uid = $_REQUEST['f_id'];
}
$where = "id = ".$uid;
$fields="*";
$table="tbl_singup";

$data = $user->select_records($table,$fields,$where);

?>
<style type="text/css">
	.box-weight [class*="col-xs-"]:not(.col-xs-12){
      padding: 0px;
	}

#message .form-group button {
    width: 100%;
    padding: 5px 10px;
    background: #b6d433;
    font-size: 13px;
}

#message .form-group {
   min-height: 30px;
}

#message{
	margin-top: 20px;
}


form#message {
    border: 1px solid #000;
    margin: 25px auto;
    padding: 25px;
    background-color: #fff;
    min-width: 819px;
    max-width: 999px;
    text-align: left;
    z-index: 999;
    position: absolute;
    top: 1px;
    /* height: 535px; */
    height: 674px;
    margin: auto;
    left: 0px;
    right: 0px;
    animation: animateright 0.5s;
    display: none;
    overflow: hidden;
}
.whiteBg button{
	background-color: #FFF !important;
}
</style>
 <link rel="stylesheet" href="css/post.css">

<!-- <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">
<script src="https://cdn.jsdelivr.net/npm/moment@2.20.1/moment.js"></script>
    <script src="js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->

<div class="sendmsgpop">

<form class="profile" action="send_message_friend.php" method="post" id='message' enctype="multipart/form-data"  style="display: block;">
<div class="signup-inner1">
	<div class="window-btn" style="text-align: right;
    top: 0;
    right: 0;
    position: absolute;">
    	<button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window-msg"></button>
        <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true" style="display: none"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window-msg"></button>
    </div>       
    
			<h2>SEND MESSAGE</h2>

			<p id="msgsuccess"></p>
			<br>
			<?php 
		    	
		    if(isset($_SESSION['error_msg'])){
					if($_SESSION['error_msg']!="")
					{
						echo "<div class='error_msg'>";
						echo $_SESSION['error_msg'];	
						echo "</div>";						
					}
				}
				
				?>

				<?php if(isset($_SESSION['success_msg'])){
					if($_SESSION['success_msg']!="")
					{
						echo "<div class='success text-center'>";
						echo $_SESSION['success_msg'];
						echo "</div>";						
					}
				}?>
		

		
	<div class="upper">

	<div class="basic_info">
	<div class="sect_title">
	Please Fill In All Blanks
	
	</div>

<script type="text/javascript">
	function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')                        
                        .css('background-image', 'url(' + e.target.result + ')');
                };

                reader.readAsDataURL(input.files[0]);
            };
        };
</script>
   
</div>

<div class="col-xs-12">
<div class="row">
<div class="form-group">
    <div class="col-xs-3"><label>Select Recipient:</label></div>
    <div class="col-xs-9 whiteBg">
		<select name="user_id[]" id="user_id" multiple="multiple" class="3col active ">		
			
			<?php 
			if(!empty($aUserData)){
				foreach ($aUserData as $key => $value) {
				if(!empty($value['id']))
				{					
			?>
			<option value="<?php echo $value['id'];?>"><?php echo $value['username'].$value['id'];?></option>
			<?php } } }?>
    	</select>
    </div>
</div>
<script>
    $(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 1,
            placeholder: 'Select Friend',
            search: true,
            searchOptions: {
                'default': 'Search Friend'
            },
            selectAll: true
        });
    });
	</script>

<div class="form-group">
    <div class="col-xs-3"><label>Message title:</label></div>
    <div class="col-xs-9"><input type="text" class="form-control" name="title" id="title"></div>
</div>

<div class="form-group">
    <div class="col-xs-3"><label>Message</label></div>
    <div class="col-xs-9"><textarea class="form-control" name="description" id="description" rows="3" placeholder="Description"></textarea></div>
</div>
<br><br>
<div class="form-group" style="margin-top: 25px;">
    <div class="col-xs-3"></div>
    <div class="col-xs-9">
      <div class="row">
          <div class="col-xs-6"><button class="submit" type="button" id="sendmsg">Send</button></div>
          <div class="col-xs-6"><button class="cancel" type="button" id="cancelmsg">Cancel</button></div>
        </div>
    </div>
</div>

		<input type="hidden" name="email" id="friendemail" value="<?php echo $data[0]['email'];?>">
		<input type="hidden" name="f_id" id="friend_id" value="<?php echo $data[0]['id'];?>">


</div>
</div>

	</form>

	</div>
<script type="text/javascript">
	$('#sendmsg').click(function(){
		var title = $("#title").val(); 
		var description = $("#description").val();    
		var friendemail = $("#friendemail").val();        
		var friend_id = $("#friend_id").val();            
		var user_id = $("#user_id").val();
		     
            if(title !='' && description !='' && user_id !='')
            {	
            	// alert("dfgdgfd");
				$.ajax({
				type:"POST",
		        url:"send_message_friend.php",
		        data:{title:title,description:description, email:friendemail, f_id:friend_id,user_id:user_id},
		        success:function(result){
		           $("#user_id").val(''); 
		           $("#title").val('');       
		           $("#description").val('');    
		           $('#msgsuccess').html('Message Sent Successfully').css('color','green');  
		           $('#showchangename').html(name +" "+ surname );
		           $('#collapse1').removeClass('in');
		        }
		        });
			}
			else
			{
				alert ('Message Title, Description and Recipient fields are required');
			}

	});

	$("#cancelmsg").click( function(){
		$("#title").val('');
		$("#description").val('');

	});

	$("#close-window-msg, #minimize-window-msg").click( function(){
		$(".sendmsgpop #message").hide();
	});


	$('.fa-window-restore').click(function(){
	$('.fa-window-restore').hide();
	$('.fa-window-maximize').show();
	$('.sendmsgpop .profile').css("max-width","150%"); 
	$('.sendmsgpop .profile').height('100%');
	});
	$('.fa-window-maximize').click(function(){
	$('.fa-window-maximize').hide();
	$('.fa-window-restore').show();
	$('.sendmsgpop .profile').css("max-width","30%"); 
	$('.sendmsgpop .profile').height('80%');
	});


</script>