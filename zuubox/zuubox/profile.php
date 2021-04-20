<?php 
if(isset($_SESSION['user_id']))
{

}
else
{
    session_start();
}
?>

<?php
require_once("include/config.php");
require_once("include/functions.php");

$user = new User();

date_default_timezone_set('Asia/Calcutta'); 

// $user = new User();
$uid=$_SESSION['user_id'];
if (isset($_POST['id']) && isset($_POST['url'])) 
{
    $page=$_POST['id'];
    $url=$_POST['url'];

    $pageurl=$url.'#'.$page;

    $add_date=date('Y-m-d');
    $add_time=date('h:i',time());       
    $visituser=$user->insert_records('visit_pages',array('user_id' =>$uid,'page_name'=>$pageurl,'add_date'=>$add_date,'add_time'=>$add_time ));

}

// $uid=$_SESSION['user_id'];

$uid= !empty($_REQUEST['id'])?$_REQUEST['id']:$_SESSION['user_id'];

$cells = $user->select_allrecords('tbl_cell','*');

$avitors = $user->select_allrecords('tbl_avitor','*');

$photogallary = $user->select_allrecords('tbl_photo_gallary','*');

$cities = $user->select_allrecords('tbl_places','*');

$where = "user_id = ".$uid;
$imgdeatil=$user->select_records('tbl_photo_gallary','*',$where);

$u_wh = "id=".$uid;
$user_avitor = $user->select_records('tbl_singup','*',$u_wh);


foreach ($user_avitor as $avi_rows) {
    //$u_avitor = $rows['avitor_image'];
}

/*--- total cell --*/
$cells = $user->select_allrecords('tbl_cell','*');
$where = "id=".$uid;
$fields="*";
$table="tbl_singup";
$data=$user->select_records($table,$fields,$where);

foreach ($data as $rows) {
}
//echo "<pre>";print_r($rows);die;

$cell_id = $rows['cell_id'];
$where="cell_id in(".$cell_id.")";

    $fields="*";
    $table="tbl_cell";
    /*-- select registraion time cell --*/
    $datacell=$user->select_records($table,$fields,$where);

if(isset($_POST['photogallary']))
{
    if(isset($_FILES['photo']['name']))
    {
        echo $photos=$_FILES['photo']['name'];
    }
}

?>
<link rel="stylesheet" href="css/profile.css">
<link rel="stylesheet" href="css/avitor.css">
<link rel="stylesheet" href="css/photo_gallary.css">
<link rel="stylesheet" href="css/add_photo_gallary.css">
<link rel="stylesheet" href="css/profilevideopop.css">
<link rel="stylesheet" href="css/profileaudiopop.css">

<script src="js/jquery.flipster.min.js"></script>

