<?php
if($_SERVER['REQUEST_METHOD']=='POST'){

    if(!empty($_POST['update_trck_id'])){
        $trck_id=mysqli_real_escape_string($con,$_POST['update_trck_id']);
        $driver_id=mysqli_real_escape_string($con,$_POST['update_driver_id']);
        $assist_id=mysqli_real_escape_string($con,$_POST['assist_id']);
        $br_id=mysqli_real_escape_string($con,$_POST['trck_brid']);
        $trv_id=mysqli_real_escape_string($con,$_POST['trck_trvid']);
        $status=mysqli_real_escape_string($con,$_POST['trck_status']);
        $note=mysqli_real_escape_string($con,$_POST['trck_note']);
        if(mysqli_query($con,"update tracks set driver_id=$driver_id,assist_id=$assist_id,br_id=$br_id,trv_id=$trv_id,track_status='$status',note='$note' where id=$trck_id")){
            echo"<script>
            alert('Track Updated Successfully.');
            </script>";
        }else{
            echo"<script>
            alert('Error. There Is An Error Occure When You Trying To Update New Track.');
            </script>";
        }
    }
}
if(!empty($_GET['track_id'])){
    ?>

    <!-- Modal -->
    <div id="adminupdatetrack" >
        <div class="modal-dialog">
            <form action='' method='POST' class='signupform' enctype="multipart/form-data">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" onclick="document.location='admins.php?showtype=tracks&actives=admin';">X</button>
                        <h4 class="modal-title signtitle"><a class="fa fa-fw fa-user icons"/></a>Update Track.</h4><br/>
                        <?php
                        $query=mysqli_query($con,"select * from tracks where id=".mysqli_real_escape_string($con,$_GET['track_id']));
                        $data=mysqli_fetch_assoc($query);
                        ?>
                        <div class="form-group">
                            <lable >ID</lable><br/>
                            <input type="hidden" class="form-control" name="update_trck_id" value="<?php echo $data['id']; ?>">
                            <input type="text" class="form-control" value="<?php echo $data['id']; ?>" disabled="true">
                            <br/><label for="pwd">Driver ID:</label><br/>
                            <select class="form-control" name='update_driver_id' id="sel1">
                                <option value="<?php echo $data['driver_id']; ?>"><?php echo $data['driver_id']; ?></option>
                                <?php
                                $query=mysqli_query($con,"select id,uname from employees where type='driver' ");
                                while($data2=mysqli_fetch_assoc($query)){
                                    ?>
                                    <option value='<?php echo $data2['id']; ?>'><?php echo $data2['id']; ?> | <?php echo $data2['uname']; ?></option>
                                <?php }  ?>
                            </select><br/>
                            <label for="pwd">Assistance ID:</label><br/>
                            <select class="form-control" name='assist_id' id="sel1">
                                <option value="<?php echo $data['assist_id']; ?>"><?php echo $data['assist_id']; ?></option>
                                <?php
                                $query=mysqli_query($con,"select id,uname from employees ");
                                while($data2=mysqli_fetch_assoc($query)){
                                    ?>
                                    <option value='<?php echo $data2['id']; ?>'><?php echo $data2['id']; ?> | <?php echo $data2['uname']; ?></option>
                                <?php }  ?>
                            </select><br/>
                            <label for="pwd">Brunch ID:</label><br/>
                            <select class="form-control" name='trck_brid' id="sel1">
                                <option value="<?php echo $data['br_id']; ?>"><?php echo $data['br_id']; ?></option>
                                <?php
                                $query=mysqli_query($con,"select id,name from brunchs");
                                while($data2=mysqli_fetch_assoc($query)){
                                    ?>
                                    <option value='<?php echo $data2['id']; ?>'><?php echo $data2['id']; ?> | <?php echo $data2['name']; ?></option>
                                <?php } ?>
                            </select><br/>
                            <label for="pwd">Travels ID:</label><br/>
                            <select class="form-control" name='trck_trvid' id="sel1">
                                <option value="<?php echo $data['trv_id']; ?>"><?php echo $data['trv_id']; ?></option>
                                <?php
                                $query=mysqli_query($con,"select id,name from travels ");
                                while($data2=mysqli_fetch_assoc($query)){
                                    ?>
                                    <option value='<?php echo $data2['id']; ?>'><?php echo $data2['id']; ?> | <?php echo $data2['name']; ?></option>
                                <?php }  ?>
                            </select><br/>

                            <label for="pwd">Track Status:</label><br/>
                            <input type="text" name='trck_status' value="<?php echo $data['track_status']; ?>" placeholder='Track Status:' class="form-control" id="pwd"><br/>
                            <label>Note:</label><br/>
                            <textarea class="form-control" name="trck_note"><?php echo $data['note']; ?></textarea><br/>
                            <label>Date: <?php echo $data['dates']; ?></label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type='submit' value ='Update' class='btn btn-success'/>
                        <button type="button" class="btn btn-danger" onclick="document.location='admins.php?showtype=tracks&actives=admin';">Close</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
<?php } ?>