<?php
// Include your database connection file
require_once 'db_connect.php'; // Ensure you have this file for DB connection

// Fetch member details
$query = "SELECT * FROM members LIMIT 1"; // Assuming you want to fetch one member; adjust as necessary
$stmt = $data->prepare($query);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $member = $result->fetch_assoc(); // Fetch the member's details
} else {
    echo "No member found!";
    exit();
}

// Update member details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    // Add additional fields as necessary

    // Update query
    $update_query = "UPDATE members SET first_name = ?, last_name = ?, email = ? WHERE id = ?"; // Specify the condition to update a particular member
    $update_stmt = $data->prepare($update_query);
    
    // Bind parameters; assuming 'id' is an identifier for the member
    $update_stmt->bind_param("sssi", $first_name, $last_name, $email, $member['id']); // Bind the member's id for the update condition

    if ($update_stmt->execute()) {
        echo "Profile updated successfully!";
        // Optionally, refresh the page to fetch updated details
        header("Refresh:0"); // This refreshes the page
        exit(); // Important to exit after a redirect
    } else {
        echo "Error updating profile: " . $data->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        label {
            margin-top: 10px;
            display: block;
        }
        input[type="text"],
        input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 5px 0 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #4facfe;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #00c6ff;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Edit Profile</h2>
    <form action="profile.php" method="POST">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($member['first_name']); ?>" required>

        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($member['last_name']); ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($member['email']); ?>" required>

        <!-- Add more fields as necessary -->
        
        <input type="submit" value="Update Profile">
    </form>
</div>

</body>
</html>
