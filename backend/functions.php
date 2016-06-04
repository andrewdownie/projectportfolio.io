<?php
function generate_string(){
    $fp = fopen('/dev/urandom', 'r');
    $randomString = fread($fp, 32);
    fclose($fp);

    return base64_encode($randomString);
}

//TODO: need to exclude special characters....
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
    return false;
}

function timestampify($time){
    return date('m/d/Y h:i:s', $time);
}

function encrypt_password($password){
    //TODO: ...this
    return $password;
}
?>
