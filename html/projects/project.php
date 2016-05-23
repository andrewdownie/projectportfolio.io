<?php include("/var/www/projectportfolio/html/head.php"); ?>

    <!-- PAGE SPECIFIC INFO -->
    <title>Verification Requried - ProjectPortfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <!-- PAGE SPECIFIC CSS -->

    <!-- PAGE SPECIFIC JS -->

    <!-- PAGE SPECIFIC OTHER -->

    <script>
    $(document).ready(function(){
        $("#project #back-to-projects").click(function(){
            window.location = "/projects/browse-projects"
        });
    });
    </script>
</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <?php include "/var/www/projectportfolio/html/navbar/navbar.php";?>
    </div>

    <div class="container" id="project">
        <button class="btn btn-link" id="back-to-projects"><h3><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Projects</h3></button>
        <br>
        view the project here,
        <br><br>
        here would be the title, dates, name of the owner
        <br><br>
        link to github; link to project specification
        <br><br>
        and then four cards of the latest blogs
        <br><br>
        four cards of the latest goals
        <br><br>
        four cards of the latest builds
        <br><br>
        there would be a link with each group of cards to view all cards of that type

    </div>
</body>
</html>
