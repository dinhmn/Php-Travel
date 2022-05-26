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
                    <span><i class="fa-solid fa-angle-right"></i> Manage News</span>
                </div>
                <div class="href">
                    <h2>Manage News</h2>
                </div>
                <button style="" class="href">
                    <a href="../admin/create-news.php"
                        style="padding: 20px 50px;background-color: greenyellow; color: purple;">Create News</a>
                </button>
                <div class="table">
                    <div class="table-info">
                        <table>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                              $connect = mysqli_connect($serverName, $username, $password, $mydb);
                              $sql = "select * from tbl_news where 1 =1";
                              $results = mysqli_query($connect, $sql); 
                              mysqli_fetch_all($results, MYSQLI_ASSOC);
                              // $result = $connect -> query($sql);
                              $cnt=1;
                              
                              foreach($results as $row){
                            ?>
                                <tr>
                                    <td><?php echo ($cnt);?></td>
                                    <td><?php echo ($row["title"]);?></td>
                                    <td>
                                        <a href="update-news.php?pid=<?php echo ($row["id"]);?>"><button type="button"
                                                class="btn btn-primary btn-block">
                                                View
                                            </button>
                                        </a>
                                        <a href="delete-news.php?pid=<?php echo ($row["id"]); ?>"><button type="button"
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