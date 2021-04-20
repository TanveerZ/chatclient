
<!doctype html>
<html>
<head>
	<title>Profile</title>
	<script src="js/libs/jquery/jquery-1.11.1.min.js"></script>
		<script src="js/bootstrap.js"></script>
<script src="js/libs/lodash/lodash.min.js"></script>
<script src="js/plugins/js.cookie/js.cookie.js"></script>
<!-- <script src="js/plugins/autocomplete/jquery.autocomplete.min.js"></script> -->
<!-- <script src="js/plugins/velocity/velocity.min.js"></script> -->
<!-- <script src="js/plugins/velocity/velocity.ui.min.js"></script> -->
<!-- <script src="js/plugins/transit/jquery.transit.min.js"></script> -->
<!-- <script src="js/plugins/scrollmagic/jquery.scrollmagic.min.js"></script> -->
<!-- <script src="js/plugins/jhash/jhash-2.1.min.js"></script> -->
<script src="js/script_timer.js"></script>
<!-- <script src="js/anchor_scroll.js"></script> -->
<script src="js/post_redirect.js"></script>
<!-- <script src="js/buffer.js"></script> -->

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc0-x85CWwIhB3O9laBR_DIR--uPjCyJY"></script>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar_right.css">
<link rel="stylesheet" href="css/header_zoom.css">


