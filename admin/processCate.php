<?php

    // Const Form
    $name = '';
    $type = '';
    $location = '';
    $price = '';
    $feature = '';
    $detail = '';
    $image = '';
    $status = '';


    // Connect Database
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $mydb = "travel";
    
    

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
        if (isset($_POST["packageImage"])){
            $image = $_POST["packageImage"];
        }
        if (isset($_POST["status"])){
            $status = $_POST["status"];
        }
    }

    $sql = "INSERT INTO tbltourpackages(PackageName, PackageType, PackageLocation, PackagePrice, PackageFetures, PackageDetails, PackageImage, status) VALUES('$name', '$type', '$location', '$price', '$feature', '$detail', '$image', '$status')";
    // $sql = "INSERT INTO tbltourpackages(PackageName, PackageType, PackageLocation, PackagePrice, PackageFetures, PackageDetails, PackageImage, status) VALUES('ss', 'ss', 'ss', 'ss', 'ss', 'ss', 'ss', '1')";
    if (mysqli_query($connect, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    echo "Ket noi thanh cong ";
    mysqli_close($connect);
?>
