<?php include('partials/menu.php'); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>Add Item</h1>
        <br/>

        <?php
                if(isset($_SESSION['addEvent'])){
                    echo $_SESSION['addEvent'];
                    unset($_SESSION['addEvent']);   //remove session message
                }
            ?>
        <br/><br/>

        <form action="" method="post">
            <table class="table30">
                <tr>
                    <td>Event ID: </td>
                    <td><input type="text" name="id"></td>
                </tr>
                <tr>
                    <td>Event Name: </td>
                    <td><input type="text" name="name"></td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add event" class='btn-secondary'>
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
    
    $query = "SELECT * FROM events WHERE event_id='$id'";
    $result = mysqli_query($con, $query) or die(mysqli_error());
    
    if(mysqli_num_rows($result)){
        $_SESSION['addEvent'] = '<div class="error">Duplicate event ID</div>';
        header('location:'.'events.php');
    }

    else{
        $query = "INSERT INTO events VALUES
        ('$id','$name');";

        $result = mysqli_query($con, $query) or die(mysqli_error());
        if($result==TRUE){
            $_SESSION['addEvent'] = '<div class="success">Event added successfully!</div>';
            header('location:'.'events.php');
        }
        else{
            $_SESSION['addEvent'] = '<div class="error">Failed to add event</div>';
            header('location:'.'add-event.php');
        }
    }
}


?>