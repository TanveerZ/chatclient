<?php
session_start();

require_once("include/config.php");
require_once("include/functions.php");
$user = new User();
	if(!isset($_SESSION['user_id']))
	{
		echo'<script type="text/javascript">window.location.href="index.php";</script>';
		exit;     
	}

	$uid=$_SESSION['user_id'];
	$where = "id=".$uid;
	$data1=$user->select_records('tbl_singup','*',$where);
	foreach ($data1 as $rows) {}
	$cell_id = $rows['cell_id'];
	$where="cell_id in(".$cell_id.")";	
	$data=$user->select_records('tbl_cell','*',$where);

	   
?>

<!doctype html>
<html>
<head>
	<title>Profile</title>
	<!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">-->

<link href="css/timeline.css" rel="stylesheet">

<link href="css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/jquery.flipster.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/libs/jquery/jquery-1.11.1.min.js"></script>


<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
<link href="css/jquery.multiselect.css" rel="stylesheet" />
<script src="js/jquery.multiselect.js"></script>


<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flipster.min.js"></script>
<script src="js/libs/lodash/lodash.min.js"></script>
<script src="js/plugins/js.cookie/js.cookie.js"></script>

<script src="js/script_timer.js"></script>

<script src="js/post_redirect.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAc0-x85CWwIhB3O9laBR_DIR--uPjCyJY"></script> -->
<script src="https://cdn.jsdelivr.net/npm/moment@2.20.1/moment.js"></script>
<script src="js/bootstrap-datetimepicker.min.js"></script>

<script>
$(document).ready(function() {

	$(function () {
        $('select[multiple].active.3col').multiselect({
            columns: 1,
            placeholder: 'Select States',
            search: true,
            searchOptions: {
                'default': 'Search States'
            },
            selectAll: true
        });
    });

    $("div.bhoechie-tab-menu>div.list-group>a").click(function(e) {
        e.preventDefault();
        $(this).siblings('a.active').removeClass("active");
        $(this).addClass("active");
        var index = $(this).index();
        $("div.bhoechie-tab>div.bhoechie-tab-content").removeClass("active");
        $("div.bhoechie-tab>div.bhoechie-tab-content").eq(index).addClass("active");
    });
});
</script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/base.css">
<link rel="stylesheet" href="css/header.css">
<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/sidebar_right.css">
<link rel="stylesheet" href="css/header_zoom.css">
<!-- <link rel="stylesheet"href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/> -->



<style>
	.footer-video{
	position: fixed;
	bottom: 300px;
	/*top:26px;*/
	left: 20px;
	right: 0;
	width: calc(100% - 40px);
	z-index: 14;
	height: 50px;
	padding: 0 150px;
	/*animation-duration: 2s;*/
	}
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
		background: url(img/foot_logback.png) no-repeat;
		height: 54px !important;
		background-size:100% 100%;
	}
	.page_content {
		bottom: 50px;
	}

.footer .inner {
	height: 50px;
	position: absolute;
	background:url(img/foot_back.png)  no-repeat;
	bottom: 0;
	right: 0;
	width: 50%;
	padding: 0 0 0 7%;
	background-size:100% 100%;
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
	border-width: 0 1px 2px 0;
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
	/*background-color: #fff;*/
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
	/*background-color: #ccc;*/
}

.footer .submit .top {
	height: 8px;
	border: 2px solid #000;
	/*border-width: 1px 0 0 0;*/
	border-width: 1px 1px 0 2px;
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
	height: 19px;
	border: 1px solid #000;
	border-width: 0 0 2px 2px;
}

.footer .submit .mid .middle {
	    line-height: 14px;
    font-size: 14px;
    font-weight: 400;
    border: 2px solid #000;
    padding: 4px 25px 4px 20px;
    border-width: 2px 0 0 2px;
    background-color: #ccc;
    margin-top: -5px;
}

.footer .submit .mid .right {
    width: 7px;
    height: 24px;
    border: 1px solid #000;
    border-width: 0 0 0 1px;
    margin-top: -5px;
}

.footer .submit .bottom {
	height: 0;
}

.footer .submit .bottom2 {
	height: 4px;
}


 
.High{
background-color: red !important;
}
.Medium{
background-color: orange  !important;
}
.Low
{
background-color:yellow !important; 
}

.success
{
	color:green!important;
}

.goog-te-banner-frame 
{
    display: none;
}

input.query::-webkit-input-placeholder {
    text-transform: none;
    color: red;
}
input.query::-moz-placeholder {
    text-transform: none;
    color: red;
}
input.query:-moz-placeholder {   /* Older versions of Firefox */
    text-transform: none;
    color: red;
}
input.query:-ms-input-placeholder {
    text-transform: none;
    color: red;
}

