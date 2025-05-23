<?php

///////////////////////
//counter mit reloadsperre
//////////////////////

$aktiv=1;    //1 = mit reloadsperre 0 = ohne
$zeit=1;     //reloadsperre in min
$ipdatei="shared/data/ips.txt";

//////////////////////////
//reloadsperre
//////////////////////////

function prov_IP($rem_addr){
    global $ipdatei, $zeit;
    @$ip_array = file($ipdatei);
    $reload_dat= fopen($ipdatei,"w");
    $this_time=time();
	$gefunden=0;

    for($i=0;$i<count($ip_array);$i++){ //for
        list($ip_addr,$time_stamp)= explode("|",$ip_array[$i]);

        if($this_time<((int) $time_stamp+60*$zeit)){//<
        if($ip_addr==$rem_addr){
            $gefunden=1;
        } else { //else
         fwrite($reload_dat,$ip_addr|$time_stamp);
         } //else
       } //<
     } //for

fwrite($reload_dat,"$rem_addr|$this_time\n");
fclose ($reload_dat);
return $gefunden;
   }//function
?>
