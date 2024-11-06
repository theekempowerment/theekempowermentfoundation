<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: lightgreen;
            margin: 0;
            padding: 20px;
        }
        /* Styles for the background image at the top */
        .hero-section {
            height: 400px; /* Adjust height as needed */
            background-image: url('download.jpg'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white; /* Change text color if needed */
            text-align: center;
            border-radius: 10px 10px 0 0; /* Rounded corners at the top */
            margin-bottom: 20px; /* Space between hero and container */
        }
        .container {
            max-width: 1000px;
            margin: 0 auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2, h3 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .form-row .form-group {
            flex-basis: 30%;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .submit-btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .submit-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="hero-section">
    <h1>Welcome to the Student Registration</h1> <!-- Title overlay on the background image -->
</div>

<div class="container">
    <h2>Student Registration Form</h2>
    <form action="submit_registration.php" method="post">

        <!-- Personal Information -->
        <div class="form-row">
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" id="first_name" name="first_name" required>
            </div>
            <div class="form-group">
                <label for="middle_name">Middle Name:</label>
                <input type="text" id="middle_name" name="middle_name">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" id="last_name" name="last_name" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="dob">Date of Birth:</label>
                <input type="date" id="dob" name="dob" required>
            </div>
            <div class="form-group">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
            </div>
            <div class="form-group">
                <label for="country_code">Country Code:</label>
                <select id="country_code" name="country_code" required>
                    <option value="+1">+1 (USA)</option>
                    <option value="+44">+44 (UK)</option>
                    <option value="+91">+91 (India)</option>
                    <option value="+61">+61 (Australia)</option>
                    <option value="+81">+81 (Japan)</option>
                    <!-- Add more country codes as needed -->
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" id="phone" name="phone" required placeholder="Enter phone number without country code">
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="id_number">ID Number:</label>
                <input type="text" id="id_number" name="id_number" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="mode_of_learning">Mode of Learning:</label>
                <select id="mode_of_learning" name="mode_of_learning" required>
                    <option value="Physical">Physical Class Attendance</option>
                    <option value="Online">Online Learning</option>
                    <option value="Homeschooling">Homeschooling</option>
                </select>
            </div>
            <div class="form-group">
                <label for="education_level">Level of Education:</label>
                <select id="education_level" name="education_level" required>
                    <option value="Basic Literacy">Basic Literacy</option>
                    <option value="Primary Education">Primary Education</option>
                    <option value="Secondary Education">Secondary Education</option>
                </select>
            </div>
            <div class="form-group">
                <label for="additional_courses">Additional Courses:</label>
                <select id="additional_courses" name="additional_courses" required>
                    <option value="Computer Packages">Computer Packages</option>
                    <option value="French">French</option>
                    <option value="Home Science">Home Science</option>
                </select>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="physical_address">Physical Address:</label>
                <input type="text" id="physical_address" name="physical_address" required>
            </div>
            <div class="form-group">
                <label for="home_address">Home Address:</label>
                <input type="text" id="home_address" name="home_address" required>
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" id="city" name="city" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="state">State:</label>
                <input type="text" id="state" name="state" required>
            </div>
            <div class="form-group">
                <label for="postal_code">Postal Code:</label>
                <input type="text" id="postal_code" name="postal_code" required>
            </div>
        </div>

        <!-- Parent/Guardian Details -->
        <h3>Parent/Guardian Details</h3>
        <div class="form-row">
            <div class="form-group">
                <label for="parent_name">Parent/Guardian Full Name:</label>
                <input type="text" id="parent_name" name="parent_name" required>
            </div>
            <div class="form-group">
                <label for="relationship">Relationship to Student:</label>
                <input type="text" id="relationship" name="relationship" required>
            </div>
            <div class="form-group">
                <label for="parent_id">Parent/Guardian ID Number:</label>
                <input type="text" id="parent_id" name="parent_id" required>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="parent_phone">Parent/Guardian Phone Number:</label>
                <input type="text" id="parent_phone" name="parent_phone" required placeholder="Enter phone number without country code">
            </div>
            <div class="form-group">
                <label for="parent_email">Parent/Guardian Email Address:</label>
                <input type="email" id="parent_email" name="parent_email" required>
            </div>
            <div class="form-group">
                <label for="parent_address">Parent/Guardian Address:</label>
                <input type="text" id="parent_address" name="parent_address" required>
            </div>
        </div>

        <!-- Emergency Contact -->
        <h3>Emergency Contact Details</h3>
        <div class="form-row">
            <div class="form-group">
                <label for="emergency_contact_name">Emergency Contact Name:</label>
                <input type="text" id="emergency_contact_name" name="emergency_contact_name" required>
            </div>
            <div class="form-group">
                <label for="emergency_contact_phone">Emergency Contact Phone:</label>
                <input type="text" id="emergency_contact_phone" name="emergency_contact_phone" required placeholder="Enter phone number without country code">
            </div>
            <div class="form-group">
                <label for="relationship_emergency">Relationship:</label>
                <select id="relationship_emergency" name="relationship_emergency" required>
                    <option value="Mother">Mother</option>
                    <option value="Father">Father</option>
                    <option value="Guardian">Guardian</option>
                </select>
            </div>
        </div>

        <!-- Signature & Registration Date -->
        <div class="form-row">
            <div class="form-group">
                <label for="signature">Signature:</label>
                <input type="text" id="signature" name="signature" required>
            </div>
            <div class="form-group">
                <label for="registration_date">Registration Date:</label>
                <input type="date" id="registration_date" name="registration_date" required>
            </div>
        </div>

        <button type="submit" class="submit-btn">Submit Registration</button>
    </form>
</div>

</body>
</html>
