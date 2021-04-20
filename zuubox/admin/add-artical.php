<?php
require_once("classes/cls-artical.php");
$obj_artical = new Artical();

$artical_details = $obj_artical->getartical('*', '', '', '', 0);
$artical_detail  = end($artical_details);

if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
}

if(isset($_GET['id']) && $_GET['id']!="")
{
    $condition = "`id` = '" . base64_decode($_GET['id']) . "' ";

    $getarticals = $obj_artical->getartical('*', $condition, '', '', 0);


    $getarticals = end($getarticals);

}

/*-----------------ADD-UPDATE--------*/
if ($_POST['update_type'] == "add") 
{
if (isset($_POST['submit']))
    {
         $title=$_POST['title'];
         $containt=$_POST['containt'];

        $obj_artical->insertartical(array("artical_title"=>$title,"artical_containt"=>$containt,"add_date"=>date("Y-m-d H:i:s")));

           $_SESSION['success'] = "Add cell successfully.";
            header("location:view_artical.php");
            exit();
    }
}
if($_POST['update_type']=="edit")
{
    if(isset($_POST['submit']))
    {  
        $condition = "`id` = '" . base64_decode($_POST['id']) . "'";
        $update_data['artical_title']=$_POST['title'];
        $update_data['artical_containt']=$_POST['containt'];
        $update_data['add_date'] = date('Y-m-d H:i:s'); 
        $obj_artical->updateartical($update_data, $condition, 0);
        $_SESSION['success'] = "Update Artical successfully.";
        header("location:view_artical.php");
         exit();
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
                            if(isset( $getcells))
                            {
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Update Cell</h3>";
                            }
                            else
                            {                       
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Add Artical's</h3>";                        
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
                            <li class="active">Manage Artical's</li>
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
                                            <form role="form" method="POST" enctype="multipart/form-data" action="#" name="add-artical" id="add-artical">
                                                <?php
                                                    if(isset( $getarticals))
                                                        {
                                                         echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Update Artical</h4>"  ;          
                                                        }
                                                        else
                                                        {
                                                           echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Create Artical's</h4>";
                                                        }
                                                
                                                ?>
                                                <input type="hidden" name="update_type" id="update_type" value="<?php echo (isset($_GET['id'])) ? "edit" : "add"; ?>">
                                                <input type="hidden" name="id" id="a_id" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : ""; ?>">


                                                <div class="form-group">
                                                    <label>Artical's Title <span class="error">*</span></label>
                                                
                                                    <textarea class="form-control" rows="3" id="title" name="title"  ><?php echo (isset($getarticals['artical_title'])) ? $getarticals['artical_title'] : ""; ?></textarea>

                                                </div>

                                                 <div class="form-group">
                                                    <label>Artical's Containt <span class="error">*</span></label>

                                                   <textarea class="form-control" rows="5" id="containt" name="containt"><?php echo (isset($getarticals['artical_containt'])) ? $getarticals['artical_containt'] : ""; ?></textarea>
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
        $("#add-artical").validate({
            rules: {
                title:{
                    required: true
                },
                containt:{
                    required: true
                }
            },
            messages: {
                title: {
                    required: "*Add title is required."
                },
                containt: {
                    required: "*Add containt is required."
                }
            },
            errorElement: "span",
        });
    });
    </script>

</body>

</html>
