<?php
session_start();
require_once "include/config.php";
require_once "include/functions.php";


$user = new User();
//print_r($user);die;
//------------------------Login------------------------//
if (isset($_POST['submit'])) {
	//echo "hiii  "; die;
	$uname = $_POST['username'];
	$pass = $_POST['password'];
	$where = 'username="' . $uname . '" and password="' . base64_encode($pass) . '"';
	$fields = "*";
	$table = "tbl_singup";
	$data = $user->select_row($table, $fields, $where);
	if (count($data)) {
		$_SESSION['user_id'] = $data['id'];
		$_SESSION['cell_id'] = $data['cell_id'];
		$_SESSION['loggedin'] = "You Are Logged IN";
		/*----last time login----*/
		$datetime = date('Y-m-d H:i:s');
		$fields = array('last_login');
		$values = array($datetime);
		$last_login = $user->Update_Dynamic_Query('tbl_singup', $values, $fields, 'id', $data['id']);
		/*----------------------*/

		//header('Location: oh.php');
		echo '<script type="text/javascript">window.location.href="oh.php";</script>';
		exit();
	} else {
		$_SESSION['block'] = 3;
		$_SESSION['error'] = 'Your login credentials are not correct, Please try to login again.';
	}
}
//------------------------------------Forgot User Name--------------//
if (isset($_POST['forgotuname'])) {
	$email = $_POST['emailun'];
	$where = "email='" . $email . "' ";
	$fields = "*";
	$table = "tbl_singup";
	$data = $user->select_records($table, $fields, $where);
	foreach ($data as $data) {
		$username = $data['username'];
		$firstname = $data['first_name'];
	}

	$to = $email;
	$subject = 'Pro167';
	$message = '<html><body>
   <p><b>Dear ' . $firstname . ',</b></p>
   		<p>We have received a request that you forgot your Username.<br>Please use the following credentials : </p><br>

     <table width="100%" border="1" cellpadding="10">
     <tr><td style="background:rgba(255,0,0,0.3);""><center>Forgot Username Details</center></td>
     </tr>
     <tr>
       <td width="25%"><b>Username</b></td><td>' . $username . ' </td>
     </tr>
    		';

	$message .= '</table><br>';
	$message .= '</body></html>';

	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	if (mail($to, $subject, $message, $headers)) {

		$_SESSION['block'] = 1;
		$_SESSION['success'] = 'Mail send successfully.';

	} else {
		$_SESSION['block'] = 1;
		$_SESSION['error'] = 'Send failure please try again.';

	}
}
//--------------------------------Forgot Password--------//
if (isset($_POST['forgotpass'])) {
	$email = $_POST['emailid'];
	$where = "email='" . $email . "' ";
	$fields = "*";
	$table = "tbl_singup";
	$data = $user->select_records($table, $fields, $where);
	foreach ($data as $data) {
		$password = base64_decode($data['password']);
		$firstname = $data['first_name'];

	}
	$to = $email;
	$subject = 'Pro167';
	$message = '<html><body>
   		<p><b>Dear ' . $firstname . ',</b></p>
   		<p>We have received a request that you forgot your Password.<br>Please use the following credentials : </p><br>

     	<table width="100%" border="1" cellpadding="10">
     	<tr><td style="background:rgba(255,0,0,0.3);""><center>Forgot Password Details</center></td>
    	 </tr>
	     <tr>
	       <td width="25%"><b>Password</b></td><td>' . $password . ' </td>
	     </tr>';

	$message .= '</table><br>';
	$message .= '</body></html>';

	$headers = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

//echo $message; die();
	if (mail($to, $subject, $message, $headers)) {
		$_SESSION['block'] = 2;
		$_SESSION['success'] = 'Mail send successfully.';
	} else {
		$_SESSION['block'] = 2;
		$_SESSION['error'] = 'Send failure please try again.';
	}
}
//-------------------Sign up Update--------------------//

$logo_details = $user->select_row("tbl_logo", "logo_path", "`id` = '1'");

