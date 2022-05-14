<?php
  session_start();
  error_reporting();
  include("./config.php");
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

  
  // Check File
  $target_dir = "D:/xampp/htdocs/Php-Travel/pimages/";
  // $target_file = $target_dir . basename($_FILES["packageImage"]["name"]);
  // $uploadOk = 1;
  // $imageFileType = strtolower(pathinfo($target_dir, PATHINFO_EXTENSION));
  

  $connect = mysqli_connect($serverName, $username, $password, $mydb);

  if (!$connect){
      die("Lỗi kết nối: " .mysqli_connect_error());
  }
  $pid=intval($_GET['pid']);
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
      $sql = "UPDATE tbl_tourpackages set PackageName = '$name', PackageType = '$type', PackageLocation = '$location', PackagePrice = $price, PackageFetures = '$feature', PackageDetails = '$detail', PackageImage = '$newImage', status = $status where PackageId = $pid;";
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                    <span><i class="fa-solid fa-angle-right"></i> Update Package</span>
                </div>
                <div class="href">
                    <h2>Update Package</h2>
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
                        <textarea name="packageDetail" id="packageDetail" cols="50" rows="5"
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
</body>

</html>