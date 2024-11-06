<?php
// Database connection
$host = 'localhost';
$dbname = 'theek';
$username = 'root';
$password = '';
$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

// Check if a record already exists
$stmt = $conn->query("SELECT id FROM dashboard_content LIMIT 1");
$recordExists = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $profileName = $_POST['profileName'];
    $income = $_POST['income'];
    $progressData = $_POST['progressData'];
    $assignments = $_POST['assignments'];
    $opinionText = $_POST['opinionText'];
    $juniorSavings = $_POST['juniorSavings'];

    // Handle profile picture upload
    $profilePicturePath = null;
    if (!empty($_FILES['profilePicture']['name'])) {
        $targetDir = "uploads/";
        $profilePicturePath = $targetDir . basename($_FILES['profilePicture']['name']);
        move_uploaded_file($_FILES['profilePicture']['tmp_name'], $profilePicturePath);
    }

    if ($recordExists) {
        // Update existing record
        $stmt = $conn->prepare("UPDATE dashboard_content SET
            profile_name = :profileName,
            profile_picture = :profilePicture,
            income = :income,
            progress_data = :progressData,
            assignments = :assignments,
            opinion_text = :opinionText,
            junior_savings = :juniorSavings
            WHERE id = 1");
    } else {
        // Insert new record if none exists
        $stmt = $conn->prepare("INSERT INTO dashboard_content (
            profile_name, profile_picture, income, progress_data, assignments, opinion_text, junior_savings
        ) VALUES (
            :profileName, :profilePicture, :income, :progressData, :assignments, :opinionText, :juniorSavings
        )");
    }

    // Bind parameters
    $stmt->bindParam(':profileName', $profileName);
    $stmt->bindParam(':profilePicture', $profilePicturePath);
    $stmt->bindParam(':income', $income);
    $stmt->bindParam(':progressData', $progressData);
    $stmt->bindParam(':assignments', $assignments);
    $stmt->bindParam(':opinionText', $opinionText);
    $stmt->bindParam(':juniorSavings', $juniorSavings);

    // Execute the statement
    $stmt->execute();

    // Redirect to dashboard after processing
    header("Location: dashboard.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Content Upload</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0e5ec;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .upload-container {
            background: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button {
            background-color: #4facfe;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #00c6ff;
        }
    </style>
</head>
<body>

<div class="upload-container">
    <h1>Admin Content Upload</h1>
    <form action="uploadtomembers.php" method="post" enctype="multipart/form-data">

        <!-- Profile Section -->
        <div class="form-group">
            <label for="profileName">Profile Name:</label>
            <input type="text" id="profileName" name="profileName">
        </div>

        <div class="form-group">
            <label for="profilePicture">Profile Picture:</label>
            <input type="file" id="profilePicture" name="profilePicture" accept="image/*">
        </div>

        <!-- Income Section -->
        <div class="form-group">
            <label for="income">Total Income:</label>
            <input type="text" id="income" name="income">
        </div>

        <!-- Progress Section -->
        <div class="form-group">
            <label for="progressData">Progress Data (comma-separated):</label>
            <input type="text" id="progressData" name="progressData" placeholder="10,20,30,40,50">
        </div>

        <!-- Assignments Section -->
        <div class="form-group">
            <label for="assignments">Assignments (comma-separated):</label>
            <input type="text" id="assignments" name="assignments" placeholder="Assignment 1: Completed, Assignment 2: In Progress">
        </div>

        <!-- Opinion Section -->
        <div class="form-group">
            <label for="opinionText">Opinion Text:</label>
            <textarea id="opinionText" name="opinionText" rows="4"></textarea>
        </div>

        <!-- Junior Savings Section -->
        <div class="form-group">
            <label for="juniorSavings">Junior Savings Amount:</label>
            <input type="text" id="juniorSavings" name="juniorSavings">
        </div>

        <button type="submit">Upload Content</button>
    </form>
</div>

</body>
</html>