// $back_details = $user->select_row("tbl_back", "back_path", "`bid` = '1'");
$back_details = $user->select_allrecords("tbl_back", "back_path");
$bg_paths = array();
foreach ($back_details as $bg_path){
	$bg_paths[] = SITEPATH."".$bg_path['back_path'];
}
?>
<!doctype html>
<html>
<head>
<title>Profile</title>
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->
    <link href="css/font-awesome.min.css" rel="stylesheet" media="all" >
<script src="js/libs/jquery/jquery-1.11.1.min.js"></script>


<link rel="stylesheet" href="css/bootstrap.min.css"  media="all" />
<link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css" media="all" >
<script src="https://cdn.jsdelivr.net/npm/moment@2.20.1/moment.js" ></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>

<script src="js/libs/lodash/lodash.min.js"></script>

<script src="js/plugins/js.cookie/js.cookie.js"></script>

<!-- <script src="/js/plugins/autocomplete/jquery.autocomplete.min.js"></script> -->

<!-- <script src="/js/plugins/velocity/velocity.min.js"></script> -->

<!-- <script src="/js/plugins/velocity/velocity.ui.min.js"></script> -->

<!-- <script src="/js/plugins/transit/jquery.transit.min.js"></script> -->

<!-- <script src="/js/plugins/scrollmagic/jquery.scrollmagic.min.js"></script> -->

<!-- <script src="/js/plugins/jhash/jhash-2.1.min.js"></script> -->

<script src="js/script_timer.js"></script>

<!-- <script src="/js/anchor_scroll.js"></script> -->

<script src="js/post_redirect.js"></script>

<!-- <script src="/js/buffer.js"></script> -->

<!--<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc0-x85CWwIhB3O9laBR_DIR--uPjCyJY"></script>
--->
<link rel="stylesheet" href="css/base.css">

<link rel="stylesheet" href="css/header.css">

<style>

.footer {

	/*position: fixed;*/

	bottom: 0;

	left: 20px;

	right: 0;

	width: calc(100% - 20px);

	z-index: 14;

	height: 50px;

}

.page_content {
	bottom:7%;
}


.footer .inner {

	height: 50px;

	position: absolute;

	background:url(img/foot_back.png)  no-repeat;

	bottom: 0;

	right: 0;

	width: 50%;

	padding: 0 0 0 7%;
	background-size: 100% 100%;

}

.footer .triangle {

	height: 100%;

	z-index: -1;

	width: 112.5px;

	background: #ddd;

	transform: skew(-60deg);

	position: absolute;

	left: 0;

	top: 0;

	transform-origin: top;

}


.footer .search {

	white-space: nowrap;

	border: 1px solid #000;

	border-width: 0 0 1px 0;

	display: table;

	vertical-align: top;

	position: absolute;

	bottom: 12px;

	right: 56px;

	width: 60%;

	padding: 0;

	font-size: 0;

	text-align: right;

}


.footer .search > * {

	margin: 0;

	padding: 0 !important;

	display: table-cell;

	font-size: 0;

}


.footer .search > .left {

	width: 99%;

}

.footer .search > .right {

	width: 1%;

}

.footer .search.focused {

	background-color: #fff;

}

.footer .search .query {

	background-color: transparent;

	padding: 5px;

	font-size: 15px;

	line-height: 1;

	outline: none;

	border: none;

	/* display: block; */

	white-space: nowrap;

	width: 100%;

	margin: 0;

}


.footer .search > * > * {

	vertical-align: top;

}


.footer .links {

	margin: 10px 10px 0px;

	position: relative;

	color: #fff;

	text-transform: uppercase;

	font-weight: 600;

	font-size: 14px;

	white-space: nowrap;

	line-height: 0.8;

}

.footer .copyright{

	font-size: 12px;

    text-align: right;

    color: #fff;

    color: #a9b483;

    padding-right: 5px;

}


.footer .links a {

	margin: 0 5px;

	display: inline-block;

	vertical-align: top;

}


.footer .links a.log_in {

	font-size: 23px;

}


