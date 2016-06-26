<?php
include("/var/www/projectportfolio/html/head.php");
?>

<!-- PAGE SPECIFIC INFO -->
<title>User - ProjectPortfolio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">

<!-- PAGE SPECIFIC CSS -->
<link href="/css/login.css" rel="stylesheet">

<!-- PAGE SPECIFIC JS -->
<script src="/js/functions/read_cookie.js"></script>
<script src="/js/functions/get_resource_name.js"></script>
<script src="/js/projects/project-nav.js"></script>
<script src="/js/projects/all-projects.js"></script>


<!-- PAGE SPECIFIC OTHER -->

</head>

<body>
    <?php include "/var/www/projectportfolio/html/nav/navbar.php";?>

    <?php include "/var/www/projectportfolio/html/nav/project-nav.php";?>



    <div class="container">
        <button class=" btn btn-success" id="create-new" type="button"><i class="fa fa-plus" aria-hidden="true"></i> Create new project</button>
        <div class="padding-top-10"></div>
        <div>
            <img id="loading-projects" src="http://i.imgur.com/G0Ot284.gif"/>
            &nbsp;Loading projects...
        </div>

    </div>


</body>

</html>
