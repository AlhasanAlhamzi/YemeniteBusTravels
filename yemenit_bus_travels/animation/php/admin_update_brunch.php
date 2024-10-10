<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

  if(!empty($_POST['bruname'])){
    $id=$_POST['bruid'];
    $mid=$_POST['brumid'];
    $bname=mysqli_real_escape_string($con,$_POST['bruname']);
    $address=mysqli_real_escape_string($con,$_POST['bruaddress']);
    $nemp=mysqli_real_escape_string($con,$_POST['brunemp']);
    $href=mysqli_real_escape_string($con,$_POST['bruhref']);
    $note=mysqli_real_escape_string($con,$_POST['brunote']);
          if(mysqli_query($con,"update brunchs set manager_id=$mid,name='$bname',address='$address',emp_numbers=$nemp,href='$href',note='$note' where id=$id")){
            echo"<script>
            alert('Brunch Updated Successfully.');
            </script>";
          }else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying To Add New Brunch.');
            </script>";
          }   
  }
}
if(!empty($_POST['br_id'])){
?>
<!-- Modal -->
<div id="adminaddbrunch">
  <div class="modal-dialog">
  <form action='' method='POST' class='signupform' enctype="multipart/form-data">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="document.location='admins.php?showtype=brunchs'; ">&times;</button>
        <h4 class="modal-title signtitle"><a class="fa fa-fw fa-user icons"/></a>ADD Brunch.</h4><br/>
        <?php 
        $query=mysqli_query($con,"select * from brunchs where id=".$_POST['br_id']);
        $data=mysqli_fetch_assoc($query);
        ?>
        <div class="form-group">
          <input type="hidden" name="bruid" value="<?php echo $data['id']; ?>"/>
    <label for="pwd">Manager ID:</label><br/>
    <select class="form-control" name='brumid' id="sel1">
      <option value="<?php echo $data['manager_id']; ?>"><?php echo $data['manager_id']; ?></option>
      <?php 
      $query=mysqli_query($con,"select id,uname from employees where type='admin'");
      while($data2=mysqli_fetch_assoc($query)){
      ?>
    <option value='<?php echo $data2['id']; ?>'><?php echo $data2['id']; ?> | <?php echo $data2['uname']; ?></option>
  <?php }  ?>
  </select><br/>
    <label for="pwd">Brunch Name:</label><br/>
    <input type="text" name='bruname' placeholder='Brunch Name:' value="<?php echo $data['name']; ?>" class="form-control" id="pwd"><br/>
    <label for="pwd">Address:</label><br/>
    <input type="text" name='bruaddress' placeholder='Address:' value="<?php echo $data['address']; ?>" class="form-control" id="pwd"><br/>
    <label for="pwd">Number Of Employees:</label><br/>
    <input type="number" name='brunemp' placeholder='Number Of Employees:' value="<?php echo $data['emp_numbers']; ?>" class="form-control" id="pwd"><br/>
    <label for="pwd">Links:</label><br/>
    <input type="text" placeholder='Links:' value="<?php echo $data['href']; ?>" name='bruhref' class="form-control" id="pwd"><br/>
    <label for="pwd">Note:</label><br/>
    <textarea class="form-control" name="brunote"></textarea><br/>
    <label>Date: <?php echo $data['dates']; ?></label>
    </div>        
      </div>
      <div class="modal-footer">
        <input type='submit' value ='Update' class='btn btn-success'/>
        <button type="button" class="btn btn-danger" onclick="document.location='admins.php?showtype=brunchs';">Close</button>
      </div>
    </div>
  
  </form>
  </div>
</div>
<?php } ?>