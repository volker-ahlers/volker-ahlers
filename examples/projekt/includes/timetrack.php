<?php
 $los=0;
 $tt=2;
//Voreinstellungen aus der adjusttabelle werden ausgelesen und ...
 $sql_query="SELECT welchits as hits, welctime as time FROM adjust;";
   $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
   if($result){$wlhits=mysql_result($result, 0, 0);
               $wltime=mysql_result($result, 0, 1);}

//hier verglichen.. das heißt, wenn jmd das Begrüßungsfenster lang/oft genug angeschaut hat, wird es nicht mehr angezeigt
 $sql_query="SELECT SUM(hits), SUM(zeit) FROM utrack WHERE kap = ".$i." AND kap2 = 0 AND kap3 = 2 AND UID='".$User_ID."';";
   $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
     if($result){$hits=mysql_result($result, 0, 0);}
      if($result){$tim=mysql_result($result, 0, 1);}
       if($hits>=$wlhits)$tt=3; else $los=1;   //Variable für den Link auf folgende Seite
            if($Recht==1)echo $hits."/".$wlhits."/".$tim."/".$wltime;
?>
