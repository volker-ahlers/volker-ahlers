<?php
session_start();


$css  ="format.css";
 //echo "<pre>";print_r($_SERVER);echo "</pre>";echo $_SERVER[PHP_SELF];
  include "includes/aufteilung.php";
   include "includes/head.php";
    include "includes/ifissets.php";
    $content =0;
     $start=0;
      $weiter=0;
       $results = new resultset;
 if (isset($_REQUEST[track]))include"includes/tracking.php";
        $schummel=0;
         $proovend=0;
          $strafpredigt="<p><p><p><strong><center>Leider müssen wir Ihnen mitteilen, dass uns verraten wurde, dass sie ein zweites Fenster in der Planeteninformation geöffnet haben";
           $strafpredigt.=" und das ist während einer Prüfung nicht erlaubt, ihre Prüfung wird jetzt abgebrochen, Sie können Sie aber gerne wiederholen!</strong></center>";
if($Modus=="proov")echo "<h3 ID=\"pro\">Achtung Prüfung</h3><p>";
//////////////////////////////////////////////////////////////////////////falsch beantwortete testfragen löschen
if($Aktion=="falsch"){
    $sql_query="DELETE FROM userfragen WHERE UID = ".$User_ID." AND kap = ".$EB0." AND kap2 = ".$EB1." AND richtig = 0 ;";
      $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
      echo "<strong>Nun können Sie sich verbessern!</strong><br>";
    }
///////////////////////////////////////////////////////////////////////////alle beantworteten testfragen löschen
if($Aktion=="nommal"){
    $sql_query="DELETE FROM userfragen WHERE UID = ".$User_ID." AND kap = ".$EB0." AND kap2 = ".$EB1." ;";
      $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
      echo "<strong>Nun können Sie sich erneut versuchen!</strong><br>";
    }
///////////////////////////////////////////////////////////////////////////Kontrolle, ob jmd schummelt
//--------------------------------------------------------------------------------------------------------
//Hier wird pbool auf Status = 1 gesetzt, also , "in Prüfung befindlich", auf der Anzeigeseite wird es
//wieder umgestellt, somit lässt sich abfragen, ob er seinen Account ein zweites mal aufruft, um während der Prüfung nachzulesen, :-)
if($Aktion=="pstart"){
$pbool=1;
include "fragen/proofboolset.php";
//--------------------------------------------------------------------------------------------------------
//Abfrage, ob schon Prüffragen beantwortet wurden, da nach der Auswertung alle gelöscht werden, heißt anz>0:
//der User hat unterbrochen bzw geschummelt (was zum Abbruch führt)
    $sql_query="SELECT COUNT(*) FROM userfragen WHERE UID = ".$User_ID." AND modus='proov' ;";
      $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
      if($result){$anz=mysql_result($result, 0, 0);}
       if($anz>0)echo "<p><strong>Nana, sie können eine Prüfung doch nicht unterbrechen, oder haben Sie sogar geschummelt ???!!!<br>Sie müssen nun leider wieder von vorne anfangen!</strong>".debug();
        else echo "<p><strong>Wir wünschen gutes Gelingen und bitte beachten Sie, dass eine Prüfung weder unterbrochen werden darf, noch darf geschummelt werden<br> Viel Erfolg!!!</strong>".debug();
//--------------------------------------------------------------------------------------------------------
//Beantwortete Prüffragen auf 0 setzen, das gleiche geschieht auch direkt nach der Prüfauswertung !
    $sql_query="DELETE FROM userfragen WHERE UID = ".$User_ID." AND modus='proov' ;";
      $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
}
//--------------------------------------------------------------------------------------------------------
//Voreinstellungen aus der adjusttabelle werden ausgelesen und Prüfungsfragenanzahl ermittelt
 $sql_query="SELECT prvlim as lim FROM adjust;";
   $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
   if($result)$Proovlim=mysql_result($result, 0, 0);

   ///////////////////////Schummelabfrage///////////////////////////////////////////////
//--------------------------------------------------------------------------------------------------------
if($Modus=="proov"){
     $sql_query="SELECT pbool FROM user WHERE UID=".$User_ID.";";
       $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
       if($result)$schummel=(1-mysql_result($result, 0, 0));
   }

