<?php
session_start();
 $css  ="../format.css";
    include "../includes/head2.php";
   include "../includes/aufteilung.php";
    $results = new resultset;
//---------------------------------------Fragenanteil---------------------------------------
   $sql_query="SELECT COUNT(*) FROM userfragen WHERE UID = ".$User_ID." AND kap =".$EB0." AND kap2 = ".$EB1." AND modus = '".$Modus."';";
    $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
     if($result){$anz=mysql_result($result, 0, 0);}
       
   $sql_query="SELECT COUNT(*) FROM userfragen WHERE UID = ".$User_ID." AND kap =".$EB0." AND kap2 = ".$EB1." AND richtig = 1 AND modus = '".$Modus."';";
    $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
     if($result){$right=mysql_result($result, 0, 0);}
     
   $sql_query="SELECT SUM(punkte), SUM(maxpkt) FROM userfragen WHERE UID = ".$User_ID." AND kap =".$EB0." AND kap2 = ".$EB1." AND modus = '".$Modus."';";
    $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
     if($result){$points=mysql_result($result, 0, 0);}
     if($result){$mxpnts=mysql_result($result, 0, 1);}

  echo "<center>".debug();
   tablestart(0,"50%","ausw");
    echo "<tr><td>".debug();
     echo "<p>&nbsp;<p>&nbsp;<p>&nbsp;<p>&nbsp;<p>".debug();
      echo "<center>".debug();
       echo "<strong>".debug();
        echo "<p>Sie haben ".$right." Fragen von ".$anz." Fragen richtig beantwortet !<p>";
         if($anz>0)$prozent=(100*$right)/$anz;
          echo "Das ist eine Trefferquote von ".round($prozent,2)." Prozent!<p>";
           echo "<p>Und Sie haben ".$points." von ".$mxpnts." Punkten erreicht!<p>";
            if($mxpnts>0)$prozent2=(100*$points)/$mxpnts;
             echo "Das ist eine Quote von ".round($prozent2,2)." Prozent!<p>";

//----------------------------------------------Zeittracking---------------------------------------

   $sql_query="SELECT SUM(zeit) FROM utrack WHERE kap = ".$EB0." AND UID='".$User_ID."';";
    $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
     if($result){$min=mysql_result($result, 0, 0);}
      $min=(int)($min/60);

   $sql_query="SELECT kaptim".$EB0." FROM adjust;";
    $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
     if($result){$empf=mysql_result($result, 0, 0);}

     if($Modus=="test")
     echo "Sie haben ".$min." Minuten mit dem Lesen des Kapitels ".$Sosys[$EB0][0]." verbracht, empfohlen haben wir ".$empf." Minuten.";
     $tproz=(100*$min)/$empf;
     $tproz=round($tproz);
     

if($Modus=="test"){
       if($prozent<20){
           $String="Das Ergebnis ist nicht so toll, ";
           if($tproz<70 ) echo $String."Sie haben aber auch wirklich nicht lange genug im Kapitel gelesen!<p>".debug();
           if($tproz>70 ) echo $String."lesen Sie bitte noch ein wenig nach?<p>".debug();
           if($tproz>=99) echo $String."aber gelesen haben Sie genug, vielleicht haben Sie sich ein wenig auf spezielle Kapitel festgelegt und darüber andere vergessen?<br>Versuchen Sie es doch noch einmal!<p>".debug();
       }
        elseif($prozent<50){
           $String="Das Ergebnis könnte besser sein, ";
           if($tproz<70 )echo $String."Sie haben aber auch wirklich nicht lange genug im Kapitel gelesen!<p>".debug();
           if($tproz>70 )echo $String."lesen Sie bitte noch ein wenig nach?<p>".debug();
           if($tproz>=99)echo $String."aber gelesen haben Sie genug, vielleicht haben Sie sich ein wenig auf spezielle Kapitel festgelegt und darüber andere vergessen?<br>Versuchen Sie es doch noch einmal!<p>".debug();
       }
        elseif($prozent<80){
           $String="Ein gutes Ergebnis, ";
           if($tproz<70 )echo $String."Sie haben aber auch wirklich nicht geschummelt?<p>".debug();
           if($tproz>70 )echo $String."wenn Sie weiterlesen, gelingt es Ihnen noch besser<p>".debug();
           if($tproz>=99)echo $String."und gelesen haben Sie genug!<br>Versuchen Sie es gerne noch einmal!<p>".debug();
       }
        elseif($prozent<100){
           $String="Ein sehr gutes Ergebnis, kaum zu übertreffen! ";
           if($tproz<70 )echo $String."Sie haben aber kaum den Text gelesen, haben Sie etwa geschummelt?<p>".debug();
           if($tproz>70 )echo $String."gelesen habenn Sie ausreichend!<p>".debug();
           if($tproz>=99)echo $String."gelesen haben Sie genug!".debug();
       }

        elseif($prozent==100){
           $String="Herzlichen Glückwunsch, Sie haben alles richtig beantwortet, ";
           if($tproz<70 )echo $String."Sie haben aber kaum den Text gelesen, Sie haben definitiv geschummelt!<p>".debug();
           if($tproz>70 )echo $String."gelesen haben Sie ausreichend!<p>".debug();
           if($tproz>=99)echo $String.debug();
       }
}


if($Modus=="proov"){
       if($prozent<20)echo "Das Ergebnis ist nicht so toll, haben Sie alle Kapitel überhaupt gelesen?<p>".debug();
        elseif($prozent<50)echo "Das Ergebnis ist nicht so toll, lesen Sie sich bitte alle Kapitel noch einmal genau durch?<p>".debug();
         elseif($prozent<80)echo "Ein gutes Ergebnis, wenn Sie weiterlesen, gelingt es Ihnen noch besser<p>".debug();
          elseif($prozent<100)echo "Ein sehr gutes Ergebnis, kaum zu übertreffen".debug();
           elseif($prozent==100)echo "Herzlichen Glückwunsch, Sie haben alles richtig beantwortet<p>".debug();
}

echo "</td></tr>".debug();
echo "</table>".debug();
        echo "</strong>".debug();
        echo linker("../sonnensystem.php?eb0=".$EB0."&eb1=".$EB1."&eb2=2&open=open&start=go","<p>Zurück zu ".$Sosys[$EB0][$EB1]);
         echo "<p>";
         echo linker("../abschied.php","<p>Auf Wiedersehen?");
          echo "</center>".debug();
          
          
if($Modus=="proov"){
//Beantwortete Prüffragen auf 0 setzen
    $sql_query="DELETE FROM userfragen WHERE UID = ".$User_ID." AND modus='proov' ;";
     $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
}

   echo "</body></html>".debug();
  include "../includes/controlpanel.php";
 showarray($_SESSION,$Showarray);
?>
