<?php          //Formular zur Kundenbehandlung
session_start();

$titel="Anmeldeformular";                                                       //Titel der ebene0
 $css ="../format.css";
  $rw=$r="";
   $opti=array("Herr","Frau");                                                  //Auswahlarray für das Optionsfeld "Anrede"
    include "../includes/head2.php";

echo "<center>";

     $Datei=file("anmeld.txt");              //welcome.txt einlesen
      echo "&nbsp;<p><div align=\"center\" style=\"width:400px;\"><strong>".debug();
       for($i=0;$i<=count($Datei);$i++){
        echo $Datei[$i];
      }                                                                                                                                                                      //Header HTML
       echo "</strong></div>".debug();
      ?>
      <p>
      <?php
$route="auswertung.php";
  form ($route);                                                                //Formularaufruf mit Parametern für Aktion
    tablestart(1,"400px");                                                           //Tabellenbeginn mit diversen Parametern
      Zeilenanfang();                                                                 //Funktion für eine neue Tabellenreihe
        neueZeile();                                                                    //Funktion für eine neue Tabellenzeile
      label("Anrede");                                                               //Labelfunktion mit Parametern für Text
   option2("Anrede",$opti,$_REQUEST[Anrede]);                                      //Optionsfeld eingelesen und ausgeben mit Vorselektion
           leer(1);          leer(1);          leer(1);                                                                      //Erzeugt Leerzeilen mit Parameter colspan
neueZeile();                                                                    //Funktion für eine neue Tabellenzeile
 label("Vorname*");                                                              //Labelfunktion mit Parametern für Text
   eingabe("Vorname",$_REQUEST[Vorname],40,40,$rw);
          leer(1);          leer(1);          leer(1);                                                    //Erzeugt Leerzeilen mit Parameter colspan
neueZeile();                            //Eingabefeld mit Parametern und Belegung mit Datenbankwert + Schreibbeschränkung bei "Notizen"
     label("Nachname*");                                                             //Labelfunktion mit Parametern für Text
       eingabe("Nachname",$_REQUEST[Nachname],40,40,$rw);
          leer(1);          leer(1);          leer(1);
         neueZeile();                                                                    //Funktion für eine neue Tabellenzeile
       label("Strasse");                                                              //Labelfunktion mit Parametern für Text
     eingabe("Strasse",$_REQUEST[Strasse],80,40,$rw);                               //Eingabefeld mit Parametern und Belegung mit Datenbankwert + ev. Schreibbeschränkung
          leer(1);          leer(1);          leer(1);                                                               //Erzeugt Leerzeilen mit Parameter colspan
neueZeile();                                                                    //Funktion für eine neue Tabellenzeile;
 label("PLZ");                                                                  //Labelfunktion mit Parametern für Text
   eingabe("PLZ",$_REQUEST[PLZ],5,10,$rw);
          leer(1);          leer(1);          leer(1);                                                                    //Erzeugt Leerzeilen mit Parameter colspan
neueZeile();                                       //Eingabefeld mit Parametern und Belegung mit Datenbankwert + ev. Schreibbeschränkung
     label("Ort");                                                                  //Labelfunktion mit Parametern für Text
       eingabe("Ort",$_REQUEST[Ort],60,40,$rw);                                       //Eingabefeld mit Parametern und Belegung mit Datenbankwert + ev. Schreibbeschränkung
          leer(1);          leer(1);          leer(1);
          neueZeile();                                                                    //Funktion für eine neue Tabellenzeile
       label("Email*");                                                                //Labelfunktion mit Parametern für Text
     eingabe("Email",$_REQUEST[Email],45,40,$rw);                                   //Eingabefeld mit Parametern und Belegung mit Datenbankwert + ev. Schreibbeschränkung
          leer(1);          leer(1);          leer(1);
neueZeile();
 label("Kennung*");                                                              //Labelfunktion mit Parametern für Text
   eingabe("Kennung",$_REQUEST[Kennung],15,10,$rw);
                leer(1);          leer(1);          leer(1);                                                                      //Erzeugt Leerzeilen mit Parameter colspan
neueZeile();                           //Eingabefeld mit Parametern und Belegung mit Datenbankwert + ev. Schreibbeschränkung
     label("Passwort*");                                                             //Labelfunktion mit Parametern für Text
       eingabe("Passwort",$_REQUEST[Passwort],15,10,$rw);                             //Eingabefeld mit Parametern und Belegung mit Datenbankwert + ev. Schreibbeschränkung
          leer(1);          leer(1);          leer(1);
          neueZeile();
       label("Geburtsdatum*");                                                       //Labelfunktion mit Parametern für Text
     eingabe("Geburtsdatum",$_REQUEST[Geburtsdatum],15,10,$rw);                   //Eingabefeld mit Parametern und Belegung mit Datenbankwert + ev. Schreibbeschränkung
            leer(1);          leer(1);          leer(1);                                                                //Erzeugt Leerzeilen mit Parameter colspan
 Zeilenende();
echo "</table>".debug();
?>
     <p>
<?php
tablestart(0,60);
  Zeilenanfang();
    button("submit","Absenden");                                                //Buttonfeld mit diversen Format-Parametern
    button("reset" ,"Abbrechen",3);
  echo  "</div>".debug();
 echo "</form>".debug();
 
$route="../index.php?";
  form ($route);                                                                //Formularaufruf mit Parametern für Aktion
    button("submit","&nbsp;Zurück&nbsp;");
      Zeilenende();
     echo "</div>".debug();
    echo "</form>".debug();
  echo "</table>".debug();
echo "</body></html>".debug();

showarray($_SESSION,$Showarray);
?>


