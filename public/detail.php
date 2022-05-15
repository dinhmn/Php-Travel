<?php
    session_start();
    error_reporting(0);
    include("../admin/config.php");
    $connect = mysqli_connect($serverName, $username, $password, $mydb);

    if (isset($_GET['did'])){
      $did = intval($_GET['did']);

    }
    $sql = "Select * from tbl_tourpackages where PackageId=$did";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);
    if(isset($_POST["submit"])){
      $date = $_POST["dateoftravel"];
      $guest = $_POST["guest"];
      if ($_POST["dateoftravel"] && $_POST["guest"]) {
        $_SESSION["date"] = $date;
        $_SESSION["guest"] = $guest;
        $_SESSION["tourId"] = $did;
        $_SESSION["tour"] = $row;
        header("location: http://localhost/Php-Travel/public/payment.php");
      }
    }
    
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
    <link rel="stylesheet prefetch" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" />
    <link rel="stylesheet" href="../src/css/chitiet.css">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <?php include("./nav.php"); ?>
            <section class="link ">
                <h3>Thông tin chi tiết về tour du lịch</h3>
            </section>
            <div class="chitiet">
                <img width="600" height="600" src='../pimages/<?php echo $row["PackageImage"]; ?>' alt="">
                <div class="infor-tour">
                    <h1><?php echo ($row["PackageName"]) ?></h1>
                    <h3> <?php echo(number_format($row["PackagePrice"], 0, ',', '.') . " VNĐ"); ?></h3>
                    <p>Đặc điểm: <?php echo ($row["PackageFetures"]) ?>
                    </p>
                    <form action="" method="post" name="session_guest">
                        <div class="form-group">
                            <label for="dateoftravel"
                                style="width: 100px;display: inline-block;font-size: 18px;">From</label>
                            <input type="date" name="dateoftravel" id="dateoftravel" require
                                style="border: 1px solid #e3e3e3;padding: 3px 10px;border-radius: 3px;flex-shrink: 1;width: 80%;">
                        </div>
                        <div class="form-group">
                            <label for="guest" style="width: 100px;display: inline-block;font-size: 18px;">Số
                                khách</label>
                            <select name="guest" id="guest"
                                style="border: 1px solid #e3e3e3;padding: 3px 10px;border-radius: 3px;flex-shrink: 1;width: 80%;">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                            </select>
                        </div>
                        <button type="submit" name="submit">Đặt ngay</button>
                    </form>
                    <hr>
                    <h4>Các tour tương tự</h4>
                    <div class="list-tour">
                        <?php     
                        $sqli = "Select * from tbl_tourpackages where PackageId!=$did order by PackagePrice asc limit 4;";
                        $resulti = mysqli_query($connect, $sqli);
                        $rowi = mysqli_fetch_array($resulti); 
                        foreach ($resulti as $key) {
                        ?>

                        <div class="list-tour-1">
                            <img src='../pimages/<?php echo $key["PackageImage"]; ?>' alt="">
                            <div class="infor-tour-1">
                                <a
                                    href="../public/detail.php?did=<?php echo ($key["PackageId"]);?>"><?php echo ($key["PackageName"]); ?></a>
                                <h4><?php echo(number_format($key["PackagePrice"], 0, ',', '.') . " VNĐ"); ?></h4>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <div class="detail">
                <?php echo ($row["PackageDetails"]); ?>
            </div>
            <?php include("./footer.php") ?>
        </div>
    </div>
</body>

</html>
<?php mysqli_close($connect); ?>