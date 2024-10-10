<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

  if(!empty($_POST['trname'])){
    $empid=mysqli_real_escape_string($con,$_POST['trempid']);
    $brid=mysqli_real_escape_string($con,$_POST['trbrid']);
    $tname=mysqli_real_escape_string($con,$_POST['trname']);
    $gtime=mysqli_real_escape_string($con,$_POST['trgtime']);
    $gtime=explode('-',$gtime);
    $gtime=end($gtime);
    $thour=mysqli_real_escape_string($con,$_POST['trthour']);
    $tseat=mysqli_real_escape_string($con,$_POST['trtseat']);
    $cost=mysqli_real_escape_string($con,$_POST['trcost']);
          if(mysqli_query($con,"insert into travels(emp_id,br_id,name,t_go,t_hours,cost,t_seats,r_seats,dates) values($empid,$brid,'$tname',$gtime,$thour,$cost,$tseat,$tseat,now())")){
            mysqli_query($con,"update brunchs set n_travels=n_travels+1 where id=$brid");
            echo"<script>
            alert('ADD New travels Successfully.');
            </script>";
          }else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying To Add New Travel.');
            </script>";
          }   
  }
}

?>

<!-- Modal -->
<div id="adminaddtravel" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <form action='' method='POST' class='signupform' enctype="multipart/form-data">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">X</button>
        <h4 class="modal-title signtitle"><a class="fa fa-fw fa-user icons"/></a>ADD Travel.</h4><br/>
        <div class="form-group">
    <label for="pwd">Employee ID:</label><br/>
    <select class="form-control" name='trempid' id="sel1">
      <?php 
      $query=mysqli_query($con,"select id,uname from employees ");
      while($data=mysqli_fetch_assoc($query)){
      ?>
    <option value='<?php echo $data['id']; ?>'><?php echo $data['id']; ?> | <?php echo $data['uname']; ?></option>
  <?php } ?>
  </select><br/>
  <label for="pwd">Brunch ID:</label><br/>
    <select class="form-control" name='trbrid' id="sel1">
      <?php 
      $query=mysqli_query($con,"select id,name from brunchs");
      while($data=mysqli_fetch_assoc($query)){
      ?>
    <option value='<?php echo $data['id']; ?>'><?php echo $data['id']; ?> | <?php echo $data['name']; ?></option>
  <?php } ?>
  </select><br/>
    <label for="pwd">Travel Name:</label><br/>
    <input type="text" name='trname' placeholder='Travel Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">Go Time:</label><br/>
    <input type="date" name='trgtime' placeholder='Go Time:' class="form-control" id="pwd"><br/>
    <label for="pwd">Total Hours:</label><br/>
    <input type="number" name='trthour' placeholder='Total Hours:'class="form-control" id="pwd"><br/>
    <label for="pwd">Total Seats:</label><br/>
    <input type="number" placeholder='Total Seats:' name='trtseat' class="form-control" id="pwd"><br/>
    <label for="pwd">Cost:</label><br/>
    <input type="number" placeholder='Cost:' name='trcost' class="form-control" id="pwd"><br/>
    </div>        
      </div>
      <div class="modal-footer">
        <input type='submit' value ='ADD' class='btn btn-success'/>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  
  </form>
  </div>
</div>