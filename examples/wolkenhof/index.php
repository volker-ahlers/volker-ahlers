<!DOCTYPE html>
<html>
<head>
    <?php
	$ROOT = './';
    $prefix = 'wolkenhof';
    $step = "index";
    include("{$prefix}/addons/lib.php");
    $path = isset($_GET['content']) && is_file($prefix . '/' . $_GET['content'] . '.php') ? $prefix . '/' . $_GET['content'] . '.php' : $prefix . '/index.php';
    $title = "Wolkenhof in Murrhardt";
    $title = !empty($_GET['content']) ? $title . '/ ' . underscore2Camelcase($_GET['content']) : $title;
    include("shared/includes/head.php");
    $photopath = realpath(__DIR__ . '/shared/photos/');
    ?>
</head>
<body>
    <div id="container">
        <?php include("shared/includes/navigation.php"); ?>
        <div id="content_right">
            <?php
            include($path);
            ?>
        </div>
    </div>
</body>
</html>
