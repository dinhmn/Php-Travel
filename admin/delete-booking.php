<?php
    include ("./config.php");
    
    $connect = mysqli_connect($serverName, $username, $password, $mydb);
    if (isset($_GET['bid'])){
        $pid = intval($_GET['bid']);
    }
    $sql = "Delete from tbl_booking where BookingId=$bid";
    $query = mysqli_query($connect, $sql);
    header("location: manage-booking.php");
    mysqli_close($connect);
?>