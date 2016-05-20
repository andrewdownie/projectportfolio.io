<?php
include ("/var/www/projectportfolio/backend/_backend_includes.php");
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
No functions, just a giant if statement.
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
    $function = $_POST['function'];

    if($function === 'login'){
        login($_POST['email'], $_POST['password']);

    }
    else if($function === 'logout'){
        logout();

    }
    else if($function === 'signup'){
        create_user($_POST['email'], $_POST['password']);

    }
    else{
        echo "ARE YOU A WIZARD?!\n     (∩｀-´)⊃━☆ﾟ.*･｡ﾟ \n\n Unrecognized function, how did you do that?";

    }

    return;
}


?>
