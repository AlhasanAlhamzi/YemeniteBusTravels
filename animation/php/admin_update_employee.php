<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

  if(!empty($_POST['adminupdateuname'])){
    $lastbid=mysqli_real_escape_string($con,$_POST['lastbid']);
    $id=mysqli_real_escape_string($con,$_POST['adminupdateempid']);
    $uname=mysqli_real_escape_string($con,$_POST['adminupdateuname']);
    $fname=mysqli_real_escape_string($con,$_POST['adminupdatefname']);
    $lname=mysqli_real_escape_string($con,$_POST['adminupdatelname']);
    $pwd=mysqli_real_escape_string($con,$_POST['adminupdatepwd']);
    $cpwd=mysqli_real_escape_string($con,$_POST['adminupdatecpwd']);
    $wbrunch=mysqli_real_escape_string($con,$_POST['adminupdatewbrunch']);
    $type=mysqli_real_escape_string($con,$_POST['adminupdatetype']);
    $h_number=mysqli_real_escape_string($con,$_POST['adminupdatehwork']);
    $salary=mysqli_real_escape_string($con,$_POST['adminupdatesalary']);
    $note=mysqli_real_escape_string($con,$_POST['adminupdatenote']);
    $gender=mysqli_real_escape_string($con,$_POST['adminupdategender']);
    if($pwd==$cpwd){
      $query=mysqli_query($con,"select w_brunch,pwd,user_img from employees where id=$id");
        $data=mysqli_fetch_assoc($query);
      if($data['pwd']!=$pwd){
              $pwd=md5($pwd."pwd");
            }
      if($wbrunch!=$lastbid){
        mysqli_query($con,"update brunchs set emp_numbers=emp_numbers-1 where id=".$lastbid);
        mysqli_query($con,"update brunchs set emp_numbers=emp_numbers+1 where id=".$wbrunch);
      }
      if(!empty($_FILES['adminupdateuimg']['name'])){
        $imgname=$_FILES['adminupdateuimg']['name'];
        $exp=explode('.', $_FILES['adminupdateuimg']['name']);
        $ext=end($exp);
        $arr=array('png','jpg','jpeg','PNG','JPG','JPEG');
        if(in_array($ext, $arr)){
          $tmp=$_FILES['adminupdateuimg']['tmp_name'];
          
          if(mysqli_query($con,"update employees set uname='$uname',fname='$fname',lname='$lname',pwd='$pwd',salary=$salary,type='$type',gender='$gender',user_img='$uname.$ext',w_hours=$h_number,w_brunch=$wbrunch,note='$note' where id=$id")){
            if(!empty($data['user_img']))
            unlink("photos/users/".$data['user_img']);
            move_uploaded_file($tmp, "photos/users/".$uname.".".$ext);
            echo"<script>
            alert('Update Employee $uname Successfully.');
            document.location='admins.php?showtype=employees&actives=admin';
            </script>";
          }
          else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying To Update This is Employee.');
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
          if(mysqli_query($con,"update employees set uname='$uname',fname='$fname',lname='$lname',pwd='$pwd',salary=$salary,type='$type',gender='$gender',w_hours=$h_number,w_brunch=$wbrunch,note='$note' where id=$id")){
            echo"<script>
            alert('Update Employee $uname Successfully.');
            document.location='admins.php?showtype=employees&actives=admin';
            </script>";
          }
          else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying To Update This Is Employee.');
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
<?php if(!empty($_GET['emp_id'])){
           // echo "<script>docuemnt.getElementById('updatemployee').style.display='block';</script>";
            ?>
<div id="updatemployee" ><!--class="modal fade" role="sdialog">-->
  <div class="modal-dialog">
  <form action='' method='POST' class='signupform' enctype="multipart/form-data">
    <!-- Modal content-->
              <?php 
          //error_reporting($_GET['emp_id']);
          
              $jtype=array("employee","manager","supervisor","driver","financial director");
          $query=mysqli_query($con,"select * from employees where id=".mysqli_real_escape_string($con,$_GET['emp_id']));
          $data=mysqli_fetch_assoc($query);

          ?>

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="document.location='admins.php?showtype=employees&actives=admin';">X</button>
        <?php if(!empty($data['user_img'])){ ?>
        <h4 class="modal-title signtitle"><a href="photos/users/<?php echo $data['user_img']; ?>"><img src="photos/users/<?php echo $data['user_img']; ?>" id="updateempimg"/></a> Update Employee <?php echo $data['uname']; ?>.</h4><br/>
      <?php } else{ ?>
        <h4 class="modal-title signtitle"><a class="fa fa-fw fa-user icons"/></a>Update Employee <?php echo $data['uname']; ?>.</h4><br/>
      <?php } ?>
        <div class="form-group">
          <input type="hidden" name="adminupdateempid" value="<?php echo $data['id']; ?>"/>
    <label for="pwd">User Name:</label><br/>
    <input type="text" value="<?php echo $data['uname']; ?>" name='adminupdateuname' placeholder='User Name:' class="form-control" id="pwd"><br/>
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
  <label for="sel1">Employee Type:</label><br/>
  <select class="form-control" name='adminupdatetype' id="sel1">
    <?php if($data['type']=="worker"){ ?>
    <option value='worker'>Worker</option>
    <option value='driver'>Driver</option>
    <option value='admin'>Admin</option>
    <option value='manager'>Manager</option>
    <?php } else if($data['type']=="driver") { ?>
    <option value='driver'>Driver</option>
    <option value='worker'>Worker</option>
    <option value='admin'>Admin</option>
    <option value='manager'>Manager</option>
    <?php } else if($data['type']=="admin"){ ?>
        <option value='admin'>Admin</option>
        <option value='driver'>Driver</option>
        <option value='worker'>Worker</option>
        <option value='manager'>Manager</option>
<?php } else{ ?>
    <option value='manager'>Manager</option>
    <option value='driver'>Driver</option>
    <option value='worker'>Worker</option>
    <option value='admin'>Admin</option>
<?php } ?>
  </select><br/>
    <label for="file">Salary:</label><br/>
      <input type="number" name='adminupdatesalary' value="<?php echo $data['salary']; ?>" class="form-control" id="pwd"/><br/>
      <label for="file">Number Of Works Hour:</label><br/>
      <input type="number" name='adminupdatehwork' value="<?php echo $data['w_hours']; ?>" class="form-control" id="pwd"/><br/>
      
      <label for="file">Works In Brunch:</label><br/>
      <input type="hidden" name="lastbid" value="<?php echo $data['w_brunch']?>">
      <select class="form-control" name='adminupdatewbrunch' id="sel1">
        <option value="<?php echo $data['w_brunch']?>"><?php echo $data['w_brunch']?></option>
    <?php 
    $query2=mysqli_query($con,"select id,name from brunchs");
    while($data2=mysqli_fetch_assoc($query2)){ ?>
    <option value="<?php echo $data2['id']; ?>"><?php echo $data2['id']; ?> | <?php echo $data2['name']; ?></option>
  <?php } ?>
  </select><br/>
    <label for="file">Note:</label><br/>
      <textarea name='adminupdatenote'  class="form-control" id="pwd">
        <?php echo $data['note']; ?></textarea><br/>
    <label for="file">Files:</label><br/>
      <input type="file" name='adminupdateuimg' class="form-control" id="pwd"/><br/>
    <label >Date: <?php echo $data['dates']; ?></label><br/>
    </div>        
      </div>
      <div class="modal-footer">
        <input type='submit' value ='Update' class='btn btn-success'/>
        <button type="button" class="btn btn-danger" onclick="document.location='admins.php?showtype=employees&actives=admin';" >Close</button>
      </div>
    </div>
  
  </form>
  </div>
</div>
<?php } ?>