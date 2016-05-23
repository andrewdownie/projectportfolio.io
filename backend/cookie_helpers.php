<?php

function expire_cookie($cookieName){
    setcookie($cookieName, null, 1);
}
function end_php_session(){
    unset($_SESSION["PHPSESSID"]);
}

 ?>
