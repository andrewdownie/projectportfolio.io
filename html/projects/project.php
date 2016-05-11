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


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



    <script>
    $(document).ready(function(){
        $("#project #back-to-projects").click(function(){
            window.location = "/projects/browse-projects"
        });
    });
    </script>

    <style>

    </style>
</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <?php include "/var/www/projectportfolio/html/navbar/navbar.php";?>
    </div>

    <div class="container" id="project">
        <button class="btn btn-link" id="back-to-projects"><h3><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;Projects</h3></button>
        <br>
        view the project here,
        <br><br>
        here would be the title, dates, name of the owner
        <br><br>
        link to github; link to project specification
        <br><br>
        and then four cards of the latest blogs
        <br><br>
        four cards of the latest goals
        <br><br>
        four cards of the latest builds
        <br><br>
        there would be a link with each group of cards to view all cards of that type

    </div>
</body>
</html>
