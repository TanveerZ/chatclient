<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");
$user = new User();

 $src = $_FILES['file']['tmp_name'];
 $targ = "uploads/Slider".$_FILES['file']['name'];

if(isset($_FILES['file']['name']) && $_FILES['file']['size'] > 0)
        {
        	$uploaddir  = 'uploads/Slider/';
          $excl = explode(".", basename($_FILES['file']['name']) );
        	$ext      = end($excl);
            $filename   = time() . mt_rand().".".$ext;
            $uploadfile = $uploaddir . $filename;
            $file_type = $_FILES['file']['type'];
            if($file_type=='video/mp4')
                {
                	if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
                    {                   	 	
					   $user->insert_records('tbl_slidervideo',array('video_path'=>$uploadfile,'add_date'=>date('Y-m-d')));
                    } 
                }
        }
        $slider=$user->select_allrecords('tbl_slidervideo','*');
?> 

    <article id="demo-default" class="demo">
      <div id="coverflow">
        <ul class="flip-items">
          <?php  
            $slider=$user->select_allrecords('tbl_slidervideo','*');
              if(count($slider))
                {
                  for($i=0;$i<count($slider);$i++)
                  {    
          ?>
            <li data-flip-title="Red">
              <a class="delete-btn fa fa-trash" id="<?php echo $slider[$i]['slide_id']?>"></a> 
                  <span  onclick="playprofilevideo(this.id)" id="<?php echo $slider[$i]['slide_id']?>" class="profilev">
                <video  src="<?php echo $slider[$i]['video_path']?>" class="slidervideo" style="width:30%;"></video> </span>
            </li>
          <?php 
                  }
                }
          ?>   
                            
        </ul>
      </div>

      <script>
        var coverflow = $("#coverflow").flipster();
      </script>
    </article>             
  </div>

<script type="text/javascript">
    $('.profilev').click(function(){
      var data =$(this).html();
      $('#playprofilevideo').html(data);
       $('#playprofilevideo video').removeClass("profilevideo");
      $('#playprofilevideo video').attr("controls","controls");
      $('#playprofilevideo video').attr("height","200px");
      $('#playprofilevideo video').attr("width","200px");  
      $('.profile_video_pop').show();  
    })
</script>

<script type="text/javascript">
    $('.delete-btn').click(function(){
         var id = $(this).attr('id');
        confirm("Are you sure delete video");
         $.ajax({
               type:"POST",
              url:"delete-profile-video.php",
              data:{videoid:id},
              success:function(result){  
                  confirm("delete video successfully");   
                console.log(result);
                $('#profilevs').html(result);
              }
             });

    });

 </script>