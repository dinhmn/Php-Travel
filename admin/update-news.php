<?php
    // session_start();
    // error_reporting(0);
    // include("./permission.php");
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $mydb = "travel";
    
    $title = $desc = $status = '';
    $newImage = '';
    $image = '';
    $target_dir = "D:/xampp/htdocs/Php-Travel/pimages/";

    $connect = mysqli_connect($serverName, $username, $password, $mydb);
    
    if (!$connect){
        die("Lỗi kết nối: " .mysqli_connect_error());
    }
    // Get value from form
    if(isset($_POST['submit'])){
        if (isset($_POST["title"])){
            $title = $_POST["title"];
        }
        if (isset($_POST["description"])){
            $desc = $_POST["description"];
        }
        
        if (isset($_FILES["imgNews"])){
            $errors = [];
            $image = $_FILES["imgNews"];
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
        // move_uploaded_file($_FILES["packageImage"]["tmp_name"], "D:/xampp/htdocs/Php-Travel/pimages/".$newImage["name"]);
        $sql = "INSERT INTO tbl_news(title, description, image, status) VALUES('$title', '$desc','$newImage', '$status')";
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
                    <span><i class="fa-solid fa-angle-right"></i>News</span>
                </div>
                <form action="" method="post" name="package" class="form-class" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" placeholder="Enter your title..." id="title" name="title" />
                    </div>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" cols="50" rows="5" placeholder="description"
                            id="summernote"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="imgNews">Image</label>
                        <input type="file" placeholder="Package Image" id="imgNews" name="imgNews" />
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status">
                            <option value="1">On</option>
                            <option value="0">Off</option>
                        </select>
                    </div>
                    <input type="hidden" value="<?php echo ($rand); ?>" name="randcheck" />
                    <div class="form-button">
                        <button type="submit" name="submit">Create</button>
                        <button type="reset">Cancel</button>
                    </div>
                </form>

            </div>
        </div>
        <div class="footer">
            <div>Group 5</div>
        </div>
    </div>
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