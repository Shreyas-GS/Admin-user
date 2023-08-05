<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Staff</h1>

        <br/><br/>
            <?php
                if(isset($_SESSION['addStaff'])){
                    echo $_SESSION['addStaff'];
                    unset($_SESSION['addStaff']);   //remove session message
                }
            ?>
        <br/><br/>

        <form action="" method="post">
            <table class="table30">
                <tr>
                    <td>Name: </td>
                    <td><input type="text" name="name" placeholder="Enter your name"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td><input type="text" name="username" placeholder="Enter your username"></td>
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type="password" name="password" placeholder="Enter your password"></td>
                </tr>
                <tr>
                    <td>Role: </td>
                    <td><input type="text" name="role" placeholder="Enter your role"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Staff" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php include('partials/footer.php'); ?>


<?php

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);
        $role = ($_POST['role']);
        $query = "INSERT INTO staff (name, username, password, role) VALUES('$name', '$username', '$password', '$role');";
        
        $result = mysqli_query($con, $query) or die(mysqli_error());
        
        if($result == TRUE){
            //Session variable to display success
            $_SESSION['addStaff'] = '<div class="success">Added successfully!</div>';
            //Redirect page
            header('location:'.'index.php');
        }
        else{
            $_SESSION['addStaff'] = '<div class="error">Failed to add</div>';
            header('location:'.'add-staff.php');
        }
    }

?>