.top{ background:#323232!important; }
.bottom2{ background:#323232!important; }
.mid{ background:#323232!important; }
/*.left{ background:#323232!important; }*/
</style>

<link rel="stylesheet" href="css/home.css">
 
</head>
<body>
	<div class="header" onclick="window.location.reload()">
		<a href="">
			<img class="logo vcenter" src="img/logo.png">
		</a>
		<div class="">
			<a class="login" href="logout.php">
				<div class="bg"></div>
				<div class="text">Logout</div>
			</a>
		</div>
	</div>	
	<div class="sidebar">
		<div class="border">
			<div class="green"></div>
			<div class="black"></div>
		</div>
		<div class="inner">
			<div class="nav_box overlay ">
				<div class="tail hcenter"></div>
				<div class="nav">
					<div class="tabs">
					<div class="title">Menu</div>
						<a class="tab tab_user">Users </a> 
						<!--<a class="tab tab_allFriend">My Friends </a> 
						<a id="bookmarkedId" class="tab tab_bookmarked" style="line-height: 1.5;">Bookmark Users </a> 
						<a id="messagesdId" class="tab tab_allMessage">Messages </a> --->
						<?php
						$i=0;
							foreach ($data as $cell) {
								echo "<a class='tab tabcell tab_".$i."' id=".$cell['cell_id']." href='#''>
										".$cell['cell_name']."
									</a>"; 
									$i += 1;		
							}
						?>
					</div>
				</div>
			</div>
		</div>
	
		<script type="text/javascript">
		$( document ).ready(function() {
			setTimeout(function(){
				  $('.inner_tri.menu').click();
				}, 8000);
		});
		</script>		
		 <script type="text/javascript">
		 	$('.tabcell').click(function(){
		 		$('.nav_box').addClass('hidden');	
		 		// $('.footer-video').hide();		 		
		 	});
		 </script>


		<div class="triangle">
			<map name="sidebar_triangle" id="sidebar_triangle">
				<!--<area shape="poly" coords="" href="#oh" class="inner_tri menu">--->
				<area shape="poly" coords="" href="#user_video" class="inner_tri menu">
				<area shape="poly" coords="" href="#user_video" class="outer_tri">
			</map>
			<img src="img/sidebar_triangle.png" usemap="#sidebar_triangle" style="width: 125px;height: 49px;margin-top:0;">
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
			  // $('.footer-video').toggle('slow');
			
			// $('.footer-inner').slideToggle('slow');
			// var sidebarHidden = $nav.hasClass('hidden') ? 'true' : '';
			// Cookies.set('sidebarHidden', sidebarHidden);
			
		});

		$(document).ready(function() {
	        $(".sidebar .inner .nav_box").click(function () {
	            $(".footer-video").addClass("active"); 
	        });

	        $(".sidebar .inner .nav_box").click(function () {
	            $(".footer-video").removeClass("active");
	        });
	    });
	

		var $video=$('video_slider');
		$('#video_slider').hide();
		$('.user_video').hide();
		$outerMap.click(function(){
			////alert('1');
			//$('#video_slider').toggle();
			//$('.user_video').toggle();
          //$('.updater .updater').toggle();
			// $('.footer-video').toggle('slow');
			$('.footer-inner').slideToggle('slow');
			$('.cell_layout_main .cell_layout').hide();
			
			/*----recent visit page--- */
		    var url='<?php echo SITEPATH;?>';
			   $.ajax({
		        type:"POST",
		        url:"visit_pageajax.php",
		        data:{id:'Watch Video',url:url},
		        success:function(result){ 
		        //alert('1-s');      
		        }
		        });  

				});		
	});
	</script>

<!--****** menu tabs****-->	
	<script src="js/sidebar_right.js"></script>
	<div class="sidebar_r">
		<div class="area1"></div>
			<div class="links"> 
				<a href="#updater" class="link updater">Updater</a>
				/
				<a href="#showprofile"  class="link profile profile_btn">Profile</a>
				/
				<a href="#recent" class="link recent">Recent</a>
				/
				<a href="#settings" class="link settings">Settings</a>
			</div>
		<div class="cal_map">
		<div class="side_label">Calendar/Map</div>

<!-- ***************Calendar****** -->
<div class="cal">
<?php
$time = time();
$year=date('Y', $time);
if(isset($_GET['month'])){
	 $month = $_GET['month'];

	if($_GET['month']==1)
	{
		$priv=1;

		
	}
	else
	{
		$priv=$_GET['month']-1;
	}
	if($_GET['month']==12)
	{
		//$next=12;

		$next=$_GET['month']+1;
	}
	else
	{
		$next=$_GET['month']+1;
	}
	$days ="";
	$pn = array('&laquo;' => $priv, '&raquo;' => $next);
}
else
{
	$today = date('j', $time);
	$days = array($today => array(null, null,'<div id="today">' . $today . '</div>'));
	$month = date('n', $time);
	$pn = array('&laquo;' => date('n', $time) - 1, '&raquo;' => date('n', $time) + 1);
}



//echo $pri = '<span class="calendar-prev"><< <a href=""></a></span>&nbsp;';

echo generate_calendar($year,$month , $days, 1, null, 0,$pn);

