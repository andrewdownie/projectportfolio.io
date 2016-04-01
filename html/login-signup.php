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

        #login-signup .row .col-md-5{
            min-height: 250px;
            height: 250px;
        }

        @media (max-width: 767px){

        }
        @media (min-width: 982px){
            #login-signup #signup{
                border-left: solid #555 1px;
            }
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
                <h2>Login</h2>
            </div>
            <div class="col-md-5" id="signup">
                <h2>Sign up</h2>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

</body>

</html>
