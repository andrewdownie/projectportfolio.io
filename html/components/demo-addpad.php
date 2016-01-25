<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Demo: AddPad</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

    <!-- Bootstrap Core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS
    <link href="css/shop-item.css" rel="stylesheet"> TODO: DELETE THIS-->
    <link href="/css/navbar.css" rel="stylesheet">

    <!-- jQuery -->
    <script src="/js/lib/jquery-2.2.0.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/js/lib/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
        p[contenteditable=true]:hover{
            background-color: #ddd;
        }


    </style>

    <script>
    $(document).ready(function(){
        $("button").click(function(){
            alert(getSelectedText())
        });
    });
    function getSelectedText() {
      t = (document.all) ? document.selection.createRange().text : document.getSelection();

      return t;
    }
    </script>
</head>

<body>

    <!-- Page Content -->
    <div class="container">
        <button>Add span</button>
        <p contenteditable="true"><a href="#">This is a paragraph.</a> It is editable. Try to change this text.</p>






    </div>
</body>

</html>
