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
    $acc_num=0;
    $emp_num=0;
    $tr_num=0;
    $br_num=0;
    $r_num=0;
    $query=mysqli_query($con,"select id from accounts");
    while($data=mysqli_fetch_assoc($query))
        $acc_num=$acc_num+1;
    $query=mysqli_query($con,"select id from employees");
    while($data=mysqli_fetch_assoc($query))
        $emp_num=$emp_num+1;
    $query=mysqli_query($con,"select id from brunchs");
    while($data=mysqli_fetch_assoc($query))
        $br_num=$br_num+1;
    $query=mysqli_query($con,"select id from travels");
    while($data=mysqli_fetch_assoc($query))
        $tr_num=$tr_num+1;
    $query=mysqli_query($con,"select id from researvations");
    while($data=mysqli_fetch_assoc($query))
        $r_num=$r_num+1;
    ?>
    <div class="showall">
    <a href="admins.php?showtype=all"><button class="b btn-info showbut">Show All Informations</button></a>
    </div>
    <p>
    <span class="alert alert-success result_number"><strong>Number Of Accounts Are : <span class="badge"><?php echo $acc_num; ?></span> Accounts Untile Now. <a href="admins.php?showtype=accounts"><button class="b btn-info showbut">Show</button></a>
       <!-- <form action="" method="POST" style="position: absolute">
            <input type="hidden" value="accounts" name="show_type"/>
            <input type="button" class="b btn-info showbut" value="Show"/>
        </form>-->
        </strong></span>
    <span class="alert alert-success result_number"><strong>Number Of Employees Are : <span class="badge"><?php echo $emp_num; ?></span> Employees Untile Now. 
        <a href="admins.php?showtype=employees"><button class="b btn-info showbut">Show</button></a></strong></span><br/><br/><br/>
    <span class="alert alert-success result_number"><strong>Number Of Brunchs Are : <span class="badge"><?php echo $br_num; ?></span> Brunchs Available Untile Now. 
        <a href="admins.php?showtype=brunchs"><button class="b btn-info showbut">Show</button></a></strong></span>
    <span class="alert alert-success result_number"><strong>Number Of Travels Are : <span class="badge"><?php echo $tr_num; ?></span> Travels Available Untile Now. 
        <a href="admins.php?showtype=travels"><button class="b btn-info showbut">Show</button></a></strong></span><br/><br/><br/>
        <span class="alert alert-success result_number"><strong>Number Of Researvations Are : <span class="badge"><?php echo $r_num; ?></span>. 
        <a href="admins.php?showtype=researvations"><button class="b btn-info showbut">Show</button></a></strong></span>
    </p>
    <!--Tables-->
<?php include 'animation/php/admin_add_employee.php'; ?>
<?php include 'animation/php/admin_update_employee.php'; ?>
<?php include 'animation/php/admin_update_account.php'; ?>
<?php include 'animation/php/admin_add_brunch.php'; ?>
<?php include 'animation/php/admin_update_brunch.php'; ?>
<?php include 'animation/php/admin_add_travel.php'; ?>
<?php include 'animation/php/admin_update_travel.php'; ?>
<?php include 'pages/admin_tables.php'; ?>
        
<?php }else{
    echo "<script>alert('Ooopsy. You Must Be Sign In At First To Access to This Is Part.');
    document.location='index.php';
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