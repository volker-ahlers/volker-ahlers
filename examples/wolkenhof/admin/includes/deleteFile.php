<?php
if ($_REQUEST['file'] != "select file")
    unlink($_REQUEST['file']);
//echo json_encode($_REQUEST);
?>