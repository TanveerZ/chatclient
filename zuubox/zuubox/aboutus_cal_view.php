<link rel="stylesheet" href="css/calendar_view.css">


<div class="calendar_view">
	         <button class="close-btn pull-right">x</button>
	<div id="content">

	</div>
	
	

<script type="text/javascript">
	$(document).ready(function(){
	  // Event funcation		
      $('.mini_calendar table td').click(function(){
         $('.calendar_view').show();

          var ChkBxMsgId;
          ChkBxMsgId = $(this).attr('id');
          //alert(ChkBxMsgId);

           $.ajax({
        type:"POST",
        url:"getevent.php",
        data:{id:ChkBxMsgId},
        success:function(result){
        $("#content").html(result);
        }
        });


      });

      $('.close-btn').click(function(){
         $('.calendar_view').hide();
      });
      // add funcation		
      $('.add_event').click(function(){
         $('.new_event').show();
      });

      // add funcation		
      $('.edit_event').click(function(){
         $('.new_event').show();
      });

      // Close funcation		
      $('.close_event').click(function(){
         $('.new_event').hide();
      });

	});
</script>


