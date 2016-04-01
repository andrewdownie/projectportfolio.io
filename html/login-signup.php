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

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Hint.css for hover tooltip text -->
    <link rel="stylesheet" href="/css/hint.css">

    <!-- Custom CSS-->
    <link href="/css/navbar.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="/js/lib/jquery-2.2.0.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/lib/bootstrap.min.js"></script>


    <script src="/js/documentManipulation.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



    <script>
    $(document).ready(function(){


    });

    </script>

    <style>
        #login-signup{
            color: #444;
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
                    <h2>Login</h2>
                    <div style="margin-left: 30px;">
                        <h4>Username or email:</h4>
                        <input type="text">
                        <h4>Password:</h4>
                        <input type="password">
                        <br/>
                        <input type="submit" value="Login">
                        <a href="#" style="padding-left: 20px;">Forgot password?</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5" id="signup">
                <div style="margin-left: 30px;">
                <h2>Sign up</h2>
                    <div style="margin-left: 30px;">
                        <h4>Username:</h4>
                        <input type="text">
                        <h4>Email:</h4>
                        <input type="text">
                        <h4>Password:</h4>
                        <input type="password">
                        <br/>
                        <input type="submit" value="Sign up">
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

</body>

</html>
