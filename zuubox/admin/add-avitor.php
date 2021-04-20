<?php
require_once("classes/cls-avitor.php");
$obj_avitor = new Avitor();

$avitor_details = $obj_avitor->getavitor('*', '', '', '', 0);
$avitor_detail  = end($avitor_details);

if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
}

if(isset($_GET['id']) && $_GET['id']!="")
{
    $condition = "`id` = '" . base64_decode($_GET['id']) . "' ";
    
    $getavitors = $obj_avitor->getavitor('*', $condition, '', '', 0);


    $getavitors = end($getavitors);

}

/*-----------------ADD-UPDATE--------*/
if ($_POST['update_type'] == "add") 
{
if (isset($_POST['submit']))
    {       
        if(isset($_FILES['avitor_image']['name']) && $_FILES['avitor_image']['size'] > 0)
        {
            $uploaddir = '../uploads/Avitor/';

            $ext            = end(explode(".", basename($_FILES['avitor_image']['name']) ));
            $filename       = time() . mt_rand().".".$ext;
            $uploadfile     = $uploaddir . $filename;
          
            if(move_uploaded_file($_FILES['avitor_image']['tmp_name'], $uploadfile))
            { 
                $avitor_image = "uploads/Avitor/".$filename;

                $avitor_name=$_POST['avitor_name'];
                 $avitorinfo=$_POST['avitorinfo'];

                $obj_avitor->insertavitor(array("avitor_name"=>$avitor_name,"avitor_image"=>$avitor_image,"avitor_info"=>$avitorinfo,"add_date"=>date("Y-m-d")));

                $_SESSION['success'] = "Add Avitor successfully.";
                header("location:view_avitor.php");
                exit();
            }
        }        
    }
}
if($_POST['update_type']=="edit")
{
    if(isset($_POST['submit']))
    {  
        if(isset($_FILES['avitor_image']['name']) && $_FILES['avitor_image']['size'] > 0)
        {
            $uploaddir = '../uploads/Avitor/';

            $ext            = end(explode(".", basename($_FILES['avitor_image']['name']) ));
            $filename       = time() . mt_rand().".".$ext;
            $uploadfile     = $uploaddir . $filename;
          
            if(move_uploaded_file($_FILES['avitor_image']['tmp_name'], $uploadfile))
            { 
                $avitor_image = "uploads/Avitor/".$filename;

                $condition = "`id` = '" . base64_decode($_POST['id']) . "'";
                $update_data['avitor_name']=$_POST['avitor_name'];
                $update_data['avitor_image']=$avitor_image;
                $update_data['avitor_info']=$_POST['avitorinfo'];
                $update_data['add_date'] = date('Y-m-d'); 

                $obj_avitor->updateavitor($update_data, $condition, 0);
                $_SESSION['success'] = "Update Avitor successfully.";
                header("location:view_avitor.php");
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
                            if(isset($getavitors))
                            {
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Update Avitor's</h3>";
                            }
                            else
                            {                       
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Add Avitor's</h3>";                        
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
                            <li class="active">Manage Avitor's</li>
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
                                            <form role="form" method="POST" enctype="multipart/form-data" action="#" name="add-form" id="add-avitor">
                                                <?php
                                                    if(isset($getavitors))
                                                        {
                                                         echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Update Avitor</h4>"  ;          
                                                        }
                                                        else
                                                        {
                                                           echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Add Avitor's</h4>";
                                                        }
                                                
                                                ?>
                                                <input type="hidden" name="update_type" id="update_type" value="<?php echo (isset($_GET['id'])) ? "edit" : "add"; ?>">
                                                <input type="hidden" name="id" id="a_id" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : ""; ?>">


                                                <div class="form-group">
                                                    <label>Avitor Name <span class="error">*</span></label>
                                                
                                                    <input type="text" class="form-control" name="avitor_name" id="avitor_name" value="<?php echo (isset($getavitors['avitor_name'])) ? $getavitors['avitor_name'] : ""; ?>" >

                                                </div>

                                                 <div class="form-group">
                                                    <label>Avitor Image <span class="error">*</span></label>

                                                  <input type="file" class="form-control" name="avitor_image" id="avitor_image"  >
                                                </div>
                                                
                                                <div class="form-group">
                                                       <?php if(isset($getavitors))
                                                        {

                                                            echo "<label>Old Avitor<span class='error'>*</span></label>";

                                                            echo "<img src='../".$getavitors['avitor_image']."' height='100px' width='100px' class='img-responsive'>";
                                                            //echo $getavitors['avitor_image'];
                                                        }?>
                                                   
                                                </div>

                                                <div class="form-group">


                                                    <label>Avitor Info <span class="error">*</span></label>
                                                

                                                    <textarea class="form-control" value="<?php echo (isset($getavitors['avitor_info'])) ? $getavitors['avitor_info'] : ""; ?>" name="avitorinfo"> <?php echo (isset($getavitors['avitor_info'])) ? $getavitors['avitor_info'] : ""; ?></textarea>

                                                   
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
        $("#add-avitor").validate({
            rules: {
                avitor_name:{
                    required: true
                },
               avitor_image:{
                    required: true
                }
            },
            messages: {
               avitor_name: {
                    required: "*Add avitor name is required."
                },
                avitor_image: {
                    required: "*Add avitor image is required."
                }
            },
            errorElement: "span",
        });
    });
    </script>

</body>

</html>