.footer .search .submit {

	padding: 0px;

	margin: 0;

	white-space: nowrap;

	text-transform: uppercase;

	font-weight: 600;

	display: inline-block;

	-webkit-appearance: none;

	border: none;

	outline: none;

	font-size: 0;

	border: 1px solid #000;

	border-width: 1px 1px 0 0;

	background-color: transparent;

}


.footer .submit .top,

.footer .submit .mid,

.footer .submit .bottom {

	background-color: #ccc;

}



.footer .submit .top {

	height: 5px;

	border: 1px solid #000;

	border-width: 1px 0 0 0;

	border-width: 0 0 0 1px;

}


.footer .submit > * {

	display: block;

	white-space: nowrap;

}


.footer .submit > * > * {

	margin: 0;

	vertical-align: top;

	display: inline-block;

}



.footer .submit .mid .left {

	width: 15px;

	height: 14px;

	border: 1px solid #000;

	border-width: 0 0 1px 1px;

}



.footer .submit .mid .middle {

	line-height: 11px;

	font-size: 11px;

	border: 1px solid #000;

	padding: 1px 20px 1px 5px;

	border-width: 1px 0 0 1px;

}



.footer .submit .mid .right {

	width: 5px;

	height: 17px;

	border: 1px solid #000;

	border-width: 0 0 0 1px;

}



.footer .submit .bottom {

	height: 0;

}



.footer .submit .bottom2 {

	height: 4px;

}

.footer ul
{
   list-style-type: none;
   margin-left: 30px;
   margin-bottom: 5px;

}
.lanlist
{
		float: left;
		padding-left: 5px;
		color:#ddd;
}
.lanlist1
{
		float: left;
		padding-left: 5px;

}

.success{
color:green;
}
.error_msg
{
	color:red;
}


.panel-fullscreen {
    display: block;
    z-index: 9999;
    position: fixed;
    width: 100%;
    height: 100%;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    overflow: auto;
}
.goog-te-banner-frame
{
    display: none;
}
.langactive
{
	color: green!important;
}

</style>

	<link rel="stylesheet" href="css/home.css">

	<link rel="stylesheet" href="css/login.css">

    <link rel="stylesheet" href="css/register.css">

    <link rel="stylesheet" href="css/about.css">

    <link rel="stylesheet" href="css/education.css">

    <link rel="stylesheet" href="css/work_history.css">

    <link rel="stylesheet" href="css/add_education.css">

    <link rel="stylesheet" href="css/add_workhistory.css">

	<script src="js/profile.js"></script>

	<script>

		$(function(){

			var $state = $('select[name=state]');

			var $stateField = $state.closest('.field');

			var $country = $('select[name=country]');



			var countryCheck = function($country) {

				var val = $country.val();



				if(val == 'US') {

					$stateField.show();

				} else {

					$stateField.hide();

					$state.val('');

				}

			};



			countryCheck($country);

			$country.change(function(){

				countryCheck($country);

			});



		});

	</script>

	<script>

		$(function(){

			var $savedPic = $('input[name=profile_pic_saved]');

			var $preview = $('.profile .photo.profile_pic');

			var $pic = $('input[name=profile_pic]');



			var readURL = function(input) {

			  if(input.files && input.files[0]) {

			    var reader = new FileReader();

			    reader.onload = function(e) {
//alert();
			    	var url = e.target.result;

					$preview.css('backgroundImage', 'url('+url+')');

			    }


			    reader.readAsDataURL(input.files[0]);

			  }

			};



			$pic.change(function(){

				console.log('pic changed');

				readURL(this);

			});

		});


$(document).ready(function() {
  var urls= <?php echo json_encode($bg_paths, JSON_PRETTY_PRINT) ?>;

  var cout = 1;
  $('body').css('background-image', 'url("' + urls[0] + '")');
  setInterval(function() {
    $('body').css('background-image', 'url("' + urls[cout] + '")');
    cout == urls.length-1 ? cout = 0 : cout++;
  }, 5000);

});

	</script>
