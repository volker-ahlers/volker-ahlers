<?php
session_start();                                                                //phpinfo();
$css="format.css";
  include "includes/head.php";
  
  $sql_query3="SELECT UID,nachname, kennung FROM user WHERE email = '".trim($_REQUEST[Email])."';";

  $result=mysql_query($sql_query3,$db);
  
     if($result){//1
        $Email=mysql_fetch_array($result);
          if($Email[kennung]!=""){//2

                 $Passwort= pw_generate(8);
                 $sql_query="UPDATE user SET Passwort = '".$Passwort."' WHERE UID ='".$User_ID."';"; //Passwort in Datenbank aktualisiert
                 $result=mysql_query($sql_query,$db);                           show($sql_query,$Showquery);
     
                 if($result){//4
                         $String="Hallo Herr ".$Email[nachname].",\n\n hier sind Ihre Zugangsdaten,\n\n Ihr Kennwort: ".$Email[kennung]." \n\nund Ihr neues Passwort: ".$Passwort;
                                 $gesendet=mail($_REQUEST[Email],"Ihre Zugangsdaten",$String,"FROM: Lersware\n");  show($String,$Showquery);
                 }//4
     
                  if ($gesendet) echo "&nbsp;<p><h3><center>Ihre Zugangsdaten wurden an Ihre Adresse ".$_REQUEST[Email]." gesendet!</center></h3>";
                    else Echo "&nbsp;<p><h3><center>Leider konnten Ihre Daten nicht an die Adresse ".$_REQUEST[Email]." gesendet werden</center></h3>";
          } else  Echo "&nbsp;<p><h3><center>Diese Emailadresse ist uns nicht bekannt</center></h3>";  //2
     } else  Echo "&nbsp;<p><h3><center>Keine Verbindung zur Datenbank !</center></h3>";               //1                                                                                                 //1
?>
