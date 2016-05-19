<?php
function login($email, $password){
    
    if($email === "user@example" && $password === "123"){

        $session_value = md5($password.time());

        $cookie_set = setcookie('PPSESSID', $email.":".$session_value, time() + 1200);

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
    $cookie_data = split(":", $_COOKIE['PPSESSID']);
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
    setcookie(PPSESSID, "", 1);
}

?>
