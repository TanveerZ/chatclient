<?php
require_once("classes/cls-user.php");
$obj_user = new User();


if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
}

if(isset($_GET['user_id']) && $_GET['user_id']!="")
{
    $condition = "`id` = '" . base64_decode($_GET['user_id']) . "' ";

    $getuser = $obj_user->getuser('*', $condition, '', '', 0);

   foreach ($getuser as $rows) {
   	# code...
   }

   if(isset($_POST['submit']))
   {
        /* echo  $_POST['password'];

         echo "<br>".$_POST['confirm_pw'];die;*/


    	$condition = "`id` = '" . base64_decode($_POST['user_id']) . "'";
			$update_data['first_name']=$_POST['fname'];
			$update_data['last_name']=$_POST['lname'];
			$update_data['username']=$_POST['uname'];
			$update_data['dob']=$_POST['dob'];
			$update_data['gender']=$_POST['gender'];
			$update_data['phoneno']=$_POST['phoneno'];
			$update_data['email']=$_POST['email'];
			$update_data['email_confirm']=$_POST['conf_email'];
			$update_data['password']=base64_encode($_POST['password']);
			$update_data['pw_confirm']=base64_encode($_POST['confirm_pw']);
	 		$update_data['updated_date'] = date('Y-m-d'); 
	 		
	 		if($_POST['email']==$_POST['conf_email'])
	 		{

	 			if($_POST['password']==$_POST['confirm_pw'])
	 			{

	 				$updateuser = $obj_user->updateuser($update_data, $condition, 0);
//echo 'hi'; die();

	 				if($updateuser)
	 				{
	 					$_SESSION['success'] = "Update user successfully.";
	        			header("location:manage-user.php");	
	        			exit();

	 				}


	 			}
	 			else
	 			{
	 				$_SESSION['error'] = "Please Enter password and confirm password same.";
	        		header("location:update-user.php?user_id='".$_GET['user_id']."'");
	        		exit();
	 			}

	 		}
	 		else
	 		{
	 			$_SESSION['error'] = "Please Enter email and confirm email same.";
	        	header("location:update-user.php?user_id='".$_GET['user_id']."'");
	        	exit();
	 		}    	
}

}
include("header.php");
?>

