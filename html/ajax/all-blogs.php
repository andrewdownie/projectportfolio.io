<?php
// INCLUDES
//==============================================================================
$backend_path = "/var/www/projectportfolio/backend/";

include($backend_path."projects/all-blogs.php");
include($backend_path."_error_reporting.php");
include($backend_path."db_functions.php");
include($backend_path."functions.php");
include($backend_path."auth.php");

session_start();


// AJAX DIRECTION LOGIC
//==============================================================================
if($_SERVER['REQUEST_METHOD'] == "GET"){
    $function = $_GET['function'];

    if($function == 'load-recent-blogs'){
        load_recent_blogs($_GET['project-title']);
    }
    else if($function == 'load-blog-headers'){
        load_blog_headers($_GET['project_id'], $_GET['start_index']);
    }
    else if($function == 'load-blog-body'){
        load_blog_body($_GET['blog_id']);
    }
}
else if($_SERVER['REQUEST_METHOD'] == "POST"){
    $function = $_POST['function'];
    
    if($function == 'create-new-blog'){
       create_new_blog($_POST['project_id']);
    }
    else if($function == 'delete-blog'){
        delete_blog($_POST['blog_id']);
    }
}

?>