<style type="text/css">
	body{
		/*background-image: url(<?php //echo $back_details['back_path']; ?>);*/
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>
</head>

<body>

<div class="header">
	<a href="index.php">
		<img class="logo vcenter" src="<?php echo $logo_details['logo_path']; ?>">
	</a>
	<!--<div class="triangle"> </div>-->
</div>
    <div class="page_content">

     <?php include 'search.php';?>

     <?php include 'signup.php';?>

     <?php include 'login.php';?>

	<?php include 'education.php';?>

    <?php include 'work_history.php';?>

    <?php include 'add_education.php';?>

    <?php include 'add_workhistory.php';?>

     <?php include 'aboutus.php';?>

	</div>

<div class="footer ">

	<div class="inner">

		<!--<div class="triangle"></div>-->

			<div class="links">

				<a href="#" class="log_in">Log In</a>

				<a href="#" class="register">Signup</a>

				<a href="#" class="aboutus">About Us</a>

			</div>
			 <div class="copyright">

				  <ul class="translation-links notranslate" > <!--notranslate-->
                     <li class= "lanlist1"><a href="#" class="english" data-lang="English"> English</a></li>
                     <li class= "lanlist"><a href="#" class="french" data-lang="French">Français</a></li>
                     <li class= "lanlist"><a href="#" class="russian" data-lang="Russian">Pусский</a></li>
                     <li class= "lanlist"><a href="#" class="spanish" data-lang="Spanish">Español</a></li>
                     <li class= "lanlist"><a href="#" class="spanish" data-lang="Portuguese">Português</a></li>
                     <li class= "lanlist"><a href="#" class="japanese" data-lang="Japanese">日本語</a>
                     </li>
                     <li class= "lanlist"><a href="#" class="german" data-lang="German"> Deutsche</a></li>
                     <li class= "lanlist"><a href="#" class="italian" data-lang="Italian"> Italiano</a>
                     </li>
                     <li class= "lanlist"><a href="#" class="chinese" data-lang="Chinese">中文</a></li>

                    </ul>

			 </div>

			</div>

</div>

<div id="google_translate_element" style="display: none"></div>
<!-- active language -->

<script type="text/javascript">
function googleTranslateElementInit() {
   new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'en,es,ru,ja,de,zh-CN,pt,it,fr',

        autoDisplay: false,
        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
    }, 'google_translate_element');
}
</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>

<script type="text/javascript">
	$('.notranslate li a').click(function(){
		$('.notranslate li a').removeClass('langactive');
		$(this).addClass('langactive');
	});
</script>
<script type="text/javascript">
   function triggerHtmlEvent(element, eventName)
   {
       var event;
       if(document.createEvent) {
           event = document.createEvent('HTMLEvents');
           event.initEvent(eventName, true, true);
           element.dispatchEvent(event);
       } else {
           event = document.createEventObject();
           event.eventType = eventName;
           element.fireEvent('on' + event.eventType, event);
       }
   }
           <!-- Flag click handler -->
   $('.translation-links a').click(function(e)
   {
       e.preventDefault();
       var lang = $(this).data('lang');

       $('#google_translate_element select option').each(function()
       {
           if($(this).text().indexOf(lang) > -1)
           {
               $(this).parent().val($(this).val());
               var container = document.getElementById('google_translate_element');
               var select = container.getElementsByTagName('select')[0];
               triggerHtmlEvent(select, 'change');
           }
       });
   });
</script>

<script>

$(function(){

	var $query = $('.footer .search .query');

	var $search = $('.footer .search');



	$query.focus(function(){

		$search.addClass('focused');

	}).blur(function(){

		$search.removeClass('focused');

	});



	if($query.is(':focus')) {

		$search.addClass('focused');

	}



});


// login page start =====================

$('.log_in').click(function(){
  $('.login_box').toggle();
  $('.profile').hide();
  $('.about-page').hide();
});

$('.btn-login').click(function(){
  $('.login').toggle();
  $('.password').hide();
  $('.username').hide();
});

$('.btn-user').click(function(){
  $('.username').toggle();
  $('.password').hide();
  $('.login').hide();
});


$('.btn-pass').click(function(){
  $('.password').toggle();
  $('.login').hide();
  $('.username').hide();
});


