<?php
    session_start();
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $mydb = "travel";
    $connect = mysqli_connect($serverName, $username, $password, $mydb);
    if(isset($_POST["submit"])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $passCrypt = md5($pass);
        $sql="Select * from admin where UserName = '$user' and Password = '$passCrypt'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) > 0){
            if ($passCrypt == $row["Password"]){
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["id"];
                $_SESSION["user"] = $row["UserName"];
                header("location: http://localhost/Php-Travel/admin/dash.php");
            } else {
                echo 
                "<script> alert('Wrong Password'); </script>";
            }
        } else {
            echo 
            "<script> alert('User not Registered'); </script>"; 
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
                    <form action="" method="post" id="loginlogout" class="form-class" name="login" autocomplete="off">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit">Login</button>
                            <small></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>