<body>

    <div id="wrapper">
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <?php include("top-bar.php"); ?>
            <!-- /.navbar-top-links -->

            <?php include("side-bar.php"); ?>

            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">

            <div class="container-fluid">
                <!------------------------Update cell---------->

                <!----------Add Cell-------------------->
                <div class="row">
                    <div class="col-lg-12">
                       <h3 class='page-header text-primary'><i class='fa fa-user'></i> Update User</h3>

                        <?php 
                            if(isset($_SESSION['success']) && $_SESSION['success']!= "")
                            {
                                ?>
                                <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $_SESSION['success']; ?>
                                <?php unset($_SESSION['success']);?>
                                </div>
                                <?php 
                            }

                            if(isset($_SESSION['error']) && $_SESSION['error']!= "")
                            {
                                ?>
                                <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                <?php echo $_SESSION['error']; ?>
                                <?php unset($_SESSION['error']);?>
                                </div>
                                <?php 
                            }
                        ?>
    
    
                        <ol class="breadcrumb">
                            <li><a href="index.php">Dashboard</a></li>
                            <li class="active"><a href="manage-user.php">Manage Users</a></li>
                        </ol>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                General Form
                            </div>
                            <div class="table-responsive">
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-lg-offset-1">
                                        <!-- add-user-action.php -->
                                            <form role="form" method="POST" enctype="multipart/form-data" action=""  id="updateuser">
                                                
                                             
                                                <input type="hidden" name="user_id" id="user_id" value="<?php echo (isset($_GET['user_id'])) ? $_GET['user_id'] : ""; ?>">


                                                <div class="form-group">
                                                    <label>First Name <span class="error">*</span></label>
                                                    <input type="text" class="form-control" name="fname" id="fname" value="<?php echo $rows['first_name']; ?>" requried>
                                                </div>


                                                <div class="form-group">
                                                    <label>Last Name <span class="error">*</span></label>
                                                    <input type="text" class="form-control" name="lname" id="lname" value="<?php echo $rows['last_name']; ?>" requried>
                                                </div>
                                                <div class="form-group">
                                                    <label>User Name <span class="error">*</span></label>
                                                    <input type="text" class="form-control" name="uname" id="uname" value="<?php echo $rows['username']; ?>" requried>
                                                </div>
                                                <div class="form-group">
                                                    <label>DOB <span class="error">*</span></label>
                                                    <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $rows['dob']; ?>" requried>
                                                </div>

                                                <div class="form-group">
                                                    <label>Gender <span class="error">*</span></label>
                                                    	
                                                    <select name="gender" class="form-control" requried>
                                                    	<option value="<?php echo $rows['gender']; ?>"><?php echo $rows['gender']; ?></option>
                                                    	<option value="male">Male</option>
                                                    	<option value="female">Female</option>
                                                    	
                                                    </select>	
                                                </div>

                                                 <div class="form-group">
                                                    <label>Phone No <span class="error">*</span></label>
                                                    <input type="text" class="form-control" name="phoneno" id="phoneno" value="<?php echo $rows['phoneno']; ?>" requried>
                                                </div>

                                                <div class="form-group">
                                                    <label>Email<span class="error">*</span></label>
                                                    <input type="text" class="form-control" name="email" id="email" value="<?php echo $rows['email']; ?>" requried>
                                                </div>

                                                <div class="form-group">
                                                    <label>Confirm Email <span class="error">*</span></label>
                                                    <input type="text" class="form-control" name="conf_email" id="conf_email" value="<?php echo $rows['email_confirm']; ?>" requried>
                                                </div>

                                                <div class="form-group">
                                                    <label>Password<span class="error">*</span></label>
                                                    <input type="text" class="form-control" name="password" id="password" value="<?php echo base64_decode($rows['password']); ?>" requried>
                                                </div>

                                                <div class="form-group">
                                                    <label>Confirm Password<span class="error">*</span></label>
                             					 <input type="text" class="form-control" name="confirm_pw" id="confirm_pw" placeholder="Confirm Password" requried>
                                                </div>

                                                <hr>
                                                

                                                <button type="submit" name="submit" class="btn btn-default">Submit</button>
                                                <button type="reset" class="btn btn-default">Reset</button>
                                            </form>
                                        </div>
                                        <!-- /.col-lg-6 (nested) -->
                                    </div>
                                    <!-- /.table-responsive -->
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    <?php include("footer.php"); ?>
    
   <script src="bower_components/jquery-validation/jquery.validate.js"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        // validate signup form on keyup and submit
        $("#updateuser").validate({
            rules: {
                fname:{required: true},
                lname:{required: true},
                uname:{required: true},
                dob:{required: true},
                gender:{required: true},
                phoneno:{required: true},
                email:{required: true},
                conf_email:{required: true,equalTo: "#email"},
                password:{required: true},
                confirm_pw:{required: true,equalTo: "#password"},
              
            },
            messages: {
               fname: {required: "Please enter first name."},
               lname: {required: "Please enter last name."},
               uname: {required: "Please enter user name."},
               dob: {required: "Please enter birth of date."},
               gender: {required: "Please select gender."},
               phoneno: {required: "Please enter phone no."},
               email: {required: "Please enter email."},
               conf_email: {required: "Please enter confirm email.",equalTo:"Please enter email and confirm email are same" },
               password: {required: "Please enter password."},
                 confirm_pw: {required: "Please enter confirm password.",equalTo:"Please enter password and confirm password are same" },

                
            },
            errorElement: "span",
        });
    });
    </script>

</body>

</html>
