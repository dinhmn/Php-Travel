<?php
  session_start();
  error_reporting();
  include("./config.php");
  $confirm = '';
  $bid = intval($_GET["bid"]);
  $connect = mysqli_connect($serverName, $username, $password, $mydb);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST["confirm"])){
            $confirm = $_POST["confirm"];
        }
    }
    /*$sql = "UPDATE tbl_booking set CancelledBy = '$confirm' where BookingId = $bid";
    // $result = mysqli_query($connect, $sql);
    if (mysqli_query($connect, $sql)){
        $msg="Update Successfully";
    }else {
        $errors="Something went wrong. Please try again";
    }*/
    mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- include summernote css/js -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- Import CSS -->
    <link rel="stylesheet" href="../src/css/dashboard.css" />
    <link rel="stylesheet" href="../src/css/category.css" />
</head>


<body>
    <div class="wrapper">
        <?php include("./header.php") ?>
        <div class="container">
            <?php include("./sidebar.php")?>
            <div class="main">
                <div class="href">
                    <a href="#">Home</a>
                    <span><i class="fa-solid fa-angle-right"></i>Booking</span>
                </div>
                <div class="href">
                    <h2>Booking</h2>
                </div>
                <?php
                    $connect = mysqli_connect($serverName, $username, $password, $mydb);
                    $bid = intval($_GET["bid"]);
                    $sql = "select * from tbl_booking where BookingId=$bid";
                    $result = mysqli_query($connect, $sql); 
                    $row = mysqli_fetch_array($result);
                    $id = $row["PackageId"];
                   
                ?>
                <form action="" method="post" name="package" class="form-class" enctype="multipart/form-data">
                    <div class="form-group" style="display: flex;">
                        <b>Name</b>
                        <span><?php echo($row["FullName"]) ?></span>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <b>Email</b>
                        <span><?php echo($row["UserEmail"]) ?></span>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <b>Ngày đi</b>
                        <span><?php echo($row["FromDate"]) ?></span>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <b>Ngày sinh</b>
                        <span><?php echo($row["dateOfBirth"]) ?></span>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <b>Phone</b>
                        <span><?php echo($row["Phone"]) ?></span>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <b>Address</b>
                        <span><?php echo($row["Address"]) ?></span>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <b>Nguoi Lon</b>
                        <span><?php echo($row["NguoiLon"]) ?></span>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <b>Tre Em</b>
                        <span><?php echo($row["TreEm"]) ?></span>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <b>Tre Nho</b>
                        <span><?php echo($row["TreNho"]) ?></span>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <b>Room</b>
                        <span><?php echo($row["Room"]) ?></span>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <b>Giới tính</b>
                        <span><?php echo($row["Sex"]) ?></span>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <b>Message</b>
                        <span><?php echo($row["Message"]) ?></span>
                    </div>
                    <div class="form-group" style="display: flex;">
                        <b>Giá tiền</b>
                        <span><?php echo($row["price"]) ?></span>
                    </div>
                    <?php
                        $sql1 = "select * from tbl_tourpackages where PackageId=$id";
                        $result1 = mysqli_query($connect, $sql1); 
                        $row1 = mysqli_fetch_array($result1);
                    ?>
                    <div class="form-group" style="display: flex;">
                        <b>Tour</b>
                        <span><?php echo($row1["PackageName"]); ?></span>
                    </div>
                    <h2>Các thành viên của đơn đăng ký này</h2>
                    <table style="border: 1px solid black;">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Name</th>
                                    <th>Age</th>
                                </tr>
                            </thead>

                            <tbody>
                            <?php
                              $connect = mysqli_connect($serverName, $username, $password, $mydb);
                              $bid = intval($_GET["bid"]);
                              $sql = "select * from tbl_tourist where BookingId = $bid";
                              
                              $results = mysqli_query($connect, $sql); 
                              mysqli_fetch_all($results, MYSQLI_ASSOC);
                              // $result = $connect -> query($sql);
                            //   $sqlPackage = "select PackageName from tbltourpackages where 1 = 1 and $results.";
                              $cnt=1;
                              
                              foreach($results as $row){
                              // while($row = $result ->fetch_assoc()){
                                ?>
                                <tr>
                                    <td><?php echo ($cnt);?></td>
                                    <td><?php echo ($row["Fullname"]);?></td>
                                    <td><?php echo ($row["Age"]);?></td>
                                </tr>
                                <?php 
                                $cnt=$cnt+1;
                                } 
                                
                                ?>
                            </tbody>
                        </table>
                    <!-- <div class="form-group">
                        <label for="confirm">Confirm</label>
                        <select name="confirm" id="confirm">
                            <option value="Confirm">Confirm</option>
                            <option value="Cancel">Cancel</option>
                        </select>
                    </div>
                    <div class="form-button">
                        <a href="manage-booking.php"
                            style="width: 100px; background-color: rgb(180, 180, 180) !important;"><button type="submit"
                                style="width: 100%; background-color: transparent;">Submit</button></a>
                    </div> -->
                    <?php  mysqli_close($connect); ?>
                </form>
            </div>
        </div>
    </div>
    <script>
    function handleClick(e) {
        // e.preventDefault();
        // console.log(1);
    }
    </script>
    <script>
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
    </script>
</body>

</html>