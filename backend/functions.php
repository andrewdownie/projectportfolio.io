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
    /*$eightToTwenty = "^(?=.{8,20}$)";
    $noUnderDotStart = "(?![_.])";
    $noDoubleUnderDot = "(?!.*[_.]{2})";
    $noUnderDotEnd = "+(?<![_.])$";
    $allowedCharacters = "^([a-zA-Z0-9._])*";

    if(!preg_match($eightToTwenty, $username)){
        return "invalid-username-length";
    }

    if(preg_match($noUnderDotStart, $username)){
        return "invalid-username-dotunder-start";
    }

    if(preg_match($noDoubleUnderDot, $username)){
        return "invalid-username-double-dotunder";
    }

    if(preg_match($noUnderDotEnd, $username)){
        return "invalid-username-dotunder-end";
    }

    if(preg_match($allowedCharacters, $username)){
        return "valid-username";
    }

    return "invalid-username-allowed-characters";*/

    return "valid-username";
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
