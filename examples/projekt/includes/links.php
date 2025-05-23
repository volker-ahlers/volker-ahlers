<?php

    labeltr("&nbsp;");
     labeltr("Das&nbsp;Sonnensystem","head");
      labeltr("&nbsp;");
       labeltr("&nbsp;"); //echo $dir;

         for($i=0;$i<count($Sosys);$i++){
          include "includes/timetrack.php";
           echo linker("sonnensystem.php?eb0=".$i."&eb1=0&eb2=".$tt,($Sosys[$i][0]),"ober");    //Kapitelüberschriften
           
            if($EB0==$i) {
              for($j=1;$j<count($Sosys[$i]);$j++) {
                 echo tr(linker("sonnensystem.php?eb0=".$i."&eb1=".$j."&eb2=2",($Sosys[$i][$j]),"unter"));  //Verlinkung zu den einzelnen Unterkapiteln
                  if($EB1==$j){
                   for($k=3;$k<count($files);$k++){
                     echo tr(linker( "sonnensystem.php?eb0=".$i."&eb1=".$j."&eb2=".$k, ucfirst (substr($files[$k],2,-4)),"drunter"));
                 }       ////Verlinkung zu den einzelnen Unterunterkapiteln
            }
          }labeltr("&nbsp;");
        }
  }
      include "fragen/questquery.php";                                           //öfters benutzter DB_request
       echo "<p>";
///////////////////////////////////Fragelinks/////////////////////////////////////////////////////////////////////
  if (isset($_REQUEST[open]))$open=$_REQUEST[open];else $open="closed";
  
  $sql_query="SELECT COUNT(*) AS count FROM fragen WHERE kap =".$EB0." AND kap2 = ".$EB1." ;"; //Sind Fragen vorhanden ?
   $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
     if($result)$count=mysql_result($result, 0, 0);
     
       neueZeile();
        if($open=="closed")
         echo tr(linker("sonnensystem.php?eb0=".$EB0."&eb1=".$EB1."&eb2=".$EB2."&open=open","Testing","ober"));
        if($open=="open"){
         echo tr(linker("sonnensystem.php?eb0=".$EB0."&eb1=".$EB1."&eb2=".$EB2,"Testing","ober"));
          if($count>0){
           neueZeile();
            include "fragen/questquery.php";
             echo "<p>";
           if($result)
            if(mysql_num_rows($result)>0)  //Fragen zu den einzelnen Kapiteln
             echo tr(linker("fragen.php?modus=test&hintbool=1&track=on","Zu den Fragen","frage"));
              else {
               echo tr(linker("fragen/testausw.php","Auswertung","frage"));
                }
                  include "fragen/questusercount.php";
                 if($cnt>0)            //Es wurden im jeweiligen Kapitel Fragen beantwortet
                echo tr(linker("fragen.php?Aktion=nommal&modus=test&hintbool=1&track=on","Aufs&nbsp;Neue!","frage"));
               include "fragen/questfalsquery.php";
            if($cnt>0)  //Es wurden im jeweiligen Kapitel Fragen falsch beantwortet
          echo tr(linker("fragen.php?Aktion=falsch&modus=test&hintbool=1&track=on","Fehlerkorrektur","frage"));
       }
         $sql_query="SELECT COUNT(*) AS count FROM fragen ;"; //Sind Fragen vorhanden ?
        $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
       if($result)$count=mysql_result($result, 0, 0);
      if($count>0)
     echo tr(linker("fragen.php?modus=proov&hintbool=0&Aktion=pstart&track=on","Prüfung","frage"));
   }
   echo tr(linker("includes/impressum.php\"target=\"_blank\"","<p>Impressum"));
    labeltr("&nbsp;");
   show($sql_query1."/".$count,$Showquery);
?>
