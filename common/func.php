<?php
function bd_connect()
{
    global $db;
    $db = new mysqli("db", "user", "password", "toplegalconsulting");

    // Проверяем соединение
    if ($db->connect_errno) {
        printf("Connect failed: %s\n", $db->connect_error);
        exit();
    }

    // Устанавливаем кодировку соединения
    if (!$db->set_charset("utf8mb4")) {
        printf("Error loading character set utf8mb4: %s\n", $db->error);
        exit();
    }
}
