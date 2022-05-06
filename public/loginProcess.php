<?php
    session_start();
    error_reporting(0);
    include ("./admin/config.php");
    $message = "";
    if (count($_POST) > 0) {
        $con = mysqli_connect($serverName, $username, $password, $mydb);
    }
?>