function generate_calendar($year, $month, $days = array(), $day_name_length = 3, $month_href = NULL, $first_day = 0, $pn = array())
{

    $first_of_month = gmmktime(0, 0, 0, $month, 1, $year);
  
    $day_names = array(); 
    for ($n = 0, $t = (3 + $first_day) * 86400; $n < 7; $n++, $t+=86400) //January 4, 1970 was a Sunday
        $day_names[$n] = ucfirst(gmstrftime('%A', $t)); //%A means full textual day name

    list($month, $year, $month_name, $weekday) = explode(',', gmstrftime('%m, %Y, %B, %w', $first_of_month));
    $weekday = ($weekday + 7 - $first_day) % 7; //adjust for $first_day
    $title   = htmlentities(ucfirst($month_name)) . $year;  //note that some locales don't capitalize month and day names

    //Begin calendar .  Uses a real <caption> .  See http://diveintomark . org/archives/2002/07/03

    @list($p, $pl) = each($pn); @list($n, $nl) = each($pn); //previous and next links, if applicable
    if($p) $p = '<span class="calendar-prev">' . ($pl ?  $p    : $p) . '</span>&nbsp;';
    if($n) $n = '&nbsp;<span class="calendar-next">' . ($nl ?  $n  : $n) . '</span>';

    $calendar = "<div class=\"mini_calendar\">\n<table>" . "\n" . 
        '<caption class="calendar-month">' . $p . ($month_href ? '<a href="' . htmlspecialchars($month_href) . '">' . $title . '</a>' : $title) . $n . "</caption>\n<tr>";

    if($day_name_length)
    {   //if the day names should be shown ($day_name_length > 0)
        //if day_name_length is >3, the full name of the day will be printed
        foreach($day_names as $d)
            $calendar  .= '<th abbr="' . htmlentities($d) . '">' . htmlentities($day_name_length < 4 ? substr($d,0,$day_name_length) : $d) . '</th>';
        $calendar  .= "</tr>\n<tr>";
    }

    if($weekday > 0) 
    {
        for ($i = 0; $i < $weekday; $i++) 
        {
            $calendar  .= '<td>&nbsp;</td>'; //initial 'empty' days
        }
    }
    for($day = 1, $days_in_month = gmdate('t',$first_of_month); $day <= $days_in_month; $day++, $weekday++)
    {
        if($weekday == 7)
        {
            $weekday   = 0; //start a new week
            $calendar  .= "</tr>\n<tr>";
        }
        if(isset($days[$day]) and is_array($days[$day]))
        {
            @list($link, $classes, $content) = $days[$day];
            if(is_null($content))  $content  = $day;
            $calendar  .= '<td id="'.$month.'-'.$day.'"' . ($classes ? '  class="' . htmlspecialchars($classes) . '">' : '>') . 
                ($link ? '<a href="' . htmlspecialchars($link) . '">' . $content . '</a>' : $content) . '</td>';
        }
        else $calendar  .= "<td id='".$month.'-'.$day."'>$day</td>";
    }
    if($weekday != 7) $calendar  .= '<td id="emptydays" colspan="' . (7-$weekday) . '">&nbsp;</td>'; //remaining "empty" days

    return $calendar . "</tr>\n</table>\n</div>\n";
}
?>
</div>


<script type="text/javascript">
	$(document).ready(function() {
		$('#searchbtn').click(function(){

		        //alert('2');   working   
			var searchtxt = $("#searchtxt").val();
			if(searchtxt!='')
			{
				$.ajax({
	         		type:"POST",
	        		url:"searchrecordajax.php",
	        		data:{searchtxt:searchtxt},
	        			success:function(result){ 

		        //alert('2-s');   working               					
						$('.search-r').show();	                	
	        		}
	       		 });					
			}
			else
			{				
				$('#searchtxt').attr("placeholder", "Please Enter Text");
			}
		});
	});
</script>

		<div class="map"></div>
	</div>
</div>




<!--///////////////////*** File includes***////////-->

    <div class="page_content ltr-cell_layout" >
    	<div class="cell_layout_main">
      		<?php include 'cell_layout.php';?> 
    	</div>  
    </div>
	<div class="page_content ltr">

    	<div class="post">
       		<?php include 'post.php';?> 
		</div> 

    	<div class="searchpop">
			<?php include 'searchrecordajax.php' ;?>
		</div>
		<div class="calendar">
       		<?php include 'calendar.php';?> 
    	</div>

    	<div class="map">
       		<?php include 'map.php';?> 
    	</div>

		<div class="calendar">
       		<?php include 'calendar_view.php';?> 
    	</div>
 
		<div class="friend">
	   		
	   		<span class="logintitle">
	   			<!-- <h3> 
	   				<?php 
	   					echo $_SESSION['loggedin'];
	   					//unset($_SESSION['loggedin']);
	   				?> 
	   			</h3>  -->
	   		</span>
       		<?php include 'myfriend.php';?> 
		</div> 
 
		<div class="page_content ltr">    
			<div class="bookmarkf">	   		
		   		<!-- <span class="logintitle">
		   			<h3> 
		   				<?php 
		   					//echo $_SESSION['loggedin'];
		   					//unset($_SESSION['loggedin']);
		   				?> 
		   			</h3> 
		   		</span> -->
	       		<?php include 'bookmark.php';?> 
			</div> 
		</div>

    	<div class="recent-tab">
       		<?php include 'recent_posts.php';?> 
    	</div> 
    	<div class="updater">		
       		<?php include 'updater_pop.php';?> 
    	</div> 
    	<div class="settings">		
       		<?php include 'settings_pop.php';?> 
    	</div>

    	<div class="activity">		
       		<?php  include 'activity.php';?> 
    	</div>

    	<div class="frdsprofile">		
       		<?php  include 'frdsprofile.php';?> 
    	</div>
    	<div class="video_slider">		
    	<?php include 'video_slider.php';?> 
    </div>
		<!-- <div class="updater">		
       		<?php //include 'updater_pop.php';?> 
    	</div>  -->

    	<!-- <div class="settings">		
       		<?php //include 'settings_pop.php';?> 
    	</div> -->

	<div class="messagesd">		
       		<?php include 'message_pop.php';?> 
    	</div> 

	</div>

    <!-- <div class="video_slider">		
    	<?php //include 'video_slider.php';?> 
    </div> -->
	
	<div class="message">
       		<?php  //include 'send_message.php';?> 
    </div> 

	<div class="message_thread">
		<?php include 'message_thread.php' ;?>
	</div>

		<div class="profile">		
       		<?php  include 'profile.php';?> 
    	</div> 
		
		<div class="messagesd">		
       		<?php include 'message_pop.php';?> 
    	</div> 

	</div>

    <!-- <div class="video_slider">		
    	<?php //include 'video_slider.php';?> 
    </div> -->
	
	<!-- <div class="message">
       		<?php  //include 'send_message.php';?> 
    </div>  -->

	<!-- <div class="message_thread">
		<?php //include 'message_thread.php' ;?>
	</div> -->

