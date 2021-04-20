<?php 
	require_once("include/config.php");
	require_once("include/functions.php");

	$user = new User();

	$day=$_POST['id'];
    if($day<10)
    {
        $day='0'.$day;
    }	
	$ym=date('Y-m');
	
	$edate=$ym.'-'.$day; 

    $getevent=$user->select_records('tbl_adminevent','*',"date = '".$edate."' ");
    
    ?>
   
    <?php	
    if($getevent)
    {
    foreach($getevent as $row)
    {
    	$d=explode(' ', $row['date_time']);
    	$time=$d[1];
    	$d1=explode(':', $time);
    	?>
    	
    	<div class="event-box">

          <h4><?php echo $row['event_name']?> </h4>
          <div style="text-align: right;"> <p><strong><?php echo $time?></strong></p></div>
          <p><strong><?php echo 'Time:'.$row['time'] ?></strong></p>
          <p><?php echo $row['event_disc']?></p>
          
        </div>  
    <?php }}
    else
    {
    	echo "Today not any event"  ;
    }



?>
