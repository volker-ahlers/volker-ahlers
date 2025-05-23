<div id="kontaktformular">
    <h1>Kontakt</h1>

    <p style="margin-top:35px;">Gabi und Hans-J&uuml;rgen Dietrich<br/>Heinrich von Z&uuml;gel Haus<br/>Wolkenhof
        14<br/>71540 Murrhardt</p>

    <p>Telefon: 07192 - 1584<br/>Mobil: 0172 715 6533<br/>Email: <a href="mailto:team-dietrich@web.de">
            team-dietrich@web.de</a></p>

    <p>-----------------------------------------------------------------------</p>

    <div id="formular">

        <?php
        include("includes/valid.php");

        if (!isset($_POST['lastname']) || $empty || $phone) {

            if ((isset($_POST['lastname'])) && $empty) {

                echo $empty_fields_message;
            }

            if ((isset($_POST['lastname'])) && $phone) {

                echo $empty_phone_message;
            }
            ?>

            <a name="anker">&nbsp;</a>

            <form id="contact" method="post" action="<?php echo $_SERVER['REQUEST_URI'] . '#anker'; ?>">

                <label class="label_contact">Name*:</label><input type='text' name='lastname' class='text_box'
                                                                  value='<?php echo $lastname; ?>'/>

                <div class="clear"></div>

                <label class="label_contact">Vorname*:</label><input type='text' name='prename' class='text_box'
                                                                     value='<?php echo $prename; ?>'/>

                <div class="clear"></div>

                <label class="label_contact">Stra&szlig;e:</label><input type='text' value='<?php echo $strasse; ?>'
                                                                         name='strasse' class='text_box'/>

                <div class="clear"></div>

                <label class="label_contact">PLZ*:</label><input type='text' value='<?php echo $plz; ?>' name='plz'
                                                                 class='text_box'/>

                <div class="clear"></div>

                <label class="label_contact">Ort*:</label><input type='text' value='<?php echo $ort; ?>' name='ort'
                                                                 class='text_box'/>

                <div class="clear"></div>

                <label class="label_contact">Festnetz:</label><input type='text' value='<?php echo $festnetz; ?>'
                                                                     name='festnetz' class='text_box'/>

                <div class="clear"></div>

                <label class="label_contact">Handy:</label><input type='text' value='<?php echo $mobil; ?>' name='mobil'
                                                                  class='text_box'/>

                <div class="clear"></div>

                <label class="label_contact">E-Mail*:</label><input type='text' value='<?php echo $email; ?>'
                                                                    name='email' class='text_box'/>

                <div class="clear"></div>

                <label class="label_contact">Ich bitte um R&uuml;ckruf:</label> <input
                    type='checkbox' <?php echo $check; ?> value='Bitte um R&uuml;ckruf !' name='rueckruf'/>

                <div class="clear"></div>

                <label class="label_contact">Bemerkungen:</label>

                <div class="clear"></div>

                <textarea rows='4' name='message' class='text_box' cols="20"><?php echo $message; ?></textarea>

                <input type="submit" value="Formular absenden"/>

                <div class="clear"></div>

                <label class="label_contact last_line">Mit * versehene Felder bitte ausf&uuml;llen sowie Festnetz oder
                    Handy bei R&uuml;ckruf-Wunsch.</label>

            </form>

        <?php
        } else {

            $mail = 'Kontaktaufnahme von :' . chr(10) . $prename . ' ' . $lastname . chr(10) . $plz . ' ' . $ort . chr(10) . chr(10) . $email . chr(10) . chr(10) . 'Mobil : ' . $mobil . chr(10) . 'Festnetz :' . $festnetz . chr(10) . chr(10) . $rueckruf . chr(10) . chr(10) . $message;
            $name = $prename . ' ' . $lastname;
            $your_email1 = "amitriptillin@yahoo.de";
            $your_email2 = "team-dietrich@web.de";


            mail($your_email1, $subject, $mail, "From: " . $name . " <" . $email . ">");
            mail($your_email2, $subject, $mail, "From: " . $name . " <" . $email . ">");
            echo $thankyou_message;
        }
        ?>
    </div>