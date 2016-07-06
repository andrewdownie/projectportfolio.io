<?php
include("/var/www/projectportfolio/html/head.php");
?>

<!-- PAGE SPECIFIC INFO -->
<title>User - ProjectPortfolio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">

<!-- PAGE SPECIFIC CSS -->

<!-- JAVASCRIPT FUNCTIONS -->
<script src="/js/functions/time_stampify.js"></script>
<script src="/js/functions/get_resource_name.js"></script>
<script src="/js/functions/build_blog_header.js"></script>
<script src="/js/functions/build_blog_body.js"></script>

<!-- PAGE SPECIFIC JS -->
<script src="/js/projects/all-blogs.js"></script>

<!-- PAGE SPECIFIC OTHER -->
</head>

<body id="all-blogs">
    <?php include "/var/www/projectportfolio/html/nav/navbar.php";?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <h1>
                        <span id="project-title"></span>
                        <small>blogs</small>
                    </h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div id="blog-insertion-point">
            </div>
            <!-- somehow the below does not work... -->
            <div class="col-md-10">poo</div>
            <div class="col-md-2">butt</div>
        </div>

    </div>
    <!-- /.container -->



</body>

</html>
