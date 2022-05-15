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
    <link rel="stylesheet" href="../src/css/index.css" />
    <link rel="stylesheet" href="../src/css/tour-du-lich.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="wrapper">
        <div class="container">
            <?php include("./nav.php"); ?>
            <section class="link">
                <p><a href="index.php">Trang chủ</a> / Tour du lịch</p>
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
                        ?>
                        <div class="details">
                            <?php
                                $image = $key['PackageImage'];
                                ?>
                            <img width='300' height='300' src='../pimages/<?php echo $image; ?>' alt=''>
                            <div class="infor-details">
                                <a href="../public/detail.php?did=<?php echo ($key["PackageId"]);?>"><?php echo ($key["PackageName"]);?>
                                </a>
                                <p>
                                    <?php echo(number_format($key["PackagePrice"], 0, ',', '.') . " VNĐ"); ?>
                                </p>
                            </div>
                        </div>
                        <?php
                        }
                        mysqli_close($connect);
                        ?>
                    </div>

                </div>
            </section>
            <?php include("./footer.php"); ?>
        </div>

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