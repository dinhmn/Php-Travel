<?php
  session_start();
  error_reporting();
  include("./config.php");
    include("./permission.php");


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
    <link rel="stylesheet" href="../src/css/manage-category.css" />
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
                    <span><i class="fa-solid fa-angle-right"></i> Manage Booking</span>
                </div>
                <div class="href">
                    <h2>Manage Booking</h2>
                </div>
                <div class="table">
                    <div class="table-info">
                        <table>
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Package</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>From</th>
                                    <th>Birthday</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Nguoi Lon</th>
                                    <th>Tre Em</th>
                                    <th>Tre Nho</th>
                                    <th>Room</th>
                                    <th>Sex</th>
                                    <th>Message</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                              $connect = mysqli_connect($serverName, $username, $password, $mydb);
                              $sql = "select * from tbl_booking where 1 =1";
                              
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
                                    <td><?php
                                    $connect = mysqli_connect($serverName, $username, $password, $mydb);
                                    $id = $row["PackageId"];
                                    // echo ($id);
                                    $sqlPackage = "select PackageName from tbl_tourpackages where 1 = 1 and PackageId=$id";
                                    $result = mysqli_query($connect, $sqlPackage);
                                    mysqli_fetch_array($result, MYSQLI_ASSOC);
                                    foreach($result as $ro){
                                        echo ($ro["PackageName"]);
                                    }
                                    
                                    ?></td>
                                    <td><?php echo ($row["FullName"]);?></td>
                                    <td><?php echo ($row["UserEmail"]);?></td>
                                    <td>
                                        <?php echo ($row["FromDate"]);?>
                                    </td>
                                    <td><?php echo ($row["dateOfBirth"]);?></td>
                                    <td><?php echo ($row["Phone"]);?></td>
                                    <td><?php echo ($row["Address"]);?></td>
                                    <td><?php echo ($row["NguoiLon"]);?></td>
                                    <td><?php echo ($row["TreEm"]);?></td>
                                    <td><?php echo ($row["TreNho"]);?></td>
                                    <td><?php echo ($row["Room"]);?></td>
                                    <td><?php echo ($row["Sex"]);?></td>
                                    <td><?php echo ($row["Message"]);?></td>
                                    <td><?php echo ($row["price"]);?></td>
                                    <td>
                                        <a href="booking.php?bid=<?php echo ($row["BookingId"]);?>"><button
                                                type="button" class="btn btn-primary btn-block">
                                                View
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                $cnt=$cnt+1;} 
                                mysqli_close($connect);
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
            <div>Group 5</div>
        </div>
    </div>
</body>

</html>