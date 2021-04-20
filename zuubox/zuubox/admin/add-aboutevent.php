<?php
require_once("classes/cls-event.php");
$obj_event = new Event();

$event_details = $obj_event->getevent('*', '', '', '', 0);
$event_detail  = end($event_details);

if (!isset($_SESSION['css_admin'])) 
{
    header("Location:login.php");
}

if(isset($_GET['event_id']) && $_GET['event_id']!="")
{
    $condition = "`event_id` = '" . base64_decode($_GET['event_id']) . "' ";
    $getevent = $obj_event->getevent('*', $condition, '', '', 0);
    $getevent = end($getevent);
}

/*-----------------ADD-UPDATE--------*/
if ($_POST['update_type'] == "add") 
{
if (isset($_POST['submit']))
    {
       
         $event=$_POST['event'];
         $d=explode(' ',$_POST['datetime']);
         $date=$d[0];
         $time=$d[1];
         $priority=$_POST['priority'];
         $discription=$_POST['discription'];

        
        $obj_event->insertevent(array("event_name"=>$event,"event_disc"=>$discription,"priority"=>$priority,"date"=>$date,"time"=>$time,"add_date"=>date("Y-m-d H:i:s")));

           $_SESSION['success'] = "Add Event successfully.";
            header("location:view_aboutevent.php");
            exit();
    }
}
if($_POST['update_type']=="edit")
{
    if(isset($_POST['submit']))
    {
      
         $condition = "`event_id` = '" . base64_decode($_POST['event_id']) . "'";
        $update_data['event_name']=$_POST['event'];
        $update_data['event_disc']=$_POST['discription'];
        $d=explode(' ',$_POST['datetime']);
        $date=$d[0];
        $time=$d[1];
        $update_data['date']= $date;
        $update_data['time']= $time;
        $update_data['priority']=$_POST['priority'];

        
        $update_data['add_date'] = date('Y-m-d H:i:s'); 
        $obj_event->updateevent($update_data, $condition, 0);

        $_SESSION['success'] = "Update Event successfully.";
        header("location:view_aboutevent.php");
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
                            if(isset( $getevent))
                            {
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Update Event</h3>";
                            }
                            else
                            {                       
                                echo "<h3 class='page-header text-primary'><i class='fa fa-user'></i> Add Event</h3>";                        
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
                            <li class="active">Manage Event's</li>
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
                                            <form role="form" method="POST" enctype="multipart/form-data" action="#" name="add-aboutevent" id="add-aboutevent">
                                                <?php
                                                    if(isset( $getevent))
                                                        {
                                                         echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Update Event</h4>"  ;          
                                                        }
                                                        else
                                                        {
                                                           echo "<h4 class='page-header text-primary'><i class='fa fa-user'></i> Create Event's</h4>";
                                                        }
                                                
                                                ?>
                                                <input type="hidden" name="update_type" id="update_type" value="<?php echo (isset($_GET['event_id'])) ? "edit" : "add"; ?>">
                                                <input type="hidden" name="event_id" id="event_id" value="<?php echo (isset($_GET['event_id'])) ? $_GET['event_id'] : ""; ?>">


                                                <div class="form-group">
                                                    <label>Event Name <span class="error">*</span></label>                                               
                                                    <input type="text" class="form-control" name="event" id="event" value="<?php echo (isset($getevent['event_name'])) ? $getevent['event_name'] : ""; ?>">

                                                </div>   
                                                <hr>
                                                <div class="form-group">
                                                    <label>Event Description <span class="error">*</span></label>              

                                                    <textarea class="form-control" rows="3" id="discription" name="discription" ><?php echo (isset($getevent['event_disc'])) ? $getevent['event_disc'] : ""; ?></textarea>                                 
                                                  
                                                </div>


                                                <hr>
                                                <div class="form-group">
                                                    <label>Event Priority <span class="error">*</span></label>
                                                
                                                <select class="form-control" id="priority" name="priority" >
                                                    <option value="high">High</option>
                                                    <option value="medium">Medium</option>
                                                    <option value="low" >Low</option>
                                                    
                                                </select>

                                                </div>    
                                                <hr>

                                                <div class="form-group">
                                                    <label>Date Time <span class="error">*</span></label>
                                                    <div class='input-group date' id='datetimepicker'>
                                                       <input type='text' class="form-control" name="datetime" id="datetime" value="<?php echo (isset($getevent['date'])) ? $getevent['date'] .$getevent['time'] : ""; ?>">
                                                        
                                                    </div>
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
    $(document).ready(function () {
        // validate signup form on keyup and submit
        $("#add-aboutevent").validate({
            rules: {
                event:{
                    required: true
                },
                discription:{
                    required: true
                },
                priority:{
                    required: true
                },
                datetime:{
                    required: true
                }
            },
            messages: {
                event: {
                    required: "*Add event is required."
                },
                discription: {
                    required: "*Add discription is required."
                },
                priority: {
                    required: "*Add priority is required."
                },
                datetime: {
                    required: "*Add datetime is required."
                }
            },
            errorElement: "span",
        });
    });
    </script>
    


     <script type="text/javascript">
       $("#datetime").datetimepicker({format: 'Y-MM-DD HH:mm:ss'});
    </script>
    
    <script src="bower_components/jquery-validation/jquery.validate.js"></script>
    
</body>

</html>
