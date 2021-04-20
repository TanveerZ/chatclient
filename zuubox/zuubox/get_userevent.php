<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");

$user = new User();

$userid=$_SESSION['user_id'];
/*-------------Add Event ---------------*/
   
    /*------------------Fetch date event --------*/    
        $cday=$_GET['id'];
        $monthyear=date('Y-m');
        $dt=$monthyear.'-'.$cday;
        $where="u_id = '".$userid."' and  date = '".$dt."' ";
        $result=$user->select_records('tbl_userevents','*',$where);
    /*--------------------Edit -------------------------------------*/   

?>

<?php if(isset($_SESSION['success_event'])){
    if($_SESSION['success_event']!="")
        {
            echo "<div class='success text-center'>";
            echo $_SESSION['success_event'];
            echo "</div>";                      
        }
    }?>
    <div class="user-head">
        <h3>Event</h3>
        <a href="#" class="add_event">Add </a>
    </div>
    <div class="recent-box-sc"> 
        <?php 
            if($result!=0)
            {                
                foreach ($result as $rows) 
                { 

                    $event_id=$rows['event_id'];  
                ?>
                    <div class="event-box">
                         <h3><?php echo $rows['event_type'] ?></h3>
                         <p><h4><?php echo $rows['event_name'] ?></h4></p>
                         <p><strong><?php echo $rows['time'] ?></strong></p>
                         <p><?php echo $rows['event_desc']?></p>

                         <!--<a href="#" class="edit_event">Edit</a>-->
                         <button class="edit_event" id="<?php echo $event_id ?>" onclick="editevent(this.id);">edit</button>

                          <button class="delete_event" id="<?php echo $event_id ?>" onclick="deleteevent(this.id);">delete</button>

                    </div>
                    <?php 
                }
            } 
            else
            {

                echo "<div class='event-box'>";
                echo "Today no any Event";

                echo "</div>";

            }
         ?>

         <!--------------------------------------------------- -->

            <div class="new_event col-xs-7" id="new_event">
                 <h3>Add Event</h3>
                <form role="form" method="POST" enctype="multipart/form-data" name="add-form" id="add-form">
                
                 <input type="hidden" name="update_type" id="update_type" value="<?php echo (isset($_GET['event_id'])) ? "edit" : "add"; ?>">
                <input type="hidden" name="event_id" id="event_id" value="<?php echo (isset($_GET['event_id'])) ? $_GET['event_id'] : ""; ?>"> 



                 <div class="col-xs-12">
                     <div class="input-group">
                       <span class="input-group-addon">Type</span>
                       <select class="form-control" name="etype">
                            <option value="<?php echo (isset($getevent['event_type'])) ? $getevent['event_type'] : ""; ?>" ></option>
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
                       <select class="form-control" name="priority">
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>                            
                       </select>
                     </div>
                 </div>
                 <div class="col-xs-12">
                     <div class="input-group">
                       <span class="input-group-addon">Event Name</span>
                       <input type="text" name="ename" class="form-control">
                     </div>
                 </div>
                 
                 <div class="col-xs-12">
                     <div class="input-group"> 
                       <textarea class="form-control" name="edisc" rows="3" placeholder="Description"></textarea>
                     </div>
                 </div>
                 <div class="col-xs-12">
                    <div class="input-group">
                    <span class="input-group-addon date" id='datetimepicker'>D+ate Time</span>
                     
                 <input type='text' class="form-control" name="datetime" id="datetime" />
                    
                 </div>
             </div>
                 <div class="col-xs-12 text-center pt30">
                      <input type="submit" name="submit" class="btn btn-info">
                      <input type="button" name="" class="btn close_event" value="X Close">
                 </div>
                 </form>
            </div>

<!------------------------------Update Event------>

            
            <div class="new_event col-xs-7" id="update_event" >
                <div id="updatecontent">
                </div>
                </div>

              
             <div id="deletecontent">
             </div>   


    </div>  
</div>


<?php
unset($_SESSION['event_msg']);
unset($_SESSION['success_event']);

?>
<script type="text/javascript">
    
    function editevent(id)
    {
      $.ajax({
          method: "POST",
          url: "editeventajax.php",
          data: { id: id}
        })
          .done(function( msg ) {
            $("#updatecontent").html(msg);
        });
    }


    function deleteevent(id)
    {
      $.ajax({
          method: "POST",
          url: "deleteeventajax.php",
          data: { id: id}
        })
      .done(function( msg1 ) {
            $("#deletecontent").html(msg1);
        });
          
    }


  
</script>

<script type="text/javascript">
       $("#datetime").datetimepicker({format: 'Y-MM-DD HH:mm:ss'});
    </script>
<script type="text/javascript">
    $(document).ready(function(){
         // add funcation       
      $('.add_event').click(function(){
		// alert('hii');
         $('#new_event').show();
         $('#update_event').hide();
      });

      // add funcation      
      $('.edit_event').click(function(){
         $('#update_event').show();
         $('#new_event').hide(); 
      });

       $('.delete_event').click(function(){

         location.reload(); 
      });   

      // Close funcation        
      $('.close_event').click(function(){
         $('.new_event').hide();
        
      });

    })
</script>