<link rel="stylesheet" href="dist/assets/owl.carousel.min.css">  
<link rel="stylesheet" href="dist/assets/owl.theme.default.css">  


 <form class="profile edit userp1 profilepop1" method="post" enctype="multipart/form-data" style="z-index: 999; position: absolute; top: 20px; /*height: auto;*/ overflow-y: scroll; margin: auto; right: 0%; left: 0;width: 78%;  height:806px!important;">
    <div style="background-color: #fff;">
        <img src="img/profile_head.png" class="img-responsive profile-head headerimg">
    <div class="window-btn window-btn2" style="    position: absolute;
    top: 0;
    right: 5px;
    background: #fff;">
        <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window-pro"></button>
        <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window-pro"></button>
        
        <button type="button" class="fa fa-window-maximize-pro" style="display: none;" aria-hidden="true"></button>
        <button type="button" class="fa fa-times" aria-hidden="true" title="Close" id="close-window-pro"></button>
    </div>
    </div>
    
    <div class="profileinner-sec" style="overflow-y: scroll;
    /*height: 482px;*/
     /*height: auto; */
     height:806px!important;
    padding-top: :0px;
    padding-right: 25px;
    padding-left: 25px;
    padding-bottom: 5px;
   /* margin-top: -41px;*/
    margin-top: -98px;
    background: #fff;">
        <!-- <div class="padding1"></div> -->
            <div class="post-viwe" style="margin-bottom: 0px;">         
                <div class="row user-box">
                
                    <span id="profileview">
                    <div class="col-xs-3 ">
                      <div class="border">
                        <?php if(!empty($rows['profile_path'])){?>
                        <img src="<?php echo $rows['profile_path'];?>" class="img-responsive">
                       <?php } else {?>
                        <img src="uploads/profile.png" class="img-responsive">
                       <?php } ?>
                      </div>    
                    </div>
                    <div class="col-xs-6">
                        <div class="row user-info border">
                            <h3><h3><?php echo $rows['username'];?></h3></h3>
                            <label class="col-xs-6" >
                                <?php if($_SESSION['user_id'] == $uid ) { ?>
                                <input type="checkbox" class="" name="is_firstname_visible" id="is_firstname_visible" <?php if($rows['is_firstname_visible'] =='1'){ echo 'checked'; } else { echo 'unchecked';}?> > 
                                <?php } ?>
                                Name <span><?php echo $rows['first_name']?></span></label>

                            <label class="col-xs-6">
                                <?php if($_SESSION['user_id'] == $uid ) { ?>
                                <input type="checkbox" class="" name="is_lastname_visible" id="is_lastname_visible" <?php if($rows['is_lastname_visible'] =='1'){ echo 'checked'; } else { echo 'unchecked';}?> >
                                <?php } ?>
                                 Sure name - Given name <span><?php echo $rows['last_name']?></span></label>
        
                            <label class="col-xs-3"> 

                                <?php if($_SESSION['user_id'] == $uid ) { ?>
                                <input type="checkbox" class="" name="is_age_visible" id="is_age_visible" <?php if($rows['is_age_visible'] =='1'){ echo 'checked'; } else { echo 'unchecked';}?> >
                                <?php } ?>

                                age  <span>
                                <?php
                                     $dob=$rows['dob'];
                                     
                                
                                    $today = date("Y-m-d");
                                    $diff = date_diff(date_create($dob), date_create($today));
                                    echo $diff->format('%y');
        
                                ?>
        
                             </span> </label>
                            <label class="col-xs-3"> 
                                <?php if($_SESSION['user_id'] == $uid ) { ?>
                                <input type="checkbox" class="" name="is_gender_visible" id="is_gender_visible" <?php if($rows['is_gender_visible'] =='1'){ echo 'checked'; } else { echo 'unchecked';}?> >
                                <?php } ?>
                                 Gender  <span><?php echo $rows['gender']?> </span> </label>
                            <label class="col-xs-3"> 
                                <?php if($_SESSION['user_id'] == $uid ) { ?>
                                <input type="checkbox" class="" name="is_height_visible" id="is_height_visible" <?php if($rows['is_height_visible'] =='1'){ echo 'checked'; } else { echo 'unchecked';}?> >
                                <?php } ?>
                                 height  <span><?php echo $rows['height']?> </span> </label>
                            <label class="col-xs-3"> 
                                <?php if($_SESSION['user_id'] == $uid ) { ?>
                                <input type="checkbox" class="" name="is_weight_visible" id="is_weight_visible" <?php if($rows['is_weight_visible'] =='1'){ echo 'checked'; } else { echo 'unchecked';}?> >
                                <?php } ?>
                                 weight <span><?php echo $rows['weight'].'lb'?></span> </label> 
        
                            <label class="col-xs-12">
                              <?php if($_SESSION['user_id'] == $uid ) { ?>  
                             <input type="checkbox" class="" name="is_profession_visible" id="is_profession_visible" <?php if($rows['is_profession_visible'] =='1'){ echo 'checked'; } else { echo 'unchecked';}?> > 
                             <?php } ?>
                             Profession <span><?php echo $rows['profession']?></span></label>
                            <label class="col-xs-4"> 
                                <?php if($_SESSION['user_id'] == $uid ) { ?>
                                <input type="checkbox" class="" name="is_city_visible" id="is_city_visible" <?php if($rows['is_city_visible'] =='1'){ echo 'checked'; } else { echo 'unchecked';}?> >
                                <?php } ?> 
                                State <span><?php echo $rows['city']?></span> </label>
                            <label class="col-xs-4"> 
                                <?php if($_SESSION['user_id'] == $uid ) { ?>
                                <input type="checkbox" class="" name="is_othercity_visible" id="is_othercity_visible" <?php if($rows['is_othercity_visible'] =='1'){ echo 'checked'; } else { echo 'unchecked';}?> > 
                                <?php } ?>
                                City <span><?php echo $rows['other_city']?></span> </label>
                            <label class="col-xs-4"> 
                                <?php if($_SESSION['user_id'] == $uid ) { ?>
                                <input type="checkbox" class="" name="is_country_visible" id="is_country_visible" <?php if($rows['is_country_visible'] =='1'){ echo 'checked'; } else { echo 'unchecked';}?> > 
                                <?php } ?>
                                Country  <span><?php echo $rows['country']?></span> </label>
                            <?php if($_SESSION['user_id'] == $uid ) { ?>
                            <label class="col-xs-12">
                                <input type="checkbox" class="flageDatail" name="flage" id="flage" <?php if($rows['flage'] =='1'){ echo 'checked'; } else { echo 'unchecked';}?> >
                                <span> If you want to hide your parsonal detail so please check checkbox.</span> 
                            </label>
                            <?php } ?>
                        </div>

                    </div>
                </span>
                    <div class="col-xs-3">
                        <div class="row inner-psec1">                        

                            <div class="col-xs-4">
                                
                                <div class="border aviator">
                                    <h4>Avator</h4>
                                    <?php if($_SESSION['user_id'] == $uid ) { ?>
                                        <a href="#" class="btn_avitor_edit">Edit</a>
                                    <?php } else { ?>
                                        <a href="#" class="btn_avitor_edit">Vote</a>
                                    <?php } ?>
                                </div>
                               
                                 
                                 <!--    <?php if($_SESSION['user_id'] != $uid ) { ?>
                                     <div class="border aviator">
                                        <a href="#" class="btn_avitor_edit">Add as Friend</a>
                                       </div>

                                         <div class="border aviator">
                                         <a href="#" class="btn_avitor_edit">Send Message</a>
                                         </div>
                                    <?php } ?>      -->
                                    
                                
                                
                            </div>
                            <div class="col-xs-4 " style="margin-left: 2px;">
                              <div class="border">
                                <?php if(!empty($rows['avitor_image'])){?>
                                <img src="<?php echo $rows['avitor_image'];?>" class="img-responsive">
                               <?php } else {?>
                                <img src="uploads/profile.png" class="img-responsive">
                               <?php } ?>
                              </div>    
                            </div>
                            <?php if($_SESSION['user_id'] != $uid ) { ?>
                            <div class="col-xs-8">
                                <div class="addf1">
                                    <!-- <div class="btn" style="display: block;"><a href="#">Add</a> As friend</div> -->
                                    <a href="#" id="MSG_<?php echo $uid; ?>" style="font-size:11px; border:1px solid #000; display: block; margin-bottom: 5px; color:green; padding:5px;" class="msgtofriend">Send Message </a>
                                    <!-- <input type="submit" value="Send Message"> -->
                                </div>
                            </div>
                            <?php } ?>    
                        </div>
                        <!--<div class="border aviator">
                            <h4>Avator</h4>
                            <a href="#" class="btn_avitor_edit">Edit</a>
                        </div>-->           
        
        
                        <div class="border aviator">
                          <h4>Photo gallary</h4>
                          <a href="#" class="btn_photo_gallary">View</a>
                        </div>
                        
                        <?php if($_SESSION['user_id'] != $uid ) { ?>                            
                        <br>
                        <div class="border aviator">
                          <h4>Friend gallary</h4>
                          <a href="#" id="<?php echo $rows['id'];?>" class="allFriend">View</a>
                        </div>
                        <?php } ?>


                        <?php if($_SESSION['user_id'] == $uid ) { ?>

                        <div class="border aviator inline"> 
                          <a href="#" class="" id="btn_edit_profile">Edit</a>
                        </div>
                        <?php } ?>

                    </div>
        
        <!-- ########## - - Avitor Edit ###### --> 
            <div class="">
                <div class="profile_avitor_edit profile_avitor_edit2">
                    <!-- <div class="avator1"> -->
                        <div class="avator-head">
                            <img src="img/avator_header.png" class="img-responsive">
                        </div>
                        <button type="button" class="close-btn-sub pull-right">x</button>
                        <div class="info info-gallery"> 
                            <img src="img/avator_back.png" class="backimg1">
                            <div class="row">
                                <div class="col-xs-6">
                                    <div class="row avator-row">
                                        <!--<h4>Avitor List</h4>-->
                                        <div class="col-xs-2 avator-col"> 
            
                                      <?php
                                        $avi_count=count($avitors);  
                                        if (!empty($avitors)) {
                                                                                 
                                        foreach($avitors as $avitorsdata)
                                        {
                                            for($i=1; $i <= 1; $i++)
                                            {
        
                                             echo "
                                             <label><input type='radio' name='avitor_image' value='".$avitorsdata['avitor_image']."' id='".$avitorsdata['id']."' class='aimg hidden'> ";    
        
                                            echo "<img src='".$avitorsdata['avitor_image']."'  class='img-responsive'> </label>";   
            
                                            if(($avi_count % $i) == 0) {    
                                                echo "</div>";
                                                echo "<div class='col-xs-2 avator-col'>";
                                                }
                                            }
                                        }
                                    }
                                    ?>   
            
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <input type="button" value="Submit" name="update_avitor" class="save update_avitor" >
                                    </div> 
                                </div>
                                <div class="col-xs-6">
                                    <div class="row">
                                        <!--<h4 class="text-center">Select Avitor</h4>-->
                                        <div class="selectavitor">
                                            <?php  
                                            //if (!empty($avitors)) {                          
                                            //    foreach($avitors as $avitorsrow)
                                            //    {
                                
                                                echo "<div class='img-box'><img src='".$avi_rows['avitor_image']."' class='img-responsive'> </div>";
                                                /*echo "<br><br>";
                                                echo "Avitor Name:".$avi_rows['avitor_name']."";
                                                
                                                echo "<br>";
                                                echo "Avitor Add Date:".$avi_rows['add_date']."";
                                                echo "<br>";
                                                echo "<h4>Info :</h4><p> ".$avi_rows['avitor_info']."</p>";
                                           */// }
                                        //}
                                        //echo "<p> ".$u_avitor."</p>";
                                            ?>
            
                                        </div>
                                    </div>
                                </div>
                            </div>
                                    
                        </div>
                   <!--  </div> -->
                </div>
            </div>
        
                <script type="text/javascript">
                    
                    $(".aimg").on('change', function(){ 
                    
                    var avitorid=$(this).attr('id'); 
                        $.ajax({
                        type:"POST",
                        url:"avitor_select_action.php",
                        data:{avitorid:avitorid},
                        success:function(result){
                            
                        $(".selectavitor").html(result); 
                
                        }
                       });
                
                    });
                </script>
        
                <script type="text/javascript">
                    
                    $('.update_avitor').click(function(){   
        
                        var avitorimg = $("input[name='avitor_image']:checked").val();
                        confirm('Are you sure update avitor image');
            
                        $.ajax({
                        type:"POST",
                        url:"update-avitor.php",
                        data:{avitorimg:avitorimg},
                        success:function(result){
                            
                       alert('Add update avitor image successfully');
                
                        }
                       });
        
        
                    });
                    
                    
                </script>
        
        
        
        <!-- ############ Add Photo #######- - -->
            <div class="">
                <div class="photo_gallary_add">
                    <button type="button" class="close-btn-sub pull-right">x</button> 
                    <div class="row">
                        
                       <div class="col-xs-6"> 
        
                            <label for="photogallary" class="custom-file-upload" style="margin: 0px">
                                <i class="fa fa-cloud-upload"></i> New Photo
                            </label>
                        </div>
                       
                        <br>
                        <div class="col-xs-6" style="margin-top: -14px;">
                           <input id="photogallary" type="file" name="photogallary"  onchange="Newphoto(this);"/>   
                           <img id="newphoto" src="img/user.png"  class="img-responsive" height="100px" width="100px" />
                        </div>
                       
        
                        <script type="text/javascript">
                            function Newphoto(input) {
        
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
        
                                reader.onload = function (e) {
                                    $('#newphoto').attr('src', e.target.result);
                                }
        
                                reader.readAsDataURL(input.files[0]);
                            }
                        }
        
                            $("#photogallary").change(function(){
                                readURL(this);
                            });
                        </script>
                        
                        <div class="col-xs-12">             
                            <label for="photo"> Photo Information</label>
                        </div>
                        <div class="col-xs-12"> 
                            <textarea type="text" name="photoinfo" id="photoinfo" rows="5" style="width: 500px;"></textarea>
                        </div>    
        
        
                        <div class="col-xs-12">
                            <button type="button" name="addimages" class="addimages">Submit</button>
                        </div> 
                </div>
            </div>  
        </div>
        
        
        <!--################# - - Photo Gellary- - ###########-->
            <div class="">
            
                <div class="profile_photo_gallary profile_photo_gallary2 photog1">
                        <div class="month_title">
                              <img src="img/gallery_header.png" class="img-responsive">
                              <div class="user-head">
                                    
                               </div>
                            </div>
                        <button type="button" class="close-btn-sub pull-right">x</button>
                        <div class="info">
                            <div class="row">
                            <div class="col-xs-12">
                                <div class="mb-5">
                                    <button type="button" id="addphoto" class="btn btn-info">Add Photo</button> 
                                    <div class="imgpop1" id="imgpop1">
                                        <img src="uploads/Photo-Gallary/1521614298302648110.jpg">
                                        <i class="fa fa-times-circle" aria-hidden="true"></i>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xs-6">   

                                <div class="row" id="photogallaryview">
                                    <div class="col-xs-2 pg-main">                                    
                                        <!-- <i class='fa fa-trash delete-btn2' id="<?php echo $photogallary['0']['id'];?>"></i> -->
                                        <?php
                                                        
                                            if (!empty($photogallary)) {
                                                    
                                            $photo_count=count($photogallary);
                                            
                                            foreach($photogallary as $photogallary)
                                                    {
                                                         for($i=1; $i <= 1; $i++){  
            
                                                        echo "<label><i class='fa fa-trash delete-btn2' id='".$photogallary['id']."'></i><img src='".$photogallary['photo_path']."' id='".$photogallary['id']."' class='imggallary img-responsive sm-img'> </label>";   
            
                                                    if(($photo_count % $i) == 0) {  
                                                    
                                                        echo "</div><div class='col-xs-2 pg-main'></i>";
                                                        }
                                                    }
                                                }
                                            }
                                                ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="row">
                                    <div class="photoshow">
                                        <?php
                                        if (!empty($imgdeatil)) {
                                            # code...
                                        
                                            foreach ($imgdeatil as $data) {
                                                    $imgpath=$data['photo_path'];
                                                    $add_date=$data['add_date'];
                                                    $photo_info=$data['photo_info'];
                                                    
            
                                                echo "<div class='img-box'> <img src='".$imgpath."' class='img-responsive' ></div>";
                                                        
            
                                                echo "<h4>Photo Gallary</h4>";
                                                    $imgname=explode('/', $imgpath);
            
                                                echo "Image Name: ".$imgname[2]."";
                                                echo "<br>";
                                                echo "Add Date : ".$add_date."";
                                                echo "<br>";
                                                echo "<h4>Info :</h4><p> ".$photo_info."</p>";
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>  
                            <div class="corner1_main">
                                <div class="corner1">
                                                <!--<div class="green"></div>
                                                <div class="black"></div>-->
                                                <img src="img/gallery_corner.png">
                                            </div>
                             </div>
                        </div>
                </div>
            </div>
            <!-- ########## insert photo - -######-->

        
                    <script type="text/javascript"> 
                            $('.addimages').click(function(){
        
                                var filename = $('#photogallary').val();
                                if(filename!="")
                                {
                                
                                var checkprocess = confirm("Are yor sure upload photo");
        
                                if(checkprocess == true)
                                {
        
                                    var photoinfo = $('textarea#photoinfo').val();
        
                                    var file_data = $('#photogallary').prop('files')[0]; 
                                    
                                    var photo = $(this).attr('photogallary');
        
                                    var form_data = new FormData();  
        
                                        form_data.append('photoinfo', photoinfo);
                                        form_data.append('file', file_data);                                                                    
        
                                    $.ajax({
                                        url: "photo_gallary_action.php",
                                        type: "POST",
                                        data:  form_data,
                                        contentType: false,
                                        cache: false,
                                        processData:false,
                                        success: function(data){    
                                        alert("Photo add successfully");                   
                                        $("#photogallaryview").html(data); 
                                        $('.photo_gallary_add').hide();
                                        $('.profile_photo_gallary').show();
                                        $('#photogallary').val('');
                                        $('#photoinfo').val('');                                
                                        $('#newphoto').attr('src', 'img/user.png');
                                                           
                                        }
                                    });
                                }
                                else
                                {
                                    //$('.photo_gallary_add').hide();
                                    $('#photogallary').val('');
                                    $('#photoinfo').val('');                                
                                    $('#newphoto').attr('src', 'img/user.png');
                                }   
                            }
                            else
                            {
                                alert('Please select photo');
                            }
                            });
                        </script>
                        <!-- ########## click on  photo  show details- -######-->
        
                        <script type="text/javascript">
                            $('.imggallary').click(function(){
                                var imgid=$(this).attr('id'); 
                                //alert(imgid);
                                $.ajax({
                                     type:"POST",
                                    url:"photo_gallary_action.php",
                                    data:{imgid:imgid},
                                    success:function(result){                               
                                    //alert(result);
                                    $(".photoshow").html(result);                             
                                    }
                                    });
                 
                            });
                        </script>
        
                
        
        <!-- - Profile Edit ###### --> 
        
                        <div class="">
                            <div class="upper profile_edit" >
        
                                <button type="button" class="close-btn-sub pull-right">x</button>
                                    <?php if(isset($successmsg))
                                    {
                                        echo "<div class='alert alert-success'>";
        
                                    echo "<div class='alert alert-success alert-dismissable'>";
                                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                            echo $successmsg;
                                        echo "</div>";
                                        
                                    }
                                    if(isset($errormsg))
                                    {
                                            echo "<div class='alert alert-danger alert-dismissable'>";
                                    echo "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>";
                                        echo $errormsg;
                                        echo "</div>";
                                    }
                                    ?>
        
                                <div class="basic_info">
                                <div class="sect_title">
                                        Profile 
                                    </div>
                                    <div class="col-xs-3">
                                    <div class="photo profile_pic" style="background-image: url('<?php echo $rows['profile_path']?>');" id="blah" >                                                         
                                    <div class="button_container">
                                        <input type="hidden" name="profile_pic_saved" value="">
                                        <div class="edit profile_pic" >
                                            Upload  <input type="file" name="profile_pic" accept="image/*"  onchange="readURL(this);" value="<?php echo $rows['profile_path'];?>" style="display: block;" id="profile_pic">                     
                                        </div>
                                    </div>
                                </div>
                                </div> 
                            <div class="col-xs-9 box-weight">
                                <div class="row">                   
                                    <div class="col-xs-12">
                                        <div class="col-xs-4">
                                          <div class="input-group">
                                            <span class="input-group-addon">Surname/Family name</span>
                                            <input type="text" value="<?php echo $rows['last_name']?>" name="last_name" id="lastname" class="form-control"  >
                                          </div>
                                        </div> 
                                        <div class="col-xs-8">
                                            <div class="col-xs-6">
                                              <div class="input-group">    
                                                <span class="input-group-addon">Given Name</span>
                                                <input type="text" value="<?php echo $rows['first_name']?>" name="first_name" id="first_name" class="form-control">
                                              </div>
                                            </div> 
                                            <div class="col-xs-6">
                                              <div class="input-group"> 
                                                <span class="input-group-addon">User Name</span>
                                                <input type="text" value="<?php echo $rows['username']?>" name="username" id="username" class="form-control">
                                              </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row"> 
                                    <div class="col-xs-12">  
                                        <div class="col-xs-3">
                                            <div class="input-group">  
                                                <span class="input-group-addon">Date Of Brith</span>
                                                <input type="text" value="<?php echo $rows['dob']?>" name="dob" id="datetime" class="form-control">
                                            </div>
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class="input-group">      
                                                <span class="input-group-addon">Gender</span>
                                                <select name="gender" class="form-control" id="gender">
                                                <option value="<?php echo $rows['gender']?>"><?php echo $rows['gender']?> </option>
                                                <option  value="Male">Male</option>
                                                <option  value="Female">Female</option>
                                                </select>
                                            </div>
                                        </div> 
                                        <div class="col-xs-3">
                                          <div class="input-group"> 
                                            <span class="input-group-addon">Height</span>
                                            <select name="height" class="form-control" id="height">
                                            <option value="<?php echo $rows['height']?>"><?php echo $rows['height']?> </option>  >
                                            <option value="95">7' 11"</option>
                                            <option value="94">7' 10"(239cm)</option>
                                            <option value="93">7' 9"</option>
                                            <option value="92">7' 8"(234cm)</option>
                                            <option value="91">7' 7"</option>
                                            <option value="90">7' 6"(229cm)</option>
                                            <option value="89">7' 5"</option>
                                            <option value="88">7' 4"(224cm)</option>
                                            <option value="87">7' 3"</option>
                                            <option value="86">7' 2"(218cm)</option>
                                            <option value="85">7' 1"</option>
                                            <option value="84">7'(213cm)</option>
                                            <option value="83">6' 11"</option>
                                            <option value="82">6' 10"(208cm)</option>
                                            <option value="81">6' 9"</option>
                                            <option value="80">6' 8"(203cm)</option>
                                            <option value="79">6' 7"</option>
                                            <option value="78">6' 6"(198cm)</option>
                                            <option value="77">6' 5"</option>
                                            <option value="76">6' 4"(193cm)</option>
                                            <option value="75">6' 3"</option>
                                            <option value="74">6' 2"(188cm)</option>
                                            <option value="73">6' 1"</option>
                                            <option value="72">6'(183cm)</option>
                                            <option value="71">5' 11"</option>
                                            <option value="70">5' 10"(178cm)</option>
                                            <option value="69">5' 9"</option>
                                            <option value="68">5' 8"(173cm)</option>
                                            <option value="67">5' 7"</option>
                                            <option value="66">5' 6"(168cm)</option>
                                            <option value="65">5' 5"</option>
                                            <option value="64">5' 4"(163cm)</option>
                                            <option value="63">5' 3"</option>
                                            <option value="62">5' 2"(157cm)</option>
                                            <option value="61">5' 1"</option>
                                            <option value="60">5'(152cm)</option>
                                            <option value="59">4' 11"</option>
                                            <option value="58">4' 10"(147cm)</option>
                                            <option value="57">4' 9"</option>
                                            <option value="56">4' 8"(142cm)</option>
                                            <option value="55">4' 7"</option>
                                            <option value="54">4' 6"(137cm)</option>
                                            <option value="53">4' 5"</option>
                                            <option value="52">4' 4"(132cm)</option>
                                            <option value="51">4' 3"</option>
                                            <option value="50">4' 2"(127cm)</option>
                                            <option value="49">4' 1"</option>
                                            <option value="48">4'(122cm)</option>
                                            </select>
                                          </div>
                                        </div> 
                                        <div class="col-xs-3">
                                          <div class="input-group">
                                            <span class="input-group-addon">Weight</span>
                                            <select name="weight" class="form-control" id="weight">
                                            <option value="<?php echo $rows['weight']?>"><?php echo $rows['weight']?> </option>
                                             <?php for($i=300; $i>=40; $i-- ){?>
                                                <option value="<?php echo $i; ?>">
                                                <?php echo $i; ?>lb (<?php echo $i/2; ?>kilo)</option>
                                             <?php } ?>
                                                 
                                            </select>
                                          </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row"> 
                                    <div class="col-xs-12"> 
                                        <div class="col-xs-3">
                                          <div class="input-group">
                                            <span class="input-group-addon">Profession</span>
                                            <input type="text" value="<?php echo $rows['profession']?>" name="profession" class="form-control" id="profession">
                                          </div>
                                        </div> 
                                        <div class="col-xs-3">
                                          <div class="input-group">
                                            <span class="input-group-addon">City</span>
                                            <input type="text" value="<?php echo $rows['city']?>" name="city" class="form-control" id="city">
                                          </div>
                                        </div> 
                                        <div class="col-xs-3">
                                          <div class="input-group">
                                            <span class="input-group-addon">Country</span>
                                            <input type="text" value="<?php echo $rows['country']?>" name="country" class="form-control" id="country"> 
                                          </div>
                                        </div> 
                                        <div class="col-xs-3">
                                          <div class="input-group">
                                            <span class="input-group-addon">Phone number</span>
                                            <input type="text" value="<?php echo $rows['phoneno']?>" name="phoneno" class="form-control" id="phoneno">
                                          </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row"> 
                                    <div class="col-xs-12"> 
                                        <div class="col-xs-3">
                                            <div class="input-group">
                                                <span class="input-group-addon">Email</span>
                                                <input type="email" value="<?php echo $rows['email']?>" name="email" class="form-control" id="email">
                                            </div>
                                        </div> 
                                        <div class="col-xs-3">
                                            <div class="input-group">
                                                <span class="input-group-addon">Confirm</span>
                                                <input type="email" value="<?php echo $rows['email']?>" name="email_confirm" class="form-control" id="email_confirm">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="buttons">
                                    <!-- <input type="submit" value="Submit" name="update_profile" class="save" > -->
                                    <button type="button" name="update_profile" id="update_profile"> Submit</button>
                                </div>
                            </div>      
                        </div>
                    </div> 
                </div>  
                <script type="text/javascript"> 
                            $('#update_profile').click(function(){  
        
                                var last_name = $('#lastname').val();
                                var first_name = $('#first_name').val();
                                var username = $('#username').val();
                                var datetime = $('#datetime').val();        
        
                                var gender = $('#gender').val();
                                var height = $('#height').val();
                                var weight = $('#weight').val();
                                var profession = $('#profession').val();
        
                                var city = $('#city').val();
                                var country = $('#country').val();
                                var phoneno = $('#phoneno').val();
                                var email = $('#email').val();
                                var email_confirm = $('#email_confirm').val();
                                
        
                                var file_data = $('#profile_pic').prop('files')[0]; 
                                
                                var photo = $(this).attr('profile_pic');
                                var form_data = new FormData();  
        //alert(photo);
                                    form_data.append('profile_pic', file_data);
        
                                    form_data.append('last_name', last_name);
                                    form_data.append('first_name', first_name);
                                    form_data.append('username', username);
                                    form_data.append('datetime', datetime);
        
                                    form_data.append('gender', gender);
                                    form_data.append('height', height);
                                    form_data.append('weight', weight);
                                    form_data.append('profession', profession);
        
                                    form_data.append('city', city);
                                    form_data.append('country', country);
                                    form_data.append('phoneno', phoneno);
                                    form_data.append('email', email);
                                    form_data.append('email_confirm', email_confirm);
                                    form_data.append('updateinfo', 'updateinfo');      
                                
        
                                $.ajax({                            
                                    url: 'update-profileajax.php', 
                                    dataType: 'text',  
                                    cache: false,
                                    contentType: false,
                                    processData: false,
                                    data: form_data,                         
                                    type: 'post',
        
                                    success: function(data){  
        
                                        //alert(data);
                                    alert("Profile update successfully");    
                                   
                                    $("#profileview").html(data); 
                                    $(".profile_edit").hide();                      
                                                       
                                    }
                                });
                            });
                        </script>
            </div> 
        </div>
        <!-- video pop -->
            <div class="">
                <div class="profile_video_pop">
               <!-- <div class="window-btn window-btn2">
                     <button type="button" class="fa fa-window-minimize" aria-hidden="true" title="Minimize" id="minimize-window"></button> --
                    <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window" style="margin-right: 25px;"></button>
                    <button type="button" class="fa fa-window-maximize" aria-hidden="true" style="margin-right: 25px;"></button>
                     <button type="button" class="fa fa-times " aria-hidden="true" title="Close" id="close-window"></button>            
                </div>-->
        
                <div class="window-btn window-btn2" style="margin-right: 25px;">
                    <button type="button" class="fa fa-window-restore" aria-hidden="true" title="Restore" id="restore-window" ></button>
                    <button type="button" class="fa fa-expand" aria-hidden="true" title="Restore" id="restore-window" onclick="goFullscreen('player1'); return false"></button>
        
                    <button type="button" class="fa fa-window-maximize" aria-hidden="true" onclick="videomaximize()";></button>      
                </div>      
                    <button type="button" class="close-btn-sub pull-right">x</button>
                    
                    <div class="row">               
                        <div id="playprofilevideo" align="center">
                        </div>       
                    </div>          
                </div>
            </div>
        <!-- Audio pop-->
            <div class="">
                <div class="profile_audio_pop">
                    <button type="button" class="close-btn-sub pull-right">x</button>       
                        <div class="row">                      
                        <div id="playprofileaudio" align="center">
                            <div class="playaudio">       
                            </div>               
                        </div>     
                        </div>      
                </div>
            </div>
        <div class="audio-video text-left">
            <div class="video">
                <div class="col-xs-12" style="max-height: 277px;"> 
                    <h3>Video</h3>
                    <!-- Add video -->
                    <label for="profilevideo" class="custom-file-upload"><!--<i class="fa fa-cloud-upload"></i>--> Add<img src="img/add.png"></label>
                    <input id="profilevideo" type="file" />  
                     <!-- Add video -->
                     <!-- /////////////////////////VIDEO///////////////////////-->    
                    <div class="addvideo" id="profilevs">                
                        <article id="demo-default" class="demo">
                            <div id="coverflow">
                                <ul class="flip-items">
                                <?php  
                                 $profilevideo=$user->select_allrecords('tbl_slidervideo','*');
                                    if(!empty($profilevideo) > 0)
                                    {
                                      for($i=0;$i<count($profilevideo);$i++)
                                       {    
                                ?>
                                    <li data-flip-title="Red">
                                         <a class="delete-btn fa fa-trash" id="<?php echo $profilevideo[$i]['slide_id']?>"></a> 
                                        <span  onclick="playprofilevideo(this.id)" id="<?php echo $profilevideo[$i]['slide_id']?>" class="profilev">
                                        <video  src="<?php echo $profilevideo[$i]['video_path']?>" class="slidervideo" id="<?php echo 'player'.$i;?>" style='width: 30%!important;'></video> 
                                    </span>
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
        
                    <div class="audio" id="profileaudioslider" >     
                        <h3>Audio</h3>        
                        <label for="profileaudio" class="custom-file-upload" style="width: 70px;">Add</label>
        
                        <input id="profileaudio" type="file" />    
                            <?php          
                                $audioslider=$user->select_allrecords('tbl_profile_audio','*');
                            ?>      
                            <article id="demo-default2" class="demo">            
                                <div id="coverflow2">
                                    <ul class="flip-items">
                                    <?php   if(!empty($audioslider))
                                        {
                                            for($i=0;$i<count($audioslider);$i++)
                                            {    
                                                $audiopath=$audioslider[$i]['audio_path'];
                                                $audionm=explode('Audio/', $audiopath);
        
                                                $audioname=$audionm[1];
                                    ?>          
                                        <li data-flip-title="Red">
                                      <a class="delete-audio fa fa-trash" id="<?php echo $audioslider[$i]['id']?>"> </a> 
                                            <span  id="<?php echo $audioslider[$i]['id']?>" class="profile_audio">
        
        
                                             <audio>
                                              <source src="<?php echo $audioslider[$i]['audio_path']?>" type="audio/mp3">
                                             
                                            </audio> 
                                                <img src="uploads/music-512.PNG" class="img-responsive">
        
                                            <?php echo substr($audioname,1,5).'....'.substr($audioname,-3) ;?>
                                            </span>
                                        </li>
                                    <?php
                                            }
                                        }
                                    ?>     
                                               
                                    </ul>
                                </div>
                    
                                <script>
                                    var coverflow = $("#coverflow2").flipster();
                                </script>          
                            </article>               
                    </div>
                </div>  
            </div>
        </div>
        <div class="audio-video text-left">
            <div class="video">
                <div class="col-xs-12">                   
        
                    <div class="audio" id="profileaudioslider">     
                        <h3>Reviews Recommendations</h3>   
                                 
                            <article id="demo-default2" class="demo">            
                                <div id="coverflow2" class="over-x">
                                    
                                    <div class="review-btns show_timeline lemon-brdr pd-all m-all d-inline white-bg pos-rel">
                                        <a href="#" id="1" class="addevent">
                                             <span id="1" usr_id="<?php echo $_SESSION['user_id'];?>" sess_id="">
                                             People
                                            </span>
                                        </a>
                                    </div>
                                    <div class="review-btns show_timeline blue-brdr pd-all m-all d-inline white-bg pos-rel">
                                        <a href="#" id="3" class="addevent" usr_id="<?php echo $_SESSION['user_id'];?>">
                                            <span id="3">
                                                Place
                                            </span>
                                        </a>
                                    </div>          
                                    <div class="review-btns show_timeline red-brdr pd-all m-all d-inline white-bg pos-rel">
                                        <a href="#" id="2" class="addevent" usr_id="<?php echo $_SESSION['user_id'];?>">
                                            <span id="2">
                                                Things
                                            </span>
                                        </a>
                                    </div>     
                                    <div class="review-btns show_timeline yellow-brdr pd-all m-all d-inline white-bg pos-rel">
                                        <a href="#" id="4" class="addevent" usr_id="<?php echo $_SESSION['user_id'];?>">
                                            <span id="4">
                                                Activities
                                            </span>
                                        </a>
                                    </div>     
                                      <!--    -->
                                      
                                   
                                </div>
                            </article>
                                                
                    <div class="people_edit" >
                        <button type="button" class="close-btn-sub pull-right">x</button>

                            <div class="info">
                            <div class="sect soi">
                                <div class="sect_title">
                                  Cell
                                </div> 
                                <div class="col">
                                <?php 
                                    $cellid=array();
                                    foreach($datacell as $row1)
                                        {
                                            $cellid[]=$row1['cell_id'];                     
                                        }
                                ?> 
                                <?php 
                                $n=count($cells);
                                foreach($cells as $row2)
                                {
                                    $id=$row2['id'];
                                    for($i=1; $i <= 1; $i++){?>
                                        <label class="interest" style="display: block;">
                                        <input type="checkbox" name="cell_name[]" value="<?php echo $row2['cell_id']?>" id="cellcheck" <?php if(in_array($row2['cell_id'], $cellid)){echo "checked";}?>>
                                        <?php
                                            echo $row2['cell_name'];
                                            echo "</label>";
                                        ?>  
                                        <?php  if(($n % $i) == 0) {
                                   echo "</div>
                                        <div class='col'>";
                                    } ?>
                                 <?php }
                                }
                                ?> 
                                </div> 
                            </div>   
                            <div class="buttons">
                                <button type="button" value="Submit" name="update_cell" class="save" id="update_cell" >Submit</button>
                                
                            </div>
                        </div>
                    </div>             
                    </div>
                </div>  
            </div>
        </div>

        <div class="info">
            <div class="sect soi">
                <div class="row">
                    <div class="col-xs-9 ">
                        <div class="sect_title">
                           Subjects of interest
                        </div> 
                    </div>
                    <div class="col-xs-3 pull-right">
                        <div class="border aviator pull-right"> 
                          <a href="#" class="btn_info_edit">Edit</a>
                        </div>
                    </div>
                    <div class="info_edit" >
                        <button type="button" class="close-btn-sub pull-right">x</button>
                            <div class="info">
                            <div class="sect soi">
                                <div class="sect_title">
                                  Cell
                                </div> 
                                <div class="col">
                                <?php 
                                    $cellid=array();
                                    foreach($datacell as $row1)
                                        {
                                            $cellid[]=$row1['cell_id'];                     
                                        }
                                ?> 
                                <?php 
                                $n=count($cells);
                                foreach($cells as $row2)
                                {
                                    $id=$row2['id'];
                                    for($i=1; $i <= 1; $i++){?>
                                        <label class="interest" style="display: block;">
                                        <input type="checkbox" name="cell_name[]" value="<?php echo $row2['cell_id']?>" id="cellcheck" <?php if(in_array($row2['cell_id'], $cellid)){echo "checked";}?>>
                                        <?php
                                            echo $row2['cell_name'];
                                            echo "</label>";
                                        ?>  
                                        <?php  if(($n % $i) == 0) {
                                   echo "</div>
                                        <div class='col'>";
                                    } ?>
                                 <?php }
                                }
                                ?> 
                                </div> 
                            </div>   
                            <div class="buttons">
                                <button type="button" value="Submit" name="update_cell" class="save" id="update_cell" >Submit</button>
                                
                            </div>
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col" id="celllist">
                        <?php 
                            $n=count($datacell);
                            foreach($datacell as $row)
                            {
                                $id=$row['id'];
                                 for($i=1; $i <= 1; $i++){?>
                                    <label class="interest" style="display: block;">
                                    
                                    <?php
                                        echo '-'.' '.$row['cell_name'];
                                        echo "</label>";
                                    ?>  
                                    <?php  if(($n % $i) == 0) {
                              
                                } ?>
                                 <?php }
                            }
                         ?> 
                    </div> 
                </div>
            </div>
        
            <script type="text/javascript">
            $('#update_cell').click(function(){
                    
                var cell = [];
                    $.each($("input[name='cell_name[]']:checked"), function(){            
                        cell.push($(this).val());
                    });
                     var cellid = cell.join(", ");
               //alert(cellid);
                     $.ajax({
                       type:"POST",
                      url:"profile_cellupdateajax.php",
                      data:{cellid:cellid},
                      success:function(result){ 
                      alert("Cell update successfully");
                     // alert(result);                
                        $('#celllist').html(result);
                        $('.info_edit').hide();
        
                      }
                    });   
              });
            </script>
        
        
        <!-- ########## - - About Edit ###### --> 
        <div class="sect">
            <div class="buttons">
                <div class="border aviator pull-right"> 
                     <a href="#" class="btn_about_edit">Edit</a>
                </div>
            </div>
            <div class="profile_about_edit">
                <button type="button" class="close-btn-sub pull-right">x</button>
                <div class="info"> 
                    <div class="sect_title">About</div>
                    <textarea class="text" name="bio" id="profile_bio"><?php echo $rows['bio']; ?></textarea>
                    <br>
                    <div class="buttons">
                    <!-- <input type="submit" value="Submit" name="update_bio" class="save" onclick="mypagereload()"> -->
                    <button type="button" value="Submit" name="update_bio" class="save" id="update_profile_bio" >Submit</button>
                    </div>
                </div>
            </div>
            <div class="about">
                <strong>About me</strong>
                <p>
                    <?php echo $rows['bio']; ?>
                </p>
            </div>
        </div>
        
        <script type="text/javascript">
           // $('#update_profile_bio').click(function(){          
             //   var bio = $('#profile_input').val();
           /*
            $('#profile_bio').keyup(function() {

                $("#profile_bio_input").val($("#profile_bio").val());
                var bio = $('#profile_bio_input').val(); 

                    alert(bio); 
            });*/

                $('#update_profile_bio').on('click', function()  { 
                    var bio = $('#profile_bio').val(); 
                    alert(bio); 
                
                $.ajax({
                       type:"POST",
                      url:"profile_bioupdateajax.php",
                      data:{bio:bio},
                      success:function(result){  
                        alert(result);
                        alert("Abouts update successfully");                 
                        $('.about').html(result);
                        $('.profile_about_edit').hide();
        
                      }
                      });   
              });
        </script>
        </div>
    </div>
</form>


<script type="text/javascript">
    
    $("#datetime").datetimepicker({format: 'Y/MM/DD'});
</script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" rel="stylesheet" type="text/css" />

 <script type="text/javascript">
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')                        
                        .css('background-image', 'url(' + e.target.result + ')');
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
</script>

<script src="dist/owl.carousel.js"></script>


<!--- profile vedio show -->
<script type="text/javascript">
    $('.profilev').click(function(){
      var data =$(this).html();
      $('#playprofilevideo').html(data);
       $('#playprofilevideo video').removeClass("profilevideo");
      $('#playprofilevideo video').attr("controls","controls");
      //$('#playprofilevideo video').attr("height","200px");
     // $('#playprofilevideo video').attr("width","200px");  
      $('.profile_video_pop').show();  
    })
</script>
<!--- profile vedio upload -->
<script type="text/javascript">  
    $('#profilevideo').change(function(){
        //alert();
        confirm("Are you sure upload video");
        var file_data = $('#profilevideo').prop('files')[0];   
        var form_data = new FormData();                  
        form_data.append('file', file_data);
        $.ajax({
        url: "profile_video_slider.php",
        type: "POST",
        data:  form_data,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
        alert("Profile video added successfully");
        $('#profilevs').html(data);

        }
        });
    });
 </script>

<!--- Gallary photos delete -->

 <script type="text/javascript">
    $('.delete-btn2').click(function(){
        var id = $(this).attr('id');
        confirm("Do you want to delete this photo");
        $.ajax({
            type:"POST",
            url:"delete-gallary-photos.php",
            data:{photoID:id},
            success:function(result){  
                confirm("delete photo successfully");   
                $("#photogallaryview").html(result);
              }
              });
        });
 </script>

 <!--- profile vedio delete -->

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
                $('#profilevs').html(result);
              }
              });
        });
 </script>
 <!--/////////////////// Audio /////////////////////////-->

