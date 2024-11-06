<?php
session_start();  

// Handle login logic
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'theek');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the posted values
    $admission_number = trim($_POST['admission_number']); // Trim to remove any extra spaces
    $password_input = $_POST['password']; // Store user's input password

    // Prepare SQL statement to retrieve password from the 'users' table
    $sql = "SELECT id, password FROM users WHERE admission_number = ?";
    $stmt = $conn->prepare($sql);
    
    if (!$stmt) {
        die("Statement preparation failed: " . $conn->error);
    }

    $stmt->bind_param("s", $admission_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['password']; // Retrieve password from the database

        // Directly compare the plain text password
        if ($password_input === $stored_password) { 
            // Successful login
            $_SESSION['admission_number'] = $admission_number;
            $_SESSION['user_id'] = $row['id']; // Store user ID in session
            
            // Redirect to student portal
            header("Location: studentportal.php");
            exit();
        } else {
            echo "<p style='color: red;'>Incorrect password.</p>";
        }
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
    <title>Login</title>
    <style>
        /* Background image */
        body {
            background-image: url('background-image.jpg'); /* Replace with the actual image URL */
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Form container */
        .container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            width: 350px;
            text-align: center;
        }

        /* Form heading */
        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        /* Form labels */
        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        /* Form inputs */
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        /* Submit button */
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

        /* Button hover effect */
        button:hover {
            background-color: #0056b3;
        }

        /* Forgot password link */
        .forgot-password {
            display: block;
            margin-top: 15px;
            font-size: 14px;
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        /* Error messages */
        .message {
            text-align: center;
            color: red;
            font-size: 14px;
        }

        /* Loading styles */
        .loading {
            display: none;
            margin-top: 20px;
            font-size: 16px;
            color: #333;
        }

        .loader {
            border: 6px solid #f3f3f3;
            border-top: 6px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Show password checkbox */
        .show-password-container {
            display: flex;
            align-items: center;
            font-size: 14px;
        }

        .show-password-container input {
            margin-right: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Login</h1>
    
    <form id="login-form" action="login.php" method="POST" onsubmit="showLoadingMessage()">
        <label for="admission_number">Admission Number:</label>
        <input type="text" id="admission_number" name="admission_number" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <!-- Show Password checkbox -->
        <div class="show-password-container">
            <input type="checkbox" id="show-password" onclick="togglePasswordVisibility()">
            <label for="show-password">Show Password</label>
        </div>

        <button type="submit">Login</button>
    </form>

    <!-- Forgot Password link -->
    <a href="forgot_password.php" class="forgot-password">Forgot Password?</a>

    <div id="loading" class="loading">
        <div class="loader"></div>
        <p>Please wait, logging you in...</p>
    </div>

    <div class="message">
        <?php
        // Display any error messages from the PHP code above
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Errors will be displayed inline above
        }
        ?>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        var password = document.getElementById('password');
        if (password.type === 'password') {
            password.type = 'text';
        } else {
            password.type = 'password';
        }
    }

    function showLoadingMessage() {
        document.getElementById('loading').style.display = 'block'; // Show loading message
    }
</script>

</body>
</html>
