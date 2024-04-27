<?php
include_once "database/connection.php";

if(isset($_POST['create']))
{
$username = $_POST['username'];
$email = $_POST['email'];


if(filter_var($email, FILTER_VALIDATE_EMAIL))
{
    $sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";

    $result = mysqli_query($conn, $sql);

    if($result == true) 
    {
        header("Location: view.php");
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
}

}


?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
<div class="container" id="container">
        <h1>Create New User</h1>
        <form method="post" action="index.php">
            <input type="text" name="username" placeholder="Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit" name="create">Create User</button>
        </form>
    </div>
</body>
</html>