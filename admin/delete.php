<?php
    include ("./config.php");
    
    $connect = mysqli_connect($serverName, $username, $password, $mydb);
    if (isset($_GET['pid'])){
        $pid = intval($_GET['pid']);
    }
    $sql = "Delete from tbl_tourpackages where PackageId=$pid";
    $query = mysqli_query($connect, $sql);
    header("location: manage-category.php");
    mysqli_close($connect);
?>
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