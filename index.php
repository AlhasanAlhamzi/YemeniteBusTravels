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
        <script src="animation/js/index.js"></script>
        <link rel="icon" href="Img/logo.jpg">
	<?php include 'pages/header.php'; ?>
    </head>
    <body>
<?php

$con=new mysqli('localhost','root','','yemenit_bus_travels');

?>

    	 <!-- Slider -->
<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner slider">
        <div class="item active">
            <img src="photos/slider/main.png" alt="Main Brunch">
        </div>

        <div class="item">
            <img src="photos/slider/sanaa.png" alt="Sanaa Brunch">
        </div>

        <div class="item">
            <img src="photos/slider/taiz.jpg" alt="Taiz Brunch">
        </div>
        <div class="item">
            <img src="photos/slider/aden.jpg" alt="Aden Brunch">
        </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
<!-- End Slider --> 
<!-- Travels ticket--><br/><br/>
  
    <p class="alert alert-warning"><big><span class="fa fa-fw fa-warning trwarning"></span><big>Warning: </big>On all passengers came in the right time to pay the researvation ticket befor 12 Hours from travels gone.
    If not The passenger researvation will delete and give it to anothers passenger. </big></p>
    <div class="allmindexdiv">

  <table class="table table-striped">

  <tbody>
    <tr>
   <td >


    <div class="indextravelsinfo"><br/><br/><ul class="list-group ">
  <?php 
  if(!empty($_POST['searchtravel'])){
      $type=mysqli_real_escape_string($con,$_POST['searchtravel']);
    $query0=mysqli_query($con,"select id,name,t_go,t_hours from travels where name='".$type."' or id='".$type."'");
  }
  else 
    $query0=mysqli_query($con,"select id,name,t_go,t_hours from travels ");

$d=0;
  while($data0=mysqli_fetch_assoc($query0)){
    $d=1;
    $query=mysqli_query($con,"select id from researvations where tr_id=".$data0['id']);
    $num=0;

    while($data=mysqli_fetch_assoc($query)){
      $num=$num+1;
    }
  ?>
  <li class="alert alert-success"><big><span class="fa fa-fw fa-bus"></span><big><?php echo $data0['id']." | ".$data0['name'];?> </big></big> <?php echo " will go in".$data0['t_go']." it will take ".$data0['t_hours']."  Hours to arrived to destnition." ; ?><br/> Have <span class="badge"><?php echo $num; ?> </span> Researvations until now.<br/>To know All Researvations informations click <span class="fa fa-fw fa-hand-o-right"></span><a href="travels.php?showtravel=<?php echo $data0['id']; ?>&actives=Travels">Here to go</a>.
  </li>
  <?php } if($d==0 && !empty($_POST['searchtravel']) ){
    ?>
<script type="text/javascript">
  alert("Ooopsy.\n This is travels not found in Our database please make sure from the travel which you are choosing and try again.\n Thanks For vissit Us.");
  document.location="index.php?actives=Home";
</script>
    <?php
  } ?>

</ul> </div></td>
     <td></td>
<td><?php include 'pages/index_researvation.php'; ?></td>

  </tr>
</tbody>
</table>
  <!-- Pages Numbers-->
 <!-- <ul class="pager">
  <li><a href="#">Prev</a></li>
 
<ul class="pagination pagination-sm ">
  <li><a href="#">1</a></li>
  <li><a href="#">2</a></li>
  <li><a href="#">3</a></li>
</ul> 
 <li><a href="#">Next</a></li>
</ul>
--> 
</div>
	<?php include 'pages/footer.php'; ?>

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
        <!-- App js -->
        <script src="animation/assets/js/jquery.core.js"></script>
        <script src="animation/assets/js/jquery.app.js"></script>

  </footer>
</html>