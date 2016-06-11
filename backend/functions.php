<?php
function generate_string(){
    $fp = fopen('/dev/urandom', 'r');
    $randomString = fread($fp, 32);
    fclose($fp);

    return base64_encode($randomString);
}

//TODO: use regex for this
function valid_email_format($email){
    $atCount = 0;
    $charsBeforeAfter = False;

    for($i = 0; $i < strlen($email); $i++){

        if($email[$i] == "@"){
            $atCount = $atCount + 1;

            if($i > 0 && $i < strlen($email)){
                $charsBeforeAfter = True;
            }
        }
    }


    return $atCount == 1 && $charsBeforeAfter;
}

function valid_password_format($password){
    //use regex
    return true;
}

function valid_username_format($username){
    //use regex
    return true;
}

function timestampify($time){
    return date('m/d/Y h:i:s', $time);
}

/*function encrypt_password($password){
//TODO: ...this
return $password;
}*/

function encrypt_password($password) {
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        //TODO: what does the $2y$11$ do? does that describe the following string??
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        return crypt($password, $salt);
    }
}


//TODO: check if password entered by user matches the password in the db
?>
