<?php
session_start();
$con=new mysqli('localhost','root','','yemenit_bus_travels');
if(!empty($_GET['logout'])){
    session_unset();
    echo"<script>
    document.location='index.php?actives=Home';
    </script>";
}
$all=' ';
$employees=' ';
$accounts=' ';
$brunchs=' ';
$travels=' ';
$tracks=' ';
$reseave=' ';
if(!empty($_GET['showtype'])){
if($_GET['showtype']=='all')
$all='active';
else if($_GET['showtype']=='employees')
    $employees='active';
else if($_GET['showtype']=='accounts')
    $accounts='active';
else if($_GET['showtype']=='brunchs')
    $brunchs='active';
else if($_GET['showtype']=='travels')
    $travels='active';
else if($_GET['showtype']=='tracks')
    $tracks='active';
else if($_GET['showtype']=='employees')
    $employees='active';
else if($_GET['showtype']=='researvations')
    $reseave='active';

}

?>
<nav class="navbar navbar-inverse headnav">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Yemenit Bus Travels<sup><span class="fa fa-fw fa-rss headlinrss"></span></sup></a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <?php
                $query=mysqli_query($con,'select * from list_menu');
                while($data=mysqli_fetch_assoc($query)){
                    ?>
                    <?php if(!empty($_GET['actives'])){
                        if($_GET['actives']==$data['name']){
                            if($data['name']=='Brunchs'||$data['name']=='Travels'){?>
                                <li class="active dropdown">
                                <?php }else {?>
                                <li class="active">

                    <?php }}else {?>
                        <li>
                        <?php }}else{
                            
                           
                        if($data['name']=='Brunchs'||$data['name']=='Travels'){?>
                            <li class="dropdown">
                        <?php }else {?>
                            <li>

                        <?php }
                    }?>
                    <?php if($data['name']=='Brunchs'){?>
                                    
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Brunchs
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php
                            $query2=mysqli_query($con,'select * from brunchs');
                            while($data2=mysqli_fetch_assoc($query2)){
                                ?>
                                <li><a href="<?php echo $data2['href']; ?>?showbrunch=<?php echo $data2['id'].'&actives='.$data['name']; ?>"><?php echo $data2['name']; ?></a></li>
                            <?php } ?>
                        </ul>

                    <?php }
                    else if($data['name']=="Travels"){
                        ?>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Travels
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu ">
                            <?php $query00=mysqli_query($con,"select id,name from travels");
                            while($data00=mysqli_fetch_assoc($query00)){
                                ?>
                                <li><a href="travels.php?showtravel=<?php echo $data00['id'].'&actives='.$data['name']; ?> "><?php echo $data00['name']; ?></a></li>
                                <?php
                            }?>
                        </ul>
                    <?php }
                    else if($data['name']=="Managers chat"){
                        if(!empty($_SESSION['type']))
                            if($_SESSION['type']=="admin" || $_SESSION['type']=="supervisor" || $_SESSION['type']=="manager"){
                                ?>
                                <a href="<?php echo $data['href'].'?actives='.$data['name']; ?>"><?php echo $data['name']?></a></li>
                            <?php }
                    }else if($data['name']=="Researvation"){
                        ?>
                        <a  href="" data-toggle="modal" data-target="#researvation"><span class="glyphicon glyphicon-user"></span><?php echo $data['name']; ?></a></li>
                    <?php }
                    else{ ?>
                        <a href="<?php echo $data['href'].'?actives='.$data['name']; ?>"><?php echo $data['name']?></a></li>
                    <?php } ?>
                    </li>
                <?php }
                if(!empty($_GET['actives'])){
                    if($_GET['actives']=='aboutus'){
                        ?>
                        <li class="active">
                        <?php
                    }else{
                ?>
                            <li>
                <?php }}else{?>
                <li>
                <?php }?>
                <a href="aboutus.php?&actives=aboutus">About Us</a></li>
                <?php
                if(!empty($_SESSION['uname'])&& !empty($_SESSION['type']))
                    if($_SESSION['type']=="admin"|| $_SESSION['type']=="manager"){
                        if(!empty($_GET['actives'])){
                            if($_GET['actives']=='admin'){
                                ?>
                                <li class="active">
                                <?php
                            }else{
                                ?>
                                <li>
                            <?php }}else{?>
                            <li>
                            <?php }?>
                        <a href="admins.php?showtype=all&actives=admin">Admins</a></li>
                    <?php } ?>
            </ul>
            <div class="nav navbar-nav navbar-right">

                <ul class="nav navbar-nav navbar-right header-log">
                    <?php
                    if(!empty($_SESSION['uname'])&&!empty($_SESSION['type'])){
                        ?>
                        <li><a href="index.php?logout=logout" data-toggle="modal"><span class="glyphicon glyphicon-log-in"></span>Log Out
                            </a></li>
                        <li>
                            <?php if(!empty($_SESSION['user_img'])){ ?>
                                <a href="users.php?actives=Users"><img src="photos/users/<?php echo $_SESSION['user_img']; ?>" id="welcomeimg">  <?php echo $_SESSION['uname'] ?> <small><small>| <?php echo $_SESSION['type']; ?></small></small></a>
                            <?php }else{ ?>
                                <a href="users.php?actives=Users">
                                    <span class="fa fa-fw fa-user" id="welcomeimg2"></span> <?php echo $_SESSION['uname'] ?> <small><small>| <?php echo $_SESSION['type']; ?></small></small></a>
                            <?php } ?>
                        </li>
                    <?php }
                    else{ ?>
                        <li ><a href="#"  data-toggle="modal" data-target="#signup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
                        <li class="logs"><a href="#" data-toggle="modal" data-target="#signin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                    <?php } ?>
                    </br/>

                </ul><br/>
                <form class="navbar-form navbar-left index-search" action="" method="post">

                    <div class="input-group">

                        <input type="text" name="searchtravel" class="form-control search" placeholder="Search">
                        <div class="input-group-btn">
                            <button class="btn btn-success" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="showtravel" value="<?php if(!empty($_GET['showtravel'])) echo $_GET['showtravel']; ?>">
                </form>
            </div>
        </div>
        <?php if(!empty($_GET['actives'])&&!empty($_SESSION['type'])) if($_GET['actives']=='admin'&& $_SESSION['type']!='user'){?>
        <div class="admin-menu">
            <div class="navbar-header">

                <a class="navbar-brand" href="#">For All Informations:</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="<?php echo $all;?>"><a href="admins.php?actives=admin&showtype=all">All Info</a></li>
                <li class="<?php echo $employees;?>"><a href="admins.php?actives=admin&showtype=employees">Employees</a></li>
                <li class="<?php echo $accounts;?>"><a href="admins.php?actives=admin&showtype=accounts">Accounts</a></li>
                <li class="<?php echo $brunchs;?>"><a href="admins.php?actives=admin&showtype=brunchs">Brunchs</a></li>
                <li class="<?php echo $travels;?>"><a href="admins.php?actives=admin&showtype=travels">Travels</a></li>
                <li class="<?php echo $tracks;?>"><a href="admins.php?actives=admin&showtype=tracks">Tracks</a></li>
                <li class="<?php echo $reseave;?>"><a href="admins.php?actives=admin&showtype=researvations">Researvations</a></li>

            </ul>
        </div>
        <?php }?>
    </div>
</nav>
<?php include 'animation/php/signin.php'; ?>
<?php include 'animation/php/signup.php'; ?>
<?php include 'animation/php/add_researvation.php'; ?>

