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

function fresh_logon($dirty_email, $dirty_password, $dirty_new_PPSESSID){
    return False;
}

function refresh_logon($dirty_email, $dirty_old_PPSESSID){
    return False;
}

//return true if the given password is correct for the given account id
function correct_password($account_id, $dirty_password){
    $password = clean($dirty_password);

    $sql = "SELECT (password) FROM account_credentials WHERE account=$account_id";
    $result = query($sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = $row["password"];

        return check_password($password, $stored_password);
    }

    return false;
}

function create_user($dirty_email){
    $email = escape($dirty_email);

    if(user_count($email) != 0){
        echo "signup-failure";
        return;
    }

    if(validate_email($email) == false){
        echo "signup-failure";
        return;
    }


    $pending_verification = "pending-verification";
    $sql1 = "INSERT INTO account_head (account, email, status)";
    $sql1 .= " VALUES (null, '$email', '$pending_verification');";
    query($sql1);

    if(user_count($email) == 1){
        $new_account_num = account_id_from_email($email);

        $time = time();
        $sql2 = "INSERT INTO account_signup (account, code, date_requested)";
        $sql2 .= " VALUES ($new_account_num, '".generate_string()."', $time);";
        query($sql2);

        $sql3 = "SELECT * FROM account_signup WHERE account=$new_account_num";
        $result = query($sql3);
        $count = mysqli_num_rows($result);

        if($count == 1){
            echo "signup-success";
            return;
        }
        else{
            $sql4 = "delete from account_signup where account=$new_account_num";
            $sql5 = "delete from account_head where account=$new_account_num";
            query($sql4);
            query($sql5);
        }
    }
    else{
        echo "deleting head table failed";
        $sql6 = "delete from account_head where email=$email";
        query($sql6);
    }

    echo "signup-failure";
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

function account_id_from_code($verification_code){
    $sql = "select account from account_signup where code='$verification_code'";
    $result = query($sql);
    $id = -1;

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $id = $row["account"];
    }

    return $id;
}

function account_id_from_email($email){
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
