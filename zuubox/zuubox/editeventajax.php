 
 <?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");

$user = new User();

$dt = $_SESSION['dt'];
 if(isset($_POST['id']))  {

      $eid=$_POST['id'];
      $getevent=$user->select_row('tbl_userevents','*','event_id = '.$eid);
      $event_id=$getevent['event_id'];
      $etype=$getevent['event_type'];
      $priority=$getevent['priority'];
      $ename=$getevent['event_name'];
      $edesc=$getevent['event_desc'];
      $date=$getevent['date'];
      $time=$getevent['time'];
      $dtime=$date.' '.$time;  
  }
  ?>

  <?php if(isset($_SESSION['success_event'])){
    if($_SESSION['success_event']!="")
        {
            echo "<div class='success text-center'>";
            echo $_SESSION['success_event'];
            echo "</div>";                      
        }
    }?>
      <h3>Edit Event</h3>      
      <form role="form" method="POST" enctype="multipart/form-data" name="add-form" id="add-form">        
          <input type="hidden" name="event_id" id="event_id" value="<?php echo $event_id ?>"> 
           <div class="col-xs-12">
               <div class="input-group">
                 <span class="input-group-addon">Type</span>
                 <select class="form-control" name="etype" id='edittype'>
                      <option value="<?php echo  $etype ?>" ><?php echo  $etype ?></option>
                      <option value="Events">Events</option>
                      <option value="Appointments">Appointments</option>
                      <option value="Activates">Activates</option>
                      <option value="Meetings">Meetings</option>
                 </select>
               </div>
           </div>
             <div class="col-xs-12">
                 <div class="input-group">
                   <span class="input-group-addon">Priority</span>
                   <select class="form-control" name="priority" id='editpriority'>
                     <option value="<?php echo  $priority ?>" ><?php echo  $priority ?></option>
                        <option value="high">High</option>
                        <option value="medium">Medium</option>
                        <option value="low">Low</option>                            
                   </select>
                 </div>
             </div>
               <div class="col-xs-12">
                   <div class="input-group">
                     <span class="input-group-addon">Event Name</span>
                     <input type="text" name="ename" class="form-control" value=<?php echo $ename ?> id='editname'>
                   </div>
               </div>
                 
               <div class="col-xs-12">
                   <div class="input-group"> 
                     <textarea class="form-control" name="edisc" rows="3" placeholder="Description"  value=<?php echo $edesc ?> id='editdisc'> <?php echo $edesc ?></textarea>
                   </div>
               </div>
              <div class="col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon date" id=''>Date</span>
                     
                 <input type='text' class="form-control" name="datetime1" id="datetime1"  value="<?php echo $date?>"/>
                    
                 </div>
              </div>
              <div class="col-xs-12">
                  <div class="input-group">
                    <span class="input-group-addon date" id='datetimepicker'>Time</span>
                     
                 <input type='text' class="form-control timepicker" name="time" id="time1"  value="<?php echo $time?>"/>
                    
                 </div>
              </div>
               <div class="col-xs-12 text-center pt30">
                <input type="button" name="update" class="btn btn-info" id="updateevent" value="Update">
                    <input type="button" name="" class="btn close_event" value="X Close">
               </div>
            </form>

<!-- <script type="text/javascript" src="js/wickedpicker.js"></script> -->
<!-- <link rel="stylesheet" href="css/wickedpicker.css"> -->
<style type="text/css">
  .wickedpicker{
    z-index: 1000 !important;
  }
</style>


<!-- <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel = "stylesheet"> -->
<!-- <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script> -->
<style type="text/css">
  #ui-datepicker-div{
    z-index: 1000 !important;
  }
</style>
<script type="text/javascript">
 // $("#datetime1").datetimepicker({format: 'Y-MM-DD HH:mm:ss'});
 $( "#datetime1" ).datepicker({dateFormat: 'yy-mm-dd'});
 $('.timepicker').wickedpicker({
  now : "<?php echo $time?>",
  twentyFour: true
});
</script>
 <script type="text/javascript">
   $('.close_event').click(function(){
   $('.new_event').hide();

  });
</script>


<script type="text/javascript">
  $('#updateevent').click(function(){    
     var event_id = $("#event_id").val();
    var etype = $( "#edittype option:selected" ).text(); 
    var priority = $( "#editpriority option:selected" ).text(); 
     var ename = $("#editname").val();
    var edisc = $("#editdisc").val();
    var datetime1 = $("#datetime1").val();
    var time = $("#time1").val();
    var dt = "<?php echo $dt; ?>"; 
      if(etype === '' || priority === '' || ename === '' || edisc ==='' || datetime1 ===''  )
    {
      alert('Please fill all fileds on update event');
    }
    else
    {
       
    $.ajax({
            type:"POST",
            url:"addusereventajax_action.php",
            data:{event_id:event_id,etype:etype,priority:priority,ename:ename,edisc:edisc,datetime1:datetime1,time:time,dt:dt,update:'update'},
                success:function(result){ 
                 //alert(result);
               alert('You have successfully update event.');      
                $('.new_event').hide();
                $('.recent-box-sc').html(result);
              }
              });  
  };
      });


</script>
