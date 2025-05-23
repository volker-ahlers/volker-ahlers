
<?php if($with_profile == 0): ?>
<div id="tmb_profile" class="headertabs PROFILE_application">
    <li class="dropdown">
        <a class="dropdown-toggle" href="#" onclick="showLoginPopover();">&nbsp;
            <i class="fa fa-user fa-3x"></i>
        </a>
        <?php include_once("shared/loginpopup.php") ?>
        <link rel="stylesheet" type="text/css" href="css/profile.css" media="all">
        <script src="js/withprofile.js" type="text/javascript"></script>
    </li>
    <?php include_once("loginpopup.php") ?>
</div>
<?php endif; ?>
<?php if($with_profile == 1): ?>
<div id="tmb_profile" class="fa fa-user headertabs">
    <a class="btn btn-default userLogin" href="#"></a>
    <script src="js/toogleUserLogin.js" type="text/javascript"></script>
</div>
<?php endif; ?>
