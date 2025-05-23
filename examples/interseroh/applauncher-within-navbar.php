<?php include_once("shared/head2.php") ?>
<body>


<nav id="myNavbar" style="margin-top: 0" class="navbar navbar-default navbar-inverse" role="navigation">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#app_navbarCollapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Tutorial Republic</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="app_navbarCollapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="https://www.interseroh.de" target="_blank">Home</a></li>
                <li><a href="https://www.interseroh.de/en/company/about-us-interseroh" target="_blank">About</a></li>
                <li><a href="https://www.interseroh.de/en/contact" target="_blank">Contact</a></li>
            </ul>
        </div>
        <div id="icons_right" style="right:20px;" class="t5">
            <div id="tmb_app_launcher" data-tmb-javascript-url="/applauncher/applauncher.nocache.js"
                 data-tmb-application-url="http://localhost:9010/applauncher" class="APL_application hidden-xs">
                <li class="dropdown" onclick="javasript:showApplauncherPopover();" onfocusout="javasript:hideApplauncherPopover();" style="float: right;"><a
                        class="dropdown-toggle" href="javascript:;" data-original-title="" title=""><i
                        class="fa fa-th fa-3x"></i> </a></li>
            </div>
            <?php include_once("shared/popover.php") ?>
        </div>
    </div>
</nav>

<!-- Button trigger modal -->
<div class="container">
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Launch demo modal
    </button>
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
        <h1>Interseroh</h1>
        <p>Cologne. The reconditioning of PCs and notebooks, as offered by
            Interseroh,
            makes a significant contribution to protecting the climate and
            saving natural resources.
            This has now been proven scientifically for the first time
            in a research project at the Fraunhofer Institute for Environmental,
            Safety, and Energy Technology (UMSICHT) which was completed on
            behalf of INTERSEROH Dienstleistungs GmbH.
            <a href="http://www.interseroh.com" target="_blank">interseroh.com</a></p>
        <p><a href="http://www.interseroh.com" target="_blank" class="btn btn-success btn-lg interseroh-style">Get started today</a></p>
    </div>
</div>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>