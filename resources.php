<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'theek');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch resources from the database, including the uploaded_on column
$sql = "SELECT file_name, file_type, file_path, uploaded_on FROM resources ORDER BY uploaded_on DESC";
$result = $conn->query($sql);
?>

<?php
include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Download Resources</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        h1 { color: #333; }
        table { width: 100%; border-collapse: collapse; }
        table, th, td { border: 1px solid #ddd; }
        th, td { padding: 12px; text-align: left; }
        a { color: #007BFF; text-decoration: none; }
        a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<h1>Available Resources for Download</h1>

<?php if ($result->num_rows > 0): ?>
    <table>
        <tr>
            <th>File Name</th>
            <th>File Type</th>
            <th>File Size (KB)</th>
            <th>Date Uploaded</th>
            <th>Download</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['file_name']); ?></td>
                <td><?php echo htmlspecialchars($row['file_type']); ?></td>
                <td><?php echo round(filesize($row['file_path']) / 1024, 2); ?></td>
                <td><?php echo htmlspecialchars($row['uploaded_on']); ?></td>
                <td><a href="<?php echo htmlspecialchars($row['file_path']); ?>" download>Download</a></td>
            </tr>
        <?php endwhile; ?>
    </table>
<?php else: ?>
    <p>No resources available.</p>
<?php endif; ?>

</body>
</html>

<?php
$conn->close();
?>
