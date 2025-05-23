<?php
ini_set('register_globals', 'on');
include "includes/functions.php";                                                        //beinhaltet Funktionen zur Formatierung von Formularen und Tabellen
include "includes/classes.php";                                                          //beinhaltet Klassen und deren Methoden
include "includes/debug.php";                                                            //Bewirkt den Zeilenumbruch im Quelltext
include "includes/dbconnect.php";                                                        //hier wird die Verbindung unter Verwendung der Parameter hergestellt

?>

<!DOCTYPE html>

<?php echo '<head>'.debug();
echo "<title>".$titel."</title>".debug();

if (isset ($css)){

echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"".$css."\" />".debug();
echo "<style type=\"text/css\" >".debug();

echo "#hilfe { position:absolute; top: 10px;   left:900px; z-index:3;  }".debug();
echo "#query { position:absolute; top: 460px;  left:8px;   z-index:3;  }".debug();
echo "#array { position:absolute; top: 500px;  left:8px;   z-index:3;  }".debug();

Echo "</style>".debug();
}
Echo "</head><body> ".debug();
?>
