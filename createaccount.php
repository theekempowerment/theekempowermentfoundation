<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
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
            background-color: rgba(255, 255, 255, 0.9); /* White background with transparency */
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2); /* Shadow for a floating effect */
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
        input[type="tel"],
        input[type="email"],
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
            background-color: #007bff; /* Bootstrap blue */
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

        /* Error/success messages */
        .message {
            text-align: center;
            color: red;
            font-size: 14px;
        }

        /* Success message styling */
        .success {
            color: green;
        }

        /* Loading styles */
        .loading {
            display: none;
            margin-top: 20px;
            font-size: 16px;
            color: #333;
        }

        .loader {
            border: 6px solid #f3f3f3; /* Light grey */
            border-top: 6px solid #3498db; /* Blue */
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
        <h1>Create Account</h1>
        
        <form id="create-account-form" action="createaccount.php" method="POST" onsubmit="showLoading()">
            <label for="phone_number">Phone Number:</label>
            <input type="tel" id="phone_number" name="phone_number" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="id_number">ID/Birth Certificate/Passport Number:</label>
            <input type="text" id="id_number" name="id_number" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm_password">Confirm Password:</label>
            <input type="password" id="confirm_password" name="confirm_password" required>

            <!-- Show Password checkbox -->
            <div class="show-password-container">
                <input type="checkbox" id="show-password" onclick="togglePasswordVisibility()">
                <label for="show-password">Show Password</label>
            </div>

            <button type="submit">Create Account</button>
        </form>

        <div id="loading" class="loading">
            <div class="loader"></div>
            <p>Please wait, creating your account...</p>
        </div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Connect to the database
            $conn = new mysqli('localhost', 'root', '', 'theek');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Get the posted values
            $phone_number = $_POST['phone_number'];
            $email = $_POST['email'];
            $id_number = $_POST['id_number'];
            $password = $_POST['password'];

           
            // Admission number generation logic
            $current_year = date("y"); // Get the last two digits of the current year, e.g., '24' for 2024

            // Get the current count of registered users for the incrementing part of the admission number
            $sql_count = "SELECT COUNT(*) AS count FROM users";
            $result = $conn->query($sql_count);
            $row = $result->fetch_assoc();
            $count = $row['count'] + 1; // Increment count to get the next admission number

            // Format the admission number: 'TEF/000/24'
            $admission_number = "TEF/" . str_pad($count, 3, '0', STR_PAD_LEFT) . "/" . $current_year;

            // Check if the admission number is already in the system (to avoid duplicates)
            $sql_check = "SELECT * FROM users WHERE admission_number = ?";
            $stmt_check = $conn->prepare($sql_check);
            $stmt_check->bind_param("s", $admission_number);
            $stmt_check->execute();
            $stmt_check->store_result();

            if ($stmt_check->num_rows > 0) {
                echo "<p class='message'>Error: Duplicate admission number. Please try again.</p>";
            } else {
                // Insert the new user into the database
                $sql_insert = "INSERT INTO users (phone_number, email, id_number, password, admission_number) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql_insert);
                $stmt->bind_param("sssss", $phone_number, $email, $id_number, $password, $admission_number);

                if ($stmt->execute()) {
                    echo "<p class='success'>Account created successfully! Your admission number is: <strong>$admission_number</strong></p>";
                    // Redirect after 24 seconds
                    echo "<script>
                            setTimeout(function() {
                                window.location.href = 'login.php'; // Change to your login page
                            }, 4000);
                          </script>";
                } else {
                    echo "<p class='message'>Error: " . $stmt->error . "</p>";
                }

                $stmt->close();
            }

            $stmt_check->close();
            $conn->close();
        }
        ?>
    </div>

    <script>
        function togglePasswordVisibility() {
            var password = document.getElementById('password');
            var confirmPassword = document.getElementById('confirm_password');
            if (password.type === 'password') {
                password.type = 'text';
                confirmPassword.type = 'text';
            } else {
                password.type = 'password';
                confirmPassword.type = 'password';
            }
        }

        function showLoading() {
            document.getElementById('loading').style.display = 'block'; // Show loading message
        }
    </script>

</body>
</html>
