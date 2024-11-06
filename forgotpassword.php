<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            background-color: #f0f8ff; /* Light blue background color */
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full viewport height */
            margin: 0;
        }
        
        .container {
            background-color: #ffffff; /* White background for the form */
            padding: 20px;
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            width: 400px; /* Fixed width */
            text-align: center; /* Centered text */
        }
        
        h1 {
            margin-bottom: 20px; /* Space below the heading */
            color: #333; /* Darker color for the heading */
        }

        label {
            display: block; /* Stack labels */
            margin: 10px 0 5px; /* Space around labels */
            color: #555; /* Medium gray color for labels */
        }

        input[type="text"],
        input[type="email"] {
            width: 100%; /* Full width */
            padding: 10px; /* Padding for inputs */
            margin-bottom: 20px; /* Space below inputs */
            border: 1px solid #ccc; /* Light border */
            border-radius: 4px; /* Rounded corners */
        }

        button {
            width: 100%; /* Full width */
            padding: 10px; /* Padding for the button */
            background-color: #007bff; /* Bootstrap primary color */
            color: white; /* White text */
            border: none; /* No border */
            border-radius: 4px; /* Rounded corners */
            cursor: pointer; /* Pointer cursor */
            font-size: 16px; /* Font size for the button */
        }

        button:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .message {
            color: red; /* Red color for error messages */
            margin-top: 10px; /* Space above messages */
        }

        .success {
            color: green; /* Green color for success messages */
        }

        .links {
            margin-top: 20px; /* Space above links */
            font-size: 14px; /* Smaller font size for links */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Forgot Password</h1>
        
        <form action="forgotpassword.php" method="POST">
            <label for="email_or_admission_number">Email or Admission Number:</label>
            <input type="text" id="email_or_admission_number" name="email_or_admission_number" required>

            <button type="submit">Reset Password</button>
        </form>

        <div class="links">
            <p>Remembered your password? <a href="login.php">Login here</a></p>
        </div>

        <?php
        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Connect to the database
            $conn = new mysqli('localhost', 'root', '', 'student_portal');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get the posted value
            $email_or_admission_number = $_POST['email_or_admission_number'];

            // Prepare SQL statement to check if the user exists
            $sql = "SELECT email FROM student_registrations WHERE email = ? OR admission_number = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ss", $email_or_admission_number, $email_or_admission_number);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                // Generate a new random password
                $new_password = bin2hex(random_bytes(4)); // Generates a random password
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT); // Hash the new password

                // Update the user's password in the database
                $update_sql = "UPDATE student_accounts SET password = ? WHERE email = ? OR admission_number = ?";
                $update_stmt = $conn->prepare($update_sql);
                $update_stmt->bind_param("sss", $hashed_password, $email_or_admission_number, $email_or_admission_number);
                
                if ($update_stmt->execute()) {
                    // Send the new password via email (you need to configure mail settings for this)
                    // For demonstration, we will just display it on the screen.
                    echo "<p class='success'>Your new password is: <strong>$new_password</strong></p>";
                    // Optionally, send an email here with the new password.
                } else {
                    echo "<p class='message'>Error updating password: " . $update_stmt->error . "</p>";
                }

                $update_stmt->close();
            } else {
                echo "<p class='message'>No account found with that email or admission number.</p>";
            }

            $stmt->close();
            $conn->close();
        }
        ?>
    </div>
</body>
</html>
