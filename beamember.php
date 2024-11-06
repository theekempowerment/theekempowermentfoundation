<?php
session_start(); // Start the session to store user details later

// Database connection
$conn = new mysqli('localhost', 'root', '', 'theek');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become a Member</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ACE1AF;
        }

        /* Background Image Section */
        .header {
            background-image: url('your-background-image.jpg'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            height: 400px; /* Increase height */
            position: relative;
        }

        .header h1 {
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            position: absolute;
            bottom: 30px; /* Adjusted bottom padding */
            left: 20px;
            font-size: 3em;
            z-index: 10; /* Ensure it stays above other elements */
        }

        /* Form Container */
        .container {
            background-color: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            max-width: 900px;
            margin: -50px auto 40px; /* Adjust the overlap to reduce covering the header */
            z-index: 2;
            position: relative;
        }

        /* Form Layout and Styling */
        form {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            font-size: 0.9em;
        }

        input, select {
            padding: 10px;
            font-size: 0.9em;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            transition: all 0.3s ease;
        }

        input:focus, select:focus {
            border-color: #28a745;
            box-shadow: 0 0 5px rgba(40, 167, 69, 0.2);
        }

        /* Submit Button */
        button {
            grid-column: span 3;
            padding: 12px;
            background-color: #28a745;
            color: white;
            font-size: 1em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            form {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<div class="header">
    <h1>Become a Member</h1>
</div>

<div class="container">
    <form action="" method="post">
        <!-- Personal Information -->
        <div>
            <label for="first_name">First Name</label>
            <input type="text" name="first_name" id="first_name" required>
        </div>
        <div>
            <label for="second_name">Second Name</label>
            <input type="text" name="second_name" id="second_name" required>
        </div>
        <div>
            <label for="last_name">Last Name</label>
            <input type="text" name="last_name" id="last_name" required>
        </div>
        <div>
            <label for="phone">Phone (+Country Code)</label>
            <input type="tel" name="phone" id="phone" required>
        </div>
        <div>
            <label for="id_number">ID Number</label>
            <input type="text" name="id_number" id="id_number" required>
        </div>
        <div>
            <label for="alt_phone">Alternate Phone (+Country Code)</label>
            <input type="tel" name="alt_phone" id="alt_phone">
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="nationality">Nationality</label>
            <input type="text" name="nationality" id="nationality" required>
        </div>
        <div>
            <label for="current_address">Current Address</label>
            <input type="text" name="current_address" id="current_address" required>
        </div>
        <div>
            <label for="home_address">Home Address</label>
            <input type="text" name="home_address" id="home_address" required>
        </div>

        <h2 style="grid-column: span 3;">Next of Kin Details</h2>

        <!-- Next of Kin Details -->
        <div>
            <label for="next_kin_first_name">First Name</label>
            <input type="text" name="next_kin_first_name" id="next_kin_first_name" required>
        </div>
        <div>
            <label for="next_kin_second_name">Second Name</label>
            <input type="text" name="next_kin_second_name" id="next_kin_second_name" required>
        </div>
        <div>
            <label for="next_kin_last_name">Last Name</label>
            <input type="text" name="next_kin_last_name" id="next_kin_last_name" required>
        </div>
        <div>
            <label for="next_kin_id">ID/Passport Number</label>
            <input type="text" name="next_kin_id" id="next_kin_id" required>
        </div>
        <div>
            <label for="next_kin_phone">Phone (+Country Code)</label>
            <input type="tel" name="next_kin_phone" id="next_kin_phone" required>
        </div>

        <!-- Submit Button -->
        <button type="submit">Submit</button>
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect personal information data
    $first_name = $_POST['first_name'];
    $second_name = $_POST['second_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $id_number = $_POST['id_number'];
    $alt_phone = $_POST['alt_phone'];
    $email = $_POST['email'];
    $nationality = $_POST['nationality'];
    $current_address = $_POST['current_address'];
    $home_address = $_POST['home_address'];

    // Collect next of kin details
    $next_kin_first_name = $_POST['next_kin_first_name'];
    $next_kin_second_name = $_POST['next_kin_second_name'];
    $next_kin_last_name = $_POST['next_kin_last_name'];
    $next_kin_id = $_POST['next_kin_id'];
    $next_kin_phone = $_POST['next_kin_phone'];

    // Prepare and bind to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO members (first_name, second_name, last_name, phone, id_number, alt_phone, email, nationality, current_address, home_address, next_kin_first_name, next_kin_second_name, next_kin_last_name, next_kin_id, next_kin_phone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssssssssss", $first_name, $second_name, $last_name, $phone, $id_number, $alt_phone, $email, $nationality, $current_address, $home_address, $next_kin_first_name, $next_kin_second_name, $next_kin_last_name, $next_kin_id, $next_kin_phone);

    // Execute the statement
    if ($stmt->execute()) {
        // Display success message and redirect after 4 seconds
        echo "<p>Thank you, $first_name! Your application has been submitted.</p>";
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'memberslogin.php';
                }, 4000); // 4000 milliseconds = 4 seconds
              </script>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }

    $stmt->close(); // Close the prepared statement
    $conn->close(); // Close the database connection
}
?>

</body>
</html>
