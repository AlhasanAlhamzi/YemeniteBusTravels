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
<!--The Travels information-->
<br/>
<?php
$id="";
$name="";
$show='';
if(!empty($_GET['showtravel']))
if($_GET['showtravel']!='0'){

$id=" where id=".mysqli_real_escape_string($con,$_GET['showtravel']);
$query00=mysqli_query($con,"select name from travels $id");
$data00=mysqli_fetch_assoc($query00);
$name=$data00['name'];
}else if(!empty($_POST['showtravel'])){

    $id=" where id=".mysqli_real_escape_string($con,$_POST['showtravel']);
$query00=mysqli_query($con,"select name from travels $id");
$data00=mysqli_fetch_assoc($query00);
$name=$data00['name'];
}
?>
<div class="table-responsive">

        <?php if(!empty($id)){?>
         <br/>
    <p class="alert alert-warning"><big><span class="fa fa-fw fa-warning trwarning"></span><big>Warning: </big>On all passengers came in the right time to pay the researvation ticket befor 12 Hours from travels gone.
    If not The passenger researvation will delete and give it to anothers passenger. </big></p> <?php }?>
  <p class="alert alert-info"><strong>All <?php echo $name; ?> Travels Information.</strong><br/>
    <?php if(empty($id)){?>
    <p class="alert alert-warning"><big><span class="fa fa-fw fa-warning"></span><big>Warning: </big>On all passengers came in the right time to pay the researvation ticket befor 12 Hours from travels gone.
    If not The passenger researvation will delete and give it to anothers passenger. </big></p>
  <?php 
}
  $query0=mysqli_query($con,"select * from travels $id");
while($data=mysqli_fetch_assoc($query0)){
  ?>
<hr/>
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

      </div>
    <?php }?>
<?php if(!empty($_POST['searchtravel'])){?>
<?php
//if(empty($trid))
//$trid="";
//$query=mysqli_query($con,"select * from researvations $trid");

$query=mysqli_query($con,"select * from researvations where id=".mysqli_real_escape_string($con,$_POST['searchtravel'])." and tr_id=".mysqli_real_escape_string($con,$_GET['showtravel']));
while($data=mysqli_fetch_assoc($query)){
?>
    <div class="media br-trv-info">
        <div class="media-left media-middle">

            <!--<img src="img_avatar1.png" class="media-object" style="width:60px">-->
            <h4 class="fa fa-fw fa-bus"></h4>
        </div>
        <div class="media-body">
            <h4 class="media-heading "><?php echo $data['id']; ?> Researvation Informations: </h4>
        <p>ID: <?php echo $data['id']; ?></p>
        <p>Travel ID: <?php echo $data['tr_id']; ?></p>
        <p>First Name: <?php echo $data['fname']; ?></p>
        <p>Last Name: <?php echo $data['lname']; ?></p>
        </div><div class="media-body">
        <p>Phone: <?php echo $data['phone']; ?></p>
        <p>Age: <?php echo $data['age']; ?></p>
        <p>Gender: <?php echo $data['gender']; ?></p>
        <p>Address: <?php echo $data['address']; ?></p>
        </div><div class="media-body">
        <p>Number Of Seats: <?php echo $data['n_seats']; ?></p>
        <p>Total Money: <?php echo $data['t_money']; ?></p>
        <p>Payed: <input type="checkbox" <?php if($data['pay']==1)echo 'checked'; ?>></p>
            <p>Account ID: <?php echo $data['acc_id']; ?></p>
        </div><div class="media-body">
            <p>Notes: <?php echo $data['note']; ?></p>
        <p>Dates: <?php echo $data['dates']; ?></p>
        </div>
    </div>
<?php }?>
<div class="trback">
<a href="travels.php?showtravel=<?php echo $_POST['showtravel']; ?>&actives=Travels" ><span class="fa fa-fw fa-bus"></span> Back</a>
</div>
<?php }?>

  <br/>

</div>

<!--The end of travels information-->   
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

	<?php include 'pages/footer.php'; ?>
</html>