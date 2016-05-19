<?php
function login($email, $password){
    if($email === "user@example" && $password === "123"){

        $session_value = md5($password.time());

        $cookie_set = setcookie('session', $email."=".$session_value, time() + 1200);

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

?>
