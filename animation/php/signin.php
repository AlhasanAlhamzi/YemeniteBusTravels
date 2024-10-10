<?php

    
if($_SERVER['REQUEST_METHOD']=='POST'){
 //echo "<script>alert('".$_SESSION['uname']."');</script>";
  if(!empty($_POST['uname']) && !empty($_POST['pwd'])){
    $uname=mysqli_real_escape_string($con,$_POST['uname']);
    $pass=md5($_POST['pwd']."pwd");
    if(!empty($_POST['usertype'])){
      $query=mysqli_query($con,"select id,type,user_img from employees where uname='$uname' and pwd='$pass' and enabled=1");
      $_SESSION['employee']="employee";
    }
    else
      $query=mysqli_query($con,"select id,type,user_img from accounts where uname='$uname' and pwd='$pass'");
    if($data=mysqli_fetch_assoc($query)){
     
      $_SESSION['uname']=$uname;
      $_SESSION['type']=$data['type'];
      if(!empty($data['user_img']))
      $_SESSION['user_img']=$data['user_img'];
      $_SESSION['user_id']=$data['id'];
    echo "<script> 
      alert('Welcome $uname To Your Home.');
      document.location='users.php';
      </script>"; 
    }
    else
    {
      echo "<script> 
      alert('Error. User Name Or Password.');
      </script>";
    }
  }

}

?>
<!-- Modal -->
<div id="signin" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <form action='' method='POST'>
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">X</button>
        
        <h4 class="modal-title signtitle"><a class="fa fa-fw fa-user icons"/></a>Log In.</h4><br/>
        <div class="form-group">
    <label for="pwd">User Name:</label><br/>
    <input type="text" placeholder='User Name:' class="form-control" name="uname" id="pwd">
    </div>
      </div>
      <div class="modal-body">
        <div class="form-group">
    <label for="pwd">Password:</label><br/>
    <input type="Password" placeholder='Password:' name="pwd" class="form-control" id="pwd">
    </div>
    <div class="checkbox">
    <label><input type="checkbox"  name='usertype' value="worker" >Worker.</label>
    </div>        
      </div>
      <div class="modal-footer">
        <input type='submit' value ='Log In' class='btn btn-success'/>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  
  </form>
  </div>
</div>