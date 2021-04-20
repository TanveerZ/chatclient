<?php
//session_start();
require_once("include/config.php");
require_once("include/functions.php");

$user = new User();
$uid=$_SESSION['user_id'];
$current_date=date('Y-m-d');

$slider=$user->select_allrecords('tbl_slidervideo','*');
 
?>    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
<div class="user_video">              
  <link rel="stylesheet" href="css/user_video.css"> 
    <form class="user_video" method="post" enctype="multipart/form-data">

    <div class="recent-box-sc">  

      <div class="window-btn window-btn2">
       <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window"></button>
       <button type="button" class="fa fa-expand" aria-hidden="true" title="Restore" id="restore-window" onclick="goFullscreen('player'); return false"></button>

       <button type="button" class="fa fa-window-maximize" aria-hidden="true"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window"></button>
      </div>

          <div class="user-head">       
            <h4>Video</h4>
          </div>         
         <?php if(!empty($slider)) { foreach ($slider as $slide) {
   # code...
 ?>
         <div id="playvideo">
           <video src="<?php echo $slide['video_path'];?>" class="slidervideo" controls="controls" id="player"></video>
         </div>   
<?php } }?> 
      </div>  
    </form> 
</div>
 <link rel="stylesheet" href="css/video_slider.css"> 
 
<link rel="stylesheet" href="js/dist/jquery.flipster.min.css"> 
<script src="js/dist/jquery.flipster.min.js"></script>


<article id="video_slider" class="demo"> 

    <div id="video_slider" >
       <div class="row">
        <div class="col-md-12" style="padding-bottom: 10px">
          <form class="text-center"> 
          <label for="videofile" class="custom-file-upload">
              <i class="fa fa-cloud-upload"></i> Upload new
          </label>
         <!--  <input  type="file" name="file" id="videofile" /> -->
         <input id="videofile" type="file" />
          </form>
        </div>
      </div>

        <ul class="flip-items">
             

        <?php
          if(!empty($slider))
          {
            for($i=0;$i<count($slider);$i++)
            {    

        ?>
            <li data-flip-title="" data-flip-category="" onclick="playvideo(this.id)" id="<?php echo $slider[$i]['slide_id']?>" class="sv">
                 <video  src="<?php echo $slider[$i]['video_path']?>" class="slidervideo" id="player"></video> 
                
            </li>
           <?php
           
           }
         }                               
        ?>   

        </ul>

    </div> 
</article>    
<script>
    var coverflow = $("#video_slider").flipster();
    $('.user_video').hide();
</script>


<script type="text/javascript">

$('.sv').click(function(){

  var data =$(this).html();
  $('#playvideo').html(data);
  $('#playvideo .flipster__item__content video').attr("controls","controls");
  //$('video').removeclass("slidervideo");
  //$('#user_video .slidervideo').toggleClass('slidervideo1',"slidervideo");
  $('.user_video').show();  
});
</script>
 
 <script type="text/javascript">
  
$('#videofile').change(function(){

  confirm("Are you sure upload video");
var file_data = $('#videofile').prop('files')[0];   
var form_data = new FormData();                  
form_data.append('file', file_data);
$.ajax({
    url: "upload-footer-slidervideo.php",
    type: "POST",
    data:  form_data,
    contentType: false,
    cache: false,
    processData:false,
    success: function(data){
       //console.log(data);
        alert("video upload successfully");
        //$('.flip-items').html(data);
        location.reload();
       
    }
});



});

 </script>


<!-- <script type="text/javascript">
  $('.minsize').hide();
  $('#minsize').click(function(){
    $('.minsize').hide();
    $('.midsize').show();
    $('.maxsize').show();

    $('.user_video .user_video').height('300px');
    $('.user_video .user_video').width('500px');
    $('.recent-box-sc').height('auto');   
    $('.user_video .slidervideo').height('270px');   

  });
</script>
 
<script type="text/javascript">
  $('#midsize').click(function(){

    $('.midsize').hide();
    $('.minsize').show();
    $('.maxsize').show();

    $('.user_video .user_video').height('500px');
    $('.user_video .user_video').width('100%');
    $('.recent-box-sc').height('auto');   
    $('.user_video .slidervideo').height('370px');  

  });
</script> -->


<script type="text/javascript">
function goFullscreen(id) {
  var element = document.getElementById(id);       
  if (element.mozRequestFullScreen) {
    element.mozRequestFullScreen();
  } else if (element.webkitRequestFullScreen) {
    element.webkitRequestFullScreen();
  }  
}
</script>