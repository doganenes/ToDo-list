<?php
include('db_connection.php');

$sql = "SELECT * FROM tbltodos";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $taskId = $row['id'];
        $taskName = $row['task'];
        $completed = $row['status'];

        $taskClass = $completed ? 'completed' : '';

        echo "<div class='task'>";
        echo "<span class='$taskClass'>$taskName</span>";
        echo "<a href='delete.php?id=$taskId' class='btn btn-danger btn-sm'>Delete</a>";
        echo "</div>";
    }
} else {
    echo "No todos found.";
}
