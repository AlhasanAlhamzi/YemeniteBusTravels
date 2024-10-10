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
<!--Users update-->
   <?php
if($_SERVER['REQUEST_METHOD']=='POST'){

  if(!empty($_POST['userupdateuname'])){
    $id=$_POST['userupdateempid'];
    $uname=mysqli_real_escape_string($con,$_POST['userupdateuname']);
    $fname=mysqli_real_escape_string($con,$_POST['userupdatefname']);
    $lname=mysqli_real_escape_string($con,$_POST['userupdatelname']);
    $pwd=mysqli_real_escape_string($con,$_POST['userupdatepwd']);
    $cpwd=mysqli_real_escape_string($con,$_POST['userupdatecpwd']);
    if(!empty($_SESSION['employee'])){
    $h_number=",w_hours=".$_POST['userupdatehwork'];
    $salary=",salary=".$_POST['userupdatesalary'];
    $table="employees";
    }
    else{
    $h_number=" ";
    $salary=" ";
    $table="accounts";
    }
    $note=mysqli_real_escape_string($con,$_POST['userupdatenote']);
    $gender=$_POST['userupdategender'];
    if($pwd==$cpwd){
      $query=mysqli_query($con,"select pwd,user_img from $table where id=$id");
            $data=mysqli_fetch_assoc($query);
      if($data['pwd']!=$pwd){
              $pwd=md5($pwd."pwd");
            }
      if(!empty($_FILES['userupdateuimg']['name'])){
        $imgname=$_FILES['userupdateuimg']['name'];
        $exp=explode('.', $_FILES['userupdateuimg']['name']);
        $ext=end($exp);
        $arr=array('png','jpg','jpeg','PNG','JPG','JPEG');
        if(in_array($ext, $arr)){
          $tmp=$_FILES['userupdateuimg']['tmp_name'];
          
          if(mysqli_query($con,"update $table set uname='$uname',fname='$fname',lname='$lname',pwd='$pwd'$salary,gender='$gender',user_img='$uname.$ext'$h_number,note='$note' where id=$id")){
            if(!empty($data['user_img']))
            unlink("photos/users/".$data['user_img']);
            move_uploaded_file($tmp, "photos/users/".$uname.".".$ext);
            $_SESSION['user_img']=$uname.".".$ext;
            echo"<script>
            alert('Update $table $uname Successfully.');
            document.location='users.php?showtype=employees';
            </script>";
          }
          else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying To Update Your Information.');
            </script>";
          }
        }
        else{
          echo"<script>
      alert('The File Which You Are Uploaded Is Not Of img Type.Please Try Again Later.');
      </script>";
        }
      }
      else{
          if(mysqli_query($con,"update $table set uname='$uname',fname='$fname',lname='$lname',pwd='$pwd'$salary,gender='$gender'$h_number,note='$note' where id=$id")){
            echo"<script>
            alert('Update $table $uname Successfully.');
            document.location='users.php';
            </script>";
          }
          else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying To Update Your Information.');
            </script>";
          }
      }
    }
    else{
      echo"<script>
      alert('Error Conferm Password.Please Try Again Later.');
      </script>";
    }    
  }

}

?>

<!-- Modal -->
<?php if(!empty($_SESSION['user_id'])){
           // echo "<script>docuemnt.getElementById('updatemployee').style.display='block';</script>";
            ?>
<div id="updatemployee" ><!--class="modal fade" role="sdialog">-->
  <div class="modal-dialog">
  <form action='' method='POST' class='signupform' enctype="multipart/form-data">
    <!-- Modal content-->
              <?php 
          //error_reporting($_GET['emp_id']);
          
           if(!empty($_SESSION['employee']))   
          $query=mysqli_query($con,"select * from employees where id=".$_SESSION['user_id']);
          else
          $query=mysqli_query($con,"select * from accounts where id=".$_SESSION['user_id']);  
          $data=mysqli_fetch_assoc($query);

          ?>

    <div class="modal-content">
      <div class="modal-header">
        <?php if(!empty($data['user_img'])){ 
          if(!empty($_SESSION['employee']))
            $types="Employee";
          else
            $types="Account";
          ?>
        <h4 class="modal-title signtitle"><a href="photos/users/<?php echo $data['user_img']; ?>"><img src="photos/users/<?php echo $data['user_img']; ?>" id="updateempimg"/></a> Update <?php echo $types." ".$data['uname']; ?>.</h4><br/>
      <?php } else{ ?>
        <h4 class="modal-title signtitle"><a class="fa fa-fw fa-user icons"/></a>Update <?php echo $types." ".$data['uname']; ?>.</h4><br/>
      <?php } ?>
        <div class="form-group">
          <input type="hidden" name="userupdateempid" value="<?php echo $data['id']; ?>"/>
    <label for="pwd">User Name:</label><br/>
    <input type="text" value="<?php echo $data['uname']; ?>" name='userupdateuname' placeholder='User Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">First Name:</label><br/>
    <input type="text"  name='userupdatefname' value="<?php echo $data['fname']; ?>" placeholder='User Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">Last Name:</label><br/>
    <input type="text"  name='userupdatelname' value="<?php echo $data['lname']; ?>" placeholder='User Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">Password:</label><br/>
    <input type="Password" name='userupdatepwd' value="<?php echo $data['pwd']; ?>" placeholder='Password:'class="form-control" id="pwd"><br/>
    <label for="pwd">Conferm Password:</label><br/>
    <input type="Password" name='userupdatecpwd' value="<?php echo $data['pwd']; ?>" placeholder='Password:'class="form-control" id="pwd"><br/>
      <label for="sel1">Gender:</label><br/>
  <select class="form-control" name='userupdategender' id="sel1">
    <?php if($data['gender']=="male"){ ?>
    <option value='male'>Male</option>
    <option value='female'>Female</option>
  <?php } else { ?>
    <option value='female'>Female</option>
    <option value='male'>Male</option>
  <?php } ?>
  </select><br/>
  <?php if(!empty($_SESSION['employee'])){ ?>
    <label for="file">Salary:</label><br/>
      <input type="number" name='userupdatesalary' value="<?php echo $data['salary']; ?>" class="form-control" id="pwd"/><br/>
      <label for="file">Number Of Works Hour:</label><br/>
      <input type="number" name='userupdatehwork' value="<?php echo $data['w_hours']; ?>" class="form-control" id="pwd"/>
  <?php }?>

      <br/>
    <label for="file">Note:</label><br/>
      <textarea name='userupdatenote'  class="form-control" id="pwd"/><?php echo $data['note']; ?></textarea><br/>
    <label for="file">Files:</label><br/>
      <input type="file" name='userupdateuimg' class="form-control" id="pwd"/><br/>
    <label >Date: <?php echo $data['dates']; ?></label><br/>
    </div>        
      </div>
      <div class="modal-footer">
        <input type='submit' value ='Update' class='btn btn-success'/>
      </div>
    </div>
  
  </form>
  </div>
</div>
<?php }else{ 
echo "<script>alert('Ooopsy. You Must Be Sign In At First To Access to This Is Part.');
document.location='index.php';
</script>";
 } ?>







<!--End users update-->
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