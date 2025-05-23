<?php

   if($Modus=="test")$sql_query="SELECT * FROM fragen WHERE ID NOT IN (SELECT FID FROM userfragen WHERE kap =".$EB0." AND kap2 = ".$EB1." AND UID =".$User_ID." AND modus='".$Modus."') AND kap =".$EB0." AND kap2 =".$EB1." ORDER BY RAND() LIMIT 1 ;";
   if($Modus=="proov")$sql_query="SELECT * FROM fragen WHERE ID NOT IN (SELECT FID FROM userfragen WHERE UID =".$User_ID." AND modus='".$Modus."') ORDER BY RAND() LIMIT 1 ;";
      $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
?>

