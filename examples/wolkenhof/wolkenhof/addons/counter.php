<?php


$REMOTE_ADDR = isset($REMOTE_ADDR) ? : $_SERVER['REMOTE_ADDR'];
///////////////////////
//counter mit reloadsperre
//////////////////////

include "ip_prov.php";

  $datei = "shared/data/counter.txt";
  $stellen = 5;
//////////////////////////
//counterabfrage
//////////////////////////

if(file_exists($datei)&&($aktiv==0 || ($aktiv==1 && prov_IP($REMOTE_ADDR)==0))){
  
      $fp=fopen($datei,"r+");
      $zahl=fgets($fp,$stellen);
      $zahl++;
      rewind($fp);
      flock($fp,2);
      fputs($fp,$zahl,$stellen);
      flock($fp,3);
      fclose($fp);

      }else if (!file_exists($datei)&&($aktiv==0 || ($aktiv==1 && prov_IP($REMOTE_ADDR)==0))){

      $fp=fopen($datei,"w");
      $zahl=2000;
      fputs($fp,$zahl,$stellen);
      fclose($fp);
      }else {
         $fp=fopen($datei,"r");
         $zahl=fgets($fp,$stellen);
         fclose($fp);
      }
      
     //$zahl=sprintf("%0".$stellen."d",$zahl);
      echo $zahl;
?>
