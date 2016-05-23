<?php include("/var/www/projectportfolio/html/head.php"); ?>

    <!-- PAGE SPECIFIC INFO -->
    <title>Verification Requried - ProjectPortfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <!-- PAGE SPECIFIC CSS -->

    <!-- PAGE SPECIFIC JS -->

    <!-- PAGE SPECIFIC OTHER -->

</head>

<body>

    <div class="container" >
        <div class="container">
            <?php include "/var/www/projectportfolio/html/navbar/navbar.php";?>
        </div>

        <div class="row" id="verify">
            <div class="col-lg-3"></div>

            <div class="col-lg-6">
                <div class="page-header">
                    <h1>Email verfication required</h1>
                </div>
                <p class="well"><strong>You must verify your email address before you can login.</strong></p>
                <p class="well">Didn't get the email? You'll have to <a href="/login">try signing up again.</a></p>
                <ul>
                    <li>Click the link in the email we sent you to verify your account</li>
                    <li>You will set your username and password when you verify your account</li>
                </ul>
            </div>

            <div class="col-lg-3"></div>
        </div>


    </div>
    <!-- /.container -->



</body>

</html>
