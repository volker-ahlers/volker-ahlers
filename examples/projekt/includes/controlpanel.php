<?php
if (isset($_REQUEST[Showquery])){$Showquery=$_REQUEST[Showquery];}
if (isset($_REQUEST[Showarray])){$Showarray=$_REQUEST[Showarray];}
if (isset($_REQUEST[place])){$place=$_REQUEST[place];}                          //für die Stelle im Array für Verlinkungsvariable
if (isset($_REQUEST[val])){$Arrows[$place]=$_REQUEST[val];}                     //für den Inhalt an der Stelle im Array für Verlinkungsvariable


if(controlpanel()){
 tablestart(0,200);
   if($Showquery==1 )echo linker($name."?Showquery=0&ID=".$fid,"Query&nbsp;unvisibel");
   if($Showquery==0 )echo linker($name."?Showquery=1&ID=".$fid,"Query&nbsp;visibel");
   if($Showarray==1 )echo linker($name."?Showarray=0&ID=".$fid,"Array&nbsp;unvisibel");
   if($Showarray==0 )echo linker($name."?Showarray=1&ID=".$fid,"Array&nbsp;visibel");
 echo "</table>".debug();
}
?>
