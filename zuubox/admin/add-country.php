<?php
require_once("classes/cls-country.php");

$obj_country = new Country();

$country_details = $obj_country->getcountry('*', '', '', '', 0);
$country_details  = end($country_details);

if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
}

if(isset($_GET['id']) && $_GET['id']!="")
{
    $condition = "`country_id` = '" . base64_decode($_GET['id']) . "' ";

    $getcountry = $obj_country->getcountry('*', $condition, '', '', 0);

    $getcountry = end($getcountry);


}



/*-----------------ADD-UPDATE--------*/
if ($_POST['update_type'] == "add") 
{
if (isset($_POST['submit']))
    {       
        $country=$_POST['country'];  

       
        
        $obj_country->insertcountry(array("country_name"=>$country,"add_date"=>date("Y-m-d")));

           $_SESSION['success'] = "Add Country successfully.";
            header("location:view-countrylist.php");
            exit();
    }
}
if($_POST['update_type']=="edit")
{
    if(isset($_POST['submit']))
    {     

         $condition = "`country_id` = '" . base64_decode($_POST['id']) . "'";       

        $update_data['country_name']=$_POST['country'];              
        $update_data['add_date'] = date('Y-m-d'); 
        $obj_country->updatecountry($update_data, $condition, 0);

        $_SESSION['success'] = "Update Country successfully.";
            header("location:view-countrylist.php");
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
                            if(isset( $getcountry))
                            {
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Update Country</h3>";
                            }
                            else
                            {                       
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Add Country</h3>";                        
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
                            <li class="active">Manage Country</li>
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
                                            <form role="form" method="POST" enctype="multipart/form-data" action="#" name="add-form" id="addcountry">
                                                <?php
                                                    if(isset( $getcountry))
                                                        {
                                                         echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Update Country</h4>"  ;          
                                                        }
                                                        else
                                                        {
                                                           echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Create Country</h4>";
                                                        }
                                                
                                                ?>
                                                <input type="hidden" name="update_type" id="update_type" value="<?php echo (isset($_GET['id'])) ? "edit" : "add"; ?>">
                                                <input type="hidden" name="id" id="event_id" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : ""; ?>">


                                                  <div class="form-group">
                                                    <label>Country Name<span class="error">*</span></label>                                               
                                                    <input type="text" class="form-control" name="country" id="country" value="<?php echo (isset($getcountry['country_name'])) ? $getcountry['country_name'] : ""; ?>"  >
                                                    <p id="countryavali" style="color:red"></p>
                                                </div>       

                                                
                                                 

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
   
        // validate signup form on keyup and submit
        $("#addcountry").validate({
            rules: {
                country:{
                    required: true
                }
                
            },
            messages: {
                country: {
                    required: "*Add country is required."
                }
            },
            errorElement: "span",
        });
 
    </script>

<script type="text/javascript">    

$('#country').on("change", function () {
  var id = $(this).val();

  $.ajax({
         type:"POST",
        url:"country-allreadyexit.php",
        data:{id:id},
        success:function(result){
        $('#countryavali').html(result);
        
        }
        });
});

</script>


     <script type="text/javascript">
       $("#datetime").datetimepicker({format: 'Y-MM-DD HH:mm:ss'});
    </script>
    
    <script src="bower_components/jquery-validation/jquery.validate.js"></script>
    
</body>

</html>
