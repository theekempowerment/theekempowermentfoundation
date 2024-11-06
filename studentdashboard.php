<?php
// Start the session
session_start();

// Check if the student is logged in
if (!isset($_SESSION['student_id'])) {
    die("You are not logged in. Please log in first.");
}
$student_id = $_SESSION['student_id'];

// Connect to the database
$host = 'localhost';
$user = 'root'; // Database username
$password = ''; // Database password
$dbname = 'theek'; // Database name

$conn = new mysqli($host, $user, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch student personal information from the database
$sql = "SELECT CONCAT(first_name, ' ', middle_name, ' ', last_name) AS full_name, email, phone, mode_of_learning, additional_course, physical_address, city FROM student_registrations WHERE student_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $student_id);
$stmt->execute();
$result = $stmt->get_result();

$student = $result->fetch_assoc();

// Handle form submission for updating the fields
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_phone = $_POST['phone_number'];
    $new_mode_of_learning = $_POST['mode_of_learning'];
    $new_additional_course = $_POST['additional_course'];
    $new_address = $_POST['physical_address'];
    $new_city = $_POST['city'];

    $update_sql = "UPDATE student_registrations SET phone = ?, mode_of_learning = ?, additional_course = ?, physical_address = ?, city = ? WHERE student_id = ?";
    $update_stmt = $conn->prepare($update_sql);
    $update_stmt->bind_param("sssssi", $new_phone, $new_mode_of_learning, $new_additional_course, $new_address, $new_city, $student_id);

    if ($update_stmt->execute()) {
        echo "<p style='color: green;'>Information updated successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error updating information!</p>";
    }
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-image: url('background.jpg'); /* Background image at the top */
            background-size: cover;
            height: 200px;
            color: white;
            text-align: center;
            padding: 50px 0;
        }
        h1 {
            margin: 0;
        }
        .personal-info, .update-info {
            background-color: #f9f9f9;
            padding: 20px;
            margin: 20px 0;
            border-radius: 8px;
        }
        input[type="text"], select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Welcome to Your Dashboard</h1>
</div>

<div class="container">
    <div class="personal-info">
        <h2>Your Personal Information</h2>
        <p><strong>Full Name:</strong> <?php echo htmlspecialchars($student['full_name']); ?></p>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($student['email']); ?></p>
        <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($student['phone_number']); ?></p>
        <p><strong>Mode of Learning:</strong> <?php echo htmlspecialchars($student['mode_of_learning']); ?></p>
        <p><strong>Additional Course:</strong> <?php echo htmlspecialchars($student['additional_course']); ?></p>
        <p><strong>Physical Address:</strong> <?php echo htmlspecialchars($student['physical_address']); ?></p>
        <p><strong>City:</strong> <?php echo htmlspecialchars($student['city']); ?></p>
    </div>

    <div class="update-info">
        <h2>Update Your Information</h2>
        <form action="" method="POST">
            <label for="phone_number">Phone Number:</label>
            <input type="text" id="phone_number" name="phone_number" value="<?php echo htmlspecialchars($student['phone_number']); ?>" required>

            <label for="mode_of_learning">Mode of Learning:</label>
            <select id="mode_of_learning" name="mode_of_learning">
                <option value="Online" <?php echo ($student['mode_of_learning'] == 'Online') ? 'selected' : ''; ?>>Online</option>
                <option value="Onsite" <?php echo ($student['mode_of_learning'] == 'Onsite') ? 'selected' : ''; ?>>Onsite</option>
                <option value="Hybrid" <?php echo ($student['mode_of_learning'] == 'Hybrid') ? 'selected' : ''; ?>>Hybrid</option>
            </select>

            <label for="additional_course">Additional Course:</label>
            <input type="text" id="additional_course" name="additional_course" value="<?php echo htmlspecialchars($student['additional_course']); ?>">

            <label for="physical_address">Physical Address:</label>
            <input type="text" id="physical_address" name="physical_address" value="<?php echo htmlspecialchars($student['physical_address']); ?>" required>

            <label for="city">City:</label>
            <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($student['city']); ?>" required>

            <button type="submit">Update Information</button>
        </form>
    </div>
</div>

</body>
</html>
