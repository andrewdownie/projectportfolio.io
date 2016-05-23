<?php
function login($email, $password){

    if($email === "user@example" && $password === "123"){

        $session_value = md5(generate_string().'projectportfolio'.time());

        $cookie_set = setcookie('PPSESSID', $email.":".$session_value, time() + 1200, '/');

        //====== check if user is in database,
        //---- check if password is correct
        //---- update user profile, so they have the generated cookie saved, and the associated expiray time saved


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
    //$cookie_data = split(":", $_COOKIE['PPSESSID']);
    //$cookie_data[0] = user Email
    //$cookie_data[1] = user session id,
    //use the above two items to know who to signout from the database
    //redirect("index");
    //expire_ppsessid();

    session_regenerate_id();
    //unset_cookie("PHPSESSID");
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
