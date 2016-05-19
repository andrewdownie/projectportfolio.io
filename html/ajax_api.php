<?php
include ("/var/www/projectportfolio/backend/auth.php");
/*------------------------------------------------------------------------------
DOCUMENT NAME: ajax_api.php
DATE  CREATED: 2016-05-18
DATE MODIFIED: 2016-05-18
CREATED    BY: Andrew Downie
--------------------------------------------------------------------------------
DESCRIPTION:
This is the file for ajax api calls to go to. Once the call is here, the
call will be redirected to the appropriate backend function.
--------------------------------------------------------------------------------
FUNCTION LIST:
No functions, just four giant switches.
------------------------------------------------------------------------------*/

//=====
//===== WASH DATA FROM USER ----------------------------------------------------
//=====
//loop throgh all variables, and clean / escape them before doing anything else?
//-->? is this a good idea?

//=====
//===== POST -------------------------------------------------------------------
//=====
if($_SERVER['REQUEST_METHOD'] == "POST") {
    switch($_POST['function']){
        case "login":
        login($_POST['email'], $_POST['password']);
        break;
        case "signup":
        echo "k enter info here pls";
        break;
        default:
        echo "Something bad :(";
    }

    return;
}


?>
