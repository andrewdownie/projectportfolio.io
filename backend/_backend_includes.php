<?php

//used for debugging,
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



session_start();

$backend_path = "/var/www/projectportfolio/backend/";

//SIGNUP
include($backend_path."verify_account.php");
include($backend_path."create_account.php");

include($backend_path."auth.php");
include($backend_path."db_functions.php");
include($backend_path."functions.php");
include($backend_path."project_management.php");


 ?>
