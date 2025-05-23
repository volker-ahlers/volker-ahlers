<?php include_once("shared/head.php") ?>
<body>

<div id="tmb_top_menu_bar" data-tmb-bgcolor="#FF00FF" data-tmb-txtcolor="#7722FF" data-tmb-headline="TEST APPLICATION"
     data-tmb-icon-url="images/logo.svg" class="INTERSEROH_application">


    <nav class="navbar navbar-default default" role="navigation" style="margin-bottom:0">
        <div class="navbar-header">
            <div class="INTERSEROH_application__logocontainer"><img src="images/logo.svg" class=""></div>
            <div class="navbar-brand">TEST APPLICATION</div>
        </div>
        <div class="collapse navbar-collapse" id="tmb_navbar_collapse">
            <div id="tmb_portal_links">
                <ul id="internal_topics" class="nav navbar-nav">
                    <!-- class="text-right" wenn der Text im Dropdown rechtsbündig ausgerichtet werden soll -->
                    <li>
                        <a href="https://www.interseroh.de" target="_blank">Home</a>
                    </li>
                    <li>
                        <a href="https://www.interseroh.de/en/company/about-us-interseroh" target="_blank">About</a>
                    </li>
                    <li>
                        <a href="https://www.interseroh.de/en/contact" target="_blank">Contact</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                           aria-expanded="false">Dropdown</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="https://www.interseroh.de">Home</a>
                            </li>
                            <li>
                                <a href="https://www.interseroh.de/en/contact">Contact</a>
                            </li>
                            <li>
                                <a href="https://www.interseroh.de/en/company/about-us-interseroh">About</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div id="icons_right" class="icons-right">
            <button type="button" class="navbar-toggle TMB_application__button headertabs collapsed"
                    data-toggle="collapse" data-target="#tmb_navbar_collapse" aria-expanded="false"><span
                        class="icon-bar" style="background-color: rgb(119, 34, 255);"></span><span class="icon-bar"
                                                                                                   style="background-color: rgb(119, 34, 255);"></span><span
                        class="icon-bar" style="background-color: rgb(119, 34, 255);"></span></button>
            <?php include_once("shared/profile_user.php") ?>
            <div id="tmb_messaging" class="fa fa-envelope-o headertabs"><a href="#"></a></div>
            <div id="tmb_app_launcher" data-tmb-javascript-url="/applauncher/applauncher.nocache.js"
                 data-tmb-application-url="http://localhost:9010/applauncher"
                 class="headertabs APL_application">
                <li class="dropdown" onclick="javasript:showApplauncherPopover();"
                    onfocusout="javasript:hideApplauncherPopover();" style="float: right;">
                    <a class="dropdown-toggle" href="javascript:;" data-original-title="" title="">
                        <i class="fa fa-th fa-3x"></i> </a></li>
            </div>
            <?php include_once("shared/popover.php") ?>
        </div>
    </nav>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Save changes
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2 col-lg-6 col-lg-offset-3">
            <br/>
            <div class="alert alert-info " role="alert">
                <span class="glyphicon glyphicon-exclamation-sign"
                      aria-hidden="true"></span> <span
                        class="sr-only">Info:</span>
                Wenn Sie Ihr Passwort vergessen haben, können Sie dieses wieder
                zurücksetzen lassen und ein neues Passwort festlegen. Hierzu wird Ihnen eine E-Mail mit einem neuen Link
                zugesendet, welcher Sie auf eine Seite zum Erstellen eines neuen Passwortes weiterleitet. Bitte beachten
                Sie, dass dieser Link seine Gültigkeit nach einer Woche wieder verliert.<br><br>Sollten Sie keine
                E-Mail von uns erhalten haben, prüfen Sie bitte Ihren Spam-Ordner.
            </div>
            <br/>
            <div id="sucessinfo" class="alert alert-info " role="alert" style="display:none;">
                <span class="glyphicon glyphicon-exclamation-sign"
                      aria-hidden="true"></span> <span
                        class="sr-only">Info:</span>
                Wir senden Ihnen eine E-Mail mit einem neuen Link, welcher Sie auf eine Seite zum Erstellen eines neuen
                Passwortes weiterleitet, zu. Bitte beachten Sie, dass dieser Link seine Gültigkeit nach einer Woche
                wieder verliert.<br><br>Sollten Sie keine E-Mail von uns erhalten haben, prüfen Sie bitte Ihren
                Spam-Ordner.
            </div>
            <br/>
            <div class="alert alert-danger empty_alert" role="alert" style="display: none;">
                <span class="glyphicon glyphicon-exclamation-sign"
                      aria-hidden="true"></span> <span
                        class="sr-only">Error:</span>
                Bitte füllen sie die rot markierten Felder aus.
            </div>
            <div class="panel-body">
                <form action="/interseroh/index.php" method="post" id="resetform">
                    <div class="form-group">
                        <label class="control-label required" for="UserName">Benutzername</label>
                        <input autofocus="autofocus" class="form-control" id="UserName" name="UserName"
                               placeholder="Benutzername" tabindex="1" type="text" value="" autocomplete="off"/>
                    </div>
                    <div class="btn-group-bottom pull-right">
                        <button class="btn btn-default" type="reset">Abbrechen</button>
                        <button class="btn btn-icon btn-primary" type="submit" tabindex="3" title="Anfordern">
                            <i class="fa fa-sign-in"></i>
                            Anfordern
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="sticky-content showhtmlinmodal">
    <ul>
        <li class="sticky-content__element">
            <a href="#" title="Kontakt"><i class="glyphicon glyphicon-earphone"></i>Kontakt</a>
        </li>
        <ul>
            <li class="sticky-content__element">
                <a href="#" title="{$stickybox.newsletter}"><i class="glyphicon glyphicon-envelope"></i>Newsletter</a>
            </li>
        </ul>
    </ul>
</div>
<?php include_once("shared/modal.php") ?>
</body>
</html>