<?php
	foreach($files as $file){    
	?> <img src="shared/photos/<?php echo $file ?>" class="hidden" alt="Landschaft" title="Landschaft" /> <?php
	}

    $config = file_get_contents("admin/data/config.conf");
    $params = explode('#', $config);
    $slide = "fade";
    $time = 3500;

    if(!empty($params[0])){
        $slide = $params[0];
    }

    if(!empty($params[1])){
        $time=1000 * str_replace(",", ".", $params[1]);
    }
?>  

<script type="text/javascript">
<!--

$(function() {
	var fx ="<?php print($slide); ?>";
	var time =Number(<?php print($time); ?>);
	var syncVal = true;
	if(fx == "shuffle")syncVal = false;

	$('#slideshow').cycle({
		fx:     fx,
		speed:  time,
		sync: syncVal
	});
    });
-->
</script>

		<div id="div_galerie">
			<h1>Galerie</h1>				 
			<div id="show">			
				<div id="slideshow">   
				<?php   if(count($files)){   ?>
				    <?php   foreach($files as $file){   ?>
				    <img src="shared/photos/<?php echo $file ?>" style="max-width:450px;max-height:450px;" alt="Landschaft" title="Landschaft" />
				    <?php } ?>
				    <?php } else { ?>
				    Keine Bilder vorhanden !
				<?php } ?>
				</div>			
			</div>		   
		</div>