<?php
session_start();
$con=new mysqli('localhost','root','','yemenit_bus_travels');
if(!empty($_GET['logout'])){
    session_unset();
    echo"<script>
    document.location='index.php';
    </script>";
}

?>
 <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Yemenit Bus Travels.</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <?php 
        $query=mysqli_query($con,'select * from list_menu');
        while($data=mysqli_fetch_assoc($query)){
        ?>
        
        <?php if($data['name']=='Brunchs'){?>
        <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Brunchs
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <?php
          $query2=mysqli_query($con,'select * from brunchs');
          while($data2=mysqli_fetch_assoc($query2)){
          ?>
          <li><a href="<?php echo $data2['href']; ?>?showbrunch=<?php echo $data2['id']; ?>"><?php echo $data2['name']; ?></a></li>
          <?php } ?>
        </ul>

        <?php }
        else if($data['name']=="Travels"){
         ?>
         <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Travels
        <span class="caret"></span></a>
        <ul class="dropdown-menu ">
          <?php $query00=mysqli_query($con,"select id,name from travels");
          while($data00=mysqli_fetch_assoc($query00)){
            ?>
            <li><a href="travels.php?showtravel=<?php echo $data00['id']; ?> "><?php echo $data00['name']; ?></a></li>
          <?php
            }?>
          </ul>
           <?php }
        else if($data['name']=="Managers chat"){
          if(!empty($_SESSION['type']))
        if($_SESSION['type']=="admin" || $_SESSION['type']=="supervisor"){
          ?>
          <li><a href="<?php echo $data['href']; ?>"><?php echo $data['name']?></a></li>
        <?php }  
        }else if($data['name']=="Researvation"){
          ?>
          <li><a  href="" data-toggle="modal" data-target="#researvation"><span class="glyphicon glyphicon-user"></span><?php echo $data['name']; ?></a></li>
          <?php }
        else{ ?>
        <li><a href="<?php echo $data['href']; ?>"><?php echo $data['name']?></a></li>
        <?php } ?>
		</li>
    <?php } ?>
          <li><a href="#">About Us</a></li>
          <?php 
          if(!empty($_SESSION['uname']))
            if($_SESSION['type']=="admin"){
           ?>
          <li><a href="admins.php?showtype=all">Admins</a></li>
          <?php } ?>         
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php
        if(!empty($_SESSION['uname'])){
        ?>
        <li><a href="index.php?logout=logout" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span>Log Out
         </a></li>
         <li>
         <?php if(!empty($_SESSION['user_img'])){ ?>
         <a href="users.php"><img src="photos/users/<?php echo $_SESSION['user_img']; ?>" id="welcomeimg">  <?php echo $_SESSION['uname'] ?> <small><small>| <?php echo $_SESSION['type']; ?></small></small></a>
        <?php }else{ ?>
          <a href="users.php">
          <span class="fa fa-fw fa-user" id="welcomeimg2"></span> <?php echo $_SESSION['uname'] ?> <small><small>| <?php echo $_SESSION['type']; ?></small></small></a>
        <?php } ?>
       </li>
        <?php }
        else{ ?>
        <li><a href="#"  data-toggle="modal" data-target="#signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="#" data-toggle="modal" data-target="#signin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        <?php } ?>
      </br/>
         <form class="navbar-form navbar-left">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Search">
    <div class="input-group-btn">
      <button class="btn btn-success" type="submit">
        <i class="glyphicon glyphicon-search"></i>
      </button>
    </div>
  </div>
</form> 
      </ul>
    </div>
  </div>
</nav> 
    <?php include 'animation/php/signin.php'; ?>
    <?php include 'animation/php/signup.php'; ?>
    <?php include 'animation/php/add_researvation.php'; ?>

