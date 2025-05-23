<?php

if($Modus=="test")echo "<p>Erreichbare Punktezahl: ".$max;

 if(!isset($_REQUEST[txt])){
        array_shift($richtig);     //entfernt das erste element
            $abzug1 = array_diff ($_REQUEST[test], $richtig);
            $abzug2 = array_diff ($richtig, $_REQUEST[test]);
            $abzug  = array_merge($abzug1, $abzug2);
            $ff=count($abzug);    echo "anzahl".$ff;
 }
 
  showarray($richtig,$Showarray);
   showarray($_REQUEST[test],$Showarray);
    showarray($abzug1,$Showarray);
     showarray($abzug2,$Showarray);
      showarray($abzug,$Showarray);

        $punkte=($max-$ff);
         if($punkte<=0)$punkte=0;
           elseif ($punkte==$max){$korrekt=1; if($Modus=="test")echo "<p><h3>Richtig!! Gut gemacht</h3>";}
               elseif ($punkte<$max) if($Modus=="test")echo "<p>Fast richtig";
?>