<?php 
$getslider = $user->select_allrecords('tbl_slidervideo','*');
if(count($getslider) > 0){
?>
<div class="footer-video animate__animated animate__backInUp1" >
	<div class="footer-inner" style="display:none;">
	  <h2>Trending video</h2>  
	  <div id="myCarousel" class="carousel slide" data-ride="carousel" style="width:500px;">
	    <!-- Indicators -->
	    <ol class="carousel-indicators">
	    	<?php 
	    	for($i=0;$i<count($getslider);$i++){ ?>
	      		<li data-target="#myCarousel" data-slide-to="<?php echo $i ?>" <?php echo($i==0)?'class="active"':"" ?>></li>
	  		<?php }?>
	    </ol>

	    <!-- Wrapper for slides -->
	    <div class="carousel-inner">
	    	<?php 
	    	$i = 0;
	    	foreach($getslider as $slider){ ?>
	      <div class="item <?php echo($i == 0)?'active':''; ?>" style="height:200px;">
	        <video class="video-fluid" autoplay loop muted>
	        <source src="<?php echo $slider['video_path'] ?>" type="video/mp4" />
	      </video>
	      </div>

	  <?php $i++; } ?>
	    </div>
	  </div>
	</div>
</div>
<?php } ?>
<div class="footer logged_in">
	<div class="inner">
		<!--<div class="triangle"></div>-->
			<form class="search" action="" >
				<div class="left">
					<input type="text" Name="search" class="query" id="searchtxt">
				</div>
				<div class="right">
					<button type="button" value="Search" class="submit" id="searchbtn">
						<div class="top"></div>
						<div class="mid">
							<div class="left"></div>
							<div class="middle">Search</div>
							<!--<div class="right"></div>-->
						</div>
						<div class="bottom"></div>
						<div class="bottom2"></div>
						<span></span>
					</button>
					
				</div>
			</form>
	</div>
</div>
<?php 

	$curmonyear=$year.'-'.$month;
	 //$curmonyear=date('Y-m');
	$result=$user->select_records('tbl_userevents','*',"date LIKE '".$curmonyear."%' AND u_id='".$_SESSION['user_id']."' order by date ASC ");

	//echo "<pre>"; print_r($result); die();


	$curtime = date('H:i:s');

	$result1=$user->select_records('tbl_userevents','*',"date LIKE '".date('Y-m-d')."' AND u_id='".$_SESSION['user_id']."' AND time =(select min(time) from tbl_userevents where time > '".$curtime."' AND date LIKE '".date('Y-m-d')."' )");
	
	if(!empty($result1[0]['event_id']))
	{
		 $color1=$result1[0]['priority'];
	}
	else
	{
		$color1 = '';
	}
	if($result[0] != '')
	{
   	foreach ($result as $result) {
          $fdate=explode('-',$result['date']);
       	  $fday=$fdate[2];

       	  if($fday<10)
       	  {
       	  	 $fday = substr($fday,-1);
       	  }

       	  $eventtime=$result['time'];          
			
			if($result['date']==date('Y-m-d'))
			{
					?>
		              <script type="text/javascript">        

		            	$('#today').addClass('<?php echo $color1; ?>');
		          
		              </script>
		          <?php
			}
			else
			{

				 ?>
		            <script type="text/javascript"> 
		            $('.mini_calendar table #<?php echo $fday; ?>').attr('class','');         
		              $('.mini_calendar table #<?php echo $month.'-'.$fday; ?>').addClass('<?php echo $result['priority']; ?>');
		            </script>
         		 <?php
				
			}
         
         }
     }
