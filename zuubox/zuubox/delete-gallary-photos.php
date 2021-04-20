<?php
session_start();
require_once("include/config.php");
require_once("include/functions.php");

$user = new User();
if(isset($_POST['photoID']))
{
	 $photoID=$_POST['photoID'];

	 $where = 'id ='.$photoID; 
	 $deleterow =$user->delete_row('tbl_photo_gallary',$where);

	$photogallary = $user->select_allrecords('tbl_photo_gallary','*');


}

?>     
<div class="col-xs-2 pg-main">                                    
                                        <!-- <i class='fa fa-trash delete-btn2' id="<?php echo $photogallary['0']['id'];?>"></i> -->
                                        <?php
                                            $photo_count=count($photogallary);                  
                                            foreach($photogallary as $photogallary)
                                                    {
                                                         for($i=1; $i <= 1; $i++){  
            
                                                        echo "<label><i class='fa fa-trash delete-btn2' id='".$photogallary['id']."'></i><img src='".$photogallary['photo_path']."' id='".$photogallary['id']."' class='imggallary img-responsive'> </label>";  
            
                                                    if(($photo_count % $i) == 0) {  
                                                    
                                                        echo "</div><div class='col-xs-2 pg-main'></i>";
                                                        }
                                                    }
                                                }
                                                ?>
                                    </div>
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