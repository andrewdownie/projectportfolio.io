<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PP: dbtest</title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <?php include "/var/www/projectportfolio/navbar/navbar.php";?>


    <!-- Page Content -->
    <div class="container">


    </div>
    <!-- /.container -->

    <div class="container">
        <div class="container">
            <?php include "/var/www/projectportfolio/html/navbar/navbar.php";?>
        </div>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <h2>DB values here</h2>


                    <?php
                        // Create connection
                        $conn = new mysqli('dbtest.csrytxfcb9xf.us-east-1.rds.amazonaws.com', 'dbtest', 'db__test', 'dbtest');
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT * from test_tbl";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo "testcol: " . $row["test_col"]. "<br>";
                            }
                        } else {
                            echo "0 results";
                        }
                        $conn->close();
                    ?>

                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->



</body>

</html>
