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
$query0=mysqli_query($con,"select name from brunchs where id=".$_GET['showbrunch']);
$data0=mysqli_fetch_assoc($query0);
    $name=$data0['name'];
   ?>
   <div class="table-responsive">
  <p class="alert alert-info"><strong>All <?php echo $name; ?> Information.</strong><br/></p>          
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Manager ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Number Of Employees</th>
        <th>Nomber Of Travels</th>
        <th>Links</th>
        <th>Note</th>
        <th>Date</th>
      </tr>
    </thead>
<?php
$br_id=0;
$query=mysqli_query($con,"select * from brunchs where id=".$_GET['showbrunch']);
while($data=mysqli_fetch_assoc($query)){
    $br_id=$data['id'];
?>
    <tbody>
      <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['manager_id']; ?></td>
        <td><?php echo $data['name']; ?></td>
        <td><?php echo $data['address']; ?></td>
        <td><?php echo $data['emp_numbers']; ?></td>
        <td><?php echo $data['n_travels']; ?></td>
        <td><?php echo $data['href']; ?></td>
        <td><?php echo $data['note']; ?></td>
        <td><?php echo $data['dates']; ?></td>
        
      </tr>
    </tbody>
  
<?php } ?>
</table>
</div>
<!--Travels Informations--><br/>
<div class="table-responsive">
  <p class="alert alert-info"><strong>All Travels Information In <?php echo $name; ?>.</strong><br/># For More Daitels Click On <a href="travels.php?showtravel=0" class="brlinktr">Travels</a> To Go.</p>          
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
$query=mysqli_query($con,"select * from travels where br_id=$br_id");
while($data=mysqli_fetch_assoc($query)){
?>
    <tbody>
      <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['emp_id']; ?></td>
        <td><?php echo $data['br_id']; ?></td>
        <td><?php echo $data['name']; ?></td>
        <td><?php echo $data['t_go']; ?></td>
        <td><?php echo $data['t_hours']; ?></td>
        <td><?php echo $data['p_number']; ?></td>
        <td><?php echo $data['cost']; ?></td>
        <td><?php echo $data['t_seats']; ?></td>
        <td><?php echo $data['r_seats']; ?></td>
        <td><?php echo $data['note']; ?></td>
        <td><?php echo $data['dates']; ?></td>         
      </tr>
    </tbody>
  
<?php } ?>
</table>
</div>

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