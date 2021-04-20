<?php
require_once("include/config.php");
require_once("include/functions.php");

$users = new User();
$cells = $users->select_allrecords('tbl_cell','*');

$allcountry=$users->select_allrecords('tbl_country','*');


?>
<form class="workhistory1">
    <div class="window-btn">
       
             <button type="button" class="close-btn-sub pull-right">x</button>
            <img class="img-responsive edu-head" src="img/work_header.png" alt="education_header">
    </div>
<div class="workhistory-details">
</div>

    <div class="workhistory-sec1">
    		<!--<a href="#" class="btn-box" id="add-work">Add</a>-->
    		<h1>AVATOR</h1>
    		
            <ul class="worklinks"> 
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
                                <h6 class=""><a href="#" id="add-workschool">Click here to ADD MORE</a></h6> 
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
                                <h6 class=""><a href="#" id="add-workhigh">Click here to ADD MORE</a></h6> 
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
                                <h6 class=""><a href="#" id="add-workinstitute">Click here to ADD MORE</a></h6> 
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
                                <h6 class=""><a href="#" id="add-workcollage">Click here to ADD MORE</a></h6> 
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
                                <h6 class=""><a href="#" id="add-workuniversity">Click here to ADD MORE</a></h6> 
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
                                <h6 class=""><a href="#" id="add-worktechnical">Click here to ADD MORE</a></h6> 
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
                        <h6 class=""><a href="#" id="add-workspecial">Click here to ADD MORE</a></h6> 
                    </div> 	
                		
                </li>
            </ul>
            <a href="#" class="btn-box2" >Add more here</a>
    </div>
</form>

<script type="text/javascript">
        $('.close-btn-sub').click(function(){
        $('.workhistory1').hide();           
    });
</script>

<script type="text/javascript">
    $('#work-historypop').click(function(){  
   $('.worklinks').show();
   $('.workdetails').hide();
    $('.login_box').hide(); 
   });
</script>