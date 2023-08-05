<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Team</h1>

        <br/><br/>
            <?php
                if(isset($_SESSION['addTeams'])){
                    echo $_SESSION['addTeams'];
                    unset($_SESSION['addTeams']);   //remove session message
                }
            ?>
        <br/><br/>

        <form action="" method="post">
            <table class="table30">
                <tr>
                    <td>Team ID: </td>
                    <td><input type="text" name="id" placeholder="Enter team id"></td>
                </tr>
                <tr>
                    <td>Team Name: </td>
                    <td><input type="text" name="name" placeholder="Enter team name"></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Team" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>


<?php include('partials/footer.php'); ?>


<?php

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $name = $_POST['name'];
        $query = "INSERT INTO team VALUES('$id', '$name');";
        
        $result = mysqli_query($con, $query) or die(mysqli_error());
        
        if($result == TRUE){
            //Session variable to display success
            $_SESSION['addTeams'] = '<div class="success">Added successfully!</div>';
            //Redirect page
            header('location:'.'teams.php');
        }
        else{
            $_SESSION['addTeams'] = '<div class="error">Failed to add</div>';
            header('location:'.'add-teams.php');
        }
    }

?>