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
    $adust = $_SESSION["totalAdust"];
    $baby = $_SESSION["totalBaby"];
    $children = $_SESSION["totalChildren"];
    $date = $_SESSION["date"];
    $guest = $_SESSION["guest"];
    $tour = $_SESSION["tour"];
    $fullname = $email = $phone = $address = $count = $room = $dateOfBirth = $sex = $message = '';
    for ($i=0; $i < $adust; $i++) { 
        $adust = $_POST["adust$i"];
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
                    <h2>Nhập thông tin người tham gia </h2>
                    <h3>Thông tin liên lạc người lớn (>12 tuổi)</h3>
                    <div class="customer-contact mb-3">
                        <?php
                            for ($i=0; $i < $adust; $i++) {
                        ?>
                        <div class="customer-contact-inner"
                            style="display: flex; justify-content: flex-start; gap: 50px; padding: 0 25px;">
                            <div style="width: 400px;">
                                <label>Người lớn: </label>
                                <input class="form-control" type="text" key="<?php echo ($value); ?>"
                                    name="adust<?php echo ($i) ?>">
                            </div>
                            <div class="addess" style="width: 200px;">
                                <label>Ngày sinh</label>
                                <input class="form-control" id="dateof" name="dateofAdust<?php echo ($i) ?>"
                                    type="date">
                            </div>
                            <div class="addess" style="width: 200px;">
                                <label>Sex</label>
                                <select class="form-control" name="sexAdust<?php echo ($i) ?>" id="sex"
                                    style="padding: 3px 10px; width: 100%;">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <?php $cnt++; } ?>
                    </div>
                    <h3>Thông tin liên lạc trẻ nhỏ (5-11 tuổi)</h3>
                    <div class="customer-contact mb-3">
                        <?php
                            for ($i=0; $i < $children; $i++) {
                        ?>
                        <div class="customer-contact-inner"
                            style="display: flex; justify-content: flex-start; gap: 50px; padding: 0 25px;">
                            <div style="width: 400px;">
                                <label>Trẻ nhỏ: </label>
                                <input class="form-control" type="text" key="<?php echo ($value); ?>"
                                    name="children<?php echo ($i); ?>">
                            </div>
                            <div class="addess" style="width: 200px;">
                                <label>Ngày sinh</label>
                                <input class="form-control" id="dateof" name="dateofChildren<?php echo ($i); ?>"
                                    type="date" value="">
                            </div>
                            <div class="addess" style="width: 200px;">
                                <label>Sex</label>
                                <select class="form-control" name="sex" id="sexChildren<?php echo ($i); ?>"
                                    value="baby<?php echo($_SESSION["sex"]); ?>"
                                    style="padding: 3px 10px; width: 100%;">
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <?php $cnt++; } ?>
                    </div>
                    <h3>Thông tin liên lạc trẻ em(< 5 tuổi)</h3>
                            <div class="customer-contact mb-3">
                                <?php
                            for ($i=0; $i < $baby; $i++) {
                        ?>
                                <div class="customer-contact-inner"
                                    style="display: flex; justify-content: flex-start; gap: 50px; padding: 0 25px;">
                                    <div style="width: 400px;">
                                        <label>Trẻ em: </label>
                                        <input class="form-control" type="text" key="<?php echo ($value); ?>"
                                            name="baby<?php echo ($i) ?>">
                                    </div>
                                    <div class="addess" style="width: 200px;">
                                        <label>Ngày sinh</label>
                                        <input class="form-control" id="dateof" name="dateofBaby<?php echo ($i) ?>"
                                            type="date">
                                    </div>
                                    <div class="addess" style="width: 200px;">
                                        <label>Sex</label>
                                        <select class="form-control" name="sexBaby<?php echo ($i) ?>" id="sex"
                                            style="padding: 3px 10px; width: 100%;">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <?php $cnt++; } ?>
                                <div class="order" style="width: 100%;">
                                    <button type="submit" class="btn btn-primary btn-order" name="submit">Kiểm
                                        tra</button>
                                </div>
                            </div>

                </form>
            </section>
        </div>
    </div>
    <script type="text/javascript">
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