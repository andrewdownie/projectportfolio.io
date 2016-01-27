<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Demo: AddPad</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS-->
    <link href="/css/navbar.css" rel="stylesheet">

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

    <style>
        p[contenteditable=true]:hover{
            background-color: #eee;
            max-width: 800px;
        }
        #blog-title{
            font-size: 30px;
            text-align: center;
        }

    </style>

    <script>
    $(document).ready(function(){

    });


    </script>


</head>

<body>

    <!-- Page Content -->
    <div class="container">
        <?php include "/var/www/projectportfolio/pagebars/navbar.php";?>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-2" style="position:fixed;">
                <div style="font-size: 20px;">Editor Tools</div>
                <?php include "/var/www/projectportfolio/html/components/addpad.html";?>
                <?php include "/var/www/projectportfolio/html/components/stylepad.html";?>
            </div>
            <div class="col-md-8 col-md-offset-2">
                <p id="blog-title" placeholder contenteditable="true">Page Title</p>
            </div>
            <div class="col-md-2"></div>

        </div>
    </div>



</body>

</html>
