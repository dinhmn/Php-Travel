<?php
    session_start();
    error_reporting(0);
    include("../admin/config.php");
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Import Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../src/css/index.css" />
    <link rel="stylesheet" href="../src/css/tour-du-lich.css">


</head>

<body>
    <div class="wrapper">
        <div class="container">
            <?php include("./nav.php"); ?>
            <section class="link">
                <p><a href="index.html">Trang chủ</a> / Tour du lịch</p>
            </section>
            <section class="content">
                <div class="content-left">
                    <h3>NHỮNG TOUR KHÁC</h3>
                    <div class="hr"></div>
                    <div class="box-tour">
                        <img src="../src/images/dulich.jpg" alt="">
                        <div class="infor">
                            <h4>Du lịch Phú Quốc - Nam Đảo 3 ngày 2 đêm dịp noel & tết dương lịch 2021</h4>
                            <p>4,999,999 <span class="d">đ</span></p>
                        </div>
                    </div>
                    <div class="hrn"></div>
                    <div class="box-tour">
                        <img src="../src/images/dulich.jpg" alt="">
                        <div class="infor">
                            <h4>Du lịch Phú Quốc - Nam Đảo 3 ngày 2 đêm dịp noel & tết dương lịch 2021</h4>
                            <p>4,999,999 <span class="d">đ</span></p>
                        </div>
                    </div>
                    <div class="hrn"></div>
                    <div class="box-tour">
                        <img src="../src/images/dulich.jpg" alt="">
                        <div class="infor">
                            <h4>Du lịch Phú Quốc - Nam Đảo 3 ngày 2 đêm dịp noel & tết dương lịch 2021</h4>
                            <p>4,999,999 <span class="d">đ</span></p>
                        </div>
                    </div>
                    <div class="hrn"></div>
                    <div class="box-tour">
                        <img src="../src/images/dulich.jpg" alt="">
                        <div class="infor">
                            <h4>Du lịch Phú Quốc - Nam Đảo 3 ngày 2 đêm dịp noel & tết dương lịch 2021</h4>
                            <p>4,999,999 <span class="d">đ</span></p>
                        </div>
                    </div>
                    <div class="hrn"></div>
                    <div class="box-tour">
                        <img src="../src/images/dulich.jpg" alt="">
                        <div class="infor">
                            <h4>Du lịch Phú Quốc - Nam Đảo 3 ngày 2 đêm dịp noel & tết dương lịch 2021</h4>
                            <p>4,999,999 <span class="d">đ</span></p>
                        </div>
                    </div>
                </div>
                <div class="content-right">
                    <div class="list">
                        <?php
                            $connect = mysqli_connect($serverName, $username, $password, $mydb);
                            $sql = "select * from tbl_tourpackages where 1 =1";
                            $results = mysqli_query($connect, $sql);
                            mysqli_fetch_all($results, MYSQLI_ASSOC);
                            foreach ($results as $key) {
                                # code...
                            
                        ?>
                        <div class="details">
                            <img width="300" height="300" src="../src/images/hoian-300x300.jpg" alt="">
                            <div class="infor-details">
                                <span><?php echo ($key["PackageLocation"]);?> </span>
                                <h4><?php echo ($key["PackageName"]);?> </h4>
                                <p><?php echo ($key["PackagePrice"]);?> <span class="d">đ</span></p>
                            </div>
                        </div>
                        <?php
                        }
                        mysqli_close($connect);
                        ?>
                    </div>

                </div>
        </div>
        </section>
        <footer class="footer">
            <div>
                <h2>Let's travel</h2>
                <ul>
                    <li><i class="fa-solid fa-location-dot"></i>: Hà Nội</li>
                    <li><i class="fa-solid fa-phone"></i>: 09768564782</li>
                    <li><i class="fa-solid fa-envelope"></i>: haooccho@gmail.com</li>
                </ul>
                <form class="footer-subcribe" method="post">
                    <input type="text" name="subcribe" id="subcribe" placeholder="Email của bạn" />
                    <button type="submit">Gửi</button>
                </form>
            </div>
            <div>
                <h2>Tin tức</h2>
                <ul>
                    <li><a href="#">Bản tin Du Lịch Việt</a></li>
                    <li><a href="#">Cẩm nang du lịch</a></li>
                    <li><a href="#">Khám phá du lịch</a></li>
                    <li><a href="#">Sự kiện du lịch</a></li>
                    <li><a href="#">Tuyển dụng Du lịch</a></li>
                </ul>
            </div>
            <div>
                <h2>Góc khách hàng</h2>
                <ul>
                    <li><a href="#">Điều kiện & điều khoản</a></li>
                    <li><a href="#">Quyền riêng tư</a></li>
                    <li><a href="#">Chính sách bảo mật thông tin</a></li>
                    <li><a href="#">Ý kiến khách hàng</a></li>
                    <li><a href="#">Phương thức thanh toán</a></li>
                </ul>
            </div>
            <div>
                <h2>Tour Phổ Biến</h2>
                <div class="tour">
                    <div>
                        <img src="https://images.unsplash.com/photo-1644982647711-9129d2ed7ceb?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1074&q=80"
                            alt="" />
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </div>
    <script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    </script>

</body>

</html>