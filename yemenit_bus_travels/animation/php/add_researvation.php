<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

  if(!empty($_POST['refname'])){
    $fname=mysqli_real_escape_string($con,$_POST['refname']);
    $lname=mysqli_real_escape_string($con,$_POST['relname']);
    $phone=$_POST['rephone'];
    $age=$_POST['reage'];
    $gender=$_POST['regender'];
    $address=mysqli_real_escape_string($con,$_POST['readdress']);
    $nseats=$_POST['renseats'];
    $trid=$_POST['retrid'];
    $tmoney=$_POST['retcost'];
    //$query0=mysqli_query($con,"select cost,dates from travels where id=$trid");
    //$data0=mysqli_fetch_assoc($query0);
    //$tmoney=$nseats*$data0['cost'];
    if(!empty($_POST['retype'])){
      $table=$_POST['retype'];
      $column="";
      if($table=="employees")
      $column="emp_id";
      else if($table=="accounts")
        $column="acc_id";

      $query=mysqli_query($con,"select id from $table where uname='".$_POST['reuname']."',pwd='".md5($_POST['repass']."pwd")."'");
      if($data=mysqli_fetch_assoc($query)){
          if(mysqli_query($con,"insert into researvations(".$column.",tr_id,fname,lname,phone,age,gender,address,n_seats,t_money,pay,dates) 
            values(".$data['id'].",$trid,'$fname','$lname',$phone,$age,'$gender','$address',$nseats,$tmoney,0,now())")){
            echo"<script>
            alert('Add Successfully. The Travel Going Time is ".$data0['dates']." And You Must Pay Befor 24 Hours From Travel Gone Time Or Your Seats Will Researves To Another Person And Folow The Supervisor Notes. Thanks For Travels With Us.');
            document.location='travels.php';
            </script>";
          }else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying Researve An Seats.');
            </script>";
          }
        }else{
          echo "<script>alert('The User Name Is Not Found Or You Are Not Have Accounts. Please Be Sure From Your User Name Or Researve Without Account.');</script>";
        }
      }else{
        if(mysqli_query($con,"insert into researvations(tr_id,fname,lname,phone,age,gender,address,n_seats,t_money,pay,dates) 
            values($trid,'$fname','$lname',$phone,$age,'$gender','$address',$nseats,$tmoney,0,now())")){
            echo"<script>
            alert('Add Successfully. The Travel Going Time is ".$data0['dates']." And You Must Pay Befor 24 Hours From Travel Gone Time Or Your Seats Will Researves To Another Person And Folow The Supervisor Notes. Thanks For Travels With Us.');
            document.location='travels.php';
            </script>";
          }else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying Researve An Seats.');
            </script>";
          }
      }
}
}
?>
<!-- Modal -->
<div id="researvation" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <form action='' method='POST' class='signupform' enctype="multipart/form-data">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title signtitle"><a class="fa fa-fw fa-user icons"/></a>New Researvation.</h4><br/>
        <div class="form-group">
    <label for="pwd">First Name:</label><br/>
    <input type="text" name='refname' placeholder='First Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">Last Name:</label><br/>
    <input type="text" name='relname' placeholder='Last Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">Phone Number:</label><br/>
    <input type="number" name='rephone' placeholder='Phone Number:'class="form-control" id="pwd"><br/>
    <label for="pwd">Age:</label><br/>
    <input type="number" placeholder='Age:' name='reage' class="form-control" id="pwd"><br/>
      <label for="sel1">Gender:</label><br/>
  <select class="form-control" name='regender' id="sel1">
    <option value='male'>Male</option>
    <option value='female'>Female</option>
  </select><br/>
  <label for="pwd">Address:</label><br/>
    <input type="text" placeholder='Address:' name='readdress' class="form-control" id="pwd"><br/>
    <label for="pwd">Number Of Seats:</label><br/>
    <input type="number" id="renseats" value="1" placeholder='number Of Seats:' name='renseats' class="form-control" id="pwd" onchange="retcosts();"><br/>
    <label for="pwd"> Have Accounts:</label><br/>
    <select name="retype" id="retype" class="form-control" onchange="
    var d=document.getElementById('retype').value;
    if(d!=''){
      
    document.getElementById('reuname').style.display='block';
    }else{
      document.getElementById('reuname').style.display='none';
    }" > 
      <option value=""></option>
      <option value="employees">Employee</option>
      <option value="accounts">Account</option>
    </select><br/>
    <div id="reuname">
    <label for="pwd" >User Name:</label><br/>
    <input type="text"  placeholder='User Name:' name='reuname' class="form-control" /><br/>
    <label for="pwd" >Password:</label><br/>
    <input type="text" placeholder='Password:' name='repass' class="form-control" /><br/>
    </div><br/> 
    <label for="pwd">Travels ID:</label><br/>
    <select class="form-control" id="retrid" name="retrid" onchange="retcosts();">
    <?php $query=mysqli_query($con,"select id,name,cost from travels");
    while($data=mysqli_fetch_assoc($query)){?>
      <option value="<?php echo $data['id']; ?>"><?php echo $data['id']; ?> | <?php echo $data['name']; ?></option>
      
    <?php } ?>
  </select><br/>

    </div>
    <?php $query=mysqli_query($con,"select id,cost from travels");
    while($data=mysqli_fetch_assoc($query)){?>
      <input type="hidden" id="<?php echo $data['id']; ?>" value="<?php 
      echo $data['cost']; ?>"/>
    <?php } ?>
      <lable id="retcost" name="retcost"></lable>
      </div>
      <div class="modal-footer">
        <input type='submit' value ='Create' class='btn btn-success'/>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  
  </form>
  </div>
</div>
