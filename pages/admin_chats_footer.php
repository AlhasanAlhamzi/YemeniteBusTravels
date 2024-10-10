<?php
if($_SERVER['REQUEST_METHOD']=='POST')
{
  if(!empty($_POST['chatstext2'])){
    if(!empty($_SESSION['uname'])){
          
          $chat=mysqli_real_escape_string($con,$_POST['chatstext2']);
          $id=$_SESSION['user_id'];
          mysqli_query($con,"insert into admin_chats(emp_id,chat,dates) values($id,'$chat',now())");
          echo"<script>document.location='admin_chats.php?actives=Managers chat';</script>";
    }
    else{
      echo"<script>alert('Ooopsy. You Must Be Sign In To Send Messages.');</script>";
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
      	<a class="fa fa-fw fa-facebook" href='google.com'></a>
      	<a class="fa fa-fw fa-whatsapp"></a>
      	<a class="fa fa-fw fa-envelope"></a>
      </div>
    <div class="navbar-header comments">   
 <form action='' method='POST'>
  <div class="form-group">
    <label for="pwd">Comments:</label><br/>
    <textarea class="form-control chatstext" id="pwd" name='chatstext2'></textarea>
  </div>

  <button type="submit" class="btn btn-success">Submit</button>
</form>  
      </div>
  </div>
</nav>
</footer>