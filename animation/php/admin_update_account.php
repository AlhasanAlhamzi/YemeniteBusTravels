<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

  if(!empty($_POST['adminaccountupdateuname'])){
    $id=mysqli_real_escape_string($con,$_POST['adminupdateid']);
    $uname=mysqli_real_escape_string($con,$_POST['adminaccountupdateuname']);
    $fname=mysqli_real_escape_string($con,$_POST['adminupdatefname']);
    $lname=mysqli_real_escape_string($con,$_POST['adminupdatelname']);
    $pwd=mysqli_real_escape_string($con,$_POST['adminupdatepwd']);
    $cpwd=mysqli_real_escape_string($con,$_POST['adminupdatecpwd']);
    $type=mysqli_real_escape_string($con,$_POST['adminupdatetype']);
    $note=mysqli_real_escape_string($con,$_POST['adminupdatenote']);
    $gender=mysqli_real_escape_string($con,$_POST['adminupdategender']);
    if($pwd==$cpwd){
      $query=mysqli_query($con,"select pwd,user_img from accounts where id=$id");
            $data=mysqli_fetch_assoc($query);
      if($data['pwd']!=$pwd){
              $pwd=md5($pwd."pwd");
            }
      if(!empty($_FILES['adminupdateuimg']['name'])){
        $imgname=$_FILES['adminupdateuimg']['name'];
        $exp=explode('.', $_FILES['adminupdateuimg']['name']);
        $ext=end($exp);
        $arr=array('png','jpg','jpeg','PNG','JPG','JPEG');
        if(in_array($ext, $arr)){
          $tmp=$_FILES['adminupdateuimg']['tmp_name'];
          
          if(mysqli_query($con,"update accounts set uname='$uname',fname='$fname',lname='$lname',pwd='$pwd',type='$type',gender='$gender',user_img='$uname.$ext',note='$note' where id=$id")){
            if(!empty($data['user_img']))
            unlink("photos/users/".$data['user_img']);
            move_uploaded_file($tmp, "photos/users/".$uname.".".$ext);
            echo"<script>
            alert('Update Account $uname Successfully.');
            document.location='admins.php?showtype=accounts&actives=admin';
            </script>";
          }
          else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying To Update This is Account.');
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
          if(mysqli_query($con,"update accounts set uname='$uname',fname='$fname',lname='$lname',pwd='$pwd',type='$type',gender='$gender',note='$note' where id=$id")){
            echo"<script>
            alert('Update Account $uname Successfully.');
            document.location='admins.php?showtype=accounts';
            </script>";
          }
          else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying To Update This Is Account.');
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
<?php if(!empty($_GET['acc_id'])){
           // echo "<script>docuemnt.getElementById('updatemployee').style.display='block';</script>";
            ?>
<div id="updateaccount" ><!--class="modal fade" role="sdialog">-->
  <div class="modal-dialog">
  <form action='' method='POST' class='signupform' enctype="multipart/form-data">
    <!-- Modal content-->
              <?php 
          //error_reporting($_GET['emp_id']);
          

          $query=mysqli_query($con,"select * from accounts where id=".mysqli_real_escape_string($con,$_GET['acc_id']));
          $data=mysqli_fetch_assoc($query);

          ?>

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="document.location='admins.php?showtype=accounts&actives=admin';">X</button>
        <?php if(!empty($data['user_img'])){ ?>
        <h4 class="modal-title signtitle"><a href="photos/users/<?php echo $data['user_img']; ?>"><img src="photos/users/<?php echo $data['user_img']; ?>" id="updateempimg"/></a> Update Employee <?php echo $data['uname']; ?>.</h4><br/>
      <?php } else{ ?>
        <h4 class="modal-title signtitle"><a class="fa fa-fw fa-user icons"/></a>Update Employee <?php echo $data['uname']; ?>.</h4><br/>
      <?php } ?>
        <div class="form-group">
          <input type="hidden" name="adminupdateid" value="<?php echo $data['id']; ?>"/>
    <label for="pwd">User Name:</label><br/>
    <input type="text" value="<?php echo $data['uname']; ?>" name='adminaccountupdateuname' placeholder='User Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">First Name:</label><br/>
    <input type="text"  name='adminupdatefname' value="<?php echo $data['fname']; ?>" placeholder='User Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">Last Name:</label><br/>
    <input type="text"  name='adminupdatelname' value="<?php echo $data['lname']; ?>" placeholder='User Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">Password:</label><br/>
    <input type="Password" name='adminupdatepwd' value="<?php echo $data['pwd']; ?>" placeholder='Password:'class="form-control" id="pwd"><br/>
    <label for="pwd">Conferm Password:</label><br/>
    <input type="Password" name='adminupdatecpwd' value="<?php echo $data['pwd']; ?>" placeholder='Password:'class="form-control" id="pwd"><br/>
      <label for="sel1">Gender:</label><br/>
  <select class="form-control" name='adminupdategender' id="sel1">
    <?php if($data['gender']=="male"){ ?>
    <option value='male'>Male</option>
    <option value='female'>Female</option>
  <?php } else { ?>
    <option value='female'>Female</option>
    <option value='male'>Male</option>
  <?php } ?>
  </select><br/>
  <label for="sel1">Type:</label><br/>
  <select class="form-control" name='adminupdatetype' id="sel1">
    <?php if($data['type']=="user"){ ?>
    <option value='user'>User</option>
    <option value='admin'>Admin</option>
    <?php } else { ?>
      <option value='admin'>Admin</option>
    <option value='user'>User</option>
    <?php } ?>
  </select><br/>
    <label for="file">Note:</label><br/>
      <textarea name='adminupdatenote'  class="form-control" id="pwd"/><?php echo $data['note']; ?></textarea><br/>
    <label for="file">Files:</label><br/>
      <input type="file" name='adminupdateuimg' class="form-control" id="pwd"/><br/>
    <label >Date: <?php echo $data['dates']; ?></label><br/>
    </div>        
      </div>
      <div class="modal-footer">
        <input type='submit' value ='Update' class='btn btn-success'/>
        <button type="button" class="btn btn-danger" onclick="document.location='admins.php?showtype=accounts&actives=admin';" >Close</button>
      </div>
    </div>
  
  </form>
  </div>
</div>
<?php } ?>