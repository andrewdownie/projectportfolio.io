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

        .editortools-topspace{
            padding-top: 100px;
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
            <div class="col-sm-2" style="position:fixed;">
                <div style="font-size: 16px;" class="visible-sm">Editor Tools</div>
                <div style="font-size: 20px;" class="hidden-sm">Editor Tools</div>

                <?php include "/var/www/projectportfolio/html/editor-tools/addpad.html";?>
                <div class="visible-lg">
                    <!--this is used to stack the pads vertically when the screen is large-->
                </div>
                <?php include "/var/www/projectportfolio/html/editor-tools/stylepad.html";?>
                <div class="visible-lg">
                    <!--this is used to stack the pads vertically when the screen is large-->
                </div>
                <?php include "/var/www/projectportfolio/html/editor-tools/blogpad.html";?>
            </div>

            <span class="visible-xs hidden-sm-up">
                <div class="editortools-topspace"><hr/></div>
            </span>

            <div class="col-md-8 col-sm-10 col-xs-12 col-sm-push-2">
                <p id="blog-title" placeholder contenteditable="true">Page Title</p>
            </div>

        </div>
    </div>



</body>

</html>
