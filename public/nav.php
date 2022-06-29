<header class="menu">
    <span class="logo" style="display: flex; gap: 20px; justify-content: center; align-items: center;">TOURPLUS <img
            src="../src/images/logo.png" alt="" style="width: 50px; height: 50px; object-fit: cover;"> </span>
    <div class="nav">
        <ul>
            <li><a href="./index.php">Trang chủ</a></li>
            <li><a href="./desc.php">Giới thiệu</a></li>
            <li><a href="./tour.php">Tour</a></li>
            <li><a href="./news.php">Tin tức</a></li>
            <li><a href="./contact.php">Liên hệ</a></li>

            <?php
                if ($_SESSION["user"] != null){
                    echo ("
                        <li>
                            <span> ");
                    echo ($_SESSION["user"]);
                    echo ("</span>
                        <a href='http://localhost/Php-Travel/admin/logout.php'>Logout</a>
                    </li>");
                } else {
                    echo ("
                    <li>
                        <a href='./login.php'>Đăng nhập</a>
                        <a href='./register.php'>Đăng kí</a>
                    </li>
                    ");
                }
            ?>
        </ul>
    </div>
</header>