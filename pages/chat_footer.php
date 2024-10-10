<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
  if(!empty($_POST['chatstext'])){

          $chat=mysqli_real_escape_string($con,$_POST['chatstext']);
    if(!empty($_SESSION['uname'])){
          if(!empty($_SESSION['employee']))
            $type="emp_id";
          else
            $type="acc_id";
          $id=$_SESSION['user_id'];
          mysqli_query($con,"insert into chats($type,chat,dates) values($id,'$chat',now())");
          echo"<script>document.location='chats.php?actives=Descussion';</script>";
    }
    else{

          $uname=mysqli_real_escape_string($con,$_POST['pname']);
          $phone=mysqli_real_escape_string($con,$_POST['pphone']);
          if(empty($uname))
            $uname="passenger";
          mysqli_query($con,"insert into chats(name,phone,chat,dates) values('".$uname."',$phone,'$chat',now())");
          echo"<script>document.location='chats.php?actives=Descussion';</script>";
    }
  }
}
?>
<footer>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header copyrights">
      <a class="navbar-brand" href="#">Yemenit_Bus_Travels Copy-rights <span class="fa fa-fw fa-copyright icon"></span></a>
    </div>
 	<div class="navbar-header contactus"> 
        <br/>  
      	<a class="fa fa-fw fa-facebook" href='google.com'></a>
      	<a class="fa fa-fw fa-whatsapp"></a>
      	<a class="fa fa-fw fa-envelope"></a>
      </div>
    <div class="navbar-header comments">   
 <form action='' method='POST'>
  <div class="form-group">
  <?php
  if(empty($_SESSION['uname'])){
    ?>
  <label>Your Name If You Want:</label><br/>
  <input  class="form-control" type="text" placeholder="Your Name:" name="pname" /><br/>
  <lable>Your Phone Number if You Want:</lable><br/>
  <input class="form-control" type="number" placeholder="Your Phone Number:" name="pphone">
    <?php
  }
  ?>
 
    <label for="pwd">Comments:</label><br/>
    <textarea class="form-control chatstext" id="pwd" name='chatstext'></textarea>
  </div>

  <button type="submit" class="btn btn-success">Submit</button>
</form>  
      </div>
  </div>
</nav>

</footer>