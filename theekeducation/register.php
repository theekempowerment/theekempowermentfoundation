
<?php include 'header.php'; ?>

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
                <option value="+93">+93 (Afghanistan)</option>
<option value="+355">+355 (Albania)</option>
<option value="+213">+213 (Algeria)</option>
<option value="+376">+376 (Andorra)</option>
<option value="+244">+244 (Angola)</option>
<option value="+1-268">+1-268 (Antigua and Barbuda)</option>
<option value="+54">+54 (Argentina)</option>
<option value="+374">+374 (Armenia)</option>
<option value="+61">+61 (Australia)</option>
<option value="+43">+43 (Austria)</option>
<option value="+994">+994 (Azerbaijan)</option>
<option value="+1-242">+1-242 (Bahamas)</option>
<option value="+973">+973 (Bahrain)</option>
<option value="+880">+880 (Bangladesh)</option>
<option value="+1-246">+1-246 (Barbados)</option>
<option value="+375">+375 (Belarus)</option>
<option value="+32">+32 (Belgium)</option>
<option value="+501">+501 (Belize)</option>
<option value="+229">+229 (Benin)</option>
<option value="+975">+975 (Bhutan)</option>
<option value="+591">+591 (Bolivia)</option>
<option value="+387">+387 (Bosnia and Herzegovina)</option>
<option value="+267">+267 (Botswana)</option>
<option value="+55">+55 (Brazil)</option>
<option value="+673">+673 (Brunei)</option>
<option value="+359">+359 (Bulgaria)</option>
<option value="+226">+226 (Burkina Faso)</option>
<option value="+257">+257 (Burundi)</option>
<option value="+238">+238 (Cabo Verde)</option>
<option value="+855">+855 (Cambodia)</option>
<option value="+237">+237 (Cameroon)</option>
<option value="+1">+1 (Canada)</option>
<option value="+236">+236 (Central African Republic)</option>
<option value="+235">+235 (Chad)</option>
<option value="+56">+56 (Chile)</option>
<option value="+86">+86 (China)</option>
<option value="+57">+57 (Colombia)</option>
<option value="+269">+269 (Comoros)</option>
<option value="+242">+242 (Congo, Republic of the)</option>
<option value="+243">+243 (Congo, Democratic Republic of)</option>
<option value="+506">+506 (Costa Rica)</option>
<option value="+385">+385 (Croatia)</option>
<option value="+53">+53 (Cuba)</option>
<option value="+357">+357 (Cyprus)</option>
<option value="+420">+420 (Czech Republic)</option>
<option value="+45">+45 (Denmark)</option>
<option value="+253">+253 (Djibouti)</option>
<option value="+1-767">+1-767 (Dominica)</option>
<option value="+1-809">+1-809 (Dominican Republic)</option>
<option value="+593">+593 (Ecuador)</option>
<option value="+20">+20 (Egypt)</option>
<option value="+503">+503 (El Salvador)</option>
<option value="+240">+240 (Equatorial Guinea)</option>
<option value="+291">+291 (Eritrea)</option>
<option value="+372">+372 (Estonia)</option>
<option value="+268">+268 (Eswatini)</option>
<option value="+251">+251 (Ethiopia)</option>
<option value="+679">+679 (Fiji)</option>
<option value="+358">+358 (Finland)</option>
<option value="+33">+33 (France)</option>
<option value="+241">+241 (Gabon)</option>
<option value="+220">+220 (Gambia)</option>
<option value="+995">+995 (Georgia)</option>
<option value="+49">+49 (Germany)</option>
<option value="+233">+233 (Ghana)</option>
<option value="+30">+30 (Greece)</option>
<option value="+1-473">+1-473 (Grenada)</option>
<option value="+502">+502 (Guatemala)</option>
<option value="+224">+224 (Guinea)</option>
<option value="+245">+245 (Guinea-Bissau)</option>
<option value="+592">+592 (Guyana)</option>
<option value="+509">+509 (Haiti)</option>
<option value="+504">+504 (Honduras)</option>
<option value="+36">+36 (Hungary)</option>
<option value="+354">+354 (Iceland)</option>
<option value="+91">+91 (India)</option>
<option value="+62">+62 (Indonesia)</option>
<option value="+98">+98 (Iran)</option>
<option value="+964">+964 (Iraq)</option>
<option value="+353">+353 (Ireland)</option>
<option value="+972">+972 (Israel)</option>
<option value="+39">+39 (Italy)</option>
<option value="+1-876">+1-876 (Jamaica)</option>
<option value="+81">+81 (Japan)</option>
<option value="+962">+962 (Jordan)</option>
<option value="+7">+7 (Kazakhstan)</option>
<option value="+254">+254 (Kenya)</option>
<option value="+686">+686 (Kiribati)</option>
<option value="+850">+850 (Korea, North)</option>
<option value="+82">+82 (Korea, South)</option>
<option value="+383">+383 (Kosovo)</option>
<option value="+965">+965 (Kuwait)</option>
<option value="+996">+996 (Kyrgyzstan)</option>
<option value="+856">+856 (Laos)</option>
<option value="+371">+371 (Latvia)</option>
<option value="+961">+961 (Lebanon)</option>
<option value="+266">+266 (Lesotho)</option>
<option value="+231">+231 (Liberia)</option>
<option value="+218">+218 (Libya)</option>
<option value="+423">+423 (Liechtenstein)</option>
<option value="+370">+370 (Lithuania)</option>
<option value="+352">+352 (Luxembourg)</option>
<option value="+261">+261 (Madagascar)</option>
<option value="+265">+265 (Malawi)</option>
<option value="+60">+60 (Malaysia)</option>
<option value="+960">+960 (Maldives)</option>
<option value="+223">+223 (Mali)</option>
<option value="+356">+356 (Malta)</option>
<option value="+692">+692 (Marshall Islands)</option>
<option value="+222">+222 (Mauritania)</option>
<option value="+230">+230 (Mauritius)</option>
<option value="+52">+52 (Mexico)</option>
<option value="+691">+691 (Micronesia)</option>
<option value="+373">+373 (Moldova)</option>
<option value="+377">+377 (Monaco)</option>
<option value="+976">+976 (Mongolia)</option>
<option value="+382">+382 (Montenegro)</option>
<option value="+212">+212 (Morocco)</option>
<option value="+258">+258 (Mozambique)</option>
<option value="+95">+95 (Myanmar)</option>
<option value="+264">+264 (Namibia)</option>
<option value="+674">+674 (Nauru)</option>
<option value="+977">+977 (Nepal)</option>
<option value="+31">+31 (Netherlands)</option>
<option value="+64">+64 (New Zealand)</option>
<option value="+505">+505 (Nicaragua)</option>
<option value="+227">+227 (Niger)</option>
<option value="+234">+234 (Nigeria)</option>
<option value="+389">+389 (North Macedonia)</option>
<option value="+47">+47 (Norway)</option>
<option value="+968">+968 (Oman)</option>
<option value="+92">+92 (Pakistan)</option>
<option value="+680">+680 (Palau)</option>
<option value="+970">+970 (Palestine)</option>
<option value="+507">+507 (Panama)</option>
<option value="+675">+675 (Papua New Guinea)</option>
<option value="+595">+595 (Paraguay)</option>
<option value="+51">+51 (Peru)</option>
<option value="+63">+63 (Philippines)</option>
<option value="+48">+48 (Poland)</option>
<option value="+351">+351 (Portugal)</option>
<option value="+974">+974 (Qatar)</option>
<option value="+40">+40 (Romania)</option>
<option value="+7">+7 (Russia)</option>
<option value="+250">+250 (Rwanda)</option>
<option value="+1-869">+1-869 (Saint Kitts and Nevis)</option>
<option value="+1-758">+1-758 (Saint Lucia)</option>
<option value="+1-784">+1-784 (Saint Vincent and the Grenadines)</option>
<option value="+685">+685 (Samoa)</option>
<option value="+378">+378 (San Marino)</option>
<option value="+239">+239 (Sao Tome and Principe)</option>
<option value="+966">+966 (Saudi Arabia)</option>
<option value="+221">+221 (Senegal)</option>
<option value="+381">+381 (Serbia)</option>
<option value="+248">+248 (Seychelles)</option>
<option value="+232">+232 (Sierra Leone)</option>
<option value="+65">+65 (Singapore)</option>
<option value="+421">+421 (Slovakia)</option>
<option value="+386">+386 (Slovenia)</option>
<option value="+677">+677 (Solomon Islands)</option>
<option value="+252">+252 (Somalia)</option>
<option value="+27">+27 (South Africa)</option>
<option value="+211">+211 (South Sudan)</option>
<option value="+34">+34 (Spain)</option>
<option value="+94">+94 (Sri Lanka)</option>
<option value="+249">+249 (Sudan)</option>
<option value="+597">+597 (Suriname)</option>
<option value="+46">+46 (Sweden)</option>
<option value="+41">+41 (Switzerland)</option>
<option value="+963">+963 (Syria)</option>
<option value="+886">+886 (Taiwan)</option>
<option value="+992">+992 (Tajikistan)</option>
<option value="+255">+255 (Tanzania)</option>
<option value="+66">+66 (Thailand)</option>
<option value="+228">+228 (Togo)</option>
<option value="+676">+676 (Tonga)</option>
<option value="+1-868">+1-868 (Trinidad and Tobago)</option>
<option value="+216">+216 (Tunisia)</option>
<option value="+90">+90 (Turkey)</option>
<option value="+993">+993 (Turkmenistan)</option>
<option value="+688">+688 (Tuvalu)</option>
<option value="+256">+256 (Uganda)</option>
<option value="+380">+380 (Ukraine)</option>
<option value="+971">+971 (United Arab Emirates)</option>
<option value="+44">+44 (United Kingdom)</option>
<option value="+1">+1 (United States)</option>
<option value="+598">+598 (Uruguay)</option>
<option value="+998">+998 (Uzbekistan)</option>
<option value="+678">+678 (Vanuatu)</option>
<option value="+39">+39 (Vatican City)</option>
<option value="+58">+58 (Venezuela)</option>
<option value="+84">+84 (Vietnam)</option>
<option value="+967">+967 (Yemen)</option>
<option value="+260">+260 (Zambia)</option>
<option value="+263">+263 (Zimbabwe)</option>

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
