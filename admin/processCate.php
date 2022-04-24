<?php
    $errors = [];
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