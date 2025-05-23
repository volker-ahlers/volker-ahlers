<?php
include_once("../../shared/includes/staticFunction.php");
//print_r($_REQUEST);
$prefix = "";
$folder = "";
$file = "";
$files = Array();
$mode = "default";

if (isset($_REQUEST["folder"])) {
    $folder = $_REQUEST["folder"];
    $files = scandir1("../../shared/" . $folder . "/");
}
if (isset($_REQUEST["file"])) {
    $file = $_REQUEST["file"];
}
if (isset($_REQUEST["mode"])) {
    $mode = $_REQUEST["mode"];
}

?>

<?php if ($mode == "options"): ?>

    <?php if (count($files)): ?>
        <select id="datafile" name="datafile">
            <option>select file</option>
            <?php foreach ($files as $file) { ?>
                <option><?php echo $file ?></option>
            <?php } ?>
        </select>
    <?php else: ?>
        Keine Dateien vorhanden !
    <?php endif ?>


<?php elseif ($mode == "hrefs"): ?>

    <p/>
    <?php if (count($files)) { ?>
        <span class="showfilesclicks white">Dateien auf Rechner laden .. zum Download untere Zeile anklicken</span>
        <p/>
        <div id="showfilelist">
            <?php foreach ($files as $file) { ?>
                <a href="../shared/files/<?php echo $file ?>" target="_blank"><?php echo $file ?></a>
                <br/>
            <?php } ?>
        </div>
    <?php } else { ?>
        <span class="showfilesclicks white">Keine Dateien vorhanden !</span>
    <?php } ?>
    <br/>
    <span class="showfilesclick white hand">Schlie&szlig;en</span>
    <p/>

<?php elseif ($mode == "images"): ?>

    <?php if (count($files)) { ?>
        <?php    foreach ($files as $file) {
            print('<img class="imageFile" name="' . $file . '" src="../shared/photos/' . $file . '" width="50px" alt="thumbnail" title="thumbnail" />');
        }
    } else {
        print('Keine Bilder vorhanden !');
    } ?>
<?php else: ?>
    <?php print_r("<img src='../shared/{$folder}/{$file}' style='width:400px;' />"); ?>
<?php endif ?>

