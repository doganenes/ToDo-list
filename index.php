<?php
include('db_connection.php');
include('get_todos.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <title>To Do App Project</title>
    <link rel="stylesheet" href="css/style.css" />
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <form method="post">
                <h1 class="text-center text-white todoTitle">To Do App</h1>
                <div class="col-12 d-flex flex-row justify-content-center">
                    <input name="todoInput" class="px-5" type="text" id="inputField" placeholder="Add todo.." />
                    <input name="submitBtn" type="submit" id="addToDo" value="+">
                </div>
                <div class="row">
                    <div class="col-12 d-flex flex-row justify-content-center">
                        <div class="todos" id="toDoContainer"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="js/main.js"></script>
</body>

</html>

<?php
include('db_connection.php');
if (isset($_POST['todoInput'])) {

    $todoInput = $_POST["todoInput"];

    $connection = "INSERT INTO `tbltodos` (todoInput) VALUES ($todoInput)";

    if (!$connection->query($connection) === TRUE) {
        echo "<script>alert('Database connection failed.')</script>";
    }
}
?>