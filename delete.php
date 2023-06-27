<?php
include('db_connection.php');

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];

    $sql = "UPDATE tbltodos SET status = 1 WHERE id = $taskId";
    if (!$connection->query($sql) === true) {
        echo "An error occurred while updating the todo: " . $connection->error;
    }
}

header("Location: index.php");
exit();
