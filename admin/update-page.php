<?php
    session_start();
    
    // include("./permission.php");

    $serverName = "localhost";
    $username = "root";
    $password = "";
    $mydb = "travel";
    $pid = intval($_GET['pid']);
    $connect = mysqli_connect($serverName, $username, $password, $mydb);
    $type = $desc = $status = '';
    if (!$connect){
        die("Lỗi kết nối: " .mysqli_connect_error());
    }

    // Get value from form
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["type"])){
            $type = $_POST["type"];
        }
        if (isset($_POST["description"])){
            $desc = $_POST["description"];
        }
        if (isset($_POST["status"])){
            $status = $_POST["status"];
        }
    }
    $sql = "UPDATE tbl_pages set type = '$type', detail = '$desc', status='$status' where id = '$pid'";
    if (mysqli_query($connect, $sql)) {
        $msg="Package Created Successfully";
    } else {
        $errors="Something went wrong. Please try again";
    }
    unset($_POST);

    mysqli_close($connect);
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
        <?php
            include("./header.php")
        ?>
        <div class="container">
            <?php
            include("./sidebar.php")
            ?>
            <div class="main">
                <div class="href">
                    <a href="#">Home</a>
                    <span><i class="fa-solid fa-angle-right"></i>Pages</span>
                </div>
                <form action="" method="post" name="package" class="form-class">
                    <?php
                    $connect = mysqli_connect($serverName, $username, $password, $mydb);
                    $pid = intval($_GET["pid"]);
                    $sql = "select * from tbl_pages where id=$pid";
                    echo ($sql);
                    $result = mysqli_query($connect, $sql); 
                    $row = mysqli_fetch_array($result);
                    // $result = $connect -> query($sql);
                    
                    ?>

                    <div class="form-group">
                        <label for="type">Type</label>
                        <input type="text" placeholder="Enter your location..." id="type" name="type"
                            value="<?php echo($row["type"]); ?>" />
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" cols="50" rows="5" placeholder="description"
                            id="summernote"><?php echo($row["detail"]); ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="1">On</option>
                            <option value="0">Off</option>
                        </select>
                    </div>
                    <div class="form-button">
                        <a href="manage-page.php" style="width: 100px; background-color: blueviolet !important;"><button
                                type="submit" style="width: 100%; background-color: transparent;">Update</button></a>
                        <a href="manage-page.php"
                            style="width: 100px; background-color: rgb(180, 180, 180) !important;"><button type="button"
                                style="width: 100%; background-color: transparent;">Cancel</button></a>
                        <?php mysqli_close($connect); ?>
                    </div>
                </form>

            </div>
        </div>
        <div class="footer">
            <div>Group 5</div>
        </div>
    </div>
    <!-- <script type="text/javascript">
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script> -->
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