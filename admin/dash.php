<?php
    session_start();
    if (isset($_SESSION['user']) == false) {
	    header('Location: http://localhost/Php-Travel/public/login.php');   
    }else {
        if (isset($_SESSION['login']) == true) {
            // Ngược lại nếu đã đăng nhập
            $permission = $_SESSION['login'];
            $user = $_SESSION["user"];
            // Kiểm tra quyền của người đó có phải là admin hay không
            if ($user != 'admin') {
                // Nếu không phải admin thì xuất thông báo
                // echo "Bạn không đủ quyền truy cập vào trang này<br>";
                // echo "<a href='http://localhost/Php-Travel/public/login.php'> Click để về lại trang chủ</a>";
                // exit();
                header("location: http://localhost/Php-Travel/public/index.php");
            }
        }
    }
    if (isset($_POST["logout"])){
        if (isset($_SESSION['login']) == true){
            unset($_SESSION["login"]);
        }
    }
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
</head>

<body>
    <div class="wrapper">
        <?php include("./header.php")
        ?>
        <div class="container">
            <?php include("./sidebar.php") ?>
            <div class="main">
                <div class="head">
                    <div class="user">
                        <div>New User</div>
                        <div>1234</div>
                    </div>
                    <div class="user">
                        <div>New User</div>
                        <div>1234</div>
                    </div>
                    <div class="user">
                        <div>New User</div>
                        <div>1234</div>
                    </div>
                    <div class="user">
                        <div>New User</div>
                        <div>1234</div>
                    </div>
                </div>
                <div class="table-list">
                    <div class="table-list-children">
                        <div class="card card-table">
                            <div class="card-header">
                                <!-- <div class="tools dropdown"> <span class="icon mdi mdi-download"></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class="icon mdi mdi-more-vert"></span></a>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" href="#">Action</a><a class="dropdown-item" href="#">Another action</a><a class="dropdown-item" href="#">Something else here</a>
                      <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Separated link</a>
                    </div>
                  </div> -->
                                <div class="title">Purchases</div>
                            </div>
                            <div class="card-body">
                                <table class="">
                                    <thead>
                                        <tr>
                                            <th style="width:40%;">Product</th>
                                            <th class="number">Price</th>
                                            <th style="width:20%;">Date</th>
                                            <th style="width:20%;">State</th>
                                            <th class="actions" style="width:5%;"></th>
                                        </tr>
                                    </thead>
                                    <tbody class="no-border-x">
                                        <tr>
                                            <td>Sony Xperia M4</td>
                                            <td class="number">$149</td>
                                            <td>Aug 23, 2018</td>
                                            <td class="text-success">Completed</td>
                                            <td class="actions"><a class="icon" href="#"><i
                                                        class="mdi mdi-plus-circle-o"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Apple iPhone 6</td>
                                            <td class="number">$535</td>
                                            <td>Aug 20, 2018</td>
                                            <td class="text-success">Completed</td>
                                            <td class="actions"><a class="icon" href="#"><i
                                                        class="mdi mdi-plus-circle-o"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Samsung Galaxy S7</td>
                                            <td class="number">$583</td>
                                            <td>Aug 18, 2018</td>
                                            <td class="text-warning">Pending</td>
                                            <td class="actions"><a class="icon" href="#"><i
                                                        class="mdi mdi-plus-circle-o"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>HTC One M9</td>
                                            <td class="number">$350</td>
                                            <td>Aug 15, 2018</td>
                                            <td class="text-warning">Pending</td>
                                            <td class="actions"><a class="icon" href="#"><i
                                                        class="mdi mdi-plus-circle-o"></i></a></td>
                                        </tr>
                                        <tr>
                                            <td>Sony Xperia Z5</td>
                                            <td class="number">$495</td>
                                            <td>Aug 13, 2018</td>
                                            <td class="text-danger">Cancelled</td>
                                            <td class="actions"><a class="icon" href="#"><i
                                                        class="mdi mdi-plus-circle-o"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>

</html>