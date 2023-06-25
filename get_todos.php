 <?php
    include('db_connection.php');

    if (!$conn) {
        die("Database connection failed.");
    }

    $stmt = $conn->query("SELECT * FROM tbltodos");
    $todos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $json = json_encode($todos);

    echo $json;
    ?> 