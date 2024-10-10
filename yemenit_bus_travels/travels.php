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
if($_GET['showtravel']!='0'){
$id=" where id=".$_GET['showtravel'];
$query00=mysqli_query($con,"select name from travels $id");
$data00=mysqli_fetch_assoc($query00);
$name=$data00['name'];
}
?>
<div class="table-responsive">

        <?php if(!empty($id)){?>
         <br/>
    <p>hello brothers to her where evrey things is posable to hapends</p>
  </p> <?php }?>
  <p class="alert alert-info"><strong>All <?php echo $name; ?> Travels Information.</strong><br/>
    <?php if(empty($id)){?>
    <p>hello brothers to her where evrey things is posable to hapends</p>
  </p> 
  <?php 
}
  $query0=mysqli_query($con,"select * from travels $id");
while($data0=mysqli_fetch_assoc($query0)){
  ?>       
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Employee ID</th>
        <th>Brunch ID</th>
        <th>Name</th>
        <th>Go Time</th>
        <th>Total hours</th>
        <th>Passengers Number</th>
        <th>Cost</th>
        <th>Total Seats</th>
        <th>Rest Seats</th>
        <th>Note</th>
        <th>Date</th>
      </tr>
    </thead>
<?php


?>
<hr/>
    <?php if(empty($id)){ ?>
    <p class="alert alert-info"><strong><?php echo $data0['name']; ?> Travel Informations.</strong><br/></p>
    <?php }?>
    <tbody>
      <tr>
        <td><?php echo $data0['id']; ?></td>
        <td><?php echo $data0['emp_id']; ?></td>
        <td><?php echo $data0['br_id']; ?></td>
        <td><?php echo $data0['name']; ?></td>
        <td><?php echo $data0['t_go']; ?></td>
        <td><?php echo $data0['t_hours']; ?></td>
        <td><?php echo $data0['p_number']; ?></td>
        <td><?php echo $data0['cost']; ?></td>
        <td><?php echo $data0['t_seats']; ?></td>
        <td><?php echo $data0['r_seats']; ?></td>
        <td><?php echo $data0['note']; ?></td>
        <td><?php echo $data0['dates']; ?></td>         
      </tr>
    </tbody>
                
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Account ID</th>
        <th>Travel ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Number Of Seats</th>
        <th>Total Cost</th>
        <th>Pay</th>
        <th>Note</th>
        <th>Date</th>
      </tr>
    </thead>
    <p class="alert alert-success"><strong>All Researvations Information.</strong><br/></p>
<?php
//if(empty($trid))
//$trid="";
//$query=mysqli_query($con,"select * from researvations $trid");
$query=mysqli_query($con,"select * from researvations where tr_id=".$data0['id']);
while($data=mysqli_fetch_assoc($query)){
?>
    <tbody>
      <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['acc_id']; ?></td>
        <td><?php echo $data['tr_id']; ?></td>
        <td><?php echo $data['fname']; ?></td>
        <td><?php echo $data['lname']; ?></td>
        <td><?php echo $data['phone']; ?></td>
        <td><?php echo $data['age']; ?></td>
        <td><?php echo $data['gender']; ?></td>
        <td><?php echo $data['address']; ?></td>
        <td><?php echo $data['n_seats']; ?></td>
        <td><?php echo $data['t_money']; ?></td>
        <td><?php echo $data['pay']; ?></td>
        <td><?php echo $data['note']; ?></td>
        <td><?php echo $data['dates']; ?></td>       
      </tr>
    </tbody>
<?php } ?>
</table>



</table>
    <?php
//$trid="where tr_id=".$data['id'];
 } ?>
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