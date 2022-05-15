<?php
    session_start();
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $mydb = "travel";
    $connect = mysqli_connect($serverName, $username, $password, $mydb);
    $fullname = $user = $pass = $passCrypt = $phone = $email = '';
    if(isset($_POST["submit"])){
        if (isset($_POST['fullname'])){
            $fullname = $_POST['fullname'];
        }
        if (isset($_POST['username'])){
            $user = $_POST['username'];
        }
        if (isset($_POST['password'])){
            $pass = $_POST['password'];
            $passCrypt = md5($pass);
        }
        // if (isset($_POST['confirm']) && $_POST['confirm'] == $pass){
        //     $passCrypt = md5($pass);
        // }
        if (isset($_POST['phone'])){
            $phone = $_POST['phone'];
        }
        if (isset($_POST['email'])){
            $email = $_POST['email'];
        }
        $sql="insert into tbl_users(Username, Password, FullName, PhoneNumber, Email) values('$user', '$passCrypt', '$fullname', '$phone', '$email')";

        if (mysqli_query($connect, $sql)){
            $msg = "Register is successful.";
            header("location: http://localhost/Php-Travel/public/login.php");
        } else {
            header("location: http://localhost/Php-Travel/public/register.php");
        } 
    }
    mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <!-- Import CSS -->
    <link rel="stylesheet" href="../src/css/login.css" />
    <style>
    .wrapper {
        background-image: url("../src/images/image3.png");
    }
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="login" style="height: 700px;">
                <div class="login-image">
                    <img src="../src/images/image2.png" alt="" />
                </div>
                <div class="login-account">
                    <form action="" method="post" id="loginlogout" class="form-class" name="login" autocomplete="off">
                        <div class="form-group">
                            <label for="fullname">Fullname</label>
                            <input type="text" id="fullname" name="fullname" />
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" />
                        </div>
                        <div class="form-group">
                            <label for="confirm">Confirm</label>
                            <input type="password" id="confirm" name="confirm" />
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" />
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit">Register</button>
                            <small></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>