

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
        }
        form {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        h2 {
            margin-bottom: 15px;
            font-size: 1.3rem;
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 5px;
        }
        .section {
            margin-bottom: 20px;
        }
        .row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }
        .row > div {
            flex: 1;
            padding: 0 10px;
            box-sizing: border-box;
        }
        .row label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }
        .row input, .row select, .row textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 1rem;
            color: #333;
            outline: none;
        }
        .row input:focus, .row select:focus, .row textarea:focus {
            border-color: #007bff;
        }
        .row input[readonly], .row select[disabled] {
            background-color: #e9ecef;
            cursor: not-allowed;
        }
        .description {
            font-style: italic;
            color: #777;
            margin-bottom: 20px;
        }
        .submit-btn {
            display: flex;
            justify-content: center;
        }
        .submit-btn button {
            padding: 12px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
        }
        .submit-btn button:hover {
            background-color: #218838;
        }
        .declaration-row {
            display: flex;
            align-items: center;
        }
        .declaration-row input[type="checkbox"] {
            margin-right: 10px;
        }
        .full {
            flex: 1;
            padding: 0 10px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>

<h1>Student Registration Form</h1>

<form action="submit.php" method="POST">
    <!-- SECTION A: Personal Information -->
    <div class="section">
        <h2>SECTION A: Personal Information</h2>
        <div class="row">
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
        </div>

        <div class="row">
            <div>
                <label for="phone">Phone Number</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <div>
                <label for="alt_phone">Alt. Phone Number</label>
                <input type="text" name="alt_phone" id="alt_phone">
            </div>
            <div>
                <label for="email">Email Address</label>
                <input type="email" name="email" id="email" required>
            </div>
        </div>

        <div class="row">
            <div>
                <label for="country_code">Country Code</label>
                <input type="text" name="country_code" id="country_code" required>
            </div>
            <div>
                <label for="gender">Gender</label>
                <select name="gender" id="gender" required>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div>
                <label for="marital_status">Marital Status</label>
                <select name="marital_status" id="marital_status" required>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div>
                <label for="nationality">Nationality</label>
                <select name="nationality" id="nationality" required onchange="toggleNationalityFields()">
                    <option value="Kenyan">Kenyan</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div>
                <label for="county">County</label>
                <input type="text" name="county" id="county" readonly>
            </div>
            <div>
                <label for="subcounty">Sub-County</label>
                <input type="text" name="subcounty" id="subcounty" readonly>
            </div>
            <div>
                <label for="ward">Ward</label>
                <input type="text" name="ward" id="ward" readonly>
            </div>
            <div class="non-kenyan-fields" style="display: none;">
                <div>
                    <label for="country">Country</label>
                    <input type="text" name="country" id="country">
                </div>
                <div>
                    <label for="current_address">Current Address</label>
                    <input type="text" name="current_address" id="current_address">
                </div>
            </div>
        </div>
    </div>

    <!-- SECTION B: Education Details -->
    <div class="section">
        <h2>SECTION B: Education Details</h2>
        <div class="row">
            <div>
                <label for="education_level">Level of Education</label>
                <select name="education_level" id="education_level" required onchange="toggleEducationFields()">
                    <option value="Basic Literacy">Basic Literacy</option>
                    <option value="Primary Education">Primary Education</option>
                    <option value="Secondary Education">Secondary Education</option>
                </select>
            </div>
            <div class="additional-education" style="display: none;">
                <label for="education_details1">Education Details 1</label>
                <input type="text" name="education_details1" id="education_details1">
            </div>
            <div class="additional-education" style="display: none;">
                <label for="education_details2">Education Details 2</label>
                <input type="text" name="education_details2" id="education_details2">
            </div>
        </div>
    </div>

    <!-- SECTION C: Mode of Learning -->
    <div class="section">
        <h2>SECTION C: Mode of Learning</h2>
        <div class="row">
            <div>
                <label for="learning_mode">Mode of Learning</label>
                <select name="learning_mode" id="learning_mode" required onchange="toggleModeOfLearningFields()">
                    <option value="Physical Class Attendance">Physical Class Attendance</option>
                    <option value="Online/Virtual Learning">Online/Virtual Learning</option>
                    <option value="Home Schooling">Home Schooling</option>
                </select>
            </div>
            <div class="learning-mode-description" style="display: none;">
                <label for="learning_mode_more">More about Mode Chosen</label>
                <input type="text" name="learning_mode_more" id="learning_mode_more">
            </div>
        </div>
        <div class="row">
            <div>
                <label for="additional_courses">Additional Courses Offered</label>
                <select name="additional_courses[]" id="additional_courses" multiple>
                    <option value="French Language">French Language</option>
                    <option value="English Language">English Language</option>
                    <option value="Computer Lessons">Computer Lessons</option>
                    <option value="Computer Packages">Computer Packages</option>
                </select>
            </div>
        </div>
    </div>

    <!-- SECTION D: Parent/Guardian -->
    <div class="section">
        <h2>SECTION D: Parent/Guardian</h2>
        <div class="row">
            <div>
                <label for="guardian_full_name">Full Name</label>
                <input type="text" name="guardian_full_name" id="guardian_full_name" required>
            </div>
            <div>
                <label for="guardian_phone">Phone Number</label>
                <input type="text" name="guardian_phone" id="guardian_phone" required>
            </div>
            <div>
                <label for="guardian_alt_phone">Alt Phone Number</label>
                <input type="text" name="guardian_alt_phone" id="guardian_alt_phone">
            </div>
        </div>
        <div class="row">
            <div>
                <label for="guardian_id">ID Number</label>
                <input type="text" name="guardian_id" id="guardian_id" required>
            </div>
            <div>
                <label for="guardian_current_address">Current Address</label>
                <input type="text" name="guardian_current_address" id="guardian_current_address">
            </div>
            <div>
                <label for="guardian_relationship">Relationship</label>
                <select name="guardian_relationship" id="guardian_relationship" required>
                    <option value="Mother">Mother</option>
                    <option value="Father">Father</option>
                    <option value="Spouse">Spouse</option>
                    <option value="Guardian">Guardian</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Additional Information -->
    <div class="section">
        <h2>Additional Information</h2>
        <div class="row">
            <div>
                <label for="who_pays_fees">Who Pays Your Fees?</label>
                <input type="text" name="who_pays_fees" id="who_pays_fees">
            </div>
            <div>
                <label for="payer_phone">Payer's Phone Number</label>
                <input type="text" name="payer_phone" id="payer_phone">
            </div>
        </div>
        <div class="row full description">
            <p><strong>Theek Youth, Adult, and Tuition Center:</strong> We provide quality education and training tailored to the needs of youth and adults. Our programs are designed to equip individuals with practical skills and knowledge for personal and professional growth.</p>
        </div>
        <div class="row full declaration-row">
            <label for="declaration_check">I declare that the information provided is true, complete, and accurate to the best of my knowledge. I understand that providing false or misleading information may lead to disqualification or other consequences as deemed appropriate by the institution. I consent to the use of my data for the purpose of processing this registration and acknowledge that I have read and understood the privacy policy.</label>
            <input type="checkbox" name="declaration_check" id="declaration_check" required>
        </div>
        <button type="submit">Submit</button>
    </div>
</form>

<script>
    // Javascript functions for toggling fields
</script>
</body>
</html>