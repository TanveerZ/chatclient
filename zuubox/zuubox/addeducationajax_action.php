  <?php
  session_start();  
  require_once("include/config.php");
  require_once("include/functions.php");
  $user = new User(); 
  extract($_POST);

   $_SESSION['school'] = $school;
   $_SESSION['highschool'] = $highschool;
   $_SESSION['institude'] = $institude;
   $_SESSION['collage'] = $collage;
   $_SESSION['univercity'] = $univercity;
   $_SESSION['technical'] = $technical;
   $_SESSION['special'] = $special;



  ?>

  <a href="#" class="btn-box" id="add-edu">Add</a>
    		<h1>AVATOR</h1>
    		<ul> 
            	<li>
                	<div class="row">
                    	<div class="col-xs-4">
            				<h6>Name of school:</h6>
                        	
                        </div>
                    	<div class="col-xs-8">
                        	<?php echo $_SESSION['school']; ?>
                        </div>
                    </div>	
                </li>
            	<li>
                	<div class="row">
                    	<div class="col-xs-4">
            				<h6>Name of high school:</h6>
                        	
                        </div>
                    	<div class="col-xs-8">
                        	<?php echo $_SESSION['highschool']; ?>
                        </div>
                    </div>	
                </li>
            	<li>
                	<div class="row">
                    	<div class="col-xs-4">
            				<h6>Name of institude:</h6>
                        	
                        </div>
                    	<div class="col-xs-8">
                        	<?php echo $_SESSION['institude']; ?>
                        </div>
                    </div>	
                </li>
            	<li>
                	<div class="row">
                    	<div class="col-xs-4">
            				<h6>Name of collage:</h6>
                        	
                        </div>
                    	<div class="col-xs-8">
                        	<?php echo $_SESSION['collage']; ?>
                        </div>
                    </div>	
                </li>
            	<li>
                	<div class="row">
                    	<div class="col-xs-4">
            				<h6>Name of univercity,</h6>
                        	
                        </div>
                    	<div class="col-xs-8">
                        	<?php echo $_SESSION['univercity']; ?>
                        </div>
                    </div>	
                </li>
            	<li>
                	<div class="row">
                    	<div class="col-xs-4">
            				<h6>Name of technical schedule,</h6>
                        	
                        </div>
                    	<div class="col-xs-8">
                        	<?php echo $_SESSION['technical']; ?>
                        </div>
                    </div>	
                </li>
            	<li>
                	<div class="row">
                    	<div class="col-xs-4">
            				<h6>Name of special traning,</h6>
                        	
                        </div>
                    	<div class="col-xs-8">
                        	<?php echo $_SESSION['special']; ?>
                        </div>
                    </div>	
                </li>
            </ul>
            <script type="text/javascript">
            	
            	$('#add-edu').click(function(){

				  $('.add-edu1').toggle();

				  $('.login_box').hide();

				});
            </script>