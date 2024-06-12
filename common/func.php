<?php
function bd_connect()
  {
   global $db;
$db = new mysqli("localhost", "root", "", "toplegalconsulting" );
/* проверяем соединение */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}


}
?>