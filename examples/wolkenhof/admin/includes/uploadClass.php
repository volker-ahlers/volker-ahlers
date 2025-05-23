<?php
class Upload{
    
    function uploads($FILES, $maxSize, $destinaton, $regExp){
    $errorMessage=0;
    $status="";
    $this->FILES = $FILES;
    $this->maxSize = $maxSize;
    
    // Dateiinformationen (Ausgabe �ber Schleife) //if (isset($this->FILES)) {   foreach ($this->FILES as $key=>$element) {    echo "[$key] => $element<br>";}}
        if (isset($this->FILES)) {
        $errorMessage++;    
            
            if ($this->FILES["error"] == UPLOAD_ERR_OK) {// Upload-Status
            $errorMessage++;
                
                $this->regExp = $regExp;     // Überprüfung der Dateiendungen
                $errorMessage++;
               // print_r($regExp);print_r($this->regExp);
                if (preg_match($this->regExp, $this->FILES["name"])){// Dateiname
                    $errorMessage++;
                    
                    if($this->FILES["size"] > 0 && $this->FILES["size"] < $this->maxSize) {//Dateigröße
                    // Temporäre Datei in das Zielverzeichnis des Servers verschieben.
                    move_uploaded_file($this->FILES["tmp_name"],"../shared/{$destinaton}/".$this->FILES["name"]);
                    chmod("../shared/{$destinaton}/".$this->FILES["name"], 0644);//dateiberechtigung setzen
                    $errorMessage++;
                    }
                }
            }
        }
         
        switch($errorMessage){
            case 1 : $status = "Fehler: Dateiupload fehlgeschlagen!"; break;
            case 2 : $status = "Fehler: Während der Übertragung aufgetreten!";break;
            case 3 : $status = "Fehler: Falsches Dateiformat";break;
            case 4 : $status = "Fehler: Dateigrößen Limit!";break;
            case 5 : $status = "Übertragung erfolgreich!";break;
        }
        return $status;
    }
}

?>