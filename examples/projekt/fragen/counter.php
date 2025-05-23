<?php
if($Modus=="test"){
    $sql_query="SELECT COUNT(*) as cnz FROM fragen WHERE kap = ".$EB0." AND kap2 = ".$EB1." ;";      //Anzahl möglicher Fragen
      $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
      if($result){$max=mysql_result($result, 0, 0);}                            //Anzahl richtiger Fragen = erreichbare Punktezahl

    $sql_query="SELECT COUNT(*) as cnt FROM userfragen WHERE kap = ".$EB0." AND kap2 = ".$EB1." AND UID = ".$User_ID." AND modus = 'test';";
      $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
      if($result){$anz=mysql_result($result, 0, 0);}                            //Anzahl beantworteter Test-Fragen
}

if($Modus=="proov"){

    $max=$Proovlim;

    $sql_query="SELECT COUNT(*) as cnt FROM userfragen WHERE UID = ".$User_ID." AND modus = 'proov';";        //Anzahl möglicher Fragen
      $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
      if($result){$anz=mysql_result($result, 0, 0);}                             //Anzahl beantworteter Prüfungs-Fragen
}
        echo "<p>Sie haben ".$anz." Fragen von ".$max." Fragen beantwortet";
        
   // echo "<p>content".$content."korrekt".$korrekt."anzahl".$anz."max".$max."start".$start."weiter".$weiter;
     if($korrekt==0 and $start==0 and $weiter==1 and $Modus=="test") //$start==0 verhindert Fehlertextanzeige beim ersten start, Frage falsch beantwortet, next frage wird generiert
      {echo "<p><strong>Sie haben die Frage leider nicht korrekt beantwortet!</strong>".debug();
        echo "<strong>&nbsp;&nbsp;Richtig ist: \"";
         for($i=0;$i<count($_REQUEST[right]);$i++){
          echo $_REQUEST[right][$i];
           if($i<(count($_REQUEST[right])-1))
            echo ",&nbsp;&nbsp;";
       } echo "\"";
      }
   if($Hintbool==0 and $Modus=="test")echo "<br>Sie haben die Hinweise deaktiviert!";
   
       if($anz<$max) // sonst wars die letzte frage, es gibt keine nächste
        if($start==0 and $weiter==1)
        echo "<p><strong> Hier ist die nächste Frage!</strong>".debug();
        // print_r($_REQUEST[right]);

?>
