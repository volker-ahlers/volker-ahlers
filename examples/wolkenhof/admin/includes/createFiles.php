<?php

if (file_exists("includes/uploadClass.php")) {
    include_once("includes/uploadClass.php");
} else {
    include_once("uploadClass.php");
}

function createFile($path = '')
{
    $fh = @fopen($path, 'w');
        @fclose($fh);
}

$param = "leer";

    if (isset($_REQUEST["editpage"])) {
        $param = $_REQUEST["editpage"];
        if ($_REQUEST["editpage"] == "editpage") {
            if (isset($_REQUEST["content"]) && $_REQUEST["content"] != "") {
                $fp = fopen($aktuelles, "w") or createFile($aktuelles);
                fwrite($fp, $_REQUEST["content"]);
                fclose($fp);
            }
        }
    }

    if (isset($_REQUEST["action"])) {

        if ($_REQUEST["action"] == "loadimage") {
            $upload = new Upload();
            $destinaton = "photos";
            $maxSize = 2000000;
            $regExp = "/^(.*?)\.(jpg|jpeg|png|gif)$/i";
            $status = $upload->uploads($_FILES["image"], $maxSize, $destinaton, $regExp);
        }

        if ($_REQUEST["action"] == "loaddata") {
            $upload = new Upload();
            $destinaton = "files";
            $maxSize = 6000000;
            $regExp = "/^(.*?)\.(pdf|doc|docx|ppt|pptx|txt|rtc|jpg|jpeg|png|gif|xls|xlsx)$/i";
            $status2 = $upload->uploads($_FILES["data"], $maxSize, $destinaton, $regExp);
        }
    }

    $path = str_replace('/', DIRECTORY_SEPARATOR,  __DIR__ . "/../data/config.conf");
    $file = @file($path) or createFile($path);

    $config = file_get_contents($path);
    $params = explode('#', $config);
    $slide = "fade";
    $time = 3;

    if(!empty($params[0])){
        $slide = $params[0];
    }

    if(!empty($params[1])){
        $time = $params[1];
    }

    if (isset($_REQUEST["slides"])) {
        $slide = $_REQUEST["slides"];
    }
    if (isset($_REQUEST["time"])) {
        $time = $_REQUEST["time"];
    }

    $string = $slide . "#" . $time;
    file_put_contents($path, $string);
    print($string);//php4
    //echo json_encode(array("slide"=>$slide,"time"=>$time));
?>