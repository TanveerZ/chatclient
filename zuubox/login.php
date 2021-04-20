<?php // echo "<pre>"; print_r($_SESSION);?>
<form class="login_box center" method="post" action="" <?php if(isset($_SESSION['block']) && ($_SESSION['block']==1 OR $_SESSION['block']==2  OR  $_SESSION['block']==3) ){?> style="display:block" <?php }?>>
    <div class="login"  <?php if(isset($_SESSION['block']) && $_SESSION['block']==3){?> style="display:block" <?php }else if(isset($_SESSION['block']) && $_SESSION['block']==2){?> style="display:none" <?php } else if(isset($_SESSION['block']) && $_SESSION['block']==1){?> style="display:none" <?php } ?>>
		<div class="window-btn">
    	<button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
        <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
    </div>
        <div class="title">Please Log In</div>
		<div class="underline"></div>
			<label>
			Username
			<input type="text" name="username" class="textinput">
			</label>
			<label>
			Password
			<input type="password" name="password" class="textinput">
			</label> 
		    <input type="submit" value="Login" class="submit" name="submit">
		    <div class="forgot">
		    <a href="#" class="btn-user"> Forgot Username</a>
		    <a href="#" class="btn-pass"> Forget Password</a> 
		    </div>
		     <hr>
		    <?php 
		    	
		    if(isset($_SESSION['error'])){
					if($_SESSION['error']!="")
					{
						echo "<div class='error'>";
						echo $_SESSION['error'];	
						echo "</div>";				
					}
				}?>		
	</div>
 
	<div class="username" <?php if(isset($_SESSION['block']) && $_SESSION['block']==1){?> style="display:block" <?php } else if(isset($_SESSION['block']) && $_SESSION['block']==2){?> style="display:none" <?php } else if(isset($_SESSION['block']) && $_SESSION['block']==3){?> style="display:none" <?php } ?>>
		<div class="window-btn">
    	<button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
        <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
    </div>
        <div class="title">Forgot Username</div>
		
		<div class="underline"></div>
			<label>
			Email
			<input type="text" name="emailun" class="textinput">
			</label> 
		    <input type="submit" value="Send" class="submit" name="forgotuname">
		    <div class="forgot">
		    <a href="#" class="btn-login"> Back to login</a>
		    <a href="#" class="btn-pass"> Forget Password</a> 
		    </div>
		    <hr>
		    <?php 		    	
		    if(isset($_SESSION['error'])){
					if($_SESSION['error']!="")
					{

						echo "<div class='error'>";
						echo $_SESSION['error'];	
						echo "</div>";						
					}
				}?>

				<?php if(isset($_SESSION['success'])){
					if($_SESSION['success']!="")
					{
						echo "<div class='success'>";
						echo $_SESSION['success'];
						echo "</div>";							
					}
				}?>
	</div> 


	<div class="password" <?php if(isset($_SESSION['block']) && $_SESSION['block']==2){?> style="display:block" <?php }else if(isset($_SESSION['block']) && $_SESSION['block']==1){?> style="display:none" <?php } else if(isset($_SESSION['block']) && $_SESSION['block']==3){?> style="display:none" <?php } ?>>
		<div class="window-btn">
    	<button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
        <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
    </div>
        <div class="title">Forget Password</div>
		<div class="underline"></div>
			<label>
			Email
			<input type="text" name="emailid" class="textinput">
			</label> 
		    <input type="submit" value="Send" class="submit" name="forgotpass">
		    <div class="forgot">
		    <a href="#" class="btn-login"> Back to login</a> 
		    <a href="#" class="btn-user"> Forgot Username</a>
		</div>
		 <hr>
		    <?php 
		    	
		    if(isset($_SESSION['error'])){
					if($_SESSION['error']!="")
					{
						echo "<div class='error'>";
						echo $_SESSION['error'];	
						echo "</div>";						
					}
				}?>

				<?php if(isset($_SESSION['success'])){
					if($_SESSION['success']!="")
					{
						echo "<div class='success'>";
						echo $_SESSION['success'];
						echo "</div>";						
					}
				}?>

	</div> 
</form>
<?php unset($_SESSION['block']);
	 unset($_SESSION['error']);
	 unset($_SESSION['success']);	 
?>


<script type="text/javascript">
  $('#minimize-window').click(function(){

     $('.about-page').hide();

      $('.login_box').hide();

      $('.profile').hide();
  });
</script>