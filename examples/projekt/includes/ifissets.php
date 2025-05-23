<?php
var_dump($_REQUEST);
  if (isset($_REQUEST[kennung]))  { $Kn=$_REQUEST[kennung];}
  if (isset($_REQUEST[passwort])) { $Pw=$_REQUEST[passwort];}
  
    if (isset($_REQUEST[Aktion]))  { $Aktion=$_REQUEST[Aktion];}
    if (isset($_REQUEST[modus]))   { $Modus=$_REQUEST[modus];}
    if (isset($_REQUEST[hintbool])){ $Hintbool=$_REQUEST[hintbool];}
    if (isset($_REQUEST[hints]))   { $Hints=$_REQUEST[hints];}
    
    if (isset($_REQUEST[start]))   { $start=1;} else $start=0;

  if (isset($_REQUEST[eb0])){ $EB0=$_REQUEST[eb0];}
  if (isset($_REQUEST[eb1])){ $EB1=$_REQUEST[eb1];}
  if (isset($_REQUEST[eb2])){ $EB2=$_REQUEST[eb2];}

  if (isset($_REQUEST[Showquery])){ $Showquery=$_REQUEST[Showquery];}
  if (isset($_REQUEST[Showarray])){ $Showarray=$_REQUEST[Showarray];}

?>
