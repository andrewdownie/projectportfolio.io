<?php
include("/var/www/projectportfolio/html/head.php");
?>

<!-- PAGE SPECIFIC INFO -->
<title>User - ProjectPortfolio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">

<!-- PAGE SPECIFIC CSS -->
<link href="/css/all-blogs.css" rel="stylesheet">

<!-- JAVASCRIPT FUNCTIONS -->
<script src="/js/functions/time_stampify.js"></script>
<script src="/js/functions/toggle_elements.js"></script>
<script src="/js/functions/get_resource_name.js"></script>

<script src="/js/functions/build_blog_skeleton.js"></script>
<script src="/js/functions/fill_blog_body.js"></script>

<!-- PAGE SPECIFIC JS -->
<script src="/js/functions/read_cookie.js"></script>
<script src="/js/functions/functions.js"></script>
<script src="/js/projects/all-blogs.js"></script>

<!-- PAGE SPECIFIC OTHER -->
</head>

<body id="all-blogs">
    <?php include "/var/www/projectportfolio/html/nav/navbar.php";?>


    <!-- Page Content -->
    <div class="container">
        <div id="project-ID" class="hide"></div>

        <div class="row">
            <div class="col-lg-10">
                <h1>
                    <span id="project-title"></span>
                    <small>blogs</small>
                </h1>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2">
                <h1>
                    <button id='create-blog' class='btn btn-success blog-btn'><i class='fa fa-plus' aria-hidden='true'></i>&nbsp;New Blog</button>
                </h1>
            </div>
        </div>

        <!--     <div class="row">-->
        <div id="blog-insertion-point">
        </div>
        <!--     </div>-->

    </div>
    <!-- /.container -->

    <div class="bottom-padding"></div>

</body>

</html>
