<?php
require_once("classes/cls-cellsection.php");

$obj_section = new Cellsection();

if(isset($_POST['imgid']))
{
  $imgid = $_POST['imgid'];
 $imgstr = $_POST['imgstr'];
 $imgstr = substr($imgstr, 3);
 

    $condition = "`id` = '" .$imgid. "' ";
    $getdata = $obj_section->getcellsection('*', $condition, '', '', 0);
 	
 	$pathstr =  $getdata[0]['image-path'];
 	$pathimg=explode(',', $pathstr);

 	//print_r($pathimg);
 	//echo "<br>";
 	$key = array_keys($pathimg,$imgstr);

	unset($pathimg[$key[0]]);

	$pathimg = implode(',', $pathimg);

 	/*$returnpath = str_replace($imgstr.",",'', $pathstr) ;*/

 	$condition = "`id` = '" .$imgid. "'";
    $update_data['image-path']=$pathimg;
	$getupdate = $obj_section->updatecellsection($update_data,$condition,0);

	$condition1 = "`id` = '" .$imgid. "' ";
    $getdata1 = $obj_section->getcellsection('*', $condition, '', '', 0);

    $imagepath =  $getdata1[0]['image-path'];

 
    if(isset($imagepath))
    {
             
          $imagep=explode(',',$imagepath);
          $imgcount= count($imagep);  
            for ($i=0;$i<$imgcount;$i++)
            {                                        
                 echo "<img src='../$imagep[$i]' height='50px' width='50px' class='image-responsive'>";
                 echo " ";
                  echo "<span class='fa fa-close imgclose' id='../$imagep[$i]'></span>";
                
            }                     
    
    }
                                                 

}
?>
 <script type="text/javascript">
   

$( ".fa-close" ).click(function() {
    
    var id = "<?php echo  $imgid;?>";
    var imgstr=this.id;
    
     $.ajax({
                type:"POST",
                url:"remove_cellsliderimgajax.php",
                data:{imgid:id,imgstr:imgstr},
                success:function(result){
                  //console.log(result);
                $('.imgshow').html(result);
                
                }
                });

});
  </script>