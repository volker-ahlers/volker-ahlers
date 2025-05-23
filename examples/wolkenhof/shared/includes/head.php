<?php include_once("staticFunction.php"); ?>

<title><?php echo $title; ?></title>
<?php include("meta.php"); ?>

<script src="<?php echo $ROOT; ?>shared/js/jquery.v1.11.1.js" type="text/javascript"></script>
<script src="<?php echo $ROOT; ?>shared/js/highslide/highslide.full.2011.js" type="text/javascript"></script>
<script src="<?php echo $ROOT; ?>shared/js/highslide/highslideconfig.js" type="text/javascript"></script>
<script src="<?php echo $ROOT; ?>shared/js/jquery.cycle.all.js" type="text/javascript"></script>

<link href="<?php echo $ROOT; ?>shared/css/wolkenhof.css" type="text/css" rel="stylesheet"/>
<?php if ($step == "ad"): ?>
    <link href="<?php echo $ROOT; ?>shared/css/admin.css" type="text/css" rel="stylesheet"/>
<?php endif ?>
<link href="<?php echo $ROOT; ?>shared/js/highslide/highslide.css" type = "text/css" rel = "stylesheet" />

<!--[if lt IE 9]>
<script src="<?php echo $ROOT; ?>js/google.html5.js"></script>
<![endif]-->
 

