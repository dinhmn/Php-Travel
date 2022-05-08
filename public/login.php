<?php
    session_start();
    error_reporting(0);
    include ("./admin/config.php");
    $connect = mysqli_connect($serverName, $username, $password, $mydb);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $passCrypt = md5($pass);
        if(!empty($user) && !empty($pass)){
            $sql="Select * from admin where UserName = '$user' and Password = '$passCrypt'";
            $result = mysqli_query($connect, $sql);
            // $row=mysqli_fetch_array($result);
            echo (mysqli_num_rows($result));
            if (mysqli_num_rows($result) === 1) {
                $row = mysqli_fetch_assoc($result);
                if ($row['UserName'] === $user && $row['Password'] === $passCrypt) {
                    echo "Logged in!";
                    $_SESSION['username'] = $row['UserName'];
                    $_SESSION['password'] = $row['Password'];
                    $_SESSION['id'] = $row['id'];
                    header("Location: admin/dash.php");
                    exit();
                }else {
                    header("Location: index.php?error=Incorect User name or password");
                    exit();
                }
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
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="login">
                <div class="login-image">
                    <img src="../src/images/95980815-1024x559.jpg" alt="" />
                </div>
                <div class="login-account">
                    <form action="" method="post" id="loginlogout" class="form-class" name="login">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" />
                        </div>
                        <div class="form-group">
                            <button type="submit">Login</button>
                            <small></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>