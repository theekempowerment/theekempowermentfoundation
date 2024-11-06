<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "theek"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch all columns from 'members' table
$sql = "SELECT * FROM members"; // Fetch all columns from the members table
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Members</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h2>Members List</h2>

<?php
if ($result->num_rows > 0) {
    // Start the table
    echo "<table>";
    
    // Fetch column names dynamically
    $columns = array_keys($result->fetch_assoc());
    echo "<tr>";
    foreach ($columns as $column) {
        echo "<th>" . ucfirst($column) . "</th>";
    }
    echo "</tr>";
    
    // Reset pointer to first row
    $result->data_seek(0);

    // Fetch and display each row's data
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        foreach ($row as $value) {
            echo "<td>" . $value . "</td>";
        }
        echo "</tr>";
    }

    // End the table
    echo "</table>";
} else {
    echo "<p>No members found</p>";
}

// Close the database connection
$conn->close();
?>

</body>
</html>
