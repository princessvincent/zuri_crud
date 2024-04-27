<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "zuri";

$conn = mysqli_connect($hostname, $username, $password, $database);

// if ($conn === false)
// {
//     echo "Error connecting to";
// }else{
// echo "Database connection established";
// }