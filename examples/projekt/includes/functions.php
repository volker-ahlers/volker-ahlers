<?php
/////////////////////////////////////////////////HTML///////////////////////////

function tablestart($i,$width,$ID=""){ Echo "<table border=\"".$i."\"  width =\"".$width."\" id=\"".$ID."\">".debug();}
function Zeilenanfang(){Echo "<tr>".debug();}
function Zeilenende(){Echo "</tr>".debug();}
function neueZeile(){Echo "</tr><td></td><tr>".debug();}
function form($route){Echo "<form action=\"".$route."\" method=\"post\" accept-charset=\"ISO-8859-1 ISO-8859-2\"><div>".debug();}
function label($txt,$col=1){Echo "<td colspan = \"".$col."\">".$txt."</td>".debug();}
function labeltr($txt,$ID="",$col=1){Echo "<tr ID=\"".$ID."\"><td colspan = \"".$col."\">".$txt."</td></tr>".debug();}
function leer($col=1){ Echo "<td colspan = \"".$col."\">&nbsp;</td>".debug();}
function hidden ($name,$val){Echo "<input type=\"hidden\" name=\"".$name."\" value=\"".$val."\" >".debug();}
function linkertd($route,$val,$ID=""){return "<td><a href=\"".$route."\" ID=\"".$ID."\">".$val."</a></td>".debug();}
function linker($route,$val,$ID=""){return "<tr><td><a href=\"".$route."\" ID=\"".$ID."\">".$val."</a></td></tr>".debug();}
function td($string){ return "<td>".$string."</td>".debug();}
function tr($string){ return "<tr><td>".$string."</td></tr>".debug();}
function eingabe ($name,$val="",$maxs=40,$size=40,$rw="",$col=1){if($rw != ""){$bg= "bgcolor=\"#dddddd\"";}
    Echo "<td ".$bg." colspan =\"".$col."\"><input  type =\"text\" name =\"".$name."\" size =\"".$size."\" maxsize=\"".$maxs."\" value=\"".$val."\" ".$bg." ".$rw."></td>".debug();
}
function radio   ($name,$txt,$val,$col=1,$sel=""){
        if($val==$sel){$sel="checked";}else{$sel="";}                           //Vorselektion bei Wertübergabe
        Echo "<td  colspan = \"".$col."\"><input type=\"radio\" name=\"".$name."\" value=\"".$val."\" ".$sel.">". $txt."</td>".debug();
}
function checkbox($name,$txt,$val="",$ck=0,$rw="",$col=1){
        if ($ck==1){$ch="checked=\"checked\"";}                                 //Vorselektion bei Wertübergabe
        Echo "<td  colspan = \"".$col."\"><input type=\"checkbox\" name=\"".$name."\" value=\"".$val."\" ".$rw." ".$ch.">".$txt."</td>".debug();
}
function password($name,$size,$maxs,$col=1){Echo "<td colspan = \"".$col."\"><input type=\"password\" name=\"".$name."\" size =\"".$size."\" maxsize=\"".$maxs."\"></td>".debug();}
function button($type,$value,$col=1,$size=40){Echo "<td colspan =\"".$col."\"><input type=".$type." width =\"".$size."\" value=".$value."></td>".debug();}
function textarea($name,$rows,$cols,$maxs,$col=1,$rw="",$val=""){Echo "<td colspan =\"".$col."\"><textarea name=\"".$name."\" cols=\"".$cols."\" rows=\"".$rows."\" maxsize=\"".$maxs."\" ".$rw.">".$val."</textarea></td>".debug();}
function divbox($name,$style=""){echo "<div id=\"".$name."\" style=\"".$style."\">".debug();}
function option($name,$array,$val=""){                                          //übernimmt Zahlen zur Selektion bei Optionsfeld
        Echo "<td><select name =\"".$name."\" size=\"1\">".debug();             //übergibt zahlen
          for ($i=0;$i<count($array);$i++){
            if($i==$val){$sel="selected";}else{$sel="";}
          Echo "<option ".$sel." value=\"".$i."\">".$array[$i]."</option>".debug(); }
        Echo "</select></td> ".debug();
}
function multioption2($name,$array,$val,$size=5,$col=1){                        //übernimmt Strings zur Selektion bei Optionsfeld
       $temp=array_keys($array,$val);                                           //übergibt werte-strings
       $zahl= $temp[0];                                                         //Vorbelegung aus Anrede-array!
        Echo "<td colspan=$col><select name =\"".$name."[]\" size=\"".$size."\" multiple>".debug();
          for ($i=0;$i<count($array);$i++){
            if($i==$zahl){$sel="selected";} else $sel="";
          Echo "<option ".$sel." value=\"".$val[$i]."\">".$array[$i]."</option>".debug(); }
        Echo "</select></td> ".debug();
}
function option2($name,$array,$val="",$col=1,$size=1){                                  //übernimmt Strings zur Selektion bei Optionsfeld
       $temp=array_keys($array,$val);                                           //übergibt werte-strings
       $zahl= $temp[0];                                                         //Vorbelegung aus Anrede-array!

        Echo "<td colspan=$col><select name =\"".$name."\" size=\"".$size."\">".debug();
          for ($i=0;$i<count($array);$i++){
            if($i==$zahl){$sel="selected";} else $sel="";
          Echo "<option ".$sel." value=\"".$array[$i]."\">".$array[$i]."</option>".debug(); }
        Echo "</select></td> ".debug();
}
function option3($name,$array,$val,$col=1,$size=1){                                  //übernimmt Strings zur Selektion bei Optionsfeld
       $temp=array_keys($array,$val);                                           //übergibt werte-strings
       $zahl= $temp[0];                                                         //Vorbelegung aus Anrede-array!

        Echo "<td colspan=$col><select name =\"".$name."\" size=\"".$size."\">".debug();
          for ($i=0;$i<count($array);$i++){
            if($i==$zahl){$sel="selected";} else $sel="";
          Echo "<option ".$sel." value=\"".$val[$i]."\">".$array[$i]."</option>".debug(); }
        Echo "</select></td> ".debug();
}

