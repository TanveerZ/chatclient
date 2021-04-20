<?php
require_once("classes/cls-adminvideo.php");
$obj_adve = new Adminvideo();

$adve_details = $obj_adve->getadminvideo('*', '', '', '', 0);
$adve_detail  = end($adve_details);

if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
}

if(isset($_GET['adve_id']) && $_GET['adve_id']!="")
{
    $condition = "`adve_id` = '" . base64_decode($_GET['adve_id']) . "' ";
    $getadve = $obj_adve->getadminvideo('*', $condition, '', '', 0);
    $getadve = end($getadve);
}

/*-----------------ADD-UPDATE--------*/

if ($_POST['update_type'] == "add") 
{
    if (isset($_POST['submit']))
    {             
        if(isset($_FILES['videofile']['name']) && $_FILES['videofile']['size'] > 0)
        {
            $uploaddir = '../uploads/video/';

            $ext            = end(explode(".", basename($_FILES['videofile']['name']) ));
            $filename       = time() . mt_rand().".".$ext;
            $uploadfile     = $uploaddir . $filename;
         
            $file_type = $_FILES['videofile']['type'];

            if($file_type=='video/mp4')
                {

                    if(move_uploaded_file($_FILES['videofile']['tmp_name'], $uploadfile))
                    { 
                        $logo_path = "uploads/video/".$filename;

                        $obj_adve->insertadminvideo(array("video_path"=>$logo_path,"add_date"=>date("Y-m-d H:i:s")));

                          $_SESSION['success'] = "Add video successfully.";
                          header("location:view_videolist.php");
                        exit();
                    }
                }
                else
                {
                    $_SESSION['error'] = "Invalid video format.Upload only mp4 video.";
                    header("location:add-adminvideo.php");
                    exit();

                }    
           
            

            }
           
        }
    }




/*-----------------------------------*/

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
                       <?php
                            if(isset( $getadve))
                            {
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Update Vedio</h3>";
                            }
                            else
                            {                       
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Add Vedio</h3>";                        
                            }                         



                        ?>

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
                            <li class="active">Manage video</li>
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
                                              <form role="form" method="POST" enctype="multipart/form-data" action="#" name="add-form" id="add-form">
                                                <?php
                                                    if(isset( $getadve))
                                                        {
                                                         echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Update video</h4>"  ;          
                                                        }
                                                        else
                                                        {
                                                           echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Add video</h4>";
                                                        }
                                                
                                                ?>
                                                <input type="hidden" name="update_type" id="update_type" value="<?php echo (isset($_GET['id'])) ? "edit" : "add"; ?>">
                                                <input type="hidden" name="id" id="a_id" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : ""; ?>">


                                                <div class="form-group">
                                                    <label>Video <span class="error">*</span></label>                                                
                                                        <input type="file" name="videofile" required>

                                                </div>

                                                <?php
                                                    if(isset( $getadve))
                                                {
                                                ?>
                                                 <div class="form-group">
                                                    <label>Old video<span class="error"></span></label>
                                                    <br>
                                                    <center>

                                                        <video width="320" height="240" controls autoplay>
                                                        <source src="../Uploads/video/1515482769429923029.wmv" >
                                                            Sorry, your browser doesn't support the video element.
                                                        </video>

                                                    </center>
                                                </div>
                                                <?php } ?>
                                                
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
        $("#add-form").validate({
            rules: {
                file:{
                    required: true
                }
            },
            messages: {
                file: {
                    required: "*browse video is required."
                }
            },
            errorElement: "span",
        });
    });
    </script>

</body>

</html>
