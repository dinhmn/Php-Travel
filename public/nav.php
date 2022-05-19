<header class="menu">
    <span class="logo">TOURPLUS</span>
    <div class="nav">
        <ul>
            <li><a href="./index.php">Trang chủ</a></li>
            <li><a href="./desc.php">Giới thiệu</a></li>
            <li><a href="./tour.php">Tour</a></li>
            <li><a href="./news.php">Tin tức</a></li>
            <li><a href="./contact.php">Liên hệ</a></li>

            <?php
                if ($_SESSION["user"]){
                    echo "
                        <li>
                            <span> 
                    ";
                    echo ($_SESSION["user"]);
                    echo ("</span>
                        <a href='http://localhost/Php-Travel/admin/logout.php'>Logout</a>
                    </li>
                ");
                } else {
                    echo ("
                    <li>
                        <a href='./login.php'>Sign in</a>
                        <a href='./register.php'>Sign up</a>
                    </li>
                    ");
                }
            ?>
        </ul>
    </div>
</header>