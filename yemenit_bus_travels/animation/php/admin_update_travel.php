<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

  if(!empty($_POST['truname'])){
    $empid=$_POST['truempid'];
    $id=$_POST['truid'];
    $brid=$_POST['trubrid'];
    $tname=mysqli_real_escape_string($con,$_POST['truname']);
    $gtime=mysqli_real_escape_string($con,$_POST['trugtime']);
    $thour=mysqli_real_escape_string($con,$_POST['truthour']);
    $tseat=mysqli_real_escape_string($con,$_POST['trutseat']);
    $note=mysqli_real_escape_string($con,$_POST['trunote']);
    $cost=mysqli_real_escape_string($con,$_POST['trucost']);
          if(mysqli_query($con,"update travels set emp_id=$empid,br_id=$brid,name='$tname',t_go='$gtime',t_hours=$thour,cost=$cost,t_seats=$tseat,r_seats=t_seats-p_number,note='$note' where id=$id")){
            echo"<script>
            alert('Travel Updated Successfully.');
            </script>";
          }else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying To Add New Travel.');
            </script>";
          }   
  }
}
if(!empty($_POST['tr_id'])){
?>

<!-- Modal -->
<div id="adminupdatetravel" >
  <div class="modal-dialog">
  <form action='' method='POST' class='signupform' enctype="multipart/form-data">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="document.location='admins.php?showtype=travels';">&times;</button>
        <h4 class="modal-title signtitle"><a class="fa fa-fw fa-user icons"/></a>ADD Travel.</h4><br/>
        <?php
        $query=mysqli_query($con,"select * from travels where id=".$_POST['tr_id']);
        $data=mysqli_fetch_assoc($query);
        ?>
        <div class="form-group">
          <input type="hidden" name="truid" value="<?php echo $data['id']; ?>">
    <label for="pwd">Employee ID:</label><br/>
    <select class="form-control" name='truempid' id="sel1">
      <option value="<?php echo $data['emp_id']; ?>"><?php echo $data['emp_id']; ?></option>
      <?php 
      $query=mysqli_query($con,"select id,uname from employees ");
      while($data2=mysqli_fetch_assoc($query)){
      ?>
    <option value='<?php echo $data2['id']; ?>'><?php echo $data2['id']; ?> | <?php echo $data2['uname']; ?></option>
  <?php }  ?>
  </select><br/>
  <label for="pwd">Brunch ID:</label><br/>
    <select class="form-control" name='trubrid' id="sel1">
      <?php 
      $query=mysqli_query($con,"select id,name from brunchs");
      while($data2=mysqli_fetch_assoc($query)){
      ?>
    <option value='<?php echo $data2['id']; ?>'><?php echo $data2['id']; ?> | <?php echo $data2['name']; ?></option>
  <?php } ?>
  </select><br/>
    <label for="pwd">Travel Name:</label><br/>
    <input type="text" name='truname' value="<?php echo $data['name']; ?>" placeholder='Travel Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">Go Time:</label><br/>
    <input type="date" name='trugtime' value="<?php echo $data['t_go']; ?>" placeholder='Go Time:' class="form-control" id="pwd"><br/>
    <label for="pwd">Total Hours:</label><br/>
    <input type="number" name='truthour' value="<?php echo $data['t_hours']; ?>" placeholder='Total Hours:'class="form-control" id="pwd"><br/>
    <label for="pwd">Total Seats:</label><br/>
    <input type="number" placeholder='Total Seats:' value="<?php echo $data['t_seats']; ?>" name='trutseat' class="form-control" id="pwd"><br/>
    <label for="pwd">Cost:</label><br/>
    <input type="number" placeholder='Cost:' value="<?php echo $data['p_number']; ?>" name='trucost' class="form-control" id="pwd"><br/>
    <label>Note:</label><br/>
    <textarea class="form-control" name="trunote"><?php echo $data['note']; ?></textarea><br/>
    <label>Date: <?php echo $data['dates']; ?></label>
    </div>        
      </div>
      <div class="modal-footer">
        <input type='submit' value ='Update' class='btn btn-success'/>
        <button type="button" class="btn btn-danger" onclick="document.location='admins.php?showtype=travels';">Close</button>
      </div>
    </div>
  
  </form>
  </div>
</div>
<?php } ?>