<?php

$sql_query="UPDATE user SET kap = ".$EB0." , kap2 = ".$EB1." , kap3 = ".$EB2."  WHERE UID ='".$User_ID."';";     //$pos= array_keys($$Kap, $Ukap);$pos=$pos[0];
 $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
 
$sql_query="SELECT hits, zeit FROM utrack WHERE UID='".$User_ID."' AND kap='".$Time[EB0]."' AND kap2='".$Time[EB1]."' AND kap3='".$Time[EB2]."' AND media='text';";
 $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );

                    $dauer=(time())-$Time[zeit];
                    show($Time[zeit]."/".time()."/".$dauer,$Showquery);
 
     if($result){
                 if(mysql_num_rows($result)>0){
                  $hit=mysql_result($result, 0, 0);
                   $tim=mysql_result($result, 0, 1);


                     $sql_query="UPDATE utrack SET hits =".($hit+1).", zeit=".($tim+$dauer)." WHERE UID='".$User_ID."' AND kap='".$Time[EB0]."' AND kap2='".$Time[EB1]."' AND kap3='".$Time[EB2]."' AND media='text';";
                      $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
                }else{
                    $sql_query="INSERT INTO utrack VALUES ('','".$User_ID."','".$Time[EB0]."','".$Time[EB1]."','".$Time[EB2]."','".$dauer."','text','1') ;";
                  $result=$results->send($sql_query,$db,$Showquery,$Recht,__FILE__ );
                }
    }
    
        $Time[EB0]=$EB0;
        $Time[EB1]=$EB1;
        $Time[EB2]=$EB2;
        $Time[zeit]=time();
 if (!isset($_REQUEST[track])){
     $pbool=0; //Hier wird pbool auf Status = gesetzt, also , "nicht in prüfung befindlich"
     include "fragen/proofboolset.php";
}
?>