// Register page start =====================

$('.register').click(function(){

  $('.profile').toggle();

  $('.login_box').hide();

  $('.about-page').hide();

});


// About Us page start =====================

$('.aboutus').click(function(){

  $('.about-page').toggle();

  $('.login_box').hide();

  $('.profile').hide();

});

// Education page start =====================

$('#edu-btn1').click(function(){

  $('.education1').toggle();

  $('.login_box').hide();

});

// Work History page start =====================

$('#work-btn1').click(function(){

  $('.workhistory1').toggle();

  $('.login_box').hide();

});

// Add Education page start =====================

$('#add-edu').click(function(){

  $('.add-edu1').toggle();

  $('.login_box').hide();

});

$('#add-high').click(function(){
	$('.add-edu1').hide();

  $('.add-edu2').toggle();

  $('.login_box').hide();

});

$('#add-institute').click(function(){
	$('.add-edu1').hide();

	$('.add-edu2').hide();

	$('.add-edu3').toggle();

	$('.login_box').hide();

});

$('#add-collage').click(function(){
	$('.add-edu1').hide();

	$('.add-edu2').hide();

	$('.add-edu3').hide();

	$('.add-edu4').toggle();

	$('.login_box').hide();

});

$('#add-university').click(function(){
	$('.add-edu1').hide();

	$('.add-edu2').hide();

	$('.add-edu3').hide();

	$('.add-edu4').hide();

	$('.add-edu5').toggle();

	$('.login_box').hide();

});

$('#add-tech').click(function(){
	$('.add-edu1').hide();

	$('.add-edu2').hide();

	$('.add-edu3').hide();

	$('.add-edu4').hide();

	$('.add-edu5').hide();

	$('.add-edu6').toggle();

	$('.login_box').hide();

});



// Add Work History page start =====================

$('#add-workschool').click(function(){

  $('.add-workschool').toggle();
  $('.add-workhigh').hide();
  $('.login_box').hide();
});

$('#add-workhigh').click(function(){
	$('.add-workhigh').toggle();
	$('.add-workschool').hide();
});

$('#add-workinstitute').click(function(){
	$('.add-workinstitute').toggle();
	$('.add-workschool').hide();
});

$('#add-workcollage').click(function(){
	$('.add-workcollage').toggle();
	$('.add-workschool').hide();
});

$('#add-workuniversity').click(function(){
	$('.add-workuniversity').toggle();
	$('.add-workschool').hide();
});

$('#add-worktechnical').click(function(){
	$('.add-worktechnical').toggle();
	$('.add-workschool').hide();
});

$('#add-workspecial').click(function(){
	$('.add-workspacial').toggle();
	$('.add-workschool').hide();
});

</script>

<script type="text/javascript">
	$('.fa-window-minimize').click(function(){
		 $('.about-page').hide();
		  $('.login_box').hide();
		  $('.profile').hide();
	});
</script>

<script type="text/javascript">
		$('.fa-times').click(function(){
		$('.about-page').hide();
		$('.login_box').hide();
		$('.profile').hide();
	});
</script>


<script type="text/javascript">
		$('.fa-window-maximize').hide();
		$('.fa-window-restore').click(function(){
		$('.fa-window-restore').hide();
		$('.fa-window-maximize').show();
		$('.login_box').height('30%');
    	$('.login_box').width('30%');

    	$('.about-page').height('100%');
    	$('.about-page').width('30%');

    	//$('.profile').height('60%');
    	//$('.profile').width('300%');
    	$('.profile').css("max-width","1100px");
    	$('.profile .info').height('300px');

	});
</script>

<script type="text/javascript">
	$('.fa-window-maximize').click(function(){
		$('.fa-window-restore').show();
		$('.fa-window-maximize').hide();
		$('.login_box').height('auto');
    	$('.login_box').width('400px');
    	$('.about-page').height('auto');
    	$('.about-page').width('auto');
    	//$('.profile').height('auto');
    	//$('.profile').width('auto');
    	$('.profile').css("max-width","900px");
	});
</script>



</body>

</html>