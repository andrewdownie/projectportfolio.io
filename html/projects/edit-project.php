<?php include("/var/www/projectportfolio/html/head.php"); ?>

<!-- PAGE SPECIFIC INFO -->
<title>Edit project - ProjectPortfolio</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">

<!-- PAGE SPECIFIC CSS -->
<link href="/css/edit-project.css" rel="stylesheet">

<!-- PAGE SPECIFIC JS -->
<script src="/js/functions/get_resource_name.js"></script>
<script src="/js/functions/valid_item_name.js"></script>
<script src="/js/functions/time_stampify.js"></script>
<script src="/js/projects/edit-project.js"></script>



<!-- PAGE SPECIFIC OTHER -->


</head>

<body id="edit-project">
    <!-- Page Content -->
    <div class="container">
        <?php include "/var/www/projectportfolio/html/nav/navbar.php";?>
    </div>

    <span id="project-id" style="display:none;"></span>

    <div class="container">
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
                                <div class="col-md-4" id="project-name">
                                    Project A
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4">
                                    <span class="date" id="modified">
                                        Modified: May 11th, 2016
                                    </span>

                                    <span class="date" id="created">
                                        Created: May 10th, 2016
                                    </span>
                                </div>
                            </div>
                        </h1>
                    </div>
                    <div class="panel-body" >
                        <div class="row">
                            <div class="col-md-6">
                                <img alt="No Image" id="project-img">
                            </div>
                            <div id="input-col" class="col-md-5" style="padding: 0 20px 20px 20px;">
                                <h3>
                                    <i class="fa fa-terminal" aria-hidden="true"></i>
                                    &nbsp;
                                    Project Name
                                </h3>
                                <input id="text-name" type="text" value="">
                                <button id="save-name" class="button full">Save</button>
                                <button id="clear-name" class="button full">Clear</button>

                                <h3>
                                    <i class="fa fa-file-image-o" aria-hidden="true"></i>
                                    &nbsp;
                                    Image Source
                                </h3>
                                <input id="text-image" type="text" value="">
                                <button id="save-image" class="button full">Save</button>
                                <button id="clear-image" class="button full">Clear</button>

                                <h3>
                                    <i class="fa fa-file-text" aria-hidden="true"></i>
                                    &nbsp;
                                    Project Spec
                                </h3>
                                <input id="text-spec" type="text" value="">
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
                <a href="" id="view-members">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">
                                <img style="height: 1em; width: 1em;" class="loading-counts" src="http://i.imgur.com/G0Ot284.gif"/>
                                Members
                                (<span id="member-count"></span>)
                            </div>
                        </div>
                        <div class="panel-body">
                            <i class="fa fa-users team-icon" aria-hidden="true"></i>

                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="#" id="view-blogs">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="panel-title">
                                <img style="height: 1em; width: 1em;" class="loading-counts" src="http://i.imgur.com/G0Ot284.gif"/>
                                Blogs
                                (<span id="blog-count"></span>)
                            </p>
                        </div>
                        <div class="panel-body" >
                            <i class="fa fa-pencil-square-o section-icon" aria-hidden="true" ></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="#" id='view-goals'>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="panel-title">
                                <img style="height: 1em; width: 1em;" class="loading-counts" src="http://i.imgur.com/G0Ot284.gif"/>
                                Goals
                                (<span id="goal-count"></span>)
                            </p>
                        </div>
                        <div class="panel-body" >
                            <i class="fa fa-check section-icon" aria-hidden="true" ></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="#" id="view-builds">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p class="panel-title">
                                <img style="height: 1em; width: 1em;" class="loading-counts" src="http://i.imgur.com/G0Ot284.gif"/>
                                Builds
                                (<span id="build-count"></span>)
                            </p>
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
