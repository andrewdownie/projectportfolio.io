<?php
function generate_string(){
    $fp = fopen('/dev/urandom', 'r');
    $randomString = fread($fp, 32);
    fclose($fp);

    return base64_encode($randomString);
}


function validate_email($email){
    $invalidCharacters = "([^a-zA-Z0-9._@])";
    $singleAt = "(^([A-Za-z0-9._]+@[A-Za-z0-9._]+)$)";


    if(preg_match($invalidCharacters, $email) === 1){
        return "invalid-email-characters";
    }

    if(preg_match($singleAt, $email) === 0){
        return "invalid-email-single-at";
    }

    return "valid-email";

}

function validate_password($password){
    $eightToTwenty = "(^(.{8,20}$))";
    $uppercase = "([A-Z])";
    $lowercase = "([a-z])";
    $number = "([0-9])";
    $symbol = "([^A-Za-z0-9])";
    $invalidCharacters = "([^A-Za-z0-9!()$%^&*+=.?\[\]_`~@# |,<>:;{}-])";


        if(preg_match($invalidCharacters, $password) === 1){
            return "invalid-password-characters";
        }

        if(preg_match($eightToTwenty, $password) === 0){
            return "invalid-password-length";
        }

        if(preg_match($uppercase, $password) === 0){
            return "invalid-password-uppercase";
        }

        if(preg_match($lowercase, $password) === 0){
            return "invalid-password-lowercase";
        }

        if(preg_match($number, $password) === 0){
            return "invalid-password-number";
        }

        if(preg_match($symbol, $password) === 0){
            return "invalid-password-symbol";
        }


        return "valid-password";
    }

    function validate_username($username){
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

        if(preg_match($allowedCharacters, $username) === 1){
            return "valid-username";
        }

        return "invalid-username-allowed-characters";
    }

    function timestampify($time){
        return date('m/d/Y h:i:s', $time);
    }

    function sql_to_json($sqlResult){
        while($rows[] = mysqli_fetch_array($sqlResult));
        return json_encode($rows);
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

    function send_signup_email($to, $signupString){

        // subject
        $subject = 'Complete Registration - Verify your email address';

        // message TODO: get tls enabled, so the link will work (auto redirects to https)
        $message = '
        <html>
        <head>
        <title>Link to complete signup</title>
        </head>
        <body>
        Hi '.$to.',<br/><br/>
        Here is the link to complete your signup with ProjectPortfolio:
        <br/>
        <a href="projectportfolio.io/verify?code='.$signupString.'">
        projectportfolio.io/verify?code='.$signupString.'</a>
        <br/><br/>
        If you did not request to signup, please ignore this email.
        <br/>
        sent at: '.timestampify(time()).'
        </body>
        </html>
        ';

        // To send HTML mail, the Content-type header must be set
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

        // Additional headers
        $headers .= 'From: ProjectPortfolio <signup_robot@projectportfolio.io>' . "\r\n";
        $headers .= '' . "\r\n";
        $headers .= '' . "\r\n";

        // Mail it
        mail($to, $subject, $message, $headers);
    }
    ?>