?>
<script type="text/javascript">
		//$ = jQuery.noConflict();
		$('.sm-img').click(function(){
		        //alert('3');      
			var imgid=$(this).attr('id'); 
                                //alert(imgid);
        $.ajax({
             type:"POST",
            url:"show_photo_from_gallary.php",
            data:{imgid:imgid},
            success:function(result){

		        //alert('3-s');      
			$(".imgpop1").html(result);
			$('#imgpop1').css('display', 'block');
			}
            });
		});
	$('#closezoompopup').click(function(){
			$('#imgpop1').css('display', 'none');
		});
</script>
<!-- dubal click open calendar pop up -->
<script type="text/javascript">
	$( ".calendar-month" ).dblclick(function() {
  		$('.calendar-o').show();
	});  	
</script>

<!-- dubal click open map pop up -->
<script type="text/javascript">
	$( ".map" ).dblclick(function() {
  		$('.calendar_map').show();
	});  	
</script>


<script type="text/javascript">
	$('.calendar-prev').click(function()
	{

		        //alert('4');      
		var month = "<?php echo  $month ;?>";
		month = parseInt(month) - 1;
		$.ajax({
        	type:"POST",
        	url:"calendar_ajax.php",
        	data:{month:month},
        	success:function(result){
           		//alert('4-s');
				$('.cal').html(result); 	
        	}
       	 });
	});
</script>

<script type="text/javascript">
	$('.calendar-next').click(function()
	{
		        //alert('5');      
	    var month = "<?php echo  $month ;?>";
		month = parseInt(month) + 1;
		$.ajax({
        	type:"POST",
        	url:"calendar_ajax.php",
        	data:{month:month},
        	success:function(result){
           		////alert(result);
		        //alert('5-s');      
     			$('.cal').html(result);           	
        	}
       	 });
	});
</script>

<!-- *********you ar logged in hide -*****************-->
		<script type="text/javascript">	
				setTimeout(function(){
				  $('.logintitle').hide();
				}, 4000);
			
		</script>	
<!-- ************Updater pop show after login************-->
			<?php
			if(isset($_SESSION['hideupdate']))
			{}
			else{
			?>	
				<script type="text/javascript">	
					$('.updater .updater').toggle();
						setTimeout(function(){
							  $('.updater .up').hide();
						}, 9000);
				</script>
			<?php
			}
				$_SESSION['hideupdate']=1;
			?>



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
 
$('.tabs a.tab_user').click(function(){
	
   $(".friend .profile .frdsprofile .userp1 .profilepop1").hide();

    //$(".frdsprofile").hide();
   $('.frdsprofile').hide();
   $(".messagesd .allmessage").hide();
   $('.post .profile').toggle();
   $('.cell_layout_main .cell_layout').hide();
   $('.bookmarkf .bookmarkf').hide();
   $('.profile .profile').hide();
   $('.recent_posts').hide();
   $('.updater .updater').hide();
   $('.user_video .user_video').hide();
   $('.settings .settings').hide();
   $('#video_slider').hide();
   $('.sidebar .inner .nav_box').addClass('hidden');
});

$('.tabs a.tab_allFriend').click(function(){
	
		        //alert('6');      
  /* $(".friend .profile").toggle();
   $(".messagesd .allmessage").hide();
    $('.bookmarkf .bookmarkf').hide();
   // $('.post .profile').hide();
   $('.cell_layout_main .cell_layout').hide();
   $('.profile .profile').hide();
   $('.recent_posts').hide();
   $('.updater .updater').hide();
   $('.user_video .user_video').hide();
   $('.settings .settings').hide();
   $('#video_slider').hide();*/

   var id = '';  

    $.ajax({
        type:"POST",
        url:"myfriend.php",
        data:{friend_gallery_id:id},
        success:function(result){ 
		        //alert('6-s');      
            $('.frdsprofile').hide();
            $('.bookmarkf').hide();
            
            $('.allmessage').hide();
            $('.friend').html(result);
            $('.friend .profile').css('display','block');
        }
    });
});


$('.tabs a.tab_bookmarked').click(function(){
	
   $(".bookmarkf .bookmarkf").toggle();	
   $(".post .profile").hide();
   $(".friend .profile").hide();
   $(".messagesd .allmessage").hide();
   // $('.post .profile').hide();
   $('.cell_layout_main .cell_layout').hide();
   $('.profile .profile').hide();
   $('.recent_posts').hide();
   $('.updater .updater').hide();
   $('.user_video .user_video').hide();
   $('.settings .settings').hide();
   $('#video_slider').hide();
});



$('.tabs a.tab_allMessage').click(function(){


   $(".messagesd .allmessage").toggle();		
 $('.bookmarkf .bookmarkf').hide();
   $(".friend .profile").hide();
   $('.post .profile').hide();
   // $('.post .profile').hide();
   $('.cell_layout_main .cell_layout').hide();
   $('.profile .profile').hide();
   $('.recent_posts').hide();
   $('.updater .updater').hide();
   $('.user_video .user_video').hide();
   $('.settings .settings').hide();
   $('#video_slider').hide();
});




