<?php include("/var/www/projectportfolio/html/head.php"); ?>

    <!-- PAGE SPECIFIC INFO -->
    <title>Editor - ProjectPortfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">

    <!-- PAGE SPECIFIC CSS -->
    <link href="/css/styles.css" rel="stylesheet">
    <link href="/css/editor.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/hint.css">

    <!-- JS FUNCTIONS -->
    <script src="/js/functions/toggle_elements.js"></script>

    <!-- PAGE SPECIFIC JS -->
    <script src="/js/documentManipulation.js"></script>
    <script src="/js/modalinput.js"></script>
    <script src="/js/editor-tools/moveremovepad.js"></script>
    <script src="/js/editor-tools/addpad.js"></script>
    <script src="/js/editor.js"></script>

    <!-- PAGE SPECIFIC OTHER -->

</head>

<body>
    <?php include "/var/www/projectportfolio/html/nav/navbar.php";?>

    <div class="container-fluid">
        <div class="row">

            <div class="col-sm-2 col-xs-12" id="editor-tools-col">
                <div></div>

                <div class="width-100; hidden-xs"><a id="editor-tools" class="button-link"><i class="fa fa-folder-open"></i> Editor Tools</a></div>

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
            <div class="padding-top-10;" ></div>
            <div class="col-md-8 col-sm-10 col-xs-12 col-sm-push-2" id="content-area">
               <p id="blog-title" contenteditable="true">This is an out of date demo</p>
            </div>

        </div>
    </div>


    <?php include "/var/www/projectportfolio/html/editor-tools/moveremovepad.html";?>
    <?php include "/var/www/projectportfolio/html/editor-tools/modalinput.html";?>
</body>

</html>
