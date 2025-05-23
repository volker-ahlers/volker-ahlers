<!DOCTYPE html>
<head>
    <?php
	$ROOT = '../';
    $title = "Wolkenhof in Murrhardt / Admin";
    $aktuelles = "data/aktuelles.txt";
    $version = explode(".", phpversion());
    $step = "ad";
    $status = "Bilder-Upload";
    $status2 = "Datei-Upload";
    $count = 0;

    include("../shared/includes/head.php");
    include("includes/tinymce.php");
    include("includes/createFiles.php");

    $photopath = realpath(__DIR__ . '/../shared/photos/');

    ?>

    <script type="text/javascript">
        var param = '<?php echo $param ?>';
    </script>
    <script src="admin.js" type="text/javascript"></script>
</head>
<body>


<div id="tinymceform">
    <span class="showeditor white hand">Zur&uuml;ck&nbsp;zur&nbsp;Admin-Seite</span>

    <p>&nbsp;</p>

    <form method="post" id="editpage" action="index.php?editpage=editpage">
        <textarea id="content" name="content" rows="100" cols="200">
            <?php echo file_get_contents($aktuelles); ?>
        </textarea>

        <p>&nbsp;</p>
        <input type="submit" value="speichern"/>
    </form>
</div>


<div id="tinymcebackground" class="transparent"></div>

<div id="container">

    <?php include("../shared/includes/navigation.php"); ?>

    <div id="content_right">
        <p>&nbsp;</p>

        <div id="div_index">
            <p class="ueb2">Willkommen auf der Admin-page</p>

            <p/>
            <?php echo ' die PHP-Version ist: ' . phpversion(); ?>
            <p/>
            <span class="showeditor hand">Hier Aktuelles editieren!!</span>

            <p>&nbsp;</p>

            <?php // phpinfo(); ?>
            <span>Der aktuelle Slide-effect ist <span id="ajaxslide"><?php echo $slide ?></span></span>

            <p/>
            <?php $slidecontent = array('all', 'blindX', 'blindY', 'blindZ', 'cover', 'curtainX', 'curtainY', 'fade',
                'fadeZoom', 'growX', 'growY', 'none', 'scrollUp', 'scrollDown', 'scrollLeft', 'scrollRight',
                'scrollHorz', 'scrollVert', 'shuffle', 'slideX', 'slideY', 'toss', 'turnUp', 'turnDown',
                'turnLeft', 'turnRight', 'uncover', 'wipe', 'zoom');?>

            <form id="writeslide" action="index.php?action=writeconf" method="post">

                <select id="slides" name="slides">
                    <option value="none">choose slide-effect</option>
                    <?php foreach ($slidecontent as $slides) { ?>
                        <option <?php if ($slides == trim($slide)): ?> selected="selected" <?php endif ?>><?php echo $slides ?></option>
                    <?php } ?>
                </select>
                <input type="submit" value="slide"/>
            </form>


            <p>&nbsp;</p>
            <span>Die aktuelle Zeitspanne ist <span id="ajaxtime"><?php echo str_replace(".", ",", $time); ?></span> Sekunden</span>

            <p/>

            <form id="writetime" action="index.php?action=writeconf" method="post">
                <select id="time" name="time">
                    <option value="3.5">time</option>
                    <?php for ($i = 1.0; $i < 7.5; $i += 0.5): ?>
                        <option
                            value="<?php echo $i; ?>" <?php if ($i == trim($time)): ?> selected="selected" <?php endif ?>><?php echo str_replace(".", ",", $i); ?></option>
                    <?php endfor ?>
                </select>
                <input type="submit" value="time"/>
            </form>

            <p>&nbsp;</p>
            <span class="states"><?php echo $status; ?></span>

            <p/>

            <form id="loadimage" action="index.php?action=loadimage" method='post' enctype='multipart/form-data'
                  name='upload' class="upload">
                <input name="image" type="file" id="image" size="30" value='<? echo $_FILES["image"]["name"]; ?>'/>
                <br/>
                <input type="submit" name="Submit" value="laden"/>
                <input type="reset" name="Reset" value="Reset"/>
            </form>
        </div>

        <p>&nbsp;</p>
        <span>Bild&uuml;bersicht, <br/>zum L&ouml;schen Bild anklicken:</span>

        <p/>

        <div id="overlook">
            <?php $files = scandir1("../shared/photos"); ?>
            <?php if (count($files)) { ?>
                <?php foreach ($files as $file) { ?>
                    <img class="imageFile hand" name="<?php echo $file ?>" src="../shared/photos/<?php echo $file ?>"
                         width="50px" alt="thumbnail" title="thumbnail"/>
                <?php } ?>
            <?php } else { ?>
                Keine Bilder vorhanden !
            <?php } ?>
            <div id="showimage"></div>
        </div>

        <p>&nbsp;</p>
        <span class="states"><?php echo $status2; ?></span>

        <p/>

        <form action="index.php?action=loaddata" method='post' enctype='multipart/form-data' name='upload'
              class="upload">
            <input name="data" type="file" id="data" size="30" value='<? echo $_FILES["data"]["name"]; ?>'/>
            <br/>
            <input type="submit" name="Submit" value="laden"/>
            <input type="reset" name="Reset" value="Reset"/>
        </form>

        <p>&nbsp;</p>
        <span>Datei&uuml;bersicht, <br/>zum L&ouml;schen Dateizeile anklicken:</span>

        <p/>

        <div id="datalook">
            <?php $files = scandir1("../shared/files"); ?>
            <?php if (count($files)) { ?>
                <select id="datafile" name="datafile">
                    <option>select file</option>
                    <?php foreach ($files as $file) { ?>
                        <option><?php echo $file ?></option>
                    <?php } ?>
                </select>
            <?php } else { ?>
                Keine Dateien vorhanden !
            <?php } ?>
        </div>

        <p>&nbsp;</p>

        <span class="showfilesclick hand">Dateien auf Rechner laden .. hier click zum &Ouml;ffnen</span>

        <div id="showfiles">
            <div id="showfilescontent"></div>
        </div>

        <p>&nbsp;</p>
        <p>&nbsp;</p>
    </div>
</div>
</body>
</html>
