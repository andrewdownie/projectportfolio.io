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
    });
    </script>

    <style>
        #project img{
            width: 100%;
            height: 100%;
        }
        #project .height50{
            height: 50px;
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
                <div class="panel panel-default">
                    <div class="panel-heading height50">
                        <h1 class="panel-title">
                            Project A
                            <span style="float:right; font-size:12px;padding-right: 20px;">
                                Modified: May 11th, 2016
                            </span>

                            <span style="float:right; font-size:12px; padding-right: 20px;">
                                Created: May 10th, 2016
                            </span>
                        </h1>
                    </div>
                    <div class="panel-body" >
                        <div class="row">
                            <div class="col-md-5">
                                <img src="https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30" alt="img y u no lod">
                            </div>
                            <div class="col-md-6" style="padding: 0 20px 20px 20px;">
                                <h3>Project Name</h3>
                                <input type="text" value="Project A">
                                <button class="button full">Save</button>
                                <button class="button full">Clear</button>

                                <h3>Image source</h3>
                                <input type="text" value="https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30">
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
                            <h3 class="panel-title">Project Spec</h3>
                        </div>
                        <div class="panel-body" >
                            <i style="color: black; font-size: 150px;" class="fa fa-file" aria-hidden="true" ></i>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="#">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Blogs</h3>
                        </div>
                        <div class="panel-body" >
                            <img src="https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30" alt="img y u no lod">
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="#">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Goals</h3>
                        </div>
                        <div class="panel-body" >
                            <img src="https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30" alt="img y u no lod">
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3">
                <a href="#">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Builds</h3>
                        </div>
                        <div class="panel-body" >
                            <img src="https://picjumbo.imgix.net/HNCK0852.jpg?q=40&w=1650&sharp=30" alt="img y u no lod">
                        </div>
                    </div>
                </a>
            </div>
        </div>


    </div>
</body>
</html>
