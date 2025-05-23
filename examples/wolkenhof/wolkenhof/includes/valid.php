<?php

$subject = "Kontaktanfrage aus dem Wolkenhof-formular";

$empty_fields_message = "<div class='clear invalid'>Bitte f&uuml;llen Sie alle Felder mit * aus.</div>";
$empty_phone_message = "<div class='clear invalid'/>Geben Sie bitte eine Nummer f&uuml;r den R&uuml;ckruf an.</div>";
$invalid_email_message = "<div class='clear invalid'/>Bitte geben Sie eine gültige E-Mailadresse an.</div>";//TODO: implementing

$thankyou_message = "<div class='clear'>Vielen Dank. Ihre Nachricht wurde gesendet.</div>";

$lastname = isset($_POST['lastname'])? trim(stripslashes($_POST['lastname'])) : '';
$prename = isset($_POST['prename'])? trim(stripslashes($_POST['prename'])) : '';
$strasse = isset($_POST['strasse'])? trim(stripslashes($_POST['strasse'])) : '';
$plz = isset($_POST['plz'])? trim(stripslashes($_POST['plz'])) : '';;
$ort = isset($_POST['ort'])? trim(stripslashes($_POST['ort'])) : '';
$mobil = isset($_POST['mobil'])? trim(stripslashes($_POST['mobil'])) : '';
$festnetz = isset($_POST['festnetz'])? trim(stripslashes($_POST['festnetz'])) : '';
$email = isset($_POST['email'])? trim(stripslashes($_POST['email'])) : '';
$check = isset($_POST['rueckruf']) ? 'checked="checked"' : '';
$rueckruf = isset($_POST['rueckruf']) ? $_POST['rueckruf'] : '';
$message = isset($_POST['message']) ? trim(stripslashes($_POST['message'])) : '';

$empty = (empty($lastname) || empty($ort) || empty($plz) || empty($prename) || empty($email)) ? 1 : 0;

if (isset($_POST['rueckruf'])) {
    $phone = (empty($festnetz) & empty($mobil)) ? 1 : 0;

} else {
    $phone = 0;
}
?>
