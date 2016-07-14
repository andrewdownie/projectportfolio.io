<?php
// INCLUDES
//==============================================================================
$backend_path = "/var/www/projectportfolio/backend/";

include($backend_path."projects/all-blogs.php");
include($backend_path."_error_reporting.php");
include($backend_path."db_functions.php");

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
}


?>