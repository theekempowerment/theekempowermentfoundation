<?php include 'header.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Business Updates - Theek International</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"], input[type="file"], textarea {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #0056b3;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #004494;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload Business Update</h2>
    <form action="business.php" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>

        <label for="media">Upload Image/Video:</label>
        <input type="file" id="media" name="media" accept="image/*,video/*" required>

        <input type="submit" value="Upload">
    </form>

    <?php
    // Handle the file upload
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

        // Get form data
        $title = $conn->real_escape_string($_POST['title']);
        $description = $conn->real_escape_string($_POST['description']);
        $media = $_FILES['media'];

        // Define upload directory and file path
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($media['name']);
        
        // Check if the upload directory exists, if not, create it
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Move uploaded file to the designated directory
        if (move_uploaded_file($media['tmp_name'], $uploadFile)) {
            // Determine media type
            $mediaType = (strpos($media['type'], 'image') === 0) ? 'image' : 'video';

            // Insert into database
            $sql = "INSERT INTO business_updates (title, description, media_url, media_type) VALUES ('$title', '$description', '$uploadFile', '$mediaType')";

            if ($conn->query($sql) === TRUE) {
                echo "<p>Upload successful!</p>";
            } else {
                echo "<p>Error inserting record: " . $conn->error . "</p>"; // Added detailed error message
            }
        } else {
            echo "<p>File upload failed! Error code: " . $media['error'] . "</p>"; // Added error code for debugging
        }

        // Close the database connection
        $conn->close();
    }
    ?>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
