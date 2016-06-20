<?php
include "/etc/apache2/dbconf.php";
$con = mysqli_connect($rds_url, $rds_usr, $rds_pwd, $rds_database);

function user_count($dirty_email){
    $email = escape($dirty_email);

    $sql = "SELECT * FROM account_head WHERE email = '".$email."';";
    $result = query($sql);
    $count = mysqli_num_rows($result);

    return $count;
}

function fresh_logon($account){
    $time = time();
    $session = session_id();
    //echo "SESSION IS(".$session.") ";
    $sql = "UPDATE account_head SET status='logged-in', session='$session', last_seen=$time WHERE account=$account;";
    $result = query($sql);
    //TODO: verify that the above sql went through okay
}

function refresh_logon($dirty_email, $dirty_old_PPSESSID){
    return False;
}

//return true if the given password is correct for the given account id
function correct_password($account_id, $dirty_password){
    $password = escape($dirty_password);

    $sql = "SELECT (password) FROM account_credentials WHERE account=$account_id";
    $result = query($sql);



    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row["password"];

        return check_password($password, $stored_password);
    }

    return false;
}

function user_has_status($account_num, $status){
    $sql1 = "SELECT * FROM account_head WHERE account=$account_num";
    $result = query($sql1);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $stored_status = $row["status"];
        if($stored_status == $status){
            return true;
        }
    }
    return false;
}

function user_has_credentials($account_num, $username, $encrypted_password){
    $sql1 = "SELECT * FROM account_credentials WHERE account=$account_num";
    $result = query($sql1);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $stored_username = $row["username"];
        $stored_password = $row["password"];

        if($stored_username == $username){
            if($stored_password == $encrypted_password){
                return true;
            }
        }
    }
    return false;
}

function user_has_signup_pending($account_num){
    //TODO: validate that all numerical inputs are JUST numbers.

    $sql1 = "SELECT * FROM account_signup WHERE account=$account_num;";
    $result = query($sql1);

    if (mysqli_num_rows($result) == 1) {
        return true;
    }
    return false;
}

function query($query){
    global $con;
    return mysqli_query($con, $query);
}
function last_insert_id(){
    global $con;
    return mysqli_insert_id($con);
}

function account_id_from_code($verification_code){
    $sql = "SELECT account FROM account_signup WHERE code='$verification_code'";
    $result = query($sql);
    $id = -1;

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $id = $row["account"];
    }

    return $id;
}

function account_id_from_email($email){
    $sql = "SELECT account FROM account_head WHERE email='$email'";
    $result = query($sql);
    $id = -1;

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $id = $row["account"];
    }

    return $id;
}

function escape($string){
    global $con;
    return mysqli_real_escape_string($con, $string);
}
?>
