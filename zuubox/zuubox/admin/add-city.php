<?php
require_once("classes/cls-city.php");

$obj_city = new City();

$countyid=base64_decode($_GET['country_id']);



if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
}

if(isset($_GET['id']) && $_GET['id']!="")
{
    $condition = "`city_id` = '" . base64_decode($_GET['id']) . "' ";

    $getcity = $obj_city->getcity('*', $condition, '', '', 0);

    $getcity = end($getcity);
}

/*------------------Country drop down---*/

$country_details = $obj_city->getcountry('*', '', '', '', 0);
$country_detail  = end($country_details);

/*-----------------ADD-UPDATE--------*/
if ($_POST['update_type'] == "add") 
{
if (isset($_POST['submit']))
    {   
        $country_id=$_POST['country_id'];           
        $city=$_POST['city'];

         $condition="city_name = '".$city."'";

        $query = $obj_city->getcity('*', $condition, '', '', 0);

           if($query)
           {
              $_SESSION['error'] = "City already exist.";
            header("location:view-citylist.php?id=".base64_encode($country_id));
            exit();

           }
           else
           {

        $obj_city->insertcity(array("country_id"=>$country_id,"city_name"=>$city,"add_date"=>date("Y-m-d")));

           $_SESSION['success'] = "Add City successfully.";
            header("location:view-citylist.php?id=".base64_encode($country_id));
            exit();
        }
    }
}
if($_POST['update_type']=="edit")
{
    if(isset($_POST['submit']))
    {     

        $city = $_POST['city'];
         $country_id=$_POST['country_id'];
        $condition="city_name = '".$city."'";


        $query = $obj_city->getcity('*', $condition, '', '', 0);

           if($query)
           {
                $_SESSION['error'] = "City already exist.";
                header("location:view-citylist.php?id=".base64_encode($country_id));
                exit();
           }
           else
           {

               
                $condition = "`city_id` = '" . base64_decode($_POST['id']) . "'";       

                $update_data['city_name']=$_POST['city'];              
                $update_data['add_date'] = date('Y-m-d'); 
                $obj_city->updatecity($update_data, $condition, 0);

                $_SESSION['success'] = "Update City successfully.";
                header("location:view-citylist.php?id=".base64_encode($country_id));
                exit();
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
                            if(isset( $getcity))
                            {
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Update City</h3>";
                            }
                            else
                            {                       
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Add City</h3>";                        
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
                            <li class="active">Manage City</li>
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
                                                    if(isset( $getcity))
                                                        {
                                                         echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Update City</h4>"  ;          
                                                        }
                                                        else
                                                        {
                                                           echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Create City</h4>";
                                                        }
                                                
                                                ?>
                                                <input type="hidden" name="update_type" id="update_type" value="<?php echo (isset($_GET['id'])) ? "edit" : "add"; ?>">
                                                <input type="hidden" name="id" id="event_id" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : ""; ?>">

                                                
                                                <?php 
                                                    if($countyid!='')
                                                    {
                                                ?>
                                                <input type="hidden" class="form-control" name="country_id" id="country_id" value="<?php echo (isset($getcity['country_id'])) ? $getcity['country_id'] : $countyid; ?>"  >
                                                <?php
                                                  }
                                                  else
                                                  {
                                                    echo "<label>Country Name</label>";
                                                    echo "<select name='country_id' class='form-control'>";

                                                    foreach ($country_details as $row) {
                                                        
                                                        echo "<option value='".$row['country_id']."'>".$row['country_name']."";

                                                        }

                                                        echo "</select>";
                                                  }

                                                ?>
                                                  <div class="form-group">
                                                    <label>City Name<span class="error">*</span></label>                                               
                                                    <input type="text" class="form-control" name="city" id="city" value="<?php echo (isset($getcity['city_name'])) ? $getcity['city_name'] : ""; ?>"  >
                                                    <p id="cityavali" style="color:red"></p>
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
                city:{
                    required: true
                }
                
            },
            messages: {
                city: {
                    required: "*Add city is required."
                }
            },
            errorElement: "span",
        });
 
    </script>




     <script type="text/javascript">
       $("#datetime").datetimepicker({format: 'Y-MM-DD HH:mm:ss'});
    </script>
    
    <script src="bower_components/jquery-validation/jquery.validate.js"></script>
    
</body>

</html>
