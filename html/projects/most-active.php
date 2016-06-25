<?php
include("/var/www/projectportfolio/html/head.php");
?>

<!-- PAGE SPECIFIC INFO -->
<title>User - ProjectPortfolio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">

<!-- PAGE SPECIFIC INCLUDES -->
<link href="/css/login.css" rel="stylesheet">

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

        <ul class="nav nav-tabs">
            <li role="presentation"><a href="/user/username/projects">My Projects</a></li>
            <li role="presentation" class="active"><a href="/projects/most-active">Most Active</a></li>
            <li role="presentation"><a href="/projects/recent">Recent</a></li>
        </ul>


        <?php
        print_r($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']);
        echo "<br/>";
        print_r($_SERVER['QUERY_STRING']);
        ?>
    </div>
    <!-- /.container -->



</body>

</html>
