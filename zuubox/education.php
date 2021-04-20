<?php
//session_start(); 
require_once("include/config.php");
require_once("include/functions.php");

?>
<form class="education1">
    <div class="window-btn">
 <!--            <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
            <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
            <button type="button" class="fa fa-window-maximize" aria-hidden="true" style="display: none;"></button> 
            <button type="button" class="fa fa-times ss" aria-hidden="true" title="Close" id="close-window"></button>-->
            <button type="button" class="close-btn-sub pull-right">x</button>
            <img class="img-responsive edu-head" src="img/education_header.png" alt="education_header">
    </div>
    <div class="edication-sec1">
      	<!--<a href="#" class="btn-box" id="add-edu">Add</a>-->
    		<h1>AVATOR</h1>
    		<!--<ul> 
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
            				<h6>Name of institute:</h6>
                        	
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
            				<h6>Name of university:</h6>
                        	
                        </div>
                    	<div class="col-xs-8">
                        	<?php echo $_SESSION['univercity']; ?>
                        </div>
                    </div>	
                </li>
            	<li>
                	<div class="row">
                    	<div class="col-xs-4">
            				<h6>Name of technical schedule:</h6>
                        	
                        </div>
                    	<div class="col-xs-8">
                        	<?php echo $_SESSION['technical']; ?>
                        </div>
                    </div>	
                </li>
            	<li>
                	<div class="row">
                    	<div class="col-xs-4">
            				<h6>Name of special training:</h6>
                        	
                        </div>
                    	<div class="col-xs-8">
                        	<?php echo $_SESSION['special']; ?>
                        </div>
                    </div>	
                </li>
            </ul>-->
            <ul> 
            	<li>
                	<div class="row">
                    	<div class="col-xs-4">
            				<h6>Name of school:</h6>
            				<h6>Ex.10/2015 - 06/2016</h6>                        	
                        </div>
                    	<div class="col-xs-8">
                        	<h6 class="text-right">Cites, States</h6>
                            <div class="ed-right text-right">
                            	<h6>Type of certificates, diplomas, degrees</h6> 
                                <h6 class=""><a href="#" id="add-edu">Click here to ADD MORE</a></h6> 
                            </div>
                        </div>
                    </div>	
                </li>
            	<li>
                    <div class="row">
                        <div class="col-xs-4">
                            <h6 class="ed-left">Name of High school:</h6>
                            <h6>Ex.10/2015 - 06/2016</h6>                        	
                        </div>
                        <div class="col-xs-8">
                            <h6 class="text-right">Cites, States</h6>
                            <div class="ed-right text-right">
                                <h6>Type of certificates, diplomas, degrees</h6> 
                                <h6 class=""><a href="#" id="add-high">Click here to ADD MORE</a></h6> 
                            </div>
                        </div>
                    </div>                		
                </li>
            	<li>
                    <div class="row">
                        <div class="col-xs-4">
                            <h6 class="ed-left">Name of institute:</h6>
                            <h6>Ex.10/2015 - 06/2016</h6>                        	
                        </div>
                        <div class="col-xs-8">
                            <h6 class="text-right">Cites, States</h6>
                            <div class="ed-right text-right">
                                <h6>Type of certificates, diplomas, degrees</h6> 
                                <h6 class=""><a href="#" id="add-institute">Click here to ADD MORE</a></h6> 
                            </div>
                        </div>
                    </div>                 		
                </li>
            	<li>
                    <div class="row">
                        <div class="col-xs-4">
                            <h6 class="ed-left">Name of collage:</h6>
                            <h6>Ex.10/2015 - 06/2016</h6>                        	
                        </div>
                        <div class="col-xs-8">
                            <h6 class="text-right">Cites, States</h6>
                            <div class="ed-right text-right">
                                <h6>Type of certificates, diplomas, degrees</h6> 
                                <h6 class=""><a href="#" id="add-collage">Click here to ADD MORE</a></h6> 
                            </div>
                        </div>
                    </div> 
                		
                </li>
            	<li>
                    <div class="row">
                        <div class="col-xs-4">
                            <h6 class="ed-left">Name of university:</h6>
                            <h6>Ex.10/2015 - 06/2016</h6>                        	
                        </div>
                        <div class="col-xs-8">
                            <h6 class="text-right">Cites, States</h6>
                            <div class="ed-right text-right">
                                <h6>Type of certificates, diplomas, degrees</h6> 
                                <h6 class=""><a href="#" id="add-university">Click here to ADD MORE</a></h6> 
                            </div>
                        </div>
                    </div>                 		
                </li>
            	<li>
                    <div class="row">
                        <div class="col-xs-4">
                            <h6 class="ed-left">Name of technical school:</h6>
                            <h6>Ex.10/2015 - 06/2016</h6>                        	
                        </div>
                        <div class="col-xs-8">
                            <h6 class="text-right">Cites, States</h6>
                            <div class="ed-right text-right">
                                <h6>Type of certificates, diplomas, degrees</h6> 
                                <h6 class=""><a href="#" id="add-tech">Click here to ADD MORE</a></h6> 
                            </div>
                        </div>
                    </div> 	
                </li>
            	<li>
                    <div class="row">
                        <div class="col-xs-4">
                            <h6 class="ed-left">Name of special training:</h6>
                            <h6>Ex.10/2015 - 06/2016</h6>                        	
                        </div>
                        <div class="col-xs-8">
                            <h6 class="text-right">Cites, States</h6>
                        </div>
                    </div> 	
                		
                </li>
            </ul>
            <a href="#" class="btn-box2" >Add more here</a>
    </div>
</form>

<script type="text/javascript">
        $('.close-btn-sub').click(function(){
            $('.education1').hide();           
    });
</script>