$('.tabs a.tabcell').click(function(){

		        //alert('7');      
	var id = $(this).attr('id');   
	   $.ajax({
         	type:"POST",
	        url:"cell_layoutajax.php",
	        data:{id:id},
	        success:function(result){
			        //alert('7-s');      
	        $("#main").html(result); 
	        //$('.inner').hide();           
	        }	
        });
		 

	$('.cell_layout_main .cell_layout').toggle(); 
   $('.post .profile').hide();
   $('.profile .profile').hide();
   $('.recent_posts').hide();
   $('.updater .updater').hide();
   $('.user_video .user_video').hide();
   $('.settings .settings').hide();
   $('#video_slider').hide();
   $(".messagesd .allmessage").hide();
    $('.bookmarkf .bookmarkf').hide();
});

$('#sidebar_triangle .menu').click(function(){
   $('.post .profile').hide();
});



$('.profile_btn').click(function(){
	
		        //alert('8');      
   $('.profile .profile').toggle();
   $('.cell_layout_main .cell_layout').hide();
   $('.post .profile').hide();
   $('.recent_posts').hide();
   $('.updater .updater').hide();
   $('.user_video .user_video').hide();
   $('.settings .settings').hide();
   $('#video_slider').hide();
   $(".messagesd .allmessage").hide();
   $(".sendmsgpop #message").hide();
    $('.bookmarkf .bookmarkf').hide();
   
  
   $('.cell_layout_main .cell_layout').hide();   
   /*----recent visit page--- */
    var url='<?php echo SITEPATH;?>';
	   $.ajax({
         type:"POST",
        url:"visit_pageajax.php",
        data:{id:'Profile View',url:url},
        success:function(result){ 
		        //alert('8-s');            
        }
        });

}); 


$('.msgtofriend').click( function(){

   // $('.profile .profile').hide();
   // $('.post .profile').hide(); 
   // $('.recent-tab .recent_posts').hide();
   // $('.updater .updater').hide();
   // $('.message .profile').toggle();
   
   // $('.cell_layout_main .cell_layout').hide();
   // $('.user_video .user_video').hide();
   // $('.settings .settings').hide();
   // $('#video_slider').hide();
   //$('ul li').removeClass('active');

   /*----recent visit page--- */

		        //alert('9');      
   	var u_id = '<?php echo $_SESSION['user_id'];?>';	
	var f_id =  $(this).attr('id').replace('MSG_','');

    var url='<?php echo SITEPATH;?>';
	   $.ajax({
        type:"POST",
        url:"send_message.php",
        data:{id:'Updater',url:url,u_id:u_id,f_id:f_id},
        	success:function(result){   
		        //alert('9-s');      
        		$(".post .profile").hide();    
        		$(".sendmsgpop").show();
        		$(".sendmsgpop #message").css('display','block');
        		$(".message").html( result );
        }
        });


});



$('.recent').click(function(){
		       // //alert('10');   working   
   $('.profile .profile').hide();
   $('.post .profile').hide(); 
   $('.recent-tab .recent_posts').toggle();
   $('.cell_layout_main .cell_layout').hide();
   $('.updater .updater').hide();
   $('.user_video .user_video').hide();
   $('.settings .settings').hide();
   $(".messagesd .allmessage").hide();
    $('.bookmarkf .bookmarkf').hide();
   $('#video_slider').hide();
   $('ul li').removeClass('active');
    /*----recent visit page--- */
    var url='<?php echo SITEPATH;?>';
	   $.ajax({
        type:"POST",
        url:"visit_pageajax.php",
        data:{id:'Recent',url:url},
        success:function(result){  
		       // //alert('10-s');    working       
        }
        });
}); 

$('.updater').click(function(){  
		       // //alert('11');  working    
   $('.profile .profile').hide();
   $('.post .profile').hide(); 
   $('.recent-tab .recent_posts').hide();
   $('.updater .updater').toggle();
   $('.cell_layout_main .cell_layout').hide();
   $('.user_video .user_video').hide();
   $(".messagesd .allmessage").hide();
   $('.settings .settings').hide();
   $('#video_slider').hide();
    $('.bookmarkf .bookmarkf').hide();
   //$('ul li').removeClass('active');

   /*----recent visit page--- */
    var url='<?php echo SITEPATH;?>';
	   $.ajax({
        type:"POST",
        url:"visit_pageajax.php",
        data:{id:'Updater',url:url},
        success:function(result){ 
		        //alert('11-s');  working          
        }
        });
}); 
$('.link.settings').click(function(){

		       // //alert('12');  working    
   $('.profile .profile').hide();
   $('.post .profile').hide();
   $('.recent_posts').hide();
   $('.updater .updater').hide();
   $('.user_video .user_video').hide();
   $(".messagesd .allmessage").hide();
   $('.settings .settings').toggle();
      
   $('#video_slider').hide();

   /*----recent visit page--- */
    var url='<?php echo SITEPATH;?>';
	   $.ajax({
         type:"POST",
        url:"visit_pageajax.php",
        data:{id:'Settings',url:url},
        success:function(result){  
		        //alert('12-s');   working        
        }
        });
}); 

