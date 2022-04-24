<?php
    session_start();
    error_reporting(0);

    $name = '';
    $type = '';
    $location = '';
    $price = '';
    $feature = '';
    $detail = '';
    $image = '';
    $status = '';

    $newImage = '';

    // Connect Database
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $mydb = "travel";
    
    // Check File
    $target_dir = "D:/xampp/htdocs/Php-Travel/pimages/";
    // $target_file = $target_dir . basename($_FILES["packageImage"]["name"]);
    // $uploadOk = 1;
    // $imageFileType = strtolower(pathinfo($target_dir, PATHINFO_EXTENSION));
    

    $connect = mysqli_connect($serverName, $username, $password, $mydb);

    if (!$connect){
        die("Lỗi kết nối: " .mysqli_connect_error());
    }

    // Get value from form
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if (isset($_POST["packageName"])){
            $name = $_POST["packageName"];
        }
        if (isset($_POST["packageType"])){
            $type = $_POST["packageType"];
        }
        if (isset($_POST["packageLocation"])){
            $location = $_POST["packageLocation"];
        }
        if (isset($_POST["packagePrice"])){
            $price = $_POST["packagePrice"];
        }
        if (isset($_POST["packageFeatures"])){
            $feature = $_POST["packageFeatures"];
        }
        if (isset($_POST["packageDetail"])){
            $detail = $_POST["packageDetail"];
        }
        if (isset($_FILES["packageImage"])){
            // $target_dir = "D:/xampp/htdocs/Php-Travel/pimages/";
            // $target_file = $target_dir . basename($_FILES["packageImage"]["name"]);
            // $uploadOk = 1;
            // $imageFileType = strtolower(pathinfo($target_dir, PATHINFO_EXTENSION));
            // $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            $errors = [];
            $image = $_FILES["packageImage"];
            $allow_size = 30;
            $imageFile = $image["name"]; 
            $imageFile = explode(".", $imageFile);
            $ext = end($imageFile);
            $newImage = md5(uniqid()).'.'.$ext;
            $allow_ext = ['png', 'jpg', 'gif', 'jpeg'];
            
            if (in_array($ext, $allow_ext)){
                $size = $image["size"]/1024/1024;
                if($size <= $allow_size){
                    $upload = move_uploaded_file($image["tmp_name"], $target_dir.$newImage);
                    if (!$upload){
                        $errors[] = "upload_error";
                    }
                } else {
                    $errors[] = "size_error";
                }
            }else {
                $errors[] = "ext_error";
            }

        }
        
        if (isset($_POST["status"])){
            $status = $_POST["status"];
        }
    }


    if (!empty($errors)){
        $mess = '';
        if (in_array('ext_error', $errors)){
            $mess = "Dinh dang file khong hop le";
        } else if(in_array('size_error', $errors)){
            $mess = "Dung luong khong vuot qua".$allow_size.'MB';
        } else {
            $mess = "Ban khong the upload vao thoi diem nay";
        }
    }else {
        $sql = "INSERT INTO tbltourpackages(PackageName, PackageType, PackageLocation, PackagePrice, PackageFetures, PackageDetails, PackageImage, status) VALUES('$name', '$type', '$location', '$price', '$feature', '$detail', '$newImage', '$status')";
        // move_uploaded_file($_FILES["packageImage"]["tmp_name"], "D:/xampp/htdocs/Php-Travel/pimages/".$newImage["name"]);
        
        if (mysqli_query($connect, $sql)) {
            $msg="Package Created Successfully";
        } else {
            $errors="Something went wrong. Please try again";
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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Import CSS -->
    <link rel="stylesheet" href="../src/css/dashboard.css" />
    <link rel="stylesheet" href="../src/css/category.css" />
</head>

<body>
    <div class="wrapper">
        <div class="nav">
            <div class="logo">Admin</div>
            <div class="account">
                <img src="https://images.unsplash.com/photo-1649877756175-c41817130d13?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=739&q=80"
                    alt="" />
            </div>
        </div>
        <div class="container">
            <div class="sidebar">
                <h3 class="heading">Menu</h3>
                <ul>
                    <li>
                        <a href="#" class="active">
                            <i class="fa-solid fa-house"></i>
                            Dashboard</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-brands fa-youtube"></i>
                            Category</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-earth-asia"></i> Tour</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-phone"></i> Contact</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-calendar-check"></i> Page</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-plane"></i> Booking</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa-solid fa-briefcase"></i> Issues</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-user"></i>
                            User</a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            Logout</a>
                    </li>
                </ul>
            </div>

            <div class="main">
                <div class="href">
                    <a href="#">Home</a>
                    <span><i class="fa-solid fa-angle-right"></i> Package</span>
                </div>
                <form action="" method="post" name="package" class="form-class"  enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="packageName">Package Name</label>
                        <input type="text" placeholder="Enter your package name..." id="packageName"
                            name="packageName" />
                    </div>
                    <div class="form-group">
                        <label for="packageType">Package Type</label>
                        <input type="text" placeholder="Package Type eg- Family Package / Couple Package."
                            id="packageType" name="packageType" />
                    </div>
                    <div class="form-group">
                        <label for="packageLocation">Package Location</label>
                        <input type="text" placeholder="Package Location" id="packageLocation" name="packageLocation" />
                    </div>
                    <div class="form-group">
                        <label for="packagePrice">Package Price in USD</label>
                        <input type="text" placeholder="Package price in USD" id="packagePrice" name="packagePrice" />
                    </div>
                    <div class="form-group">
                        <label for="packageFeatures">Package Features</label>
                        <input type="text" placeholder="Package Features" id="packageFeatures" name="packageFeatures" />
                    </div>
                    <div class="form-group">
                        <label for="packageDetail">Package Details</label>
                        <textarea name="packageDetail" id="packageDetail" cols="50" rows="5"
                            placeholder="Package Details"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="packageImage">Package Image</label>
                        <input type="file" placeholder="Package Image" id="packageImage" name="packageImage" />
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="1">On</option>
                            <option value="0">Off</option>
                        </select>
                    </div>
                    <div class="form-button">
                        <button type="submit">Create</button>
                        <button type="reset">Cancel</button>
                    </div>
                </form>
                <?php
                echo ($imageFile);
                echo ($image);
                echo ($newImage);
                if($errors){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($errors); ?> </div><?php } 
                else if(!empty($mess)){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($mess); ?> </div><?php }
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }
                ?>
            </div>
        </div>
    </div>
</body>

</html>