<!DOCTYPE html>
<?php include_once("switch.php") ?>
<html xmlns:th="http://www.thymeleaf.org" lang="en">
<!--/*@thymesVar id="applauncherUrl" type="java.lang.String"*/-->
<!--/*@thymesVar id="topmenubarUrl" type="java.lang.String"*/-->
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=no"/>
    <title>Interseroh Bootstrap 3 Responsive Layout Example</title>
    <style>
        [class^='col-']{border:1px solid grey}.no-border [class^='col-']{border:none}.circle{width:140px;height:140px;border-radius:100%;margin:30px auto 10px}.circle.interseroh-white{border:1px solid #f2f2f2}.text{margin-bottom:20px}#source-button{position:absolute;top:0;right:0;z-index:100;font-weight:700}.showhtmlinmodal{position:relative}
    </style>
    <link rel="stylesheet" type="text/css" href="css/font-awesome/css/font-awesome.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-datetimepicker.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" media="all">

    <link rel="stylesheet" type="text/css" href="css/interseroh-bootstrap.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/individual.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/applauncher.css" media="all">
    <link rel="stylesheet" type="text/css" href="css/topmenubar.css" media="all">
    <script src="js/jquery-1.11.1.js" type="text/javascript"></script>
    <script src="js/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="js/copycolor.js" type="text/javascript"></script>
    <script>
        $(function () {
            var component = $('.showhtmlinmodal');

            var $button = $('<div id="source-button" class="btn btn-primary btn-xs">&lt; &gt;</div>').click(function(){
                var html = $(this).parent().html();
                html = cleanSource(html);
                $("#source-modal pre").text(html);
                $("#source-modal").modal();
            });

            component.hover(function () {
                $(this).append($button);
                $button.show();
            }, function () {
                $button.hide();
            });
        });
        function cleanSource(html) {
            html = html.replace(/×/g, "&times;")
                .replace(/«/g, "&laquo;")
                .replace(/»/g, "&raquo;")
                .replace(/←/g, "&larr;")
                .replace(/→/g, "&rarr;");

            var lines = html.split(/\n/);

            lines.shift();
            lines.splice(-1, 1);

            var indentSize = lines[0].length - lines[0].trim().length,
                re = new RegExp(" {" + indentSize + "}");

            lines = lines.map(function (line) {
                if (line.match(re)) {
                    line = line.substring(indentSize);
                }

                return line;
            });

            lines = lines.join("\n");

            return lines;
        }
    </script>
</head>