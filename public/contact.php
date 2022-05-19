<?php
    session_start();
    error_reporting(0);
    include("../admin/config.php");


    $connect = mysqli_connect($serverName, $username, $password, $mydb);

    if (!$connect){
        die("Lỗi kết nối: " .mysqli_connect_error());
    }
    function is_email($str) {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }
    function is_phone($str) {
        return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
    }
    $error = array();
    $name ='';
    $email = '';
    $phone = '';
    $message = '';
    $data = array();
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // Lấy dữ liệu
        $name = isset($_POST['fname']) ? $_POST['fname'] : '';
        $email = isset($_POST['femail']) ? $_POST['femail'] : '';
        $phone = isset($_POST['fcontent']) ? $_POST['fcontent'] : '';
        $message = isset($_POST['fphone']) ? $_POST['fphone'] : '';
        if (empty($name)){
            $error['name'] = 'Bạn chưa nhập tên';
        }
        if (empty($email)){
            $error['email'] = 'Bạn chưa email';
        }
        else if (!is_email($email)){
            $error['email'] = 'Email không đúng định dạng';
        }
        if (empty($phone)){
            $error['phone'] = 'Bạn chưa nhập đúng định dạng điện thoại';
        } else if (preg_match('/^[0-9]{10}+$/', $phone)){
            $error['phone'] = 'Số điện thoại không đúng định dạng';
        }
        if (empty($message)){
            $error['message'] = 'Bạn chưa nhập nội dung';
        }
        // Lưu dữ liệu
        if (!$error){

            echo 'Dữ liệu có thể lưu trữ';
            $sql = "insert into tbl_contact(FullName, EmailId, MobileNumber, Subject,Description) values('$name', '$email', '$phone', '', '$message')";
            if(mysqli_query($connect, $sql)) {
                $msg = "Contact is successfully";
            }
        }
        else{
            echo 'Dữ liệu bị lỗi, không thể lưu trữ';
        }
    }
    mysqli_close($connect);
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
    <link rel="stylesheet" href="../src/css/search.css" />
    <link rel="stylesheet" href="/src/css/vote-star.css" />
    <link rel="stylesheet prefetch" href="https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" />
    <link rel="stylesheet" href="../src/css/tour-hap-dan.css" />
    <link rel="stylesheet" href="../src/css/nghi-duong-phu-quoc.css" />
    <link rel="stylesheet" href="../src/css/tour-hut-khach.css" />
    <link rel="stylesheet" href="../src/css/noi-tieng.css" />
    <link rel="stylesheet" href="../src/css/gt.css" />
    <link rel="stylesheet" href="../src/css/lienhe.css" />
    <!-- Import Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <?php include("./nav.php"); ?>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7838.684
                254869503!2d106.70676642475235!3d10.785086936675276!2m3!1f0!2f0!3f0!3m
                2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1547181657956" width="600" height="450" frameborder="0"
                    style="border: 0" allowfullscreen></iframe>
            </div>
            <div class="contact-form">
                <div class="form">
                    <form action="" id="form1" method="post">
                        <h1 class="h1">Contact us</h1>
                        <input type="text" id="fname" name="fname"
                            placeholder="Họ tên" /><?php echo isset($error['name']) ? $error['name'] : ''; ?><br />
                        <input type="text" id="femail" name="femail"
                            placeholder="Địa chỉ Email" /><?php echo isset($error['email']) ? $error['email'] : ''; ?><br />
                        <input type="text" id="fphone" name="fphone"
                            placeholder="Số điện thoại" /><?php echo isset($error['phone']) ? $error['phone'] : ''; ?><br />
                        <input type="text" id="fcontent" name="fcontent"
                            placeholder="Nội dung yêu cầu" /><?php echo isset($error['message']) ? $error['message'] : ''; ?><br />
                        <button type="submit" name="submit">Gửi yêu cầu</button>
                    </form>
                </div>
            </div>
            <?php include("./footer.php") ?>
        </div>
    </div>
    
</body>

</html>