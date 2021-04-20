<!doctype html> 
<html>  
<head> 
<title>Profile</title>

<script src="js/libs/jquery/jquery-1.11.1.min.js"></script>

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



<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc0-x85CWwIhB3O9laBR_DIR--uPjCyJY"></script>



<link rel="stylesheet" href="css/base.css">

<link rel="stylesheet" href="css/header.css">

<style>

.footer {

	position: fixed;

	bottom: 0;

	left: 20px;

	right: 0;

	width: calc(100% - 20px);

	z-index: 14;

	height: 50px;

}



.page_content { 
	bottom:50px; 
}





.footer .inner {

	height: 50px;

	position: absolute;

	background: linear-gradient(270deg, #111, #ddd);

	bottom: 0;

	right: 0;

	width: 50%;

	padding: 0 0 0 7%;

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

</style>

	<link rel="stylesheet" href="css/home.css">

	<link rel="stylesheet" href="css/login.css">

    <link rel="stylesheet" href="css/register.css">

    <link rel="stylesheet" href="css/about.css">

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

	</script>
<style type="text/css">
	body{
		background-image: url(<?php echo 'img/back.jpg';?>);
		background-repeat: no-repeat;
		background-size: cover;
	}
</style>
</head>

<body>

<div class="header">

	<a href="index.html">

		<img class="logo vcenter" src="img/logo.png">

	</a>

	<div class="triangle"> </div>

</div>

    <div class="page_content"> 

     <?php include 'search.php';?>

     <?php include 'login.php';?>

     <?php include 'signup.php';?> 

     <?php include 'aboutus.php';?>   
     
	</div>

	 

<div class="footer ">

	<div class="inner">

		<div class="triangle"></div>

			<div class="links"> 

				<a href="#" class="log_in">Log In</a>

				<a href="#" class="register">Signup</a> 

				<a href="#" class="aboutus">About Us</a> 

			</div>

			 <div class="copyright">

				   English (US)

			 </div>

			</div>

</div>

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

</script>





</body> 

</html>