function tabelle($tabelle,$array){  $k=0;                                      //Erzeugt Tabelle aus Inhalten der Datenbankabfrage

 echo "<tr>".debug();                                                           //Überschriften werden mit eingelesen und entsprechen den Namen der einzelnen Tabellenzellen
  for($i=1;$i<=count($array);$i++) {   $k++;
   if($tabelle[$array[$i-1]]==""){$tabelle[$array[$i-1]]="&nbsp;";}
    echo "<td >".$tabelle[$array[$i-1]]."</td> ".debug();}
 echo "</tr> ".debug();
 return $k;                                                                     //Anzahl der Spalten wird zurückgegeben
}

function hilfe($divname,$name=""){
  divbox($divname);
  echo "<a href=\"includes/hilfe/hilfe_".$name.".htm \"target=\"_blank\"><img src=\"images/hilfe2.gif\" alt=\"Hilfe\"></a>".debug();
  echo "</div>".debug();
}
////////////////////////////////////////////////////////////////////////////////
                     //MYSQL QUERIES//
////////////////////////////////////////////////////////////////////////////////
function query($array){         //WIRD NICHT MEHR BENUTZT :)
      for($i=0;$i<count($array);$i++) {    $order.=$array[$i].", ";    }
       return substr($order,0,-2);                                              //Teilstring für Datenbankabfrage wird erzeugt (was soll selektiert werden)
}
function queryval($MaxM,$array){
      for($i=0;$i<count($array);$i++) {    $order.="( '','".$MaxM."','".$array[$i]."','0','0'), ";    }
       return substr($order,0,-2);                                              //Teilstring für Datenbankabfrage wird erzeugt (was soll selektiert werden)
}
function queryallsearch($array,$Suchbegriff){
      for($i=0;$i<count($array);$i++) {    $order.=" ".strtolower($array[$i])." like '%".$Suchbegriff."%' or";    }
       return  "AND (".substr($order,0,-3).")";                                 //Teilstring für Datenbankabfrage wird erzeugt (was soll selektiert werden)
}
function querymyorder($array,$text){
      for($i=0;$i<count($array);$i++) {    $order.=" ".$text." ='".($array[$i])."' or ";    }
       return  "(".substr($order,0,-4).")";                                     //Teilstring für Datenbankabfrage wird erzeugt (was soll selektiert werden)
}
function anzahlResult($sql_query,$db){                                          //Anzahl der gefundenen Datensätze
         $result=mysql_query($sql_query,$db);
          if($result){ return mysql_num_rows($result);  }
          else echo "no connection";
}
function addLimit($sql_query,$limittext){
         $sql_query= substr("$sql_query",0,-1);                                 //schneidet Endung von Query ab
         $sql_query.=" ".$limittext." ;";                                       //fügt LIMIT-Befehl zur Query hinzu
         return $sql_query;                                                     //gibt gesamte Query zurück
}
function date_mysql2german($datum) {                                            //wandelt ein MySQL-DATE (ISO-Date) in ein traditionelles deutsches Datum um
    list($jahr, $monat, $tag) = explode("-", $datum);
    return sprintf("%02d.%02d.%04d", $tag, $monat, $jahr);
}
function date_german2mysql($datum) {                                            //wandelt ein traditionelles deutsches Datum nach MySQL (ISO-Date)
    list($tag, $monat, $jahr) = explode(".", $datum);
    return sprintf("%04d-%02d-%02d", $jahr, $monat, $tag);
}

