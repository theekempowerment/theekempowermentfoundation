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

// Fetch assignments from the database
$sql = "SELECT * FROM assignments";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$assignments = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Assignments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h1 {
            text-align: center;
            color: #ffcc00;
        }

        .assignment {
            margin-bottom: 20px;
            padding: 15px;
            border-bottom: 1px solid #ccc;
        }

        .assignment h2 {
            margin-top: 0;
            color: #555;
        }

        .assignment a {
            text-decoration: none;
            color: #0066cc;
            font-weight: bold;
        }

        .assignment a:hover {
            text-decoration: underline;
        }

        video {
            max-width: 100%;
            height: auto;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 10px 0;
        }

        .download-btn {
            display: inline-block;
            padding: 10px 15px;
            background-color: #ffcc00;
            color: #333;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .download-btn:hover {
            background-color: #ffaa00;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Uploaded Assignments</h1>

    <?php if (count($assignments) > 0): ?>
        <?php foreach ($assignments as $assignment): ?>
            <div class="assignment">
                <h2><?php echo htmlspecialchars($assignment['title']); ?></h2>
                <?php 
                $fileType = $assignment['file_type'];
                $filePath = htmlspecialchars($assignment['file_path']);

                // Display based on file type
                if (in_array($fileType, ['jpg', 'jpeg', 'png', 'gif'])) {
                    // Image
                    echo "<img src='$filePath' alt='Assignment Image'>";
                } elseif (in_array($fileType, ['mp4', 'webm', 'ogg'])) {
                    // Video
                    echo "<video controls>
                            <source src='$filePath' type='video/$fileType'>
                          Your browser does not support the video tag.
                          </video>";
                } else {
                    // Documents
                    echo "<a class='download-btn' href='$filePath' download>Download Document</a>";
                }
                ?>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>No assignments uploaded yet.</p>
    <?php endif; ?>
</div>

</body>
</html>
