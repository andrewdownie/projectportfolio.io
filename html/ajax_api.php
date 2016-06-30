<?php
include ("/var/www/projectportfolio/backend/_backend_includes.php");
/*------------------------------------------------------------------------------
DOCUMENT NAME: ajax_api.php
DATE  CREATED: 2016-05-18
DATE MODIFIED: 2016-06-30
CREATED    BY: Andrew Downie
--------------------------------------------------------------------------------
DESCRIPTION:
This is the file for ajax api calls to go to. Once the call is here, the
call will be redirected to the appropriate backend function.
--------------------------------------------------------------------------------
FUNCTION LIST:
No functions, just a giant if statement.
------------------------------------------------------------------------------*/

//=====
//===== POST -------------------------------------------------------------------
//=====
if($_SERVER['REQUEST_METHOD'] == "POST") {
    $function = $_POST['function'];

    if($function === 'login'){
        login($_POST['email'], $_POST['password']);

    }
    else if($function === 'logout'){
        logout();

    }
    else if($function === 'signup'){
        signup($_POST['email']);

    }
    else if($function === 'verify-account'){
        verify_account($_POST['username'], $_POST['password'], $_POST['verify_code']);
    }
    else if($function === 'create-project'){
        create_project();
    }
    else if($function == 'delete-project'){
        delete_project($_POST['project_url_name']);
    }
    else{
        echo "ARE YOU A WIZARD?!\n     (∩｀-´)⊃━☆ﾟ.*･｡ﾟ \n\n Unrecognized function, how did you do that?";

    }

    return;
}
else if($_SERVER['REQUEST_METHOD'] == "GET"){
    $function = $_GET['function'];
    if($function == 'load-projects'){
        load_projects($_GET['username'], $_GET['amount'], $_GET['start']);

    }
    else if($function == 'load-project'){
        load_project($_GET['username'], $_GET['projectname']);
    }
    else{

    }
}

?>
