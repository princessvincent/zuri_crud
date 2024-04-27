
<?php
include_once "database/connection.php";

$sql = "SELECT * FROM users";

$view = mysqli_query($conn, $sql);
// $result = $conn->query($sql);

$users = array();

if (mysqli_num_rows($view) > 0) {
    while ($row = $view->fetch_assoc()) {
        
        $users[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Application - Read</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1>Users List</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Userame</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user["id"]; ?></td>
                <td><?php echo $user["username"]; ?></td>
                <td><?php echo $user["email"]; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $user["id"]; ?>">Edit</a>
                    <a href="delete.php?id=<?php echo $user["id"]; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>