<?php

 $datum = date("Y-m-d H:i:s");                                                  //Aktuelles Datum ermitteln
 
   $sql_query2="INSERT INTO user VALUES ( '','".trim($_REQUEST['Anrede'])."',
   '".trim($_REQUEST['Vorname'])."','".trim($_REQUEST['Nachname'])."',
   '".trim($_REQUEST['Strasse'])."','".trim($_REQUEST['PLZ'])."','".trim($_REQUEST['Ort'])."',
   '".trim($_REQUEST['Kennung'])."','".trim($_REQUEST['Passwort'])."','".trim($_REQUEST['Email'])."',
   '".date_german2mysql($_REQUEST['Geburtsdatum'])."','".$datum."','0','','','','','0');";
                                                                                //Befehlskette für Datenbank mit den Parametern aus dem Formular

?>
