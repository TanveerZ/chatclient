<?php
//session_start();
require_once("include/config.php");
require_once("include/functions.php");

$user = new User();

$rows=$user->select_allrecords('tbl_about','*');
    foreach ($rows as $rows) {
       $main_containt = $rows['main_containt'];
       $about_logo = $rows['about_logo'];
        
    }

$menurow=$user->select_allrecords('tbl_aboutmenu','*');
 
/*------------artical--------------*/    
$getartical=$user->select_row('tbl_artical','*');
$allarticals=$user->select_allrecords('tbl_artical','*');
/*------------subscriber post-----------*/
$getsubpost=$user->select_row('tbl_subscriberpost','*');
$allsubpost=$user->select_allrecords('tbl_subscriberpost','*');
/*------------play video----------*/
$getvedio=$user->select_row('tbl_adminvideo','*');
/*---------------------calendar-----------------*/


?>
<style>
  a.morelink {
      text-decoration:none;
      outline: none;
      color:blue;
  }
  .morecontent span {
      display: none;
  }
 </style>
    <form class="about-page" method="post" enctype="multipart/form-data" id="aboutspage">
      <div class="about-box-sc">
        <div class="col-xs-3">
          <div class="about-title-box">
            <h3 class="brand">Infubo</h3>
    
              <!-- <img class="img-responsive" src="<?php echo $about_logo?>" alt="logo" width="50%" height="50%"> -->
                <a class="btn">New here?</a>
                <a class="btn log_in" >PROFILE</a>
                <a class="btn register">SIGN UP! </a>
          </div>
        </div>
        <div class="col-xs-9">
        <div class="window-btn">
       <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
            <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
            <button type="button" class="fa fa-window-maximize" aria-hidden="true"></button>
            <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
        </div>
          <div class="title">ABOUT US</div>
        </div>
    
        <div class="col-xs-10 margin-auto ">
          <p>
              <?php 
                  echo $main_containt;
              ?>
          </p>
        </div>
    
      <div class="col-xs-8">
        <hr class="border">
        <div class="col-xs-4">
          <div class="menu">
            <h3>Menu</h3>
           <ul class="nav-menu">
            <?php
               foreach ($menurow as $menurow) {
                echo "<li><a href=''>".$menurow['menu_name']."</a></li>";
               }
            ?>
               
           </ul>
          </div>
        </div>
    
        <div class="col-xs-8 articcle">
            <div class="col-xs-12 articcle-menu ">
              <h3>Main article</h3>
              <a href="#" class="btn-box" id="allart">ALL ARTICLE</a>
              <a href="#" class="btn-box">MY INTERESTS</a>
            </div> 
            <div class="col-xs-12">
              <div id="article1">
                  <b><u><?php echo $getartical['artical_title']?></u></b>
                  <br>
                   <p><?php 
                         echo "<div class='more'>";
                        echo $getartical['artical_containt'];
                        echo "</div>";
                   ?></p>
              </div>
              <div id="allartical" style="display: none;">
                    <?php
                    $i=1;
                        foreach ($allarticals as $allrows) {
                            echo "<b><u>".$i.'.'.$allrows['artical_title']."</b></u>";
                            echo "<br><p>";
                            echo "<div class='more'>";
                            echo $allrows['artical_containt'];
                            echo "</div></p>";
                            echo "<br><br>";
                            $i=$i+1;
                        }
                    ?>            
              </div>
              
            </div> 
            <div class="col-xs-12 articcle-menu ">
                <h3 class="text-left">Subscribers’ posts (?)</h3>
                <a href="#" class="btn-box" id="allpost">ALL POSTS</a>
                <a href="#" class="btn-box">FRIENDS’ POSTS</a>
                <a href="#" class="btn-box">AREA</a>
            </div>
        </div>
        <div class="row">
          <div class="col-xs-4">
            <div class="menu"> 
             <ul class="nav-menu tow">
                 <li><a href="#">Jenn</a></li>
                 <li><a href="#">David</a></li>
                 <li><a href="#">Sarah</a></li> 
             </ul>
            </div>
          </div>
          <div class="col-xs-8">
              <div id="subpost1">
                  <p>
                    <?php
                        echo "<div class='more'>";
                        echo  $getsubpost['post_text'];
                        echo "</div>";
                    ?>
                  </p>
              </div>
              <div id="allsubpost" style="display: none;">
                  <?php
                      $i=1;
                      foreach ($allsubpost as $allrows) {                 
                       
                       echo "<p>";
                       echo "<div class='more'>";
                       echo $i.'.'.$allrows['post_text'];
                       echo "</div></p>";
                       echo "<br><br>";
    
                       $i=$i+1;
                      }
                  ?>
              </div>      
          </div>
        </div>    
    </div>
    <div class="col-xs-4">
      <!-- <script src="js/sidebar_right.js"></script> -->
      <div class="sidebar_r"> 
        <div class="cal_map">           
          <div class="calendar">
      
    <?php
    
    $time = time();
    $today = date('j', $time);
    $days = array($today => array(null, null,'<div id="today">' . $today . '</div>'));
    
    
    $pn = array('&laquo;' => date('n', $time) - 1, '&raquo;' => date('n', $time) + 1);
    echo generate_calendar(date('Y', $time), date('n', $time), $days, 1, null, 0);
    
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
        if($p) $p = '<span class="calendar-prev">' . ($pl ? '<a href="' . htmlspecialchars($pl) . '">' . $p . '</a>' : $p) . '</span>&nbsp;';
        if($n) $n = '&nbsp;<span class="calendar-next">' . ($nl ? '<a href="' . htmlspecialchars($nl) . '">' . $n . '</a>' : $n) . '</span>';
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
                $calendar  .= '<td id="'.$day.'"' . ($classes ? '  class="' . htmlspecialchars($classes) . '">' : '>') . 
                    ($link ? '<a href="' . htmlspecialchars($link) . '">' . $content . '</a>' : $content) . ' </td>';
            }
    
            else $calendar  .= "<td id='$day'>$day</td>";
        }
        if($weekday != 7) $calendar  .= '<td id="emptydays" colspan="' . (7-$weekday) . '">&nbsp;</td>'; //remaining "empty" days
    
        return $calendar . "</tr>\n</table>\n</div>\n";
    }
    ?>
          </div> 
        </div>
    
           <br>
            <div class="row go-right">
                <div class="col-xs-12">
                 <?php  
                    echo "<video width='100%' height='100%' controls>
                        <source src='".$getvedio['video_path']."'></video>";
                      ?>  
                   
                </div>
                <div class="col-xs-12 ">
                   <p style="margin: 0px;"> Looking for a travel partner? </p>
                   <a href="#" class="btn-box">LET’S GO!</a>
                </div>
                <div class="col-xs-12">
                   <p style="margin: 0px;"> Want to share some skills? </p>
                   <a href="#" class="btn-box">FIND OUT MORE!</a>
                </div>
                <div class="col-xs-12 "> 
                    <p></p>
                    <a href="#" class="btn-box">HELP US IMPROVE!</a>
                </div>
            </div>
        </div>
    </div>
            
      
    </div>
    </form>
 <div class="calendar">
            <?php include 'aboutus_cal_view.php';?> 
        </div>
