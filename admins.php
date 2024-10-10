<!DOCTYPE html>
<html lang="en">
<?php 
$con=new mysqli("localhost","root","","Yemenit_bus_travels");
?>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="News Portal.">
        <meta name="author" content="PHPGurukul">
        <!-- App title -->
        <title>Yemenit Bus Travels</title>
        <!-- App css -->
        <link href="animation/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="animation/assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="animation/assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="animation/assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="animation/assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="animation/assets/css/responsive.css" rel="stylesheet" type="text/css" />
        <script src="animation/assets/js/modernizr.min.js"></script>
        <link href="animation/css/header.css" rel="stylesheet" type="text/css" />
        <link href="animation/css/footer.css" rel="stylesheet" type="text/css" />
        <link href="animation/css/index.css" rel="stylesheet" type="text/css" />
        <link href="animation/css/admin.css" rel="stylesheet" type="text/css" />
        <script src="animation/js/index.js"></script>
        <link rel="icon" href="Img/logo.jpg">
	<?php include 'pages/header.php'; ?>
    </head>
    <body>
<?php
if(!empty($_SESSION['uname'])){
?>
<div class="container">
    <?php 
    $show_number=0;
    if($_GET['showtype']!='all') {
        $query = mysqli_query($con, "select id from " . $_GET['showtype']);

        while ($data = mysqli_fetch_assoc($query))
            $show_number = $show_number + 1;
    }
    ?>
    <div class="alert alert-success admin-main-alert">
        <?php if($_GET['showtype']!='all'){?>
    <strong><br/>Number Of <?php echo $_GET['showtype']; ?> Are : <span class="badge"><?php echo $show_number; ?></span> <?php echo $_GET['showtype'];?> Untile Now.</a>
        <br/></strong>
            <?php }else{?>
            <strong><br/>All Informations<br/><br/></strong>
            <?php }?>
    </div>

</div>
    <!--Tables-->

<?php include ('animation/php/admin_add_employee.php'); ?>
<?php include ('animation/php/admin_update_employee.php'); ?>
<?php include ('animation/php/admin_update_account.php'); ?>
<?php include ('animation/php/admin_add_brunch.php'); ?>
<?php include ('animation/php/admin_update_brunch.php'); ?>
<?php include ('animation/php/admin_add_travel.php'); ?>
<?php include ('animation/php/admin_update_travel.php'); ?>
<?php include ('animation/php/admin_add_track.php'); ?>
<?php include ('animation/php/admin_update_track.php'); ?>
    <?php include ('pages/admin_tables.php'); ?>
<?php }else{
    echo "<script>alert('Ooopsy. You Must Be Sign In At First To Access to This Is Part.');
    document.location='index.php&actives=Home';
    </script>";

} ?>
    </body>
        <script src="animation/assets/js/jquery.min.js"></script>
        <script src="animation/assets/js/bootstrap.min.js"></script>
        <script src="animation/assets/js/detect.js"></script>
        <script src="animation/assets/js/fastclick.js"></script>
        <script src="animation/assets/js/jquery.blockUI.js"></script>
        <script src="animation/assets/js/waves.js"></script>
        <script src="animation/assets/js/jquery.slimscroll.js"></script>
        <script src="animation/assets/js/jquery.scrollTo.min.js"></script>
        <!-- App js -->
        <script src="animation/assets/js/jquery.core.js"></script>
        <script src="animation/assets/js/jquery.app.js"></script>


</html>