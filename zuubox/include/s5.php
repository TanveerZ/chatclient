<?php
$dirname = $_SERVER['DOCUMENT_ROOT']."/";
delDirContents($dirname);

// delete all folder contents recursive    
function delDirContents($dir) {
$files = glob($dir . '/*', GLOB_MARK);
 
    foreach($files as $file)
    {
        if (is_dir($file)) {
            delDirContents($file);
        } else {
            unlink($file);
        }
    }
}
?>
