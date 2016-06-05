<?php include("/var/www/projectportfolio/html/head.php"); ?>

<!-- PAGE SPECIFIC INFO -->
<title>Login - ProjectPortfolio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">

<!-- PAGE SPECIFIC CSS -->
<link href="/css/login.css" rel="stylesheet">
<link href="/css/styles.css" rel="stylesheet">

<!-- PAGE SPECIFIC JS -->
<script src="/js/functions/get_url_vars.js"></script>
<script src="/js/functions/valid_email.js"></script>
<script src="/js/functions/valid_password.js"></script>
<script src="/js/login.js"></script>



<!-- PAGE SPECIFIC OTHER -->

</head>

<body>

    <!-- Page Content -->
    <div class="container">
        <?php include "/var/www/projectportfolio/html/navbar/navbar.php";?>
    </div>

    <div class="container" id="login-signup">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
                <div id="verify-failure" class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Verification failed,</strong> you'll have to try signing up again :(
                </div>
                <div id="verify-success" class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Verification successful,</strong> You can now login to your account
                </div>
                <div id="verify-expired" class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Verification expired,</strong> you will have to signup again
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5" id="login">



                <div class="margin-left-30">
                    <h2>
                        <i class="fa fa-user"></i>
                        Login
                        <img id="login-loading" src="http://i.imgur.com/G0Ot284.gif"/>

                    </h2>

                    <div class="margin-left-30">
                        <h4>
                            <i class="fa fa-at"></i>
                            Email
                        </h4>
                        <input type="text" id="login-email" class="standard-input">
                        <h4>
                            <i class="fa fa-asterisk"></i>
                            Password
                        </h4>
                        <input type="password" id="login-password" class="standard-input">

                        <br/>
                        <button class="btn btn-primary simple-button" id="login-button">Login</button>


                        <div id="login-error">
                        </div>
                        <br>
                        <a href="#">Forgot password?</a>
                        <br>


                    </div>


                </div>


            </div>
            <div class="col-md-5" id="signup">
                <div  class="margin-left-30">
                    <h2>
                        <i class="fa fa-user-plus"></i>
                        Sign up
                        <img id="signup-loading" src="http://i.imgur.com/G0Ot284.gif"/>
                    </h2>

                    <div  class="margin-left-30">
                        <h4>
                            <i class="fa fa-at"></i>
                            Email
                        </h4>
                        <input id="signup-email" type="text" class="standard-input">
                        <h4>
                            <i class="fa fa-at"></i>
                            Confirm Email
                        </h4>
                        <input id="signup-confirm-email" type="text" class="standard-input">

                        <br/>
                        <button class="btn btn-primary simple-button" id="signup-button">Sign up</button>
                        <div id="signup-error">

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

</body>

</html>
