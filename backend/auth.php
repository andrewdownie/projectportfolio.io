<?php
function login($dirty_email, $dirty_password){
    $email = escape($dirty_email);
    $password = escape($dirty_password);

    if(!validate_email($email)){
        echo "login-invalid-email";
        return;
    }
    if(!validate_password($password)){
        echo "login-invalid-password";
        return;
    }

    $account_id = account_id_from_email($email);

    if($account_id == -1){
        echo "DEBUG: email or password invalid";
        return;
    }

    if(correct_password($account_id, $password) == false){
        echo "DEBUG: email or password invalid";
        return;
    }

    

    if($email === "user@example" && $password === "123"){

        //====== check if email is in database
        //---- match email to password
        //---- check if password is correct

        //IS THIS ALL I HAVE TO DO?!

        if(True){//if the user was found in the DB and their password is correct
            session_regenerate_id();
            //---- update user profile, so they have the php sess id saved as their current login
            //^call the update
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

function signup($dirty_email){
    create_user($dirty_email);
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




?>
