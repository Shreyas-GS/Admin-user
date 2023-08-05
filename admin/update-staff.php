<?php include('partials/menu.php') ?>

    <?php
        $id = $_GET['id'];

        $query = "SELECT * FROM staff where staff_id=$id";
        $result = mysqli_query($con, $query) or die(mysqli_error());

        if($result==TRUE){

            $count = mysqli_num_rows($result);

            if($count==1){
                
                $row = mysqli_fetch_assoc($result);
                $name = $row['name'];
                $username = $row['username'];
                $password = $row['password'];
                $role = $row['role'];

            } else{

                header('location:'.'index.php');
            }
        }
    ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Update Staff</h1>
            
            <br/><br/>
            
            <form action="" method="post">
                <table class="tbl30">
                    <tr>
                        <td>Name: </td>
                        <td>
                            <input type="text" name="name" value="<?php echo $name ?>">
                        </td>
                    
                    <tr>
                        <td>Username: </td>
                        <td>
                            <input type="text" name="username" value="<?php echo $username?>">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Role: </td>
                        <td>
                            <input type="text" name="role">
                        </td>
                    </tr>
                    
                    <tr>
                        <td>Confirm Password: </td>
                        <td>
                            <input type="password" name="password">
                        </td>
                    </tr>


                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="id" value="<?php echo $id ?>">
                            <input type="submit" name="submit" value="Update Staff" class="btn-secondary">
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </div>

    <?php
        if(isset($_POST['submit'])){

            $id = $_POST['id'];
            $name = $_POST['name'];
            $username = $_POST['username'];
            $new_pass = md5($_POST['password']);
            $role = $_POST['role'];
            
            if($new_pass == $password){

                //Create a SQL Query to Update Staff
                $query = "UPDATE staff SET
                name = '$name',
                username = '$username',
                role = '$role'
                WHERE staff_id='$id'
                ";
            
                //Execute the Query
                $result = mysqli_query($con, $query);

                if($result==TRUE) {
                    //Query Executed and Staff Updated
                    $_SESSION['updateStaff'] = '<div class="success">Staff Updated Successfully.</div>';
                    //Redirect to Manage Staff Page
                    header('location:'.'index.php');
                }
                else {
                    //Failed to Update Staff
                    $_SESSION['updateStaff'] = '<div class="error">Failed to update staff.</div>';
                    //Redirect to Manage Staff Page
                    header('location:'.'index.php');
                }
            }
            else{
                $_SESSION['updateStaff'] = '<div class="error">Incorrect password</div>';
                header('location:'.'index.php');
            }
        }
    
    ?>

<?php include('partials/footer.php') ?>