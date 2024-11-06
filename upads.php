<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "theek";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $section = $_POST['section'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $contact = $_POST['contact'];
    $image = $_FILES['image']['name'];

    // Upload image file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($image);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    // Insert content into database
    $stmt = $conn->prepare("INSERT INTO advertisements (section, title, description, contact, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $section, $title, $description, $contact, $target_file);

    if ($stmt->execute()) {
        echo "Content uploaded successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Content Upload</title>
</head>
<body>
    <h2>Upload Advertisement Content</h2>
    <form action="upads.php" method="POST" enctype="multipart/form-data">
        <label for="section">Section:</label><br>
        <select name="section" id="section">
            <option value="Empowerment Program 1">Empowerment Program 1</option>
            <option value="Empowerment Program 2">Empowerment Program 2</option>
            <option value="Learning Program 1">Learning Program 1</option>
            <option value="Learning Program 2">Learning Program 2</option>
            <option value="Business Ad 1">Business Ad 1</option>
            <option value="Business Ad 2">Business Ad 2</option>
            <option value="Featured Videos">Featured Videos</option>
        </select><br><br>

        <label for="title">Title:</label><br>
        <input type="text" name="title" id="title" required><br><br>

        <label for="description">Description:</label><br>
        <textarea name="description" id="description" rows="4" cols="50" required></textarea><br><br>

        <label for="contact">Contact:</label><br>
        <input type="email" name="contact" id="contact" required><br><br>

        <label for="image">Upload Image:</label><br>
        <input type="file" name="image" id="image"><br><br>

        <input type="submit" value="Upload Content">
    </form>
</body>
</html>
