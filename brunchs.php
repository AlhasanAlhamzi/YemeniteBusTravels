<!DOCTYPE html>
<html lang="en">

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
<!--The Brunch information-->
   <br/>
   <?php
   $names="where id= ".mysqli_real_escape_string($con,$_GET['showbrunch']);
$query0=mysqli_query($con,"select name from brunchs where id=".mysqli_real_escape_string($con,$_GET['showbrunch']));
$data0=mysqli_fetch_assoc($query0);
    $name=$data0['name'];
   ?>
   <div class="table-responsive">
  <p class="alert alert-info"><strong>All <?php echo $name; ?> Information.</strong><br/></p>          

<?php
$br_id=0;
$brunch="";
$query=mysqli_query($con,"select * from brunchs ".$names);
while($data=mysqli_fetch_assoc($query)){
    $br_id=$data['id'];
?>
    <div class="media br-trv-info">
        <div class="media-left media-middle">

            <!--<img src="img_avatar1.png" class="media-object" style="width:60px">-->
            <h4 class="fa fa-fw fa-bus"></h4>
        </div>
        <div class="media-body">
            <h4 class="media-heading "><?php echo $data['name']; ?> Brunch Informations: </h4>
            <p>ID: <?php echo $data['id']; ?></p>
            <p>Name: <?php echo $data['name']; ?></p>
            <p>Address: <?php echo $data['address']; ?></p>
            <p>Number Of travels: <?php echo $data['n_travels']; ?></p>
        </div><div class="media-body">

            <?php if(!empty($_SESSION['type'])){ if($_SESSION['type']=='admin'||$_SESSION['type']=='manager'){ ?>
            <p>Manager ID: <?php echo $data['manager_id']; ?></p>
            <p>Employee Number: <?php echo $data['emp_numbers']; ?></p>
            <p>Link: <?php echo $data['href']; ?></p>
            <?php }}?>
            <p>Notes: <?php echo $data['note']; ?></p>
        </div>
        <div class="media-body">
            <p>Date: <?php echo $data['dates']; ?></p>
        </div>
    </div>
  
<?php $brunch=$data['name']; } ?>
</table>
</div>
<!--Travels Informations--><br/>
  <?php if($brunch!="Main Brunch"){?>  
<div class="table-responsive">
  <p class="alert alert-info"><strong>All Travels Information In <?php echo $name; ?>.</strong><br/># For More Daitels Click On <a href="travels.php?showtravel=0&actives=Travels" class="brlinktr">Travels</a> To Go.</p>

<?php
$query=mysqli_query($con,"select * from travels where br_id=$br_id");
while($data=mysqli_fetch_assoc($query)){
?>
    <div class="media br-trv-info">
        <div class="media-left media-middle">

            <!--<img src="img_avatar1.png" class="media-object" style="width:60px">-->
            <h4 class="fa fa-fw fa-bus"></h4>
        </div>
        <div class="media-body">
            <h4 class="media-heading "><?php echo $data['name']; ?> Travel Informations: </h4>
            <p>ID: <?php echo $data['id']; ?></p>
            <p>Driver ID: <?php echo $data['emp_id']; ?></p>
            <p>Brunch ID: <?php echo $data['br_id']; ?></p>
            <p>Name: <?php echo $data['name']; ?></p>
        </div><div class="media-body">
            <p>Go Time: <?php echo $data['t_go']; ?></p>

            <p>Time Hours: <?php echo $data['t_hours']; ?></p>
            <p>Passenger Number: <?php echo $data['p_number']; ?></p>
            <p>Seat Cost: <?php echo $data['cost']; ?></p>
        </div><div class="media-body">
            <p>Total Seats: <?php echo $data['t_seats']; ?></p>
            <p>Rest Seats: <?php echo $data['r_seats']; ?></p>
            <p>Notes: <?php echo $data['note']; ?></p>
            <p>Date: <?php echo $data['dates']; ?></p>
        </div>
        <div class="media-left media-middle">
            <a href="travels.php?showtravel=<?php echo $data['id'].'&actives='.$data['name']; ?> "><p><span class="fa fa-fw fa-hand-o-right"></span>More...</p></a>
    </div>
    </div>

  
<?php } ?>
</div>
<?php }else{?>
   <div class="table-responsive">
  <p class="alert alert-info"><strong>All Brunchs Information.</strong><br/></p>
<?php
$query=mysqli_query($con,"select * from brunchs ");
while($data=mysqli_fetch_assoc($query)){
    if($data['name']!="Main Brunch"){
  ?>
        <div class="media br-trv-info">
            <div class="media-left media-middle">

                <!--<img src="img_avatar1.png" class="media-object" style="width:60px">-->
                <h4 class="fa fa-fw fa-bus"></h4>
            </div>
            <div class="media-body">
                <h4 class="media-heading "><?php echo $data['name']; ?> Brunch Informations: </h4>
                <p>ID: <?php echo $data['id']; ?></p>
                <p>Name: <?php echo $data['name']; ?></p>
                <p>Address: <?php echo $data['address']; ?></p>
                <p>Number Of travels: <?php echo $data['n_travels']; ?></p>
            </div><div class="media-body">

                <?php if(!empty($_SESSION['type'])){ if($_SESSION['type']=='admin'||$_SESSION['type']=='manager'){ ?>
                    <p>Manager ID: <?php echo $data['manager_id']; ?></p>
                    <p>Employee Number: <?php echo $data['emp_numbers']; ?></p>
                    <p>Link: <?php echo $data['href']; ?></p>
                <?php }}?>
                <p>Notes: <?php echo $data['note']; ?></p>
            </div>
            <div class="media-body">
                <p>Date: <?php echo $data['dates']; ?></p>
            </div>
            <div class="media-left media-middle">
                <a href="<?php echo $data2['href']; ?>?showbrunch=<?php echo $data['id'].'&actives=Brunchs&showtype=Brunchs'; ?>"><p><span class="fa fa-fw fa-hand-o-right"></span>More...</p></a>
            </div>
        </div>
  
<?php } } ?>
</div>



<?php }?>
        <!-- end of brunch information  -->

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

	<?php include 'pages/footer.php'; ?>
</html>