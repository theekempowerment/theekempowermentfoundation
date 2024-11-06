
<?php include 'header.php'; ?>
<br><br>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 60%;
            margin: auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            color: #2c3e50;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        .row > div {
            flex: 1;
            padding: 0 10px;
        }
        input, select, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #2c3e50;
            color: white;
            border: none;
            cursor: pointer;
            padding: 15px;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #34495e;
        }
        .success {
            text-align: center;
            color: green;
            font-size: 18px;
            margin-top: 20px;
        }
        .description {
            font-size: 16px;
            margin-bottom: 20px;
            color: #555;
        }
    </style>
</head>
<body>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form inputs
    $fname = htmlspecialchars($_POST['fname']);
    $sname = htmlspecialchars($_POST['sname']);
    $lname = htmlspecialchars($_POST['lname']);
    $country_code = htmlspecialchars($_POST['country_code']);
    $phone = htmlspecialchars($_POST['phone']);
    $email = htmlspecialchars($_POST['email']);
    $address = htmlspecialchars($_POST['address']);
    $interest = htmlspecialchars($_POST['interest']);
    $message = htmlspecialchars($_POST['message']);

    // Here you can write the code to store the form data into a database

    echo "<div class='success'>Message Submitted Successfully!</div>";
}
?>

<div class="container">
    <h1>Contact Us</h1>
    <form action="contact.php" method="POST">
        
        <!-- First Name, Second Name, and Last Name in one row -->
        <div class="row">
            <div>
                <label for="fname">First Name</label>
                <input type="text" id="fname" name="fname" required>
            </div>
            <div>
                <label for="sname">Second Name</label>
                <input type="text" id="sname" name="sname" required>
            </div>
            <div>
                <label for="lname">Last Name</label>
                <input type="text" id="lname" name="lname" required>
            </div>
        </div>

        <!-- Country Code, Phone Number, Email, and Address in one row -->
        <div class="row">
            <div>
                <label for="country_code">Country Code</label>
                <input type="tel" id="country_code" name="country_code" placeholder="+123" required>
            </div>
            <div>
                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" placeholder="4567890" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div>
                <label for="address">Current Address</label>
                <input type="text" id="address" name="address" required>
            </div>
        </div>

        <!-- Point of Interest -->
        <label for="interest">Point of Interest</label>
        <select id="interest" name="interest" required>
            <option value="Home">Home</option>
            <option value="About">About</option>
            <option value="Features">Features</option>
            <option value="Contact">Contact</option>
            <option value="Agriculture">Agriculture</option>
            <option value="Business">Business</option>
            <option value="Education">Education</option>
            <option value="Empowerment">Empowerment</option>
            <option value="Advertisement">Advertisement</option>
        </select>

        <!-- Message -->
        <label for="message">Message</label>
        <textarea id="message" name="message" rows="6" required></textarea>

        <!-- Description about Theek International -->
        <p class="description">
            Theek International is committed to fostering sustainable development through initiatives in agriculture, education, and community empowerment. We value your feedback and inquiries. Please feel free to reach out to us by filling out the form above.
        </p>

        <!-- Submit Button -->
        <input type="submit" value="Submit">
    </form>
</div>

<!-- Footer Section -->
<?php include 'footer.php'; ?>

</body>
</html>
