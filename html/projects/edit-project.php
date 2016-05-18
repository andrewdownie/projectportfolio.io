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
        $("#all-projects").click(function(){
            window.location = "/projects/browse-projects"
        });
    });
    </script>

    <style>
        #project img{
            width: 100%;
            height: 100%;
        }

        #project input[type="text"]{
            margin-bottom: 10px;
            border: #999 1px solid;
            width: 100%;
            height: 25px;
            padding-right: 0px;
            margin-right: 0px;
        }



        #project .button.full{
            width: 22%;
        }
        @media (max-width: 570px){
            #project .button.full{
                width: 40%;
            }
        }


        #project .button{
            height: 25px;
            padding: 0px;
            margin: 0px;
            background-color: white;
            border: 1px solid #777;
            border-radius: 5px;
        }
        #project .button:hover{
            background-color: #bbb;
        }

        #project .panel-heading{
            background-color: white;
            box-shadow: 2px 2px 2px #888888;
            border: 1px solid #777;
            border-bottom: 1px solid #ccc;
        }
        #project .panel-body{
            box-shadow: 2px 2px 2px #888888;
            background-color: #f5f5f5;
            border: 1px solid #777;
            border-top: none;
            height: 100%;
            padding: 0;
            margin: 0;
        }
        #project .panel-body img{
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
        #project .section-icon{
            color: black;
            font-size: 150px;

            display: inline-block;
            width: 100%;
            height: 100%;
            text-align: center;
        }
        #project .team-icon{
            color: black;
            width: 100%;
            height: 100%;
            text-align: center;

            font-size: 120px;
            margin-top: 15px;
            margin-bottom: 15px;
        }
        #project .delete-btn{
            height: 40px;
            padding: 5px;
            padding-left: 15px;
            padding-right: 15px;
            background-color: #e74c3c;
            color: white;
            border: none;
            border-radius: 5px;
            float: right;
            margin-top: 22px;
        }
        #project .delete-btn:hover{
            background-color: #f75c4c;
        }
        #project h3{
            margin-top: 15px;
        }

        #project .date{
            float: right;
            padding-right: 20px;
            font-size:12px;
        }

        #project .height50{
            height: 50px;
        }
        @media (max-width: 387px){
            #project .height50{
                height: 65px;
            }
            #project .delete-btn{
                margin-top: 0;
                margin-bottom: 20px;
            }
        }
        @media (max-width: 991px){
            #project .date{
                float: left;
            }
        }


    </style>
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
                                <input type="text" value="Project A">
                                <button class="button full">Save</button>
                                <button class="button full">Clear</button>

                                <h3><i class="fa fa-link" aria-hidden="true"></i>&nbsp;Image Source</h3>
                                <input type="text" value="https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30">
                                <button class="button full">Save</button>
                                <button class="button full">Clear</button>

                                <h3><i class="fa fa-link" aria-hidden="true" ></i>&nbsp;Project Spec</h3>
                                <input type="text" value="docs.google.com/project-spec-here">
                                <button class="button full">Save</button>
                                <button class="button full">Clear</button>

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
                            <p class="panel-title">Team (3)</p>
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
                            <p class="panel-title">Blogs (6)</p>
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
                            <p class="panel-title">Goals (34)</p>
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
                            <p class="panel-title">Builds (11)</p>
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