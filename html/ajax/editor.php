<?php
// INCLUDES
//==============================================================================
$backend_path = "/var/www/projectportfolio/backend/";

include($backend_path."editor.php");
include($backend_path."_error_reporting.php");
include($backend_path."db_functions.php");
include($backend_path."functions.php");
include($backend_path."auth.php");

session_start();


// AJAX DIRECTION LOGIC
//==============================================================================
if($_SERVER['REQUEST_METHOD'] == "GET"){


}
else if($_SERVER['REQUEST_METHOD'] == "POST"){

    $function = $_POST['function'];
    
    if($function == 'save-blog'){
        save_blog($_POST['project_url_name'], $_POST['blog_url_name']);
    }
}
?>
