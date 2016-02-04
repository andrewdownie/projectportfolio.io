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

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Hint.css for hover tooltip text -->
    <link rel="stylesheet" href="/css/hint.css">

    <!-- Custom CSS-->
    <link href="/css/navbar.css" rel="stylesheet">
    <link href="/css/styles.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="/js/lib/jquery-2.2.0.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/lib/bootstrap.min.js"></script>


    <script src="/js/documentManipulation.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        p[contenteditable=true]:hover{
            max-width: 800px;
            border: 1px blue dotted;
            margin-top: -1px;
        }
        #blog-title{
            font-size: 30px;
            text-align: center;
        }




        @media (max-width: 844px){
            .editortools-topspace{
                padding-top: 85px;/*Pads are stack one by one at this point, need to match the number of pads there are here.*/
            }
        }

        @media (max-width: 767px){
            .container-fluid {
                padding-left: 0px !important;
                padding-right: 0px !important;
            }

            .blogpad{
                flex-grow: 100;
            }
            .editor-tools-col{
                 display: flex;
            }
        }
        @media (min-width: 768px){
            .container-fluid {
                padding-left: 15px;
                padding-right: 15px;
            }
        }

        #editor-tools::selection {
            background-color: transparent;
        }

    </style>

    <script>
    $(document).ready(function(){
        /*Toggle pads when not in xs mode*/
        $("#editor-tools").click(function(){
            //LinkToggle($("#editor-tools i"), "fa fa-folder", "fa fa-folder-open", $("#editor-pads"))
            ToggleElements($("#editor-tools i"), "fa fa-folder", "fa fa-folder-open", $(".addpad"), $(".stylepad"), $(".blogpad") )
        });

        /*Toggle pads when in xs mode*/
        $("#minimize-pads").click(function() {
            var visible = ToggleElements($("#minimize-pads i"), "fa fa-plus-square-o", "fa fa-minus-square-o", $(".addpad table"), $(".stylepad table"), $(".blogpad table") )
            if(visible){
                $(".editortools-topspace").css("padding-top", "85px")
            }
            else{
                $(".editortools-topspace").css("padding-top", "20px")
            }
        });
    });


    </script>


</head>

<body>

    <!-- Page Content -->
    <div class="container">
        <?php include "/var/www/projectportfolio/pagebars/navbar.php";?>
    </div>

    <div class="container-fluid " style="margin-top: -10px;">
        <div class="row">
            <div class="col-sm-2 col-xs-12 editor-tools-col" style="position:fixed; z-index: 99999;  border-top: 1px white solid;">
                <div style="padding-top: 10px;"></div>
                <div style="width: 100%;" data-hint="Click to toggle." class="hint--bottom hint--bounce hidden-xs"><a id="editor-tools" class="button-link"><i class="fa fa-folder-open"></i> Editor Tools</a></div>

                <?php include "/var/www/projectportfolio/html/editor-tools/addpad.html";?>
                <div class="visible-lg">
                    <!--this is used to ensure the pads stack vertically when the screen is large-->
                </div>
                <?php include "/var/www/projectportfolio/html/editor-tools/stylepad.html";?>
                <div class="visible-lg">
                    <!--this is used to ensure the pads stack vertically when the screen is large-->
                </div>
                <?php include "/var/www/projectportfolio/html/editor-tools/blogpad.html";?>

            </div>

            <span class="visible-xs hidden-sm-up">
                <div class="editortools-topspace"></div>
            </span>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div style="padding-top: 10px;"></div>
            <div class="col-md-8 col-sm-10 col-xs-12 col-sm-push-2">
                <p id="blog-title" contenteditable="true">Page Title</p>
            </div>

        </div>
    </div>


    <?php include "/var/www/projectportfolio/html/editor-tools/moveremovepad.html";?>
</body>

</html>
