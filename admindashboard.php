<?php
// Database connection (adjust with your details)
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

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $page = $_POST['page'];
    $text = $_POST['text'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $image = $_FILES['image']['name'];
        $target_dir = "uploads/images/";
        $target_file = $target_dir . basename($image);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES['image']['tmp_name']);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check file size (limit to 5MB)
        if ($_FILES['image']['size'] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        $allowedFormats = ['jpg', 'jpeg', 'png', 'gif'];
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                $sql = "INSERT INTO uploads (page, type, path, text) VALUES ('$page', 'image', '$target_file', '$text')";
                if ($conn->query($sql) === TRUE) {
                    echo "The image ". htmlspecialchars(basename($_FILES['image']['name'])). " has been uploaded.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your image.";
            }
        }
    }

    // Handle video upload
    if (isset($_FILES['video']) && $_FILES['video']['error'] == 0) {
        $video = $_FILES['video']['name'];
        $target_dir = "uploads/videos/";
        $target_file = $target_dir . basename($video);
        $uploadOk = 1;
        $videoFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Allow certain file formats
        $allowedFormats = ['mp4', 'avi', 'mov', 'wmv'];
        if (!in_array($videoFileType, $allowedFormats)) {
            echo "Sorry, only MP4, AVI, MOV & WMV files are allowed.";
            $uploadOk = 0;
        }

        // Check file size (limit to 50MB)
        if ($_FILES['video']['size'] > 50000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        } else {
            if (move_uploaded_file($_FILES['video']['tmp_name'], $target_file)) {
                $sql = "INSERT INTO uploads (page, type, path, text) VALUES ('$page', 'video', '$target_file', '$text')";
                if ($conn->query($sql) === TRUE) {
                    echo "The video ". htmlspecialchars(basename($_FILES['video']['name'])). " has been uploaded.";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
            } else {
                echo "Sorry, there was an error uploading your video.";
            }
        }
    }
}

// Fetch uploaded content for viewing
$uploads = [];
$pages = ['agriculture.php', 'business.php', 'empowerment.php', 'entertainment.php', 'education.php', 'resources.php'];
foreach ($pages as $page) {
    $result = $conn->query("SELECT * FROM uploads WHERE page='$page'");
    while ($row = $result->fetch_assoc()) {
        $uploads[$page][] = $row;
    }
}
$conn->close();
?>


<?php include 'header.php'; ?>

<br><br>
<br><br>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .container { display: flex; height: 100vh; }
        .upload-form { width: 25%; padding: 20px; box-sizing: border-box; border-right: 1px solid #ddd; }
        .view-content { width: 75%; padding: 20px; box-sizing: border-box; overflow-y: auto; }
        h2 { margin-top: 0; }
        label { display: block; margin-bottom: 5px; }
        select, textarea, input[type="file"], input[type="submit"] { width: 100%; margin-bottom: 15px; }
        input[type="file"] { border: 1px solid #ccc; padding: 5px; }
        textarea { resize: vertical; }
        .file-info { color: #555; font-style: italic; }
        .view-content img, .view-content video { max-width: 100px; margin: 5px; display: block; }
        .view-content p { margin: 0; padding: 5px 0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="upload-form">
            <h2>Upload Content</h2>
            <form action="admindashboard.php" method="post" enctype="multipart/form-data">
                <label for="page">Page:</label>
                <select name="page" id="page" required>
                    <option value="agriculture.php">Agriculture</option>
                    <option value="home.php">Home</option>
                    <option value="business.php">Business</option>
                    <option value="empowerment.php">Empowerment</option>
                    <option value="entertainment.php">Entertainment</option>
                    <option value="education.php">Education</option>
                    <option value="resources.php">Resources</option>
                </select>

                <label for="text">Text (optional):</label>
                <textarea name="text" id="text" rows="4" placeholder="Enter optional text here"></textarea>

                <label for="image">Select image to upload:</label>
                <input type="file" name="image" id="image">
                <div class="file-info">No file chosen</div>

                <label for="video">Select video to upload:</label>
                <input type="file" name="video" id="video">
                <div class="file-info">No file chosen</div>

                <input type="submit" value="Upload Content" name="submit">
            </form>
        </div>

        <div class="view-content">
            <h2>View Uploaded Content</h2>
            <?php foreach ($pages as $page): ?>
                <h3><?php echo ucfirst(basename($page, '.php')); ?></h3>
                <?php if (!empty($uploads[$page])): ?>
                    <?php foreach ($uploads[$page] as $upload): ?>
                        <?php if ($upload['type'] == 'image'): ?>
                            <img src="<?php echo $upload['path']; ?>" alt="Image">
                        <?php elseif ($upload['type'] == 'video'): ?>
                            <video controls src="<?php echo $upload['path']; ?>"></video>
                        <?php endif; ?>
                        <p><?php echo htmlspecialchars($upload['text']); ?></p>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p>No content uploaded for this page.</p>
                <?php endif; ?>
                <br>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>