function gettimestring($datum,$over,$mysqlrow){
     $string=" AND ".$mysqlrow." ".$over." '".date_german2mysql($datum)."'";
     return $string;
    }
function gettimestringbetween($datum1,$datum2,$over,$mysqlrow){
    $string=" AND ".$mysqlrow." ".$over." '".date_german2mysql($datum1)."' AND '".date_german2mysql($datum2)."'";
    return $string;
    }
////////////////////////////////////////////////////////////////////////////////
           //ARRAYFUNKTIONEN
////////////////////////////////////////////////////////////////////////////////
function bubblesort($Xarray,$Sort){

while($flg==0 and count($Xarray)>1){
  for ($i=0;$i<(count($Xarray)-1);$i++){                                        //sonst schießt er über die Grenze
       $flg=1;
  if (strnatcasecmp($Xarray[$i+1][$Sort],$Xarray[$i][$Sort])<0){
      $flg=0;
      $temp=$Xarray[$i];
      $Xarray[$i]=$Xarray[$i+1];
      $Xarray[$i+1]=$temp;
      $i++;
      break;
     }
   }
 }
return $Xarray;
}
function suchen($Xarray,$array,$Suchbegriff,$Suchkathegorie,$Xtra2){
      $tempo=NULL;
      $tempo[0]='0';

      if($Xtra2==0){
         for ($i=0;$i<(count($Xarray));$i++){
            if (strstr($Xarray[$i][$Suchkathegorie],$Suchbegriff)){
            array_push($tempo,$Xarray[$i]);
            }
         }
      }
      if($Xtra2==1){
          for ($i=0;$i<count($Xarray);$i++){
              $giddel=0;
              for ($j=0;$j<count($array);$j++){
                  if (strstr($Xarray[$i][$array[$j]],$Suchbegriff)){
                     $giddel=1;
                  }
              }
          if($giddel==1)array_push($tempo,$Xarray[$i]);
          }
      }
    $Xarray=Null;
    array_shift($tempo);
    $Xarray=$tempo;
    return $Xarray;
}
function deleteelement($array,$wert){                                           //beide machen das gleiche !!
      $arrEntf[0]= $wert;
      $array = array_diff ($array, $arrEntf);
      return $array;
}
function deletenumber($array,$wert){
      $Z=array_keys ($array, $wert);
      array_splice($array, $Z[0],1);
      return $array;
}
/////////////////////////////////////////Speicherfunktionen/////////////////////
function speicherarray($string,$Zarray){
    $datei=fopen($string,"w+");
    fwrite($datei,implode(";",$Zarray));
    fclose($datei);
    }
function speichern($string,$data){
    $datei=fopen($string,"w+");
    fwrite($datei,$data);
    fclose($datei);
    }
/////////////////////////////////Passwort/////////////////////////////////////// gibt Anzahl der Zeichen des Passwortes an Passwortgenerator
    function pw_generate($length = 10) {
    $i=0;
        $chars  = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $number = rand(0, strlen($chars)-1);
        $pw = $chars[$number];
        $chars .= "0123456789";

           for($i=1;$i<$length;$i++) {
               $number = rand(0, strlen($chars)-1);
                 do{
                  if (strstr($pw,$chars[$number])){$number = rand(0, strlen($chars));$x=0;}else $x=1;
             }while($x<1);
               $pw .= $chars[$number];
           }
        return $pw;
}
////////////////////////////////////Eigenservice////////////////////////////////
function controlpanel(){
    echo "<p>";                                                                 //zeigt Controlpanel an, wenn 1
    global $Recht;
    if($Recht==0)$x=0;
    if($Recht==1)$x=1;
    return $x;
}

function show($Str,$flag){
    if ($flag==1)echo "<strong>".$Str."</strong>";
}
function showarray($array,$flag){

    if ($flag==1){
        echo "<pre>";
        print_r($array);
        echo "</pre>";
    }
}
function scandir1($dir){
 $dh  = opendir($dir);
  while (false !== ($filename = readdir($dh))) {
    $files[] = $filename;

 }
     return $files;
}
function scandir2($verz="."){
    $f_handle = opendir($verz);
    while($file = readdir($f_handle)){
        if( $file != "." && $file != ".."){
            if(is_dir("$verz/$file")){
                $eb++;
                scandirt("$verz/$file");
            }
            else {
                echo("$verz/$file<br>\n");
            }
        }
    }
}
?>
