<?php
// Start the session and handle form submission
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuition Application</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:lightgreen; /* Light blue background */
            margin: 0;
            padding: 0;
        }

        .header {
            background-image: url('theekeducation/download.jpg'); /* Path to your background image */
            background-size: cover;
            height: 200px; /* Adjust height */
            text-align: center;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            font-weight: bold;
        }

        .container {
            background-color: #ffffff; /* White background for the form */
            padding: 20px;
            margin: 20px auto;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            width: 900px; /* Wider container for three columns */
        }

        h1, h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            color: #555;
        }

        .form-row {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* Three columns */
            gap: 20px; /* Space between fields */
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="tel"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box; /* Ensures proper sizing */
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

    <script>
        function updateEducationFields() {
            var educationSystem = document.getElementById("education_system").value;
            var cbcField = document.getElementById("cbc_field");
            var formField = document.getElementById("form_field");

            if (educationSystem === "CBC") {
                cbcField.style.display = "block";
                formField.style.display = "none";
            } else if (educationSystem === "8-4-4") {
                formField.style.display = "block";
                cbcField.style.display = "none";
            } else {
                cbcField.style.display = "none";
                formField.style.display = "none";
            }
        }
    </script>
</head>
<body>

    <div class="header">
        Tuition Application Form
    </div>

    <div class="container">
        <h1>Application Details</h1>

        <form action="tuitionsubmision.php" method="POST">
            <!-- Personal Details -->
            <div class="form-row">
                <div>
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" required>
                </div>
                <div>
                    <label for="second_name">Second Name:</label>
                    <input type="text" id="second_name" name="second_name" required>
                </div>
                <div>
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name" required>
                </div>
            </div>

            <div class="form-row">
                <div>
                    <label for="phone_number">Phone Number (with country code):</label>
                    <input type="tel" id="phone_number" name="phone_number" required>
                </div>
                <div>
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div>
                    <label for="nationality">Nationality:</label>
                    <input type="text" id="nationality" name="nationality" required>
                </div>
            </div>

            <div class="form-row">
                <div>
                    <label for="current_address">Current Address:</label>
                    <input type="text" id="current_address" name="current_address" required>
                </div>
                <div>
                    <label for="education_system">System of Education:</label>
                    <select id="education_system" name="education_system" onchange="updateEducationFields()" required>
                        <option value="">-- Select Education System --</option>
                        <option value="8-4-4">8-4-4</option>
                        <option value="CBC">Competency-Based Curriculum (CBC)</option>
                    </select>
                </div>
                <div id="cbc_field" style="display: none;">
                    <label for="cbc_grade">Grade (CBC):</label>
                    <select id="cbc_grade" name="cbc_grade">
                        <option value="">-- Select CBC Grade --</option>
                        <option value="Grade 1">Grade 1</option>
                        <option value="Grade 2">Grade 2</option>
                        <option value="Grade 3">Grade 3</option>
                        <option value="Grade 4">Grade 4</option>
                        <option value="Grade 5">Grade 5</option>
                        <option value="Grade 6">Grade 6</option>
                        <option value="Junior Secondary">Junior Secondary</option>
                        <option value="Senior Secondary">Senior Secondary</option>
                    </select>
                </div>
                <div id="form_field" style="display: none;">
                    <label for="form_level">Form (8-4-4):</label>
                    <select id="form_level" name="form_level">
                        <option value="">-- Select Form --</option>
                        <option value="Form 1">Form 1</option>
                        <option value="Form 2">Form 2</option>
                        <option value="Form 3">Form 3</option>
                        <option value="Form 4">Form 4</option>
                    </select>
                </div>
            </div>

            <!-- Parent/Guardian Details -->
            <h2>Parent/Guardian Details</h2>
            <div class="form-row">
                <div>
                    <label for="parent_name">Parent/Guardian Full Name:</label>
                    <input type="text" id="parent_name" name="parent_name" required>
                </div>
                <div>
                    <label for="parent_phone">Parent/Guardian Phone Number:</label>
                    <input type="tel" id="parent_phone" name="parent_phone" required>
                </div>
                <div>
                    <label for="parent_id">Parent/Guardian ID Number:</label>
                    <input type="text" id="parent_id" name="parent_id" required>
                </div>
            </div>

            <!-- Fee Payment Details -->
            <h2>Fee Payment Details</h2>
            <div class="form-row">
                <div>
                    <label for="fee_payer_name">Fee Payer Full Name:</label>
                    <input type="text" id="fee_payer_name" name="fee_payer_name" required>
                </div>
                <div>
                    <label for="fee_payer_phone">Fee Payer Phone Number:</label>
                    <input type="tel" id="fee_payer_phone" name="fee_payer_phone" required>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit">Submit Application</button>
        </form>
    </div>
</body>
</html>
