<?php

    //start session
    session_start();

    //Constants
    define('SITEURL','http:localhost/Project/');
    define('LOCALHOST', 'localhost');
    define('USERNAME', 'root');
    define('PASSWORD', '');
    define('DBNAME','project');

    $con = mysqli_connect(LOCALHOST,USERNAME,PASSWORD,DBNAME) or die(mysqli_error());
?>