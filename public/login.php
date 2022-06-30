<?php
    session_start();
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $mydb = "travel";
    $connect = mysqli_connect($serverName, $username, $password, $mydb);

    
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
                    <?php 
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            $user = $_POST['username'];
                            $pass = $_POST['password'];
                            $passCrypt = md5($pass);
                            echo  ($user);
                            echo ($pass);
                            
                            $sql="Select * from admin where UserName = '$user' and Password = '$passCrypt'";
                            // $sql = "Select * from tbl_users where Username = '$user' and Password='$passCrypt'";
                            $result = mysqli_query($connect, $sql);
                            $row = mysqli_fetch_assoc($result);

                            if (mysqli_num_rows($result) > 0){
                                if ($passCrypt == $row["Password"]){
                                    $_SESSION["login"] = true;
                                    $_SESSION["id"] = $row["id"];
                                    $_SESSION["user"] = $row["UserName"];
                                    $_SESSION["pass"] = $row["Password"];
                                    header("location: http://localhost/Php-Travel/admin/dash.php");
                                } else {
                                    echo 
                                    "<script> alert('Wrong Password'); </script>";
                                }
                            } else {
                                header("location: http://localhost/Php-Travel/public/login.php");
                            } 
                        }
                        ?>
                    <form action="" method="post" id="loginlogout" class="form-class" name="login">
                        <div class="form-group">
                            <label for="username">Tài khoản</label>
                            <input type="text" id="username" name="username" />

                        </div>
                        <div class="form-group">
                            <label for="password">Mật khẩu</label>
                            <input type="password" id="password" name="password" />
                        </div>
                        <div class="form-group">
                            <button type="submit" name="submit">Đăng nhập</button>
                            <small style="margin-top: 10px; letter-spacing: 2px;">Don't have an account?<a
                                    href="../public/register.php">Sign
                                    up.</a>
                                </span>
                            </small>
                            <small><a href="../public/index.php">Trang chủ</a></small>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php mysqli_close($connect); ?>