</script>
<script type="text/javascript">
	$(document).ready(function(){
		        //alert('13');      
		$('#msgsuccess').html();
	/*----recent visit page--- */
          var url='<?php echo SITEPATH;?>';
           $.ajax({
               type:"POST",
              url:"visit_pageajax.php",
              data:{id:'oh',url:url},
              success:function(result){ 
              ////alert(result);  
		        //alert('13-s');          
              }
              });
       });
</script>



<script type="text/javascript">
/*$('.close-btn').click(function(){

   $('.profile .profile').hide();
   $('.updater .updater').hide(); 
   $('.map .calendar_map').hide(); 
   $('.calendar .calendar-o').hide(); 
   $('.frdsprofile .frdsprofile.c').hide();
   $('.cell_layout').hide();
    $(this).parent().parent().hide();  
});*/
function closebtn(){
	 $('.frdsprofile .frdsprofile.c').hide(); 
}
$('.close-btn-sub').click(function(){
	//alert('14');
   $(this).parent().hide();  
});

$('#btn_edit_profile').click(function(){
	//alert('15');
   $('.profile_edit').show();
   $('.info_edit').hide(); 
   $('.profile_about_edit').hide();
   $('.profile_avitor_edit').hide(); 
   
});
$('.btn_info_edit').click(function(){
		        //alert('16');      
   $('.info_edit').show();
   $('.profile_edit').hide();
   $('.profile_about_edit').hide(); 
   $('.profile_avitor_edit').hide(); 
});
$('.btn_about_edit').click(function(){
		        //alert('17');      
   $('.profile_about_edit').show();  
   $('.info_edit').hide();
   $('.profile_edit').hide();
   $('.profile_avitor_edit').hide();
});

$('.btn_avitor_edit').click(function(){
		        //alert('18');      
   $('.profile_avitor_edit').show();
   $('.profile_about_edit').hide();    
   $('.info_edit').hide();
   $('.profile_edit').hide();
});

$('.btn_photo_gallary').click(function(){
		        //alert('19');      
   $('.profile_photo_gallary').show();
   $('.profile_avitor_edit').hide();
   $('.profile_about_edit').hide();    
   $('.info_edit').hide();
   $('.profile_edit').hide();
});

$('#addphoto').click(function(){
	
		        //alert('20');      
   $('.photo_gallary_add').show();
   $('.profile_photo_gallary').hide();
   $('.profile_avitor_edit').hide();
   $('.profile_about_edit').hide();    
   $('.info_edit').hide();
   $('.profile_edit').hide();
});

$('.profilevideo').click(function(){

		        //alert('21');      
	$('.profile_video_pop').show();
});

$('.btn-calendar').click(function(){

		        //alert('22');      

   $('.profile .profile').hide();
   $('.post .profile').hide();
   $('.recent_posts').hide();
   $('.updater .updater').hide();
   $('.user_video .user_video').hide();
   $('.settings .settings').hide();
   $('.cell_layout_main .cell_layout').hide();   
   $('#video_slider').hide();
   $('.map .calendar_map').hide(); 
   $('.calendar .calendar-o').toggle(); 
});
$('.btn-map').click(function(){

		        //alert('23');      
   $('.profile .profile').hide();
   $('.post .profile').hide();
    $('.bookmarkf .bookmarkf').hide();
   $('.recent_posts').hide();
   $('.updater .updater').hide();
   $('.user_video .user_video').hide();
   $('.settings .settings').hide();
   $('.cell_layout_main .cell_layout').hide();   
   $('#video_slider').hide();
   $('.map .calendar_map').toggle(); 
   $('.calendar .calendar-o').hide(); 
});

</script>


<script type="text/javascript">
	$('.fa-window-minimize').click(function(){
		        //alert('24');      
		$('.updater .updater').hide();
		$('.profile .profile').hide();
   		$('.post .profile').hide();
   		$('.recent_posts').hide();
   		$('.settings .settings').hide();
   		$('.calendar_view').hide(); 
   		$('.cell_layout').hide();
   		$('.post .profile').hide();
   		 $('.bookmarkf .bookmarkf').hide();
   		$('.calendar .calendar-o').hide();
   		$('.profile .profile').hide();
   		 $('.calendar_map').hide(); 
	});
</script>

<script type="text/javascript">
		$('.fa-times').click(function(){
		        //alert('25');      
			
		$('.updater .updater').hide();
		$('.profile .profile').hide();
   		$('.post .profile').hide();
   		$('.recent_posts').hide();
   		$('.settings .settings').hide();
   		$('.calendar_view').hide();
   		$('.cell_layout').hide();
   		$('.post .profile').hide();
   		$('.user_video .user_video').hide();
   		 $('.bookmarkf .bookmarkf').hide();
   		$('.user_video .slidervideo').hide();
   		$('#video_slider').hide();
   		$('.calendar .calendar-o').hide();
   		$('.profile .profile').hide();
   		$('.calendar_map').hide();
	});
</script>


