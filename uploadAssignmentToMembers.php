<?php
// Database connection
$host = 'localhost';
$dbname = 'theek';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// File upload logic
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $file = $_FILES['file'];

    // File variables
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];

    // Allowed file extensions
    $allowed = ['pdf', 'doc', 'docx', 'jpg', 'jpeg', 'png', 'gif', 'mp4', 'webm', 'ogg'];

    // Get file extension
    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

    // Validate file type
    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 50000000) { // Limit to 50MB
                $fileNameNew = uniqid('', true) . "." . $fileExt;
                $fileDestination = 'uploads/' . $fileNameNew;

                // Move file to 'uploads' directory
                move_uploaded_file($fileTmpName, $fileDestination);

                // Insert file information into database
                $sql = "INSERT INTO assignments (title, file_path, file_type) VALUES (?, ?, ?)";
                $stmt = $pdo->prepare($sql);
                if ($stmt->execute([$title, $fileDestination, $fileExt])) {
                    // Redirect to the form page with a success message
                    header("Location: uploadAssignment.php?success=1");
                    exit();
                } else {
                    echo "Failed to save assignment in the database.";
                }
            } else {
                echo "Your file is too large. Maximum allowed size is 50MB.";
            }
        } else {
            echo "There was an error uploading your file.";
        }
    } else {
        echo "Invalid file type. Only PDF, DOC, DOCX, JPG, JPEG, PNG, GIF, MP4, WEBM, OGG are allowed.";
    }
}
?>
