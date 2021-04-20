<?php
require_once("classes/cls-about.php");
$obj_about = new About();

$about_details = $obj_about->getabout('*', '', '', '', 0);

$about_detail  = end($about_details);

if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
}

if(isset($_POST['submit']))
{
    if(isset($_FILES['logo']['name']) && $_FILES['logo']['size'] > 0)
    {
        $uploaddir = '../uploads/Logo/';

        $ext            = end(explode(".", basename($_FILES['logo']['name']) ));
        $filename       = time() . mt_rand().".".$ext;
        $uploadfile     = $uploaddir . $filename;
          
        if(move_uploaded_file($_FILES['logo']['tmp_name'], $uploadfile))
        { 
            $logo_path = "uploads/Logo/".$filename;

            $obj_about->updateabout(array("about_logo"=>$logo_path,"add_date"=>date("Y-m-d H:i:s")), "`id` = '1'", 0);
            
            $_SESSION['success'] = "Admin page changed successfully.";
            header("location:manage-about-logo.php");
            exit();
           
        }
        else
        {
            $_SESSION['error'] = "Sorry, Problem in uploading Logo.";
            header("location:manage-about-logo.php");
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
                <div class="row">
                    <div class="col-lg-12">
                        <h3 class="page-header text-primary"><i class="fa fa-user"></i> Manage Site Logo</h3>
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
                            <li class="active">Manage Admin Logo</li>
                        </ol>
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
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
                                            <form role="form" method="POST" enctype="multipart/form-data" name="add-form" id="add-form">
                                                                                      
                                                
                                                <h4 class="page-header text-primary"><i class="fa fa-user"></i> Logo Details</h4>                                              
                                                <div class="form-group">
                                                    <label>Choose Logo <span class="error">*</span></label>

                                                    <input type="file" class="form-control" name="logo" id="logo"  >
                                                </div>
                                                <hr>
                                                <div class="form-group">
                                                    <label>Old Admin Logo<span class="error"></span></label>
                                                    <br>
                                                    <center><img src="<?php echo '../'.$about_detail['about_logo']; ?>" style="border: 1px solid black; padding:2px;" ></center>
                                                </div>

                                                <div class="form-group">
                                                    <div id="status-div"></div>
                                                </div>	

                                                <hr>
                                                <button type="submit" name="submit" class="btn btn-default">Update Logo</button>
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
        $("#add-form").validate({
            rules: {
                logo:{
                    required: true
                }
            },
            messages: {
                logo: {
                    required: "*Site Logo is required."
                }
            },
            errorElement: "span",
        });
    });
    </script>

</body>

</html>
