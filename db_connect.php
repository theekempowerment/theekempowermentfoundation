<?php
$host = 'localhost'; // your server address
$db = 'theek'; // your database name
$user = 'root'; // your database username
$password = ''; // your database password

// Create connection
$data = new mysqli($host, $user, $password, $db);

// Check connection
if ($data->connect_error) {
    die("Connection failed: " . $data->connect_error);
}

// Optionally, set character set to UTF-8
$data->set_charset("utf8");
?>
