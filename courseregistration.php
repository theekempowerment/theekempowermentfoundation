<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Course Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('background.jpg'); /* Change 'background.jpg' to your actual image URL */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            width: 80%;
            max-width: 1000px;
            margin: 20px auto;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        header {
            background: #4CAF50;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }

        form {
            padding: 30px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
        }

        form label {
            font-weight: bold;
            margin-bottom: 5px;
        }

        form select, form input[type="text"], form input[type="email"], form input[type="tel"] {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 14px;
            box-sizing: border-box;
        }

        .full-width {
            grid-column: span 3;
        }

        form button {
            background: #4CAF50;
            color: #fff;
            border: none;
            padding: 15px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        form button:hover {
            background: #45a049;
        }

        .back-link {
            text-align: center;
            padding: 20px;
        }

        .back-link a {
            color: #4CAF50;
            text-decoration: none;
            font-size: 16px;
        }

        .back-link a:hover {
            text-decoration: underline;
        }

        .success-message {
            text-align: center;
            font-size: 18px;
            color: green;
            margin-top: 10px;
        }

        .spinner {
            display: none;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .loading {
            border: 8px solid #f3f3f3; /* Light grey */
            border-top: 8px solid #3498db; /* Blue */
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>

    <div class="container">
        <header>
            <h1>Course Registration</h1>
        </header>

        <!-- PHP code to handle form submission -->
        <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Database connection details
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "theek"; // Replace with your actual database name

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Sanitize and collect form data
                $course = $conn->real_escape_string($_POST['course']);
                $mode = $conn->real_escape_string($_POST['mode']);
                $email = $conn->real_escape_string($_POST['email']);
                $phone = $conn->real_escape_string($_POST['phone']);
                $address = $conn->real_escape_string($_POST['address']);
                $city = $conn->real_escape_string($_POST['city']);
                $state = $conn->real_escape_string($_POST['state']);
                $postal = $conn->real_escape_string($_POST['postal']);

                // SQL query to insert form data into the course_registrations table
                $sql = "INSERT INTO course_registrations (course, mode, email, phone, address, city, state, postal_code)
                        VALUES ('$course', '$mode', '$email', '$phone', '$address', '$city', '$state', '$postal')";

                if ($conn->query($sql) === TRUE) {
                    echo "<p class='success-message'>Course application successfully!</p>";
                    echo "<div class='spinner' id='spinner'><div class='loading'></div></div>";
                    echo "<script>
                            setTimeout(function() {
                                window.location.href = 'studentportal.php';
                            }, 3000);
                          </script>";
                } else {
                    echo "<p class='success-message' style='color: red;'>Error: " . $conn->error . "</p>";
                }

                // Close the connection
                $conn->close();
            }
        ?>

        <!-- Registration form -->
        <form action="" method="post">
            <div>
                <label for="course">Select Course:</label>
                <select id="course" name="course" required>
                    <option value="basic_literacy">Basic Literacy</option>
                    <option value="primary_education">Primary Education</option>
                    <option value="secondary_education">Secondary Education</option>
                    <option value="english_language">English Language Only</option>
                    <option value="french_language">French Language Only</option>
                    <option value="computer_package">Computer Package</option>
                </select>
            </div>

            <div>
                <label for="mode">Mode of Learning:</label>
                <select id="mode" name="mode" required>
                    <option value="physical_class">Physical Class Attendance</option>
                    <option value="online_learning">Online/Virtual Learning</option>
                    <option value="home_schooling">Home Schooling</option>
                </select>
            </div>

            <div>
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div>
                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" required>
            </div>

            <div>
                <label for="address">Current Address:</label>
                <input type="text" id="address" name="address" placeholder="Street Address" required>
            </div>

            <div>
                <label for="city">City:</label>
                <input type="text" id="city" name="city" required>
            </div>

            <div>
                <label for="state">State/Province:</label>
                <input type="text" id="state" name="state" required>
            </div>

            <div>
                <label for="postal">Postal Code:</label>
                <input type="text" id="postal" name="postal" required>
            </div>

            <div class="full-width">
                <button type="submit">Submit Registration</button>
            </div>
        </form>

        <div class="back-link">
            <a href="studentportal.php">Back to Student Portal</a>
        </div>
    </div>

    <script>
        document.getElementById('spinner').style.display = 'flex'; // Show the spinner
    </script>
</body>
</html>
