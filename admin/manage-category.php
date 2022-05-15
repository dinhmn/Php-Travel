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
                    <span><i class="fa-solid fa-angle-right"></i> Manage Package</span>
                </div>
                <div class="href">
                    <h2>Manage Package</h2>
                </div>
                <button style="" class="href">
                    <a href="../admin/create-category.php"
                        style="padding: 20px 50px;background-color: greenyellow; color: purple;">Add
                        tour travel</a>
                </button>
                <div class="table">
                    <div class="table-info">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Location</th>
                                    <th>Price</th>
                                    <th>Creation Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                              $connect = mysqli_connect($serverName, $username, $password, $mydb);
                              $sql = "select * from tbl_tourpackages where 1 =1";
                              $results = mysqli_query($connect, $sql); 
                              mysqli_fetch_all($results, MYSQLI_ASSOC);
                              // $result = $connect -> query($sql);
                              $cnt=1;
                              
                              foreach($results as $row){
                              // while($row = $result ->fetch_assoc()){
                            ?>
                                <tr>
                                    <td><?php echo ($cnt);?></td>
                                    <td><?php echo ($row["PackageName"]);?></td>
                                    <td><?php echo ($row["PackageType"]);?></td>
                                    <td>
                                        <?php echo ($row["PackageLocation"]);?>
                                    </td>
                                    <td>$<?php echo ($row["PackagePrice"]);?></td>
                                    <td><?php echo ($row["Creationdate"]);?></td>
                                    <td>
                                        <a href="update-category.php?pid=<?php echo ($row["PackageId"]);?>"><button
                                                type="button" class="btn btn-primary btn-block">
                                                View
                                            </button>
                                        </a>
                                        <a href="delete.php?pid=<?php echo ($row["PackageId"]);?>"><button type="button"
                                                style="background-color: red; color: white;"
                                                class="btn btn-primary btn-block">
                                                Delete
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