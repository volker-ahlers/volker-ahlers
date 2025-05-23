<?php

$host="localhost" ;
$user="volker";
$pw="hermosa";
$database="lernprojekt";                                                            //Parameter um die Datenbank aufzurufen ...

$db=@mysql_pconnect($host,$user,$pw)                                          //hier wird die Datenbankverbindung hergestellt
    or die ('Keine Serververbindung');
@mysql_select_db($database,$db)
    or die ('Keine Datenbankverbindung');
?>
