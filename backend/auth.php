<?php
function login($email, $password){
    $email = escape($email);
    $password = escape($password);

    if($email === "user@example" && $password === "123"){

        //====== check if user is in database,
        //---- check if password is correct



        if(True){//if the user was found in the DB and their password is correct
            session_regenerate_id();
            //---- update user profile, so they have the php sess id saved as their current login
            setcookie('LOGGED_IN', "True", time() + 3600);
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

    setcookie('LOGGED_IN', null, 1);
    session_regenerate_id();

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

function valid_email_format($email){
    $atCount = 0;
    $charsBeforeAfter = False;

    for($i = 0; $i < $email.length; $i++){
        if($email[i] == "@"){
            $atCount++;

            if($i > 0 && $i < $email.length){
                $charsBeforeAfter = True;
            }
        }
    }

    return $atCount == 1 && $charsBeforeAfter;
}

?>
