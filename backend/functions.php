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
    //REGEX: http://stackoverflow.com/questions/12018245/regular-expression-to-validate-username
    //might be a good idea to return an enum, or string describing why it didn't work
    return true;
}

function valid_username_format($username){
    $fourToFifteen = "(^(.{4,15}$))";
    $underDotStart = "(^([_.]))";
    $doubleUnderDot = "(.*[_.]{2})";
    $underDotEnd = "(([_.])$)";
    $allowedCharacters = "(^(([a-zA-Z0-9._])+)$)";

    if(preg_match($fourToFifteen, $username) === 0){
        return "invalid-username-length";
    }

    if(preg_match($underDotStart, $username) === 1){
        return "invalid-username-dotunder-start";
    }

    if(preg_match($doubleUnderDot, $username) === 1){
        return "invalid-username-double-dotunder";
    }

    if(preg_match($underDotEnd, $username) === 1){
        return "invalid-username-dotunder-end";
    }

    if(preg_match($allowedCharacters, $username) === 1){//TODO: this isn't working...
        echo "valid.";
        return "valid-username";
    }

    return "invalid-username-allowed-characters";

}

function timestampify($time){
    return date('m/d/Y h:i:s', $time);
}

function encrypt_password($password) {
    //TAKEN FROM: https://www.sitepoint.com/password-hashing-in-php/
    if (defined("CRYPT_BLOWFISH") && CRYPT_BLOWFISH) {
        $salt = '$2y$11$' . substr(md5(uniqid(rand(), true)), 0, 22);
        return crypt($password, $salt);
    }
}


function check_password($password, $hashedPassword) {
    //TAKEN FROM: https://www.sitepoint.com/password-hashing-in-php/
    return crypt($password, $hashedPassword) == $hashedPassword;
}
?>
