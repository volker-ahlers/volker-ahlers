<?php
session_start();                                                                //phpinfo();
$css="../format.css";
 include "../includes/head2.php";
 $datum1 = date("Y-m-d H:i:s");

   echo $datum1;

  $sql_query3="SELECT * FROM user WHERE email = '".trim($_REQUEST[Email])."';";
   $result=mysql_query($sql_query3,$db);
    if($result){//1
     $Email=mysql_fetch_assoc($result);
      if($Email[email]!=""){//2
       $String="Hallo Herr ".$Email[nachname].",\n\nhier sind Ihre Zugangsdaten,\n\nIhr Kennwort: ".$Email[kennung]." \n\nund Ihr Passwort: ".$Email[passwort]." \n\nabgesendet: ".$datum;
      $gesendet=mail($_REQUEST[Email],"Ihre Zugangsdaten",$String,"FROM: Studienleistung-Lernsystem\n");  show($String,$Showquery);
     if ($gesendet) echo "&nbsp;<p><h3><center>Ihre Zugangsdaten wurden an Ihre Adresse ".$_REQUEST[Email]." gesendet!</center></h3>";
    else echo "&nbsp;<p><h3><center>Leider konnten Ihre Daten nicht an die Adresse ".$_REQUEST[Email]." gesendet werden</center></h3>";
  }else echo "&nbsp;<p><h3><center>Diese Emailadresse ist uns nicht bekannt</center></h3>";  //2
 }else echo "&nbsp;<p><h3><center>Keine Verbindung zur Datenbank !</center></h3>";            //1
