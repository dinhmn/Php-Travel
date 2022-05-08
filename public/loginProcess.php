<?php
    session_start();
    error_reporting(0);
    include ("./admin/config.php");
    $message = "";
    if (count($_POST) > 0) {
        $con = mysqli_connect($serverName, $username, $password, $mydb);
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["username"])){
            $user = $_POST["username"];
        }
        if (isset($_POST["password"])){
            $pass = $_POST["password"];
        }
        
        // if(isset($user) && isset($pass)){
            $passCrypt = md5($pass);
            $query="Select * from admin where UserName = '$user' and Password = '$passCrypt'";
            $select = mysqli_query($con, $query);
            $row = mysqli_fetch_all($select, MYSQLI_ASSOC);
            $id=$row['id'];
            $count=mysqli_num_rows($select);
            echo ($count);
            if($count==1)
            {
            //session_register("username");
            $_SESSION['name']=$user;
            header("location: welcome.php");
            }else{
            $error = 'please enter username and password';
            }
            }

?>