$Aktion="";
///////////////////////Auswertung///////////////////////////////////////////////
//--------------------------------------------------------------------------------------------------------
if(isset($_REQUEST[ID])){
    $sql_query="SELECT * FROM fragen where ID = ".$_REQUEST[ID]." ;";           //Frage_ID wird beim Absenden (unten) verschickt und hier wieder überprüft
      $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
      $ff=0;                                                                    //fehlerquote
    
 if($result){

  if(isset($_REQUEST[txt])){                                                    //Textfeld !! Max 1 Punkt möglich
    if($_REQUEST[txt]!=""){
        $max=1;
         $txt=mysql_result($result, 0, 6);
          if($Recht==1)echo $txt." / ".$_REQUEST[txt]."<br>";
           if(strcasecmp($txt,$_REQUEST[txt])!=0) $ff++;                        //Die Antwort wird ausgewertet
            $content =1;

  }else $content=0;                                                                //keine Eingabe
 }else{                                                                         //kein textfeld, sondern radio oder check

 $richtig=NULL;
 $richtig[0]=0;
 $korrekt=0;

    while($vergl=mysql_fetch_assoc($result)){
      $max=$vergl[AnzR];
        $array = explode('+', $vergl[richtig]);
          for($i=0;$i<count($array);$i++)
             {array_push($richtig,$array[$i]);}
          }
        
        if(count($_REQUEST[test])==0)$content=0;else $content =1;               //d.h.es wurde kein Eintrag gemacht
    }
}else echo mysql_error($db);
if($content==1)                                                                 //Eingabe wurde gemacht !
   include "fragen/punkte.php";


}  else {$start=1;                                                              //Start, es wurde keine Frage_ID gesendet, ID != 0, bei Hinweiswechsel wird eine ID gesendet !
         $_REQUEST[anz]="1";}                                                   //siehe zeile 157


if(isset($_REQUEST[Showarray]) or isset($_REQUEST[Showquery]) or isset($_REQUEST[hintbool]))$wechsel="true"; else $wechsel="false";


//-----------------------------------------------------------------------------Fragenauslesung und -darstellung

 if($Hints>=$Hintmax and $content==1){    //$Hints>=$Hintmax -->alle Hinweise wurden gezeigt und $content==1 -->es wurde etwas eingetragen
 
     $weiter=1;            //löst neue Frage aus, beim ersten Aufruf gibbs koi Hint !
  }

if ($korrekt==1 or $weiter==1){ //wenn hinweise am ende oder frage richtig beantworetet und keine leereingabe  eintrag in userfragen
     $sql_query="INSERT INTO userfragen VALUES ('','".$User_ID."','".$_REQUEST[ID]."','".$EB0."','".$EB1."','".$korrekt."','".$punkte."','".$max."','".$Modus."','1') ;";
      if($content==1) $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
        $weiter=1;
}

 include "fragen/counter.php";
      

   if($anz>=$Proovlim and $Modus=="proov")$proovend=1;                            //Alle Prüffragen beantwortet
//---------------------------------------------------alte Frage/neue Frage-------------------------------------------------------------
if ($start==1 or $weiter==1){

   include "fragen/questquery.php";                                             //Neue Frage wird ausgelöst
   $Hints=0;                                                                    //Hinweiscounter reset
   }else{
    $sql_query="SELECT * FROM fragen WHERE ID = ".$_REQUEST[ID]." ;";           //gleiche Frage
      $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
   }
   
