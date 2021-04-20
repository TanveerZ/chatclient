<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();
$uid=$_SESSION['user_id'];

if(isset($_REQUEST['searchupdater']))
{

		$searchupdater=$_REQUEST['searchupdater'];

		/*------------event search -------------*/
        $where="u_id='".$uid."' AND (event_name LIKE'%".$searchupdater."%' OR event_desc LIKE'%".$searchupdater."%' OR event_type LIKE '%".$searchupdater."%' OR priority LIKE '%".$searchupdater."%'  OR date LIKE '%".$searchupdater."%' )";
	 	$result=$user->select_records('tbl_userevents','*',$where);
	 	
}

	
?>

<div class="col-xs-9">
    <div class="updaterdata">
    	<div class="panel panel-default">
            <div class="panel-heading">Events</div>
       	    <div class="panel-body">
       	    	<div class="table-responsive">
       	    		<table class="table">
       	    			<thead>
	       	    			<tr>
	       	    				<th>Event Type</th>
	       	    				<th>Event Name</th>
	       	    				<th>Event Priority</th>
	       	    				<th>Event Date</th>
	       	    			</tr>
       	    			</thead>
                	 <tbody>  
                	<?php
                	if($result!='')
                	{
                		foreach ($result as $value) {
                		?>

                		<tr>
                			<td><?php echo $value['event_type'];?></td>
                			<td><?php echo $value['event_name'];?></td>
                			<td><?php echo $value['priority'];?></td>
                			<td><?php echo $value['date'];?></td>
                		</tr>
                	<?php
                		}
                	}
                	else
                	{
                		echo "<tr><td>";
                		echo "Result Not Found";
                		echo "</td></tr>";
                	}
                	?>
				</tbody>
				</table>
				</div>
              	</div>
           	</div>
       </div>
    </div>    	
</div>
      