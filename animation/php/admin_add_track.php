<?php
if($_SERVER['REQUEST_METHOD']=='POST'){


    if(!empty($_POST['add_driver_id'])){
        $driver_id=mysqli_real_escape_string($con,$_POST['add_driver_id']);
        $assist_id=mysqli_real_escape_string($con,$_POST['assist_id']);
        $br_id=mysqli_real_escape_string($con,$_POST['trck_brid']);
        $trv_id=mysqli_real_escape_string($con,$_POST['trck_trvid']);
        $status=mysqli_real_escape_string($con,$_POST['trck_status']);
        $note=mysqli_real_escape_string($con,$_POST['trck_note']);
        if(mysqli_query($con,"insert into tracks(driver_id,assist_id,br_id,trv_id,track_status,note,dates) values( $driver_id,$assist_id,$br_id,$trv_id,'$status','$note',now())")){
            echo"<script>
            alert('Track Add Successfully.');
            </script>";
        }else{
            echo"<script>
            alert('Error. There Is An Error Occure When You Trying To Add New Track.');
            </script>";
        }
    }
}

?>

<!-- Modal -->
<div id="adminaddtrack" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <form action='' method='POST' class='signupform' enctype="multipart/form-data">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <h4 class="modal-title signtitle"><a class="fa fa-fw fa-user icons"/></a>ADD Track.</h4><br/>
                    <div class="form-group">
                       <label for="pwd">Driver ID:</label><br/>
                        <select class="form-control" name='add_driver_id' id="sel1">
                            <?php
                            $query=mysqli_query($con,"select id,uname from employees where type='driver' ");
                            while($data2=mysqli_fetch_assoc($query)){
                                ?>
                                <option value='<?php echo $data2['id']; ?>'><?php echo $data2['id']; ?> | <?php echo $data2['uname']; ?></option>
                            <?php }  ?>
                        </select><br/>
                        <label for="pwd">Assistance ID:</label><br/>
                        <select class="form-control" name='assist_id' id="sel1">
                            <?php
                            $query=mysqli_query($con,"select id,uname from employees ");
                            while($data2=mysqli_fetch_assoc($query)){
                                ?>
                                <option value='<?php echo $data2['id']; ?>'><?php echo $data2['id']; ?> | <?php echo $data2['uname']; ?></option>
                            <?php }  ?>
                        </select><br/>
                        <label for="pwd">Brunch ID:</label><br/>
                        <select class="form-control" name='trck_brid' id="sel1">
                            <?php
                            $query=mysqli_query($con,"select id,name from brunchs");
                            while($data2=mysqli_fetch_assoc($query)){
                                ?>
                                <option value='<?php echo $data2['id']; ?>'><?php echo $data2['id']; ?> | <?php echo $data2['name']; ?></option>
                            <?php } ?>
                        </select><br/>
                        <label for="pwd">Travels ID:</label><br/>
                        <select class="form-control" name='trck_trvid' id="sel1">
                            <?php
                            $query=mysqli_query($con,"select id,name from travels ");
                            while($data2=mysqli_fetch_assoc($query)){
                                ?>
                                <option value='<?php echo $data2['id']; ?>'><?php echo $data2['id']; ?> | <?php echo $data2['name']; ?></option>
                            <?php }  ?>
                        </select><br/>

                        <label for="pwd">Track Status:</label><br/>
                        <input type="text" name='trck_status'  placeholder='Track Status:' class="form-control" id="pwd"><br/>
                        <label>Note:</label><br/>
                        <textarea class="form-control" name="trck_note"></textarea><br/>
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