<?php function scandir1($dir){
        $dh  = opendir($dir);
        while (false !== ($filename = readdir($dh))) {
            if($filename != "." && $filename != ".."){
                $files[] = $filename;
            }
        }
        return $files;
} 

$options = Array('cloose slide-effect','all','blindX','blindY','blindZ','cover','curtainX','curtainY','fade','fadeZoom','growX','growY','none','scrollUp','scrollDown','scrollLeft','scrollRight','scrollHorz','scrollVert','shuffle','slideX','slideY','toss','turnUp','turnDown','turnLeft','turnRight','uncover','wipe','zoom');
//Ordnernamen ermitteln
  $pfad_info = pathinfo($_SERVER["SCRIPT_FILENAME"]);
  $pfad = $pfad_info["dirname"];
  $array = explode("/",$pfad);
  $ordnername = ucfirst($array[count($array)-1]);
?>

<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title><?php echo $ordnername; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="../gallery/js/jQuery v1.11.1.js" type="text/javascript"></script>
    <script type="text/javascript" src="../gallery/js/jquery.cycle.all.js"></script>
    <script type="text/javascript" src="../gallery/js/gallery.js"></script>
    <link rel="stylesheet" type="text/css" href="../gallery/css/design.css" />
    <script language="JavaScript">
    var markup = '<div id="slideshow">'
        <?php $files = scandir1("images"); ?>
        <?php   foreach($files as $file){   ?>
        + '<img src="images/<?php echo $file ?>" width="500" />'
        <?php } ?>
        + '</div>';
//console.log(markup); 
</script>
</head>
<body>
    <h3><?php echo $ordnername; ?>'s-Galerie:</h3>
    <p />
    <div style="position: absolute; top: 50px; Left: 50px;">
    <select id="choices">
        <?php foreach($options as $option): ?>
            <option><?php echo $option ?></option>
        <?php endforeach ?>
    </select>
    </div>

    <div id="show"></div>

    <pre><?php //print_r($files) ?></pre>
</body>
</html>