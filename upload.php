<?php
session_start(); // Start the session

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "theek";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get upload type and page
    $uploadType = isset($_POST['upload_type']) ? $_POST['upload_type'] : '';
    $page = isset($_POST['page']) ? $_POST['page'] : '';

    // Define upload directory based on type
    $uploadDir = 'uploads/' . $page . '/' . $uploadType . '/';
    
    // Create the directory if it doesn't exist
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    
    // Initialize arrays for handling multiple file uploads
    $filePaths = [];
    $fileText = isset($_POST['description']) ? $_POST['description'] : '';

    // Process based on selected type
    if (isset($_FILES['file']) && is_array($_FILES['file']['tmp_name'])) {
        foreach ($_FILES['file']['tmp_name'] as $key => $tmp_name) {
            $fileName = $_FILES['file']['name'][$key];
            $fileTmpPath = $_FILES['file']['tmp_name'][$key];
            $destPath = $uploadDir . basename($fileName);
            if (move_uploaded_file($fileTmpPath, $destPath)) {
                $filePaths[] = $destPath;
            }
        }
    }

    // Insert each file into the database
    if (!empty($filePaths)) {
        $stmt = $conn->prepare("INSERT INTO resources (file_name, file_type, file_path, file_text) VALUES (?, ?, ?, ?)");
        foreach ($filePaths as $filePath) {
            $fileName = basename($filePath);
            $fileType = $uploadType;
            $stmt->bind_param('ssss', $fileName, $fileType, $filePath, $fileText);
            $stmt->execute();
        }

        // Set success message in session
        if ($stmt->affected_rows > 0) {
            $_SESSION['upload_message'] = "File(s) uploaded and stored successfully!";
        } else {
            $_SESSION['upload_message'] = "Failed to upload files.";
        }

        $stmt->close();
    } else {
        $_SESSION['upload_message'] = "No files were uploaded.";
    }

    // Redirect back to admin dashboard
    header("Location: admintest.php");
    exit();
}

$conn->close();
?>
