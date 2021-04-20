<?php	
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();
$current_date=date('Y-m-d');
?>
<link rel="stylesheet" href="css/cell.css">
<form class="cell" method="post" enctype="multipart/form-data">
<div class="recent-box-sc">   
<div class="window-btn window-btn2">
    <i class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></i>
    <i class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></i>
</div>
    	<button class="close-btn pull-right" style="    top: -2px;
    right: -1px;">x</button>
	    <div class="user-head">

           <div class="post-left">
        <div class="user-head">
            
           
            <a href="#">Add </a> <a href="#">Edit</a>
        </div>
        <div class="post-scroll">
           <div class="post-viwe">

          
             <div class="user-box">
               <div class="col-left user-img">
               <img src="img/user.png" class="img-responsive">
                <div class="profile_uplo">
                   Upload   
                   <input type="file" name="profile_pic" accept="image/*">
                </div>
               </div>
               <div class="col-left user-info">
                <h3>Eagleon</h3>
                <label class="col-xs-6"> Name <span>St Clair</span></label>  
                <label class="col-xs-6"> Sure name - Given name <span>Eli</span></label>

                <label class="col-xs-3">age  <span>27 </span> </label>
                <label class="col-xs-3">Gender  <span>Male </span> </label>
                <label class="col-xs-3">hieght  <span>5’9 </span> </label>
                <label class="col-xs-3">weight <span>149lb</span> </label> 

                <label class="col-xs-12">Profession <span>Designer</span></label>
                <label class="col-xs-6">City <span>Miami</span> </label>
                <label class="col-xs-6">Country  <span>US</span> </label>
                
               </div>
               <div class="col-left aviator">
               <h4>Avitor</h4>
               <a href="#">Add </a> <a href="#">Edit</a>
               </div>
             </div>
           
           </div>
        </div> 
    </div>
    <div class="post-right">
        <div class="user-filter">
            <div class="filter-top">
                <h4> User </h4>
                <p>Please click all that apply</p>
            </div>
            <div class="filter-box"> 
               <div class="check">
                    <div>
                    <input type="checkbox" name=""> Last logged in </div>
                    <div>
                    <input type="checkbox" name=""> Interest </div>
                    <div>
                    <input type="checkbox" name=""> Male </div>
                    <div>
                    <input type="checkbox" name=""> Female </div>
                </div>
                <div class="bar">

                </div>   
            </div> 
        </div>          
    </div>

</div>
</div>
</form>