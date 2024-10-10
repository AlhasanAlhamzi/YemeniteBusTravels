<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

  if(!empty($_POST['adminuname'])){
    $uname=mysqli_real_escape_string($con,$_POST['adminuname']);
    $fname=mysqli_real_escape_string($con,$_POST['adminfname']);
    $lname=mysqli_real_escape_string($con,$_POST['adminlname']);
    $pwd=mysqli_real_escape_string($con,$_POST['adminpwd']);
    $cpwd=mysqli_real_escape_string($con,$_POST['admincpwd']);
    $type=mysqli_real_escape_string($con,$_POST['admintype']);
    $wbrunch=mysqli_real_escape_string($con,$_POST['adminwbrunch']);
    $h_number=mysqli_real_escape_string($con,$_POST['adminhwork']);
    $salary=mysqli_real_escape_string($con,$_POST['adminsalary']);
    $note=mysqli_real_escape_string($con,$_POST['adminnote']);
    $gender=mysqli_real_escape_string($con,$_POST['admingender']);
    if($pwd==$cpwd){
      $pwd=md5($pwd."pwd");
      if(!empty($_FILES['adminuimg']['name'])){
        $imgname=$_FILES['adminuimg']['name'];
        $exp=explode('.', $_FILES['adminuimg']['name']);
        $ext=end($exp);
        $arr=array('png','jpg','jpeg','PNG','JPG','JPEG');
        if(in_array($ext, $arr)){
          $tmp=$_FILES['adminuimg']['tmp_name'];

          if(mysqli_query($con,"insert into employees(uname,fname,lname,pwd,salary,type,gender,user_img,w_hours,w_brunch,enabled,note,dates) values('$uname','$fname','$lname','$pwd',$salary,'$type','$gender','$uname.$ext',$h_number,$wbrunch,0,'$note',now())")){
            mysqli_query($con,"update brunchs set emp_numbers=emp_numbers+1 where id=".$wbrunch);
            move_uploaded_file($tmp, "photos/users/".$uname.".".$ext);
            echo"<script>
            alert('Add Employee $uname Successfully.');
            document.location='admins.php?showtype=employees';
            </script>";
          }
          else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying To Add New Employee.');
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
          if(mysqli_query($con,"insert into employees(uname,fname,lname,pwd,salary,type,gender,w_hours,w_brunch,enabled,note,dates) values('$uname','$fname','$lname','$pwd',$salary,'$type','$gender',$h_number,$wbrunch,0,'$note',now())")){
            echo"<script>
            alert('Add Employee $uname Successfully.');
            document.location='admins.php?showtype=employees';
            </script>";
          }
          else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying To Add New Employee.');
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
<?php $jtype=array("employee","manager","supervisor","driver","financial director"); ?>
<div id="addemployee" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <form action='' method='POST' class='signupform' enctype="multipart/form-data">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">X</button>
        <h4 class="modal-title signtitle"><a class="fa fa-fw fa-user icons"/></a>ADD Employees.</h4><br/>
        <div class="form-group">
    <label for="pwd">User Name:</label><br/>
    <input type="text" name='adminuname' placeholder='User Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">First Name:</label><br/>
    <input type="text"  name='adminfname' placeholder='User Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">Last Name:</label><br/>
    <input type="text"  name='adminlname' placeholder='User Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">Password:</label><br/>
    <input type="Password" name='adminpwd' placeholder='Password:'class="form-control" id="pwd"><br/>
    <label for="pwd">Conferm Password:</label><br/>
    <input type="Password" placeholder='Password:' name='admincpwd' class="form-control" id="pwd"><br/>
      <label for="sel1">Gender:</label><br/>
  <select class="form-control" name='admingender' id="sel1">
    <option value='male'>Male</option>
    <option value='female'>Female</option>
  </select><br/>
    <label for="file">Salary:</label><br/>
      <input type="number" name='adminsalary' class="form-control" id="pwd"/><br/>
      <label for="file">Number Of Works Hour:</label><br/>
      <input type="number" name='adminhwork' class="form-control" id="pwd"/><br/>
      <label for="file">Type:</label><br/>
      <select class="form-control" name="admintype" id="sel1">
        <option value="worker">Worker</option>
        <option value="driver">Driver</option>
        <option value="admin">Admin</option>
        <option value="manager">Manager</option>
        </select><br/>
        <label for="file">Works In Brunch:</label><br/>
      <select class="form-control" name='adminwbrunch' id="sel1">
    <?php 
    $query=mysqli_query($con,"select id,name from brunchs");
    while($data=mysqli_fetch_assoc($query)){ ?>
    <option value="<?php echo $data['id']; ?>"><?php echo $data['id']; ?> | <?php echo $data['name']; ?></option>
  <?php } ?>
  </select><br/>
    <label for="file">Note:</label><br/>
      <textarea name='adminnote' class="form-control" id="pwd"/></textarea><br/>
    <label for="file">Files:</label><br/>
      <input type="file" name='adminuimg' class="form-control" id="pwd"/><br/>
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