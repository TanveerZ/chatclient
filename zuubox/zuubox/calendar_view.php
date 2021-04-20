<link rel="stylesheet" href="css/calendar_view.css">
<link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css">
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
<div class="calendar_view">
<div class="window-btn window-btn2">
     <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button>
       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
        <button type="button" class="fa fa-window-maximize" aria-hidden="true"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
</div>
    <!-- <a class="close-btn pull-right">x</a> -->
<div id="content">

</div> 
<script type="text/javascript"> 
    // Event funcation    
      $('.mini_calendar table td').click(function(){
        
         $('.calendar_view').show();

          var ChkBxMsgId;
          ChkBxMsgId = $(this).attr('id');
          //alert(ChkBxMsgId);

           $.ajax({
         type:"GET",
        url:"getuserevent.php",
        data:{id:ChkBxMsgId},
        success:function(result){
        $("#content").html(result);
        }
        });
           
            /*----recent visit page--- */
          var url='<?php echo SITEPATH;?>';
           $.ajax({
               type:"POST",
              url:"visit_pageajax.php",
              data:{id:'View Event',url:url},
              success:function(result){       
              }
              });
            

      });

     
      // Close funcation    
      $('.close_event').click(function(){
         $('.new_event').hide();
      });


</script>




<script type="text/javascript"> 
    // Event funcation    
      $('.mini_cal table td').click(function(){
        
         $('.calendar_view').show();

          var ChkBxMsgId;
          ChkBxMsgId = $(this).attr('id');
           ChkBxMsgId=ChkBxMsgId.substr(3,2);
  
           $.ajax({
         type:"GET",
        url:"getuserevent.php",
        data:{id:ChkBxMsgId},
        success:function(result){
        $("#content").html(result);
        }
        });
           
            /*----recent visit page--- */
          var url='<?php echo SITEPATH;?>';
           $.ajax({
               type:"POST",
              url:"visit_pageajax.php",
              data:{id:'View Event',url:url},
              success:function(result){       
              }
              });
            

      });

      $('.close-btn').click(function(){
         $('.calendar_view').hide();
         location.reload();
      });


      // Close funcation    
      $('.close_event').click(function(){
         $('.new_event').hide();

         location.reload();
      });


</script>


