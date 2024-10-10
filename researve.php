
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
if($_SERVER['REQUEST_METHOD']=='POST'){

  if(!empty($_POST['resufname'])){
    $fname=mysqli_real_escape_string($con,$_POST['resufname']);
    $lname=mysqli_real_escape_string($con,$_POST['relname']);
    $phone=mysqli_real_escape_string($con,$_POST['rephone']);
    $age=mysqli_real_escape_string($con,$_POST['reage']);
    $gender=mysqli_real_escape_string($con,$_POST['regender']);
    $address=mysqli_real_escape_string($con,$_POST['readdress']);
    $nseats=mysqli_real_escape_string($con,$_POST['renseats']);
    $trid=mysqli_real_escape_string($con,$_POST['retrid']);
    $tmoney=mysqli_real_escape_string($con,$_POST['restcost']);
    $id=mysqli_real_escape_string($con,$_POST['resuid']);
    $lasttrid=mysqli_real_escape_string($con,$_POST['lasttrid']);
    $pay=0;
    if(!empty($_POST['pay']))
      $pay=mysqli_real_escape_string($con,$_POST['pay']);
   // echo "<script> alert(".$id.");</script>";
    $query0=mysqli_query($con,"select id,t_seats,dates from travels where id=".$trid);

    $data0=mysqli_fetch_assoc($query0);
    if($trid!=$lasttrid){
      mysqli_query($con,"update travels set p_number=p_number - 1 ,r_seats=r_seats + 1 where id=".$lasttrid);
      mysqli_query($con,"update travels set p_number=p_number +1 , r_seats=r_seats - 1 where id=".$trid);
    }
    $query01=mysqli_query($con,"select id from researvations where enabled=1 and tr_id=".$data0['id']);
      $num=0;
      while($data01=mysqli_fetch_assoc($query01)){
        $num=$num+1;
      }
      $enabled=1;
      $researv="Add Successfully.";
      if($num==$data0['t_seats'])
        $enabled=0;
      if($enabled==0)
        $researv="Sory You are to late and you have no researvation until now we Will told you if there is valide researvation or you will take an rsearvation in the second travels.";
      $table="";
      $column="";
      if($_POST['employees']=="employees"){
        $table="employees";
        $column="emp_id";
      }
      else if($_POST['employees']=="accounts"){
        $table="accounts";
        $column="acc_id";
      }
      $query=mysqli_query($con,"select id from $table where uname='".$_POST['reuname']."' and pwd='".md5($_POST['repass']."pwd")."'");
      

      if($data=mysqli_fetch_assoc($query)){
          if(mysqli_query($con,"update researvations set ".$column."=".$data['id'].",tr_id=".$trid.",fname='".$fname."',lname='".$lname."',phone=".$phone.",age=".$age.",gender='".$gender."',address='".$address."',n_seats=".$nseats.",t_money=".$tmoney.",pay=".$pay.",enabled=".$enabled." where id=".$id)){
            $query2=mysqli_query($con,"select id from researvations where $column=".$data['id']);
            $data2=mysqli_fetch_assoc($query2);
            ?>
            <script>
            alert("<?php echo $researv; ?>\n Your card number is: <?php echo $id; ?>.\nThe Travel Going Time is <?php echo $data0['dates']; ?> And You Must Pay Befor 24 Hours From Travel Gone Time Or Your Seats Will Researves To Another Person And Folow The Supervisor Notes.\n Thanks For Travels With Us.");
            document.location="researve.php?showtype=Home&actives=Home&researve=<?php echo $id; ?>";
            </script>
            <?php
          }else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying to update your reasearved.');
            </script>";
          }
        }else{
          echo "<script>alert('The User Name or Password Wrong or You Are Not Have Accounts. Please Be Sure From Your User Name and Password and try again.\nthanks for vissit us.');</script>";
        }
      }else{
              echo"<script>
              
            alert('There is an error.');
            </script>";
         
      }
}

?>






<?php

  $ids=0;
