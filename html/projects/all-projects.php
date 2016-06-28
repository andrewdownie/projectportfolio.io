<?php
include("/var/www/projectportfolio/html/head.php");
?>

<!-- PAGE SPECIFIC INFO -->
<title>User - ProjectPortfolio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">

<!-- PAGE SPECIFIC CSS -->
<link href="/css/login.css" rel="stylesheet">
<link href="/css/all-projects.css" rel="stylesheet">

<!-- PAGE SPECIFIC JS -->
<script src="/js/functions/time_stampify.js"></script>
<script src="/js/functions/read_cookie.js"></script>
<script src="/js/functions/get_resource_name.js"></script>
<script src="/js/functions/build_project_card.js"></script>

<script src="/js/projects/project-nav.js"></script>
<script src="/js/projects/all-projects.js"></script>



<!-- PAGE SPECIFIC OTHER -->

</head>

<body>
    <?php include "/var/www/projectportfolio/html/nav/navbar.php";?>

    <?php include "/var/www/projectportfolio/html/nav/project-nav.php";?>


    <div class="container-fluid" id="all-projects">
        <div class="row">
            <div class="col-lg-12">
                <button class=" btn btn-success" id="create-new" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Create new project</button>
            </div>
        </div>



        <br/><br/>

        <div class="row" id="loading-projects">
            <img src="http://i.imgur.com/G0Ot284.gif"/>
            &nbsp;Loading projects...
        </div>

        <div class="row" id="project-cards-row">

        </div>

    </div>


</body>

</html>
