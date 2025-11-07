<?php
$host = "127.0.0.1";
$user = "serveruser";
$pass = "StrongPassword123!";
$dbname = "server_ssh";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
