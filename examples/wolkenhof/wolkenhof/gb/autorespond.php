<?php

if (isset($_POST["senden"])) {

// Mail an Webmaster
$webmaster="amitriptillin@yahoo.de";

$mailinhalt = "
Gästebuch Wolkenhof - Eintrag\n
__________________\n
Person: $g_fname\n
E-mail: $g_femail\n
WWW: $g_fhome\n
__________________\n
Betreff: $g_fbetreff\n
Kommentar:\n$g_finhalt\n
__________________\n
Zeit: $g_fdatum\n
__________________\n";

@mail($webmaster, "$g_fbetreff (von $g_fname) - Eintrag", $mailinhalt, "From: $g_femail");

// Autoresponder
$datei = "text/automail.txt";
$fp = fopen($datei, "r");
$inhalt = fread($fp,filesize($datei));
fclose($fp);

@mail("$g_femail", "Team Wolkenhof - Danke für Ihren Eintrag", "$inhalt\n\n","From:$webmaster");

} else {
echo "
<html>
<head>
<title>G&auml;stebuch v1.0</title>
</head>
<body bgcolor='#FFFFFF' text='#000000'>
<p align='center'>&nbsp;</p>
<table width='300' align='center'>
  <tr>
    <td align='center' class='latestnews' colspan='3'>- FEHLER - <br>
      Eintrag konnte nicht angelegt werden.<br>
      Versuchen Sie es bitte erneut!<br>
	  <a href='buch_eintrag.php' class='contentlink'>Zur&uuml;ck</a></td>
  </tr>
</table>
</body>
</html>
";
}


?>
