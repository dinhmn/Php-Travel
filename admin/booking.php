<?php
  session_start();
  error_reporting();
  include("./config.php");
  
  

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
                    $pid = intval($_GET["pid"]);
                    $sql = "select * from tbl_tourpackages where PackageId=$pid";
                    $result = mysqli_query($connect, $sql); 
                    $row = mysqli_fetch_array($result);
                    // $result = $connect -> query($sql);
                    mysqli_close($connect);
                ?>
                <form action="" method="post" name="package" class="form-class" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="packageName">Package Name</label>
                        <input type="text" placeholder="Enter your package name..." id="packageName" name="packageName"
                            value="<?php echo($row["PackageName"]) ?>" />
                    </div>
                    <div class="form-group">
                        <label for="packageType">Package Type</label>
                        <input type="text" placeholder="Package Type eg- Family Package / Couple Package."
                            id="packageType" name="packageType" value="<?php echo($row["PackageType"]) ?>" />
                    </div>
                    <div class="form-group">
                        <label for="packageLocation">Package Location</label>
                        <input type="text" placeholder="Package Location" id="packageLocation" name="packageLocation"
                            value="<?php echo($row["PackageLocation"]) ?>" />
                    </div>
                    <div class="form-group">
                        <label for="packagePrice">Package Price in USD</label>
                        <input type="text" placeholder="Package price in USD" id="packagePrice" name="packagePrice"
                            value="<?php echo($row["PackagePrice"]) ?>" />
                    </div>
                    <div class="form-group">
                        <label for="packageFeatures">Package Features</label>
                        <input type="text" placeholder="Package Features" id="packageFeatures" name="packageFeatures"
                            value="<?php echo($row["PackageFetures"]) ?>" />
                    </div>
                    <div class="form-group">
                        <label for="packageDetail">Package Details</label>
                        <textarea name="packageDetail" id="summernote" cols="50" rows="5"
                            placeholder="Package Details"><?php echo($row["PackageDetails"]) ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="packageImage">Package Image</label>
                        <input type="file" placeholder="Package Image" id="packageImage" name="packageImage"
                            value="<?php echo($row["PackageImage"]) ?>" />
                        <?php
                            // if ($row["PackageImage"]){
                            //     echo "<input $row["PackageImage"]/>"
                            // }
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status">

                            <option value="1">On</option>
                            <option value="0">Off</option>
                        </select>
                    </div>
                    <div class="form-button">
                        <a href="manage-category.php"
                            style="width: 100px; background-color: blueviolet !important;"><button type="submit"
                                style="width: 100%; background-color: transparent;">Update</button></a>
                        <a href="manage-category.php"
                            style="width: 100px; background-color: rgb(180, 180, 180) !important;"><button type="button"
                                style="width: 100%; background-color: transparent;">Cancel</button></a>
                    </div>
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