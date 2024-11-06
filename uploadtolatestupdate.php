<?php
// Database connection (update with your database credentials)
$host = 'localhost';
$dbname = 'theek';
$username = 'root';
$password = '';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $media_type = $_POST['media_type'];

    // Handle file upload
    $target_dir = "uploads/";
    $file_name = basename($_FILES["media"]["name"]);
    $target_file = $target_dir . $file_name;
    $media_path = '';

    if (move_uploaded_file($_FILES["media"]["tmp_name"], $target_file)) {
        $media_path = $target_file;

        // Insert data into the database
        $stmt = $conn->prepare("INSERT INTO latest_updates(title, description, media_type, media_path) VALUES (:title, :description, :media_type, :media_path)");
        $stmt->execute([
            'title' => $title,
            'description' => $description,
            'media_type' => $media_type,
            'media_path' => $media_path
        ]);

        echo "Upload successful!";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Agriculture Updates</title>
</head>
<body>
    <h1>Upload New Agriculture Update</h1>
    <form action="uploadtolatestupdate.php" method="POST" enctype="multipart/form-data">
        <label for="title">Title:</label><br>
        <input type="text" id="title" name="title" required><br><br>

        <label for="description">Description:</label><br>
        <textarea id="description" name="description" required></textarea><br><br>

        <label for="media_type">Media Type:</label><br>
        <select id="media_type" name="media_type" required>
            <option value="image">Image</option>
            <option value="video">Video</option>
        </select><br><br>

        <label for="media">Upload Image/Video:</label><br>
        <input type="file" id="media" name="media" required><br><br>

        <button type="submit">Upload</button>
    </form>
</body>
</html>
