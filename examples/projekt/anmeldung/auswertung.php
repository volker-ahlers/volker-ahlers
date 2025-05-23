<?php
session_start();

$titel="Eintrag in Datenbank";                                                  //Größe der angezeigten ebene0
  $css ="../format.css";
    include "../includes/head2.php";                                            //Header HTML
      echo "<p>&nbsp;".debug();
        echo "<center>".debug();
         $results = new resultset;
         
   $go=0;
                                                                                         //not empty and no double !???
   $sql_query="SELECT UID FROM user WHERE vorname='".trim($_REQUEST['Vorname'])."'
    AND nachname='".trim($_REQUEST['Nachname'])."' AND geburtsdatum = '".date_german2mysql($_REQUEST['Geburtsdatum'])."' ";
     $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );

   if($result){
       if(mysql_num_rows($result)<1) $go=1;
        else echo "Sie sind bereits registriert !<br>";
   }else echo " 'User'-abfrage für doppelte Einträge nicht erfolgt!<br>";
   
     if($go==1){
         $go=0;
         $sql_query="SELECT UID FROM user WHERE kennung='".trim($_REQUEST['Kennung'])."';";
          $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );

   if($result){
       if(mysql_num_rows($result)<1)$go=1;
        else echo "Diese Kennung ist schon vergeben<br>";
     }
   }

     if($_REQUEST['Vorname']=="" or $_REQUEST['Nachname']=="" or $_REQUEST['Geburtsdatum']=="" or $_REQUEST['Kennung']=="" or $_REQUEST['Passwort']==""){$go=0;echo "Bitte die erforderlichen Felder ausfüllen";}
     
   if($go==1){
       include "insertUserQuery.php";                            //Befehlsketten für Datenbank mit den Parametern aus dem Formular, erneuerte Daten werden aus dem Formular übernommen...
       $go=0;
        $result2=$results->send($sql_query2,$db,$Showquery,$Recht,__FILE__ );
         if($result2){echo "<p>Der Neueintrag war erfolgreich";$go=1;$Aktion="neu";}// Information für den Nutzer
          else echo " Eintrag in DB 'user' erfolglos !";
   }
     

   
 if($go==0 ){
  form ("anmeldeform.php");
    hidden("Anrede",$_REQUEST[Anrede]);
     hidden("Vorname",$_REQUEST[Vorname]);
      hidden("Nachname",$_REQUEST[Nachname]);
       hidden("PLZ",$_REQUEST[PLZ]);
        hidden("Ort",$_REQUEST[Ort]);
         hidden("Strasse",$_REQUEST[Strasse]);
          hidden("Kennung",$_REQUEST[Kennung]);
           hidden("Passwort",$_REQUEST[Passwort]);
            hidden("Email",$_REQUEST[Email]);
             hidden("Geburtsdatum",$_REQUEST[Geburtsdatum]);
               button("submit","neuer&nbsp;Versuch");
                 echo  "</form><p>".debug();
                   echo "Bitte versuchen Sie es erneut !";
  }
   $route="../index.php";                                                          //Diese ebene0 wird als Aktion dem Formular übergeben, vorherige Aktion wird wieder übergeben
     form ($route);                                                               //Formularaufruf mit Parametern für Aktion und Umbruch
       if($result2)button("submit","Einloggen");                                    //Buttonfeld mit diversen Format-Parametern
         echo  "</form>".debug();                                                     //Formularende
           echo "</center>".debug();

Echo "</body></html>";
showarray($_SESSION,$Showarray);
?>