<script type="text/javascript">
		$('.fa-window-maximize').hide();
		$('.fa-window-restore').click(function(){
		        //alert('26');      

		$('.fa-window-restore').hide();
		$('.fa-window-maximize').show();
		$('.updater').height('100%');
    	$('.updater').height('100%');
    	$('.updater').css("max-width","900px"); 
    	$('.updater .recent-box-sc').height('100%');
    	

    	$('.profile').height('100%');
    	$('.profile').width('100%');
    	
    	
    	$('.recent_posts').height('100%');
    	//$('.recent_posts').width('100%');
    	$('.recent_posts').css("max-width","100%");      	
		$('.recent-box-sc').height('100%');

    	$('.settings .settings').height('100%');
    	$('.settings .settings').width('100%');
    	
    	$('.calendar_view').height('100%');
    	$('.calendar_view').width('100%');

    	$('.cell_layout').height('100%');
    	$('.cell_layout').width('100%');

    	$('.post .profile').height('100%');
    	$('.post .profile').width('100%');

    	$('.user_video .user_video').height('30%');
    	$('.user_video .user_video').width('70%');
    	  
    	$('.user_video .slidervideo').height('100%'); 
    	$('.calendar .calendar-o').height('100%');
    	$('.calendar .calendar-o').width('100%'); 

    	$('.profile .profile').height('100%');
    	$('.profile .info').height('80%');
    	$('.profile .profile').width('100%');   	

    	$('.calendar_map').height('100%');
    	$('.calendar_map').width('100%');

    	$('.profile_video_pop').height('25%');
    	$('.profile_video_pop').width('27%');
    	$('#playprofilevideo video').attr("height","100%");
	  	$('#playprofilevideo video').attr("width","100%");  
	  	$('.profile  .profile_video_pop').css("top","0px");  	
	  	$('.bookmarkf').height('100%');
    	$('.bookmarkf').height('100%');
    	$('.bookmarkf').css("max-width","900px"); 
    	$('.bookmarkf .recent-box-sc').height('100%');  	
    	
	});
</script>

<script type="text/javascript">
	$('.fa-window-maximize').click(function(){
		        //alert('27');      
		
		$('.fa-window-restore').show();
		$('.fa-window-maximize').hide();
		$('.updater').height('500px');
		$('.updater').css("max-width","741px"); 
		$('.profile').height('auto');
    	
		$('.recent_posts').height('auto');
    	$('.recent_posts').css("max-width","741px");      	
    	$('.recent-box-sc').height('498px');

    	$('.settings .settings').height('auto');
    	$('.settings .settings').width('auto');

    	$('.calendar_view').height('auto');
    	$('.calendar_view').width('auto');

    	$('.cell_layout').height('auto');
    	$('.cell_layout').width('auto');

    	$('.post .profile').height('auto');
    	$('.post .profile').width('auto');

    	$('.user_video .user_video').height('400px');
    	$('.user_video .user_video').width('600px');
    	  
    	$('.user_video .slidervideo').height('auto');  

    	$('.calendar .calendar-o').height('auto');
    	$('.calendar .calendar-o').width('auto'); 
    	$('.profile .profile').height('auto');
    	$('.profile .profile').width('auto');

    	$('.calendar_map').height('auto');
    	$('.calendar_map').width('auto');

    	$('.profile_video_pop').height('auto');
    	$('.profile_video_pop').width('auto'); 

    	$('.profile_video_pop').height('auto');
    	$('.profile_video_pop').width('500px');
    	$('#playprofilevideo video').attr("height","200px");
	  	$('#playprofilevideo video').attr("width","200px");  
	  	$('.profile  .profile_video_pop').css("top",""); 

	  	$('.bookmarkf').height('500px');
		$('.bookmarkf').css("max-width","741px"); 
		$('.bookmarkf').height('auto');

	});

$('#messagesdId').click(function(){
	//alert("28");	
	$.ajax({
    	type:"POST",
    	url:"message_pop.php",    	
    		success:function(result){
		        //alert('28-s');      
       		$('.messagesd').html(result); 
       		$('.allmessage').css('display','block');
       		$('.profilepop1 .profile .sendmsgpop .frdsprofile').hide();
                $('.sendmsgpop').css('display','none'); 
                
    	}
   	});
	return false;
});

$('#bookmarkedId').click(function(){
		        //alert('29');      	
	$.ajax({
    	type:"POST",
    	dataType: 'html',
    	url:"bookmark.php",    	
    		success:function(result){
		        //alert('29-s');      
       		$('.bookmarkf').html(result); 
       		$('.bookmarkf').css('display','block');	
       		$('.percentagelist2').hide();
       		$('.frdsprofile').hide();
			$('.religionlist2').hide();
			$('.coworkerlist2').hide();				                
    	}
   	});
	return false;
});
$('#close-bookmark-t').click( function(){	
		        //alert('30');      
	$('.bookmarkf').hide();
});	



$("#showprofile").click( function(){
        var uid = '';
        // var uid = $(this).attr('id');
		        //alert('31');      
        $.ajax({
            type:"POST",
            url:"profile.php",
            data:{id:uid},
                success:function(result){
		        //alert('31-s');      
                $('.frdsprofile').html(result);
                $('.frdsprofile .frdsprofile').show();
                //$('.friend .profile').hide();
                $('.profile .profile').show();
            }
         });
        return false;
});

</script>


</body>
</html>