<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");

$user = new User();    
?>
<!-- ***************Calendar****** -->

<?php

$time = time();
$year=date('Y', $time);
if(isset($_POST['month'])){
    
   $curr_month  = date('m');
   if($curr_month > $_POST['month'])
    {
     

         $priv=$_POST['month'];
           $month=$_POST['month'];
           $next = '';
    }
    else
    {
        
        $next=$_POST['month'];
        $priv ='';
         $month=$_POST['month'];

        
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
    if($p) $p = '<span class="calendar-prev">' . ($pl ?  $p  : $p) . '</span>&nbsp;';
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

<?php 
    if($month < 10)
    {
        $month = '0'.$month;
    }

      $curmonyear=$year.'-'.$month;
     //$curmonyear=date('Y-m');
    $result=$user->select_records('tbl_userevents','*',"date LIKE '".$curmonyear."%' AND u_id='".$_SESSION['user_id']."' order by date ASC ");

    $curtime = date('H:i:s');

    $result1=$user->select_records('tbl_userevents','*',"date LIKE '".date('Y-m-d')."' AND u_id='".$_SESSION['user_id']."' AND time =(select min(time) from tbl_userevents where time > '".$curtime."' AND date LIKE '".date('Y-m-d')."' )") ;

    
    if(!empty($result1[0]['event_id']))
    {
         $color1=$result1[0]['priority'];
    }
    if (!empty($result)) {
      
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
                    $('.mini_calendar table #<?php echo $fday ?>').attr('class','');         
                      $('.mini_calendar table #<?php echo $month.'-'.$fday ?>').addClass('<?php echo $result['priority']; ?>');
                    </script>
                 <?php
                
            }

         
         }   
      # code...
    }
?>

<!--**************footer search script ******-->
   
   <script type="text/javascript">
    $('.calendar-prev').click(function()
    {
        var month = "<?php echo  $month ;?>";
        month = parseInt(month) - 1;
        $.ajax({
            type:"POST",
            url:"calendar_ajax.php",
            data:{month:month},
            success:function(result){
                //alert(result);
                $('.cal').html(result);
                    
            }
         });
    });
    </script>
<script type="text/javascript">
    $('.calendar-next').click(function()
    {
        var month = "<?php echo  $month ;?>";
        
         month = parseInt(month) + 1;



        $.ajax({
            type:"POST",
            url:"calendar_ajax.php",
            data:{month:month},
            success:function(result){
                //alert(result);
                $('.cal').html(result);
                    
            }
         });
    });
</script>
<script type="text/javascript"> 
    // Event funcation    
      $('.mini_calendar table td').click(function(){
        
         $('.calendar_view').show();

          var ChkBxMsgId;
          ChkBxMsgId = $(this).attr('id');
          //alert(ChkBxMsgId);

           $.ajax({
         type:"GET",
        url:"getuserevent.php",
        data:{id:ChkBxMsgId},
        success:function(result){
        $("#content").html(result);
        }
        });
           
            /*----recent visit page--- */
          var url='<?php echo SITEPATH;?>';
           $.ajax({
               type:"POST",
              url:"visit_pageajax.php",
              data:{id:'View Event',url:url},
              success:function(result){       
              }
              });
            

      });

     
      // Close funcation    
      $('.close_event').click(function(){
         $('.new_event').hide();
      });


</script>




<script type="text/javascript"> 
    // Event funcation    
      $('.mini_cal table td').click(function(){
        
         $('.calendar_view').show();

          var ChkBxMsgId;
          ChkBxMsgId = $(this).attr('id');
           ChkBxMsgId=ChkBxMsgId.substr(3,2);
  
           $.ajax({
         type:"GET",
        url:"getuserevent.php",
        data:{id:ChkBxMsgId},
        success:function(result){
        $("#content").html(result);
        }
        });
           
            /*----recent visit page--- */
          var url='<?php echo SITEPATH;?>';
           $.ajax({
               type:"POST",
              url:"visit_pageajax.php",
              data:{id:'View Event',url:url},
              success:function(result){       
              }
              });
            

      });

      $('.close-btn').click(function(){
         $('.calendar_view').hide();
         location.reload();
      });


      // Close funcation    
      $('.close_event').click(function(){
         $('.new_event').hide();

         location.reload();
      });


</script>


