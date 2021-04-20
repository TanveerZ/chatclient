<?php
require_once("classes/cls-usercell.php");
$obj_section = new Usercell();

// $where = "status = 0";
// $obj_sections = $obj_section->getcellsection('*', $where, '', '', 0);

if ($_SERVER['HTTP_HOST'] == "localhost") {

    $SERVER = 'localhost';
    $USERNAME = 'root';
    $PASSWORD = '';
    $DATABASE = 'codesevenstudio';
} else {
    $SERVER = 'localhost';
    $USERNAME = 'zuuboxco_eli';
    $PASSWORD = 'Qawsed@123';
    $DATABASE = 'zuuboxco_DB';
}

    $con = mysqli_connect($SERVER, $USERNAME, $PASSWORD, $DATABASE) or die('Oops connection error -> ' . mysqli_error($con));

try {
    $obj_sections = array();

    $query = "SELECT tbl_user_cell.*, tbl_singup.username, tbl_cell.cell_name FROM tbl_user_cell
    LEFT JOIN tbl_singup ON tbl_user_cell.user_id = tbl_singup.id
    LEFT JOIN tbl_cell ON tbl_user_cell.cell_id = tbl_cell.id
    WHERE tbl_user_cell.status = 0";

    $result = mysqli_query($con, $query);
    $iNumRows = mysqli_num_rows($result);
    if ($iNumRows > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $obj_sections[] = $data;
        }
    }


} catch (Exception $e) {
    echo "Error" . $e->getMessage();
}


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
                <h3 class="page-header text-primary"><i class="fa fa-th-list"></i> Manage User Cell </h3>
            </div>
            <div class="col-lg-6">
                <!-- <h4 class="page-header text-primary" align="right"> <a href="add-cellslider.php">Add Slider Image</a> </h4> -->
            </div>
            <div class="col-lg-12">
         
            <ol class="breadcrumb">
                <li><a href="index.php">Dashboard</a></li>
                <li class="active">Manage User Cell</li>
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
                User cell section details
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
                                    <th>Section No</th>
                                    <th>Username</th>
                                    <th>Description</th>
                                     <th>Images</th>                                   
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                              
                                <?php
                                    $x=1;
                                 foreach ($obj_sections as $obj_sections) { ?>

                                    <tr class="odd gradeX">                                    
                                        <!-- <td>
										  <?php //echo $x?>
                                        </td> -->

                                        <td>
                                          <a title="View Attendance" href="#"><?php echo ucfirst($obj_sections['cell_name']); ?></a>
                                        </td>

                                        <td>
                                          <a title="View Attendance" href="#"><?php echo $obj_sections['section_id']; ?></a>
                                        </td>

                                        <td>
                                          <a title="View Attendance" href="#"><?php echo $obj_sections['username']; ?></a>
                                        </td>

                                        <td>
                                          <a title="View Attendance" href="#"><?php echo $obj_sections['text']; ?></a>
                                        </td>

                                        <td>
                                        <?php

                                            $imagep=explode(',',$obj_sections['image-path']);
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
                                                <?php /*
                                                <a class="btn btn-default btn-circle" title="Edit artical" href="add-cellslider.php?id=<?php echo base64_encode($obj_sections['id']); ?>"><i class="fa fa-edit"></i></a>

                                                <a class="btn btn-danger btn-circle"  data-toggle="confirmation" data-placement="top" data-original-title="" title="" onclick="return confirm('Are you sure?')" href="delete-cellsection.php?idimg=<?php echo base64_encode($obj_sections['id']); ?>"><i class="fa fa-trash"></i></a> &nbsp;&nbsp;
                                                */?>
                                                <?php 

                                                if($obj_sections['status'] == 0){
                                                    ?>
                                                    <a class="btn btn-danger" href="active-usercell.php?id=<?php echo base64_encode($obj_sections['id']); ?>">Approve</a>

                                                    <?php

                                                }else{
                                                    ?>
                                                    
                                                    <span class="label label-default" style="font-size: small;">Approved</span>
                                                    <?php
                                                }

                                                ?>
                                               
                                            </div>
                                        </td>
                                    </tr>
                                <?php 
                                    
                            $x++;
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
