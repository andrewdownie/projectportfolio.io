<head>

    <!-- PAGE SPECIFIC INFO -->
    <title>Verification Requried - ProjectPortfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <!-- PAGE SPECIFIC CSS -->
    <link href="/css/navbar.css" rel="stylesheet">

    <!-- PAGE SPECIFIC JS -->
    <script src="/js/navbar/logout.js"></script>

    <!-- PAGE SPECIFIC OTHER -->

</head>


<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="border-bottom: 1px solid white; z-index: 100000;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="/">ProjectPortfolio</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <!-- Search area -->
                <!--<div class="col-sm-3 col-md-3 pull-left">
                <form class="navbar-form" role="search">
                <div class="input-group input-group-sm">
                <div class="input-group-btn">
                <button class="btn btn-search" type="submit"><i class="glyphicon glyphicon-search"></i></button>
            </div>
            <input type="text" class="form-control search-box" placeholder="Search..." name="srch-term" id="srch-term">

        </div>
    </form>
</div>-->

<ul class="nav navbar-nav  pull-left">
    <!--<li>
    <a href="#">Top Rated</a>
</li>-->
<li>
    <a href="/dbtest">Database test</a>
</li>
<li>
    <a href="/editor">Editor</a>
</li>
<li>
    <!-- TODO: if logged in go to my projects -->
    <a href="/projects/most-active">Projects</a>
    <!-- TODO: if not logged in got to most recent -->
</li>
</ul>

<div class="pull-right">
    <ul class="nav navbar-nav">


        <?php //TODO: move this to a php includes
        if(isset($_COOKIE['LOGGED_IN'])){
            echo '<li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">';

            echo $_COOKIE['LOGGED_IN']."&nbsp;";

            echo '<span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li><a href="/account">Account</a></li>
            <li role="separator" class="divider"></li>
            <li><a id="navbar-logout" href="#">Logout</a></li>
            </ul>
            </li>';
        }
        else{
            echo "<li><a href='/login'>Login</a></li>";
        }
        ?>


    </ul>
</div>
</div>
<!-- /.navbar-collapse -->
</div>
<!-- /.container -->
</nav>

</body>

</html>