<script type="text/javascript">
    $('.profile_audio').click(function(){
        var id = $(this).attr("id");
        $.ajax({
             type:"POST",
            url:"play_profile_audio.php",
            data:{id:id},
            success:function(result){
                $('.profile_audio_pop').show();
               $('.playaudio').html(result);
            }
            });
        });
</script>



 <!--- profile Add Audio upload -->
<script type="text/javascript">  
$('#profileaudio').change(function(){
    confirm("Are you sure upload Audio");
    var file_data = $('#profileaudio').prop('files')[0];   
    var form_data = new FormData();                  
    form_data.append('file', file_data);
    $.ajax({
        url: "profile_audio_slider.php",
        type: "POST",
        data:  form_data,
        contentType: false,
        cache: false,
        processData:false,
        success: function(data){
            alert("Profile audio added successfully");
            $('#profileaudioslider').html(data);
        }
    });
});
</script>

 <!--- profile audio delete -->

<script type="text/javascript">
    $('.delete-audio').click(function(){
        var id = $(this).attr('id');
        confirm("Are you sure delete audio");
        $.ajax({
            type:"POST",
            url:"delete-profile-audio.php",
            data:{audioid:id},
            success:function(result){  
                confirm("delete audio successfully");   
                $('#profileaudioslider').html(result);
              }
              });
        });

    $('.btn_edit_profile').click(function(){
      //$(".btn_edit_profile").on("click",function(e){
  //e.preventDefault();alert();

   $('.profile_edit').show();
   $('.people_edit').hide();
   $('.info_edit').hide(); 
   $('.profile_about_edit').hide();
   $('.profile_avitor_edit').hide(); 
   
});

