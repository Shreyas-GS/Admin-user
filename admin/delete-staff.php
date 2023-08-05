<?php

    include('../config/constants.php');

    $id = $_GET['id'];

    $qry = "SELECT username FROM staff WHERE staff_id = $id";
    $res = mysqli_query($con, $qry) or die(mysqli_error());

    if($res == TRUE){
        $row = mysqli_fetch_assoc($res);
        if($_SESSION['user']==$row['username']){
            $_SESSION['deleteStaff'] = '<div class="error">Cannot delete as logged in</div>';
            header('location:index.php');
        }
    }
    die('lol');
    $query = "DELETE FROM staff WHERE staff_id=$id";
    $result = mysqli_query($con, $query) or die(mysqli_error());
    
    if($result==TRUE){
        $_SESSION['deleteStaff'] = '<div class="success">Staff deleted successfully!</div>';
        header('location:'.'index.php');
    } 
    
    else{
        
        $_SESSION['deleteStaff'] = '<div class="error">Failed to delete staff.</div>';
        header('location:'.'index.php');
    }
?>