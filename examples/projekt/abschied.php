<?php
session_start();
 $css  ="format.css";

  $Kap=$Sosys[$EB0][$EB1];       //Kapitel wird aus array gewählt
  $titel  ="Abschied";

  include "includes/head.php";
  $results = new resultset;
  
    echo "<center><p>&nbsp;<p>&nbsp;<p>&nbsp;<p>&nbsp;<p>&nbsp;<p>Wir bedanken uns für Ihr Interesse und hoffen, Sie bald wieder hier begrüßen zu dürfen!<p>";
    echo "Wenn Sie Kritik oder Anregungen an uns haben, schreiben sie uns eine Email an <p /><a ID=\"mail\" href=\"mailto:mailmir_mal@yahoo.de\">mailmir_mal@yahoo.de</a><p />Wir würden uns sehr darüber freuen!<p>";
    echo linker("includes/impressum.php\"target=\"_blank\"","<p>Impressum");
   echo "</center>";
 include "includes/tracking.php";
echo "</body>".debug()."</html>";        //Ende des HTML-Dokumentes
?>
