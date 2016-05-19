<?php
function login($email, $password){
    print_r (user_exists("user@example")); return;


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
    //echo "Email: ".$email." Password: ".$password;
}

function logout(){
    //$cookie_data = split(":", $_COOKIE['PPSESSID']);
    //$cookie_data[0] = user Email
    //$cookie_data[1] = user session id,
    //use the above two items to know who to signout from the database
    //redirect("index");
    expire_ppsessid();
    echo "logout-success";
}


function valid_login($cookie){

}

function expire_ppsessid(){
    setcookie("PPSESSID", "", 1);
}

function generate_string(){
    $fp = fopen('/dev/urandom', 'r');
    $randomString = fread($fp, 32);
    fclose($fp);

    return base64_encode($randomString);
}

?>
