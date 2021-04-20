<?php
//session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();

$uid=$_SESSION['user_id'];
if(isset($_REQUEST['searchtxt']))
{
    $searchtxt = $_REQUEST['searchtxt'];
}
else
{
    $searchtxt = '';
}
	/*------------event search -------------*/
        $where="u_id='".$uid."' AND (event_name LIKE'%".$searchtxt."%' OR event_desc LIKE'%".$searchtxt."%' )";
	 	$result=$user->select_records('tbl_userevents','*',$where);
	 
	 /*-----------------cell deatils----------------------*/
	 	
	 $wherecell="section_1 LIKE '%".$searchtxt."%' OR section_2 LIKE '%".$searchtxt."%' OR section_3 LIKE '%".$searchtxt."%'";
	 
	 $resultcell=$user->select_records('tbl_celldetails','*',$wherecell);

?>

<link rel="stylesheet" href="css/search.css">

<div class="search-r">
	<div class="window-btn window-btn2">
        <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window" onclick="searchclose()"></button>
        <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window" onclick="window_maximize()"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true"  onclick="window_minimize()"></button> 
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window" onclick="searchclose()"></button>
    </div>  
    <div class="search-box-sc"> 
        <div class="row">
        	<div class="col-sm-12" align="center">
        		<h4><u>Search Result</u></h4>
        	</div>
    	<div class="col-sm-12 table-responsive">

    		<h5><u>Events</u></h5>
    		<?php
    			if($result!='')
    			{
    		?>
    			<table class="table">
    				<tr>
    		      	   <th>id</th>
    				    <th>Event Name</th>
    				    <th>Event Description</th>
    				</tr>
    			<?php	
        		$i=1;
   				foreach($result as $val)
   				{	
        		?>

    			<tr>
    				<td><?php echo $i ?></td>
    				<td><?php echo $val['event_name']?></td>
    				<td><?php echo $val['event_desc']?></td>
    			</tr>
    		<?php
    		$i=$i+1;
    			}
    			?>
                </table>
    			<?php
    			}
    			else{
    				echo "<font color='red'>";
    				echo "Result Not Found";
    				echo "</font>";
    			}   			
    		?>
    	</div>

    	<div class="col-sm-12 table-responsive">
    		<h5><u>Cell Deatils</u></h5>
    		<?php
    			if($resultcell!='')
    			{
    				?>
    				<table class="table">
    					<tr>
    						<th>id</th>
    						<th>Cell Id</th>
    						<th>Section 1</th>
    						<th>Section 2</th>
    						<th>Section 3</th>
    					</tr>
    				<?php

    				$i=1;
    				foreach ($resultcell as $val) {
    					?>
    					<tr>
    						<td><?php echo $i ?></td>
    						<td><?php echo $val['cell_id'] ?></td>
    						<td><?php echo $val['section_1']?></td>
    						<td><?php echo $val['section_2']?></td>
    						<td><?php echo $val['section_3']?></td>
    					</tr>
    				
    				<?php
    				$i=$i+1;
    				}
    				echo "</table>";
    			}
    			else
    			{
    				echo "<font color='red'>";
    				echo "Result Not Found";
    				echo "</font>";
    			}


    		?>
    	</div>	
    </div>

    </div>  
</div>
<script type="text/javascript">
    function searchclose()
    {
      $('.search-r').hide();
    }
</script>


<script type="text/javascript">
    $('.fa-window-maximize').hide();
    function window_maximize()
    { 
        $('.search-r').height('100%');
        $('.search-r').width('100%');
        $('.searchpop .search-r').css('max-width','100%');
        $('.search-box-sc').height('100%');
        $('.fa-window-restore').hide(); 
        $('.fa-window-maximize').show();
    };
</script>

<script type="text/javascript">
    function window_minimize()
    {   
        $('.fa-window-restore').show();
        $('.fa-window-maximize').hide();
        $('.search-r').height('485px');
        $('.search-r').width('635px'); 
   }
</script>