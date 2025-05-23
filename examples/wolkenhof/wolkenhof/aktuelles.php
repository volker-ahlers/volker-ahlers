<!DOCTYPE html>
<html>
<head>
    <?php
	$ROOT = '../';
    $prefix = 'wolkenhof';
    $step = "index";
    $title = "Wolkenhof in Murrhardt/Aktuelles";
    $photopath = realpath(__DIR__ . '/../shared/photos/');
    include("../shared/includes/head.php");
    ?>
</head>
<body>
<div id="container">
    <?php include("../shared/includes/navigation.php"); ?>
    <div id="content_right">
        <div id="div_aktuelles">
            <h1>Aktuelle Termine auf dem Wolkenhof</h1>
            <?php
                $filepath = realpath(__DIR__ . '/../shared/data/aktuelles.txt');
                if ($filepath) {
                    echo $datei = file_get_contents($filepath);
                }
            ?>
            <?php if (!$filepath || strip_tags($datei) == ''): ?>
			<?php print_r( __DIR__); ?>
                <p>Zur Zeit arbeiten wir an neuen Aktionen und freuen uns, Ihnen hier bald die Ergebnisse zu
                    Präsentieren</p>
            <?php endif ?>
        </div>
    </div>
</div>
</body>
</html>