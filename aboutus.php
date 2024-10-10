<!DOCTYPE html>
<html>
<head>
	<title>RAGT_SHOP</title>
	<link href="animation/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="animation/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="animation/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="animation/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="animation/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="animation/assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="animation/assets/js/modernizr.min.js"></script>
        <link href="animation/css/index.css" rel="stylesheet" type="text/css"/>
        <link href="animation/css/footer.css" rel="stylesheet" type="text/css"/>
        <link href="animation/css/header.css" rel="stylesheet" type="text/css"/>
</head>
<header>

	<?php

        include "pages/header.php";?>
</header>
<body>
<div class="well aboutuswell">
<div class="alert alert-info">
    <big><b><big><span class="fa fa-fw fa-info-circle"></span></big>About The WebSite:</b></big><h3><big>Al- Yemeny For Bus Travels<sup><span class="fa fa-fw fa-bus"></span></sup></big>.</h3>
</div>
    <h4 class="aboutuswelcome"><big><b ><big >Welcome Vissitors</big></b></big><br/>to our website we wish you have all services.<br/>If not you can contact us to find all what you need.</h4>
    <p>
    <big><big><b>This is site will allowed to everyone to queries about Al-Yemeny For Bus Travels And Researvations in usefull web pages.
        </b></big><br/>
        </big></p>

    <h3><big>Al- Yemeny For Bus Travels<sup><span class="fa fa-fw fa-bus"></span></sup></big> Web Site Contains:</h3>
    <big><ul>
            <li><big><big><b>Home Web Page:</b></big><br/>Which Provides Client By All Travels Informations And Allowes Travels Seraching by travels name or by id for Customers.<br/>And Allowes to Customers Researve In Company Travels From The web page itself or from website header.</big></li>
            <li><big><big><b>Brunchs Web Page:</b></big><br/>Which Provides Clients By All Brunch Informations Which Chosen by him And The Travels in Side It.<br/>If The Brunch Is the Main Brunch It Will Show The Brunch Informations and All Brunchs Inside it.</big></li>
            <li><big><big><b>Descussion Web Page:</b></big><br/>Which Allowes Customers To Queries and show his opinion<br/>If The Customer Haven't Any Account he must Fill his Phone Number with his Queries.<br/>The Customers Phone Numbers How haven't Account well never Show To any body accepts The Company Admin or Manager.</big></li>
            <li><big><big><b>Travels Web Page:</b></big><br/>Which Provides Clients By All Travel Informations Which Chosen by him.<br/>And Allowes Customer To Search About his researvations card  by card number and show all informations about that.</big></li>
            <li><big><big><b>Managers Chat Web Page:</b></big><br/>Which Provides All Brunchs Admins Descussions All Company Ideas And Solved All Brunchs Problems.<br/>And The Company Managers How manager The managers Chat.</big></li>
            <?php if(!empty($_SESSION['type'])){
                if($_SESSION['type']=='admin'||$_SESSION['type']=='manager'){ ?>
            <li><big><big><b>Admins Web Page:</b></big><br/>Which Provides Company Admins And Managers To Manage All
                    <ol type="1">
                        <li><b>Brunchs</b></li>
                        <li><b>Employees</b></li>
                        <li><b>Accounts</b></li>
                        <li><b>Travels</b></li>
                        <li><b>Tracks</b></li>
                        <li><b>Researvations</b></li>
                    </ol>
                    Informations And Manage Them Which Allowes Admins Or Managers To
                    <ol type="1">
                        <li><b>Search</b></li>
                        <li><b>Add</b></li>
                        <li><b>Updat</b></li>
                        <li><b>Active/Dactive:</b><small>Just For Employees Account Which The admin Can Active/Deactive All accounts Accepts Managers Accounts. </small></li>
                        <li><b>Delete</b></li>
                    </ol>
                    All Informations In The Company Web Sites.
                    </big></li>
            <?php }} ?>
        </ul></big>
</div>

</body>
<footer>

	   <script src="animation/assets/js/jquery.min.js"></script>
        <script src="animation/assets/js/bootstrap.min.js"></script>
        <script src="animation/assets/js/detect.js"></script>
        <script src="animation/assets/js/fastclick.js"></script>
        <script src="animation/assets/js/jquery.blockUI.js"></script>
        <script src="animation/assets/js/waves.js"></script>
        <script src="animation/assets/js/jquery.slimscroll.js"></script>
        <script src="animation/assets/js/jquery.scrollTo.min.js"></script>
        <script src="animation/js/index.js"></script>
        <!-- App js -->
        <script src="animation/assets/js/jquery.core.js"></script>
        <script src="animation/assets/js/jquery.app.js"></script>
<?php include "pages/footer.php";?>
</footer>
</html>