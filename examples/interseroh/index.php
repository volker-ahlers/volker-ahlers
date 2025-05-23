<?php include_once("shared/head.php") ?>
<body>

<!-- RECOMMENDED if your web app will not function without JavaScript enabled -->
<noscript>
    <div
            style="width: 22em; position: absolute; left: 50%; margin-left: -11em; color: red; background-color: white; border: 1px solid red; padding: 4px; font-family: sans-serif">
        Your web browser must have JavaScript enabled in order for this
        application to display correctly.
    </div>
</noscript>

<div class="container">
    <div class="container">
        <div class="jumbotron">
            <h1>Landing Page</h1>
        </div>

        <div class="row">
            <div class="list-group">
                <h2>Integration Scenarios</h2>
                <a class="list-group-item" href="javascript:void(0)">
                    TopMenuBar Example
                </a>
                <a class="list-group-item" target="_blank" href="topmenubar-above-navbar.php">
                    1. TopMenuBar above a Bootstrap Navbar.
                </a>
                <a class="list-group-item" target="_blank"
                   href="applauncher-within-navbar.php">
                    2. Applauncher within a Bootstrap Navbar.
                </a>
                <a class="list-group-item" target="_blank"
                   href="topmenubar-with-portalitems.php">
                    3. Navitems within Topmenubar.
                </a>
                <a class="list-group-item" target="_blank"
                   href="topmenubar-with-portalitems-and-dropdown.php">
                    3.1. Navitems with Dropdown Menu within Topmenubar.
                </a>
                <a class="list-group-item" target="_blank"
                   href="topmenubar-with-light-colored-menubar.php">
                    3.2. Navitems with Dropdown Menu within light-colored Topmenubar.
                </a>
                <a class="list-group-item" target="_blank"
                   href="topmenubar-with-own-colored-menubar.php">
                    3.3. Navitems with Dropdown Menu within own colorful Topmenubar.
                </a>
                <a class="list-group-item" target="_blank"
                   href="topmenubar-with-interseroh-bootstrap-example-menubar.php">
                    3.4. Navitems with Dropdown Menu within colorful Topmenubar and tests new bootstrap from interseroh.
                </a>
                <a class="list-group-item" target="_blank"
                   href="bootswatch-interseroh-theme-example.php">
                    3.5. Bootswatch example with interseroh bootstrap theme.
                </a>
                <?php if($with_profile == 0): ?>
                <a class="list-group-item" target="_blank"
                   href="login.php">
                    3.6. Login.
                </a>
                <a class="list-group-item" target="_blank"
                   href="reset.php">
                    3.7. Passwort zurücksetzen.
                </a>
                <a class="list-group-item" target="_blank"
                   href="pwneu.php">
                    3.8. Passwort neu setzen.
                </a>
                <?php endif; ?>
                <a class="list-group-item" target="_blank"
                   href="testseite.php">
                    34.0. Testseite von herokuapp
                </a>
            </div>
        </div>
    </div>
</div>

</body>
</html>