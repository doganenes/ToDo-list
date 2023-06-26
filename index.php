<?php
include('db_connection.php');

if (isset($_GET['id'])) {
    $taskId = $_GET['id'];
    $updateSQL = "UPDATE tbltodos SET status = 1 WHERE id = $taskId";
    if ($connection->query($updateSQL) !== true) {
        echo "An error occurred while todo as completed: " . $connection->error;
    }
}

if (isset($_POST['submit'])) {
    $task = $_POST['task'];

    $insertSql = "INSERT INTO tbltodos (task) VALUES ('$task')";
    if ($connection->query($insertSql) !== true) {
        echo "An error occurred while adding a todo: " . $connection->error;
    }
}

$sql = "SELECT * FROM tbltodos";
$result = $connection->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>To Do App Project</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .completed {
            display: none;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <form method="POST" action="">
            <h1 class="text-center text-white todoTitle">To Do App</h1>
            <div class="col-12 d-flex flex-row justify-content-center">
                <input name="task" class="px-5" type="text" id="inputField" placeholder="Add todo.." required>
                <button type="submit" name="submit" class="btn btn-lg btn-primary">+</button>
            </div>
        </form>
        <div class="row">
            <div class="col-12 d-flex flex-row justify-content-center">
                <div class="todos" id="toDoContainer">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $taskId = $row['id'];
                            $taskName = $row['task'];
                            $status = $row['status'];

                            $taskClass = $status ? 'completed' : '';

                            echo "<div class='task $taskClass'>";
                            echo "<span>$taskName</span>";
                            echo "<a href='?id=$taskId' class='btn btn-danger btn-sm'>Delete</a>";
                            echo "</div>";
                        }
                    } else {
                        echo "No todos found.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>