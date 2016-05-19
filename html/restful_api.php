<?php
//okay, so it looks like it will run the code in this file (and not the functions) so
//I need to do a select based on the given post info, and decide what function to run

//echo "poo here";//this works (ajax request to this file will return 'poo here')

if($_POST['meow'] == "123"){
    echo "first option";
}
else if($_POST['meow'] === "456"){
    echo "second option";
}
else{
    //echo "fart nugget";
    $arrMagic = "";
    foreach ($_POST as $key => $entry)
    {
        $arrMagic .= $key . ": " . $entry . "<br>";
    }
    $arrMagic .= "<h1>pee</h1>";
    //echo $arrMagic;
    print_r($_POST['meow']);
}


function login(){
    if($_POST['action'] == "follow") {
        /**
        * we can pass any action like block, follow, unfollow, send PM....
        * if we get a 'follow' action then we could take the user ID and create a SQL command
        * but with no database, we can simply assume the follow action has been completed and return 'ok'
        **/

        echo "ok";
    }
}

//$bar = isset($_POST['bar']) ? $_POST['bar'] : null;



?>
