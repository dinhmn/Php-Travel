<?php
    include ("./config.php");
    
    $connect = mysqli_connect($serverName, $username, $password, $mydb);
    if (isset($_GET['pid'])){
        $pid = intval($_GET['pid']);
    }
    $sql = "Delete from tbltourpackages where PackageId=$pid";
    $query = mysqli_query($connect, $sql);
  
    header("location: manage-category.php");
    mysqli_close($connect);
?>