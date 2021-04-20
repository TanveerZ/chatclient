<?php
require_once("classes/cls-back.php");
$obj_section = new Back();

 $obj_sections = $obj_section->getBackDetails('*', '', '', '', 0);

$obj_section  = end($obj_sections);


if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
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
            <div class="col-lg-6">
                <h3 class="page-header text-primary"><i class="fa fa-th-list"></i> Manage Site Background</h3>
            </div>
            <div class="col-lg-6">
                <h4 class="page-header text-primary" align="right"> <a href="add-back.php">Edit Image</a> </h4>
            </div>
            <div class="col-lg-12">
         
            <ol class="breadcrumb">
                <li><a href="index.php">Dashboard</a></li>
                <li class="active">Manage Background</li>
            </ol>
            <?php if (isset($_SESSION['success'])) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                ?>
            </div>
                <?php } ?>

                <?php if (isset($_SESSION['error'])) { ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                ?>
            </div>
                <?php } ?>
            </div>
                    <!-- /.col-lg-12 -->
            </div>
                <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                All Background List
            </div>
            <div class="table-responsive">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <!-- <th>Id</th> -->
                                    <th>Image</th>
                                                                        
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                              
                                <?php
                                    $i=1;
                                 foreach ($obj_sections as $obj_sections) { ?>
                                    <tr class="odd gradeX">                                    
                                        <!-- <td>
                                          <?php //echo $i?>
                                        </td> -->

                                        <td>
                                        <?php

                                            $imagep=explode(',',$obj_sections['back_path']);
                                                $imgcount= count($imagep);
                                                 for ($i=0;$i<$imgcount;$i++)
                                                {
                                        ?>
                                           
                                         <img src="<?php echo '../'. $imagep[$i]; ?>" height="50px" width="50px" class="image-responsive">
                                      
                                        <?php
                                         }
                                        ?>
                                          </td>                                       
                                        
                                        <td class="center">
                                     
                                            <div class="">                                       
                                                <a class="btn btn-danger btn-circle"  data-toggle="confirmation" data-placement="top" data-original-title="" title="" onclick="return confirm('Are you sure?')" href="delete-back.php?idimg=<?php echo base64_encode($obj_sections['bid']); ?>"><i class="fa fa-trash"></i></a> &nbsp;&nbsp;
                                               
                                            </div>
                                        </td>
                                    </tr>
                                <?php 
                                    
                            
                            } ?>
                            </tbody>
                            
                        </table>
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
<script src="bower_components/jquery-validation/additional-methods.js"></script>


</body>

</html>
