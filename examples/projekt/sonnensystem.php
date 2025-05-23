<?php
session_start();
 $css  ="format.css";
 include "includes/aufteilung.php";
 include "includes/ifissets.php";

  $Kap=$Sosys[$EB0][$EB1];       //Kapitel wird aus array gew�hlt
  $titel  ="Kapitel ".$Kap;
  $Hintbool=1;                      //defaultselect f�r Hinweise (=AN)
  $dir    = "kapitel/".strtolower($Sosys[$EB0][0])."/".strtolower($Kap);
 include "includes/head.php";
    $results = new resultset;
     $files = scandir1($dir);
     sort($files);
  //   print_r($files);
      $Hints=0;
 ///////////////////////////////////////////////

   tablestart(0,0);
    echo "<tr valign=\"top\">".debug();
      echo "<td>".debug();
        tablestart(0,0);
          include "includes/links.php";
        //Zeilenende();
      echo "</table>".debug();
    echo "</td><td>";

    tablestart(0,0);
      echo "<tr valign=\"top\">".debug();
        echo "<td>".debug();
         $Datei=file("kapitel/".strtolower($Sosys[$EB0][0])."/".strtolower($Kap)."/".$files[$EB2]);
           $j=0;
            echo "<h1>".$Kap."</h1>".debug();
             echo $Datei[0];
              echo '<div id="foto">'.debug();
                echo "<a href=\"sonnensystem.php?eb0=".$EB0."&eb1=".$EB1."&eb2=".$EB2."\"><img src=\"images/".strtolower($Kap).".jpg\" alt =\"".$Kap."\"/></a>".debug();
                echo "</div>".debug();
                 for($i=1;$i<=count($Datei);$i++){
                  echo $Datei[$i];
                  }
         if($EB1==0 and $los==1 and $EB2==2){
         $sql_query="SELECT kaptim".$EB0." as time FROM adjust;";
          $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
          if($result)$kpt=mysql_result($result, 0, 0);
          echo "<div ID=\"intro\">F�r das Lesen dieses ".($EB0+1).". Kapitels ben�tigen Sie in etwa ".$kpt." Minuten!</div>".debug();
           echo "<p>&nbsp;</p>".debug();
            echo "<center><h3>".debug();echo linker("sonnensystem.php?eb0=".$EB0."&eb1=".$EB1."&eb2=3", "Hier gehts los!!","los");echo "<p></h3></center>".debug();
        }
                Zeilenende();
               echo "</table>".debug();
              //echo "</div>".debug();
             echo "<p>&nbsp;</p>".debug();
            Zeilenende();
           echo "</table>".debug();

         if($EB2>2 and $EB1>0)echo linker("sonnensystem.php?eb0=".$EB0."&eb1=".$EB1."&eb2=".($EB2-1),"<- ".$Sosys[$EB0][$EB1]."/".ucfirst(substr($files[$EB2-1],2,-4)));
   else{ if($EB1>1)echo linker("sonnensystem.php?eb0=".$EB0."&eb1=".($EB1-1)."&eb2=2","<- Zu ".$Sosys[$EB0][$EB1-1]);  }
   
 echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".debug();
 
         if($EB2<(count($files)-1))echo linker("sonnensystem.php?eb0=".$EB0."&eb1=".$EB1."&eb2=".($EB2+1),$Sosys[$EB0][$EB1]."/".ucfirst(substr($files[$EB2+1],2,-4))." ->");
   else{ if($EB1<(count($Sosys[$EB0])-1))echo linker("sonnensystem.php?eb0=".$EB0."&eb1=".($EB1+1)."&eb2=2","Zu ".$Sosys[$EB0][$EB1+1]." ->");}

      echo "<p>".debug();
     if($EB1>0)echo linker("sonnensystem.php?eb0=".$EB0."&eb1=0&eb2=2","Zu&nbsp;".$Sosys[$EB0][0],"ober");
         echo "<p>".debug();
                  echo linker("abschied.php","<p>Auf Wiedersehen?");
                   echo "<p>".debug();
/////////////////////////////////////////////////////////////////////////////////
if($start==0)      //Seite wird von passwort- oder fragen.php aus aufgerufen
    include "includes/tracking.php";                                             //save last Kapitel , speichert Zeit
//Hier wird pbool auf Status = gesetzt, also , "nicht in pr�fung befindlich", aktuelles Kapitel gespeichert (user) und
//dass er es besucht hat (utrack), proofboolset.php ist integriert
  include "includes/controlpanel.php";                                          //Anzeige von Queries f�r Programmierer

showarray($_SESSION,$Showarray);
echo linker("includes/impressum.php\"target=\"_blank\"","<p>Impressum");
echo "</body></html>".debug();
?>
