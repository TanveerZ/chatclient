<?php
require_once("classes/cls-event.php");
$obj_event = new Event();

$event_details = $obj_event->getevent('*', '', '', '', 0);
$event_detail  = end($event_details);

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
                    <h3 class="page-header text-primary"><i class="fa fa-th-list"></i> Manage Event List</h3>
                </div>
                <div class="col-lg-6" align="right">
                     <h4 class="page-header text-primary" > <a href="add-aboutevent.php">Add Event</a> </h4>
                </div>  
            <div class="col-lg-12">            
                 
            <ol class="breadcrumb">
                <li><a href="index.php">Dashboard</a></li>
                <li class="active">Manage Event</li>
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
            </div>
                    <!-- /.col-lg-12 -->
            </div>
                <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">
                General Event List
            </div>
            <div class="table-responsive">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Event Name</th>
                                    <th>Description</th>
                                    <th>Priority</th>
                                    <th>Date</th>                                    
                                    <th>Time</th>                                    
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>                              
                                <?php
                                    $i=1;
                                 foreach ($event_details as $event_details) { ?>
                                    <tr class="odd gradeX">                                    
                                        <td>
										  <?php echo $i?>
                                        </td>
                                        <td>
                                        <a  href="#"><?php echo ucfirst($event_details['event_name']); ?></a>
                                        </td> 

                                        <td>
                                        <a  href="#"><?php echo ucfirst($event_details['event_disc']); ?></a>
                                        </td> 

                                        <td>
                                        <a  href="#"><?php echo ucfirst($event_details['priority']); ?></a>
                                        </td>  


                                        <td>
                                        <a  href="#"><?php echo ucfirst($event_details['date']); ?></a>
                                        </td>                                     
                                        
                                        <td>
                                        <a  href="#"><?php echo ucfirst($event_details['time']); ?></a>
                                        </td>  

                                        <td class="center">
                                     
                                            <div class="">                                       
                                            
                                                <a class="btn btn-default btn-circle" title="Edit artical" href="add-aboutevent.php?event_id=<?php echo base64_encode($event_details['event_id']); ?>"><i class="fa fa-edit"></i></a>
                                                <a class="btn btn-danger btn-circle"  data-toggle="confirmation" data-placement="top" data-original-title="" title="" onclick="return confirm('Are you sure?')" href="delete-aboutevent.php?event_id=<?php echo base64_encode($event_details['event_id']); ?>"><i class="fa fa-trash"></i></a> &nbsp;&nbsp;
                                               
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
