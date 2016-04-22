<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editor: ProjectPortfolio</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Hint.css for hover tooltip text -->
    <link rel="stylesheet" href="/css/hint.css">

    <!-- Custom CSS-->
    <link href="/css/navbar.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">

    <!-- REQUIRED INCLUDES (SHOULD BE IN NAV BAR)
    <script src="/js/lib/jquery-2.2.0.min.js"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <script src="/js/lib/bootstrap.min.js"></script>-->

    <script src="/js/lib/jquery-2.2.0.min.js"></script>
    <script src="/js/documentManipulation.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



    <script>
    $(document).ready(function(){
        //$("#login-signup i").toggle({ effect: "scale", direction: "horizontal" })

    });

    </script>

    <style>
        #login-signup{
            color: #444;
        }

        #login-signup i{
        /*    display: none;
            box-sizing: border-box;*/

        }

        #login-signup button{
            color: black;
            background-color: #F0F0F0;
            border: none;
            padding: 4px 10px;
        }
        #login-signup button:hover{
            background-color: #D0D0D0;
        }

        #login-signup .row #signup{
            min-height: 350px;
            height: 350px;
        }

        @media (max-width: 981px){
            #login-signup #signup{
                padding-top: 10px;
                border-top: 1px #c0c0c0 solid;
            }
            #login-signup #login{
                padding-bottom: 30px;
            }
        }
        @media (min-width: 982px){
            #login-signup #signup{
                border-left: solid #bcbcbc 1px;
            }
        }

        #login-signup h2{
            padding-bottom: 20px;
        }
        #login-signup h4{
            margin-bottom: 3px;
        }
        #login-signup input[type="text"],
        #login-signup input[type="password"]{
            margin-bottom: 10px;
            border: #999 1px solid;
            width: 190px;
            height: 25px;
        }

    </style>
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
                        <i class="fa fa-sign-in"></i>

                        Login
                    </h2>
                    <div style="margin-left: 30px;">
                        <h4>
                            <i class="fa fa-user"></i>
                            Username or email
                        </h4>
                        <input type="text">
                        <h4>
                            <i class="fa fa-asterisk"></i>
                            Password
                        </h4>
                        <input type="password">
                        <br/>
                        <button>Login</button>
                        <a href="#" style="padding-left: 20px;">Forgot password?</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5" id="signup">
                <div style="margin-left: 30px;">
                <h2>
                    <i class="fa fa-user-plus"></i>
                    Sign up
                </h2>
                    <div style="margin-left: 30px;">
                        <h4>
                            <i class="fa fa-user"></i>
                            Username
                        </h4>
                        <input type="text">
                        <h4>
                            <i class="fa fa-at"></i>
                            Email
                        </h4>
                        <input type="text">
                        <h4>
                            <i class="fa fa-asterisk"></i>
                            Password
                        </h4>
                        <input type="password">
                        <br/>
                        <button>Sign up</button>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

</body>

</html>
