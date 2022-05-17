<?php
    session_start();
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $mydb = "travel";
    $connect = mysqli_connect($serverName, $username, $password, $mydb);
    $did = $_SESSION["tourId"];
    
    $date = $_SESSION["date"];
    $guest = $_SESSION["guest"];
    $tour = $_SESSION["tour"];
    $fullname = $email = $phone = $address = $count = $room = $dateOfBirth = $sex = $message = '';

    if (isset($_POST["submit"])){
        if (isset($_POST["Fullname"])){
            $fullname  = $_POST["Fullname"];
        }
        if (isset($_POST["Email"])){
            $email  = $_POST["Email"];
        }
        if (isset($_POST["Telephone"])){
            $phone  = $_POST["Telephone"];
        }
        $address = $_POST["Address"];
        $count = $_POST["total"];
        $dateOfBirth = $_POST["dateof"];
        $room = $_POST["room"];
        $sex = $_POST["sex"];
        $message = $_POST["note"];
        if ($_POST["Fullname"] && $_POST["Email"] && $_POST["Telephone"]){
            $_SESSION["fullname"] = $fullname;
            $_SESSION["email"] = $email;
            $_SESSION["phone"] = $phone;
            $_SESSION["address"] = $address;
            $_SESSION["count"] = $count;
            $_SESSION["dateOfBirth"] = $dateOfBirth;
            $_SESSION["room"] = $room;
            $_SESSION["message"] = $message;
            $_SESSION["sex"] = $sex;
        }
    }
    if ($sex == "Male"){
        $sex = true;
    } else {
        $sex = false;
    }
    $sql = "insert into tbl_booking(PackageId, FullName, UserEmail, FromDate, DateOfBirth,Address, Phone, Person, Room, Sex, message) values($did, '$fullname', '$email','$date','$dateOfBirth', '$address','$phone', '$count',  '$room', '$sex', '$message');";
    if(mysqli_query($connect, $sql)){
        $msg = "Tour travel is booking successful.";
        // echo "<script> alert('$msg'); </script>";
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../src/css/index.css" />
    <link rel="stylesheet" href="../src/css/tour-du-lich.css">
    <link rel="stylesheet" href="../src/css/thanhtoan.css">
    <link rel="stylesheet" href="../src/css/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="../src/css/hide.js">
    <title>Document</title>

</head>

<body>
    <div class="wrapper">
        <div class="container">
            <?php include("./nav.php"); ?>
            <section class="link ">
                <p>Thông tin chi tiết về tour du lịch</p>
            </section>
            <section class="product">
                <div class="product-image">
                    <img src='../pimages/<?php echo $tour["PackageImage"]; ?>' alt="">
                </div>
                <div class="product-content">
                    <div class="rate">
                        <span>9</span>
                        <h4>Rất tốt</h4>
                    </div>
                    <div class="title">
                        <?php echo (isset($tour["PackageName"]) ? $tour["PackageName"] : ""); ?>
                    </div>
                    <div class="entry">
                        <span>Khởi hành: <b>
                                <?php
                                $date = date("j M Y", strtotime($date));
                                echo ($date); 
                            ?>
                            </b>
                        </span>
                        <span>Thời gian:
                            <b><?php echo ($tour["PackageTime"]); ?></b>
                        </span>
                        <span>Nơi khởi hành: <b>
                                <?php echo ($tour["PackageLocation"]);?>
                            </b></span>
                        <span> Số chỗ còn nhận: <b><?php echo(6 - $guest) ?></b></span>
                    </div>
                </div>
            </section>
            <section class="total">
                <form class="col-md-8 col-12 left" method="post" id="form">
                    <h2>Tổng quan về chuyến đi</h2>
                    <h3>Thông tin liên lạc</h3>
                    <div class="customer-contact mb-3">
                        <div class="customer-contact-inner">
                            <div class="name">
                                <label>Họ và Tên <b>*</b></label>
                                <input class="form-control" id="contact_name" name="Fullname" type="text"
                                    value="<?php echo(isset($_SESSION["fullname"]) ? $_SESSION["fullname"] : ""); ?>">
                            </div>
                            <div class="mail">
                                <label>Email <b>*</b></label>
                                <input class="form-control" id="email" name="Email" type="text"
                                    value="<?php echo(isset($_SESSION["email"]) ? $_SESSION["email"] : ""); ?>">
                            </div>
                            <div class="phone">
                                <label>Số điện thoại <b>*</b></label>
                                <input class="form-control" id="mobilephone" name="Telephone"
                                    onkeypress="return funCheckInt(event)" type="text"
                                    value="<?php echo(isset($_SESSION["phone"]) ? $_SESSION["phone"] : ""); ?>">
                            </div>
                            <div class="addess">
                                <label>Địa chỉ</label>
                                <input class="form-control" id="address" name="Address" type="text"
                                    value="<?php echo(isset($_SESSION["address"]) ? $_SESSION["address"] : ""); ?>">
                            </div>
                            <div class="addess">
                                <label>Số lượng:</label>
                                <input class="form-control" id="total" name="total" type="text"
                                    value="<?php echo(isset($_SESSION["count"]) ? $_SESSION["count"] : ""); ?>">
                            </div>
                            <div class="addess">
                                <label>Số lượng phòng:</label>
                                <input class="form-control" id="room" name="room" type="text"
                                    value="<?php echo(isset($_SESSION["room"]) ? $_SESSION["room"] : ""); ?>">
                            </div>
                            <div class="addess">
                                <label>Ngày sinh</label>
                                <input class="form-control" id="dateof" name="dateof" type="date"
                                    value="<?php echo($_SESSION["dateOfBirth"]); ?>">
                            </div>
                            <div class="addess">
                                <label>Sex</label>
                                <select class="form-control" name="sex" id="sex"
                                    value="<?php echo($_SESSION["sex"]); ?>" style="padding: 3px 10px; width: 100%;">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <div class="addess" style="width: 100%;">
                                <label>Quý khách có ghi chú lưu ý gì, hãy nói với chúng tôi !
                                </label>
                                <div class="customer-save-inner">
                                    <textarea style="width: 100%; height: 120px;" class="form-control" cols="20"
                                        id="note" name="note"
                                        placeholder="Vui lòng nhập nội dung lời nhắn bằng tiếng Anh hoặc tiếng Việt"
                                        rows="5"><?php echo($_SESSION["message"]); ?></textarea>
                                </div>
                            </div>
                            <div class="order" style="width: 100%;">
                                <button type="submit" class="btn btn-primary btn-order" name="submit">Đặt
                                    ngay</button>
                            </div>
                        </div>
                    </div>
                </form>
                <section class="col-md-4 col-12 right">
                    <div class="group-checkout">
                        <h3>Tóm tắt chuyến đi</h3>
                        <p class="package-title">Tour trọn gói <span> (<?php echo ($guest) ?> khách)</span></p>
                        <div class="product-1">
                            <div class="product-image-1">
                                <img src='../pimages/<?php echo $tour["PackageImage"]; ?>' class="img-fluid"
                                    alt="image">
                            </div>
                            <div class="product-content-1">
                                <p class="title-1"><?php echo($tour["PackageName"]); ?></p>
                            </div>
                        </div>
                        <div class="go-tour">
                            <div class="start">
                                <i class="fal fa-calendar-minus"></i>
                                <div class="start-content">
                                    <h4>Bắt đầu chuyến đi</h4>
                                    <p class="time"><?php echo($date) ?></p>
                                    <p class="from"></p>
                                </div>
                            </div>
                        </div>
                        <div class="detail">
                            <table style="width: 100%;">
                                <tbody style="width:425px;">
                                    <tr>
                                        <th class="l1">Hành khách</th>
                                        <th class="l2 text-right">
                                            <i class="fal ti-user"
                                                id="AmoutPerson"><?php echo($_SESSION["count"]); ?></i>
                                            <p class="add-more"></p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="l1">Số phòng</th>
                                        <th class="l2 text-right">
                                            <i class="fal ti-user" id="AmoutRoom">
                                                <?php
                                                echo($_SESSION["room"]); 
                                                ?>
                                            </i>
                                            <p class="add-more"></p>
                                        </th>
                                    </tr>
                                    <tr class="pt">
                                        <td>Phụ thu phòng riêng</td>
                                        <td class="t-price text-right" id="txtPhuThu">
                                            <?php 
                                            echo(number_format($_SESSION["room"] * 200000, 0, ',', '.') . " VNĐ");
                                            $_SESSION["totalRoom"] = $_SESSION["room"] * 200000;
                                            ?></td>
                                    </tr>
                                    <!-- <tr class="pt">
                                        <td>Giảm giá tour giờ chót</td>
                                        <td class="t-price text-right" id="txtGiamGiaLastMinute">còn <span
                                                id="remainLastMinuteGuest">6 </span> / <span
                                                id="totalLastMinuteGuest">7</span>
                                            chỗ</td>
                                    </tr> -->
                                    <tr>
                                        <td>Người lớn và trẻ em</td>
                                        <td class="t-price text-right" id="GiamGiaLastMinute">
                                            <?php
                                                
                                                echo(number_format($_SESSION["count"] * 500000, 0, ',', '.') . " VNĐ");
                                                $_SESSION["totalPerson"] = $_SESSION["count"] * 500000;
                                                ?>
                                        </td>
                                    </tr>
                                    <!-- <tr class="cuppon">
                                        <td>Mã giảm giá </td>
                                        <td class="cp-form text-right">
                                            <form action="#">
                                                <input class="form-control-1" id="DiscountCode" name="DiscountCode"
                                                    placeholder="Thêm mã" required="required" type="text" value="">
                                                <input type="hidden" id="hdDiscountCode">
                                                <input type="hidden" id="hdDiscountCode-Price" value="0"> &nbsp;
                                                <input type="button" class="btn btn-success" id="btnDiscountCode"
                                                    value="Áp dụng">
                                            </form>
                                        </td>
                                    </tr> -->

                                    <tr class="total-1">
                                        <td>Tổng cộng</td>
                                        <td class="t-price text-right" id="TotalPrice">
                                            <?php
                                            $total = $_SESSION["totalPerson"] + $_SESSION["totalRoom"] + $tour["PackagePrice"];
                                        echo(number_format($total, 0, ',', '.') . " VNĐ");
                                        
                                        ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </section>
        </div>
    </div>
    <script type='text/javascript'>
    // var date = document.getElementById("datepicker");
    // date.datepicker() {
    // "dateFormat": "dd-mm-yyyy"
    // });
    // date.datapicker

    function hide(x) {
        if (x == 0) {
            document.getElementById("cus").style.display = 'none'
        } else {
            document.getElementById("cus").style.display = 'block'
            return;
        }
    }
    var minus = document.getElementsByClassName("minus");
    var plus = document.getElementsByClassName("plus");

    function Minus1() {
        let number = document.getElementById("adult").innerText;
        let so = parseInt(number)
        if (so == 0) {
            so = 0;
        } else {
            so = so - 1;
            document.getElementById("adult").innerHTML = so;
        }
    }

    function Plus1() {
        let number = document.getElementById("adult").innerText;
        let so = parseInt(number)
        so = so + 1;
        document.getElementById("adult").innerHTML = so;
    }

    function Minus2() {
        let number = document.getElementById("children").innerText;
        let so = parseInt(number)
        if (so == 0) {
            so = 0;
        } else {
            so = so - 1;
            document.getElementById("children").innerHTML = so;
        }
    }

    function Plus2() {
        let number = document.getElementById("children").innerText;
        let so = parseInt(number)
        so = so + 1;
        document.getElementById("children").innerHTML = so;
    }

    function Minus3() {
        let number = document.getElementById("smallchildren").innerText;
        let so = parseInt(number)
        if (so == 0) {
            so = 0;
        } else {
            so = so - 1;
            document.getElementById("smallchildren").innerHTML = so;
        }
    }

    function Plus3() {
        let number = document.getElementById("smallchildren").innerText;
        let so = parseInt(number)
        so = so + 1;
        document.getElementById("smallchildren").innerHTML = so;
    }

    function Minus4() {
        let number = document.getElementById("baby").innerText;
        let so = parseInt(number)
        if (so == 0) {
            so = 0;
        } else {
            so = so - 1;
            document.getElementById("baby").innerHTML = so;
        }
    }

    function Plus4() {
        let number = document.getElementById("baby").innerText;
        let so = parseInt(number)
        so = so + 1;
        document.getElementById("baby").innerHTML = so;
    }
    </script>
</body>

</html>
<?php mysqli_close($connect); ?>