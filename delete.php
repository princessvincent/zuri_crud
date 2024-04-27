
<?php
include_once "database/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM users WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
}
?>