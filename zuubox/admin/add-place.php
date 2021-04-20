<?php
require_once("classes/cls-place.php");
$obj_place = new Place();

$place_details = $obj_place->getplace('*', '', '', '', 0);
$place_detail  = end($place_details);

if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
}

if(isset($_GET['place_id']) && $_GET['place_id']!="")
{
    $condition = "`id` = '" . base64_decode($_GET['place_id']) . "' ";

    $getplaces = $obj_place->getplace('*', $condition, '', '', 0);

    $getplaces = end($getplaces);


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
                <!------------------------Update place---------->

                <!----------Add place-------------------->
                <div class="row">
                    <div class="col-lg-12">
                       <?php
                            if(isset( $getplaces))
                            {
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Update place</h3>";
                            }
                            else
                            {                       
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Add place</h3>";                        
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
                            <li class="active">Manage place</li>
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
                                            <form role="form" method="POST" enctype="multipart/form-data" action="manage-place-action.php" name="add-place" id="add-place">
                                                <?php
                                                    if(isset( $getplaces))
                                                        {
                                                         echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Update place</h4>"  ;          
                                                        }
                                                        else
                                                        {
                                                           echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Create place</h4>";
                                                        }
                                                
                                                ?>
                                                <input type="hidden" name="update_type" id="update_type" value="<?php echo (isset($_GET['place_id'])) ? "edit" : "add"; ?>">
                                                <input type="hidden" name="place_id" id="place_id" value="<?php echo (isset($_GET['place_id'])) ? $_GET['place_id'] : ""; ?>">


                                                <div class="form-group">
                                                    <label>Place Name <span class="error">*</span></label>

                                                    <input type="text" class="form-control" name="place_name" id="place_name" value="<?php echo (isset($getplaces['place_name'])) ? $getplaces['place_name'] : ""; ?>" requried>
                                                </div>
                                                <div class="form-group">
                                                    <label>Place Latitude <span class="error">*</span></label>
                                                    <input type="text" class="form-control" name="lat" id="lat" value="<?php echo (isset($getplaces['lat'])) ? $getplaces['lat'] : ""; ?>" requried>
                                                </div>
                                                <div class="form-group">
                                                    <label>Place Longitude <span class="error">*</span></label>
                                                    <input type="text" class="form-control" name="lng" id="lng" value="<?php echo (isset($getplaces['lng'])) ? $getplaces['lng'] : ""; ?>" requried>
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
        $("#add-place").validate({
            rules: {
                place:{
                    required: true
                },
                lat:{
                    required: true
                },
                lng:{
                    required: true
                },
            },
            messages: {
               place: {
                    required: "*Add place name is required."
                },
                lat: {
                    required: "*Add latitude is required."
                },
                lng: {
                    required: "*Add longitude is required."
                },
            },
            errorElement: "span",
        });
    });
    </script>

</body>

</html>
