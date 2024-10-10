

<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

  if(!empty($_POST['resfname'])){
    $fname=mysqli_real_escape_string($con,$_POST['resfname']);
    $lname=mysqli_real_escape_string($con,$_POST['relname']);
    $phone=mysqli_real_escape_string($con,$_POST['rephone']);
    $age=mysqli_real_escape_string($con,$_POST['reage']);
    $gender=mysqli_real_escape_string($con,$_POST['regender']);
    $address=mysqli_real_escape_string($con,$_POST['readdress']);
    $nseats=mysqli_real_escape_string($con,$_POST['renseats']);
    $trid=mysqli_real_escape_string($con,$_POST['retrid']);
    $tmoney=mysqli_real_escape_string($con,$_POST['restcost']);
    $query3=mysqli_query($con,"select id from researvations ");
    while($data2=mysqli_fetch_assoc($query3))
      $id=$data2['id'];
    
    $id=$id+1;
   // echo "<script> alert(".$id.");</script>";
    $query0=mysqli_query($con,"select id,t_seats,dates from travels where id=".$trid);

    $data0=mysqli_fetch_assoc($query0);
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
      
    if(!empty($_POST['retype'])){
      $table=mysqli_real_escape_string($con,$_POST['retype']);
      $column="";
      $mony="";
      if($table=="employees"){
      $column="emp_id";
      $mony="salary";
      }
      else if($table=="accounts"){
        $column="acc_id";
        $mony="acc_mony";
      }

      $query=mysqli_query($con,"select id,$mony from $table where uname='".$_POST['reuname']."' and pwd='".md5($_POST['repass']."pwd")."'");
        $smony=0;
      if($data=mysqli_fetch_assoc($query)){
        if(!empty($data['salary']))
          $smony=intval($data['salary']);
        if(!empty($data['acc_mony']))
          $smony=intval($data['acc_mony']);
          if($smony>=$tmoney){
          if(mysqli_query($con,"insert into researvations(id,".$column.",tr_id,fname,lname,phone,age,gender,address,n_seats,t_money,pay,enabled,dates) 
            values(".$id.",".$data['id'].",$trid,'$fname','$lname',$phone,$age,'$gender','$address',$nseats,$tmoney,0,$enabled,now())")){
            if($enabled!=0)
            mysqli_query($con,"update travels set p_number=p_number+1,r_seats=r_seats-1 where id=".$trid);
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
            alert('Error. There Is An Error Occure When You Trying Researve An Seats.');
            </script>";
          }
        }else{?>
            <script>
            alert('Ooopsy.\nYou cant researve any seats because your accout mony its not enough.\nPlease go and full your account mony.');
            document.location="index.php?showtype=Home&actives=Home&accept=1";
            </script>";
            <?php
        }
        }else{
          echo "<script>alert('The User Name or password Is Not Found Or You Are Not Have Accounts. Please Be Sure From Your User Name and password and try again.\nThanks for Vissit us.');</script>";
        }
      }else{
              echo"<script>
              
            alert('Error. There Is An Error Occure When You Trying Researve An Seats.');
            </script>";
       }
}
}
?>
<!-- Modal -->
  <div class="modal-dialog resmainform">
    <?php if(!empty($_GET['accept'])){?>
          <p class="alert alert-info">Ooopsy.You cant researve any seats because your accout mony its not enough.Please go and full your account mony.</p>
          <?php }?>
  <form action='' method='POST' class='signupform' enctype="multipart/form-data">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title signtitle"><a class="fa fa-fw fa-user icons"/></a>New Researvation.</h4><br/>
        <div class="form-group">
          
    <label for="pwd">First Name:</label><br/>
    <input type="text" name='resfname' onchange="restcosts();" placeholder='First Name:' class="form-control" id="pwd"><br/>
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
    <input type="number" id="resnseats" value="1" placeholder='number Of Seats:' name='renseats' class="form-control" id="pwd"  onchange="restcosts();"><br/>
    <label for="pwd">Type of Accounts:</label><br/>
    <select name="retype" id="retypes" class="form-control" >
      <option value="accounts">Account</option> 
      <option value="employees">Employee</option>
    </select><br/>
    <div >
    <label for="pwd" >User Name:</label><br/>
    <input type="text"  placeholder='User Name:' name='reuname' class="form-control" /><br/>
    <label for="pwd" >Password:</label><br/>
    <input type="password" placeholder='Password:' name='repass' class="form-control" /><br/>
    </div><br/>  
    <label for="pwd">Travels ID:</label><br/>
    <select class="form-control" id="restrid" name="retrid" onchange="restcosts();">
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
      <lable id="restlable"></lable><br/>
      <span class="fa fw fa-usd"> </span>
      <input type="textbox" id="restcost2"  disabled="true"/>
      <input type="hidden" id="restcost" name="restcost" />
      </div>
      <div class="modal-footer">
        <input type='submit' value ='Create' class='btn btn-success'/>
      </div>
    </div>
  
  </form>
  </div>
