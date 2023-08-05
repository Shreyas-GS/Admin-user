<?php 
    include('../config/constants.php');
    include('login-check.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Home</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="menu text-center">
        <div class="wrapper">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="events.php">Events</a></li>
                <li><a href="teams.php">Teams</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>
    <div class="text-center welcome">
        <?php echo 'Welcome '.$_SESSION['user']; ?>
    </div>