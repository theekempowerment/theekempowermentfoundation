<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'theek');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// File upload logic
$uploadSuccess = false; // Variable to track the upload success
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $file_name = $_FILES["file"]["name"];
    $file_tmp = $_FILES["file"]["tmp_name"];
    $file_size = $_FILES["file"]["size"];
    $file_type = $_FILES["file"]["type"];
    
    // Specify upload directory
    $upload_dir = "uploads/";
    
    // Ensure upload directory exists
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0755, true);
    }
    
    // Target file path
    $file_path = $upload_dir . basename($file_name);

    // Move the uploaded file to the server
    if (move_uploaded_file($file_tmp, $file_path)) {
        // Insert file data into the database
        $sql = "INSERT INTO resources (file_name, file_type, file_path) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sss", $file_name, $file_type, $file_path);
        $stmt->execute();
        
        if ($stmt->affected_rows > 0) {
            $uploadSuccess = true; // Set success flag
        }
        $stmt->close();
    }
}

// Close the connection
$conn->close();

// Redirect to the admin dashboard with a success message
if ($uploadSuccess) {
    echo "<script>
            alert('File uploaded successfully.');
            window.location.href = 'mainadmin.php'; // Adjust this to your actual admin dashboard file
          </script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload to Resources</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1 { color: #333; }
        form { margin-top: 20px; }
        input[type="file"] { padding: 5px; }
        input[type="submit"] { padding: 10px 20px; background-color: #007BFF; color: white; border: none; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>

<h1>Upload To Resources</h1>

<form action="uploadtoresources.php" method="post" enctype="multipart/form-data">
    <label for="file">Select file to upload:</label>
    <input type="file" name="file" id="file" required>
    <br><br>
    <input type="submit" value="Upload File">
</form>

</body>
</html>