$('.people_id').click(function(){
    console.log("click");
   $('.people_edit').show();
   $('.info_edit').hide();
   $('.profile_edit').hide();
   $('.profile_about_edit').hide(); 
   $('.profile_avitor_edit').hide(); 
});

$('.btn_info_edit').click(function(){
   $('.info_edit').show();
   $('.people_edit').hide();
   $('.profile_edit').hide();
   $('.profile_about_edit').hide(); 
   $('.profile_avitor_edit').hide(); 
});
$('.btn_about_edit').click(function(){
   $('.profile_about_edit').show();  
   $('.info_edit').hide();
   $('.people_edit').hide();
   $('.profile_edit').hide();
   $('.profile_avitor_edit').hide();
});

$('.btn_avitor_edit').click(function(){
   $('.profile_avitor_edit').show();
   $('.profile_about_edit').hide();    
   $('.info_edit').hide();
   $('.people_edit').hide();
   $('.profile_edit').hide();
});

$('.btn_photo_gallary').click(function(){
   $('.profile_photo_gallary').show();
   $('.profile_avitor_edit').hide();
   $('.profile_about_edit').hide();    
   $('.info_edit').hide();
   $('.people_edit').hide();
   $('.profile_edit').hide();
});

$('#addphoto').click(function(){
    
   $('.photo_gallary_add').show();
   $('.profile_photo_gallary').hide();
   $('.profile_avitor_edit').hide();
   $('.profile_about_edit').hide();    
   $('.info_edit').hide();
   $('.profile_edit').hide();
});

