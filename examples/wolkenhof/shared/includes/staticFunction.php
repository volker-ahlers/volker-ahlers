<?php
 function scandir1($dir){
        $dh  = opendir($dir);
        while (false !== ($filename = readdir($dh))) {
                if($filename != "." && $filename != ".."){
                    $files[] = $filename;
                }
            }
        return $files;
  }
?>