<?php
// INCLUDES
//==============================================================================
$backend_path = "/var/www/projectportfolio/backend/";

include($backend_path."projects/blog.php");
include($backend_path."_error_reporting.php");
include($backend_path."db_functions.php");
include($backend_path."functions.php");
include($backend_path."auth.php");

session_start();


// AJAX DIRECTION LOGIC
//==============================================================================
if($_SERVER['REQUEST_METHOD'] == "GET"){
    $function = $_GET['function'];

    if($function == 'load-blog-contents'){
        load_blog_contents($_GET['blogUrlName'], $_GET['blogProjectUrlName'], $_GET['blogUserName']);
    }
}
else if($_SERVER['REQUEST_METHOD'] == "POST"){
    $function = $_POST['function'];
    
}

?>