if(!empty($_GET['researve'])){
	$query=mysqli_query($con,"select * from researvations where id=".mysqli_real_escape_string($con,$_GET['researve']));
	$data=mysqli_fetch_assoc($query);
	
  $ids=$data['id'];
  if($data['enabled']==0){
?>
<alert class="alert alert-danger">Sory You are to late and you have no researvation until now we Will told you if there is valide researvation or you will take an rsearvation in the second travels.</alert>
<?php
  }
  else{
?>
<alert class="alert alert-danger">Add Successfully.
You are resaerved now you must pay in at lest 15 hour from th travels go or we will give your card to another passengr. thanks for vissit us. </alert>
<?php
  }
	?>
 <div class="modal-dialog resmainform">
  <form action='' method='POST' class='signupform' enctype="multipart/form-data">

    <!-- Modal content-->
  <div class="modal-dialog resmainform">
  <form action='' method='POST' class='signupform' enctype="multipart/form-data">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title signtitle"><a class="fa fa-fw fa-user icons"/></a>New Researvation.</h4><br/>
        <div class="form-group">
    <label for="pwd">Card number:</label><br/>
    <input type="textbox" onchange="restcosts();" placeholder='Card Number:' value="<?php echo $data['id']; ?>" class="form-control" id="pwd" disabled="true"><br/>
    <input type="hidden" name="resuid" value="<?php echo $data['id'];?>">   
    <label for="pwd">First Name:</label><br/>
    <input type="text" name='resufname' value="<?php echo $data['fname']; ?>" onchange="restcosts();" placeholder='First Name:' value="<?php echo $data['fname']; ?>" class="form-control" id="pwd"><br/>
    <label for="pwd">Last Name:</label><br/>
    <input type="text" name='relname'  value="<?php echo $data['lname']; ?>" placeholder='Last Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">Phone Number:</label><br/>
    <input type="number" name='rephone'  value="<?php echo $data['phone']; ?>" placeholder='Phone Number:'class="form-control" id="pwd"><br/>
    <label for="pwd">Age:</label><br/>
    <input type="number" placeholder='Age:' value="<?php echo $data['age']; ?>" name='reage' class="form-control" id="pwd"><br/>
      <label for="sel1">Gender:</label><br/>
  <select class="form-control" name='regender' id="sel1">
    <?php if($data['gender']=="male"){?>
    <option value='male'>Male</option>
    <option value='female'>Female</option>
    <?php } else{ ?>
    <option value='female'>Female</option>
    <option value='male'>Male</option>
    <?php }?>
  </select><br/>
  <label for="pwd">Address:</label><br/>
    <input type="text" placeholder='Address:' value="<?php echo $data['address']; ?>" name='readdress' class="form-control" id="pwd"><br/>
    <label for="pwd">Number Of Seats:</label><br/>
    <input type="number" id="resnseats" value="<?php echo $data['n_seats']; ?>" placeholder='number Of Seats:' name='renseats' class="form-control" id="pwd"  onchange="restcosts();"><br/>
    <div id="resunames">
      <?php 
      $utable="";
      $id=0;
      if(!empty($data['acc_id']) || !empty($data['emp_id'])){
      if(!empty($data['acc_id'])){
        $utable="accounts";
        $id=$data['acc_id'];
      }else if(!empty($data['emp_id'])){
        $utable="employees";
        $id=$data['emp_id'];
        } 
      $query1=mysqli_query($con,"select uname from $utable where id=".$id);
      $data1=mysqli_fetch_assoc($query1);
      ?>
    <label for="pwd" >User Name:</label><br/>
    <input type="text"  placeholder='User Name:' value="<?php echo $data1['uname']; ?>" name='reuname' class="form-control" /><br/>
    <label for="pwd" >Password:</label><br/>
    <input type="password" placeholder='Password:' name='repass' class="form-control" /><br/>
  <?php }?>
    <?php if(!empty($data['emp_id'])){?>
    <lable><input type="radio" name="employees" value="employees" checked/> Employee.</lable>
    <lable><input type="radio" name="employees" value="accounts" /> Account.</lable>
    <?php }else{?>
    <lable><input type="radio" name="employees" value="employees" /> Employee.</lable>
    <lable><input type="radio" name="employees" value="accounts" checked/> Account.</lable>
    <?php }?>
    </div><br/>  
    <input type="hidden" name="lasttrid" value="<?php echo $data['tr_id']; ?>"/>
    <label for="pwd">Travels ID:</label><br/>
    <select class="form-control" id="restrid"  name="retrid" onchange="restcosts();">
      <option value="<?php echo $data['tr_id']; ?>"><?php echo $data['tr_id']; ?></option>
    <?php $query2=mysqli_query($con,"select id,name,cost from travels");
    while($data2=mysqli_fetch_assoc($query2)){?>
      <option value="<?php echo $data2['id']; ?>"><?php echo $data2['id']; ?> | <?php echo $data2['name']; ?></option>
      
    <?php } ?>
  </select><br/>

    </div>
    <?php $query2=mysqli_query($con,"select id,cost from travels");
    while($data2=mysqli_fetch_assoc($query2)){?>
      <input type="hidden" id="<?php echo $data2['id']; ?>" value="<?php 
      echo $data2['cost']; ?>"/>
    <?php } ?>
      <lable id="restlable"></lable><br/>
      <span class="fa fw fa-usd"> </span>
      <input type="textbox" id="restcost2" value="<?php echo $data['t_money']; ?>"  disabled="true"/>
      <input type="hidden" id="restcost" value="<?php echo $data['t_money']; ?>" name="restcost" /><br/>
        <?php if(!empty($_SESSION['uname'])){?>
      <lable>Pay</lable>
      <input type="textbox" name="pay" placeholder="Pay:"/>
      <?php }?>
      </div>
      <div class="modal-footer">
        <input type='submit' value ='Update' class='btn btn-success'/>
        
      </div>
    </div>
  
  </form><br/>

  </div>
  <form method="POST">
          <input type="hidden" name="resids" value="<?php echo $ids; ?>" >
        <input type='submit' value ='Delete' class='btn btn-danger'/><br/>
        <?php if(!empty($_GET['actives'])){
            if($_GET['actives']=='admin'){
            ?>
      <a href="admins.php?showtype=researvations&actives=admin">
        <?php }else{?>
          <a href="index.php?actives=<?php echo $_GET['actives'];?>">
            <?php }}else{?>
              <a href="index.php?actives=<?php echo $_GET['actives'];?>">
              <?php }?>

          <span class="fa fa-fw fa-home">Back.</span>
  </form>



<?php

}


?>
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
 <?php
if(!empty($_POST['resids'])){
  if(mysqli_query($con,"delete from researvations where id=".mysqli_real_escape_string($con,$_POST['resids'])))
    if(!empty($_GET['actives'])) {
        if ($_GET['actives'] == 'admin')
            echo "<script>alert('Researvations Deleted Successfully.');document.location='admins.php?showtype=researvations&deletetype=travels&actives=" . $_GET['actives'] . "';</script>";
        else
            echo "<script>alert('Researvations Deleted Successfully.');document.location='admins.php?actives=" . $_GET['actives'] . "';</script>";

  }
  else
          echo"<script>alert('Researvations Deleted Successfully.');
    document.location='index.php?actives=Home';
    </script>";
}

?>
</html>