<?php
//Textfeldeingaben Filtern
function daten_reiniger($inhalt) {
    if (!empty($inhalt)) {
        //HTML- und PHP-Code entfernen.
        $inhalt = strip_tags($inhalt);
        //Umlaute und Sonderzeichen in
        //HTML-Schreibweise umwandeln
        $inhalt = htmlspecialchars($inhalt);
        //Entfernt �berflüssige Zeichen
        //Anfang und Ende einer Zeichenkette
        $inhalt = trim($inhalt);
        //Backslashes entfernen
        $inhalt = stripslashes($inhalt);
    }
    return $inhalt;
}

//Stammen die Daten vom Formular?
if (isset($_POST["senden"])) {

	$error_msg = '';

	//Schreibarbeit durch Umwandlung ersparen
	foreach ($_POST as $key=>$element) {
		//Dynamische Variablen erzeugen, wie g_fname, etc.
		//und die Eingaben Filtern
		${"g_".$key} = daten_reiniger($element); 

	}

	//Anfang - Prüfung
	//Kein richtiger Name eingegeben
	if(strlen($g_fname)<3){
	$error_msg="Bitte geben Sie Ihren Namen an";
	}

	//Kein Eintrag vorgenommen
	if(strlen($g_finhalt)<3){
	$error_msg.="<br>Bitte geben Sie auch etwas in das G&auml;stebuch ein.";
	}

	//Mailadresse korrekt angegeben - entsprechende Formatierung vornehmen
	if(preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/',$g_femail)){
	$format_femail="<a href='mailto:" . $g_femail . "'>" . $g_femail . "</a>";
	} else {
	$error_msg.="<br>Fehlerhafte E-mail!<br>";
	}


	//Es wurde auch eine Homepageadresse angegeben - entsprechende Formatierung vornehmen
	if(strlen($g_fhome)> 0){
		if(preg_match('/^([a-zA-Z0-9-]+\.)+([a-zA-Z]{2,4})$/',$g_fhome)){
			//http:// fehlt in der Angabe der Adresse - hier ergänzen
			$g_fhome="<a href='http://www." . str_replace(array('http://', 'www.'), array('', ''),  $g_fhome) . "' target='_blank'>" . $g_fhome . "</a>";
		} else {
		$error_msg.="<br>Fehlerhafte Homepageadresse!<br>";//$g_fhome="<a href=" . $g_fhome . " target=_blank>Website</a>";
		}
	} else {$g_fhome="Keine Homepage eingetragen";}
	//Ende - Prüfung

	//Prüfen ob Fehler vorgekommen sind!
	if($error_msg){
		echo "
		<table class='error'>
		  <tr>
			<td align='center' class='latestnews' colspan='3'>- FEHLER - 
			<p>&nbsp;</p>
			  <p>$error_msg</p>			 
			  Eintrag konnte nicht angelegt werden.<br>
			  Versuchen Sie es bitte erneut!
			  <p>&nbsp;</p>
			   <a href='javascript:history.back()' class='contentlink'>Zur&uuml;ck</a>
			   <p>&nbsp;</p>
			  </td>
		  </tr>
		</table>
		";

		} else {
		$g_fdatum = date("d.m.Y H:i");

		$eintrag="
		<table>
		  <tr align='left'>
			<td class='latestnews' colspan='2'>&nbsp;$g_fbetreff</td>
		  </tr>
		  <tr>
			<td colspan='2' class='autor'>
			  <div align='right'>$g_fdatum</div>
			</td>
		  </tr>
		  <tr>
			<td valign='top'>
			  <div class='morelink'>&raquo;&nbsp;</div>
			</td>
			<td valign='top' class='blocksatz' width='375'>". nl2br($g_finhalt) ."</td>
		  </tr>
		  <tr>
			<td colspan='2' class='contentblack'>
			  <div align='right'>$g_fname</div>
			</td>
		  </tr>
		  <tr>
			<td valign='top' colspan='2'>
			  <table width='100%' border='0' cellspacing='0' cellpadding='0'>
				<tr>
				  <td class='autor'>
					<div align='left'>[ $format_femail ]</div>
				  </td>
				  <td class='autor'>
					<div align='right'>[ $g_fhome ]</div>
				  </td>
				</tr>
			  </table>
			</td>
		  </tr>
		  <tr>
			<td colspan='2' class='uline' >&nbsp;</td>
		  </tr>
		</table>
		";

		include("gb/funktionen.php");

		}

	} else {
	echo "
	<table class='error'>
	  <tr>
		<td align='center' class='latestnews' colspan='3'>- FEHLER - 
		 <p>&nbsp;</p>
		  Eintrag konnte nicht angelegt werden.<br>
		  Versuchen Sie es bitte erneut!
		  <p align='center'>&nbsp;</p>
		  <a href='javascript:history.back()' class='contentlink'>Zur&uuml;ck</a>
		  <p>&nbsp;</p>
		  </td>
	  </tr>
	</table>
	";
	}
?>
