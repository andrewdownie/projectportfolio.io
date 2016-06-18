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

    session_regenerate_id();
    fresh_logon($account_id);
    setcookie('LOGGED_IN', "True", time() + 3600);
    echo "login-success";
}

function signup($dirty_email){
    create_account($dirty_email);
}


function logout(){
    $session = session_id();
    $sql = "UPDATE account_head SET status='logged-out', session='', last_seen=1 WHERE session='$session';";
    $result = query($sql);

    //TODO: verify that the above sql worked (through code)

    setcookie('LOGGED_IN', null, 1);
    session_regenerate_id();

    echo "logout-success";
}


function valid_login($account_num){
    return False;
}

function expire_ppsessid(){
    expire_cookie("PPSESSID");
}




?>