// $('.msgtofriend').click( function(){

//     var u_id = '<?php echo $_SESSION['user_id'];?>';    
//     var f_id =  $(this).attr('id').replace('MSG_','');

//     var url='<?php echo SITEPATH;?>';
//        $.ajax({
//         type:"POST",
//         url:"send_message.php",
//         data:{id:'Updater',url:url,u_id:u_id,f_id:f_id},
//             success:function(result){   
//                 $(".post .profile").hide();    
//                 $(".frdsprofile .profile").hide(); 
//                 $(".sendmsgpop").show();
//                 $(".sendmsgpop #message").css('display','block');
//                 $(".message").html( result );
//         }
//         });


// });
// 

$(document).on("click", '#minimize-window-pro, #close-window-pro', function(){ 
// $('#minimize-window-pro, #close-window-pro').click( function(){
    //alert("dsfsdf");
    $('.profilepop1').hide();
}); 


$('#restore-window-pro').click(function(){
    $('#restore-window-pro').hide();
    $('.fa-window-maximize-pro').show();
    $('.profilepop1').css("max-width","900px");
    $('.profile-head').css("width","88%"); 
    $('.profilepop1').height('100%');
});
$('.fa-window-maximize-pro').click(function(){
    $('.fa-window-maximize-pro').hide();
    $('.fa-window-restore').show();
    $('#restore-window-pro').show();
    $('.profile-head').css("width","88%"); 
    $('.profilepop1').css("max-width","80%"); 

    $('.profilepop1').height('100%');
});


