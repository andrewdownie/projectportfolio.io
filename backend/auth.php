<?php
function login($email, $password){

    if($email === "user@example" && $password === "123"){

        //====== check if user is in database,
        //---- check if password is correct
        //---- update user profile, so they have the php sess id saved


        if($cookie_set){
            echo "login-success";
        }
        else{
            echo "login-failure";
        }

    }
    else{
        echo "login-invalid";
    }

}

function logout(){
    //sign the user out that has that session id on their account
    //redirect("index");


    session_regenerate_id();
    $_SESSION = array();
    session_destroy();



    echo "logout-success";
}


function valid_login($cookie){
    return False;
}

function expire_ppsessid(){
    expire_cookie("PPSESSID");
}

function generate_string(){
    $fp = fopen('/dev/urandom', 'r');
    $randomString = fread($fp, 32);
    fclose($fp);

    return base64_encode($randomString);
}

?>
