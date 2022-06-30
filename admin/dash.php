<?php
    session_start();
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $mydb = "travel";
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
                // echo "Bạn không đủ quyền truy cập vào trang này<br>";
                // echo "<a href='http://localhost/Php-Travel/public/login.php'> Click để về lại trang chủ</a>";
                // exit();
                header("location: http://localhost/Php-Travel/public/index.php");
            }
        }
    }
    if (isset($_POST["logout"])){
        if (isset($_SESSION['login']) == true){
            unset($_SESSION["login"]);
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

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Import CSS -->
    <link rel="stylesheet" href="../src/css/dashboard.css" />
</head>

<body>
    <div class="wrapper">
        <?php include("./header.php")
        ?>
        <div class="container">
            <?php include("./sidebar.php") ?>
            <div class="main">
                <div class="head">
                    <div class="user">
                        <?php
                            $connect = mysqli_connect($serverName, $username, $password, $mydb);
                            $sqlTour = "select count(PackageId) as countTour from tbl_tourpackages where 1=1;";
                            $tour = mysqli_query($connect, $sqlTour);
                            $rowTour = mysqli_fetch_array($tour);
                        ?>
                        <div>Tour</div>
                        <div><?php echo ($rowTour["countTour"]); ?></div>

                    </div>
                    <div class="user">
                        <?php
                            $connect = mysqli_connect($serverName, $username, $password, $mydb);
                            $sqlTour = "select count(BookingId) as countBooking from tbl_booking where 1=1;";
                            $tour = mysqli_query($connect, $sqlTour);
                            $rowTour = mysqli_fetch_array($tour);
                        ?>
                        <div>Book</div>
                        <div><?php echo ($rowTour["countBooking"]); ?></div>
                    </div>
                    <div class="user">
                        <?php
                            $connect = mysqli_connect($serverName, $username, $password, $mydb);
                            $sqlTour = "select count(TouristId) as countTourist from tbl_tourist where 1=1;";
                            $tour = mysqli_query($connect, $sqlTour);
                            $rowTour = mysqli_fetch_array($tour);
                        ?>
                        <div>Tourist</div>
                        <div><?php echo ($rowTour["countTourist"]); ?></div>
                    </div>
                    <div class="user">
                        <?php
                            $connect = mysqli_connect($serverName, $username, $password, $mydb);
                            $sqlTour = "select count(id) as countLocation from tbl_location where 1=1;";
                            $tour = mysqli_query($connect, $sqlTour);
                            $rowTour = mysqli_fetch_array($tour);
                        ?>
                        <div>Location</div>
                        <div><?php echo ($rowTour["countLocation"]); ?></div>
                    </div>
                </div>
                <div class="table-list">
                    <div class="table-list-children">
                        <div class="card card-table">
                            <div class="card-header">
                                <div class="title">Purchases</div>
                            </div>
                            <div class="card-body">
                                <table class="">
                                    <thead>
                                        <tr>
                                            <th style="width:40%;">Book</th>
                                            <th class="number">Price</th>
                                            <th style="width:20%;">ReDate</th>
                                            <th style="width:20%;">State</th>
                                        </tr>
                                    </thead>
                                    <tbody class="no-border-x">
                                        <?php
                                        $connect = mysqli_connect($serverName, $username, $password, $mydb);
                                        $sql = "select * from tbl_booking inner join tbl_tourpackages on tbl_booking.PackageId = tbl_tourpackages.PackageId where 1 =1";
                                        $results = mysqli_query($connect, $sql); 
                                        mysqli_fetch_all($results, MYSQLI_ASSOC);
                                        $cnt=1;
                                        foreach($results as $row){
                                        ?>
                                        <tr>
                                            <td><?php echo($row["PackageName"]) ?></td>
                                            <td class="number" style="display: block; text-align: center;">
                                                <?php echo(number_format($row["price"], 0, ',', '.') . " VNĐ");?>
                                            </td>
                                            <td style="text-align: center;">
                                                <?php echo($row["RegDate"])  ?></td>
                                            <td class="text-success" style="text-align: center;">Completed</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>