/*keine Auswertung zu beginn der Fragenrunden, also wäre $weiter =0 und es wird ohne -->$start keine Frage generiert
andererseits soll eine neue Frage erscheinen, wenn richtig beantwortet, unbeachtet der Hints --> korrekt==1  --> weiter =1
man beachte, das weiter auf 1 gesetzt wird, wenn die anzahl der gelesenen hint > als= der vorhandenen !!
Wenn Hints abgeschaltet sind, werden keine Hints eingelesen und somit anhand $Hints>=$Hintmax jedesmal eine neue Frage generiert (hintmax =1)
beim Hinweisstatuswechsel auf anzeigen   wird die Zahl der gelesenen hints als 0 übergeben, es werden zwar keine Frageformularwerte,
aber die dazugehörige ID der aktuellen Frage wird im link mit übergeben (s.u) somit bleibt flag=0 (kein userfrageneintrag und start= 0, es
wird also die gleiche Frage ausgelöst, und keine neue, .
if (!isset($_REQUEST[hintbool]))  verhindert die anzeige von unpassenden texten, die sonst dadurch ausgelöst würden, weil keine formulare übergeben würden
(entspr:keine Eingabe) bzw alles angeklickt, weil zahl der fragen = zahl der klicks , beide 0 */
//--------------------------------------------------------------------------------------------------------
  $anzf=0;
 if($schummel==0){        //1
  if($proovend==0){      //2                                                                     //Flag
   if($result){
    form("fragen.php");
     tablestart(0,"90%","fragen");
      echo "<tr><td>";
         //echo count($_REQUEST[test])." / ".$_REQUEST[anz]."/".$start."/".$Hintbool;
          while($frage=mysql_fetch_array($result)){
           hidden("ID",$frage[ID]);
            echo "<h3>Frage ";
             if($Recht==1 or $Recht==2) echo $frage[ID];
             echo ": ".$frage[Fragen]." ?</h3><p>".debug();      //Darstellung der Frage
             $array = explode('+', $frage[hinweise]);
              if ($wechsel=="false")
               if($content==0){echo "<p><strong>Sie haben keine Eingabe gemacht!</strong>";}  //wird durch -row- nicht mehr angezeigt, wenn alle Fragen beantwortet
                $Hintmax=count($array);
                 if($Hintbool==0){$Hintmax=1;$Hints++;}                                   //Da Hints sonst nicht hochgezählt wird !!  hints ausgeblendet
                  if ($wechsel=="false")
                   if(count($_REQUEST[test])==$_REQUEST[anz] ) echo "<p><strong><font color=#ffff00>Alles anklicken gilt nicht !! :-( </font><strong>";
                    //Anzahl der abgesendeten Aw wird verglichen mit gesendeter anzahl gestellter Fragen, nur ein textfeld hat die anzahl 1, wird aber nicht als arry abgesendet, somit sind
                    // anz und $_REQUEST[test] nie 1, anz wird zu 1 gemacht, wenn keine Frage ID übergeben wird (zur Auswertung oder so)
                      if($weiter==0 and $start==0 and $Hintbool==1 and $content==1)echo "<p><strong>Hinweis ".($Hints+1)." von ".$Hintmax." :&nbsp;&nbsp;".$array[$Hints++]."</strong>".debug();             //Hinweiscount
                       $arrayq = explode('+', $frage[Aw]);                                        //Antwortmöglichkeiten trennen
                        $anzf=count($arrayq);                                                     //Antwortmöglichkeiten zählen
                         $fid=$frage[ID];  //für Hinweise an/aus
                          tablestart(0,"50%","fragen");
                           Zeilenanfang();
                            leer();
                             neueZeile();
                              for ($i=1;$i<=$anzf;$i++) {
                               if($frage[Typ]==1){eingabe("txt","",20,20); neueZeile();}
                                if($frage[Typ]==2){radio("test[]"," <strong>".$arrayq[$i-1]."</strong>", $i); neueZeile();}         //Name, Text,Wert
                                 if($frage[Typ]==3){checkbox("test[]".$i," <strong>".$arrayq[$i-1]."</strong>", $i); neueZeile();}    //Name, Text,Wert
                            }
                            hidden("anz",$anzf);
                           leer();
                          Zeilenende();
                         echo "</table>".debug();
                          $array = explode('+', $frage[richtig]);

                           $tmp=count($array);
                            for($i=0;$i<$tmp;$i++){
                              hidden("right[]",$arrayq[($array[$i]-1)]);
                            }
//                          if ($Recht==1){print_r($right);echo "<p>&nbsp;";}
           }
           
           echo "</td></tr></table>".debug();
          if($anzf>0)button("submit","Absenden");                                  //solange Fragen da sind ...
        }else echo "Leider keine Verbindung zur Fragentabelle.".debug();        // wird bei Fragengenerierung hochgezählt, 0 heißt, es gab koi Frage mehr
       }  //2
      if($anzf==0){echo "<p>Sie haben alle Fragen in diesem Kapitel beantwortet!<p>".debug();
                        echo linker("fragen/testausw.php","Auswertung","frage");
                  }
   } //1
   else echo $strafpredigt;
//----------------------------------------------------------------------------------------------------------------                                                                                                       //sende: alle fragen beantwortet !
     echo "</form>".debug();
      echo "</form>".debug();
    if($Hintbool==1 and $Modus=="test" and $anzf>0)echo linker("fragen.php?ID=".$fid."&hintbool=0","<p>Hinweise&nbsp;aus!");      //Hinweiscounter reset
    if($Hintbool==0 and $Modus=="test" and $anzf>0)echo linker("fragen.php?ID=".$fid."&hintbool=1&hints=0","<p>Hinweise&nbsp;an!");       //Hinweiscounter reset
    if($Modus=="test" or $schummel==1)echo linker("sonnensystem.php?eb0=".$EB0."&eb1=".$EB1."&eb2=2&open=open&start=go","<p>Zurück zu ".$Sosys[$EB0][$EB1]);
    
   echo "</body></html>".debug();
    if($anzf>0)include "includes/controlpanel.php";
 showarray($_SESSION,$Showarray);

?>

