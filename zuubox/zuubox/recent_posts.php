<?php
//session_start();
require_once("include/config.php");
require_once("include/functions.php");

$user = new User();
$uid=$_SESSION['user_id'];
$current_date=date('Y-m-d');

$where="user_id='".$uid."' and add_date='".$current_date."'";

$history=$user->select_records('visit_pages','*',$where);

?>

<link rel="stylesheet" href="css/recent_posts.css">
<form class="recent_posts" method="post" enctype="multipart/form-data">
<div class="recent-box-sc">
<img src="img/top_bar.png" class="img-responsive">
<div class="window-btn window-btn2">
    <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
</div>
  <!--   <a class="close-btn pull-right" style="top: -2px;
    right: -1px;">x</a>
 -->

 <div class="recent-design">
		<div class="col-xs-12">

			<div class="row">
				<div class="col-xs-2">
					<ul class="nav nav-tabs scroll-rtl text-center">
					    <?php
					   		$startyear=2017;
                			
					   	  for($i=date('Y');$i>=2017;$i--)
					   	  {

					   		echo "<li id='".$i."' class='historyyear'>".$i."</li>";

					   		$monthlist= "

                <li id='".$i."-01'  class='sub-month sub-month' title='January'>January</li>
                <li id='".$i."-02' class='sub-month sub-month' title='February'>February</li>
                <li id='".$i."-03' class='sub-month sub-month' title='March'>March</li>
                <li id='".$i."-04' class='sub-month sub-month' title='April'>April</li>
                <li id='".$i."-05' class='sub-month sub-month' title='May'>May</li>
                <li id='".$i."-06'  class='sub-month sub-month' title='June'>June</li>
                <li id='".$i."-07'  class='sub-month sub-month' title='July'>July</li>
                <li id='".$i."-08' class='sub-month sub-month' title='August'>August</li>
                <li id='".$i."-09' class='sub-month sub-month' title='September'>September</li>
                <li id='".$i."-10' class='sub-month sub-month' title='October'>October</li>
                <li id='".$i."-11' class='sub-month sub-month' title='November'>November</li>
                <li id='".$i."-12' class='sub-month sub-month' title='December'>December</li>

				                ";

                  			echo $monthlist;
					   	  }
						?>

		   			</ul>
				</div>

				<div class="mainhistorylist">
				
				</div>
	</div>


<script type="text/javascript">
	
	$('ul li').click(function() {    
	var id = $(this).attr('id');  
			//alert(id);
	$(".currenthistory").hide();

	   $.ajax({
         type:"POST",
        url:"recent_historymonthlist.php",
        data:{year_id:id},
        success:function(result){
       		
			$(".mainhistorylist").html(result);
	       		
        }
        });
		    $('ul li').removeClass('active');
		    $(this).addClass('active');
		    
});
	function currendata(){
		var id='<?php echo date('Y-m');?>';  
			//alert(id);
		$.ajax({
         type:"POST",
        url:"recent_historymonthlist.php",
        data:{id:id},
        success:function(result){
			$(".mainhistorylist").html(result);

        }
        });
	}
	currendata();
</script>


	 </div>
	 </div>
 </div>
</form>

