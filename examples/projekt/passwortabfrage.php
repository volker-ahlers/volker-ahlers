<?php
session_start();

$Recht=0;
$Ukap="";
$titel="Passwortabfrage";
$css ="format.css";
$flag=0;
$EB0=0;

include "includes/head.php";
include "includes/ifissets.php";

echo "kennung: ".$Kn;
if ($Kn!="" ){   //0!                                            //Felder ausgefüllt??
 if ($Pw!="" ){ //0.5!
////////////////////////////CONTROL//////////////////////////////////////////////////////////////

$sql_query="SELECT * FROM user WHERE kennung='".$Kn."';";
 $result=mysql_query($sql_query,$db);                                           //In Vertretertabelle wird nach übereinstimmenden Kennung/Passwort gesucht
  if($result){  //1
   $User=mysql_fetch_array($result);
    if($User[kennung]!=""){//2
    
$sql_query2="SELECT * FROM user WHERE kennung='".$Kn."' AND passwort='".$Pw."';";
 $result=mysql_query($sql_query2,$db);                                          //In Vertretertabelle wird nach übereinstimmenden Kennung/Passwort gesucht

if($result){   //3
   $flag=0;
    $User=mysql_fetch_array($result);

       if($User[UID] != "" ){

        $User_ID = $User[UID];
        $Name    = $User[nachname];
        $Anrede  = $User[anrede];
        $Recht   = $User[recht];
        $EB0     = $User[kap];
        $EB1     = $User[kap2];
        $EB2     = $User[kap3];
        $flag    = 1;
        $Zeile   ="&nbsp;<p>Guten Tag ".$User[anrede]." ".$User[nachname]." !<p>".debug();

        $sql_query3="UPDATE user SET lastlogin='".(date("Y-m-d H:i:s"))."' WHERE UID='".$User_ID."';";
        $result=mysql_query($sql_query3,$db);
       }

     if ($flag==0){

      Echo "<center>";

       Echo "&nbsp;<p><H4>Haben Sie vielleicht Ihr Passwort vergessen ?<p></H4>".debug();
       Echo "<H4>Geben Sie bitte hier Ihre Emailadresse ein, <br>dann werden Ihnen Ihre Zugangsdaten zugesendet<p></H4>".debug();

     }

 if ($flag==1){
                      divbox("hallo");
                      Echo "<strong>".$Zeile."</strong>".debug();
                      if($EB0>0){
                      Echo "Wollen Sie mit dem letzten Kapitel weitermachen?<p>";                       /*hilfe("hilfe",$Recht); */
                      include "includes/aufteilung.php";
                      
                      $Kap=$Sosys[$EB0][$EB1];
                      echo linker("sonnensystem.php?eb0=".$EB0."&eb1=".$EB1."&eb2=".$EB2."&start=go","Zu&nbsp;Kapitel: \"".$Kap."\"<p>"); //".(${$Kap}[$Ukapitel])."
                      Echo "Oder erneut beginnen?<p>";
                      }
                      //////////////////
                      echo linker("sonnensystem.php?eb0=0&eb1=0&eb2=2&start=go","Zur&nbsp;Übersicht");
                      echo "</div>";
                      }
     }  //3
    }else{
             if ($flag==0){

      Echo "<center>";

       Echo "&nbsp;<p><H4>Haben Sie vielleicht Ihre Kennung vergessen ?<p></H4>".debug();
       Echo "<H4>Geben Sie bitte hier Ihre Emailadresse ein, <br>dann werden Ihnen Ihre Zugangsdaten zugesendet<p></H4>".debug();
     }
       echo "&nbsp;<p><h5><center>Oder registrieren Sie sich bitte oder schreiben Sie eine Email an mailmir_mal@yahoo.de</center></h5>".debug();} //2
  }else{echo "&nbsp;<p><h3><center>Keine Datenbankverbindung möglich !</center></h3>".debug();  } //1

     if ($flag==0){

      Echo "<center>";
       $route="anmeldung/mailto.php";
       form($route);
       hidden("Kennung",$_REQUEST[kennung]);
       eingabe("Email","",50,20);
       Echo "<p>";
       button("submit","&nbsp;&nbsp;&nbsp;Senden&nbsp;");
       Echo  "</div></form>" ;
     }
 }else{echo "&nbsp;<p><center>Bitte geben Sie Ihr Passwort ein !</center>";}   //0.5!
}else{echo "&nbsp;<p><center>Bitte geben Sie Ihre Kennung ein !</center>";}   //0!

///////////////////////////ende der Vollständigkeitsüberprüfung////////////////////////////////

include "includes/controlpanel.php";                                            //Anzeige von Queries für Programmierer
show($sql_query,$Showquery);
show($sql_query2,$Showquery);
show($sql_query3,$Showquery);
showarray($_SESSION,$Showarray);
echo linker("includes/impressum.php\"target=\"_blank\"","<p>Impressum");
echo "<p>";
if ($Recht==1) echo linker("fragen/import.php\"target=\"_blank\"","<p>Fragenimport");
Echo "</body></html>";                                                          //Ende des HTML-Dokumentes
?>

