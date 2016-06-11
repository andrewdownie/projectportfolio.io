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
#verify-error{
    color: red;
}
</style>

<!-- PAGE SPECIFIC JS -->
<script src="/js/functions/valid_username.js"></script>
<script src="/js/functions/valid_password.js"></script>
<script src="/js/functions/get_url_vars.js"></script>
<script src="/js/verify.js"></script>

<!-- PAGE SPECIFIC OTHER -->

</head>

<body>

    <!-- Page Content -->
    <div class="container">
        <?php include "/var/www/projectportfolio/html/navbar/navbar.php";?>
    </div>
    <div class="row" id="verify">
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
                        <i class="fa fa-tag"></i>
                        Set Username
                    </h4>
                    <input type="text" id="verify-username" class="standard-input">
                    <h4>
                        <i class="fa fa-asterisk"></i>
                        Set Password
                    </h4>
                    <input type="password" id="verify-password" class="standard-input">

                    <br/>
                    <button class="btn btn-primary simple-button" id="verify-button">Complete</button>


                    <div id="verify-error">
                    </div>


                </div>

            </div>
        </div>

        <div class="col-lg-3">
        </div>
    </div>



</body>

</html>
