<?php include("/var/www/projectportfolio/html/head.php"); ?>

    <!-- PAGE SPECIFIC INFO -->
    <title>Verification Requried - ProjectPortfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <!-- PAGE SPECIFIC CSS -->

    <!-- PAGE SPECIFIC JS -->

    <!-- PAGE SPECIFIC OTHER -->


    <script>
    $(document).ready(function(){
        $("#create-new").click(function(){
            window.location = "/projects/edit-project";
        });
        $("button").click(function(){
            window.location = "/projects/edit-project";
        });
    });
    </script>

    <style>
    #browse-projects .panel-heading{
        background-color: white;
        box-shadow: 2px 2px 2px #888888;
        border: 1px solid #777;
        border-bottom: 1px solid #ccc;
    }
    #browse-projects .panel-body{
        box-shadow: 2px 2px 2px #888888;
        background-color: #eee;
        border: 1px solid #777;
        border-top: none;
        height: 250px;
        padding: 0;
        margin: 0;
    }
    #browse-projects .panel-body img{
        object-fit: cover;
        width: 100%;
        height: 100%;
    }
    #browse-projects .info{
        position: absolute;
        bottom: 28px;
        left: 25px;
        color: white;
        z-index: 1000;
        text-shadow:    1px 0px black,
                        0px 1px black,
                        -1px 0px black,
                        0px -1px black,
                        1px 1px 1px black,
                        1px -1px black,
                        -1px 1px black,
                        -1px -1px black;
    }

    #browse-projects .editButton{
        position: absolute;
        bottom: 28px;
        right: 25px;
        padding: 10px 35px;
        border: none;
        background-color: #004488;
        color: white;
        border-radius: 5px;
        box-shadow: 2px 2px 2px #000;
    }
    #browse-projects .editButton:hover{
        background-color: #115599;
        box-shadow: 0px 0px 8px #999;
    }

    </style>
</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <?php include "/var/www/projectportfolio/html/navbar/navbar.php";?>
    </div>

    <div class="container" id="browse-projects">
        <div class = "page-header">
            <h1>
                browse-projects
                <small>andrewdownie</small>
            </h1>
        </div>
        <div class="row" style="margin-bottom: 12px;">
            <div class="col-sm-8 col-md-8">
            </div>

            <div class="col-sm-4 col-md-4">
                <button style="float: right;" id="create-new" type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Create new project</button>
            </div>
        </div>


        <div class="row">


            <div class="col-sm-6 col-md-4">
                <button class="editButton"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit</button>
                <a href="/projects/project">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Project A <span style="float:right; font-size:12px;">May 10th, 2016</span></h3>
                        </div>
                        <div class="panel-body" >
                            <img src="https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30" alt="img y u no lod">
                            <span class="info">
                                <div>Blogs: 11</div>
                                <div>Goals: 43</div>
                                <div>Builds: 5</div>
                            </span>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-sm-6 col-md-4">
                <button class="editButton"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit</button>
                <a href="/projects/project">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Project A <span style="float:right; font-size:12px;">May 10th, 2016</span></h3>
                        </div>
                        <div class="panel-body" >
                            <img src="https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30" alt="img y u no lod">
                            <span class="info">
                                <div>Blogs: 11</div>
                                <div>Goals: 43</div>
                                <div>Builds: 5</div>
                            </span>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-sm-6 col-md-4">
                <button class="editButton"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit</button>
                <a href="/projects/project">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Project A <span style="float:right; font-size:12px;">May 10th, 2016</span></h3>
                        </div>
                        <div class="panel-body" >
                            <img src="https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30" alt="img y u no lod">
                            <span class="info">
                                <div>Blogs: 11</div>
                                <div>Goals: 43</div>
                                <div>Builds: 5</div>
                            </span>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-sm-6 col-md-4">
                <button class="editButton"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit</button>
                <a href="/projects/project">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Project A <span style="float:right; font-size:12px;">May 10th, 2016</span></h3>
                        </div>
                        <div class="panel-body" >
                            <img src="https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30" alt="img y u no lod" >
                            <span class="info">
                                <div>Blogs: 11</div>
                                <div>Goals: 43</div>
                                <div>Builds: 5</div>
                            </span>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-sm-6 col-md-4">
                <button class="editButton"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit</button>
                <a href="/projects/project">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Project A <span style="float:right; font-size:12px;">May 10th, 2016</span></h3>
                        </div>
                        <div class="panel-body" >
                            <img src="https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30" alt="img y u no lod">
                            <span class="info">
                                <div>Blogs: 11</div>
                                <div>Goals: 43</div>
                                <div>Builds: 5</div>
                            </span>
                        </div>
                    </div>
                </a>
            </div>



            <div class="col-sm-6 col-md-4">
                <button class="editButton"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp;Edit</button>
                <a href="/projects/project">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Project A <span style="float:right; font-size:12px;">May 10th, 2016</span></h3>
                        </div>
                        <div class="panel-body" >
                            <img src="https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30" alt="img y u no lod">
                            <span class="info">
                                <div>Blogs: 11</div>
                                <div>Goals: 43</div>
                                <div>Builds: 5</div>
                            </span>
                        </div>
                    </div>
                </a>
            </div>






        </div>
    </div>
</body>
</html>
