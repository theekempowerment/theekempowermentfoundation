<?php
$servername = "localhost"; // or your database server
$username = "root"; // your database username, typically 'root'
$password = ""; // your database password, typically empty for 'root'
$dbname = "theek"; // your database name, ensure it's created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
