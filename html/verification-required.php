<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ProjectPortfolio</title>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