<style type="text/css">
    
.sidebar_r .calendar .days {
    width: 100%;
    height: 0;
    padding: 50% 0 0 0;
    position: relative;
}

.sidebar_r .calendar .days .content {
    position: absolute;
    top: 0;
    left: 0;
}

.sidebar_r .calendar .day {
    display: inline-block;
    width: 14.28571%;
    height: 100%;
    text-align: right;
    font-size: 10px;
    position: relative;
    padding: 2%;
    background-color: #eee;
}
.sidebar_r .calendar .day.this_month {
    background-color: #fff;
}

.sidebar_r .calendar .day.low {
    background-color: yellow;
}
.sidebar_r .calendar .day.med {
    background-color: orange;
}
.sidebar_r .calendar .day.high {
    background-color: red;
}



.sidebar_r .calendar .week {
    white-space: nowrap;
    font-size: 0;
    position: relative;
    height: 20%;
}


.sidebar_r .calendar .day:not(:first-child),
.sidebar_r .calendar .days .week {
    border: 1px solid #ccc;
}
.sidebar_r .calendar .day:not(:first-child) {
    border-width: 0 0 0 1px;
}
.sidebar_r .calendar .days .week {
    border-width: 1px 0 0 0;
}

.sidebar_r .calendar .day_names .week {
    height: 10%;
}
.sidebar_r .calendar .day_names .day {
    text-align: center;
    border: none;
    padding: 2% 0;
    background-color: #fff;
}
.sidebar_r .calendar {
    border: 1px solid #000;
}
 
.high{
background-color: red !important;
}
.medium{
background-color: orange  !important;
}
.low
{
background-color:yellow !important; 
}

</style>



<?php 

  $curmonyear=date('Y-m');

$result=$user->select_records('tbl_adminevent','*',"date LIKE '".$curmonyear."%' ");

//echo "<pre>"; print_r($result); die();
   
if(!empty($result) && count($result) > 0){
   foreach ($result as $row) {
        $fdate=explode('-',$row['date']);
        $fday=$fdate[2];
       
         if($fday<10)
          {
            $fday = substr($fday,-1);
          }
         
          ?>
              <script type="text/javascript">
            
              $('.mini_calendar table #<?php echo $fday ?>').addClass('<?php echo $row['priority']; ?>');
              </script>
          <?php
         }  
         } 
         ?>


<!-------- articals ----- -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#allart").click(function(){
            $("#article1").hide();
            $("#allartical").toggle();        
        });
    });
</script>
<!-------- subscriber post ----- -->
<script type="text/javascript">
    $(document).ready(function(){
        $("#allpost").click(function(){
            $("#subpost1").hide();
            $("#allsubpost").toggle();        
        });
    });
</script>

 <!--------------read more-------------  -->
<script>
    $(document).ready(function() {
    var showChar = 100;
    var ellipsestext = "...";
    var moretext = "read more";
    var lesstext = "less";
    $('.more').each(function() {
        var content = $(this).html();

        if(content.length > showChar) {

            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);

            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="btn-box">' + moretext + '</a></span>';
            $(this).html(html);      }

    });

    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
    </script>

