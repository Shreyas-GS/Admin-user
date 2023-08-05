<?php

    include('../config/constants.php');

    $id = $_GET['id'];
    $query = "DELETE FROM events WHERE event_id='$id'";
    $result = mysqli_query($con, $query) or die(mysqli_error());
    
    if($result==TRUE){
        $_SESSION['deleteEvent'] = '<div class="success">Event deleted successfully!</div>';
        header('location:'.'events.php');
    } 
    
    else{
        
        $_SESSION['deleteEvent'] = '<div class="error">Failed to delete event.</div>';
        header('location:'.'events.php');
    }
?>