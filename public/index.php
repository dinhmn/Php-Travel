<?php
    session_start();
    error_reporting(0);
    include("../admin/config.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>

    <!-- Import CSS -->
    <link rel="stylesheet" href="../src/css/index.css" />
    <link rel="stylesheet" href="../src/css/search.css">
    <link rel="stylesheet" href="/src/css/vote-star.css">
    <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
    <link rel="stylesheet" href="../src/css/nghi-duong-phu-quoc.css">
    <link rel="stylesheet" href="../src/css/noi-tieng.css">
    <!-- Import Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <?php include("./nav.php"); ?>
            <section class="slides">
                <div class="slider">
                    <div class="slider-image">
                        <img src="https://images.unsplash.com/photo-1503457574462-bd27054394c1?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80"
                            alt="" />
                    </div>
                    <div class="slider-title">
                        <h1>Công ty HaUI Travel AĐH</h1>
                        <h3>Chuyên tổ chức các tour du lịch trong nước</h3>
                        <small>
                            Ngành du lịch là một ngành phát triển rất tốt dựa vào
                            thương mại điện tử. Nhóm 5 đã xây dựng website mô phỏng quá trình 
                            bán tour du lịch cho người dùng. Giao diện sử dụng thân thiện với 
                            người dùng. Dễ dàng tương tác với người quản lí.
                        </small>
                        <button type="button">Xem ngay</button>
                    </div>
                </div>
            </section>
            <section id="tour-hut-khach" class="popular">
                <div class="head">
                    <h2>NHỮNG TOUR NỔI TIẾNG</h2>
                </div>
                <div class="box-hut">
                    <?php
                        $connect = mysqli_connect($serverName, $username, $password, $mydb);
                        $sql = "select * from tbl_tourpackages ORDER BY PackagePrice DESC LIMIT 3";
                        $results = mysqli_query($connect, $sql); 
                        mysqli_fetch_all($results, MYSQLI_ASSOC);
                        $cnt = 1;
                        foreach ($results as $row) {
                            if ($cnt <= 3){
                    ?>
                    <div class="box-hut-element">
                        <div class="box-hut-image">
                            <img src="<?php echo ('../pimages/'.$row["PackageImage"]);  ?>" alt="">
                        </div>
                        <div class="nd">
                            <h3 class="h3"><?php echo($row["PackageName"]) ?></h3>
                            <p><?php echo(number_format($row["PackagePrice"], 0, ',', '.') . " VNĐ"); ?></p>
                            <a
                                href="http://localhost/Php-Travel/public/detail.php?did=<?php echo($row["PackageId"]); ?>"><button>Xem
                                    ngay</button></a>
                        </div>
                    </div>
                    <?php
                    }}
                    mysqli_close($connect);
                    ?>
                </div>
            </section>
            <section id="nghi-duong">
                <div class="content">
                    <h4>Giảm giá 30% </h4>
                    <h2>NGHỈ DƯỠNG TẠI PHÚ QUỐC</h2>
                    <p>Từ 5/12 đến 30/12</p>
                    <button>XEM NGAY</button>
                </div>
            </section>
            <section id="tour-hut-khach">
                <div class="head">
                    <h2>NHỮNG TOUR HÚT KHÁCH</h2>
                </div>
                <div class="box-hut">
                    <?php
                        $connect = mysqli_connect($serverName, $username, $password, $mydb);
                        $sql = "select * from tbl_tourpackages ORDER BY PackagePrice asc LIMIT 6";
                        $results = mysqli_query($connect, $sql); 
                        mysqli_fetch_all($results, MYSQLI_ASSOC);
                        $cnt = 1;
                        foreach ($results as $row) {
                            if ($cnt <= 6){

                    ?>
                    <div class="box-hut-element">
                        <div class="box-hut-image">
                            <img src="<?php echo ('../pimages/'.$row["PackageImage"]);  ?>" alt="">
                        </div>
                        <div class="nd">
                            <h3> <a
                                    href="http://localhost/Php-Travel/public/detail.php?did=<?php echo($row["PackageId"]); ?>"><?php echo($row["PackageName"]) ?></a>
                            </h3>
                            <!-- <p>5 ngày 4 đêm</p> -->
                        </div>
                    </div>

                    <?php
                    }}
                    mysqli_close($connect);
                    ?>
                </div>
            </section>
            <section id="noi-tieng">
                <div class="head ">
                    <h2>NHỮNG ĐỊA ĐIỂM DU LỊCH NỔI TIẾNG</h2>
                    <!-- <p>Hảo đẹp trai siêu cấp vũ trụ vip pro best Aphelios và Jhin</p> -->
                </div>
                <div class="location">
                    <?php
                    $connect = mysqli_connect($serverName, $username, $password, $mydb);
                    $sql = "select * from tbl_location where 1 =1";
                    $results = mysqli_query($connect, $sql);
                    mysqli_fetch_all($results, MYSQLI_ASSOC);
                    $count = 1;
                    foreach ($results as $row) {
                        if($count <= 3){
                    ?>
                    <div class="location-element">
                        <div class="infor">
                            <h2><?php echo($row["name"]); ?></h2>
                            <h4><?php echo($row["city"]); ?></h4>

                            <button>TÌM HIỂU</button>
                        </div>
                    </div>

                    <?php $count++;}} mysqli_close($connect); ?>
                </div>
                <div class="head ">
                    <h2>CÁC THÀNH PHỐ DU LỊCH</h2>
                    <p>Anh yêu em ở mọi vũ trụ</p>
                </div>
                <div class="body-du-lich ">
                    <div class="du-lich-left">
                        <div class="list-du-lich">
                            <?php
                        $connect = mysqli_connect($serverName, $username, $password, $mydb);
                        $sql = "select * from tbl_location where 1 =1";
                        $results = mysqli_query($connect, $sql);
                        mysqli_fetch_all($results, MYSQLI_ASSOC);
                        $count = 1;
                        foreach ($results as $row) {
                            if($count <= 2){
                        ?>
                            <div class="du-lich-elemet">
                                <div class="infor-list">
                                    <h3><?php echo($row["city"]); ?></h3>
                                    <p>Giá: <span>300$</span> / người</p>
                                    <button>XEM NGAY</button>
                                </div>
                            </div>

                            <?php $count++;}} mysqli_close($connect); ?>
                        </div>
                        <div class="list-du-lich">
                            <?php
                            $connect = mysqli_connect($serverName, $username, $password, $mydb);
                            $sql = "select * from tbl_location where 1 =1 order by id desc;";
                            $results = mysqli_query($connect, $sql);
                            mysqli_fetch_all($results, MYSQLI_ASSOC);
                            $count = 1;
                            foreach ($results as $row) {
                                if($count <= 2){
                            ?>
                            <div class="du-lich-elemet">
                                <div class="infor-list">
                                    <h3><?php echo($row["city"]); ?></h3>
                                    <p>Giá: <span>300$</span> / người</p>
                                    <button>XEM NGAY</button>
                                </div>
                            </div>
                            <?php $count++;}} mysqli_close($connect); ?>
                        </div>
                    </div>
                    <div class="du-lich-right">
                        <div class="infor-right">
                            <h2>Miền Bắc</h2>
                            <p>Du khách có thể đến và thưởng ngoạn các loài hoa
                                đầy sắc màu vào những ngày xuân thời tiết hơi se lạnh, hay
                                đắm chìm vào sắc vàng rực rỡ của những thửa ruộng bậc thang
                                đều thẳng tắp trong mùa thu, rồi thả mình vào những dòng sông dài tăm tắp trong ngày hè
                                oi bức.
                            </p>
                            <h4>Các thành phố</h4>
                            <ul>
                                <li>Hà Nội</li>
                                <li>Sa pa</li>
                                <li>Hạ Long</li>
                                <li>Điện biên</li>
                                <li>Quảng Bình</li>
                                <li>Thanh Hóa</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="body-du-lich">
                    <div class="du-lich-right">
                        <div class="infor-right">
                            <h2>Miền Nam</h2>
                            <p>Du lịch miền Tây Nam Bộ gắn liền với nhiều trải nghiệm
                                vô cùng hấp dẫn về miền sông nước, những vườn trái
                                cây trĩu quả, thiên nhiên xanh mát. Đây còn là địa phương
                                có nhiều văn hóa sinh hoạt độc đáo với những con người thân thiên,
                                giúp bạn hiểu thêm về các vùng miền trên khắp dải đất hình chữ S thân thương.
                            </p>
                            <h4>Các thành phố</h4>
                            <ul>
                                <li>Đà Lạt</li>
                                <li>Nha Trang</li>
                                <li>TP.HCM</li>
                                <li>Cần Thơ</li>
                                <li>Phú Quốc</li>
                                <li>Phan Thiết</li>
                            </ul>
                        </div>
                    </div>
                    <div class="du-lich-left">
                        <div class="list-du-lich">
                            <div class="du-lich-elemet">
                                <div class="infor-list">
                                    <h3>Sapa</h3>
                                    <p>Giá: <span>300$</span> / người</p>
                                    <button>XEM NGAY</button>
                                </div>
                            </div>
                            <div class="du-lich-elemet">
                                <div class="infor-list">
                                    <h3>Sapa</h3>
                                    <p>Giá: <span>300$</span> / người</p>
                                    <button>XEM NGAY</button>
                                </div>
                            </div>
                        </div>
                        <div class="list-du-lich">
                            <div class="du-lich-elemet">
                                <div class="infor-list">
                                    <h3>Sapa</h3>
                                    <p>Giá: <span>300$</span> / người</p>
                                    <button>XEM NGAY</button>
                                </div>
                            </div>
                            <div class="du-lich-elemet">
                                <div class="infor-list">
                                    <h3>Sapa</h3>
                                    <p>Giá: <span>300$</span> / người</p>
                                    <button>XEM NGAY</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <?php include("./footer.php") ?>
        </div>
    </div>


</body>

</html>