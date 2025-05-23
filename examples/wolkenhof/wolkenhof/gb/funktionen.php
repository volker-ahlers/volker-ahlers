<?php

/////////////////////////////////////////
// Gästebuch + Reloadsperre v1.0
/////////////////////////////////////////

// 0=keine Reloadsperre, 1=Reloadsperre
$aktiv = 1;
// Zeit der Reloadsperre in Minuten
$zeit = 2;
// IP-Datei
$ipdatei = "wolkenhof/gb/ips.txt";
// Buchdatei
$datei = "wolkenhof/gb/buch_inhalt.htm";

/////////////////////////////////////////
// IP-Reloadsperre
/////////////////////////////////////////

function pruf_IP($rem_addr)
{
    global $ipdatei, $zeit;
    $gefunden = 0;
    @$ip_array = file($ipdatei);
    $reload_dat = fopen($ipdatei, "w");
    $this_time = time();
    for ($i = 0; $i < count($ip_array); $i++) {
        list($ip_addr, $time_stamp) = explode("|", $ip_array[$i]);
        if ($this_time < ($time_stamp + 60 * $zeit)) {
            if ($ip_addr == $rem_addr) {
                $gefunden = 1;
            } else {
               fwrite($reload_dat, "$ip_addr|$time_stamp");
            }
        }
    }
    fwrite($reload_dat, "$rem_addr|$this_time\n");
    fclose($reload_dat);
  //  return ($gefunden == 1) ? 1 : 0;
    return $gefunden;
}

/////////////////////////////////////////
// Abfrage
/////////////////////////////////////////


    $REMOTE_ADDR = isset($REMOTE_ADDR) ? : $_SERVER['REMOTE_ADDR'];
    if (file_exists($datei) && ($aktiv == 0 || ($aktiv == 1 && pruf_IP($REMOTE_ADDR) == 0))) {

        // Falls die Datei existiert, wird sie ausgelesen und
        // die enthaltenen Daten werden durch den neuen Beitrag
        // ergänzt
        $fp = fopen($datei, "r+");
        $daten = fread($fp, filesize($datei));
        rewind($fp);
        flock($fp, 2);
        fputs($fp, "$eintrag \n $daten");
        flock($fp, 3);
        fclose($fp);
        include("autorespond.php");


    } else if (!file_exists($datei) && ($aktiv == 0 || ($aktiv == 1 && pruf_IP($REMOTE_ADDR) == 0))) {
        // Die Datei buch_inhalt.htm existiert nicht, sie wird
        // neu angelegt und mit dem aktuellen Beitrag gespeichert.
        $fp = fopen($datei, "w");
        fputs("$eintrag \n", $fp);
        fclose($fp);
        include("autorespond.php"); 
    } else {
        // Die Datei existiert zwar, jedoch handelt
        // es sich wahrscheinlich um den gleichen Besucher        
    }
	header("location:index.php?content=gaestebuch");
}

?>
