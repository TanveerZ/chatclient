<link rel="stylesheet" href="css/calendar.css">

<div class="calendar-o">

<div class="window-btn window-btn2">
    <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
</div>

    <div id=""> 



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



echo generate_cal($year,$month , $days, 1, null, 0,$pn);



function generate_cal($year, $month, $days = array(), $day_name_length = 3, $month_href = NULL, $first_day = 0, $pn = array())

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

    if($p) $p = '<span class="calendar-prev">' . ($pl ? '<a href="oh.php?month=' . htmlspecialchars($pl) . '">' . $p  . '</a>' : $p) . '</span>&nbsp;';

    if($n) $n = '&nbsp;<span class="calendar-nextpop">' . ($nl ? '<a href="oh.php?month=' . htmlspecialchars($nl) . '">' . $n . '</a>' : $n) . '</span>';



    $calendar = "<div class=\"mini_cal \">\n<table>" . "\n" . 

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

            $calendar  .= '<td id="pop'.$day.'"' . ($classes ? '  class="' . htmlspecialchars($classes) . '">' : '>') . 

                ($link ? '<a href="' . htmlspecialchars($link) . '">' . $content . '</a>' : $content) . '</td>';

        }

        else $calendar  .= "<td id='pop$day'>$day</td>";

    }

    if($weekday != 7) $calendar  .= '<td id="emptydays" colspan="' . (7-$weekday) . '">&nbsp;</td>'; //remaining "empty" days



    return $calendar . "</tr>\n</table>\n</div>\n";

}

?>



        

    </div>  

</div>





<?php



    

    if($month<10)

    {

        $month='0'.$month;

    }

    else

    {

        $month;

    }   

    /*$curmonyear=$year.'-'.$month;

     //$curmonyear=date('Y-m');

    $result=$user->select_records('tbl_userevents','*',"date LIKE '".$curmonyear."%' ");

   foreach ($result as $result) 

   {

          $fdate=explode('-',$result['date']);

        $fday=$fdate[2];



        $color=$result['priority'];

          ?>

              <script type="text/javascript">

         

              $('.mini_cal table #<?php echo 'pop'.$fday ?>').addClass('<?php echo $color ?>');

          

             

              </script>

          <?php

      }   */



     $curmonyear=$year.'-'.$month;

     //$curmonyear=date('Y-m');

    $result=$user->select_records('tbl_userevents','*',"date LIKE '".$curmonyear."%' AND u_id='".$_SESSION['user_id']."' order by date ASC ");

//echo "<pre>"; print_r($result); die();

     $curtime = date('H:i:s');



    $result1=$user->select_records('tbl_userevents','*',"date LIKE '".date('Y-m-d')."' AND u_id='".$_SESSION['user_id']."' AND time =(select min(time) from tbl_userevents where time > '".$curtime."' AND date LIKE '".date('Y-m-d')."' )") ;

    

    if(!empty($result1[0]['event_id']))
    {

        $color1=$result1[0]['priority'];

    }
    else
    {
        $color1 = '';
    }

    
    if(!empty($result))
{
    foreach ($result as $val) {

          $fdate=explode('-',$val['date']);

          $fday=$fdate[2];

         if($fday<10)

          {

            $fday = substr($fday,-1);

          }

            

            if($val['date']==date('Y-m-d'))

            {

                    ?>

                      <script type="text/javascript">        



                        $('.mini_cal #today').addClass('<?php echo $color1; ?>');

                  

                      </script>

                  <?php

            }

            else

            {



                 ?>



                    <script type="text/javascript"> 

                    $('.mini_cal table #<?php echo 'pop'.$fday ?>').attr('class','');         

                      $('.mini_cal table #<?php echo 'pop'.$fday ?>').addClass('<?php echo $val['priority']; ?>');

                    </script>



                 <?php

                

            }



         

         }   

}



?>



<script type="text/javascript">

    $('.close-btn').click(function(){

   

   $('.calendar-o').hide(); 

   

});

</script>

