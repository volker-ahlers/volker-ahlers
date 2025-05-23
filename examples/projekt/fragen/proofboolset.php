<?php
//if($Aktion=="pstart")  ist Modus zwangläufig auf "proov"
  $sql_query="UPDATE user SET pbool =".$pbool." WHERE UID =".$User_ID." ;";
   $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
?>
