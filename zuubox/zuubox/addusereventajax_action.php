<?php
  session_start();  
  require_once("include/config.php");
  require_once("include/functions.php");
  $user = new User();   
$userid=$_SESSION['user_id'];
	if(isset($_POST['update']))
	{
		
		$event_id=$_POST['event_id'];
  		$etype=$_POST['etype'];
  		$priority=$_POST['priority'];
  		$ename=$_POST['ename'];
  		$edisc=$_POST['edisc'];
  		// $dtime=explode(' ', $_POST['datetime1']);
  		$date=$_POST['datetime1'];
  		$time=$_POST['time'];
      // echo "date".$_POST['datetime1'];
      // echo "time ".$_POST['time'];die;

  		$add_date=date('Y-m-d');

  		$dataarray=array($etype,$priority,$ename,$edisc,$date,$time,$add_date);
  		$fieldsarray=array('event_type','priority','event_name','event_desc','date','time','add_date');

  		$query=$user->Update_Dynamic_Query('tbl_userevents',$dataarray,$fieldsarray,'event_id',$event_id);

  		 //$_SESSION['event_msg']=2;
        $where="u_id = '".$userid."' and  date = '".$_POST['dt']."' ";
    	$result=$user->select_records('tbl_userevents','*',$where);    	
    	
	}

	 if(isset($_POST['add']))
    {


        
        $etype=$_POST['etype'];
        $priority=$_POST['priority'];
        $ename=$_POST['ename'];
        $edisc=$_POST['edisc'];
                
        // $dtime=explode(' ', $_POST['datetime']);
     	  // $edate=$dtime[0];
        // $etime=$dtime[1];

        $edate=$_POST['datetime1'];
        $etime=$_POST['time'];
        $query=$user->insert_records('tbl_userevents',array("u_id"=>$userid,"event_type"=>$etype,"priority"=>$priority,"event_name"=>$ename,"event_desc"=>$edisc,"date"=>$edate,"time"=>$etime,"add_date"=>date("Y-m-d")));
        $_SESSION['event_msg']=1;
        //$_SESSION['success_event'] = "You have successfully add event.";       
      	$where="u_id = '".$userid."' and  date = '".$_POST['dt']."' ";
    	$result=$user->select_records('tbl_userevents','*',$where); 
    }

    if(isset($_POST['delete']))
    {

    	 $id=$_POST['id'];
		$query=$user->delete_row('tbl_userevents','event_id = '.$id);

		$where="u_id = '".$userid."' and  date = '".$_POST['dt']."' ";
    	$result=$user->select_records('tbl_userevents','*',$where); 
    }


?>

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
                         <button class="edit_event" id="<?php echo $event_id ?>" onclick="editevent(this.id);">Edit</button>

                          <button class="delete_event" id="<?php echo $event_id ?>" >Delete</button>

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
                    <span class="input-group-addon date" id='datetimepicker'>Date Time</span>
                     
                 <input type='text' class="form-control" name="datetime" id="datetime" />
                    
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


<script type="text/javascript">
       $("#datetime").datetimepicker({format: 'Y-MM-DD HH:mm:ss'});
</script>

<!-- Add event script -->
<script type="text/javascript">
    $('#add_event').click(function(){ 
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
    var datetime = $("#datetime").val();

    var dt = "<?php echo $_POST['dt']; ?>"; 
if(etype === '' || priority === '' || ename === '' || edisc ==='' || datetime ===''  )
    {
      alert('Please fill all fileds on add event');
    }
    else
    {

        $.ajax({
            type:"POST",
            url:"addusereventajax_action.php",
            data:{etype:etype,priority:priority,ename:ename,edisc:edisc,datetime:datetime,dt:dt,add:'add'},
                success:function(result){ 
                alert('You have successfully add event.');      
                $('.new_event').hide();
                $('.recent-box-sc').html(result);
              }
            });  
      };
    });
</script>

<!-- update event -->
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

    var dt = "<?php echo $dt; ?>"; 
    if(etype === '' || priority === '' || ename === '' || edisc ==='' || datetime1 ===''  )
    {
      alert('Please fill all fileds on add event');
    }
    else
    {
        
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

 $('.close_event').click(function(){
         $('.new_event').hide();
        
      });
</script>

<!-- delete event -->

<script type="text/javascript">
  $('.delete_event').click(function(){
    var id = this.id;
    var dt = "<?php echo $_SESSION['dt']; ?>";  
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

 
   
</script>