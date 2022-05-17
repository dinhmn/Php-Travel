<?php
    include ("./config.php");

    $connect = mysqli_connect($serverName, $username, $password, $mydb);
    if (isset($_GET['userId'])){
        $userId = intval($_GET['userId']);
    }
    $sql = "Delete from tbl_users where id=$userId";
    $query = mysqli_query($connect, $sql);
    header("location: manage-user.php");
    mysqli_close($connect);

?>