<?php
require_once("classes/cls-cellsection.php");
$obj_section = new Cellsection();

// $where="section_id = 1";
// $obj_sections = $obj_section->getcellsection('*', $where, '', '', 0);
$obj_sections = $obj_section->query("SELECT tbl_celldetails.*, tbl_cell.cell_name from tbl_celldetails LEFT JOIN tbl_cell ON tbl_celldetails.cell_id = tbl_cell.cell_id WHERE section_id = 1 ");

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
                <h3 class="page-header text-primary"><i class="fa fa-th-list"></i> Manage Cell Section 1</h3>
            </div>
            <div class="col-lg-6">
                <h4 class="page-header text-primary" align="right"> <a href="add-cellsection1.php">Add Section1</a> </h4>
            </div>
            <div class="col-lg-12">
         
            <ol class="breadcrumb">
                <li><a href="index.php">Dashboard</a></li>
                <li class="active">Manage Cell Section 1</li>
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
                General Cell Section 1
            </div>
            <div class="table-responsive">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <!-- <th>Id</th> -->
                                    <th>Cell </th>
                                    <th>Section Content</th>
                                                                        
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
                                          <a title="View Attendance" href="#"><?php echo ucfirst($obj_sections['cell_name']); ?></a>
                                        </td>

                                        <td>
                                        <a title="View Attendance" href="#"><?php echo ucfirst($obj_sections['section_1']); ?></a>
                                        </td>  

                                                                             
                                        
                                        <td class="center">
                                     
                                            <div class="">                                       
                                            
                                                <a class="btn btn-default btn-circle" title="Edit artical" href="add-cellsection1.php?id=<?php echo base64_encode($obj_sections['id']); ?>"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger btn-circle"  data-toggle="confirmation" data-placement="top" data-original-title="" title="" onclick="return confirm('Are you sure?')" href="delete-cellsection.php?id=<?php echo base64_encode($obj_sections['id']); ?>"><i class="fa fa-trash"></i></a> &nbsp;&nbsp;
                                               
                                            </div>
                                        </td>
                                    </tr>
                                <?php 
                                    $i=$i+1;
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
