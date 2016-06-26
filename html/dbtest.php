<?php include("/var/www/projectportfolio/html/head.php"); ?>

<!-- PAGE SPECIFIC INFO -->
<title>DB Test - ProjectPortfolio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">

<!-- PAGE SPECIFIC CSS -->

<!-- PAGE SPECIFIC JS -->

<!-- PAGE SPECIFIC OTHER -->
<?php include "/etc/apache2/dbconf.php" ?>

</head>

<body>
    <?php include "/var/www/projectportfolio/html/nav/navbar.php";?>


    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h2>DB values here</h2>


                <?php
                // Create connection
                //echo getenv('database');
                //$meow = "meow this is meow";
                //echo $db_tbl;
                //$conn = new mysqli('dbtest.csrytxfcb9xf.us-east-1.rds.amazonaws.com', 'dbtest', 'db__test', 'dbtest');
                $conn = new mysqli($rds_url, $rds_usr, $rds_pwd, $rds_database);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * from " . $rds_testtable;
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "col1: " . $row["col1"]. "<br>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>

            </div>
        </div>

    </div>
    <!-- /.container -->



</body>

</html>
