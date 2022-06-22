<?php
    session_start();
    error_reporting(0);

    $serverName = "localhost";
    $username = "root";
    $password = "";
    $mydb = "travel";
    $connect = mysqli_connect($serverName, $username, $password, $mydb);
    $did = $_SESSION["tourId"];
    $_SESSION["totalPerson"] = 0;
    $_SESSION["totalRoom"] = 0;
    $_SESSION["dateOfBirth"] = '';
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
                <form class="col-md-8 col-12 left" style="width: 100%;" method="post" id="form">
                    <h2>Tổng quan về chuyến đi</h2>
                    <h3>Thông tin liên lạc</h3>
                    <div class="customer-contact mb-3">
                        <div class="customer-contact-inner">
                            <?php
                                // $id = $_SESSION["user"];

                                $user = $_SESSION["user"];
                                $pass = $_SESSION["pass"];
                                $sqli = "Select * from tbl_users where Username = '$user' and Password='$pass'";
                            // $sql = "Select * from tbl_users where Username = '$user' and Password='$passCrypt'";


                                $query = mysqli_query($connect, $sqli);
                                $re = mysqli_fetch_array($query);
                                
                            ?>
                            <div class="name">
                                <label>Họ và Tên <b>*</b></label>
                                <input class="form-control" id="contact_name" require name="Fullname" type="text" value="<?php 
                                    if ($_SESSION["user"]) {
                                        echo ($re['FullName']);
                                    } else {
                                        echo(isset($_SESSION["fullname"]) ? $_SESSION["fullname"] : ""); 
                                    }
                                    ?>">
                            </div>
                            <div class="mail">
                                <label>Email <b>*</b></label>
                                <input class="form-control" id="email" require name="Email" type="text" value="<?php
                                    if ($_SESSION["user"]) {
                                        echo($re['Email']);
                                    } else {
                                        echo(isset($_SESSION["email"]) ? $_SESSION["email"] : ""); 
                                    }
                                    ?>">
                            </div>
                            <div class="phone">
                                <label>Số điện thoại <b>*</b></label>
                                <input class="form-control" id="mobilephone" require name="Telephone"
                                    onkeypress="return funCheckInt(event)" type="text" value="<?php
                                    if ($_SESSION["user"]) {
                                        echo($re['PhoneNumber']);
                                    } else {
                                         echo(isset($_SESSION["phone"]) ? $_SESSION["phone"] : ""); 
                                    }
                                    ?>">
                            </div>
                            <div class="addess">
                                <label>Địa chỉ</label>
                                <input class="form-control" id="address" name="Address" type="text"
                                    value="<?php echo(isset($_SESSION["address"]) ? $_SESSION["address"] : ""); ?>">
                            </div>
                            <div class="addess">
                                <label>Số lượng:</label>
                                <div class="person">
                                    <div>
                                        <small>Người lớn:<b>(>12 tuổi)</b></small>
                                        <span class="adust-minus"> - </span>
                                        <input disable class="form-control adust" id="total" name="total" type="text"
                                            value="<?php echo(isset($_SESSION["count"]) ? $_SESSION["count"] : $guest); ?>">
                                        <span class="adust-plus"> + </span>
                                    </div>
                                    <div>
                                        <small>Trẻ em:(Từ 5-11 tuổi)</small>
                                        <span class="children-minus"> - </span>
                                        <input disable class="form-control children" id="total" name="total" type="text"
                                            value="0">
                                        <span class="children-plus"> + </span>
                                    </div>
                                    <div>
                                        <small>Trẻ nhỏ và em bé:(< 5 tuổi)</small>
                                                <span class="baby-minus"> - </span>
                                                <input disable class="form-control baby" id="total" name="total"
                                                    type="text" value="0">
                                                <span class="baby-plus"> + </span>
                                    </div>
                                </div>



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
                                        rows="5"><?php echo(isset($_SESSION["message"]) ? $_SESSION["message"] : ""); ?></textarea>
                                </div>
                            </div>
                            <div class="order" style="width: 100%;">
                                <button type="submit" class="btn btn-primary btn-order" name="submit">Kiểm tra</button>
                            </div>
                        </div>
                    </div>
                </form>

        </div>
    </div>
    <script type="text/javascript">
    // var date = document.getElementById("datepicker");
    // date.datepicker() {
    // "dateFormat": "dd-mm-yyyy"
    // });
    // date.datapicker
    var adultPlug = document.querySelector(".adust-plus");
    var per = document.querySelector(".form-control.adust").value;
    let total = Number(per);
    adultPlug.onclick = function() {
        total = total + 1;
        document.querySelector(".form-control.adust").value = total;
    }
    var adultMinus = document.querySelector(".adust-minus");
    adultMinus.onclick = function() {
        if (total <= 0) total = total;
        else total = total - 1;
        document.querySelector(".form-control.adust").value = total;
    }

    var childrenPlug = document.querySelector(".children-plus");
    var chil = document.querySelector(".form-control.children").value;
    let totalChil = Number(chil);
    childrenPlug.onclick = function() {
        totalChil = totalChil + 1;
        document.querySelector(".form-control.children").value = totalChil;
    }
    var childrenMinus = document.querySelector(".children-minus");
    childrenMinus.onclick = function() {
        if (totalChil <= 0) totalChil = totalChil;
        else totalChil = totalChil - 1;
        document.querySelector(".form-control.children").value = totalChil;
    }

    var babyPlug = document.querySelector(".baby-plus");
    var baby = document.querySelector(".form-control.baby").value;
    let totalBaby = Number(baby);
    babyPlug.onclick = function() {
        totalBaby = totalBaby + 1;
        document.querySelector(".form-control.baby").value = totalBaby;
    }
    var babyMinus = document.querySelector(".baby-minus");
    babyMinus.onclick = function() {
        if (totalBaby <= 0) totalBaby = totalBaby;
        else totalBaby = totalBaby - 1;
        document.querySelector(".form-control.baby").value = totalBaby;
    }


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