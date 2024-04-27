
<?php
include_once "database/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM users WHERE id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
    } else {
        echo "User not found.";
    }

    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["update"])) {
    $id = $_POST["id"];
    $name = $_POST["username"];
    $email = $_POST["email"];

    $sql = "UPDATE users SET username = '$name', email = '$email' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: view.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Application - Update</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Edit User</h1>
        <form method="post" action="edit.php">
            <input type="hidden" name="id" value="<?php echo $user["id"]; ?>">
            <input type="text" name="username" value="<?php echo $user["username"]; ?>" required>
            <input type="email" name="email" value="<?php echo $user["email"]; ?>" required>
            <button type="submit" name="update">Update User</button>
        </form>
    </div>
</body>
</html>