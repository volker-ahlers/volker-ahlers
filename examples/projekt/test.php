<?php              //Zugang zur Passwortabfrage von Usern und Zutrittsberechtigung zur Lernsoftware

//session_start();
//session_register('User_ID','Recht','EB0','EB1','Kap','Abs','Aktion','Arrows','Showquery','Showarray');


$inis = ini_get_all();
echo "<pre>";
print_r($inis);
               /*
$d= date("d.m.Y", strtotime("tuesday"));
$e= date("d.m.Y", strtotime("yesterday"));

   echo "<p>";
   echo $d;
   echo "<p>";
   echo $e;
   echo "<p>";
   
echo ($d - $e);
     echo "<p>";
echo (date("d.m.Y", strtotime("friday"))-date("d.m.Y", strtotime("yesterday"))-1);
?>
