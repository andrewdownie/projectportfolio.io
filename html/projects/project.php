<?php include("/var/www/projectportfolio/html/head.php"); ?>

<!-- PAGE SPECIFIC INFO -->
<title>User - ProjectPortfolio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">

<!-- PAGE SPECIFIC CSS -->
<link href="/css/project.css" rel="stylesheet">
<link href="/css/login.css" rel="stylesheet">

<!-- PAGE SPECIFIC JS FUNCTIONS -->
<script src="/js/functions/get_resource_name.js"></script>
<script src="/js/functions/time_stampify.js"></script>
<script src="/js/functions/build_blog_skeleton.js"></script>
<script src="/js/functions/fill_blog_body.js"></script>
<script src="/js/functions/read_cookie.js"></script>


<!-- PAGE SPECIFIC JS -->
<script src="/js/projects/project.js"></script>

<!-- PAGE SPECIFIC OTHER -->

</head>

<body id="project">
    <?php include "/var/www/projectportfolio/html/nav/navbar.php";?>


    <!-- Page Content -->
    <div class="container">


    </div>
    <!-- /.container -->

    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <h1 id="page-title">One specific project</h1>
                <strong>
                    Created:&nbsp;<span id="created"></span>
                    &nbsp;&nbsp;
                    Modified:&nbsp;<span id="modified"></span>
                </strong>
                <div id="spec-link">
                    Spec Link:&nbsp;<a></a>
                </div>
                <div class="white-space-50"></div>




                <h2>
                    Most Recent Blogs
                </h2>
                <div id="blogs-insert-point">
                    
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->



</body>

</html>
