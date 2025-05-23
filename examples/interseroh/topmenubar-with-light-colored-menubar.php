<?php include_once("shared/head.php") ?>
<body>

<div id="tmb_top_menu_bar" data-tmb-headline="TEST APPLICATION" data-tmb-icon-url="images/logo.svg"
     class="TMB_application">


    <nav class="navbar navbar-default default" role="navigation" style="margin-bottom: 0pt;">
        <div class="navbar-header">
            <div class="TMB_application__logocontainer">
                <img src="images/logo.svg" class="">
            </div>
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
            <button type="button" class="navbar-toggle TMB_application__button headertabs" data-toggle="collapse"
                    data-target="#tmb_navbar_collapse"><span class="icon-bar"
                                                             style="background-color: rgb(119, 119, 119);"></span><span
                        class="icon-bar" style="background-color: rgb(119, 119, 119);"></span><span class="icon-bar"
                                                                                                    style="background-color: rgb(119, 119, 119);"></span>
            </button>
            <?php include_once("shared/profile_user.php") ?>
            <div id="tmb_messaging" class="fa fa-envelope-o headertabs">
                <a href="#"></a>
            </div>
            <div id="tmb_app_launcher" data-tmb-javascript-url="/applauncher/applauncher.nocache.js"
                 data-tmb-application-url="http://localhost:9010/applauncher"
                 class="headertabs APL_application">
                <li class="dropdown" onclick="javasript:showApplauncherPopover();"
                    onfocusout="javasript:hideApplauncherPopover();" style="float: right;"><a
                            class="dropdown-toggle" href="javascript:;" data-original-title="" title=""><i
                                class="fa fa-th fa-3x"></i> </a></li>
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
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                </button>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="container">
        <h2>Table in Container</h2>
        <p>The .table class adds basic styling (light padding and only
            horizontal
            dividers) to a table:</p>
        <table class="table">
            <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>John</td>
                <td>Doe</td>
                <td>john@example.com</td>
            </tr>
            <tr>
                <td>Mary</td>
                <td>Moe</td>
                <td>mary@example.com</td>
            </tr>
            <tr>
                <td>July</td>
                <td>Dooley</td>
                <td>july@example.com</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div class="jumbotron">
        <h1>Learn to Create Websites</h1>
        <p>In today's world internet is the most popular way of connecting with
            the people. At <a href="http://www.tutorialrepublic.com" target="_blank">tutorialrepublic.com</a> you will
            learn the essential of web development technologies along with real
            life practice example, so that you can create your own website to
            connect with the people around the world.</p>
        <p><a href="http://www.tutorialrepublic.com" target="_blank" class="btn btn-success btn-lg interseroh-style">Get
                started
                today</a></p>
    </div>
</div>
</body>
</html>