<?php
session_start();

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'theek');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the posted admission number and sanitize input
    $admission_number = trim($_POST['admission_number']);

    // Check if admission number exists
    $sql = "SELECT id, email FROM users WHERE admission_number = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Statement preparation failed: " . $conn->error);
    }

    $stmt->bind_param("s", $admission_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Admission number exists
        $row = $result->fetch_assoc();
        $user_id = $row['id'];
        $user_email = $row['email'];

        // Generate a unique reset token
        $reset_token = bin2hex(random_bytes(16));
        $token_expiry = date("Y-m-d H:i:s", strtotime("+1 hour")); // Token valid for 1 hour

        // Store token and expiry time in the database
        $update_sql = "UPDATE users SET reset_token = ?, token_expiry = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);

        if (!$update_stmt) {
            die("Statement preparation failed: " . $conn->error);
        }

        $update_stmt->bind_param("ssi", $reset_token, $token_expiry, $user_id);
        $update_stmt->execute();

        // Generate password reset link (this should be emailed to the user in a real-world scenario)
        $reset_link = "http://yourwebsite.com/reset_password.php?token=$reset_token";

        echo "<p style='color: green;'>A reset link has been generated. Click the link below to reset your password:</p>";
        echo "<a href='$reset_link'>$reset_link</a>";

        // Optionally, email the reset link to the user
        // mail($user_email, "Password Reset", "Click the following link to reset your password: $reset_link");

    } else {
        echo "<p style='color: red;'>Admission number not found.</p>";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f2f2f2;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #555;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Forgot Password</h2>
    <form action="forgot_password.php" method="POST">
        <label for="admission_number">Enter Your Admission Number:</label>
        <input type="text" id="admission_number" name="admission_number" required>
        <button type="submit">Generate Reset Link</button>
    </form>
</div>
</body>
</html>
