<?php
$db_server = "localhost";
$db_user = "root";
$db_password = "";
$db_name = "todo_app_php_mysql";

$connection = new mysqli($db_server, $db_user, $db_password, $db_name);
if ($connection->connect_error) {
    die("Database connection failed: " . $connection->connect_error);
}

return $connection;
