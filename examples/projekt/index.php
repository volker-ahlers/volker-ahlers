<?php              //Zugang zur Passwortabfrage von Usern und Zutrittsberechtigung zur Lernsoftware

session_start();
session_register('User_ID','Recht','Kn','Pw','EB0','EB1','EB2','Kap','Aktion','Hints','Hintmax','Hintbool','Modus','Proovlim','Time','Showquery','Showarray');

/*
User_ID   = User_ID des Lernenden
Recht     = Zugriffrecht, AD oder User
Kn        = Kennung
Pw        = Passwort
EB0       = Ebene0, oberste Ebene der Kapitel
EB1       = Ebene1, untere Ebene der Kapitel
EB2       = Ebene2,  Kapitelteile
Kap       = Kapitelname des aktuellen Kapitels
Action    = Bearbeitungsmodi
Hints     = Speichervariable für anzahl angezeigter Hintse
Hintmax   = Anzahl der Hinweise in den Fragen
Hintbool  = ON oder OFF, entscheidet, ob Hinweise berücksichtigt werden
Modus     = unterscheidet zwischen 'Test' und 'Prüfung'
Proovlim  = Prüfungslimit und legt die Anzahl der Prüfungsfragen fest, die während einer Prüfung beantwortet werden müssen
Showquery = Zum Anzeigen der Queries
Showarray = Zum Anzeigen der Globalarrays
Arrows    = Wertearray bestimmt, welcher Bereich ein- oder ausgeblendet wird.
Order     = Teilstring für SQL-Abfragen
*/

$css ="format.css";
  $titel="Eingangsbereich";                //Titel der ebene0
    $route="passwortabfrage.php";            //Diese ebene0 wird dem Formular übergeben
      $name="index.php";
        $Time[EB0]=0;
        $Time[EB1]=0;
        $Time[EB2]=0;
        $Time[zeit]=0;
          $datum = date("d.m.Y - H:i:s \h");
            include "includes/head.php";
             $EB2=2;
             
echo "<center>";
  if($Aktion =="neu"){  echo "Sie können nun mit Ihren Zugangsdaten in den LogIn<p>";  }
    echo $datum;

form ($route);                           //Formularaufruf mit Parametern für Aktion
  tablestart(0,"100%","ct");               //Tabellenbeginn mit Parametern
    Zeilenanfang();                          //Funktion für eine neue Tabellenreihe
    
     $Datei=file("welcome.txt");              //welcome.txt einlesen
      echo "<td align=\"center\">".debug();
       for($i=0;$i<=count($Datei);$i++){
        echo $Datei[$i];
       echo "</td></tr>".debug()."<tr><td>".debug();
      }
      
     echo "</td>".debug();
      leer();                                // leere Zeile in Tabelle
    neueZeile();                             //Funktion für eine neue Tabellenzeile
  label("Kennung",1);                    //Labelfunktion mit Parametern für Text und colspan
neueZeile();                             //Funktion für eine neue Tabellenzeile
  eingabe("kennung","",20,20);           //Eingabefeld mit diversen Format-Parametern
    neueZeile();                             // s.o.
      label("Passwort",1);                   // s.o.
        neueZeile();                             // s.o.
      password("passwort",20,20,1);          //Passwortfeld mit diversen Format-Parametern
    neueZeile();                             // s.o.
  leer();                                // leere Zeile in Tabelle
neueZeile();                             // s.o.
  button("submit","Absenden");           //Buttonfeld mit diversen Format-Parametern
    neueZeile();
      button("reset","Abbrechen");           // s.o.
        neueZeile();
          leer();                                // leere Zeile in Tabelle
            neueZeile();                             // s.o.

            if($Aktion !="neu"){
              label("Sind Sie noch nicht registriert ?",1);
              neueZeile();
              $route="anmeldung/anmeldeform.php";
              echo linkertd($route,"Registrieren Sie sich hier");
            }

            Zeilenende();
          echo "</table>".debug();                 //Tabellenende
        echo "</div>".debug();
      echo "</form>".debug();                  //Formularende
     $Aktion="";
    echo "</div>".debug();
   echo linker("includes/impressum.php\"target=\"_blank\"","<p>Impressum");
  echo "</body>".debug()."</html>";        //Ende des HTML-Dokumentes

showarray($_SESSION,$Showarray);
//hilfe("hilfe");
?>
