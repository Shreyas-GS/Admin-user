<?php include('partials/menu.php'); ?>
    
    <div class="main-content">
        <div class="wrapper">
            <h1>Staff Details</h1>

            <?php
                if(isset($_SESSION['addStaff'])){
                    echo $_SESSION['addStaff'];
                    unset($_SESSION['addStaff']);
                }

                if(isset($_SESSION['deleteStaff'])){
                    echo $_SESSION['deleteStaff'];
                    unset($_SESSION['deleteStaff']);
                }

                if(isset($_SESSION['updateStaff'])){
                    echo $_SESSION['updateStaff'];
                    unset($_SESSION['updateStaff']);
                }

                if(isset($_SESSION['change-pwd-Staff'])){
                    echo $_SESSION['change-pwd-Staff'];
                    unset($_SESSION['change-pwd-Staff']);
                }
                
                if($_SESSION['role']=='admin')
                    $flag=1;
                else $flag=0;
            ?>

            <?php
                if($flag==0){
                    ?>
                    <br/><br/>

                    <table class="tableFull">
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Role</th>
                        </tr>

                        <?php
                            //Get all Staff details

                            $query = "SELECT * FROM staff";

                            $result = mysqli_query($con, $query) or die(mysqli_error());

                            if($result==TRUE){
                                //Count no. of rows
                                $sno = 1;
                                
                                $count = mysqli_num_rows($result);
                                if($count>0){
                                    while($rows = mysqli_fetch_assoc($result)){

                                        //get Staff data

                                        $id = $rows['staff_id'];
                                        $name = $rows['name'];
                                        $username = $rows['username'];
                                        $role = $rows['role'];
                                        
                                        //display in table
                                        ?>
                                        <tr>
                                            <td><?php echo $sno++;?></td>
                                            <td><?php echo $name;?></td>
                                            <td><?php echo $username;?></td>
                                            <td><?php echo $role;?></td>
                                        </tr>

                        <?php
                                    }
                                }
                            }
                    }
                ?>

            <?php 
                if($flag==1){
                    ?>
                    <br/><br/>
                    <a href="add-staff.php" class="btn-primary">Add staff</a>
                    <br/><br/>

                    <table class="tableFull">
                        <tr>
                            <th>S.No.</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>

                    <?php
                        //Get all Staff details

                        $query = "SELECT * FROM staff";

                        $result = mysqli_query($con, $query) or die(mysqli_error());

                        if($result==TRUE){
                            //Count no. of rows
                            $sno = 1;
                            
                            $count = mysqli_num_rows($result);
                            if($count>0){
                                while($rows = mysqli_fetch_assoc($result)){

                                    //get Staff data

                                    $id = $rows['staff_id'];
                                    $name = $rows['name'];
                                    $username = $rows['username'];
                                    $role = $rows['role'];
                                    
                                    //display in table
                                    ?>
                                    <tr>
                                        <td><?php echo $sno++;?></td>
                                        <td><?php echo $name;?></td>
                                        <td><?php echo $username;?></td>
                                        <td><?php echo $role;?></td>
                                        <td>
                                            <a href="change-password-staff.php?id=<?php echo $id;?>" class="btn-primary">Change Password</a>
                                            <a href="update-staff.php?id=<?php echo$id;?>" class="btn-secondary">Update Staff</a> 
                                            <a href="delete-staff.php?id=<?php echo $id;?>" class="btn-danger">Delete Staff</a>
                                        </td>
                                    </tr>

                                <?php
                                }
                            }
                        }
                    }
                ?>
            </table>
            
        </div>    
    </div>
        
<?php include('partials/footer.php'); ?>