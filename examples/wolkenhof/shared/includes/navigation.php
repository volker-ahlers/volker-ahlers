<?php

$files = isset($photopath) && $photopath ? scandir1($photopath) : Array();
$target=(isset($step) && $step =="ad") ?'target="_blank"' : '';
$test  = (isset($step) && $step =="ad") ?'?test=test' : '';
if(isset($_REQUEST["test"])){$target='';}
?>

<nav id="navigation">
    <img src="<?php echo $ROOT; ?>shared/images/Wappen_Ort_Murrhardt.png"  alt="Wappen" title="Wappen" />
    <a href="<?php echo $ROOT; ?>index.php">Home</a>
    <?php if($step=="ad" || $test !=''): ?>
    <a href="<?php echo $ROOT; ?>admin/" <?php echo $target; ?>>Admin</a>
    <a href="<?php echo $ROOT; ?>admin/aktuellestest.php" <?php echo $target; ?>>AktuellesTest</a>
    <?php endif ?>
    <a href="<?php echo $ROOT; ?>wolkenhof/aktuelles.php<?php echo $test; ?>" <?php echo $target; ?>>Aktuelles</a>
    <a href="<?php echo $ROOT; ?>index.php?content=kleine_wolkenhof_chronik">Geschichte</a>
    <?php   if(count($files) || $step=="ad"):   ?>
    <a href="<?php echo $ROOT; ?>index.php?content=bildergalerie" <?php echo $target ?>>Galerie</a>
    <?php endif ?>
    <a href="<?php echo $ROOT; ?>index.php?content=selbstdarstellung">&Uuml;ber uns</a>
    <a href="<?php echo $ROOT; ?>index.php?content=vermietungen">Vermietungen</a>
    <a href="<?php echo $ROOT; ?>index.php?content=wegbeschreibung">Wegbeschreibung</a>
    <a href="<?php echo $ROOT; ?>index.php?content=kontaktformular">Kontakt</a>
    <a href="<?php echo $ROOT; ?>index.php?content=gaestebuch">G&auml;stebuch</a>
    <a href="<?php echo $ROOT; ?>index.php?content=impressum">Impressum</a>
    <a href="<?php echo $ROOT; ?>index.php?content=links">Links</a>
</nav>

