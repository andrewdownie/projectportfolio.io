<?php
include "/etc/apache2/dbconf.php" ;
$con = mysqli_connect($rds_url, $rds_usr, $rds_pwd, $rds_database);

function user_exists($email){
    $email = escape($email);

    $sql = "SELECT * FROM users WHERE email = ". $email;
    $result = query($sql);
    return $result;
    if($result == 1){
        return "true";
    }
    return "false";
}

function new_logon($email, $password, $new_PPSESSID){

}

function refresh_logon($email, $old_PPSESSID){

}

function query($query){
    global $con;
    return mysqli_query($con, $query);
}

function escape($string){
    return mysql_real_escape_string($string);
}
 ?>
