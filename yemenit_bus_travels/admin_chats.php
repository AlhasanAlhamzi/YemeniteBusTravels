<!DOCTYPE html>
<html lang="en">
<?php
    $con=new mysqli("localhost","root","","yemenit_bus_travels");
    if(!empty($_GET['delete'])){
        mysqli_query($con,"delete from admin_chats where id=".$_GET['delete']);
        echo "<script>document.location='admin_chats.php';</script>";
    }
    if(!empty($_GET['like'])){ 
            mysqli_query($con,"update admin_chats set likes=likes+1 where id=".$_GET['like']);
    }
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
        <link rel="icon" href="Img/logo.jpg">
	<?php include 'pages/header.php'; ?>
    </head>
    <body>
   <div class="well">
    <?php
    $query=mysqli_query($con,"select * from admin_chats");
    while($data=mysqli_fetch_assoc($query)){
    $query1=mysqli_query($con,"select uname,type,gender,user_img from employees where id=".$data['emp_id']);
    $data1=mysqli_fetch_assoc($query1);
    
    ?>
    
    <div class="alert alert-success alert-dismissable">
        <?php if(!empty($_SESSION['uname'])){ 
            if($_SESSION['type']=="admin" || $_SESSION['uname']==$data1['uname']){
            ?>
        <a href="admin_chats.php?delete=<?php echo $data['id']; ?>" class="close" aria-label="close">&times;</a>
        <?php }} ?>
        <!--The left side-->
        <div class="media">
            <div class="media-left">
                <img src="photos/users/<?php echo $data1['user_img']; ?>" class="media-object chatsimg"/>
            </div>
            <!--The body side-->
        <div class="media-body">
            <h4 class="media-heading"><?php echo $data1['uname']; ?><small>Type:<small><?php echo $data1['type']; ?>.</small> | Gender:<small><?php echo $data1['gender']; ?>.</small></small></h4>
            <p>
            <strong><?php echo $data['chat']; ?></strong></p><br/>
            <?php 
            $query00=mysqli_query($con,"select likes from admin_chats where id=".$data['id']);
            $data00=mysqli_fetch_assoc($query00);
            ?><a href="admin_chats.php?like=<?php echo $data['id']; ?>" class="fa fa-fw fa-thumbs-up liked"><small><span class="badge"><?php echo $data00['likes']; ?></span></small>
            <p class="b btn likes likebut"></p></a>
        </div>
        <!--The right side-->
         <div class="media-right">
            <p>Date:<?php echo $data['dates']; ?>.</p>
        </div>
        </div>
    </div>
    <?php
    }   ?>
   </div>
   
        <!-- jQuery  -->

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

	<?php include 'pages/admin_chats_footer.php'; ?>
</html>