<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

  if(!empty($_POST['brmid'])){
    $mid=mysqli_real_escape_string($con,$_POST['brmid']);
    $bname=mysqli_real_escape_string($con,$_POST['brname']);
    $address=mysqli_real_escape_string($con,$_POST['braddress']);
    $nemp=mysqli_real_escape_string($con,$_POST['brnemp']);
    $href=mysqli_real_escape_string($con,$_POST['brhref']);
          if(mysqli_query($con,"insert into brunchs(manager_id,name,address,emp_numbers,n_travels,href,dates) values($mid,'$bname','$address',$nemp,0,'$href',now())")){
            echo"<script>
            alert('ADD New Brunch Successfully.');
            </script>";
          }else{
              echo"<script>
            alert('Error. There Is An Error Occure When You Trying To Add New Brunch.');
            </script>";
          }   
  }
}

?>

<!-- Modal -->
<div id="adminaddbrunch" class="modal fade" role="dialog">
  <div class="modal-dialog">
  <form action='' method='POST' class='signupform' enctype="multipart/form-data">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">X</button>
        <h4 class="modal-title signtitle"><a class="fa fa-fw fa-user icons"/></a>ADD Brunch.</h4><br/>
        <div class="form-group">
    <label for="pwd">Manager ID:</label><br/>
    <select class="form-control" name='brmid' id="sel1">
      <?php 
      $query=mysqli_query($con,"select id,uname from employees where type='admin'");
      while($data=mysqli_fetch_assoc($query)){
      ?>
    <option value='<?php echo $data['id']; ?>'><?php echo $data['id']; ?> | <?php echo $data['uname']; ?></option>
  <?php } ?>
  </select><br/>
    <label for="pwd">Brunch Name:</label><br/>
    <input type="text" name='brname' placeholder='Brunch Name:' class="form-control" id="pwd"><br/>
    <label for="pwd">Address:</label><br/>
    <input type="text" name='braddress' placeholder='Address:' class="form-control" id="pwd"><br/>
    <label for="pwd">Number Of Employees:</label><br/>
    <input type="number" name='brnemp' placeholder='Number Of Employees:'class="form-control" id="pwd"><br/>
    <label for="pwd">Links:</label><br/>
    <input type="text" placeholder='Links:' name='brhref' class="form-control" id="pwd"><br/>
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