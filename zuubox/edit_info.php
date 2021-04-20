<form class="profile" method="post" enctype="multipart/form-data">

	<div class="title">USER PROFILE REGISTRATION</div>
	 
 <div class="info">
	<div class="sect soi">
	<div class="sect_title">
	Please check the boxes that you find interesting
	<div class="small">for better Results</div>
	</div> 
	<div class="col">
	<?php  for($i=01; $i <= 200; $i++){?>
		<label class="interest" style="display: block;">
		<input type="checkbox" name="sois[]" value="15" >
		CELL<?php echo $i; ?>  </label>
		<?php  if(($i % 40) == 0) {
   echo "</div><div class='col'>";
    } ?>
	 <?php }?> 
	</div> 
	</div>

	<div class="sect about">
	<div class="sect_title">About</div>
	<textarea class="text" name="bio"></textarea>
	</div>
	<div class="buttons">
	<input type="submit" value="Register" class="save">
	</div>
	</div>

	</form>