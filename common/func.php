<?php
function bd_connect()
{
    global $db;
    $db = new mysqli("localhost", "root", "", "toplegalconsulting");

    // проверяем соединение
    if ($db->connect_errno) {
        printf("Connect failed: %s\n", $db->connect_error);
        exit();
    }
}