<style>
body {
    background-image: url(img/back.jpg);
    background-repeat: no-repeat;
    background-size: cover;
}
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
	bottom: 75px;
}

	.footer {
		background: linear-gradient(270deg, #111, #fff);
		height: 75px;
	}
	.page_content {
		bottom: 50px;
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
	margin: 10px;
	position: relative;
	color: #fff;
	text-transform: uppercase;
	font-weight: 600;
	font-size: 14px;
	white-space: nowrap;
	line-height: 0.8;
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
 
</head>
<body>
<div class="header">
	<a href="">
		<img class="logo vcenter" src="img/logo.png">
	</a>
	<div class="triangle">
					<a class="login" href="#">
				<div class="bg"></div>
				<div class="text">Logout/in</div>
			</a>
			</div>
</div>	<div class="sidebar">
		<div class="border">
			<div class="green"></div>
			<div class="black"></div>
		</div>
		<div class="inner">
			<div class="nav_box overlay hidden">
				<div class="tail hcenter"></div>
				<div class="nav">
<div class="tabs">
<div class="title">Menu</div> 
<a class="tab tab_0" href="#">
A0
</a>
<a class="tab tab_1" href="#">
A1
</a>
<a class="tab tab_2" href="#">
A2 (user)
</a>
<a class="tab tab_3" href="#">
A3
</a>
<a class="tab tab_4" href="#">
A4
</a>
<a class="tab tab_5" href="#">
A5
</a>
<a class="tab tab_6" href="#">
A6
</a>
<a class="tab tab_7" href="#">
A7
</a>
<a class="tab tab_8" href="#">
A8
</a>
<a class="tab tab_9" href="#">
A9
</a>
<a class="tab tab_10" href="#">
A10
</a>
<a class="tab tab_11" href="#">
A11
</a>
<a class="tab tab_12" href="#">
A12
</a>
</div>
				</div>
			</div>
		</div>
		<div class="triangle">
			<map name="sidebar_triangle" id="sidebar_triangle">
				<area shape="poly" coords="" href="#oh" class="inner_tri menu">
				<area shape="poly" coords="" href="#yes" class="outer_tri">
			</map>
			<img src="img/sidebar_triangle.png" usemap="#sidebar_triangle" style="width: 104px; height: 53px;">
		</div>
	</div>
	<!-- <script src="http://davidlynch.org/projects/maphilight/jquery.maphilight.min.js"></script> -->
	<script>
	$(function(){
		// FOR RESPONSIVE IMAGE MAP LINKS
		var $img = $('.sidebar .triangle img');

		var $innerMap = $('.sidebar area.inner_tri');
		var $outerMap = $('.sidebar area.outer_tri');

		var pairs = [
			{
				$area: $innerMap,
				coords: [
					[0.20431472081,0.45979899497],
					[0.20431472081,0],
					[0.71446700507,0]
				]
			},
			{
				$area: $outerMap,
				coords: [
					[0.17258883248,0],
					[0.17258883248,0.54773869346],
					[0.78045685279,0],
					[1,0],
					[0,1],
					[0,0]
				]
			}
		];

		function responsive_map($img, pairs) {
			var width = $img.width();
			var height = $img.height();

			pairs.forEach(function(pair){
				var $area = pair.$area;
				var percentange_coords = pair.coords;

				var coords = [];
				percentange_coords.forEach(function(coord){
					coord = coord.slice(0);

					coord[0] *= width;
					coord[1] *= height;
					// console.log(coord);
					coord = coord.map(Math.round);
					coord = coord.join();

					coords.push(coord);
				});
				coords = coords.join();
				$area.attr('coords', coords).prop('coords', coords);
			});
		}


		if($img.prop('complete')) {
			responsive_map($img, pairs);
		} else {
			$img.load(function(){
				responsive_map($img, pairs);
			});
		}
		$(window).on('resize', function(){
			responsive_map($img, pairs);
		});

		var $nav = $('.sidebar .inner .nav_box');
		$innerMap.click(function(){
			$nav.toggleClass('hidden');
			var sidebarHidden = $nav.hasClass('hidden') ? 'true' : '';

			Cookies.set('sidebarHidden', sidebarHidden);
		});
	});
	</script>
		<script src="js/sidebar_right.js"></script>
	<div class="sidebar_r">
		<div class="area1"></div>
		<div class="links"> 
			<a href="" class="link">Updater</a>
			/
			<a href="#profile" class="link profile">Profile</a>
			/
			<a href="#recent" class="link recent">Recent</a>
			/
			<a href="#" class="link">Settings</a>
		</div>
		<div class="cal_map">
			<div class="side_label">Calendar/Map</div>
			<div class="calendar">
				<div class="day_names">
					<div class="week">
						<div class="day">Sun</div>
						<div class="day">Mon</div>
						<div class="day">Tue</div>
						<div class="day">Wed</div>
						<div class="day">Thu</div>
						<div class="day">Fri</div>
						<div class="day">Sat</div>
					</div>
				</div>
				<div class="days">
						<div class="content overlay">
						<div class="week">
						<div class="day  ">
						26								</div>
						<div class="day  ">
						27								</div>
						<div class="day  ">
						28								</div>
						<div class="day  ">
						29								</div>
						<div class="day  ">
						30								</div>
						<div class="day this_month ">
						1								</div>
						<div class="day this_month ">
						2								</div>
						</div>
						<div class="week">
						<div class="day this_month ">
						3								</div>
						<div class="day this_month low">
						4								</div>
						<div class="day this_month med">
						5								</div>
						<div class="day this_month ">
						6								</div>
						<div class="day this_month high">
						7								</div>
						<div class="day this_month ">
						8								</div>
						<div class="day this_month ">
						9								</div>
						</div>
						<div class="week">
						<div class="day this_month ">
						10								</div>
						<div class="day this_month ">
						11								</div>
						<div class="day this_month ">
						12								</div>
						<div class="day this_month ">
						13								</div>
						<div class="day this_month ">
						14								</div>
						<div class="day this_month ">
						15								</div>
						<div class="day this_month ">
						16								</div>
						</div>
						<div class="week">
						<div class="day this_month ">
						17								</div>
						<div class="day this_month ">
						18								</div>
						<div class="day this_month ">
						19								</div>
						<div class="day this_month ">
						20								</div>
						<div class="day this_month ">
						21								</div>
						<div class="day this_month ">
						22								</div>
						<div class="day this_month ">
						23								</div>
						</div>
						<div class="week">
						<div class="day this_month ">
						24								</div>
						<div class="day this_month ">
						25								</div>
						<div class="day this_month ">
						26								</div>
						<div class="day this_month ">
						27								</div>
						<div class="day this_month ">
						28								</div>
						<div class="day this_month ">
						29								</div>
						<div class="day this_month ">
						30								</div>
						</div>
						</div>
				</div>
			</div>
			<div class="map"></div>
		</div>
	</div>
<div class="page_content ltr">
    <div class="post">
	   <h3>You Are Logged In</h3> 
       <?php include 'post.php';?> 
	</div> 
    <div class="recent-tab">
       <?php include 'recent_posts.php';?> 
    </div> 
	<div class="profile">
       <?php include 'profile.php';?> 
    </div>  
</div>
<div class="footer logged_in">
	<div class="inner">
		<div class="triangle"></div>
					<form class="search" action="">
				<div class="left">
					<input type="text" class="query">
				</div>
				<div class="right">
					<button type="submit" value="Search" class="submit">
						<div class="top"></div>
						<div class="mid">
							<div class="left"></div>
							<div class="middle">Search</div>
							<div class="right"></div>
						</div>
						<div class="bottom"></div>
						<div class="bottom2"></div>
					</button>
				</div>
			</form>
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
 
$('.tab_2').click(function(){
   $('.post .profile').toggle();
   $('.profile .profile').hide();
   $('.recent_posts').hide();
});
$('#sidebar_triangle .menu').click(function(){
   $('.post .profile').hide();
});
$('.link.profile').click(function(){
   $('.profile .profile').toggle();
   $('.post .profile').hide();
   $('.recent_posts').hide();
}); 
$('.recent').click(function(){
   $('.profile .profile').hide();
   $('.post .profile').hide(); 
   $('.recent-tab .recent_posts').toggle();
}); 
</script></body>
</html>