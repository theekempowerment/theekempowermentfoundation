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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Uploaded Content</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; }
        .container { padding: 20px; }
        h2 { margin-top: 0; }
        .view-content { display: flex; flex-direction: column; }
        .page-section { margin-bottom: 20px; }
        .view-content img, .view-content video { max-width: 100px; margin: 5px; display: block; }
        .view-content p { margin: 0; padding: 5px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h1>View Uploaded Content</h1>
        <div class="view-content">
            <?php foreach ($pages as $page): ?>
                <div class="page-section">
                    <h2><?php echo ucfirst(basename($page, '.php')); ?></h2>
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
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
