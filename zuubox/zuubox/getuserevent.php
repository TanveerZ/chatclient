<?php
  session_start();  
  require_once("include/config.php");
  require_once("include/functions.php");
  $user = new User();

   $_SESSION['event']=1;

   $userid=$_SESSION['user_id']; 

  //$id = $_GET['id'];
  $cdayid=explode('-', $_GET['id']);

   $cmonth = $cdayid[0];
  $cday = $cdayid[1];

  $cdaylen = strlen($cday);

  if($cdaylen!=2)
  {

   if($cday<10)
   {
    $cday='0'.$cday;

   }
   else
   {
    $cday=$cday;
   }
 }
    $year=date('Y');
      $dt=$year.'-'.$cmonth.'-'.$cday;
    $_SESSION['dt']=$dt;
       $where="u_id = '".$userid."' and  date = '".$dt."' ";
    $result=$user->select_records('tbl_userevents','*',$where);  
    

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
        <a href="#addevent" class="add_event" id="add_event">Add </a>
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
                         <button class="edit_event " id="<?php echo $event_id ?>" onclick="editevent(this.id);">Edit</button>

                          <button class="delete_event " id="<?php echo $event_id ?>">Delete</button>

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

         <!-- ghrfghf -->

            <div class="new_event col-xs-7" id="new_event">
                 <h3>Add Event</h3>
                <form role="form" method="POST" enctype="multipart/form-data" name="add-form" id="add-form">

               
                 <div class="col-xs-12">
                     <div class="input-group">
                       <span class="input-group-addon">Type</span>
                       <select class="form-control" name="etype" id='etype'>
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
                       <select class="form-control" name="priority" id="priority">
                            <option value="high">High</option>
                            <option value="medium">Medium</option>
                            <option value="low">Low</option>                            
                       </select>
                     </div>
                 </div>
                 <div class="col-xs-12">
                     <div class="input-group">
                       <span class="input-group-addon">Event Name</span>
                       <input type="text" name="ename" id="ename" class="form-control">
                     </div>
                 </div>
                 
                 <div class="col-xs-12">
                     <div class="input-group"> 
                       <textarea class="form-control" name="edisc" id="edisc" rows="3" placeholder="Description"></textarea>
                     </div>
                 </div>
                <div class="col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon date" id='datetimepicker'>Date</span>
                      <input type='text' class="form-control" name="datetime" id="datetime" />
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="input-group">
                      <span class="input-group-addon time" id=''>Time</span>
                      <input type='text' class="form-control timepicker" name="time" id="time" />
                    </div>
                </div>
                 <div class="col-xs-12 text-center pt30">
                      <input type="button" name="submit" class="btn btn-info" id="saveevent" value="submit">
                      <input type="button" name="" class="btn close_event" value="X Close">
                 </div>
                 </form>
            </div>
           
              <div class="new_event col-xs-7" id="update_event" >
                <div id="updatecontent">
                </div>
              </div>

              <div id="deletecontent">
              </div>   
   


<?php
unset($_SESSION['event_msg']);
unset($_SESSION['success_event']);
?>

<script type="text/javascript" src="js/wickedpicker.js"></script>
<link rel="stylesheet" href="css/wickedpicker.css">
<style type="text/css">
  .wickedpicker{
    z-index: 1000 !important;
  }
</style>


<link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
<script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<style type="text/css">
  #ui-datepicker-div{
    z-index: 1000 !important;
  }
</style>

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

</script>

    <script type="text/javascript">
       // $("#datetime").datetimepicker({format: 'Y-MM-DD HH:mm:ss'});
       // $( "#datetime" ).datepicker();
    </script>

<!-- Add Event script -->
<script type="text/javascript">
    $('#add_event').click(function(){ 
       $( "#datetime" ).datepicker({dateFormat: 'yy-mm-dd'});
       $('.timepicker').wickedpicker({
        twentyFour: true
      });
      $('#new_event').show();
      $('#update_event').hide();
      /*----recent visit page--- */
      var url='<?php echo SITEPATH;?>';
        $.ajax({
           type:"POST",
          url:"visit_pageajax.php",
          data:{id:'Add Event',url:url},
          success:function(result){       
          }
        });
      });
</script>

<script type="text/javascript">
   $('#saveevent').click(function(){
    var etype = $( "#etype option:selected" ).text();    
    var priority = $( "#priority option:selected" ).text();
    var ename = $("#ename").val();
    var edisc = $("#edisc").val();
    var datetime1 = $("#datetime").val();
    var time= $("#time").val();
    if(etype === '' || priority === '' || ename === '' || edisc ==='' || datetime ==='' || time === '' )
    {
      alert('Please fill all fileds on add event');
    }
    else
    {
        var dt = "<?php echo $dt; ?>"; 

          $.ajax({
            type:"POST",
            url:"addusereventajax_action.php",
            data:{etype:etype,priority:priority,ename:ename,edisc:edisc,datetime1:datetime1,time:time,dt:dt,add:'add'},
                success:function(result){ 

                alert('You have successfully add event.');      
                $('.new_event').hide();
                $('.recent-box-sc').html(result);
                location.reload();
              }
              });  
    }
      });
</script>

<!-- Update Event script -->

<script type="text/javascript">
    $('.edit_event').click(function(){
      $('#update_event').show();
      $('#new_event').hide(); 
         /*----recent visit page--- */
          var url='<?php echo SITEPATH;?>';
           $.ajax({
               type:"POST",
              url:"visit_pageajax.php",
              data:{id:'Update Event',url:url},
              success:function(result){       
              }
              });
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
    if(etype === '' || priority === '' || ename === '' || edisc ==='' || datetime1 ===''  )
    {
      alert('Please fill all fileds on update event');
    }
    else
    {
    var dt = "<?php echo $dt; ?>";    
        
         $.ajax({
            type:"POST",
            url:"addusereventajax_action.php",
            data:{event_id:event_id,etype:etype,priority:priority,ename:ename,edisc:edisc,datetime1:datetime1,dt:dt,update:'update'},
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

<script type="text/javascript">

  $('.delete_event').click(function(){
    var id = this.id;
    var dt = "<?php echo $dt; ?>";  
    confirm("Are you sure delete event");

    $.ajax({
          method: "POST",
           url:"addusereventajax_action.php",
          data: {id:id,dt:dt,delete:'delete'},
             success:function(result){ 
                 //alert(result);
               alert('You have successfully delete event.');      
               
                $('.recent-box-sc').html(result);
              }
        });

  });  

       $('.delete_event').click(function(){

        /*----recent visit page--- */
          var url='<?php echo SITEPATH;?>';
           $.ajax({
               type:"POST",
              url:"visit_pageajax.php",
              data:{id:'Delete Event',url:url},
              success:function(result){       
              }
              });
      });   

      // Close funcation        
      $('.close_event').click(function(){
         $('.new_event').hide();
        
      });

   
</script>

