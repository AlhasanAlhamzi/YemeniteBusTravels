<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(!empty($_SESSION['uname']))
    $found=$_SESSION['uname'];
  else
  $found="";
  if(!empty($_POST['cuname'])){
    $uname=mysqli_real_escape_string($con,$_POST['cuname']);
    $fname=mysqli_real_escape_string($con,$_POST['cfname']);
    $lname=mysqli_real_escape_string($con,$_POST['clname']);
    $pwd=mysqli_real_escape_string($con,$_POST['cpwd']);
    $cpwd=mysqli_real_escape_string($con,$_POST['ccpwd']);
    $gender=mysqli_real_escape_string($con,$_POST['cgender']);
    if(!empty($_POST['ctype']))
    $type=mysqli_real_escape_string($con,$_POST['ctype']);
    else
      $type="user";
    if($pwd==$cpwd){
      $pwd=md5($pwd."pwd");
      if(!empty($_FILES['cuimg']['name'])){
        $imgname=$_FILES['cuimg']['name'];
        $exp=explode('.', $_FILES['cuimg']['name']);
        $ext=end($exp);
        $arr=array('png','jpg','jpeg','PNG','JPG','JPEG');
        if(in_array($ext, $arr)){
          $tmp=$_FILES['cuimg']['tmp_name'];
          if(mysqli_query($con,"insert into accounts(uname,fname,lname,pwd,type,gender,user_img,dates) values('$uname','$fname','$lname','$pwd','$type','$gender','$uname.$ext',now())")){
            if(!empty($found)){
              echo"<script>
            alert('Add Accounts Successfully.');
            </script>";
            }else{
            $_SESSION['uname']=$uname;
            $_SESSION['type']=$type;
            $_SESSION['user_img']=$uname.".".$ext;
            move_uploaded_file($tmp, "photos/users/".$uname.".".$ext);
            $query=mysqli_query($con,"select id from accounts where uname='$uname'");
            $data=mysqli_fetch_assoc($query);
            $_SESSION['user_id']=$data['id'];
            
            echo"<script>
            alert('Welcome $uname To Your Home.');
            document.location='users.php';
            </script>";
          }
          }else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying To Create New Account.');
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
          if(mysqli_query($con,"insert into accounts(uname,fname,lname,pwd,type,gender,dates) values('$uname','$fname','$lname','$pwd','$type','$gender',now())")){
            if(!empty($found)){
              echo"<script>
            alert('Add Accounts Successfully.');
            </script>";
            }else{
            $_SESSION['uname']=$uname;
            $_SESSION['type']=$type;
            $query=mysqli_query($con,"select id from accounts where uname='$uname'");
            $data=mysqli_fetch_assoc($query);
            $_SESSION['user_id']=$data['id'];

            echo"<script>
            alert('Welcome $uname To Your Home.');
            document.location='users.php';
            </script>";
          }
          }else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying To Create New Account.');
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
<div id="signup" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <form action='' method='POST' class='signupform' enctype="multipart/form-data">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">X</button>
        <h4 class="modal-title signtitle"><a class="fa fa-fw fa-user icons"/></a>ADD Account.</h4><br/>
        <div class="form-group">
    <label for="pwd">User Name:</label><br/>
    <input type="text" name='cuname' placeholder='User Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">First Name:</label><br/>
    <input type="text" name='cfname' placeholder='User Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">Last Name:</label><br/>
    <input type="text" name='clname' placeholder='User Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">Password:</label><br/>
    <input type="Password" name='cpwd' placeholder='Password:'class="form-control" id="pwd"><br/>
    <label for="pwd">Conferm Password:</label><br/>
    <input type="Password" placeholder='Password:' name='ccpwd' class="form-control" id="pwd"><br/>
      <label for="sel1">Gender:</label><br/>
  <select class="form-control" name='cgender' id="sel1">
    <option value='male'>Male</option>
    <option value='female'>Female</option>
  </select><br/>
  <?php 
  if(!empty($_SESSION['type']))
  if($_SESSION['type']=="admin"){?>
  <label for="sel1">Type:</label><br/>
  <select class="form-control" name='ctype' id="sel1">
    <option value='user'>User</option>
    <option value='admin'>Admin</option>
  </select><br/><?php }else{
    ?>
    <input type="hidden" value="user" name="ctype">
    <?php }?>
    <label for="file">Files:</label><br/>
      <input type="file" name='cuimg' class="form-control" id="pwd"/><br/>
    </div>        
      </div>
      <div class="modal-footer">
        <input type='submit' value ='Create' class='btn btn-success'/>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  
  </form>
  </div>
</div>