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

function new_logon($email, $password, $new_PPSESSID){
    return False;
}

function refresh_logon($email, $old_PPSESSID){
    return False;
}

function create_user($dirty_email){
    $email = escape($dirty_email);

    if(user_count($email) != 0){
        echo "signup-failure";
        return;
    }

    if(valid_email_format($email) == false){
        echo "signup-failure";
        return;
    }


    $unactivated = "unactivated";
    $sql = "INSERT INTO account_head (account, email, status)";
    $sql .= " VALUES (null, '$email', '$unactivated');";
    query($sql);

    if(user_count($email) == 1){
        echo "last inserted id is: " . account_id($email);
        return;
        //select the row we just created, and then get the account#
        //insert the account number into the signup table, along
    }
    else{
        echo "signup-failure";
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

function account_id($email){
    $sql = "select account from account_head where email='$email'";
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
