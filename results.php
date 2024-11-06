<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['admission_number'])) {
    die("You need to log in to view your examination results.");
}

// Get the admission number from the session
$admission_number = $_SESSION['admission_number'];

// Database connection details
$servername = "localhost"; // Replace with your server name
$username = "root"; // Replace with your database username
$password = ""; // Replace with your database password
$dbname = "theek"; // Replace with your actual database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch results for the logged-in user
$sql = "SELECT admission_number, document, date_of_upload FROM examination_results WHERE admission_number = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $admission_number);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Examination Results</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        header {
            background: #4CAF50;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #333 3px solid;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #dff0d8; /* Light green background color */
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .delete-btn {
            background-color: #f44336;
        }

        .delete-btn:hover {
            background-color: #e53935;
        }
    </style>
</head>
<body>

    <header>
        <h1>Examination Results</h1>
    </header>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>Admission Number</th>
                    <th>Uploaded Document</th>
                    <th>Date of Upload</th>
                    <th>Download</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Check if there are results
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . htmlspecialchars($row['admission_number']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['document']) . '</td>';
                        echo '<td>' . htmlspecialchars($row['date_of_upload']) . '</td>';
                        echo '<td><a href="path/to/documents/' . htmlspecialchars($row['document']) . '" class="btn" download>Download</a></td>';
                        echo '<td><a href="delete_result.php?document=' . urlencode($row['document']) . '" class="btn delete-btn">Delete</a></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">No results found for your admission number.</td></tr>';
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>

<?php
// Close the connection
$stmt->close();
$conn->close();
?>
