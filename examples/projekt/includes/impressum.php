<?php
$titel="Impressum";
$css ="../format.css";
include "../includes/head2.php";
echo "<center>";
echo "<p>&nbsp;<p>Impressum<p>Volker Ahlers<br>Enzian Str 53 <br>68309 Mannheim<br>Tel: 049621/16604848<br>Mob: 0176/62102249<br>mailmir_mal@yahoo.de<p>";
echo "<center>";
showarray($_SESSION,$Showarray);
echo "</body></html>".debug();
?>
