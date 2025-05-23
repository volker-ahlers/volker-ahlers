
<div id="div_galerie">
    <h1>G&auml;stebuch</h1>

    <p>&nbsp;</p>

    <p>&nbsp;</p>

    <div id="div_gbInhalt">
        <?php

        $meldung =
            "<table width='300' align='center'>
              <tr>
                <td align='center' class='latestnews' colspan='3'><br>- LEER -<br>
                  <p><a href='/index.php?content=gaestebucheintrag' class='contentlink'>Zur&uuml;ck</a></p>
                </td>
              </tr>
            </table>";

        if (!@include("wolkenhof/gb/buch_inhalt.htm")) {
            echo $meldung;
        }

        ?>
    </div>

    <p>&nbsp;</p>

    <p><a href="<?php echo $ROOT; ?>index.php?content=gaestebucheintrag" class="contentlink">Beitrag schreiben</a></p>

</div>