<br/><br/>
<div class="table-responsive admin-tables">
<?php 
if(!empty($_GET['active'])){
mysqli_query($con,"update employees set enabled=".mysqli_real_escape_string($con,$_GET['val'])." where id=".mysqli_real_escape_string($con,$_GET['active'])." and uname!='".$_SESSION['uname']."'");
}
if(!empty($_GET['deletetype'])){
  if($_GET['deletetype']=="accounts"){
          $query=mysqli_query($con,"select user_img from accounts where id=".mysqli_real_escape_string($con,$_GET['id']));
            $data=mysqli_fetch_assoc($query);
      if(mysqli_query($con,"delete from accounts where id=".mysqli_real_escape_string($con,$_GET['id'])))
        if(!empty($data['user_img']))
            unlink("photos/users/".$data['user_img']);
          echo"<script>document.location='admins.php?showtype=accounts';</script>";
  }
  else if($_GET['deletetype']=="employees"){ 
    $query=mysqli_query($con,"select user_img from employees where id=".$_GET['id']);
            $data=mysqli_fetch_assoc($query);
    if(mysqli_query($con,"delete from employees where id=".mysqli_real_escape_string($con,$_GET['id']))){
      if(!empty($data['user_img']))
            unlink("photos/users/".$data['user_img']);
        echo"<script>document.location='admins.php?showtype=employees';</script>";
      }
    }
  else if($_GET['deletetype']=="brunchs") {
    if(mysqli_query($con,"delete from brunchs where id=".mysqli_real_escape_string($con,$_GET['id'])))
      echo"<script>document.location='admins.php?showtype=brunchs';</script>";
  }
  else if($_GET['deletetype']=="travels"){ 
    if(mysqli_query($con,"delete from travels where id=".mysqli_real_escape_string($con,$_GET['id'])))
      echo"<script>document.location='admins.php?showtype=travels';</script>";
  }
    else if($_GET['deletetype']=="researve"){
        if(mysqli_query($con,"delete from researvations where id=".mysqli_real_escape_string($con,$_GET['id'])))
            echo"<script>document.location='admins.php?showtype=researvations&actives=admin';</script>";
    }
    else if($_GET['deletetype']=="track"){
        if(mysqli_query($con,"delete from tracks where id=".mysqli_real_escape_string($con,$_GET['id'])))
            echo"<script>document.location='admins.php?showtype=tracks&actives=admin';</script>";
    }
}
if(!empty($_GET['showtype'])){
?>
<!--Accounts information-->
<?php if($_GET['showtype']=="accounts" || $_GET['showtype']=="all"){ ?>
<br/>
  <p class="alert alert-info"><strong>All Accounts Information.</strong><br/>You Can Add/Update/Delete Any Accounts.
      <a href="#" class="btn btn-info adminaddu adminadditem"  data-toggle="modal" data-target="#signup"><span class="fa fa-fw fa-user-plus"></span><br/>New</a>
  </p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>User Name</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Type</th>
        <th>Gender</th>
        <th>User Image</th>
        <th>Note</th>
        <th>Date</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
<?php
if(!empty($_POST['searchtravel']) && $_GET['showtype']=='accounts'){

    $query=mysqli_query($con,"select * from accounts where id='".$_POST['searchtravel']."' or uname='".$_POST['searchtravel']."' ");
    }else
$query=mysqli_query($con,"select * from accounts");
while($data=mysqli_fetch_assoc($query)){
?>
    <tbody>
      <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['uname']; ?></td>
        <td><?php echo $data['fname']; ?></td>
        <td><?php echo $data['lname']; ?></td>
        <td><?php echo $data['type']; ?></td>
        <td><?php echo $data['gender']; ?></td>
        <td>
          <?php if(!empty($data['user_img'])){ ?>
          <a href="photos/users/<?php echo $data['user_img']; ?>"><div class="media-left">
          <img src="photos/users/<?php echo $data['user_img']; ?>" class="media-object admintimg"/>
          </div></a>

        <?php }else{ ?>
          <div class="media-left">
          <a class="fa fa-fw fa-user usericon" class="media-object" >
            </a></div>
          

        <?php }?>
        </td>
        <!--<td><?php //echo $data['user_img']; ?></td>-->
        <td><?php echo $data['note']; ?></td>
        <td><?php echo $data['dates']; ?></td>
        <td class="updaccount"><a  href="admins.php?showtype=accounts&acc_id=<?php echo $data['id'];?>&actives=admin" class="fa fa-fw fa-gears">
          </a>
        </td>
        <td><a href="admins.php?showtype=accounts&deletetype=accounts&id=<?php echo $data['id']; ?>&actives=admin" class="fa fa-fw fa-user-times admindeleteu"><br/>Delete</a></td>
      </tr>
    </tbody>
  
<?php } ?>
</table>
        <p> Be Carefully To All Your Actions On Database Informations<br/>
        You can Add New Account from <big><big><span class="fa fa-fw fa-hand-o-right"></span></big></big>
        <a href="#" class="btn btn-info adminaddu adminadditem"  data-toggle="modal" data-target="#signup"><span class="fa fa-fw fa-user-plus"></span><br/>New</a>
        </p><br/><br/>
    <?php } if($_GET['showtype']=="employees" || $_GET['showtype']=="all"){ ?>
<!--Employees information-->
<br/>
  <p class="alert alert-info"><strong>All Employees Information.</strong><br/>You Can Add/Update/Delete Any Employees.
      <a class="btn btn-info adminaddu adminadditem" data-toggle="modal" data-target="#addemployee"><span class="fa fa-fw fa-user-plus"></span><br/>New</a>
  </p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>User Name</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Salary</th>
        <th>Type</th>
        <th>Gender</th>
        <th>User Image</th>
        <th>Work Hours</th>
        <th>Works Brunch</th>
        <th>Note</th>
        <th>Date</th>
        <th>Activate</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
<?php
if(!empty($_POST['searchtravel']) && $_GET['showtype']=='employees'){

    $query=mysqli_query($con,"select * from employees where id='".$_POST['searchtravel']."' or uname='".$_POST['searchtravel']."' ");
}else
$query=mysqli_query($con,"select * from employees");
while($data=mysqli_fetch_assoc($query)){
?>
    <tbody>
      <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['uname']; ?></td>
        <td><?php echo $data['fname']; ?></td>
        <td><?php echo $data['lname']; ?></td>
        <td><?php echo $data['salary']; ?></td>
        <td><?php echo $data['type']; ?></td>
        <td><?php echo $data['gender']; ?></td>
        <td>
          <?php if(!empty($data['user_img'])){ ?>
          <a href="photos/users/<?php echo $data['user_img']; ?>"><div class="media-left">
          <img src="photos/users/<?php echo $data['user_img']; ?>" class="media-object admintimg"/>
          </div></a>

        <?php }else{ ?>
          <div class="media-left">
          <a class="fa fa-fw fa-user usericon" class="media-object" >
            </a></div>
          
          

        <?php }?>
        </td>
        <!--<td><?php //echo $data['user_img']; ?></td>-->
        <td><?php echo $data['w_hours']; ?></td>
        <td><?php echo $data['w_brunch']; ?></td>
        <td><?php echo $data['note']; ?></td>
        <td><?php echo $data['dates']; ?></td>
        <td class="actives"><?php 
         
            if($data['type']=='manager'&&$_SESSION['type']=='admin') {
            echo "Manager";
            }else{
            if($data['id']!=$_SESSION['user_id']){
          if($data['enabled']==1){?>
          <a href="admins.php?showtype=employees&active=<?php echo $data['id'];?>&val=0&actives=admin" class="fa fa-fw fa-toggle-on "></a>
          <?php }else{?>
          <a href="admins.php?showtype=employees&active=<?php echo $data['id'];?>&val=1&actives=admin" class="fa fa-fw fa-toggle-off "></a>
          <?php }
          }else echo "You";}?>
        </td>
        <?php if($data['type']=='manager'&&$_SESSION['type']=='admin') {
            echo "<td class='actives'>Manager</td>";
            echo "<td class='actives'>Manager</td>";
        }else{if($data['id']!=$_SESSION['user_id']){?>
          <td class="updaccount">
          <a  href="admins.php?showtype=employees&emp_id=<?php echo $data['id'];?>&actives=admin" class="fa fa-fw fa-gears">
          </a>
        </td>
        <td>

            <a href="admins.php?showtype=employees&deletetype=employees&id=<?php echo $data['id']; ?>&actives=admin" class="fa fa-fw fa-user-times admindeleteu"><br/>Delete</a></td>
      <?php }else{
            ?>
            <td class="updaccount">
                <a  href="admins.php?showtype=employees&emp_id=<?php echo $data['id'];?>&actives=admin" class="fa fa-fw fa-gears">
                </a>
            </td>
          <?php  echo "<td class='actives'>You</td>";
        }}?>
        </tr>

    </tbody>
  
<?php } ?>
</table>
        <p> Be Carefully To All Your Actions On Database Informations<br/>
        You can Add New Employee from <big><big><span class="fa fa-fw fa-hand-o-right"></span></big></big>
        <a class="btn btn-info adminaddu adminadditem" data-toggle="modal" data-target="#addemployee"><span class="fa fa-fw fa-user-plus"></span><br/>New</a>
        </p><br/><br/>
    <?php } if($_GET['showtype']=="brunchs" || $_GET['showtype']=="all"){ ?>
<!--Brunchs information-->
<br/>
  <p class="alert alert-info"><strong>All Brunchs Information.</strong><br/>You Can Add/Update/Delete Any brunch.
      <a class="btn btn-info adminaddu adminadditem" data-toggle="modal" data-target="#adminaddbrunch"><span class="fa fa-fw fa-plus"></span></span><br/>New</a>
  </p>
  <table class="table table-striped ">
    <thead>
      <tr>
        <th>ID</th>
        <th>Manager ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Number Of Employees</th>
        <th>Number Of Travels</th>
        <th>Links</th>
        <th>Note</th>
        <th>Date</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
<?php
if(!empty($_POST['searchtravel']) && $_GET['showtype']=='brunchs'){

    $query=mysqli_query($con,"select * from brunchs where id='".$_POST['searchtravel']."' or name='".$_POST['searchtravel']."' ");
}else
$query=mysqli_query($con,"select * from brunchs");
while($data=mysqli_fetch_assoc($query)){
?>
    <tbody>
      <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['manager_id']; ?></td>
        <td><?php echo $data['name']; ?></td>
        <td><?php echo $data['address']; ?></td>
        <td><?php echo $data['emp_numbers']; ?></td>
        <td><?php echo $data['n_travels']; ?></td>
        <td><?php echo $data['href']; ?></td>
        <td><?php echo $data['note']; ?></td>
        <td><?php echo $data['dates']; ?></td>
          <td class="updaccount">
          <a  href="admins.php?showtype=brunchs&br_id=<?php echo $data['id'];?>&actives=admin" class="fa fa-fw fa-gears">
          </a>
        </td>
        <td><a href="admins.php?showtype=brunchs&deletetype=brunchs&id=<?php echo $data['id']; ?>&actives=admin" class="fa fa-fw fa-trash admindeleteu"><br/>Delete</a></td>

      </tr>
    </tbody>
  
<?php } ?>
</table>
        <p> Be Carefully To All Your Actions On Database Informations<br/>
        You can Add New Brunch from <big><big><span class="fa fa-fw fa-hand-o-right"></span></big></big>
        <a class="btn btn-info adminaddu adminadditem" data-toggle="modal" data-target="#adminaddbrunch"><span class="fa fa-fw fa-plus"></span></span><br/>New</a>
        </p><br/><br/>
    <?php } if($_GET['showtype']=="travels" || $_GET['showtype']=="all"){ ?>
<!--Travels information-->
<br/>
  <p class="alert alert-info"><strong>All Travels Information.</strong><br/>You Can Add/Update/Delete Any Travels.
      <a class="btn btn-info adminaddu adminadditem" data-toggle="modal" data-target="#adminaddtravel"><span class="fa fa-fw fa-plus"></span><br/>New</a>
  </p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Employee ID</th>
        <th>Brunchs ID</th>
        <th>Name</th>
        <th>Go Time</th>
        <th>Total hours</th>
        <th>Passengers Number</th>
        <th>Cost</th>
        <th>Total Seats</th>
        <th>Rest Seats</th>
        <th>Note</th>
        <th>Date</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>
<?php
if(!empty($_POST['searchtravel']) && $_GET['showtype']=='travels'){

    $query=mysqli_query($con,"select * from travels where id='".$_POST['searchtravel']."' or name='".$_POST['searchtravel']."' ");
}else
$query=mysqli_query($con,"select * from travels");
while($data=mysqli_fetch_assoc($query)){
?>
    <tbody>
      <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['emp_id']; ?></td>
        <td><?php echo $data['br_id']; ?></td>
        <td><?php echo $data['name']; ?></td>
        <td><?php echo $data['t_go']; ?></td>
        <td><?php echo $data['t_hours']; ?></td>
        <td><?php echo $data['p_number']; ?></td>
        <td><?php echo $data['cost']; ?></td>
        <td><?php echo $data['t_seats']; ?></td>
        <td><?php echo $data['r_seats']; ?></td>
        <td><?php echo $data['note']; ?></td>
        <td><?php echo $data['dates']; ?></td>
        <td class="updaccount">
          <a  href="admins.php?showtype=travels&tr_id=<?php echo $data['id'];?>&actives=admin" class="fa fa-fw fa-gears">
          </a>
        </td>
        <td><a href="admins.php?showtype=travels&deletetype=travels&id=<?php echo $data['id']; ?>&actives=admin" class="fa fa-fw fa-trash admindeleteu"><br/>Delete</a></td>
      </tr>
    </tbody>
  
<?php } ?>
</table>
        <p> Be Carefully To All Your Actions On Database Informations<br/>
        You can Add New Travel from <big><big><span class="fa fa-fw fa-hand-o-right"></span></big></big>
    <a class="btn btn-info adminaddu adminadditem" data-toggle="modal" data-target="#adminaddtravel"><span class="fa fa-fw fa-plus"></span><br/>New</a>
        </p><br/><br/>
    <?php } if($_GET['showtype']=="tracks" || $_GET['showtype']=="all"){ ?>
        <!--Brunchs information-->
        <br/>
        <p class="alert alert-info"><strong>All Tracks Information.</strong><br/>You Can Add/Update/Delete Any Tracks.
            <a class=" btn btn-info adminaddu adminadditem " data-toggle="modal" data-target="#adminaddtrack"><span class="fa fa-fw fa-plus"></span><br/>New</a>
        </p>
        <table class="table table-striped ">
            <thead>
            <tr>
                <th>ID</th>
                <th>Driver ID</th>
                <th>Assistance ID</th>
                <th>Brunch ID</th>
                <th>Travel ID</th>
                <th>Track Status</th>
                <th>Note</th>
                <th>Date</th>
                <th>Update</th>
                <th>Delete</th>
            </tr>
            </thead>
            <?php
            if(!empty($_POST['searchtravel']) && $_GET['showtype']=='tracks'){

                $query=mysqli_query($con,"select * from tracks where id='".$_POST['searchtravel']."' or track_status='".$_POST['searchtravel']."' ");
            }else
                $query=mysqli_query($con,"select * from tracks");
            while($data=mysqli_fetch_assoc($query)){
                ?>
                <tbody>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['driver_id']; ?></td>
                    <td><?php echo $data['assist_id']; ?></td>
                    <td><?php echo $data['br_id']; ?></td>
                    <td><?php echo $data['trv_id']; ?></td>
                    <td><?php echo $data['track_status']; ?></td>
                    <td><?php echo $data['note']; ?></td>
                    <td><?php echo $data['dates']; ?></td>
                    <td class="updaccount">
                        <a  href="admins.php?showtype=tracks&track_id=<?php echo $data['id'];?>&actives=admin" class="fa fa-fw fa-gears">
                        </a>
                    </td>
                    <td><a href="admins.php?showtype=tracks&deletetype=track&id=<?php echo $data['id']; ?>&actives=admin" class="fa fa-fw fa-trash admindeleteu"><br/>Delete</a></td>

                </tr>
                </tbody>

            <?php } ?>
        </table>
        <p> Be Carefully To All Your Actions On Database Informations<br/>
        You can Add New Track from <big><big><span class="fa fa-fw fa-hand-o-right"></span></big></big>
        <a class=" btn btn-info adminaddu adminadditem " data-toggle="modal" data-target="#adminaddtrack"><span class="fa fa-fw fa-plus"></span><br/>New</a>
        </p><br/><br/>
    <?php } if($_GET['showtype']=="researvations" || $_GET['showtype']=="all"){ ?>
<!--Travels information-->
<br/>
  <p class="alert alert-info"><strong>All Researvations Information.</strong><br/>You Can Add/Update/Delete Any Travels.
      <a class="btn btn-info adminaddu adminadditem" data-toggle="modal" data-target="#researvation"><span class="fa fa-fw fa-plus"></span><br/>New</a>
  </p>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Account ID</th>
        <th>Travel ID</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th>Age</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Number Of Seats</th>
        <th>Total Cost</th>
        <th>Pay</th>
        <th>Note</th>
        <th>Date</th>
        <th>Update</th>
        <th>Delete</th>
      </tr>
    </thead>


<?php

if(!empty($_POST['searchtravel']) && $_GET['showtype']=='researvations'){

    $query=mysqli_query($con,"select * from researvations where id='".$_POST['searchtravel']."' ");
}else
$query=mysqli_query($con,"select * from researvations");
while($data=mysqli_fetch_assoc($query)){
?>
    <tbody>
      <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['acc_id']; ?></td>
        <td><?php echo $data['tr_id']; ?></td>
        <td><?php echo $data['fname']; ?></td>
        <td><?php echo $data['lname']; ?></td>
        <td><?php echo $data['phone']; ?></td>
        <td><?php echo $data['age']; ?></td>
        <td><?php echo $data['gender']; ?></td>
        <td><?php echo $data['address']; ?></td>
        <td><?php echo $data['n_seats']; ?></td>
        <td><?php echo $data['t_money']; ?></td>
        <td><?php echo $data['pay']; ?></td>
        <td><?php echo $data['note']; ?></td>
        <td><?php echo $data['dates']; ?></td>

        <td class="updaccount"><a  href="researve.php?researve=<?php echo $data['id'];?>&actives=admin" class="fa fa-fw fa-gears">
          </a>
        </td>
        <td><a href="admins.php?showtype=researvations&deletetype=researve&actives=admin&id=<?php echo $data['id'];?>" class="fa fa-fw fa-trash admindeleteu"><br/>Delete</a></td>
      </tr>
    </tbody>
  
<?php } ?>
</table>
        <p> Be Carefully To All Your Actions On Database Informations<br/>
            You can Add New Researvation from <big><big><span class="fa fa-fw fa-hand-o-right"></span></big></big>
        <a class="btn btn-info adminaddu adminadditem" data-toggle="modal" data-target="#researvation"><span class="fa fa-fw fa-plus"></span><br/>New</a>
        </p>
            <br/><br/>
    <?php }
}
 ?>
</div>