$('.close-btn-sub').click(function(){
    //alert('test');
   $(this).parent().hide();  
});



$('.msgtofriend').click( function(){


    var u_id = '<?php echo $_SESSION['user_id'];?>';    
    var f_id =  $(this).attr('id').replace('MSG_','');

    var url='<?php echo SITEPATH;?>';
       $.ajax({
        type:"POST",
        url:"send_message.php",
        data:{id:'Updater',url:url,u_id:u_id,f_id:f_id},
            success:function(result){   
                $(".post .profile").hide();    
                $(".sendmsgpop").show();
                $(".sendmsgpop #message").css('display','block');
                $(".profilepop1").css('display','none');
                
                $(".message").html( result );
        }
        });


});

$('.allFriend').click(function(){   
   var id = $(this).attr('id');   
    $.ajax({
        type:"POST",
        url:"myfriend.php",
        data:{friend_gallery_id:id},
        success:function(result){ 
            $('.frdsprofile').hide();
            $('.friend').html(result).show();
            $('.friend .profile').css('display','block');
           //$('.playaudio').html(result);
        }
    });
});

</script>



    <script type="text/javascript">

        $("#flage").click(function() {

            if (this.checked){
                var flage = '1';
            } else {
                var flage = '0';
            }
            //alert(flage);
            $.ajax({
               type:"POST",
               url:"profile_ajaxpreference.php",
               data:{flage:flage},        //POST variable name value
               success: function(result){
                    //alert(result);
                    alert('Profile preference saved.');
               }

           }); 
         }); 


        $("#is_firstname_visible").click(function() {

            if (this.checked){
                var flage = '1';
            } else {
                var flage = '0';
            }
            //alert(flage);
            $.ajax({
               type:"POST",
               url:"profile_ajax_firstname_visible.php",
               data:{flage:flage},        //POST variable name value
               success: function(result){
                    
                    //alert(result);
                    alert('Profile preference saved.');
               }

           }); 
         });

        $("#is_lastname_visible").click(function() {

            if (this.checked){
                var flage = '1';
            } else {
                var flage = '0';
            }
            //alert(flage);
            $.ajax({
               type:"POST",
               url:"profile_ajax_lastname_visible.php",
               data:{flage:flage},        //POST variable name value
               success: function(result){
                    
                    //alert(result);
                    alert('Profile preference saved.');
               }

           }); 
         });

        $("#is_age_visible").click(function() {

            if (this.checked){
                var flage = '1';
            } else {
                var flage = '0';
            }
            //alert(flage);
            $.ajax({
               type:"POST",
               url:"profile_ajax_age_visible.php",
               data:{flage:flage},        //POST variable name value
               success: function(result){
                    
                    //alert(result);
                    alert('Profile preference saved.');
               }

           }); 
         });

        $("#is_gender_visible").click(function() {

            if (this.checked){
                var flage = '1';
            } else {
                var flage = '0';
            }
            //alert(flage);
            $.ajax({
               type:"POST",
               url:"profile_ajax_gender_visible.php",
               data:{flage:flage},        //POST variable name value
               success: function(result){
                    
                    //alert(result);
                    alert('Profile preference saved.');
               }

           }); 
         });

        $("#is_height_visible").click(function() {

            if (this.checked){
                var flage = '1';
            } else {
                var flage = '0';
            }
            //alert(flage);
            $.ajax({
               type:"POST",
               url:"profile_ajax_height_visible.php",
               data:{flage:flage},        //POST variable name value
               success: function(result){
                    
                    //alert(result);
                    alert('Profile preference saved.');
               }

           }); 
         });

        $("#is_weight_visible").click(function() {

            if (this.checked){
                var flage = '1';
            } else {
                var flage = '0';
            }
            //alert(flage);
            $.ajax({
               type:"POST",
               url:"profile_ajax_weight_visible.php",
               data:{flage:flage},        //POST variable name value
               success: function(result){
                    
                    //alert(result);
                    alert('Profile preference saved.');
               }

           }); 
         });

        $("#is_profession_visible").click(function() {

            if (this.checked){
                var flage = '1';
            } else {
                var flage = '0';
            }
            //alert(flage);
            $.ajax({
               type:"POST",
               url:"profile_ajax_profession_visible.php",
               data:{flage:flage},        //POST variable name value
               success: function(result){
                    
                    //alert(result);
                    alert('Profile preference saved.');
               }

           }); 
         });

        $("#is_city_visible").click(function() {

            if (this.checked){
                var flage = '1';
            } else {
                var flage = '0';
            }
            //alert(flage);
            $.ajax({
               type:"POST",
               url:"profile_ajax_city_visible.php",
               data:{flage:flage},        //POST variable name value
               success: function(result){
                    
                    //alert(result);
                    alert('Profile preference saved.');
               }

           }); 
         });

        $("#is_othercity_visible").click(function() {

            if (this.checked){
                var flage = '1';
            } else {
                var flage = '0';
            }
            //alert(flage);
            $.ajax({
               type:"POST",
               url:"profile_ajax_othercity_visible.php",
               data:{flage:flage},        //POST variable name value
               success: function(result){
                    
                    //alert(result);
                    alert('Profile preference saved.');
               }

           }); 
         });

        $("#is_country_visible").click(function() {

            if (this.checked){
                var flage = '1';
            } else {
                var flage = '0';
            }
            //alert(flage);
            $.ajax({
               type:"POST",
               url:"profile_ajax_country_visible.php",
               data:{flage:flage},        //POST variable name value
               success: function(result){
                    //alert(result);
                    alert('Profile preference saved.');
               }

           }); 
         });
    </script>
