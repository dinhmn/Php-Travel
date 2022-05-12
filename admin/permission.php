<?php
    if (isset($_SESSION['user']) == false) {
	    header('Location: http://localhost/Php-Travel/public/login.php');   
    }else {
        if (isset($_SESSION['login']) == true) {
            // Ngược lại nếu đã đăng nhập
            $permission = $_SESSION['login'];
            $user = $_SESSION["user"];
            // Kiểm tra quyền của người đó có phải là admin hay không
            if ($user != 'admin') {
                // Nếu không phải admin thì xuất thông báo
                echo "Bạn không đủ quyền truy cập vào trang này<br>";
                echo "<a href='http://localhost/Php-Travel/public/login.php'> Click để về lại trang chủ</a>";
                exit();
            }
        }
    }
    if (isset($_POST["logout"])){
        if (isset($_SESSION['login']) == true){
            unset($_SESSION["login"]);
        }
    }
?>