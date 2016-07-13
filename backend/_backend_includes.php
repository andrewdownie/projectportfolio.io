<?php
//TODO: PLANS FOR REFACTORING
// - create file "user_functions.php", (put user stuff in there auth / user related db stuff...)
// - move all code outside functions files to their own file, then change ajax calls to go
//    directly to that file

//used for debugging,
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



session_start();

$backend_path = "/var/www/projectportfolio/backend/";

//SIGNUP
include($backend_path."verify_account.php");
include($backend_path."create_account.php");

//TODO: sort these files (into more files if needed)
include($backend_path."auth.php");
include($backend_path."db_functions.php");
include($backend_path."functions.php");
include($backend_path."project_management.php");


//TODO: page specific php (all backend php will be setup this way in the future
//                         then only required stuff will be included)
//TODO: there shouldn't (?) be an issue naming the backend php the same as the html php, since they have different folder paths
include($backend_path."projects/all-blogs.php");

?>
