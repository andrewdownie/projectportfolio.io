
<?php include("head.php"); ?>

    <title>Login - ProjectPortfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <link href="/css/login.css" rel="stylesheet">
    <script src="/js/login.js"></script>

</head>

<body>

    <!-- Page Content -->
    <div class="container">
        <?php include "/var/www/projectportfolio/html/navbar/navbar.php";?>
    </div>

    <div class="container" id="login-signup">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5" id="login">

                <div style="margin-left: 30px;">
                    <h2>
                        <i class="fa fa-user"></i>
                        Login
                        <img id="login-loading" src="http://i.imgur.com/G0Ot284.gif"/>

                    </h2>
                    <div id="login-invalid-email-password">
                        Invalid email or password entered
                        <br> <span class="small">-- example login: user@example, pass: 123 --</span>
                    </div>
                    <div style="margin-left: 30px;">
                        <h4>
                            <i class="fa fa-at"></i>
                            Email
                        </h4>
                        <input type="text" id="login-email">
                        <h4>
                            <i class="fa fa-asterisk"></i>
                            Password
                        </h4>
                        <input type="password" id="login-password">

                        <br/>
                        <button class="btn btn-primary" id="login-button">Login</button>
                        <a href="#" style="padding-left: 8px;">Forgot password?</a>
                    </div>
                </div>


            </div>
            <div class="col-md-5" id="signup">
                <div style="margin-left: 30px;">
                    <h2>
                        <i class="fa fa-user-plus"></i>
                        Sign up
                        <img id="signup-loading" src="http://i.imgur.com/G0Ot284.gif"/>
                    </h2>

                    <div style="margin-left: 30px;">
                        <h4>
                            <i class="fa fa-at"></i>
                            Email
                        </h4>
                        <input id="signup-email" type="text">
                        <h4>
                            <i class="fa fa-at"></i>
                            Confirm Email
                        </h4>
                        <input id="signup-confirm-email" type="text">
                    <!--    <h4>
                            <i class="fa fa-asterisk"></i>
                            Password
                        </h4>
                        <input id="signup-password" type="password">-->
                        <br/>
                        <button class="btn btn-primary" id="signup-button">Sign up</button>
                        <div id="signup-emails-dont-match">
                            Emails must match
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

</body>

</html>
