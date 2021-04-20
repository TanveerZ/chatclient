<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();

$uid=$_SESSION['user_id'];
$current_date=date('Y-m-d');

$visit_id=trim($_POST['id'],',');


$where="visit_id IN($visit_id)";

$user->delete_row('visit_pages',$where);

$where="user_id='".$uid."' and add_date='".$current_date."'";
$history=$user->select_records('visit_pages','*',$where);



if(count($history))
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
		}else
		{?>
			<div class="row">
				<h4>History not found.</h4>
				</div>
		<?php }


	
?>
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
				            
		        		}
		        		});
	        		
	        		});

           		
        		} 
    		});
		

	</script>  



<script type="text/javascript">
	$('.month').click(function(){
			
		var id = $(this).attr('id');  
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

</script> 


