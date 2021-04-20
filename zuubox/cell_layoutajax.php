<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");

  $user = new User();

  $uid = $_SESSION['user_id'];

  $cellid=$_REQUEST['id'];

$where = "cell_id=".$cellid;
$adminCellData=$user->select_records('tbl_celldetails','*', $where);

  $where = "cell_id=".$cellid." AND user_id=".$uid." AND status = 1 AND `image-path` IS NOT NULL";

  $slideData=$user->select_records('tbl_user_cell','*', $where);

  if($slideData == null){
    $where = "cell_id=".$cellid." AND section_id='slider'";
    $slideData=$user->select_records('tbl_celldetails','*', $where);
  }

?>
     <div class="post-scroll1">
     <div class="col-xs-3 right_bar">
      <div class="input-group">

         <div class="input-group-addon">

            <?php

              echo $cellid;

            ?>

         </div>

         <div class="input-group-addon">

            <?php

              echo $cellid;

            ?>

         </div>

      </div>

      <div class="empty_box">



      </div>

      <ul class="nav">

        <li><a href="#" class="btn btn-default btn-block"> gdfgsdfgsdf</a> </li>

        <li><a href="#" class="btn btn-default btn-block"> gdfgsdfgsdf</a> </li>

        <li><a href="#" class="btn btn-default btn-block"> gdfgsdfgsdf</a> </li>

        <li><a href="#" class="btn btn-default btn-block"> gdfgsdfgsdf</a> </li>

        <li><a href="#" class="btn btn-default btn-block"> gdfgsdfgsdf</a> </li>

      </ul>

     </div>

     <div class="col-xs-9">

       <div class="slider_cell ">

          <h3>Trending And News</h3>
          <?php /* ?>
          <div id="myCarousel" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->

            <div class="col-xs-12">

              <div class="row">

             <ol class="carousel-indicators">

                  <?php 
                  if(!empty($slidedata))
                  {
                    foreach ($slidedata as $rows)
                    {

                       $imagep=explode(',',$rows['image-path']);

                       $imgcount= count($imagep);

                     }


                  for($i = 0; $i < $imgcount; $i++) { ?>

                  <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" id="<?php echo $i; ?>"></li>

                <?php } 
              }?>  

              </ol>

              <!-- Wrapper for slides -->

              <div class="carousel-inner">

                <?php
                if(!empty($slidedata))
                {
                 $count=0;

                 $activestauts="";

                  foreach ($slidedata as $rows) 

                  {

                     $imagep=explode(',',$rows['image-path']);

                     $imgcount= count($imagep);

                    for ($i=0;$i<$imgcount;$i++)

                    {

                       if($i==0)

                    {

                      $activestauts="active";

                    }

                    else

                    {

                      $activestauts="";

                    }                 

                  

                    ?> 



                    <div class="item <?php echo $activestauts; ?>">  

                    

                      <img src="<?php echo $imagep[$i]; ?>" alt='images'>

                    </div>

                  <?php

                }

                }
              }

                ?>                  

                                

              </div>

              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">

                <span class="glyphicon glyphicon-chevron-left"></span>

                </a>

              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">

                <span class="glyphicon glyphicon-chevron-right"></span>

              </a>

            </div>

            <div id="carouselButtons">
			      <button id="playButton" type="button" class="btn btn-default btn-xs">
			          <span class="glyphicon glyphicon-play"></span>
			       </button>
			      <button id="pauseButton" type="button" class="btn btn-default btn-xs">
			          <span class="glyphicon glyphicon-pause"></span>
			      </button>
			</div>


            <script type="text/javascript">

              $('.carousel-control.left').click(function() {

              $('#myCarousel').carousel('prev');

            });

            $('.carousel-control.right').click(function() {

              $('#myCarousel').carousel('next');

            });

            </script>

            </div>

            </div>
            <?php */?>
            <?php if(isset($slideData) && !empty($slideData)){?>

            <div id="cellCarousel" class="carousel slide" data-ride="carousel" >
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <?php 
                for($i=0;$i<count($slideData);$i++){ ?>
                    <li data-target="#cellCarousel" data-slide-to="<?php echo $i ?>" <?php echo($i==0)?'class="active"':"" ?>></li>
                <?php }?>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <?php 
                $i = 0;
                foreach($slideData as $row){ ?>
                  <div class="item <?php echo($i == 0)?'active':''; ?>" >
                      <img src="<?php echo $row['image-path']; ?>" alt='images' style="width: 100%;height: 200px;">
                  </div>
                <?php $i++; } ?>
              </div>
            </div>

            <?php }?>
       </div>



      <div class="row">
        <div class="col-xs-6"> 
            <div class="border"> 
              <h3>SECTION 1</h3>

              <?php
                $where = "cell_id=".$cellid." AND user_id=".$uid." AND status = 1 AND section_id=1";
                $userCellData=$user->select_records('tbl_user_cell','*', $where);

              if(isset($userCellData) && !empty($userCellData))
              {
                 foreach ($userCellData as $rows) {
                    echo  $section2 = $rows['text'];
                  }
              }else{
                  foreach ($adminCellData as $rows) 
                  {
                   echo  $section1 = $rows['section_1'];
                  }
              }
              ?>
              <a href="#" class="btn btn-box cell-section" id="section_1">Edit</a>
                </div>
            </div>
       <div class="col-xs-6">

          <div class="border"> 



            <h3>SECTION 2</h3>

            <?php 
            $where = "cell_id=".$cellid." AND user_id=".$uid." AND status = 1 AND section_id=2";
                $userCellData=$user->select_records('tbl_user_cell','*', $where);

            if(isset($userCellData) && !empty($userCellData))
            {
                foreach ($userCellData as $rows) {
                    echo  $section2 = $rows['text'];
                  }
            }else{
              foreach ($adminCellData as $rows) {

                echo  $section2 = $rows['section_2'];
              }
            }

            ?>

            <a href="#" class="btn btn-box cell-section" id="section_2">Edit</a>

          </div>

       </div>



       <div class="col-xs-6">

          <div class="border"> 

            <h3>SECTION 3</h3>

            <?php
              $where = "cell_id=".$cellid." AND user_id=".$uid." AND status = 1 AND section_id=3";
                $userCellData=$user->select_records('tbl_user_cell','*', $where);

              if(isset($userCellData) && !empty($userCellData))
              {
                 foreach ($userCellData as $rows) {
                    echo  $section2 = $rows['text'];
                  }
              }else{
                foreach ($adminCellData as $rows) 
                 {
                   echo  $section3 = $rows['section_3'];
                 }
              }
              ?>

            <a href="#" class="btn btn-box cell-section" id="section_3">Edit</a>

          </div>

       </div>

     </div>

     <div class="row">

       <div class="col-xs-3">

          <div class="border"> 

           

          </div>

       </div>



       <div class="col-xs-3">

          <div class="border"> 

          

          </div>

       </div>

       <div class="col-xs-3">

          <div class="border"> 

          

          </div>

       </div>

       <div class="col-xs-3">

          <div class="border"> 

          

          </div>

       </div>

     </div>

     <div class="row">

       <div class="col-xs-4">

          <div class="border"> 

           

          </div>

       </div>



       <div class="col-xs-4">

          <div class="border"> 

          

          </div>

       </div>

       <div class="col-xs-4">

          <div class="border"> 

          

          </div>

       </div> 

     </div>



 

     </div>

</div>



<script type="text/javascript">

    $('.close-btn').click(function(){

        $('.cell_layout_main .cell_layout').hide();

    });

    $('.cell-section').click(function(){
        var str = $( this ).attr("id");
        var section_id = str.replace("section_", "");
        $('#cell_id').val(<?php echo $cellid; ?>);
        $('#section_id').val(section_id);
        $('#sectionModal').modal('show');
    });
</script>

 
  <script type="text/javascript">
   /* $('#playButton').hide();
       $('#myCarousel').carousel({
        interval:2000,
        pause: "false"
    });*/
 // $('#playButton').hide();
 //    $('#playButton').click(function () {
 //        $('#myCarousel').carousel('cycle');
 //          $('#playButton').hide();
 //          $('#pauseButton').show();
 //    });
 //    $('#pauseButton').click(function () {
 //        $('#myCarousel').carousel('pause');
 //         $('#pauseButton').hide();
 //         $('#playButton').show();
 //    });

  </script>
<style type="text/css">
  #cellCarousel .carousel-indicators .active{
    background-color: #E0EABB;
  }

  #cellCarousel .carousel-indicators li{
    border-color: #E0EABB;
  }
</style>
