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

        	$ext      = end(explode(".", basename($_FILES['file']['name']) ));
            $filename   = time() . mt_rand().".".$ext;
            $uploadfile = $uploaddir . $filename;
            $file_type = $_FILES['file']['type'];
            if($file_type=='video/mp4')
                {
                	if(move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile))
                    { 
					    $user->insert_records('tbl_slidervideo',array('video_path'=>$uploadfile,'add_date'=>date('Y-m-d')));
                        $_SESSION['uploadfooter']=1;
                
                    } 
                    
                }
        }


?> 

        