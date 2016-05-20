<?php
include "/etc/apache2/dbconf.php";
$con = mysqli_connect($rds_url, $rds_usr, $rds_pwd, $rds_database);

function user_exists($email){
    $email = escape($email);

    $sql = "SELECT * FROM users WHERE email = '".$email."';";
    $result = query($sql);
    $count = mysqli_num_rows($result);

    if($count == 1){
        return True;
    }
    return False;
}

function new_logon($email, $password, $new_PPSESSID){
    return False;
}

function refresh_logon($email, $old_PPSESSID){
    return False;
}

function create_user($email, $password){
    $email = escape($email);
    $password = escape($password);

    if(user_exists($email) === True){
        return False;
    }

    $salt = generate_string().'projectportfolio'.time();
    $salted_pass = md5($password.$salt);

    $activation_code = md5(generate_string().'projectportfolio'.time());

    $sql = "INSERT INTO user (email, password, salt, PPSESSID, PPSESSID_expiry, login_status, account_status)";
    $sql .= "VALUES ($email, $salted_pass, $salt, $validation_code, ".(time() + 3600).", 'logged-out', 'unactivated');";
    $result = query($sql);

    if(user_exists($email)){
        return True;
    }
    return False;
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
    return mysql_real_escape_string($string);
}
?>
