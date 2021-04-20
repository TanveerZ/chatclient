<?php
	session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();
 $uid=$_SESSION['user_id'];

	 $idtab=$_REQUEST['id'];
	 if($idtab=='genralacc')
	 {
	 	$where="id='".$uid."'";
	 	$acc_result=$user->select_records('tbl_singup','*',$where);
	 }
	 else if($idtab=='manageacc')
	 {
	 	$where="id='".$uid."'";
	 	$manage_acc_result=$user->select_records('tbl_singup','*',$where);

	 }
	
	else if($idtab=='langtransleter')
	 {

	 	 $langtransleter='langtransleter';
	 }




?>

<div class="row">
<div class="col-lg-4 col-xs-4">
	<div class="menulist">
	<ul style="list-style-type: none">

		<li id="genralacc" class="settingmenu <?php if($idtab == 'genralacc') { echo "active";}?>">General Account Settings</li>
        <li id="manageacc" class="settingmenu <?php if($idtab == 'manageacc') { echo "active";}?>">Manage Account</li>
        <li id="menusetting" class="settingmenu <?php if($idtab == 'menusetting') { echo "active";}?>">Menu settings</li>
        <li id="menuitem" class="settingmenu <?php if($idtab == 'menuitem') { echo "active";}?>">Set up menu items</li>
        <li id="profilesetting" class="settingmenu <?php if($idtab == 'profilesetting') {echo "active";}?>">Profile settings</li>
        <li id="giftsection" class="settingmenu <?php if($idtab == 'giftsection') { echo "active";} ?>">Hide gifts section</li>
        <!--  <li id="langtransleter" class="settingmenu <?php if($idtab == 'langtransleter') {echo "active";}?>">Language Transleter</li> -->
        
	</ul>
</div>
</div>
<div class="col-lg-8 col-xs-8">

	<?php
	/*-----------------Genral account setting---------------*/
		if(isset($acc_result))

		{
			foreach ($acc_result as $resultgen) {		 
			}
			?>

			
			
				<h4>Genral Account Setting</h4>
				<div class="dataTable_wrapper">
                    <dl class="dl-horizontal">
                        
                       <dt>Full Name : </dt>
                       <dd><?php echo $resultgen['first_name']." ".$resultgen['last_name']; ?></dd>                        
                       
                        <dt>User Name : </dt>
                        <dd><?php echo $resultgen['username']; ?></dd> 


                        <dt>Contact : </dt>
                        <dd><?php echo $resultgen['email']; ?></dd> 

                        <dt>Ad account contact : </dt>
                        <dd><?php echo $resultgen['email']; ?></dd> 

                        <dt>Networks : </dt>
                        <dd><?php echo "Networks"; ?></dd> 

                        <dt>Temperature : </dt>
                        <dd><?php echo "Temperature"; ?></dd> 

                	</dl>
                    <hr />                                  
                </div>                            
		<?php
			}
			/*-----------------Manage account setting---------------*/
			if(isset($manage_acc_result))
			{
				foreach ($manage_acc_result as $mgaccresult) {		 
				}
			?>
				<h4>Manage Account Setting</h4>
					<div class="dataTable_wrapper">
                    	<dl class="dl-horizontal">
                    		<dt>UserName : </dt>
                        	<dd><?php echo $mgaccresult['username']; ?></dd> 

                        	<dt>Password : </dt>
                        	<dd><?php echo $mgaccresult['password']; ?></dd> 

                    	</dl>
                    </div>

		<?php	
			}

			/*-----------------Langeuage Transelter---------------*/
			/*if(isset($langtransleter))
			{

				echo "<h4>Langeuage Transelter</h4>";
				echo "<div id='google_translate_element'></div>";
			}*/
		?>




</div>
</div>












<script type="text/javascript">
	$('.settingmenu').click(function(){
			
		var id = $(this).attr('id');  
		 $.ajax({
	         type:"POST",
	        url:"setting_popajax.php",
	        data:{id:id},
	        success:function(result){    
	       		
	       		$(".mainsetting").html(result);   
	        }
	        });
		  
	});	

</script>


