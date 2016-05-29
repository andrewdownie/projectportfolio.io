<?php include("/var/www/projectportfolio/html/head.php"); ?>

<!-- PAGE SPECIFIC INFO -->
<title>Verify Account - ProjectPortfolio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">

<!-- PAGE SPECIFIC CSS -->
<style>
#verify-loading{
    display: none;
}
</style>

<!-- PAGE SPECIFIC JS -->

<!-- PAGE SPECIFIC OTHER -->

</head>

<body>

    <!-- Page Content -->
    <div class="container">
        <?php include "/var/www/projectportfolio/html/navbar/navbar.php";?>
    </div>
    <div class="row">
        <div class="col-lg-3">
        </div>

        <div class="col-lg-6">
            <p class="well">To complete account setup, please choose a username and password</p>
            <div class="margin-left-30">
                <h2>
                    <i class="fa fa-user"></i>
                    Complete account setup
                    <img id="verify-loading" src="http://i.imgur.com/G0Ot284.gif"/>

                </h2>
                <div class="margin-left-30">
                    <h4>
                        <i class="fa fa-at"></i>
                        Username
                    </h4>
                    <input type="text" id="login-email" class="standard-input">
                    <h4>
                        <i class="fa fa-asterisk"></i>
                        Password
                    </h4>
                    <input type="password" id="login-password" class="standard-input">

                    <br/>
                    <button class="btn btn-primary simple-button" id="login-button">Complete</button>


                    <div id="login-error">
                    </div>
                    <br>
                    <a href="#">Forgot password?</a>
                    <br>


                </div>

            </div>
        </div>

        <div class="col-lg-3">
        </div>
    </div>



</body>

</html>
