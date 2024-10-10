<!DOCTYPE html>

<html lang="en">
<?php
    $con=new mysqli("localhost","root","","yemenit_bus_travels");
    if(!empty($_GET['delete'])){
        mysqli_query($con,"delete from chats where id=".mysqli_real_escape_string($con,$_GET['delete']));
//        echo "<script>document.location='chats.php?actives=Descussion';</script>";
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
    <p class="alert alert-info hichat"><big><b>
                Welcome Every Body To Our WebSite.<br/>
                Here We Can Answer All Your Questions.
            </b></big></p>
   <div class="well">
    <?php
    $num=0;
    $query=mysqli_query($con,"select * from chats");
    while($data=mysqli_fetch_assoc($query)){
    if(!empty($data['acc_id'])){
    $query1=mysqli_query($con,"select id,uname,type,gender,user_img from accounts where id=".$data['acc_id']);
    $data1=mysqli_fetch_assoc($query1);
    $num=1;
    }
    else if(!empty($data['emp_id'])){
    $query1=mysqli_query($con,"select id,uname,type,gender,user_img from employees where id=".$data['emp_id']);
    $data1=mysqli_fetch_assoc($query1);
    $num=1;
    
    }
    else{
        $num=0;
    }
    ?>
    
    <div class="alert alert-success alert-dismissable ">
        <?php if(!empty($_SESSION['uname'])){ 
            if($_SESSION['type']=="admin" || $_SESSION['type']=="manager" || $_SESSION['uname']==$data1['uname']){
            ?>
        <a href="chats.php?delete=<?php echo $data['id']; ?>&actives=Descussion" class="close" aria-label="close">X</a>
        <?php }} ?>
        <!--The left side-->
        <div class="media">
            <div class="media-left">

                <?php  if($num==0){ ?>
                <img src="photos/users/user.png" class="media-object chatsimg"/>
                <?php }else {?>
                <img src="photos/users/<?php echo $data1['user_img']; ?>" class="media-object chatsimg"/>
                <?php }?>
            </div>
            <!--The body side-->
        <div class="media-body">
            <h4 class="media-heading">
                <?php if($num!=0){ 
                    echo $data1['uname']; ?><small>Type:<small><?php echo $data1['type']; ?>.</small> | Gender:<small><?php echo $data1['gender']; ?>.</small></small><?php } else{ 
                    echo $data['name']; ?>
                    <small>Passenger<?php if(!empty($_SESSION['employee']))if($_SESSION['employee']=="employee")
                    echo " | Phone :<small>".$data['phone']."</small>"; }?></small>

                </h4>   
            <p>
            <strong><?php echo $data['chat']; ?></strong></p><br/>

            <!--<button class="b btn likes"><a class="fa fa-fw fa-thumbs-up"><small><span class="badge">5</span></small></a></button>-->
        </div>
        <!--The right side-->
         <div class="media-right">
            <p>Date:<?php echo $data['dates']; ?>.</p>
        </div>
        </div>
    </div>
    <?php
    $num=0;
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

	<?php include 'pages/chat_footer.php'; ?>
</html>