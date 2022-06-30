<?php
    session_start();
    error_reporting(0);

    $serverName = "localhost";
    $username = "root";
    $password = "";
    $mydb = "travel";
    $connect = mysqli_connect($serverName, $username, $password, $mydb);
    $fullname = $user = $pass = $passCrypt = $phone = $email = '';
    $fullnameError = $userError = $passError = $confirmError = $phoneError = $emailError = '';
    if(isset($_POST["submit"])){
        if (isset($_POST['fullname'])){
            if (!preg_match ("/^[a-zA-Z]+(?:\s[a-zA-Z]+)+$/", $_POST['fullname'])){
                $fullnameError = "Only alphabets and whitespace are allowed.";
            } else {
                $fullname = $_POST['fullname'];
            }
        }
        if (isset($_POST['username'])){
            $user = $_POST['username'];
        }
        // if (isset($_POST['password'])){
        //     $pass = $_POST['password'];
        //     $passCrypt = md5($pass);
        // }
        if(!empty($_POST["password"]) && ($_POST["password"] == $_POST["confirm"])) {
            $pass = $_POST["password"];
            $confirm = $_POST["confirm"];
            if (strlen($_POST["password"]) <= '8') {
                $passError = "Your Password Must Contain At Least 8 Characters!";
            }
            elseif(!preg_match("#[0-9]+#",$pass)) {
                $passError = "Your Password Must Contain At Least 1 Number!";
            }
            elseif(!preg_match("#[A-Z]+#",$pass)) {
                $passError = "Your Password Must Contain At Least 1 Capital Letter!";
            }
            elseif(!preg_match("#[a-z]+#",$pass)) {
                $passError = "Your Password Must Contain At Least 1 Lowercase Letter!";
            } else {
                $passCrypt = md5($pass);
            }
        }
        if ($_POST["password"] != $_POST["confirm"]){
            $confirmError = "Confirm password is not valid.";
        }

        // if (isset($_POST['confirm']) && $_POST['confirm'] == $pass){
        //     $passCrypt = md5($pass);
        // }
        if (isset($_POST['phone'])){
            if (!preg_match( '/^(09|03|07|08|05)+([0-9]{8})$/', $_POST['phone'] )){
                $phoneError = "Phone is not valid.";
            } else {
                $phone = $_POST['phone'];
            }
        }
        if (isset($_POST['email'])){
            if (!preg_match ("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $_POST['email'])){
                $emailError = "Email is not valid.";
            } else {
                $email = $_POST['email'];
            }
        } 
        if (empty($emailError) && empty($phoneError) && empty($passError) && empty($fullnameError)){
            $sql="insert into tbl_users(Username, Password, FullName, PhoneNumber, Email) values('$user', '$passCrypt', '$fullname', '$phone', '$email')";
            $sql1 = "insert into admin(UserName, Password, updationDate) values('$user', '$passCrypt', new DateTime())";
            if (mysqli_query($connect, $sql) && mysqli_query($connect, $sql1)){
                $msg = "Register is successful.";
                header("location: http://localhost/Php-Travel/public/login.php");
            } else {
                header("location: http://localhost/Php-Travel/public/register.php");
            } 
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
                            <label for="fullname">Họ và tên</label>
                            <input type="text" id="fullname" name="fullname" />
                            <small style="color: red;"><?php echo($fullnameError); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="username">Tài khoản</label>
                            <input type="text" id="username" name="username" />
                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" id="password" name="password" />
                            <small style="color: red;"><?php echo($passError); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="confirm">Xác nhận mật khẩu</label>
                            <input type="password" id="confirm" name="confirm" />
                            <small style="color: red;"><?php echo($confirmError); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="phone">Điện thoại</label>
                            <input type="text" id="phone" name="phone" />
                            <small style="color: red;"><?php echo($phoneError); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" />
                            <small style="color: red;"><?php echo($emailError); ?></small>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit">Đăng kí</button>
                            <small><a href="../public/index.php" style="margin-top: 10px;">Trang chủ</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>