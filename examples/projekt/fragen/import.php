<?php
$titel="Fragenimport";
$css ="../format.css";
/////////////////////////////////IMPORT !!!/////////////////////////////////////
include "../includes/head2.php";
$num=1;
$k=0;
$Datei=file("fragen.csv");
$auswahl=count($Datei);


     for($i=1;$i<40;$i++){

         $xDatei=explode(";",$Datei[$i]);
         $string="";

        $sql_query="SELECT ID FROM fragen WHERE ID = '".$xDatei[0]."' ;";
        $result=mysql_query($sql_query,$db);

        if($result){$num= mysql_num_rows($result);}                             //Kontrolle zur Vermeidung von doppeln

        if($num==0){

        for($j=0;$j<14;$j++)$string.=" '".$xDatei[$j]."' ,";
            $string=substr($string,0,-1);
            $sql_query="INSERT INTO fragen VALUES ( ".$string.");";
            $result=mysql_query($sql_query,$db);
            if(!$result){echo "<strong>Zeile ".$i." konnte nicht eingelesen werden</strong><br>";}
            else {echo "Eintrag Zeile ".$i." ID".$xDatei[24]." erfolgreich<br>";$k++;}
       }
       if ($num==1)echo "Eintrag Zeile ".$i." schon vorhanden<br>";
     }
     if($auswahl==0)echo "<strong>Keine Daten gefunden</strong>";

    linker("reset.php","<p>Fragenreset");
?>
