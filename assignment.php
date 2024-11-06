<?php
session_start(); // Start the session to manage user login

// Check if user is logged in
if (!isset($_SESSION['admission_number'])) {
    echo "<p>You must be logged in to upload assignments.</p>";
    echo "<a href='login.php'>Login Here</a>"; // Link to the login page
    exit(); // Stop further execution of the script
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #dff0d8; /* Light green background color */
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
            background-color: #ffffff;
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

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        form input[type="file"] {
            margin-bottom: 20px;
        }

        form button {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }

        .nav-button {
            display: inline-block;
            margin: 20px 0;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .nav-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <header>
        <h1>Assignments</h1>
    </header>

    <div class="container">
        <!-- Section for displaying uploaded assignments -->
        <h2>Available Assignments</h2>
        <table>
            <thead>
                <tr>
                    <th>Assignment Title</th>
                    <th>Description</th>
                    <th>Upload Date</th>
                    <th>Download</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Example data, replace this with your data fetching logic
                $assignments = [
                    ['title' => 'Math Assignment 1', 'description' => 'Basic Algebra', 'date' => '2024-09-01', 'file' => 'math_assignment1.pdf'],
                    ['title' => 'English Essay', 'description' => 'Essay on Modern Literature', 'date' => '2024-09-02', 'file' => 'english_essay.pdf'],
                    // Add more assignments as needed
                ];

                foreach ($assignments as $assignment) {
                    echo '<tr>';
                    echo '<td>' . htmlspecialchars($assignment['title']) . '</td>';
                    echo '<td>' . htmlspecialchars($assignment['description']) . '</td>';
                    echo '<td>' . htmlspecialchars($assignment['date']) . '</td>';
                    echo '<td><a href="path/to/assignments/' . htmlspecialchars($assignment['file']) . '" class="btn" download>Download</a></td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>

        <!-- Section for uploading new assignments -->
        <h2>Upload New Assignment</h2>

        <!-- Navigation Button to go to uploadAssignment.php -->
        <div style="margin-top: 20px;">
            <a href="uploadAssignment.php" class="btn">Upload Assignment</a>
        </div>

        <!-- Button to go back to studentportal.php -->
        <div style="margin-top: 20px;">
            <a href="studentportal.php" class="nav-button">Back to Student Portal</a>
        </div>

    </div>

</body>
</html>
