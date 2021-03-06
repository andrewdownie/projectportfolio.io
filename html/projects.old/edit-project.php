<?php include("/var/www/projectportfolio/html/head.php"); ?>

    <!-- PAGE SPECIFIC INFO -->
    <title>Edit project - ProjectPortfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <!-- PAGE SPECIFIC CSS -->
    <link href="/css/edit-project.css" rel="stylesheet">

    <!-- PAGE SPECIFIC JS -->
    <script src="/js/edit-project.js"></script>


    <!-- PAGE SPECIFIC OTHER -->


</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <?php include "/var/www/projectportfolio/html/navbar/navbar.php";?>
    </div>

    <div class="container" id="project">
        <div class="row">
            <div class="col-md-12">
                <button class="btn btn-link" style="float: left;" id="all-projects"><h3><i class="fa fa-arrow-circle-left" aria-hidden="true"></i>&nbsp;All Projects</h3></button>
                <button id="delete-project" type="button" class="delete-btn"><i class="fa fa-close" aria-hidden="true"></i> Delete project</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading height50">
                        <h1 class="panel-title">
                            <div class="row">
                                <div class="col-md-4">
                                    Project A
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <span class="date">
                                        Modified: May 11th, 2016
                                    </span>

                                    <span class="date">
                                        Created: May 10th, 2016
                                    </span>
                                </div>
                            </div>
                        </h1>
                    </div>
                    <div class="panel-body" >
                        <div class="row">
                            <div class="col-md-6">
                                <img src="https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30" alt="img y u no lod">
                            </div>
                            <div class="col-md-5" style="padding: 0 20px 20px 20px;">
                                <h3><i class="fa fa-terminal" aria-hidden="true"></i>&nbsp;Project Name</h3>
                                <input id="text-name" type="text" value="Project A">
                                <button id="save-name" class="button full">Save</button>
                                <button id="clear-name" class="button full">Clear</button>

                                <h3><i class="fa fa-file-image-o" aria-hidden="true"></i>&nbsp;Image Source</h3>
                                <input id="text-image" type="text" value="https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30">
                                <button id="save-image" class="button full">Save</button>
                                <button id="clear-image" class="button full">Clear</button>

                                <h3><i class="fa fa-file-text" aria-hidden="true"></i>&nbsp;Project Spec</h3>
                                <input id="text-spec" type="text" value="docs.google.com/project-spec-here">
                                <button id="save-spec" class="button full">Save</button>
                                <button id="clear-spec" class="button full">Clear</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <a href="#">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="panel-title">Members&nbsp;(3)</p>
                        </div>
                        <div class="panel-body">
                            <i class="fa fa-users team-icon" aria-hidden="true"></i>

                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="/projects/blogs">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="panel-title">Blogs&nbsp;(6)</p>
                        </div>
                        <div class="panel-body" >
                            <i class="fa fa-pencil-square-o section-icon" aria-hidden="true" ></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="#">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="panel-title">Goals&nbsp;(34)</p>
                        </div>
                        <div class="panel-body" >
                            <i class="fa fa-check section-icon" aria-hidden="true" ></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="#">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="panel-title">Builds&nbsp;(11)</p>
                        </div>
                        <div class="panel-body" >
                            <i class="fa fa-home section-icon" aria-hidden="true" ></i>
                        </div>
                    </div>
                </a>
            </div>
        </div>


    </div>
</body>
</html>
