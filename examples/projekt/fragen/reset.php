<?php
session_start();

$css ="../format.css";
$titel="RESET";                //Titel der Seite
include "../includes/head2.php";
echo "&nbsp;<p>";
echo "<p><strong>";

   $sql_query="TRUNCATE TABLE fragen;";
   $result=mysql_query($sql_query,$db);
   if($result) echo "Tabelle 'Fragen' erfolgreich resetted!<p>";
   else echo "Tabelle 'Fragen' konnte nicht gelöscht werden!<p>";
   
   $sql_query="DELETE FROM userfragen WHERE UID=".$User_ID.";";      echo $sql_query."<p>";
   $result=mysql_query($sql_query,$db);
   if($result) echo "Tabelle 'Userfragen' erfolgreich resetted!<p>";
   else echo "Tabelle 'Userfragen' konnte nicht resetted werden!<p>";

   $sql_query="DELETE FROM utrack WHERE UID=".$User_ID.";";     echo $sql_query."<p>";
   $result=mysql_query($sql_query,$db);
   if($result) echo "Tabelle 'Utrack' erfolgreich resetted!<p>";
   else echo "Tabelle 'Utrack' konnte nicht resetted werden!<p>";

echo "</strong>";
linkerpur("import.php","<p>Fragenimport");
echo "</body>".debug()."</html>";        //Ende des HTML-Dokumentes
   
showarray($_SESSION,$Showarray);
?>
