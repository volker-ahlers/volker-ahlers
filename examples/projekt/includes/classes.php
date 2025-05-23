<?php

class resultset{

    function send($sql_query,$db,$Showquery,$Recht,$pfad){
            $result=mysql_query($sql_query,$db);
            if(!$result)if($Recht==1)echo "<br>".$pfad."<br><strong>".mysql_error($db)."</strong>";
            show($sql_query."<p>",$Showquery);
            return $result;
        }
    }
?>
