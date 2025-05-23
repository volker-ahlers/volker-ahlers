<div class="popover bottom fade" role="tooltip" data-topmenubar="loginapplauncherPopover" id="loginpopup"
     style="top: 25px;right: -44px;left: auto;">
    <div class="arrow" style="left: 85.1009%;"></div>
    <h3 class="popover-title" style="display: none;"></h3>

    <div class="popover-content">
        <div class="close">&times;</div>
        <div class="PROFILE_application__iconsContainer container-fluid">
            <div class="panel-body">
                <div class="alert alert-danger wrong_incendetials" role="alert" style="display: none;">
                <span class="glyphicon glyphicon-exclamation-sign"
                      aria-hidden="true"></span> <span
                            class="sr-only">Error:</span>
                    Ihre Anmeldedaten waren nicht richtig.
                </div>
                <div class="alert alert-danger empty_alert" role="alert" style="display: none;">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <span class="sr-only">Error:</span>
                    Bitte füllen sie die rot markierten Felder aus.
                </div>
                <?php if (isset($_REQUEST['reset'])): ?>
                    <br/>
                    <div class="alert alert-info " role="alert">
                <span class="glyphicon glyphicon-exclamation-sign"
                      aria-hidden="true"></span> <span
                                class="sr-only">Info:</span>
                        Sie können sich jetzt mit Ihrem neuen Passwort anmelden.
                    </div>
                <?php endif; ?>
                <form action="/interseroh/index.php" method="post" id="loginform">
                    <div class="form-group">
                        <label class="control-label required" for="UserName">Benutzername</label>
                        <input autofocus="autofocus" class="form-control" id="UserName" name="UserName"
                               placeholder="Benutzername" tabindex="1" type="text" value="" autocomplete="off"/>
                    </div>

                    <div class="form-group">
                        <label class="control-label required" for="Password">Passwort</label><input
                                class="form-control" id="Password" name="Password" placeholder="Passwort"
                                tabindex="2" type="password" value="" autocomplete="off"/>
                    </div>

                    <div class="btn-group pull-right">
                        <button type="reset" class="btn btn-default" data_noncloseble_popover="">Abbrechen</button>
                        <button type="submit" class="btn btn-primary" data_noncloseble_popover=""><span
                                    class="glyphicon glyphicon-log-in" data_noncloseble_popover=""></span> Anmelden
                        </button>
                    </div>

                </form>
                <div id="loginsucess" style="display:none;color: black !important;">
                    <div>
                        Hallo, Herr User
                    </div>
                    <div>
                        zusätzliche Userdaten
                    </div>
                </div>
            </div>
            <div class="form-group pull-right pw_vergessen" style="display:none;">
                <div class="col-xs-12">
                    <a href="reset.php">Passwort vergessen?</a>
                </div>
            </div>
        </div>
    </div>
</div>