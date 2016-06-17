<?php
function create_account($dirty_email){
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
        $signupString = generate_string();
        $sql2 = "INSERT INTO account_signup (account, code, date_requested)";
        $sql2 .= " VALUES ($new_account_num, '$signupString', $time);";
        query($sql2);

        $sql3 = "SELECT * FROM account_signup WHERE account=$new_account_num";
        $result = query($sql3);
        $count = mysqli_num_rows($result);

        //mail($email,"ProjectPortfolio - Complete signup", "This is the msg telling you to sign up, fart.");
        send_signup_email($email, $signupString);

        if($count == 1){
            echo "signup-success";
            return;
        }
        else{
            $sql4 = "DELETE FROM account_signup WHERE account=$new_account_num";
            $sql5 = "DELETE FROM account_head WHERE account=$new_account_num";
            query($sql4);
            query($sql5);
        }
    }
    else{
        echo "deleting head table failed";
        $sql6 = "DELETE FROM account_head WHERE email=$email";
        query($sql6);
    }

    echo "signup-failure";
}




?>
