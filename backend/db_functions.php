<?php
include "/etc/apache2/dbconf.php";
$con = mysqli_connect($rds_url, $rds_usr, $rds_pwd, $rds_database);

function user_count($dirty_email){
    $email = escape($dirty_email);

    $sql = "SELECT * FROM users WHERE email = '".$email."';";
    $result = query($sql);
    $count = mysqli_num_rows($result);

    return $count;
}

function new_logon($email, $password, $new_PPSESSID){
    return False;
}

function refresh_logon($email, $old_PPSESSID){
    return False;
}

function create_user($dirty_email, $dirty_password){
    $email = escape($dirty_email);
    $password = escape($dirty_password);

    if(user_count($email) == 0){

        $salt = generate_string().'projectportfolio'.time();
        $salted_pass = md5($password.$salt);//TO DO: create strong hashing method

        $activation_code = md5(generate_string().'projectportfolio'.time());

        $sql = "INSERT INTO users (email, password, salt, PPSESSID, PPSESSID_expiry, login_status, account_status)";
        $sql .= "VALUES ('$email', '$salted_pass', '$salt', '$activation_code', ".(time() + 3600).", 'logged-out', 'unactivated');";
        $result = query($sql);

        if(user_count($email) == 1){
            echo "signup-success";
        }
        else{
            echo "signup-failure";
        }
    }
    else{//The email already exists, so we can't create_user
        echo "signup-exists";
    }

}

function activate_user($email, $activation_code){
    //yep
    return False;
}

function query($query){
    global $con;
    return mysqli_query($con, $query);
}

function escape($string){
    global $con;
    return mysqli_real_escape_string($con, $string);
}
?>
