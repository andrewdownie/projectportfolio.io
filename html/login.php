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
    <script src="/js/documentManipulation.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->




    <!--
    STYLE
-->
<style>
#login-signup{
    color: #444;
}

#login-signup i{
    /*    display: none;
    box-sizing: border-box;*/

}

#login-signup button{
    color: black;
    background-color: #eee;
    padding: 4px 10px;
    margin-top: 3px;
    border: none;
}
#login-signup button:hover{
    background-color: #bbb;
}

#login-signup .row #signup{
    min-height: 350px;
    height: 350px;
}

@media (max-width: 981px){
    #login-signup #signup{
        padding-top: 10px;
        border-top: 1px #c0c0c0 solid;
    }
    #login-signup #login{
        padding-bottom: 30px;
    }
}
@media (min-width: 982px){
    #login-signup #signup{
        border-left: solid #bcbcbc 1px;
    }
}

#login-signup h2{
    padding-bottom: 20px;
}
#login-signup h4{
    margin-bottom: 3px;
}
#login-signup input[type="text"],
#login-signup input[type="password"]{
    margin-bottom: 10px;
    border: #999 1px solid;
    width: 190px;
    height: 25px;
}

#login-invalid-email-password{
    display: none;
    color: red;
    padding-left: 30px;
    padding-top: 0px;
}
#login-loading,
#signup-loading{
    display: none;
}
</style>

<!--
SCRIPT
-->
<script>
$(document).ready(function(){
    $("#login-button").click(function(){
        $("#login-loading").show();

        $.ajax({
            url: '/ajax_api',
            type: "POST",
            data: {
                "function": "login",
                "email": $("#login-email").val(),
                "password": $("#login-password").val()
            },
            success: function(data) {
                alert(data)
                if(data === "login-success"){
                    $("#login-invalid-email-password").hide();
                    window.location = "/index"
                }
                else if(data === "login-invalid"){
                    $("#login-invalid-email-password").show();
                }
                else{
                    alert("Something went wrong\n\nThe wizard isn't happy about this either\n     (∩｀╭╮´)⊃━☆ﾟ.*･｡ﾟ")
                }
            },
            error: function(xhr, desc, err) {
                alert('There was an error :( ')
            },
            complete: function(){
                $("#login-loading").hide();
            }
        }); // end ajax call



    });
});

</script>
</head>

<body>

    <!-- Page Content -->
    <div class="container">
        <?php include "/var/www/projectportfolio/html/navbar/navbar.php";?>
    </div>

    <div class="container" id="login-signup">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-5" id="login">

                <div style="margin-left: 30px;">
                    <h2>
                        <i class="fa fa-user"></i>
                        Login
                        <img id="login-loading" src="http://i.imgur.com/G0Ot284.gif"/>

                    </h2>
                    <div id="login-invalid-email-password">
                        Invalid email or password entered
                        <br> <span class="small">-- example login: user@example, pass: 123 --</span>
                    </div>
                    <div style="margin-left: 30px;">
                        <h4>
                            <i class="fa fa-at"></i>
                            Email
                        </h4>
                        <input type="text" id="login-email">
                        <h4>
                            <i class="fa fa-asterisk"></i>
                            Password
                        </h4>
                        <input type="password" id="login-password">

                        <br/>
                        <button class="btn btn-primary" id="login-button">Login</button>
                        <a href="#" style="padding-left: 8px;">Forgot password?</a>
                    </div>
                </div>


            </div>
            <div class="col-md-5" id="signup">
                <div style="margin-left: 30px;">
                    <h2>
                        <i class="fa fa-user-plus"></i>
                        Sign up
                        <img id="signup-loading" src="http://i.imgur.com/G0Ot284.gif"/>
                    </h2>
                    <div style="margin-left: 30px;">
                        <h4>
                            <i class="fa fa-at"></i>
                            Email
                        </h4>
                        <input type="text">
                        <h4>
                            <i class="fa fa-at"></i>
                            Confirm Email
                        </h4>
                        <input type="text">
                        <h4>
                            <i class="fa fa-asterisk"></i>
                            Password
                        </h4>
                        <input type="password">
                        <br/>
                        <button class="btn btn-primary">Sign up</button>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

</body>

</html>
