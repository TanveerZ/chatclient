<?php
require_once("classes/cls-cellsection.php");

$obj_section = new Cellsection();

$section_details = $obj_section->getcellsection('*', '', '', '', 0);
$section_detail  = end($section_details);

if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
}

if(isset($_GET['id']) && $_GET['id']!="")
{
    $condition = "`id` = '" . base64_decode($_GET['id']) . "' ";

    $getsection = $obj_section->getcellsection('*', $condition, '', '', 0);

    $getsection = end($getsection);


}
/*-------get cell Name for update form--------*/

 $getcellid=$getsection['cell_id'];

    $condition = "cell_id = '" . $getcellid . "' ";
    $getcell = $obj_section->getcell('*', $condition, '', '', 0);   

foreach ($getcell as $getcell) {
$cell_name=$getcell['cell_name'];
}


/*-----------------ADD-UPDATE--------*/
if ($_POST['update_type'] == "add") 
{
if (isset($_POST['submit']))
    {       
        $cell=$_POST['cell'];  

       $condition = "cell_name = '" . $cell . "' ";
       $getcell = $obj_section->getcell('*', $condition, '', '', 0);   
       $cellid=$getcell[0]['cell_id'];
        $section1=$_POST['section1'];
        
        $obj_section->insertcellsection(array("cell_id"=>$cellid,"section_id"=>'1',"section_1"=>$section1,"add-date"=>date("Y-m-d")));

           $_SESSION['success'] = "Add Section successfully.";
            header("location:view_section1.php");
            exit();
    }
}
if($_POST['update_type']=="edit")
{
    if(isset($_POST['submit']))
    {
      
         $condition = "cell_name = '" . $_POST['cell'] . "' ";
         $getcell = $obj_section->getcell('*', $condition, '', '', 0);    
         
         $cellid=$getcell[0]['cell_id'];


         $condition = "`id` = '" . base64_decode($_POST['id']) . "'";
        

         
        $update_data['cell_id']=$cellid;

        $update_data['section_1']=$_POST['section1'];
         $update_data['section_id']=1;
              
        $update_data['add-date'] = date('Y-m-d'); 
        $obj_section->updatecellsection($update_data, $condition, 0);

        $_SESSION['success'] = "Update Section successfully.";
            header("location:view_section1.php");
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
                            if(isset( $getsection))
                            {
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Update Section</h3>";
                            }
                            else
                            {                       
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Add Section</h3>";                        
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
                            <li class="active">Manage section's</li>
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
                                            <form role="form" method="POST" enctype="multipart/form-data" action="#" name="add-form" id="addcellsection1">
                                                <?php
                                                    if(isset( $getevent))
                                                        {
                                                         echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Update section</h4>"  ;          
                                                        }
                                                        else
                                                        {
                                                           echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Create section's</h4>";
                                                        }
                                                
                                                ?>
                                                <input type="hidden" name="update_type" id="update_type" value="<?php echo (isset($_GET['id'])) ? "edit" : "add"; ?>">
                                                <input type="hidden" name="id" id="event_id" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : ""; ?>">


                                                  <div class="form-group">
                                                    <label>Cell Name<span class="error">*</span></label>                                               
                                                    <input type="text" class="form-control" name="cell" id="cell" value="<?php echo (isset($cell_name)) ? $cell_name : ""; ?>"  >
                                                    <p id="cellavali" style="color:red"></p>
                                                </div>       

                                                <div class="form-group">
                                                    <label>Section containt  <span class="error">*</span></label>                                              
                                                    <textarea class="form-control" rows="3" id="section1" name="section1" ><?php echo (isset($getsection['section_1'])) ? $getsection['section_1'] : ""; ?></textarea>
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
        $("#addcellsection1").validate({
            rules: {
                cell:{
                    required: true
                },
                section1:{required: true}
            },
            messages: {
                cell: {
                    required: "*Add cell is required."
                },
                section1: {
                    required: "*Add Section is required."
                }
            },
            errorElement: "span",
        });
 
    </script>

<script type="text/javascript">    

$('#cell').on("change", function () {
  var id = $(this).val();

  $.ajax({
         type:"POST",
        url:"cell_idajax.php",
        data:{id:id},
        success:function(result){
        $('#cellavali').html(result);
        
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
