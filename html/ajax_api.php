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
    else if($function == 'save-project-name'){
        save_project_name($_POST['project_id'], $_POST['new_value']);
    }
    else if($function == 'save-project-image'){
        save_project_image($_POST['project_id'], $_POST['new_value']);
    }
    else if($function == 'save-project-spec'){
        save_project_spec($_POST['project_id'], $_POST['new_value']);
    }
    else{
        echo "There was a hole.";

    }

    return;
}

//=====
//===== GET --------------------------------------------------------------------
//=====
if($_SERVER['REQUEST_METHOD'] == "GET"){
    $function = $_GET['function'];
    if($function == 'load-projects'){
        load_projects($_GET['username'], $_GET['amount'], $_GET['start']);

    }
    else if($function == 'load-project'){
        load_project($_GET['username'], $_GET['projectname']);
    }
    else if($function == 'load-project-counts'){
        load_project_counts($_GET['project_id']);
    }
    else if($function == 'load-recent-blog'){
        load_recent_blog($_GET['project-title']);
    }
    else{
        echo "There was a hole.";
    }
}

?>