<script type="text/javascript">
    /*
    $('.addevent').click(function(){
        var id = $( this ).attr("id");
        $('#event_id').val(id);
        $("#datetime1").datetimepicker({format: 'Y-MM-DD HH:mm:ss'});
        $('#exampleModal').modal('show');

        var url='<?php //echo SITEPATH;?>';
        $.ajax({
           type:"POST",
          url:"visit_pageajax.php",
          data:{id:'Add Event',url:url},
          success:function(result){       
          }
        });
      });


    $(document).on("click", "#save_event", function(){ 
    var eventDisc = "";  
    eventDisc = $.trim($("#eventDisc").val()); 
    var city_id = "";
    city_id = $("#city_id").val();
    var datetime = "";
    datetime = $("#datetime1").val();
    var event_id = "";
    event_id = $("#event_id").val();

    console.log("datetime1 "+datetime);


    if(eventDisc == '' || city_id =='' || datetime =='' || eventDisc == undefined )
    {
      alert('Please fill all fileds on add event');
    }
    else
    {
          $.ajax({
            type:"POST",
            url:"adduserevent.php",
            data:{event_id:event_id,city_id:city_id,datetime:datetime,eventDisc:eventDisc},
                success:function(result){ 
                    
                alert('You have successfully add event.');  
                $('#eventDisc').val(''); 
                $('#datetime1').val(''); 
                $('#exampleModal').modal('hide');
                // location.reload();
              }
              });  
    }
      });
*/
 
 $('.addevent').click(function(){

    var activity_id = $(this).attr('id');

    $.post('activity_id.php', {activity_id:activity_id}
         );

    $.ajax({
        type:"POST",
        dataType: 'html',
        url:"activity.php",     
        success:function(result){
            $('.profile .profile').hide();
            $('.frdsprofile').hide();
            $('.activity').html(result); 
            $('.activity').css('display','block');
            $("#datetime1").datetimepicker({format: 'Y-MM-DD HH:mm:ss'});
            // initActivityMap();
                $.ajax({
                        type:"GET",
                        dataType: 'JSON',
                        url:"activityMap_ajax.php",     
                        success:function(data){
                            
                                var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                 
    // Display a map on the web page
    map = new google.maps.Map(document.getElementById("mapActivity"), mapOptions);
    map.setTilt(100);


    var markers = data;

    var infoWindowContent = data;
    // Multiple markers location, latitude, and longitude
        
    // Add multiple markers to map
    var infoWindow = new google.maps.InfoWindow(), marker, i;

    // Place each marker on the map  
    for( var i = 0; i < markers.length; i++ ) {
        let url = "http://maps.google.com/mapfiles/ms/icons/";
        url += markers[i]['color'] + "-dot.png";
        var position = new google.maps.LatLng(markers[i]['lat'], markers[i]['lng']);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            icon: url,
            title: markers[i]['place_name']
        });
        
        // Add info window to marker    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i]['content']);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Center the map to fit all markers on the screen
        map.fitBounds(bounds);

    }

    // Set zoom level
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(3);
        google.maps.event.removeListener(boundsListener);
    });


                        }
                    });         
        }
    });
    return false;
});   
</script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.css">
<script src="https://trentrichardson.com/examples/timepicker/jquery-ui-timepicker-addon.js"></script>
<script src="https://trentrichardson.com/examples/timepicker/jquery-ui-sliderAccess.js"></script> -->

<!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script> -->
<script type="text/javascript">
   $(document).ready(function(){
        // $("#datetime1").datetimepicker({format: 'Y-MM-DD HH:mm:ss'});
        // $('.timepicker').timepicker();
        //$(".slidervideo").css("width:9%!important");
    });

</script>

<?php /*
<!-- event form -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Event</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form role="form" method="POST" enctype="multipart/form-data" name="add-form" id="add-form" >
                <div class="form-group">
                    <label for="message-text" class="col-form-label">City</label>
                    <select class="form-control" name="city" id='city_id'>
                        <?php foreach($cities as $city) {?>
                        <option value="<?php echo $city['id'] ?>"><?php echo $city['place_name'] ?></option>
                    <?php } ?>
                   </select>
                </div>
                <div class="form-group">
                    <label class="col-form-label">Description</label>
                    <textarea class="form-control" name="eventDisc" id="eventDisc"></textarea>
                </div>
                <input type="hidden" name="event_id" id="event_id">
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Date Time</label>
                    <input type="text" class="form-control " name="datetime" id="datetime1" placeholder="YYYY-MM-DD HH:mm:ss">
                </div>  

            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="save_event">Save event</button>
      </div>
    </div>
  </div>
</div> */?>