<?php
// uploadtoagriculturelatest.php

// Database connection (update with your credentials)
$servername = "localhost"; // Your server name
$username = "root";        // Your database username
$password = "";            // Your database password
$dbname = "theek";        // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    // Handle media upload
    $targetDir = "uploads/"; // Directory where media will be uploaded
    $targetFile = $targetDir . basename($_FILES["media"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is a valid image or video
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["media"]["tmp_name"]);
        if ($check !== false || in_array($fileType, ['mp4', 'avi', 'mov'])) {
            // File is valid
        } else {
            echo "File is not valid.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($targetFile)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size (limit to 5MB)
    if ($_FILES["media"]["size"] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats (images and videos)
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Try to move the uploaded file
        if (move_uploaded_file($_FILES["media"]["tmp_name"], $targetFile)) {
            echo "The file " . htmlspecialchars(basename($_FILES["media"]["name"])) . " has been uploaded.";

            // Prepare statement to insert the update into the database
            $stmt = $conn->prepare("INSERT INTO agriculture_updates (title, description, media_path) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $title, $description, $targetFile);

            // Execute the statement
            if ($stmt->execute()) {
                echo "New record created successfully.";
            } else {
                echo "Error: " . $stmt->error; // Show error if insertion fails
            }
            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Display the upload form
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Latest Update</title>
</head>
<body>
    <h2>Upload Latest Update</h2>
    <form action="uploadtoagriculturelatest.php" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" rows="4" required></textarea><br><br>

        <label for="media">Upload Image/Video:</label><br>
        <input type="file" id="media" name="media" accept="image/*,video/*" required><br><br>

        <input type="submit" name="submit" value="Upload Update">
    </form>
</body>
</html>
