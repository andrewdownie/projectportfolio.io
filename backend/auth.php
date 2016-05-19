<?php
function login($email, $password){
    if($email === "user@example" && $password === "123"){
        echo "login-success";
    }
    else{
        echo "login-failure";
    }
    //echo "Email: ".$email." Password: ".$password;
}

 ?>
