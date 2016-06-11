<?php
function verify_account($dirty_username, $dirty_password, $dirty_activation_code){
    $username = escape($dirty_username);
    $password = escape($dirty_password);
    $code = escape($dirty_activation_code);

    if(!valid_password_format($password)){
        echo "verify-error";
        return;
    }

    $valid_username = valid_username_format($username);
    if($valid_username != "valid-username"){
        echo $valid_username;
        return;
    }


    $account_id = account_id_from_code($code);

    $sql1 = "SELECT * FROM account_signup WHERE code='$code'";
    $result = query($sql1);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $date_requested = $row["date_requested"];
        $expires = $date_requested + 86400;

        if(time() > $expires){
            echo "validation-expired";
            return;
        }

        $encrypted_password = encrypt_password($password);


        $sql2 = "UPDATE account_head SET status='logged-out' WHERE account=$account_id;";
        query($sql2);

        if(user_has_status($account_id, 'logged-out') == false){
            echo 'verify-error';
            return;
        }

        $sql3 = "INSERT INTO account_credentials (account, username, password)";
        $sql3 .= " VALUES ($account_id, '$username', '$encrypted_password');";
        query($sql3);

        if(user_has_credentials($account_id, $username, $encrypted_password) == false){
            echo 'verify-error';
            return;
        }

        $sql4 = "DELETE FROM account_signup WHERE account=$account_id;";
        query($sql4);

        if(user_has_signup_pending($account_id)){
            echo 'verify-error';
            return;
        }

        echo "verify-success";
        return;
    }

    echo 'verify-error';
}
?>
