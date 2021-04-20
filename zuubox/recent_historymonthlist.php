<?php
     session_start();
require_once("include/config.php");
require_once("include/functions.php");

$user = new User();
$uid=$_SESSION['user_id'];

if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
	$yearmonth = $_REQUEST['id'];
	$year = $_REQUEST['id'];

	 $ym=explode('-',$year);
	 $year=$ym[0];
	 $month=$ym[1];


	$where="user_id='".$uid."' and add_date Like '".$yearmonth."%'";

    //echo $where; die(); 
}
else if (isset($_REQUEST['year_id']) && !empty($_REQUEST['year_id'])) {
	
	$year=$_REQUEST['year_id'];


	$where="user_id='".$uid."' and add_date Like '".$year."%'";

    //echo $where; die(); 
}

$history=$user->select_records('visit_pages','*',$where);

?>

<div class="col-xs-2">
	<div class="monthlist">
<ul style="list-style-type: none">
	<li class="year" id="<?php echo $year;?>" style="background-color: orange;text-align: center;padding: 5px;"><?php echo $year;?></li>
	<li id=<?php echo $year.'-01'; ?> class="month <?php if($month == '01') echo "active";?>">January</li>
	<li id=<?php echo $year.'-02'; ?> class="month <?php if($month == '02') echo "active";?>">February</li>
	<li id=<?php echo $year.'-03'; ?> class="month <?php if($month == '03') echo "active";?>">March</li>
	<li id=<?php echo $year.'-04'; ?> class="month <?php if($month == '04') echo "active";?>">April</li>
	<li id=<?php echo $year.'-05'; ?> class="month <?php if($month == '05') echo "active";?>">May</li>
	<li id=<?php echo $year.'-06'; ?> class="month <?php if($month == '06') echo "active";?>">June</li>
	<li id=<?php echo $year.'-07'; ?> class="month <?php if($month == '07') echo "active";?>">July</li>
	<li id=<?php echo $year.'-08'; ?> class="month <?php if($month == '08') echo "active";?>">August</li>
	<li id=<?php echo $year.'-09'; ?> class="month <?php if($month == '09') echo "active";?>">September</li>
	<li id=<?php echo $year.'-10'; ?> class="month <?php if($month == '10') echo "active";?>">October</li>
	<li id=<?php echo $year.'-11'; ?> class="month <?php if($month == '11') echo "active";?>" >November</li>
	<li id=<?php echo $year.'-12'; ?> class="month <?php if($month == '12') echo "active";?>" >December</li>
</ul>
</div>
</div>


<div class='col-xs-7'>
	<div class="currenthistory">
<input type="checkbox" name="checkAll" id="checkAll" value=''> ALL Clear
<button type="button" class="btn btn-default pull-right" style="margin-right: 10px;" id="clear">Clear</button>
	 <hr>
<div class="history123">
<?php
if(!empty($history))
		{
			for($i=0;$i<count($history);$i++)
			{?>

				<div class="row">
				<div class="col-lg-1"><input type="checkbox" id='visit_id' value=<?php echo $history[$i]['visit_id'] ?>></div>	
				<div class='col-lg-2'><?php echo $history[$i]['add_time']?></div>
				<div class='col-lg-9'><?php echo $history[$i]['page_name']?></div>
				</div>
				<br>
			<?php
			}
		}
	else
		{	
			
			echo "<h4>History not found.</h4>";
			
		}	
?>
</div>
</div>
</div>
<script type="text/javascript">
		 	var visit=[];
        $('input[type="checkbox"]').click(function(){
        	      visit.push($(this).val());
        		  visit_id=visit.join(",");        		 
        		  
       	 	});

        $('#clear').click(function(){

		   $.ajax({
	         type:"POST",
	        url:"clear_historyajax.php",
	        data:{id:visit_id},
	        success:function(result){         
	        
	        	$('.history123').html(result);
	        	$('#checkAll').prop('checked', false);
	        	
	        }
	        });
        		
        });
		
	</script>


	  <script type="text/javascript">

		 	var visit=[];
		 	$("#checkAll").click(function () {
		 		 $('#checkAll').attr('checked','checked');
        		if ($("#checkAll").is(':checked')) 
        		{
           			$("input[id=visit_id]").each(function () {
            		
            			visit.push($(this).val());
        		  		visit_id=visit.join(","); 

                	$(this).prop("checked", true);
              		
            		}); 


 

	           		$('#clear').click(function(){
					   $.ajax({
				         type:"POST",
				        url:"clear_historyajax.php",
				        data:{id:visit_id},
				        success:function(result){ 

						$('.history123').html(result);
						$('#checkAll').prop('checked', false);
				            
		        		}
		        		});
	        		
	        		});

           		
        		} 
    		});
		

	</script>  



<script type="text/javascript">
	$('.month').click(function(){
		var id = $(this).attr('id');   
			//alert(id);
		 $.ajax({
	         type:"POST",
	        url:"recent_historymonthlist.php",
	        data:{id:id},
	        success:function(result){    
	       		
	       		$(".mainhistorylist").html(result);   
	       		window.stop();
	        }
	        });
		  
	});

	$('.year').click(function(){
		var id = $(this).attr('id');  
			//alert(id);
		 $.ajax({
	         type:"POST",
	        url:"recent_historymonthlist.php",
	        data:{year_id:id},
	        success:function(result){    
	       		
	       		$(".mainhistorylist").html(result);   
	       		window.stop();
	        }
	        });
		  
	});	

</script> 


