<?php
// INCLUDES
//==============================================================================
$backend_path = "/var/www/projectportfolio/backend/";

include($backend_path."projects/project.php");
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
        load_recent_blogs($_GET['project_num']);
    }
}
else if($_SERVER['REQUEST_METHOD'] == "POST"){
    $function = $_POST['function'];
    
}

?>
