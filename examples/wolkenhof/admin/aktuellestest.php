<!DOCTYPE html>
<head>
    <?php
	$ROOT = '../';
    $step = "ad";
    $title = "Wolkenhof in Murrhardt/AktuellesTest";
    $aktuellestest = "data/aktuelles.txt";
    $aktuellesorig = "../shared/data/aktuelles.txt";
    include("../shared/includes/head.php");
    ?>
    <script type="text/javascript">
        $(document).ready(function () {

            $('#aktcopy').click(function () {
                if (confirm("Wollen Sie diesen Text wirklich veröffentlichen?")) {
                    $.ajax({ url: "includes/copyFiles.php?testfile=<?php echo $aktuellestest ?>&origfile=<?php echo $aktuellesorig ?>",
                        success: function (data) {
                            alert('Der Text wurde jetzt veröffentlicht.');
                            $('#aktcopytext').text('Der Text wurde jetzt veröffentlicht.');
                        }
                    });
                } else {
                    alert('Der Text wurde nicht veröffentlicht.');
                }
            });
        });

    </script>
</head>
<body>
<div id="container">
    <?php include("../shared/includes/navigation.php"); ?>
    <div id="content_right">
        <div id="div_aktuelles">
            <h1>Aktuelle Termine auf dem Wolkenhof TEST!</h1>
            <?php echo file_get_contents($aktuellestest); ?>

            <div id="aktcopy" class="hand"><strong>Ver&ouml;ffentlichen</strong></div>
            <div id="aktcopytext"></div>

        </div>
    </div>
</div>
</body>
</html>
