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

function fresh_logon($email, $password, $new_PPSESSID){
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
    $sql1 = "INSERT INTO account_head (account, email, status)";
    $sql1 .= " VALUES (null, '$email', '$unactivated');";
    query($sql1);

    if(user_count($email) == 1){
        $new_account_num = account_id($email);
        $sql2 = "INSERT INTO account_signup (account, code, date_requested)";
        $sql2 .= " VALUES ($new_account_num, '".generate_string()."', NOW());";
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

function activate_user($username, $password, $activation_code){
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
