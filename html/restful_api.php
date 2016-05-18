<?php

if($_POST['action'] == "follow") {
  /**
   * we can pass any action like block, follow, unfollow, send PM....
   * if we get a 'follow' action then we could take the user ID and create a SQL command
   * but with no database, we can simply assume the follow action has been completed and return 'ok'
  **/

  echo "ok";
}


?>
