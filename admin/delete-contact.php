<?php
    include ("./config.php");

    $connect = mysqli_connect($serverName, $username, $password, $mydb);
    if (isset($_GET['contactId'])){
        $contactId = intval($_GET['contactId']);
    }
    $sql = "Delete from tbl_enquiry where id=$contactId";
    $query = mysqli_query($connect, $sql);
    header("location: manage-contact.php");
    mysqli_close($connect);

?>