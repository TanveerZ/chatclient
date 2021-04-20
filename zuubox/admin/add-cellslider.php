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

  $imagepath=$getsection['image-path'];
/*-------get cell Name for update form--------*/
  $getcellid=$getsection['cell_id'];
  /* image remove ajax--*/
  $tblid=$getsection['id'];

    $condition = "`cell_id` = '" . $getcellid . "' ";
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

        /*----------get cell id------*/
        $condition = "`cell_name` = '" . $cell . "' ";
        $getcell = $obj_section->getcell('*', $condition, '', '', 0);      
        $cellid=$getcell[0]['cell_id'];
      /*------------------------------------*/ 
     
/*----------------------------*/
if (count($_FILES['sliderimg']['name'])) {    
   $Kv_items = array(); 
     $Kv = 0;
      $uploads_dir = '../uploads/Cell-Slider/';
      foreach($_FILES['sliderimg']['name'] as $filename) {
         $t=time();
         $filename=$t."".$filename;
           if(move_uploaded_file($_FILES["sliderimg"]["tmp_name"][$Kv], $uploads_dir. basename($filename))){
             $Kv++;
             $fn = $sitepath . 'uploads/Cell-Slider/' . $filename;
             $Kv_items[]=$fn;
           }            
     }//end for each
    $profile_pic = implode(',',$Kv_items);
    if($profile_pic)
    {
        $obj_section->insertcellsection(array("cell_id"=>$cellid,"section_id"=>'slider',"image-path"=>$profile_pic,"add-date"=>date("Y-m-d")));
        $_SESSION['success'] = "Slider Image Updalod successfully.";
                    header("location:view_cellslider.php");
                    exit();
    }
    else
    {
        $_SESSION['error'] = "Sorry, Problem in uploading Image.";
            header("location:view_cellslider.php");
            exit();

    }

 }

    }
}
if($_POST['update_type']=="edit")
{
    if(isset($_POST['submit']))
    {
      
        /*---------------cell id--------------*/      
         $condition = "cell_name = '" . $_POST['cell'] . "' ";
         $getcell = $obj_section->getcell('*', $condition, '', '', 0);    
         
         $cellid=$getcell[0]['cell_id'];
         /*---------------------------------*/

         $condition = "`id` = '" . base64_decode($_POST['id']) . "'";
        $update_data['cell_id']=$cellid;
        $update_data['section_id']='slider';

        /*--------------------------------------*/
            if (count($_FILES['sliderimg']['name'])) {    
               $Kv_items = array(); 
                 $Kv = 0;
                  $uploads_dir = '../uploads/Cell-Slider/';
                  foreach($_FILES['sliderimg']['name'] as $filename) {
                     $t=time();
                     $filename=$t."".$filename;
                       if(move_uploaded_file($_FILES["sliderimg"]["tmp_name"][$Kv], $uploads_dir. basename($filename))){
                         $Kv++;
                         $fn = $sitepath . 'uploads/Cell-Slider/' . $filename;
                         $Kv_items[]=$fn;
                       }            
                 }//end for each
                $profile_pic = implode(',',$Kv_items);

                if($profile_pic)
                {
                      $update_data['image-path']=$profile_pic;

                   $obj_section->updatecellsection($update_data, $condition, 0);
                    
                    $_SESSION['success'] = "Slider Image Update successfully.";
                    header("location:view_cellslider.php");
                    exit();
                   
                }
                else
                {
                     $_SESSION['error'] = "Sorry, Problem in uploading Image.";
                    header("location:view_cellslider.php");
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

<style type="text/css">
  .imgclose
  {
    vertical-align: top;
    margin-right: 3px;
  }
</style>
        <!-- Page Content -->
        <div id="page-wrapper">

            <div class="container-fluid">
                <!--Update cell-->

                <!--Add Cell-->
                <div class="row">
                    <div class="col-lg-12">
                       <?php
                            if(isset( $getsection))
                            {
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Update Cell Slider</h3>";
                            }
                            else
                            {                       
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Add Cell Slider</h3>";                        
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
                            <li class="active">Manage Cell Slider</li>
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
                                            <form role="form" method="POST" enctype="multipart/form-data" action="#" name="add-form" id="addcellsection">
                                                
                                                <input type="hidden" name="update_type" id="update_type" value="<?php echo (isset($_GET['id'])) ? "edit" : "add"; ?>">
                                                <input type="hidden" name="id" id="event_id" value="<?php echo (isset($_GET['id'])) ? $_GET['id'] : ""; ?>">


                                                 <div class="form-group">
                                                    <label>Cell Name<span class="error">*</span></label>                                               
                                                    <input type="text" class="form-control" name="cell" id="cell" value="<?php echo (isset($cell_name)) ? $cell_name : ""; ?>" required >
                                                    <p id="cellavali" style="color:red"></p>
                                                </div>   

                                                <div class="form-group">
                                                    <label>Slider Image  <span class="error">*</span></label>                                              
                                                    <input type="file" class="form-control" name="sliderimg[]" id="sliderimg" multiple="" >
                                                </div>
                                                <div class='imgshow'>
                                                    
                                                <?php
                                                if(isset($imagepath))
                                                {
                                                         
                                                      $imagep=explode(',',$imagepath);
                                                      $imgcount= count($imagep);    
                                                        for ($i=0;$i<$imgcount;$i++)
                                                        {                                        
                                                             echo "<img src='../$imagep[$i]' height='50px' width='50px' class='image-responsive'>";
                                                             echo " ";
                                                            
                                                              echo "<span class='fa fa-close imgclose' id='../$imagep[$i]'></span>";
                                                            
                                                        }                     
                                                
                                                }
                                                 
                                                 ?>

                                               
                                             </div>
                                             <br>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="bower_components/jquery-validation/jquery.validate.js"></script>
    <script type="text/javascript">
   
        // validate signup form on keyup and submit
        $("#addcellsection").validate({
            rules: {
                cell:{
                    required: true
                },
                sliderimg:{required: true}
            },
            messages: {
                cell: {
                    required: "*Add cell is required."
                },
                sliderimg: {
                    required: "*Add Slider Image required."
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
   

$( ".fa-close" ).click(function() {
    
    var id = "<?php echo  $tblid;?>";
    var imgstr=this.id;
    
     $.ajax({
                type:"POST",
                url:"remove_cellsliderimgajax.php",
                data:{imgid:id,imgstr:imgstr},
                success:function(result){
                  //console.log(result);
                $('.imgshow').html(result);
                
                }
                });

});
  </script>

</body>

</html>
