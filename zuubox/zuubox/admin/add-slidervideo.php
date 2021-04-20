<?php
require_once("classes/cls-slidervideo.php");
$obj_slider = new Slidervideo();

$slider_details = $obj_slider->getslidervideo('*', '', '', '', 0);
$slider_detail  = end($slider_details);

if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
}

if(isset($_GET['slider_id']) && $_GET['slider_id']!="")
{
    $condition = "`slider_id` = '" . base64_decode($_GET['slider_id']) . "' ";
    $getslider = $obj_slider->getslidervideo('*', $condition, '', '', 0);
    $getslider = end($getslider);
}

/*-----------------ADD-UPDATE--------*/

if ($_POST['update_type'] == "add") 
{
    if (isset($_POST['submit']))
    {     

        if(isset($_FILES['videofile']['name']) && $_FILES['videofile']['error'] == 0)
        {
            $uploaddir = '../uploads/Slider/';
            $ext            = end(explode(".", basename($_FILES['videofile']['name']) ));
            $filename       = time() . mt_rand().".".$ext;
            $uploadfile     = $uploaddir . $filename;

            $file_type = $_FILES['videofile']['type'];
                
            if($file_type=='video/mp4')
            {

                if(move_uploaded_file($_FILES['videofile']['tmp_name'], $uploadfile))
                { 
                    $video_path = "uploads/Slider/".$filename;

                    $obj_slider->insertslidervideo(array("video_path"=>$video_path,"add_date"=>date("Y-m-d")));

                    $_SESSION['success'] = "Add video successfully.";
                    header("location:view_slidervideo.php");
                    exit();
                }  
            }
            else{
              
                $_SESSION['error'] = "Invalid video format.Upload only mp4 video.";
                 header("location:view_slidervideo.php");
                exit();

            }    
        }                               

    }
           
}
    

if($_POST['update_type']=="edit")
{
    if (isset($_POST['submit']))
    {             
        if(isset($_FILES['videofile']['name']) && $_FILES['videofile']['size'] > 0)
        {
            $uploaddir = '../uploads/Slider/';

            $ext            = end(explode(".", basename($_FILES['videofile']['name']) ));
            $filename       = time() . mt_rand().".".$ext;
            $uploadfile     = $uploaddir . $filename;
         
            $file_type = $_FILES['videofile']['type'];

                 if($file_type=='video/mp4')
                {
                    if(move_uploaded_file($_FILES['videofile']['tmp_name'], $uploadfile))
                    { 
                        $video_path = "uploads/Slider/".$filename;                        

                        $condition = "`slide_id` = '" . base64_decode($_POST['slider_id']) . "'";
                        $update_data['video_path']=$video_path;
                
                        $update_data['add_date'] = date('Y-m-d'); 

                     $obj_slider->updateslidervideo($update_data, $condition, 0);
                        $_SESSION['success'] = "Update Slider Video successfully.";
                        header("location:view_slidervideo.php");
                        exit();
                    }
               }
               else{
                  
                    $_SESSION['error'] = "Invalid video format.Upload only mp4 video.";
                     header("location:view_slidervideo.php");
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
                            if(isset( $getslider))
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
                                              <form role="form" method="POST" enctype="multipart/form-data" action="#" name="add-slidervideo" id="add-slidervideo">
                                                <?php
                                                    if(isset( $getslider))
                                                        {
                                                         echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Update video</h4>"  ;          
                                                        }
                                                        else
                                                        {
                                                           echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Add video</h4>";
                                                        }
                                                
                                                ?>
                                                <input type="hidden" name="update_type" id="update_type" value="<?php echo (isset($_GET['slider_id'])) ? "edit" : "add"; ?>">
                                                <input type="hidden" name="slider_id" id="a_id" value="<?php echo (isset($_GET['slider_id'])) ? $_GET['slider_id'] : ""; ?>">


                                                <div class="form-group">
                                                    <label>Video <span class="error">*</span></label>                                                
                                                        <input type="file" id='videofile' name="videofile">

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
        $("#add-slidervideo").validate({
            rules: {
                videofile:{
                    required: true
                }
            },
            messages: {
                videofile: {
                    required: "*browse video is required."
                }
            },
            errorElement: "span",
        });
    });
    </script>

</body>

</html>
