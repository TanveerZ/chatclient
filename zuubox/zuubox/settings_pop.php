<?php	
//session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();
$current_date=date('Y-m-d');

?>
<link rel="stylesheet" href="css/settings.css">
<form class="settings" method="post" enctype="multipart/form-data" <?php if( (isset($_SESSION['history'])==1) && !empty($_SESSION['history']) ){?> style="display:block" <?php }?>>
<div class="recent-box-sc">
  <div class="month_title">
      <img src="img/setting_header.PNG" class="img-responsive">
      <div class="window-btn window-btn2">
    	  <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
    </div>
    </div>
   
  <!-- 	<a class="close-btn pull-right" style="top: -2px;
    right: -1px;">x</a> -->
	


<div class="col-xs-12">
	<div class="row">
    	<div class="col-xs-2 pright0">
             <div class="bhoechie-tab-menu">
             
                 <div class="list-group">
                        <a href="#" class="list-group-item active">
                          <h4 class="fa fa-cogs" aria-hidden="true"></h4>General Account Settings
                        </a>
                        
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-bars" aria-hidden="true"></h4>Menu settings
                        </a>
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-user" aria-hidden="true"></h4>Profile settings
                        </a> 
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-shield" aria-hidden="true"></h4>Security and Login
                        </a>  
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-lock" aria-hidden="true"></h4>Privacy Settings and Tools
                        </a>  
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-camera" aria-hidden="true"></h4>My profile
                        </a> 
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-user-secret" aria-hidden="true"></h4>Privacy
                        </a>  
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-cloud" aria-hidden="true"></h4>Save
                        </a>  
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-list" aria-hidden="true"></h4>Blacklist
                        </a>  
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-tags" aria-hidden="true"></h4>Timeline and Tagging Settings
                        </a>  
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-ban" aria-hidden="true"></h4>Manage Blocking
                        </a>  
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-language" aria-hidden="true"></h4>Language Settings
                        </a>  
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-ban" aria-hidden="true"></h4>Blocking 
                        </a>  
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-bell" aria-hidden="true"></h4>Notifications 
                        </a>  
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-mobile" aria-hidden="true"></h4>Mobile Settings 
                        </a> 
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-rss-square" aria-hidden="true"></h4>Public Posts  
                        </a> 
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-android" aria-hidden="true"></h4>Apps  
                        </a> 
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-address-card-o" aria-hidden="true"></h4>Ads  
                        </a> 
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-credit-card" aria-hidden="true"></h4>Payments  
                        </a> 
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-life-ring" aria-hidden="true"></h4>Support Inbox  
                        </a> 
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-file-video-o" aria-hidden="true"></h4>Videos  
                        </a> 
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-bell-o" aria-hidden="true"></h4>Notifications Settings 
                        </a> 
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-facebook-square" aria-hidden="true"></h4> Zuubox’s
                        </a> 
                        <a href="#" class="list-group-item">
                           <h4 class="fa fa-cog" aria-hidden="true"></h4>Account Settings
                        </a>         
                      </div>
              </div>
        </div>
    	<div class="col-xs-10 p-add1">
            <div class="bhoechie-tab">
                <div class="bhoechie-tab-content active">

                      <h2>General Account Settings</h2>
                      <?php
                        $where="id='".$uid."'";
                        $gen_acc=$user->select_records('tbl_singup','*',$where);
                        foreach ($gen_acc as $gen_acc) {    
                        }
                      ?>

                      <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                	<div class="row">
                                      <div class="col-xs-4"><h6>Name</h6></div>
                                      <div class="col-xs-6"><p id='showchangename'><?php echo $gen_acc['first_name'].' '.$gen_acc['last_name'] ?></p></div>
                                      <div class="col-xs-2"><a href="#" class="edit-btn">Edit</a></div>
                                    </div>
                                </h4>
                              </div>
                              <div id="collapse1" class="panel-collapse collapse">
                              	   <form name="frmchangename" method="post" action="" id="frmchangename">
                                  <div class="row">
                                        <div class="form-group">
                                            <div class="col-xs-3"><label>Surname/Family Name</label></div>
                                            <div class="col-xs-9"><input type="text" class="form-control" name="surname" id="surname"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-3"><label>Name</label></div>
                                            <div class="col-xs-9"><input type="text" class="form-control" name='name' id="name"></div>
                                        </div>
                                       
                                        <div class="form-group">
                                            <div class="col-xs-3"></div>
                                            <div class="col-xs-9">
                                              <div class="row">
                                                  <div class="col-xs-6"><button class="submit" type="button" id='changename' >Save Change</button></div>
                                                  <div class="col-xs-6"><button class="cancel" type="button" id="cancel">Cancel</button></div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                	<div class="row">
                                      <div class="col-xs-4"><h6>Username</h6></div>
                                      <div class="col-xs-6"><p id="showchangeusername"><?php echo $gen_acc['username'] ?></p></div>
                                      <div class="col-xs-2"><a href="#" class="edit-btn">Edit</a></div>
                                    </div>
                                </h4>
                              </div>
                              <div id="collapse2" class="panel-collapse collapse">
                              	   <form name="frmchangeusername" method="post" action="" id="frmchangeusername">
                                  <div class="row">
                                        <div class="form-group">
                                            <div class="col-xs-3"><label>Username</label></div>
                                            <div class="col-xs-9"><input type="text" class="form-control" name="username" id="username1"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-3"></div>
                                            <div class="col-xs-9">
                                              <div class="row">
                                                  <div class="col-xs-6"><button class="submit" type="button" id="chnageusername" >Save Changes</button></div>
                                                  <div class="col-xs-6"><button class="cancel" type="button" id="cancel1">Cancel</button></div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                	<div class="row">
                                      <div class="col-xs-4"><h6>Contact</h6></div>
                                      <div class="col-xs-6"><p id="showcontact"><?php echo $gen_acc['phoneno'] ?></p></div>
                                      <div class="col-xs-2"><a href="#" class="edit-btn">Edit</a></div>
                                    </div>
                                </h4>
                              </div>
                              <div id="collapse3" class="panel-collapse collapse">
                              	<form name="frmchangecontact" method="post" action="" id="frmchangecontact">
                                  <div class="row">
                                        <div class="form-group">
                                            <div class="col-xs-3"><label>Contact</label></div>
                                            <div class="col-xs-9"><input type="text" name="contact" id="contact" class="form-control">
                                            </div>
                                        </div>
                                     
                                        <div class="form-group">
                                            <div class="col-xs-3"></div>
                                            <div class="col-xs-9">
                                              <div class="row">
                                                  <div class="col-xs-6"><button class="submit" type="button" id="changecontact" >Save Changes</button></div>
                                                  <div class="col-xs-6"><button class="cancel" type="button" id='cancel2'>Cancel</button></div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </form>
                              </div>
                            </div>
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                	<div class="row">
                                      <div class="col-xs-4"><h6>Add account contact</h6></div>
                                      <div class="col-xs-6"><p id="showemail"><?php echo $gen_acc['email'] ?></p></div>
                                      <div class="col-xs-2"><a href="#" class="edit-btn">Edit</a></div>
                                    </div>
                                </h4>
                              </div>
                              <div id="collapse4" class="panel-collapse collapse">
                              	 <form name="frmchangeemail" method="post" action="" id="frmchangeemail">
                                  <div class="row">
                                        <div class="form-group">
                                            <div class="col-xs-3"><label>Add account contact</label></div>
                                            <div class="col-xs-9"><input type="text" name="emailid" id="emailid" class="form-control"></div>
                                        </div>  
                                        <div class="form-group">
                                            <div class="col-xs-3"></div>
                                            <div class="col-xs-9">
                                              <div class="row">
                                                  <div class="col-xs-6"><button class="submit" type="button" id="changeemail" >Save Changes</button></div>
                                                  <div class="col-xs-6"><button class="cancel" type="button" id='cancel3'>Cancel</button></div>
                                                </div>
                                            </div>
                                        </div>                                      
                                    </div>
                                </form>
                              </div>
                            </div>
                           <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                	<div class="row">
                                    	<div class="col-xs-4"><h6>Networks</h6></div>
                                    	<div class="col-xs-6"><p>No networks.</p></div>
                                    	<div class="col-xs-2"><a href="#" class="edit-btn">Edit</a></div>
                                    </div>
                                </h4>
                              </div>
                              <div id="collapse5" class="panel-collapse collapse">
                              	<form>
                                	<div class="row">
                                        <div class="form-group">
                                            <div class="col-xs-3"><label>No networks.</label></div>
                                            <div class="col-xs-9"><input type="text" class="form-control"></div>
                                        </div>                                        
                                    </div>
                                </form>
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse6">
                                	<div class="row">
                                    	<div class="col-xs-4"><h6>Temperature</h6></div>
                                    	<div class="col-xs-6"><p>Fahrenheit</p></div>
                                    	<div class="col-xs-2"><a href="#" class="edit-btn">Edit</a></div>
                                    </div>
                                </h4>
                              </div>
                              <div id="collapse6" class="panel-collapse collapse">
                              	<form>
                                	<div class="row">
                                        <div class="form-group">
                                            <div class="col-xs-3"><label>Temperature</label></div>
                                            <div class="col-xs-9"><label>Choose scale</label> <select name="temperature"><option value="2" selected="1">Celsius</option><option value="1">Fahrenheit</option></select></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-3"></div>
                                            <div class="col-xs-9">
                                            	<div class="row">
                                                	<div class="col-xs-6"><button class="submit" type="submit" >Save Changes</button></div>
                                                	<div class="col-xs-6"><button class="cancel" type="button">Cancel</button></div>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </form>
                              </div>
                            </div>
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse7">
                                	<div class="row">
                                    	<div class="col-xs-4"><h6>Manage Account</h6></div>
                                    	<div class="col-xs-6"><p>Modify your Legacy Contact settings or deactivate your account.</p></div>
                                    	<div class="col-xs-2"><a href="#" class="edit-btn">Edit</a></div>
                                    </div>
                                </h4>
                              </div>
                              <div id="collapse7" class="panel-collapse collapse">
                              	<form>
                                	<div class="row">
                                        <div class="form-group">
                                            <div class="col-xs-3"><label>Manage Account</label></div>
                                            <div class="col-xs-9">
                                            <b>Your legacy contact</b><p>A legacy contact is someone who you choose to manage your account after you pass away. They'll be able to do things such as pin a post on your timeline, respond to new friend requests and update your profile picture. They won't post as you or see your messages.</p>
                                             <input type="text" class="form-control" placeholder="Choose a friend">
                                             <input type="submit" value="Add" class="sub-btn1">
                                             <p>We'll send your legacy contact an email explaining what this means. You'll also have the option to send them a message straight away. They won't be notified again until your account is memorialised.</p>
                                             <p>If you don't want to have a Facebook account after you've passed away, you can request to have your account permanently deleted instead of choosing a legacy contact.</p>
                                             <b>Deactivate your account</b>
                                             <p>Deactivating your account will disable your Profile and remove your name and photo from most things that you've shared on Facebook. Some information may still be visible to others, such as your name in their Friends list and messages that you've sent.
