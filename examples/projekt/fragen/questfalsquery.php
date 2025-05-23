<?php
 $sql_query="SELECT COUNT(*) FROM userfragen WHERE kap =".$EB0." AND kap2 = ".$EB1." AND UID =".$User_ID." AND richtig = 0 AND modus = 'test';";
  $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
   if($result){$cnt=mysql_result($result, 0, 0);}
?>