<a href="#">Deactivate your account.</a></p>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-3"></div>
                                            <div class="col-xs-9">
                                            	<div class="row">
                                                	<div class="col-xs-6"><button class="cancel" type="button">Close</button></div>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </form>
                              </div>
                            </div>
                         </div>                      
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Menu settings</h2>
                      <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse8">
                                	<div class="row">
                                    	<div class="col-xs-4"><h6>Set up menu items</h6></div>
                                    	<div class="col-xs-8"><a href="#" class="edit-btn">Edit</a></div>
                                    </div>
                                </h4>
                              </div>
                              <div id="collapse8" class="panel-collapse collapse">
                              	
                              </div>
                            </div>
                         </div>                      
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Profile settings</h2>
                      <div class="panel-group" id="accordion">
                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse9">
                                	<div class="row">
                                    	<div class="col-xs-4"><h6>Password Change</h6></div>
                                    	<div class="col-xs-8"><a href="#" class="edit-btn">Edit</a></div>
                                    </div>
                                </h4>
                              </div>
                              <div id="collapse9" class="panel-collapse collapse">
                              	       <form name="frmchangepass" method="post" action="" id="frmchangepass">
                                  <div class="row">
                                       
                                      <div class="form-group">
                                            <div class="col-xs-3"><label>New</label></div>
                                            <div class="col-xs-9"><input type="text" class="form-control" id="password" name="password"></div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-3"><label>Retype new</label></div>
                                            <div class="col-xs-9"><input type="text" class="form-control" name="repassword" id="repassword"></div>
                                        </div>                                      
                                        <div class="form-group">
                                            <div class="col-xs-3"></div>
                                            <div class="col-xs-9">
                                              <div class="row">
                                                  <div class="col-xs-6"><button class="submit" type="button" id="changepassword" >Save Changes</button></div>
                                                  <div class="col-xs-6"><button class="cancel" type="button" id='cancelpass'>Cancel</button></div>
                                                </div>
                                            </div>
                                        </div>      
                                        
                                    </div>
                                </form>
                              </div>
                            </div>
                         </div>
                      <table class="table table-striped">
                            <tbody>
                              <tr>      
                                <td>Hide gifts section</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Show only my posts by default</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Disable wall comments</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Autoplay videos</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Autoplay animated GIFs</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Suggest stickers while typing</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Accessibility features </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>View blocked apps</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>updated two years ago</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>EmailAdd</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>not stated</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Phone numberLink</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>not stated</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Profile linkChange <a href="https://vk.com/elif15">https://vk.com/elif15</a></td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Language : Change English</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>You can delete your profile here.</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                            </tbody>
                          </table>
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Security and Login</h2>
                      <table class="table table-striped">
                            <tbody>
                              <tr>      
                                <td>Recommended<br>Choose friends to contact if you get locked outNominate 3 to 5 friends to help if you get locked out of your account. We recommend this to everyone.</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Where You're Logged In</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Where You're Logged In</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Windows PC • Altamonte Springs, FL, United StatesOpera • 3 hours ago <a href="#">See More</a></td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td><b>Login</b><br>Change passwordIt's a good idea to use a strong password that you're not using elsewhere</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Log in with your profile pictureTap or click your profile picture to log in, instead of using a password</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td><b>Setting Up Extra Security</b><br>Get alerts about unrecognized loginsWe'll let you know if anyone logs in from a device or browser you don't usually use </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Use two-factor authenticationLog in with a code from your phone as well as a password</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Choose 3 to 5 friends to contact if you get locked outYour trusted contacts can send a code and URL from Facebook to help you log back in</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td><b>Advanced</b><br>Encrypted notification emailsAdd extra security to notification emails from Facebook (only you can decrypt these emails)</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>See recent emails from FacebookSee a list of emails we sent you recently, including emails about security</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td><b>2-step verification</b><br>Effective protection against hacking: in order to log in, you should enter a one-time code received via SMS or another chosen method.<br><a href="#">Enable</a><a href="#">View</a></td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Phone numberLink</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>not stated</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Profile linkChange <a href="https://vk.com/elif15">https://vk.com/elif15</a></td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Language : Change English</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>You can delete your profile here.</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                            </tbody>
                          </table>
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Privacy Settings and Tools</h2>
						<table class="table table-striped">
                        	<tbody>

                                <tr>      
                                    <td>Your Activity</td>
                                    <td> <a href="#" class="edit-btn">Edit</a></td>
                                </tr>
                                <tr>      
                                <td>Who can see your future posts? <br>The Art Institute of Fort Lauderdale</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                                </tr>                                
                                <tr>      
                                <td>Review all your posts and things you're tagged in</td>
                                <td><a href="#" class="edit-btn">Use Activity Log</a></td>
                                </tr>
                                <tr>      
                                <td>Limit the audience for posts you've shared with friends of friends or Public?</td>
                                <td><a href="#" class="edit-btn">Limit Past Posts</a></td>
                                </tr>
                                <tr>      
                                <td>How People Find and Contact You</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                                </tr>
                                <tr>      
                                <td>Who can send you friend requests?<br>Everyone</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                                </tr>
                                <tr>      
                                <td>Who can see your friends list?<br>Public</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                                </tr>
                                <tr>      
                                <td>Who can look you up using the email address you provided?<br>Everyone</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                                </tr>
                                <tr>      
                                <td>Who can look you up using the email address you provided?<br>Everyone</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                                </tr>
                                <tr>      
                                <td>Do you want search engines outside of Facebook to link to your profile? <br>Yes</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                                </tr>
                            </tbody>
                        </table>
                </div>
                <div class="bhoechie-tab-content">
                      <h2>My profile</h2>
                      <table class="table table-striped">
                            <tbody>
                              <tr>      
                                <td>Who can view the main </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>information on my profile</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>All users</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can view </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>All users</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can view the </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Saved photos album</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Only me</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can view </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>my list of groups</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>All users</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can view </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>my audio files</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>All users</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can view </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>my gifts</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>All users</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can view </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>my photos location</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>All users</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who is visible in my list of friends and followed users</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>All friends</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can view </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>my hidden friends</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Only me</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Your changes have been saved My posts</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can view posts and comments by others </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>on my wall</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>All users</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>post to my wall</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Friends of friends</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can view </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>comments on my posts</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>All users</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>comment on my posts</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>All users</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>reply to my stories</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>All users</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Your changes have been saved Who can contact me</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>send me private messages</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>All users</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>call me in apps</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>All friends</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>invite me to join communities</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Friends of friends</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>invite me to use applications</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>All friends</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Which friend requests </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>I am notified of</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>From all users</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Your changes have been saved Other</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Who can </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>see my profile on the Internet <br>Everyone</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Which of my updates </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>appear in my friends' news</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>All Updates</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>To make sure you have chosen the right settings, check how others see your profile.</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                            </tbody>
                          </table>
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Privacy</h2>
                      <table class="table table-striped">
                            <tbody>
                              <tr>      
                                <td>Likes and subscriptions</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>  Keep all my liked videos private</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Keep all my saved playlists private</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>  Keep all my subscriptions private</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Activity Feed<br> Decide if you want to post your public actions to your activity feed. Your actions on private videos will not be posted. Your posts to your feed may also show up on connected apps or websites.</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Post to my activity feed when I...</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Add video to public playlist</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Like a video </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>Save a playlist </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>  Subscribe to a channel </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>                              
                            </tbody>
                          </table>
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Save</h2>
                      <table class="table table-striped">
                            <tbody>
                              <tr>      
                                <td>Ads based on my interest</td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                              <tr>      
                                <td>We try to serve you relevant ads based on your online browsing behavior and YouTube watch history. You can manage your ads settings from your Google Ads Settings. From there, you can do the following:
                                	<ul class="ul">
                                        <li>view or manage your demographics and interest categories</li>
                                        <li>block certain advertisers</li>
                                        <li>opt out of interest-based ads</li>
                                    </ul>
                                    Please note that YouTube is a Google company.
                                </td>
                                <td><a href="#" class="edit-btn">Edit</a></td>
                              </tr>
                            </tbody>
                          </table>
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Blacklist</h2>
                      <table class="table table-striped">
                        <tbody>
                          <tr>      
                            <td>Search by blacklist<br>Your blacklist is empty.</td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                        </tbody>
                      </table>
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Timeline and Tagging Settings</h2>    
                       <table class="table table-striped">
                        <tbody>
                          <tr>      
                            <td>Timeline</td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Who can post on your timeline?<br>Friends</td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Who can see what others post on your timeline?<br>Friends of friends</td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>When you're tagged in a post, who do you want to add to the audience of the post if they can't already see it?<br>Friends</td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Who sees tag suggestions when photos that look like you are uploaded?<br>Friends</td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Review posts you're tagged in before the post appears on your timeline?</td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr> 
                          <tr>
                            <td>Review what other people see on your timeline</td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>
                            <td>Review tags people add to your posts before the tags appear on Facebook?<br>Off</td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                        </tbody>
                      </table>                 
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Manage Blocking</h2> 
                      <table class="table table-striped">
                        <tbody>
                          <tr>      
                            <td>Restricted List</td>
                            <td><p>When you add a friend to your Restricted List, they won't see posts on Facebook that you share only to Friends. They may still see things you share to Public or on a mutual friend's timeline, and posts they're tagged in. Facebook doesn't notify your friends when you add them to your Restricted List. Learn more.</p></td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Block users</td>
							<td><p>Once you block someone, that person can no longer see things you post on your timeline, tag you, invite you to events or groups, start a conversation with you, or add you as a friend. Note: Does not include apps, games or groups you both participate in.</p></td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Block messages</td>
							<td><p>If you block messages and video calls from someone here, they won't be able to contact you in the Messenger app either. Unless you block someone's profile, they may be able to post on your timeline, tag you, and comment on your posts or comments. Learn more.</p></td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Block app invites</td>
							<td><p>Once you block app invites from someone, you'll automatically ignore future app requests from that friend. To block invites from a specific friend, click the "Ignore All Invites From This Friend" link under your latest request.</p></td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Block event invites</td>
							<td><p>Once you block event invites from someone, you'll automatically ignore future event requests from that friend.</p></td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Block apps</td>
							<td><p>Once you block an app, it can no longer contact you or get non-public information about you through Facebook. Learn more.</p></td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr> 
                          <tr>
                            <td>Block Pages</td>
							<td><p>Once you block a Page, that Page can no longer interact with your posts or like or reply to your comments. You'll be unable to post to the Page's Timeline or message the Page. If you currently like the Page, blocking it will also unlike and unfollow it.</p></td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                        </tbody>
                      </table>                   
                </div>
                <div class="bhoechie-tab-content">
                      <h2> Language Settings</h2> 
                      <div id='google_translate_element'></div>                     
                      <table class="table table-striped">
                        <tbody>
                          <tr>      
                            <td>What language do you want to use Facebook in?</td>
                            <td>Show Facebook in this language.<br>English (US)</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>News Feed Translation Preferences</td>
							<td>What language do you want stories to be translated into?<br>English</td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Which languages do you understand?</td>
							<td>English</td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Which languages do you not want automatically translated?</td>
							<td>Multilingual Posts</td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Post in multiple languages</td>
                            <td>Turned off</td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Block apps</td>
							<td><p>Once you block an app, it can no longer contact you or get non-public information about you through Facebook. Learn more.</p></td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr> 
                          <tr>
                            <td>Block Pages</td>
							<td><p>Once you block a Page, that Page can no longer interact with your posts or like or reply to your comments. You'll be unable to post to the Page's Timeline or message the Page. If you currently like the Page, blocking it will also unlike and unfollow it.</p></td>
                            <td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                        </tbody>
                      </table>
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Blocking</h2>                      
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Notifications</h2>                      
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Mobile</h2>                      
                      <table class="table table-striped">
                        <tbody>
                          <tr>      
                            <td>Already received a confirmation code?</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Confirmation code<br>Activating allows Facebook Mobile to send text messages to your phone. You can receive notifications for friend requests, messages, Wall posts, and status updates from your friends.<br>You can also update your status, search for phone numbers, or upload photos and videos from your phone.<br>Add a Phone</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Desktop and Mobile<br>Some notifications</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Text message</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                        </tbody>
                      </table>
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Public Post Filters and Tools</h2>  
                       <table class="table table-striped">
                        <tbody>
                          <tr>      
                            <td>Who Can Follow Me</td>
                          	<td>Followers see your posts in News Feed. Friends follow your posts by default, but you can also allow people who are not your friends to follow your public posts. Use this setting to choose who can follow you.<br>Each time you post, you choose which audience you want to share with.Learn more.Public</td>
                          </tr>
                          <tr>      
                            <td>Public Post Comments<br>Who can comment on your public posts? Friends of Friends</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Public Post Notifications<br>Get notifications from Friends of Friends</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Public Profile Info<br>Who can like or comment on your public profile pictures and other profile info? Friends of Friends</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Comment Ranking<br>Comment ranking is Off</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Username<br>https://www.facebook.com/eliseest</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Twitter<br>Connect a Twitter account</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Follow Plugin<br>Add a follow button to your website by copying the code below. Visit our docs for more info and options.</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                        </tbody>
                      </table>                   
                </div>
                <div class="bhoechie-tab-content">
                      <h2>App Settings</h2>    
                      <table class="table table-striped">
                        <tbody>
                          <tr>      
                          <th>Logged in with Facebook51</th>
                            <td>Search Apps</td>
                          	<td>On Facebook, your name, profile picture, cover photo, gender, networks, username, and user id are always publicly available to both people and apps. Learn why. Apps also have access to your friends list and any information you choose to make public.</td>
                          </tr>
                          <tr>      
                            <td>8 Ball Pool<br>Friends</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Airbnb<br>Only me</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Angry Birds Friends<br>Public</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Autodesk<br>Only me</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Badoo<br>Friends</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Battle Pirates<br>Only me</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Behance<br>Friends</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Bing<br>Friends</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>BlaBlaCar<br>Only me</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Causes<br>Friends</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Couchsurfing<br>Friends</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Crime City<br>Friends</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Fabalist<br>Only me</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Fiverr.com<br>Only me</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                        </tbody>
                      </table>                
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Ads</h2>                      
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Payments</h2>                      
                </div>
                <div class="bhoechie-tab-content">
					<h2>Support Inbox (feedback email)</h2>                      
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Video Settings</h2>  
                      <table class="table table-striped">
                        <tbody>
                          <tr>      
                            <td>Video Default Quality</td>
                          	<td>Default</td>                            
                          </tr>
                          <tr>
                            <td>You can still change the quality of a video you are watching by clicking the HD icon in the video player.</td>
                          	<td></td>
                          </tr>
                        </tbody>
                      </table>                      
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Notifications Settings</h2>                      
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Zuubox’s </h2>    
                      <table class="table table-striped">
                        <tbody>
                          <tr>      
                            <td>All notifications, all sounds on</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Email<br>Only important notifications</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Desktop and Mobile<br>Some notifications</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                          <tr>      
                            <td>Text message</td>
                          	<td><a href="#" class="edit-btn">Edit</a></td>
                          </tr>
                        </tbody>
                      </table>                  
                </div>
                <div class="bhoechie-tab-content">
                      <h2>Account Settings</h2>    
                      <table class="table table-striped">
                        <tbody>
                          <tr>      
                            <td>Date</td>
                          	<td>Name</td>
                            <td>Status</td>
                          	<td>Received</td>
                          	<td>Paid</td>
                          </tr>
                        </tbody>
                      </table>  
                      <p>You don't have any payment activity.</p>  
                      <p>You can find your Ads Payments in Ads Manager</p>                
                </div>
                <div class="bhoechie-tab-content">
                                    
                </div>
                <div class="bhoechie-tab-content">
                                     
                </div>


            </div>
        </div>
    </div>
</div>

 


<!-- <div id="google_translate_element"></div> -->


</form>
<!--<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->

<?php
  include('update_setting_script.php');

     
?>




<script type="text/javascript">
function googleTranslateElementInit() {
   new google.translate.TranslateElement({
        pageLanguage: 'en',
        includedLanguages: 'en,es,ja,de,ru,zh-CN,pt,it,fr',
        
        autoDisplay: false,
        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
    }, 'google_translate_element');
}

</script>
<script src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" type="text/javascript"></script>